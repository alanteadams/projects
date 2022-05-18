import os
import sys
import shutil
import tempfile
import xml.dom.minidom
import PySimpleGUIQt as sg
import xml.etree.ElementTree as ET
from zipfile import ZipFile, BadZipfile
from images import ic
from collections import OrderedDict
from fileStatus import uploadStatus, progressBar


# Add bmpn2 to tags
ET.register_namespace("bpmn2", "http://www.omg.org/spec/BPMN/20100524/MODEL")


def prettyfy(error, fileTest, file):

    str_i = ET.tostring(file)
    try:
        newfile = xml.dom.minidom.parseString(str_i)
        prettyFile = newfile.toprettyxml()
        fileTest.write(prettyFile)
    except:
        pass


# Find incoming tag value
def IncomingFunction(root, link, id):

    #Create list of listIDs and incoming to append. incomingID converts the ElementTree to a string to be used later#
    listIDs = []
    incoming = []

    incomingID = id.attrib["id"]
    # Find all sequenceFlows
    for a in root.iter(link + "}sequenceFlow"):
        # If there are any targetRefs, add it to the listIDs
        if incomingID == a.attrib["targetRef"]:
            listIDs.append(a.attrib["id"])
        # Take all IDs placed in listIDs and put them into correct incoming format
    for b in (listIDs):
        # Must use id in SubElement since it"s a ElementTree and not a string like incomingID
        incoming.append(ET.SubElement(id, "bpmn2:incoming"))
        # For however many arrows incoming, place the id into the incoming brackets
    for c in range(len(incoming)):
        incoming[c].text = listIDs[c][5:]
        # incoming[c] is not in utf-8 and will throw an error without decode
        incoming[c] = ET.tostring(incoming[c]).decode("utf-8")
    return incoming


# Find outgoing tag value
def OutgoingFunction(root, link, id):

    listIDs = []
    outgoing = []

    outgoingID = id.attrib["id"]
    for a in root.iter(link + "}sequenceFlow"):
        if outgoingID == a.attrib["sourceRef"]:
            listIDs.append(a.attrib["id"])
    for b in (listIDs):
        outgoing.append(ET.SubElement(id, "bpmn2:outgoing"))
    for c in range(len(outgoing)):
        outgoing[c].text = listIDs[c][5:]
        outgoing[c] = ET.tostring(outgoing[c]).decode("utf-8")
    return outgoing


# Create separate element from xml
def createElem(plane, processID, laneID, idEl, x, y, h, w):

    BPMNShape = ET.SubElement(plane, "BPMNShape", attrib={
        "id": "symbol-" + idEl, "bpmnElement": idEl})
    Bounds = ET.SubElement(BPMNShape, "Bounds", attrib={
                           "x": x, "y": y, "height": h, "width": w})
    Labels = ET.SubElement(BPMNShape, "BPMNLabel")
    if idEl == processID or idEl == laneID:
        BPMNShape.set("isHorizontal", "true")


# Diagram Edge(lanes) from XML
def createEdge(plane, idEl, sElem, tElem, x, y):

    BPMNEdge = ET.SubElement(plane, "BPMNEdge", attrib={
        "id": "symbol-" + idEl, "bpmnElement": idEl, "sourceElement": "symbol-" + sElem, "targetElement": "symbol-" + tElem})
    for way in range(len(x)):
        Waypoint = ET.SubElement(BPMNEdge, "waypoint", attrib={
            "x": x[way], "y": y[way]})
    Labels = ET.SubElement(BPMNEdge, "BPMNLabel")


# Assign attributes and ids
def assignAtr(root, link, listKnownIDs, el):

    elID = el.attrib["id"][5:]
    el.set("id", elID)
    listKnownIDs.append(elID)
    IncomingFunction(root, link, el)
    OutgoingFunction(root, link, el)


def batches(error, bpmnList, xmlList, mergedDir):

    for bx in range(len(bpmnList)):

        # Reusable variables
        processID = ""
        laneID = ""
        definitionsId = ""
        subProcessID = ""
        taskID = ""
        startEventID = ""
        endEventID = ""
        listKnownIDs = []
        listNodes = []
        SFList = []
        ServiceTaskList = []
        UserTaskList = []
        TaskList = []
        gatewayElemList = []
        subProcessElemList = []
        documentationsList = []
        startEventList = []
        endEventList = []
        callActivityList = []
        parallelGatewayList = []
        subProcessIDList = []
        countLane = 0
        insertSubProcessID = 0

        bpmnPath = bpmnList[bx]
        xmlPath = xmlList[bx]

        # Check if the extensions are correct
        bpmnExt = bpmnPath[-5:]
        if bpmnExt != ".bpmn":
            error = sg.popup("Error 425: BPMN file is missing", icon=ic)

        xmlExt = xmlPath[-4:]
        if xmlExt != ".xml":
            error = sg.popup("Error 426: XML file is missing", icon=ic)

        # Check if the names are matching
        bpmnName = bpmnPath.split("/")[-1][:-5]
        xmlName = xmlPath.split("/")[-1][:-4]
        if bpmnName != xmlName:
            error = sg.popup(
                "Error 423: BPMN file and XML file don't match", icon=ic)

        # Save the file to the dirsctory of bpmn
        try:
            progressStatus = uploadStatus(mergedDir, bpmnList)
            progressStatus
            fileTest = open(mergedDir + "/" + bpmnName +
                            "-merged.bpmn", "w", encoding="utf-8")
            progressStatus = uploadStatus(mergedDir, bpmnList)
            progressStatus
        except:
            error = sg.popup(
                "Error 427: Something went wrong when creating the file", icon=ic)

        # Get the link from xml files to better search for brackets (<task>)
        tree = ET.parse(bpmnList[bx])
        root = tree.getroot()

        # Get the link from xml files to better search for brackets (<task>)
        treeXML = ET.parse(xmlList[bx])
        rootXML = treeXML.getroot()

        link = root.tag.split("}")[0]
        linkXML = rootXML.tag.split("}")[0]

        # Find out how many lanes
        for lane in rootXML.iter(linkXML + "}Lane"):
            countLane += 1

        # Find out id there is an Activity Set so we"ll add SubProcess id in the right time
        for activity in rootXML.iter(linkXML + "}ActivitySet"):
            insertSubProcessID = 1

            try:
                del root.attrib["exporterVersion"]
                del root.attrib["exporter"]
            except:
                pass

            # Find ID
            definitionsId = root.attrib["id"]

            # Add missing attributes to definitions (root) tag
            root.set("xmlns:bpmndi", "http://www.omg.org/spec/BPMN/20100524/DI")
            root.set("xmlns:dc", "http://www.omg.org/spec/DD/20100524/DC")
            root.set("xmlns:di", "http://www.omg.org/spec/DD/20100524/DI")
            root.set("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance")
            root.set(
                "xmlns:bwl0", "http://www.ibm.com/WebSphere/bpm/BlueworksLive/Glossaries")
            root.set("id", definitionsId)

            # Change targetNamepace to match xsi tag
            root.set("targetNamespace",
                     "http://www.ibm.com/WebSphere/bpm/BlueworksLive/10ec9d55aa-1bec9d6405")

        for i in root.iter(link + "}definitions"):

            # Sequence Flow
            for f in i.iter(link + "}sequenceFlow"):
                f.set("id", f.attrib["id"][5:])
                f.set("sourceRef", f.attrib["sourceRef"][5:])
                f.set("targetRef", f.attrib["targetRef"][5:])
                f.set("isImmediate", "false")
                SFList.append(f)

            # Delete import elements
            for imp in root.iter(link + "}import"):
                del imp

            # Add id, name, processRef to bpmn2:participant
            for j in i.iter(link + "}process"):
                processID = j.attrib["id"][5:]
                for doc in j.iter(link + "}documentation"):
                    documentationsList.append(doc)

                # The whole laneSet elem
                for y in i.iter(link + "}laneSet"):
                    laneSetElem = y
                    try:
                        laneID = y[0].attrib["id"][5:]
                        y[0].set("id", laneID)
                    except:
                        laneID = y.attrib["id"][5:]
                        y.set("id", laneID)
                    for ct in range(countLane):
                        listKnownIDs.append(laneID)
                    listKnownIDs.append(processID)
                    y.set("id", "laneset-" + processID)

                # Set flowNodes without bpmn-
                for fn in i.iter(link + "}flowNodeRef"):
                    fn.text = fn.text[5:]

                # SubProcess
                for l in i.iter(link + "}subProcess"):
                    subProcessID = l.attrib["id"][5:]
                    subProcessIDList.append(subProcessID)
                    l.set("id", subProcessID)
                    l.set("isForCompensation", "false")
                    l.set("triggeredByEvent", "false")

                    # Find all the elements inside the Subprocess
                    for sbelem in l:
                        if (sbelem.tag != link + "}performer") and (sbelem.tag != link + "}sequenceFlow") and (sbelem.tag != link + "}documentation") and (sbelem.tag != link + "}extensionElements"):
                            listKnownIDs.append(sbelem.attrib["id"][5:])

                    # Remove everything inside SubProcess
                    chil = l.findall("*")
                    for ln in range(len(chil)):
                        l.remove(chil[ln])

                    SpIncoming = IncomingFunction(root, link, l)
                    SpOutgoing = OutgoingFunction(root, link, l)

                    subProcessElemList.append(l)

                for r in j.iter():
                    # Start event
                    if r.tag == link + "}startEvent":
                        assignAtr(root, link, listKnownIDs, r)
                        r.set("isInterrupting", "true")
                        startEventList.append(r)

                    # Service Task
                    if r.tag == link + "}serviceTask":
                        assignAtr(root, link, listKnownIDs, r)
                        ServiceTaskList.append(r)

                    # User Task
                    if r.tag == link + "}userTask":
                        assignAtr(root, link, listKnownIDs, r)
                        UserTaskList.append(r)

                    # Task part
                    if r.tag == link + "}task":
                        for d in r.iter("{http://www.ibm.com/bpm/Extensions}property"):
                            try:
                                del d.attrib["{http://www.w3.org/2001/XMLSchema-instance}type"]
                            except KeyError:
                                pass
                        assignAtr(root, link, listKnownIDs, r)
                        TaskList.append(r)

                    # Exclusive Gateway
                    if r.tag == link + "}exclusiveGateway":
                        assignAtr(root, link, listKnownIDs, r)
                        gatewayElemList.append(r)

                    # Call Activity Element
                    if r.tag == link + "}callActivity":
                        assignAtr(root, link, listKnownIDs, r)
                        # Per Cody assigning it to the task because there is no callActivity in Solman
                        r.tag = link + "}task"
                        callActivityList.append(r)

                    # ParallelGateway
                    if r.tag == link + "}parallelGateway":
                        assignAtr(root, link, listKnownIDs, r)
                        parallelGatewayList.append(r)

                    # Set all ResaurseRef without bpmn
                    for rr in i.iter(link + "}resourceRef"):
                        rr.text = "res:" + rr.text[9:]
                        rr.set("xmlns:res",
                               "http://www.ibm.com/WebSphere/bpm/BlueworksLive/Resources")

                    # End Event
                    if r.tag == link + "}endEvent":
                        assignAtr(root, link, listKnownIDs, r)
                        endEventList.append(r)

            # SubProcess goes after Gateway on Diadram
            if insertSubProcessID == 1:
                for sbl in subProcessIDList:
                    listKnownIDs.insert(len(listKnownIDs)-1, sbl)

            # Delete everything else
            chil = i.findall("*")
            for ln in range(len(chil)):
                i.remove(chil[ln])

            # Create element - bpmn2:collaboration
            collaboration = ET.SubElement(
                i, "bpmn2:collaboration", attrib={"id": "collaboration-" + definitionsId})

            # Create element - bpmn2:participant
            participant = ET.SubElement(collaboration, "bpmn2:participant", attrib={
                "id": processID, "name": "Pool", "processRef": "process-" + processID})

            # Create process element
            process = ET.SubElement(i, "bpmn2:process", attrib={
                "id": "process-" + processID})

            num = 0
            for d in documentationsList:
                process.insert(num, d)
                num += 1

            # Create laneSet
            process.insert(num, laneSetElem)
            num += 1

            # Add events to the merged bpmn file in specific order
            for s in subProcessElemList:
                process.insert(num, s)
                num += 1

            for se in startEventList:
                process.insert(num, se)
                num += 1

            for ut in UserTaskList:
                process.insert(num, ut)
                num += 1

            for st in ServiceTaskList:
                process.insert(num, st)
                num += 1

            for t in TaskList:
                process.insert(num, t)
                num += 1

            for g in gatewayElemList:
                process.insert(num, g)
                num += 1

            for ca in callActivityList:
                process.insert(num, ca)
                num += 1

            for pg in parallelGatewayList:
                process.insert(num, pg)
                num += 1

            for ee in endEventList:
                process.insert(num, ee)
                num += 1

            for sf in SFList:
                process.insert(num, sf)
                num += 1

        # Delete empty ids in the list
        listKnownIDs = [i for i in listKnownIDs if i]

        # DIAGRAM
        # Specify id from definition id
        diagram = ET.SubElement(i, "BPMNDiagram", attrib={
            "id": "diagram-" + definitionsId, "resolution": "96.0"})
        plane = ET.SubElement(diagram, "BPMNPlane", attrib={
            "id": "collaboration-" + definitionsId})

        # Count how many pools and lines in them
        countPools = 0
        for pool in rootXML.iter(linkXML + "}Pool"):
            countPools += 1
            for lane in pool.iter(linkXML + "}Lane"):
                countPools += 1

        # Save all the information about the Element
        for node in rootXML.iter(linkXML + "}NodeGraphicsInfo"):
            listNodes.append(node)

        # Loop through 2 lists to sign up elem and id
        r = 0
        while r < len(listKnownIDs):
            lnid = listKnownIDs[r]
            lnh = listNodes[r].attrib["Height"]
            lnw = listNodes[r].attrib["Width"]
            lnx = listNodes[r][0].attrib["XCoordinate"]
            lny = listNodes[r][0].attrib["YCoordinate"]
            createElem(plane, processID, laneID, lnid, lnx, lny, lnh, lnw)
            r += 1

        # Save all the information about the Connection
        listCon = []
        listX = []
        listY = []
        for con in rootXML.iter(linkXML + "}ConnectorGraphicsInfo"):
            x = []
            y = []
            coord = con.findall(linkXML + "}Coordinates")
            for c in coord:
                x.append(c.attrib["XCoordinate"])
                y.append(c.attrib["YCoordinate"])
            listX.append(x)
            listY.append(y)
            listCon.append(con)

        # Loop through and create lines
        SFList.reverse()
        xy = 0
        for sf in SFList:
            sfid = sf.attrib["id"]
            sfSR = sf.attrib["sourceRef"]
            sfTR = sf.attrib["targetRef"]
            x = listX[xy]
            y = listY[xy]
            createEdge(plane, sfid, sfSR, sfTR, x, y)
            xy += 1

        prettyfy(error, fileTest, i)
        progressBar(progressStatus[0], progressStatus[1])


def deleteFile(error, rootdir, xmlDestination, zipdir, bpmnDestination, mergedDir):

    with tempfile.TemporaryDirectory() as tempdir:
        for subdir, dirs, files in os.walk(rootdir):
            if subdir != rootdir and subdir != mergedDir and subdir != xmlDestination and subdir != zipdir:
                shutil.move(subdir, tempdir)

        # Move extra files to temp directory
        try:
            shutil.move(rootdir + "/Glossaries.bpmn", tempdir)
            shutil.move(rootdir + "/Resources.bpmn", tempdir)
            shutil.move(rootdir + "/InputOutput.xsd", tempdir)
        except:
            pass

        # Move extra zip folders to temp folder
        for zf in os.listdir(rootdir):
            if zf[-4:] == ".zip":
                shutil.move(zf, tempdir)
            if zf[-5:] == ".bpmn":
                shutil.move(zf, tempdir)

        # Move bpmn extra files to temp directory
        for subdir, dirs, files in os.walk(bpmnDestination, topdown=True):
            for file in files:
                bpmnFileName = os.path.join(bpmnDestination + "/" + file)
                shutil.move(bpmnFileName, tempdir)

    if not error:
        sg.popup("Success!", icon=ic)


def mergedFilesMac(rootdir):
    print(rootdir)
    # Reusable variables and lisis
    zipList = []
    zipNameList = []
    fileList = []
    xmlList = []
    bpmnList = []
    bpmnFilePaths = []
    xmlFilePaths = []
    error = ""

    # Check the upper cases of the folders
    oldDir = os.listdir(rootdir)
    for direc in oldDir:
        os.chdir(rootdir)
        os.rename(direc, direc.lower())

    listDir = os.listdir(rootdir)

    # Check the rootdir for xml and zip folder
    if "xml" not in listDir:
        error = sg.popup("Error 430: XML folder is missing", icon=ic)
    if "zip" not in listDir:
        error = sg.popup("Error 431: Zip folder is missing", icon=ic)

    zipdir = rootdir + "/zip"
    xmlDestination = rootdir + "/xml"

    # Create the merged and bpmn directories
    mergedDir = rootdir + "/merged"
    bpmnDestination = rootdir + "/bpmn"
    try:
        os.mkdir(mergedDir)
    except:
        pass

    try:
        os.mkdir(bpmnDestination)
    except:
        pass

    # Save zip file names to a list
    for subdir, dirs, files in os.walk(zipdir):

        # Check zip folder for files
        if not files and not error:
            error = sg.popup(
                "Error 421: No ZIP files exist in directory", icon=ic)

        for file in files:
            zipName = os.path.join(subdir, file)
            zipList.append(zipName)

    # Extract zip files
    for i in range(len(zipList)):

        # List of known zip directories for checking what's missing
        zipNameList.append(zipList[i].split("/")[-1][:-4])

        # Check if zip file's name is already in merged folder
        zipName = zipList[i].split("/")[-1][:-4] + "-merged.bpmn"
        if os.path.isfile(mergedDir + "/" + zipName):
            continue

        with ZipFile(zipList[i], "r") as zip:
            try:
                print(zip)
                zip.extractall(path=rootdir)

            except BadZipfile:
                print(1)
                error = sg.popup("Error 422: Zipfile is corrupted", icon=ic)
            except:
                print(1)
                sg.popup("Error 429: Couldn't unzip the folder " +
                         zipList[i] + ". Try rename the folder", icon=ic)
                pass


    # Save bpmn files to a list so that they can be moved
    print(rootdir)
    for subdir, dirs, files in os.walk(rootdir):
        print(files)
        for file in files:
            print(file)
            fileName = os.path.join(subdir, file)
            fileList.append(fileName)

    # Match the bpmn file to its corresponding xml file
    for i in range(len(fileList)):
        # Move bpmn files to bpmn folder
        if fileList[i].endswith(".bpmn") and fileList[i] != rootdir + "/Glossaries.bpmn" and fileList[i] != rootdir + "/Resources.bpmn":
            shutil.copy(fileList[i], bpmnDestination)

        filename1 = os.path.basename(fileList[i])
        filename2 = os.path.basename(fileList[i])

        if filename1.endswith(".bpmn"):
            try:
                name1 = filename1.rsplit(".", 1)[0]
                bpmnList.append(name1)
            except:
                pass
        if filename2.endswith(".xml"):
            name2 = filename2.rsplit(".", 1)[0]
            xmlList.append(name2)

    # Use to check if the files are in merge folder
    xmlList2 = []
    xmlList2 = xmlList

    # Check what zip and xml files are missing
    if len(xmlList) > len(zipList):
        missingList = list(set(xmlList) - set(zipNameList))
        if not error:
            sg.popup("Error 421: " + " No ZIP files exists in directory\n" + "\n" +
                     "\n".join(str(p) for p in missingList), icon=ic)

    if len(zipList) > len(xmlList):
        missingList = list(set(zipNameList) - set(xmlList))
        if not error:
            sg.popup("Error 426: " + " xml files are missing\n" + "\n" +
                     "\n".join(str(p) for p in missingList), icon=ic)

    # Check if the lists are the same
    c = [item for item in bpmnList if item in xmlList]

    # Check if there is anything in c list
    if len(c) == 0:
        if not error:
            error = sg.popup(
                "Error 419: All current files have beent merged. Nothing new to submit!", icon=ic)
        with tempfile.TemporaryDirectory() as tempdir:
            for subdir, dirs, files in os.walk(rootdir):
                if subdir != rootdir and subdir != mergedDir and subdir != xmlDestination and subdir != zipdir:
                    shutil.move(subdir, tempdir)

    # Assign the path list to use it in multiDiagram later
    for match in range(len(c)):
        print(4)
        bpmnPath = bpmnDestination + "/" + c[match] + ".bpmn"
        xmlPath = xmlDestination + "/" + c[match] + ".xml"

        bpmnFilePaths.append(bpmnPath)
        xmlFilePaths.append(xmlPath)

    bpmnList = bpmnFilePaths
    xmlList = xmlFilePaths

    batches(error, bpmnList, xmlList, mergedDir)

    # Check what files were not merged
    mergedList = []
    for subdir, dirs, files in os.walk(mergedDir):
        for file in files:
            mergedList.append(file[:-12])

    for ml in xmlList2:
        if ml not in mergedList and ml != "Glossaries" and ml != "Resources" and ml[-7:] != "-merged":
            sg.popup("Error 429: Couldn't unzip the folder " +
                     ml + ". Try rename the folder", icon=ic)

    deleteFile(error, rootdir, xmlDestination,
               zipdir, bpmnDestination, mergedDir)
