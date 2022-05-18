#from sys package import the argv module
from sys import argv
#unpack variables from left to right.
script, input_file = argv
# has-a function print_all that takes an f parameter. Read the file.
def print_all(f):
    print(f.read())
# has-a rewind function that takes an f. Sets the cursor to line 0.
def rewind(f):
    f.seek(0)
#has-a function print_a_line that takes two argument. This prints the line_count and read a specific line.
def print_a_line(line_count, f):
    #this passes a line number, to print that specific line
    print(line_count, f.readline())
#open the file and passes to current_file.
current_file = open(input_file)
#prints a string.
print("First let's print the whole file.:\n")
#call print_all function and passes it a string.
print_all(current_file)
#print the string.
print("Now let's rewind, kind of like a tape.")
# call the rewind function and passes it the current_file.
rewind(current_file)
#prints a string
print("Let's print three lines:")
#saves 1 to the current_line variable
current_line = 1
#calls the print_a_line and passes it to variable.
print_a_line(current_line, current_file)
#updates the current_line by 1.
current_line += 1
print_a_line(current_line, current_file)
#updates the current_line by 1.
current_line += 1
print_a_line(current_line, current_file)
