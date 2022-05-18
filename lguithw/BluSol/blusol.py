import sys
import os
import platform
import webbrowser
from multiHandler import mergedFiles
from singleHandler import singleFile
from multiHandlerMac import mergedFilesMac
from images import ic, impactImg
if sys.version_info[0] >= 3:
    import PySimpleGUIQt as sg
else:
    import PySimpleGUI27 as sg


def main():

    # Gui Color Theme
    lightMode = "Reddit"
    sg.ChangeLookAndFeel(lightMode)

    # Home page layout
    selectorLayout = [
        [sg.Button(image_data=impactImg,
                   button_color=("black", "#ffffff"), border_width=0)],
        [sg.Frame(
            layout=[
                [
                    sg.Radio("Single Diagram", "RADIO1",
                             default=True, key="-SingleRadio-"),
                    sg.Radio("Multiple Diagrams",
                             "RADIO1", key="-MultiRadio-")
                ]
            ],
            title="Select the amount of diagrams you\'d like to convert",
            title_color="black",
            relief=sg.RELIEF_SUNKEN
        )],
        [sg.Button("Help", size=(100, 50), button_color=("black", "#ffffff")),
         sg.Button("Next", focus=True, size=(100, 50))]
    ]

    # Open window with homepage layout
    window1 = sg.Window(
        "IMPACT - BluSol", icon=ic, size=(600, 400), auto_size_text=True, resizable=False).Layout(selectorLayout)

    # Second window set to false because it"s not opened as of yet
    singleWindow_active = False

    # While loop to keep the gui running
    while True:
        event, values = window1.Read(timeout=1)
        if event == 'Help':
            webbrowser.open(
                "https://ibm.box.com/s/b5zuap2xs1jnhwed56ka8xb1caf7q18d")
        if event is None and not event == "Next":
            break
        if event == "Next" and values["-SingleRadio-"] == True:
            mainLocation = window1.CurrentLocation()
            location_x = mainLocation[0]
            location_y = mainLocation[1]
            window1.Hide()
            singleWindow_active = True
            singleDiagram = [
                [sg.Button(image_data=impactImg,
                           button_color=("black", "#ffffff"), border_width=0)],
                [sg.Frame(
                    layout=[
                        [
                            sg.Column([
                                [
                                    sg.Text("BPMN File"),
                                    sg.InputText(key="bpmn",
                                                 size=(375, 50)),
                                    sg.FileBrowse(key="bpmn", size=(100, 50)),
                                ],
                                [
                                    sg.Text("XML File"),
                                    sg.InputText(key="xml", size=(375, 50)),
                                    sg.FileBrowse(key="xml", size=(100, 50))
                                ]
                            ]),
                        ]
                    ],
                    title="Single Diagram",
                    title_color="black"
                )],
                [sg.Button("Help", size=(100, 50), button_color=("black", "#ffffff")),
                 sg.Submit(size=(100, 50)),
                    sg.Button("Back", size=(100, 50))]
            ]
            window2 = sg.Window(
                "IMPACT - BluSol", icon=ic, auto_size_text=True, resizable=False, location=(location_x, location_y - 40),).Layout(singleDiagram)
        if event == "Next" and values["-MultiRadio-"] == True:
            mainLocation = window1.CurrentLocation()
            location_x = mainLocation[0]
            location_y = mainLocation[1]
            window1.Hide()
            singleWindow_active = True
            multiDiagram = [
                [sg.Button(image_data=impactImg,
                           button_color=("black", "#ffffff"), border_width=0)],
                [
                    sg.Frame(
                        title="Multiple Diagrams",
                        title_color="black",
                        tooltip="Select The Parent Folder of Batches",
                        layout=[
                            [
                                sg.Text("Batch Folder", auto_size_text=True,
                                        justification="center", pad=(0, 20)),
                                sg.InputText(key="batch", size=(375, 50)),
                                sg.FolderBrowse(size=(100, 50))
                            ]
                        ],
                        relief=sg.RELIEF_RIDGE
                    )
                ],
                [sg.Button("Help", size=(100, 50), button_color=("black", "#ffffff")),
                 sg.Submit(size=(100, 50)),
                    sg.Button("Back", size=(100, 50))]
            ]
            window2 = sg.Window(
                "IMPACT - BluSol", icon=ic, size=(600, 400), auto_size_text=True, resizable=False, location=(location_x, location_y - 40)).Layout(multiDiagram)
        if singleWindow_active:
            event, values = window2.Read(timeout=0)
            if event == 'Help':
                webbrowser.open(
                    "https://ibm.box.com/s/thpw8h6x755cn55wcadov0szdx3775lz")
            if event == "Submit":
                if "bpmn" in values:
                    if values["bpmn"][-4:] != "bpmn":
                        sg.popup("Error 432: File 1 is not a BPMN file",
                                 icon=ic)
                    if values["xml"][-3:] != "xml":
                        sg.popup("Error 433: File 2 is not an XML file",
                                 icon=ic)
                    if values["bpmn"][-4:] == "bpmn" and values["xml"][-3:] == "xml":
                        bpmnPath = values["bpmn"]
                        xmlPath = values["xml"]
                        try:
                            singleFile(bpmnPath, xmlPath)
                        except:
                            sg.popup("Error 428: Merge failed", icon=ic)
                if "batch" in values:
                    if platform.platform()[:7] == "Windows":
                        try:
                            batchPath = values["batch"].replace("/", "\\")
                            mergedFiles(batchPath)
                        except:
                            sg.popup(
                                "Error 436: System cannot find the path specified", icon=ic)
                    else:
                        try:
                            batchPath = values["batch"]
                            print(batchPath)
                            mergedFilesMac(batchPath)
                        except:
                            sg.popup(
                                "Error 436: System cannot find the path specified", icon=ic)
            if event == "Back":
                mainLocation = window1.CurrentLocation()
                location_x = mainLocation[0]
                location_y = mainLocation[1]
                window1.Move(location_x, location_y)
                window1.UnHide()
                singleWindow_active = False
                window2.Close()
            if event is None:
                window1.Close()


if __name__ == "__main__":
    main()
