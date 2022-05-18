from sys import argv

script, user_name, third = argv
prompt = f'Please enter an answer {user_name} '

print(f"Hi {user_name}, I'm the {script} script.")
print("I'd like to ask you a few questions.")
print(f"Do you like me {user_name}?")
likes = input(prompt)

print(f"Where do you live {user_name}?")
lives = input(prompt)

print("What kind of computer do you have?")
computer = input(prompt)

print(f"What is a spanish word that is on your mind {user_name}")
spanish = input(prompt)

print(f"""
Alright, so you said {likes} about liking me.
You live in {lives}. Not sure what that is.
And you have a {computer} computer. Nice.
You enter this spanish word {third}.
""")
