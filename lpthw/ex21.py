def add(a, b):
    print(f"ADDING {a} + {b}")
    return a + b

def subtract(a, b):
    print(f"SUBTRACTING {a} + {b}")
    return a - b

def multiply(a, b):
    print(f"MUTLIPLYING {a} * {b}")
    return a * b

def divide(a, b):
    print(f"DIVIDE {a} / {b}")
    return a / b


print("Let's do some math with just functions!")

age = add(30, 5)
height = subtract(74, 4)
weight = multiply(90, 2)
iq = divide(100, 2)

print(f"Age: {age}, Height: {height}, Weight: {weight}, IQ: {iq}")


# Puzzle for extra credit type it anyway.
print("Here is a puzzle.")

what = add(age, subtract(height, multiply(weight, divide(iq, 2))))

print("That becomes: ", what, "Can you do it by hand?")

ans1 = divide(iq, 2)
print(ans1)

ans2 = multiply(weight, ans1)
print(ans2)

ans3 = subtract(height, ans2)
print(ans3)

ans4 = add(age, ans3)
print(ans4)

tot = ans1 + ans2 + ans3 + ans4

monthly_salary = multiply(1500, multiply(1, divide(4, 2)))
print(monthly_salary)
yearly_salary = multiply(monthly_salary, 12)
print(yearly_salary)
