import os
import sys
import PySimpleGUIQt as sg


def uploadStatus(folderPath, matchingList):
    mergeCount = os.listdir(folderPath)
    mergeCount = float(len(mergeCount))
    matchCount = float(len(matchingList))

    percentCompleted = (mergeCount/matchCount)*100

    return percentCompleted, matchCount


def progressBar(percentCompleted, matchCount):
    for i in range(int(matchCount)):
        if not sg.OneLineProgressMeter('Progress', percentCompleted, 100, 'key'):
            break
