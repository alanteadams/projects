# has a function cheese_and_crackers that takes two parameters called cheese_count, and boxes_of_crackers
def cheese_and_crackers(cheese_count, boxes_of_crackers):
    #prints a formatted string with the passed parameter.
    print(f"You have {cheese_count} cheeses!")
    #prints a formatted string with the pass parameter.
    print(f"You have {boxes_of_crackers} boxes of crackers!")
    #printing a string
    print("Man that's enough for a party!")
    #print a string with the backslash in \n to get a linefeed.
    print("Get a blanket.\n")

# printing a string
print("We can just give the functions numbers directly:")
#calling the function cheese_and_crackers and passing it to arguments
cheese_and_crackers(20, 30)

#printing the the string
print("OR, we can use variables from our script:")
#passing a value to a variable to store
amount_of_cheese = 10
#passing a value to a variable to store
amount_of_crackers = 50
#calling the function cheese_and_and_crackers and passing it two arguments.
cheese_and_crackers(amount_of_cheese, amount_of_crackers)

#printing a statement
print("We can even do math inside too:")
#calling a function and passing it to arguments.
cheese_and_crackers(10 + 30, 5 + 6)

#printing a string
print("And we can combine the two, variables and math:")
#calling a function and passing it to arguments.
cheese_and_crackers(amount_of_cheese + 100, amount_of_crackers + 1000)

def alante(height, weight):
    print(f"My fucking height is: {height} and weight is: {weight}")

print("Way 1: ")
alante(66, 150)
print("Way 2: ")
alante(30 + 5, 50 + 50)
print("Way 3: ")
height1 = 25
weight1 = 30
alante(height1, weight1)
print("Way 4: ")
alante(height1 + 10, weight1 + 40)
print("Way 5: ")
alante(20 + height1, 30 + weight1)
print("Way 6: ")
alante("I said", "Stop")
print("Way 7: ")
alante("\n", "Why!")
print("Way 8: ")
height1 = input("Enter Height Please!: ")
weight1 = input("Enter Weight Please!: ")
alante(weight1, height1)
print("Way 9: ")
alante("try" + "me", "I'm serious.")
print("Way 10: ")
alante(90/30, 50/10)
