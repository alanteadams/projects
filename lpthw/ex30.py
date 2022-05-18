people = 30
cars = 40
trucks = 15

def testerCars(people, cars):

    if cars > people:
        return ("We should take cars.")
    elif cars < people:
        return ("We should not take the cars.")
    else:
        return ("We can't decide.")

def testerTrucks(people, cars, trucks):

    if trucks > cars or trucks > people:
        return ("That's too many trucks.")
    elif trucks > cars or cars < people:
        return ("Maybe we could take the trucks.")
    else:
        return ("We still can't decide.")

def testerPeople(people, trucks):

    if people > trucks:
        return ("Alright, let's just take the trucks.")
    else:
        return ("Fine, let's stay home then.")


testerCars(people, cars)
testerTrucks(people, cars, trucks)
testerPeople(people, trucks)
