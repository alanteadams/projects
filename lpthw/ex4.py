#save 100 into this reference variable
cars = 100
#save 4.0 floating point decimal into this refernece variable
space_in_a_car = 4.0
#save 30 into this reference variable
drivers = 30
#save 90 into this reference variable
passengers = 90
#subtract drivers 30 from cars 100.
cars_not_driven = cars - drivers
#pass drivers to reference variable cars_driven
cars_driven = drivers
#mutliply these two referene variable with the data that's in them
carpool_capacity = cars_driven * space_in_a_car
#pass the division to the average_passengers_per_car reference variable.
average_passengers_per_car =passengers / cars_driven


print("There are", cars, "cars available.")
print("There are only", drivers, "drivers available.")
print("There will be", cars_not_driven, "empty cars today.")
print("We can transport", carpool_capacity, "people today.")
print("We have", passengers, "to carpool today.")
print("We need to put about", average_passengers_per_car, "in each car.")
