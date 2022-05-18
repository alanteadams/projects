#make a string and pass it to the variable formatter
formatter = "{} {} {} {}"
#print from the string formatter get the format function and pass 4 arguments, it replaces the {}
print(formatter.format(1, 2, 3, 4))
#print from the string formatter get the format function and pass it 4 string arguments, it replaces the {}
print(formatter.format("one", "two", "three", "four"))
#print from the string formatter get the format function and pass it 4 boolean argumenst, it replaces the {}
print(formatter.format(True, False, False, True))
#print, from the string formatter get the format function and pass it 4 variables, it replaces the {}
print(formatter.format(formatter, formatter, formatter, formatter))
#print, from the string formatter get the format function and pass it 4 string arguments, it replaces the {}
print(formatter.format(
    "Try your",
    "Own text here",
    "Maybe a Poem",
    "Or a song about fear"
))
