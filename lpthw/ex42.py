## Animal is-a object (yes, sort of confusing) look at the extra credit
#class Animal is-a object.
class Animal(object):
    def hey(g):
        print("I am an Animal")

## ??
#class Dog is-a Animal that has-a __init__ that takes a self and name parameter.
class Dog(Animal):

    def __init__(self, name):
        #from self get the name attribute and set it to 'name'.
        ## ??
        self.name = name
    def boaz(g):
        print("I am a dog.")

## ??
# class Cat is-a Animal that has-a __init__ that takes a self and name paremeter.
class Cat(Animal):

    def __init__(self, name):
        # from self gert the name attribute and seit to 'name'
        ## ??
        self.name = name
    def meow(g):
        print("I am a cat.")

## ??
# class Person is-a object that has-init that that takes a self and name parameter.
class Person(object):

    def __init__(self, name):
        # from self get the name attribute and set it to name.
        ## ??
        self.name = name
        # from self get the pet attribute and set it to None.
        ## person has-a pet of some kind
        self.pet = None
    def people(g):
        print(f"I am a person.{g}")

## ??
# class Employee is-a Person that has-a __init__ that takes a self, name, and salary parameter.
class Employee(Person):

    def __init__(self, name, salary):
        ## ?? hmm what is this strange magic?
        #i want the name of the parent class.
        super(Employee, self).__init__(name)
        ## ??
        # from self get the salary attribute and set it to salary.
        self.salary = salary
    def somos(g):
        print("I am an Employee.")

## ??
# class Fish is-a object.
class Fish(object):
    def fishy(g):
        print("Go Fish!")

## ??
# class Salmon is-a Fish.
class Salmon(Fish):
    def sal(g):
        print("Mmmmh, Salmon!")

## ?
# class Halibut is-a Fish
class Halibut(Fish):
    def hold_up(g):
        print("I am a Halibut")


## rover is-a Dog
rover = Dog("Rover")

## ??
# get an instance of cat and set it to satan and call it with paremters "satan"
satan = Cat("Satan")

## ??
# get an instance of person and call it with "mary" and set it to mary.
mary = Person("Mary")

## mary.pet = satan
#from mary get get the pet attribute and set it to satan.
mary.pet = satan

## ??
#get an instance of the Employee and pass it frank and 120000 and set it to frank
frank = Employee("Frank", 120000)

## ??
# from frank get the pet attribute and set it to rover.
frank.pet = rover

## ??
# get an instance of flipper and set it to fish.
flipper = Fish()

## ??
# get an instance of Salmon() and set it crouse.
crouse = Salmon()

## ??
# get an instance of Halibut and set it to harry.
harry = Halibut()

g = Animal()

harry.hold_up()
crouse.sal()
flipper.fishy()
satan.meow()
rover.boaz()
mary.people()
frank.somos()
g.hey()
