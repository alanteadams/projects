import os
import shutil
import tempfile
import sys
if sys.version_info[0] >=  3:
    import PySimpleGUIQt as sg
else:
    import PySimpleGUI27 as sg
import xml.etree.ElementTree as ET
from zipfile import ZipFile, BadZipfile
from images import ic
from multiDiagrams import *


def deleteFile(error, rootdir, xmlDestination, zipdir, bpmnDestination, mergedDir):

    with tempfile.TemporaryDirectory() as tempdir:
        for subdir, dirs, files in os.walk(rootdir):
            if subdir != rootdir and subdir != mergedDir and subdir != xmlDestination and subdir != zipdir:
                shutil.move(subdir, tempdir)

        # Move extra files to temp directory
        try:
            shutil.move(rootdir + "\\Glossaries.bpmn", tempdir)
            shutil.move(rootdir + "\\Resources.bpmn", tempdir)
            shutil.move(rootdir + "\\InputOutput.xsd", tempdir)
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
                bpmnFileName = os.path.join(bpmnDestination + "\\" + file)
                shutil.move(bpmnFileName, tempdir)

    if not error:
        sg.popup("Success!", icon=ic)


def mergedFiles(rootdir):

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
        error = sg.popup("Error 430: xml folder is missing", icon=ic)
    if "zip" not in listDir:
        error = sg.popup("Error 431: zip folder is missing", icon=ic)

    zipdir = rootdir + "\\zip"
    xmlDestination = rootdir + "\\xml"

    # Create the merged and bpmn directories
    mergedDir = rootdir + "\\merged"
    bpmnDestination = rootdir + "\\bpmn"
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
                "Error 421: No ZIP files exists in directory", icon=ic)

        for file in files:
            zipName = os.path.join(subdir, file)
            zipList.append(zipName)

    # Extract zip files
    for i in range(len(zipList)):

        # List of known zip directories for checking what's missing
        zipNameList.append(zipList[i].split("\\")[-1][:-4])

        # Check if zip file's name is already in merged folder
        zipName = zipList[i].split("\\")[-1][:-4] + "-merged.bpmn"
        if os.path.isfile(mergedDir + "\\" + zipName):
            continue

        with ZipFile(zipList[i], "r") as zip:
            try:
                zip.extractall(path=rootdir)
            except BadZipfile:
                error = sg.popup("Error 422: Zipfile is corrupted", icon=ic)
            except:
                sg.popup("Error 429: Couldn't unzip the folder " +
                         zipList[i] + ". Try rename the folder", icon=ic)
                pass

    # Save bpmn files to a list so that they can be moved
    for subdir, dirs, files in os.walk(rootdir):
        for file in files:
            fileName = os.path.join(subdir, file)
            fileList.append(fileName)

    # Match the bpmn file to its corresponding xml file
    for i in range(len(fileList)):

        # Move bpmn files to bpmn folder
        if fileList[i].endswith(".bpmn") and fileList[i] != rootdir + "\\Glossaries.bpmn" and fileList[i] != rootdir + "\\Resources.bpmn":
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
        bpmnPath = bpmnDestination + "\\" + c[match] + ".bpmn"
        xmlPath = xmlDestination + "\\" + c[match] + ".xml"

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
