#from sys package import the argv library (module).
#from sys import argv
#unpack the arguments and assign it to these variables from left to right.
#script, filename = argv
#pass a paremeter to the open command and whatever it return save it to the txt variable.
filename = input('Type your filename here Please!')
txt = open(filename)
#print using the formatted one with filename
print(f"Here's your file {filename}:")
#print the .read function return.
print(txt.read())
#print the string to the screen.
#rint("Type the filename again:")
#input prompt for the user and save it the file_again variable.
#file_again = input("> ")
#use the open command and pass it a paremeter
#txt_again = open(file_again)
#print the return of the .read function.
#print(txt_again.read())
txt.close()
