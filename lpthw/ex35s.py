def start():
    print("Hey this is the start of the game.")

    user = input("> study or not \n")

    if "study" in user:
        study()
    elif "not" in user:
        dead()
    else:
        dead("Liquer is quicker.")

def study():
    print("""Very good you are being consistent.
    and learning Spanish. I am proud of you. You
    got what it takes to make it. You Win!""")

    exit(0)


def dead():
    print("""This is terrible you need to snap out of
    facebook, and all forms of media or else you
    will die a loser. Remember Tom Benson. Think Big!""")

    exit(0)



start()
