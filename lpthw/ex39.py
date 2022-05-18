# create a mapping of state to abbreviation
states = {
    'Oregon': 'OR',
    'Florida': 'FL',
    'California': 'CA',
    'New York': 'NY',
    'Michigan': 'MI'
}

# create a basic set of states and some cities in them.
cities = {
    'CA': 'San Fransisco',
    'MI': 'Detroit',
    'FL': 'Jacksonville'
}

# add some more cities
cities['NY'] = 'New York'
cities['OR'] = 'Portland'

# print out some cities
print('-' * 10)
print("NY State has: ", cities['NY'])
print("OR State has: ", cities['OR'])

# print some states
print('-' * 10)
print("Michigan's abbreviation is: ", states['Michigan'])
print("Florida's abbreviation is: ", states['Florida'])

# do it by using the state the cities dict
print('-' * 10)
print("Michigan has: ", cities[states['Michigan']])
print("Florida has: ", cities[states['Florida']])

# print every state abbreviation
print('-' * 10)
for state, abbrev in list(states.items()):
    print(f"{state} is abbreviated {abbrev}")

# print every city in state
print('-' * 10)
for abbrev, city in list(cities.items()):
    print(f"{abbrev} has the city {city}")

#  now do both at the same time
print('-' * 10)
for state, abbrev in list(states.items()):
    print(f"{state} state is abbreviated {abbrev}")
    print(f"and has city {cities[abbrev]}")

print('-' * 10)
# safely get a abbreviation from a state that might not be there.
state = states.get('Texas')

if not state:
    print("Sorry, no Texas")

# get a city with a defualt value
city = cities.get('TX', 'Does Not Exist')
print(f"The city for the state 'TX' is: {city}")

print('>' * 10)
city = {
    'Louisiana': 'Baton Rouge',
    'Maine': 'Portland',
    'Indiana': 'Gary'
}

city['Goergia'] = 'Atlanta'
city['Mississippi'] = 'Jackson'

for x, y in list(city.items()):
    print(f"{x} and {y}")
    print(f"{y} and {x}")

print(city['Louisiana'])
print(city['Maine'])
print(city['Indiana'])
