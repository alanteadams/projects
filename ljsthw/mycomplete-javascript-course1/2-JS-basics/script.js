/************************************
* Vriables and data types
*/
/*
var firstName = 'John';
console.log(firstName);

var lastName = 'Smith';
var age = 28;

var fullAge = true;
console.log(fullAge);

var job;
console.log(job);

job = 'Teacher';
console.log(job);

// Variables naming rules
var years = 3;
var johnMark = 'John and Mark';
var if = 23;
*/


/************************************
* Variable Mutation and Type Coercion
*/
/*
var firstName = 'John';
var age = 28;
// Type coercion
console.log(firstName + ' ' + age);

var job, isMarried;
job = 'teacher';
isMarried = false;

console.log(firstName + ' is a ' + age + ' year old ' + job + '. Is he married? ' + isMarried);



// Variable Mutation
age = 'twenty eight';
job = 'driver';

alert(firstName + ' is a ' + age + ' year old ' + job + '. Is he married? ' + isMarried);

var lastName = prompt('What is his last Name?');
console.log(firstName + ' ' + lastName);
*/



/**********************************
* Basic Operators
*/
/*
var year, yearJohn, yearMark;
now = 2019;
ageJohn = 28;
ageMark = 33;

// Math operators
yearJohn = now - ageJohn;
yearMark = now - ageMark;

console.log(yearJohn);

console.log(now + 2);
console.log(now * 2);
console.log(now / 10);


// Logical Operators
var johnOlder = ageJohn > ageMark;
console.log(johnOlder);


// typeof operator
console.log(typeof johnOlder);
console.log(typeof ageJohn);
console.log(typeof 'Mark is older than John');
var x;
console.log(typeof x);
*/



/**********************************
* Operator precedence
*/
/*
var now = 2019;
var yearJohn = 1989;
var fullAge = 18;

// Multiple operators
var isFullAge = now - yearJohn >= fullAge; // true
console.log(isFullAge);

// Grouping
var ageJohn = now - yearJohn;
var ageMark = 35;
var average = (ageJohn + ageMark) / 2;
console.log(average);

// Multiple assignments
var x, y;
x = y = (3 + 5) * 4 - 6; // 8 * 4 -6 // 32 - 6 // 26
console.log(x, y);

// 2+ 4 + 5
// More Operators
x *= 2;
console.log(x);
x += 10;
console.log(x);
x++;
console.log(x);
x--;
console.log(x);
*/

/*********************************
* CODING CHALLENGE 1
*/

/*
Mark and John are trying to compare their BMI (Body Mass BMI = mass / height^2 = mass / (height * height). (mass in kg and height in meter).

1. Store Mark's and John's mass and height in variables
2. Calculate both their BMIs
3. Create a boolean variable containing information about wether Mark has a higher BMI than John.
4. Print a string to the console containing the variable from step 3. (Something like "Is Mark's BMI higher than John's? true").

GOOD LUCK :)
*/
/*
var markMass, johnMass, markHeight, johnHeight, markBmi, johnBmi, _trueornot;

markMass = 150;
markHeight = 66
johnMass = 125;
johnHeight = 71;


markBmi = markMass / (markHeight * markHeight);
johnBmi = johnMass / (johnHeight * johnHeight);
console.log(markBmi, johnBmi);

_trueornot = markBmi > johnBmi;

console.log('Is Mark\'s BMI higher than John\'s? ' + _trueornot);
*/

/**********************************
* If / else statements
*/
/*
var firstName = 'John';
var civilStatus = 'single';

if (civilStatus === 'married'){
    console.log(firstName + ' is married!');
} else {
    console.log(firstName + ' will hopefully marry soon :)');
}


var isMarried = true;
if (isMarried) {
    console.log(firstName + ' is married!');
} else {
    console.log(firstName + ' will hopefully marry soon :)')
}


var markMass, johnMass, markHeight, johnHeight, markBmi, johnBmi, _trueornot;

markMass = 150;
markHeight = 66
johnMass = 125;
johnHeight = 71;


markBmi = markMass / (markHeight * markHeight);
johnBmi = johnMass / (johnHeight * johnHeight);

if (markBmi > johnBmi) {
    console.log('Mark\'s BMI is higher than John\'s.');
} else {
    console.log('John\'s BMI is higher than Marks\'s.');
}
*/
//console.log(markBmi, johnBmi);
//_trueornot = markBmi > johnBmi;
//console.log('Is Mark\'s BMI higher than John\'s? ' + _trueornot);

/*******************************
* Boolean logic
*/
/*
var firstName = 'John';
var age = 20;

if(age < 13) {
    console.log(firstName + ' is a boy.');
} else if (age >= 13 && age < 20) { // Between 13 and 20 === age >= 13 AND age < 20
    console.log(firstName + ' is a teenager.');
} else if (age >= 20 && age < 30) {
    console.log(firstName + ' is a young man.');

} else {
    console.log(firstName + ' is a man');
}
*/

/**********************************
* The Ternary Operator and Switch Statements
*/
/*
var firstName = 'John';
var age = 16;
// Ternary operator
age >= 18 ? console.log(firstName + ' drinks beer.')
: console.log(firstName + ' drinks juice.')

var drink = age >= 18 ? 'beer' : 'juice';
console.log(drink);

/*if (age >= 18) {
    var drink = 'beer';
} else {
    var drink = 'juice';
}*/

// Switch statement
/*
var job = 'instructor';
switch (job) {
    case 'teacher':
    case 'instructor':
        console.log(firstName + ' teaches kids how to code.');
        break;
    case 'driver':
        console.log(firstName + ' drives an uber in Lisbon.');
        break;
    case 'designer':
        console.log(firstName + ' designs beautiful websites.');
        break;
    default:
        console.log(firstName + ' does something else.');
}

age = 56;
switch(true) {
  case age < 13:
      console.log(firstName + ' is a boy.');
      break;
  case age >= 13 && age < 20:
      console.log(firstName + ' is a teenager.');
      break;
  case age >= 20 && age < 30:
      console.log(firstName + ' is a young man.');
      break;
  default:
      console.log(firstName + ' is a man.');

}
*/
/****************************
* Truthy and Falsy values and equality operators
*/

// falsy values: undefined, null, 0, '', NaN
// truthy values: NOT falsy values
/*
var height;
height = 23;

if (height || height === 0) {
    console.log('Variable is defined');
} else {
    console.log('Variable has NOT been defined');
}

// Equality Operators
if (height === '23') {
    console.log('The == operator does type coerciion!');
}
*/
/*********************************
* CODING CHALLENGE 2
*/

/*
John and Mike both play basketball on different teams. In the latest 3 games, Joh's team scored 89, 120 and 103 pointsm while Mike's team scored 116, 94 and 123 points.

1. Calculate the avarage score for each team
2. Decidie which teams wins in average (highest avarage score), and print the winner to the console. Also include the average score in the output.
3. Then change the scores to show different winners. Don't forget to take into account there might be a draw ( the same average score)

4. EXTRA: Mary also plays basketball, and her team scored 97, 134, and 105 points. Like before, log the average winner to the console. HINT: you will need the && operator to take the decision. If you can't solve this one, just watch the solution, iit's no problem :)
5. Like before, change the scores to generate different winners, keeping in mind there might be draws.

GOOD LUCK :)
*/
/*
var johnTavg;
var mikeTavg;
var maryTavg;

jScore1 = 200;
jScore2 = 200;
jScore3 = 200;

mScore1 = 200;
mScore2 = 200;
mScore3 = 200;

maScore1 = 200;
maScore2 = 200;
maScore3 = 200;

johnTavg = (jScore1 + jScore2 + jScore3) / 3;
mikeTavg = (mScore1 + mScore2 + mScore3) / 3;
maryTavg = (maScore1 + maScore2 + maScore3) / 3;
console.log(maryTavg, mikeTavg, johnTavg);

if (johnTavg > mikeTavg) {
  console.log('John\'s team is the winner at ' + johnTavg + ' because Mike\'s team average score of ' + mikeTavg + ' is lower.');
} else if (mikeTavg > johnTavg) {
  console.log('Mike\'s team is the winner at ' + mikeTavg + ' because John\'s team average score of ' + johnTavg + ' is lower.');
} else if (maryTavg > johnTavg && mikeTavg) {
  console.log('Mary\'s team is the winner at ' + maryTavg + ' because John\'s, and Mike\'s team average score of ' + johnTavg + ' ' + mikeTavg + ' respectively is lower.');
} else if (mikeTavg === johnTavg) {
  console.log('It is a two way tie between Mike and John ' + mikeTavg + johnTavg);
} else if (mikeTavg === maryTavg) {
  console.log('It is a two way tie between Mike and Mary ' + mikeTavg + maryTavg);
} else if (johnTavg === maryTavg) {
  console.log('It is a two way tie between John and Mary ' + johnTavg + maryTavg);

} else {
  console.log('It is a tie because check the score of Mike, John, and Mary Respectively ' + mikeTavg + ' ' + johnTavg + ' ' + maryTavg);
}
*/
/***********************************
*  Functions
*/
/*
function calculateAge(birthYear) {
    return 2018 - birthYear;
}

var ageJohn = calculateAge(1990);
var ageMike = calculateAge(1948);
var ageJane = calculateAge(1969);
console.log(ageJohn, ageMike, ageJane);

function yearsUntilRetirement(year, firstName) {
  var age = calculateAge(year);
  var retirement = 65 - age;

  if (retirement > 0) {
      console.log(firstName + ' retires in ' + retirement + ' years.');
} else {
      console.log(firstName + ' is already retired.');
}

}

yearsUntilRetirement(1990, 'John');
yearsUntilRetirement(1948, 'Mike');
yearsUntilRetirement(1969, 'Jane');
*/

/*************************************
* Functions Statements and Expression
*/

// Function declaration
// function whatDoYouDo(job, firstName) {}

// Function expression
/*
var whatDoYouDo = function(job, firstName) {
    switch(job) {
      case 'teacher':
          return firstName + ' teaches kids how to code';
      case 'driver':
          return firstName + ' drices a cab in Lisbon.';
      case 'designer':
          return firstName + ' designs beautiful websites';
      default:
          return firstName + ' does something else';
    }
}

console.log(whatDoYouDo('teacher', 'John'));
console.log(whatDoYouDo('designer', 'Jane'));
console.log(whatDoYouDo('retired', 'Mark'));
*/

/*****************************************
* Arrays
*/
//Initialize new array
/*
var names = ['John', 'Mark', 'Jane'];
var years = new Array(1990, 1969, 1948);

console.log(names[2]);
console.log(names.length);

//Mutate Array Data
names[1] = 'Ben';
names[names.length] = 'Mary';
console.log(names);

// Different data types
var john = ['John', 'Smith', 1990, 'designer', false];


john.push('blue');
john.unshift('Mr.');
console.log(john);

john.pop()
john.pop()
john.shift()
console.log(john);

console.log(john.indexOf(23));

var isDesigner = john.indexOf('designer') === -1 ? 'John is NOT a designer' : 'John IS a designer';
console.log(isDesigner);
*/

/*****************************************
* CODING CHALLENGE 2
*/

/*
John and his family went on a holiday and went to 3 different restaurants. The bills were $124, $48 and $268.
To tip the waiter a fair amount, John created  siimple tip calculator (as a function). He likes to tip 20% of the bill when the bill is less than $50, 15% when the bill is between &50 and $200, and 10% if the bill is more than $200.
In the end, John would like to have 2 arrays:
1) Containing all three tips (one for each bill)
2) Containing all three final paid amounts (biill + tip).

(Note: To calculate 20% of a value, simply multiply it with 20/100 = 0.2)

GOOD LUCK :)
*/
/*
function tipCalculator(bill) {
    var percentage;
    if (bill < 50) {
        percentage = .2;
    } else if (bill >= 50 && bill < 200) {
    percentage = .15;
  } else {
      percentage = .1;
  }
   return percentage * bill;
}

var bills = [124, 48, 268];
var tips = [tipCalculator(bills[0]),
            tipCalculator(bills[1]),
            tipCalculator(bills[2])];

var finalValues = [bills[0] + tips[0],
                  bills[1] + tips[1],
                  bills[2] + tips[2]];


console.log(tips, finalValues);
*/

/*************************************
* Objects and properties
*/
// Object Liiteral
/*
var john = {
  firstName: 'John',
  lastName: 'Smith',
  birthYear: 1990,
  family: ['Jane', 'Mark', 'Bob', 'Emily'],
  job: 'teacher',
  isMarried: false
};
console.log(john.firstName);
console.log(john['lastName']);
var x = 'birthYear';
console.log(john[x]);

john.job = 'designer';
john['isMarried'] = true;
console.log(john);
// new Object syntax
var jane = new Object();
jane.name = 'Jane';
jane.birthYear = 1969;
jane['lastName'] = 'Smith';
console.log(jane);
*/

/*************************************
* Objects and methods
*/

/*
var john = {
  firstName: 'John',
  lastName: 'Smith',
  birthYear: 1992,
  family: ['Jane', 'Mark', 'Bob', 'Emily'],
  job: 'teacher',
  isMarried: false,
  calcAge: function(birthYear) {
    this.age = 2018 - this.birthYear;
  }
};

john.calcAge();
console.log(john);
*/

/****************************************
* CODING CHALLENGE 4
*/

/*
Let's remember the first coding challenge where Mark and John compared their BMIIs. Let's now implement the same functionaliity with objects and methods.
1. For each of them, create an object with properties for theiir full name, mass, and heiight
2.Then, add a method to each object to calculate the BMI. Save the BMI to the object and also return it from the method.
3. In the end, log to the console who has the hgiht BMI, together with the full name and the respective BMII. Don't forget they might have the same BMi.

Remember: BMI = mass / height^2 = mass / (heigiht * heiight). (mass in kg and height in meter).

GOOD LUCK :)
*/

/*
var mark = {
  firstName: 'Mark',
  lastName: 'Williams',
  mass: 300,
  height: 80,
  calcBMI: function()  {
    this.BMI = this.mass / (this.height * this.height);
    return this.BMI;
  }
};

var john = {
  firstName: 'John',
  lastName: 'Paul',
  mass: 200,
  height: 71,
  calcBMI: function() {
    this.BMI = this.mass / (this.height * this.height);
    return this.BMI;
  }
};

switch(true) {
  case  mark.calcBMI() > john.calcBMI():
      console.log(mark.firstName + ' ' + mark.lastName + ' is higher with ' + mark.BMI);
      break;
  case john.BMI() > mark.BMI():
      console.log(john.firstName + ' ' + john.lastName + ' is higher with ' + john.BMI);
      break;
  default:
      console.log('It is a tie because Mark and John have a BMI respectively of ' + mark.BMI + ' ' + john.calcBMI);
}
*/
/*****************************************
* Loops and iteration
*/
/*
// For loop
for (var i = 1; i <= 20; i += 2) {
    console.log(i);
}

// i = 0, 0 < 10 true, log i to console, i++
// i = 1, 1 < 10 true, log i to the console i++
//...
// i = 9, 9 < 10 true, log i to the console i++
// i = 10, 10 < 10 FALSE, exit the loop!

var john = ['John', 'Smith', 1990, 'designer', false, 'blue'];
for (var i = 0; i < john.length; i++) {
    console.log(john[i]);
}

// While loop
var i = 0;
while (i < john.length) {
  console.log(john[i]);
  i++;
}
*/
/*
// continue and break statements
var john = ['John', 'Smith', 1990, 'designer', false, 'blue'];

for (var i = 0; i < john.length; i++) {
    if (typeof john[i] !== 'string') continue;
    console.log(john[i]);
}

for (var i = 0; i < john.length; i++) {
    if (typeof john[i] !== 'string') break;
    console.log(john[i]);
}



// Looping backwards
for (var i = john.length - 1; i >= 0; i--) {
    console.log(john[i]);
}
*/
/**************************************
*/

/*
Remember the tip calculator challenge? Let's create a more advanced version using everything we learned!

This time, John and his family went to 5 different restaurants. The bills wer $124, $48, $268, $180 and $42.
John likes to tip 20% of the bill when the bill is less than $50, 15% when the bill is between $50 and $200, and 10% if the bill is more than $200.

Implement a tip calculator usiing objects and loops:
1. Create an object with an array for the bill values
2. Add a method to calculate the tip
3. This method should include a loop to iterate over all the paid bills and do the tip calculations
4. As an output, create 1) a new array containing all tips, and 2) an array containing final paiid amounts (bill + tip). HINT: Start with two empty arrays [] as properties and then fill them up in the loop.

EXTRA AFTER FINISHING: Mark's family also went on a holiiday, going to 4 diferent restaurants. The bills were $77, $375, $110, and $45. Mark likes to tip 20% of the bill when the bill is less than $100, 10% when the bill is between $100 and $300, and 25% if the bill is more than $300 (different than John).

5. Implement the same functionality as before, this time usiing Mark's tipping rules
6. Create a function (not a method) to calculate the average of a given array of tips. HINT: Loop over the array, and in each iteration store the current sum in a variable (starting from 0). After you have the sum of the array, divide it by the number of elements in it (that's how you calculate the average)
7. Calculate the average tip for each family
8. Log to the console whiich family paid the highest tips on average.

GOOD LUCK ;)
*/


var jbillValues = {
  bills: [],
  tip: [],
  calcTip: function(bills) {

    this.bills  = bills

    for (var i = 0; i < bills.length; i++) {

      if(this.bills[i] < 50) {
        this.tip[i] = bills[i] * 0.2;

      } else if (bills[i] >= 50 && bills[i] <= 200) {
        this.tip[i] = bills[i] * .15;

      } else {
        this.tip[i] = bills[i] * .1;
      }


  //    console.log(this.tip);
  //    console.log(this.tip[i] + this.bills[i]);


    }
        return (this.tip);
  }

}

jbillValues.calcTip([124, 48, 268, 180, 42]);


var mbillValues = {
  bills: [],
  tip: [],
  calcTip: function(bills) {

    this.bills = bills

    for (var i = 0; i < bills.length; i++) {
      if(this.bills[i] < 100) {
        this.tip[i] = bills[i] * .20;
      } else if(this.bills[i] >= 100 && bills[i] <= 300) {
        this.tip[i] = bills[i] * .10;
      } else {
        this.tip[i] = bills[i] * .25;
      }

  //    console.log(this.tip);
  //    console.log(this.tip[i] + this.bills[i]);
    }
       return (this.tip);
  }
}

mbillValues.calcTip([77, 375, 110, 45])

function avgTips(calcTip) {
  var sum = 0;
  var mbillValues = {
    tips: [],
    }
      this.tips = calcTip
  for (i = 0; i < this.tips.length; i++) {
      sum = sum + tips[i];
  }

    average  =  sum / (this.tips.length);
         return (average);
}

var mikeAvg = avgTips(mbillValues.calcTip([77, 475, 110, 45]));
var johnAvg = avgTips(jbillValues.calcTip([124, 48, 268, 180, 42]));
console.log(mikeAvg, johnAvg);

if(mikeAvg > johnAvg) {
  console.log(mikeAvg + ' This is Mike\'s average.')
} else { console.log(johnAvg + ' This is John\'s average.')
}
