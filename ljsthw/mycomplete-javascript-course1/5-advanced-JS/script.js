// Function constructor
/*
var john = {
  name: 'John',
  yearOFBirth: 1990,
  job: 'teacher'
};
*/

/*
var Person = function(name, yearOfBirth, job) {
  this.name = name;
  this.yearOfBirth = yearOfBirth;
  this.job = job;
};

Person.prototype.calculateAge = function() {
    console.log(2016 - this.yearOfBirth);
};

Person.prototype.lastName = 'Smith';

var john = new Person('John', 1990, 'teacher');
var jane = new Person('Jane', 1969, 'designer');
var mark = new Person('Mark', 1948, 'retired');

john.calculateAge();
jane.calculateAge();
mark.calculateAge();

console.log(john.lastName);
console.log(jane.lastName);
console.log(mark.lastName);
*/

/*
var Ibmer = function(firstName, lastName, jobTitle) {
  this.firstName = firstName;
  this.lastName = lastName;
  this.jobTitle = jobTitle;
};

Ibmer.prototype.getOnProject = function() {
  console.log(this.firstName + ' ' + this.lastName + " who is an " + this.jobTitle + " will leverage ABAP, TDD, OOP, Java, Python, Javascript, Linux Knowledge To Provide Value to the Client.")
};

var alante = new Ibmer('Alante\'', 'Adams', 'ABAP Developer');
var helen = new Ibmer('Helen', 'Ayim', 'ABAP Developer');

helen.getOnProject();
alante.getOnProject();
*/
/*
var newSarpy = function(firstName, lastName, age, yourAge) {
  this.firstName = firstName;
  this.lastName = lastName;
  this.age = age;
  this.yourAge = yourAge;
};

newSarpy.prototype.calculateYearsOlder = function() {
  console.log(this.age - this.yourAge)
};

var lorraine = new newSarpy('Lorraine', 'Payne', 74, 25);
var kendra = new newSarpy('Kendra', 'Adams', 51, 25);

lorraine.calculateYearsOlder();
kendra.calculateYearsOlder();
*/

/*
var powerSchedule = function(time, activities, sleep_time) {

  this.time = time;
  this.activities = activities;
  this.sleep_time = sleep_time;
};

powerSchedule.prototype.calculateHoursPerActivity = function() {
 console.log((this.time - this.sleep_time) / this.activities)
};

var alante = new powerSchedule(24.0, 4.0, 8.0);
var helen = new powerSchedule(24.0, 14.0, 10.0);

alante.calculateHoursPerActivity();
helen.calculateHoursPerActivity();
*/




/*
var bossShit = function(firstName, lastName, nickName) {
  this.firstName = firstName;
  this.lastName = lastName;
  this.nickName = nickName;
};

bossShit.prototype.calculateBoss = function() {
  console.log("Hey my name is " + this.firstName + " " + this.lastName + " " + this.nickName);
};

var alante = new bossShit('Alante\'', 'Adams', 'A-Rock The General');
var helen = new bossShit('Helen', 'Ayim', 'Baby Girl');

alante.calculateBoss();
helen.calculateBoss();
*/




// Object.create
/*
var personProto = {
  calculateAge: function() {
    console.log(2016 - this.yearOfBirth);
  }

};


var john = Object.create(personProto);
john.name = 'John';
john.yearOfBirth = 1990;
john.job = 'teacher';


var jane = Object.create(personProto,
{
    name: { value: 'Jane' },
    yearOfBirth: { value: 1969 },
    job: { value: 'designer' }
});
*/



// Primitives vs Objects
/*
// Primitives
var a = 23;
var b = a;
a = 46;
console.log(a);
console.log(b);



// Objects
var obj1 = {
    name: 'John',
    age: 26
};
var obj2 = obj1;
obj1.age = 30;
console.log(obj1.age);
console.log(obj2.age);

// Functions
var age = 27;
var obj = {
  name: 'Jonas',
  city: 'Lisbon'
};

function change(a, b) {
   a = 30;
   b.city = 'San Fransisco';

}

change(age, obj);

console.log(age);
console.log(obj.city);
*/
////////////////////////////////////////////
// Lecture: Passing functions as arguments

/*
var years = [1990, 1965, 1937, 2005, 1998];

function arrayCalc(arr, fn) {
      var arrRes = [];
      for (var i = 0; i < arr.length; i ++) {
        arrRes.push(fn(arr[i]));
      }
      return arrRes;
}

function calculateAge(el) {
  return 2016 - el;
}

function isFullAge(el) {
  return el >= 18;
}

function maxHeartRate(el) {
  if (el >= 18 && el <= 81) {
  return Math.round(206.9 - (0.67 * el));
} else {
  return -1;
}
}

var ages = arrayCalc(years, calculateAge);
var fullAges = arrayCalc(ages, isFullAge);
var rates = arrayCalc(ages, maxHeartRate);


console.log(ages);
console.log(fullAges);
console.log(rates);
*/

// Lecture: Functions returning functions
/*
function interviewQuestion(job) {
   if (job === 'designer') {
     return function(name) {
       console.log(name + ', can you please explain what UX design is?')
     } }
     else if (job === 'teacher') {
        return function(name) {
          console.log('What subject do you teach, ' + name + '?');
        }
     } else {
         return function(name) {
            console.log('Hello ' + name + ', what do you do?');
         }
     }
   }

var teacherQuestion = interviewQuestion('teacher');
var designerQuestion = interviewQuestion('designer');

teacherQuestion('John');
designerQuestion('John');
designerQuestion('Jane');
designerQuestion('Mark');
designerQuestion('Mike');

interviewQuestion('teacher')('Mark');
*/




// Let's make a function that describes what kind of death a player experiences
/*
function death(room) {
    if (room === 'executive') {
      return function(name) {
      console.log('You dead like a ' + name);
    }
  } else if (room === 'military') {
       return function(name) {
      console.log('You dead like a ' + name);
    }
    } else {
        return function(name) {
      console.log('You dead like a ' + name);
    }
    }
}

var typeDeath = death('executive');
var genDeath = death('military');
typeDeath('leader');
genDeath('champion');
*/

/////////////////////////////////////
// Lecture: IIFE

/*
function game() {
  var score = Math.random() * 10;
  console.log(score >= 5);
}
game();
*/

/*
(function () {
    var score = Math.random() * 10;
    console.log(score >= 5);
})();

// console.log(score);

(function (goodLuck) {
    var score = Math.random() * 10;
    console.log(score >= 5 - goodLuck);
})(5);
*/

///////////////////////////////////////
// Lecture: Closures
/*
function retirement(retirementAge) {
  var a = ' years left until retirement.';
  return function(yearOfBirth) {
    var age = 2016 - yearOfBirth;
    console.log((retirementAge - age) + a);
  }
}

var retirementUS = retirement(66);
var retirementGermany = retirement(65);
var retirementIceland = retirement(67);

retirementGermany(1990);
retirementUS(1990);
retirementIceland(1990);
*/
/*
function interviewQuestion(job) {
   if (job === 'designer') {
     return function(name) {
       console.log(name + ', can you please explain what UX design is?')
     } }
     else if (job === 'teacher') {
        return function(name) {
          console.log('What subject do you teach, ' + name + '?');
        }
     } else {
         return function(name) {
            console.log('Hello ' + name + ', what do you do?');
         }
     }
   }

var teacherQuestion = interviewQuestion('teacher');
var designerQuestion = interviewQuestion('designer');

teacherQuestion('John');
designerQuestion('John');
designerQuestion('Jane');
designerQuestion('Mark');
designerQuestion('Mike');

interviewQuestion('teacher')('Mark');
*/






// retirement(66)(1990);



/*
function retirement(country, yearOfBirth) {
  var a = ' years left until retirement.'
  var age = 2019 - yearOfBirth
  return function(retirementAge) {
  if (country === 'US') {
      console.log((retirementAge - age) + a);
    }
  else if (country === 'Germany') {
    console.log((retirementAge - age) + a);
    } else {
      console.log((retirementAge - age) + a);
}
}
}


var us = retirement('US', 1994);
us('66');


var germany = retirement('Germany', 1994)
germany('65')


var iceland = retirement('Iceland', 1994)
iceland('67')
*/


///////////////////////////////////////////////
// Lecture: Bind, call and apply
/*
var john = {
    name: 'John',
    age: 26,
    job: 'teacher',
    presentation: function(style, timeOfDay) {
        if (style === 'formal') {
            console.log('Good ' + timeOfDay + ', Ladies and gentlemen! I\'m ' + this.name + ', I\'m a ' + this.job + ' and I\'m ' + this.age + ' years old.');
        } else if (style === 'friendly') {
            console.log('Hey! What\'s up? I\'m ' + this.name + ', I\'m a ' + this.job + ' and I\'m ' + this.age + ' years old. Have a nice ' + timeOfDay + '.');
        }
    }
}

var emily = {
    name: 'Emily',
    age: 35,
    job: 'designer'
};


john.presentation('formal', 'morning');

john.presentation.call(emily, 'friendly', 'afternoon');

// john.presentation.apply(emily, ['friendly, 'afternoon']);

var johnFriendly = john.presentation.bind(john, 'friendly');


johnFriendly('morning');
johnFriendly('night');

var emilyFormal = john.presentation.bind(emily, 'formal');

emilyFormal('aftnernoon');

*/
/*
var years = [1990, 1965, 1937, 2005, 1998];

function arrayCalc(arr, fn) {
      var arrRes = [];
      for (var i = 0; i < arr.length; i ++) {
        arrRes.push(fn(arr[i]));
      }
      return arrRes;
}

function calculateAge(el) {
  return 2016 - el;
}

function isFullAge(limit, el) {
  return el >= limit;
}

var ages = arrayCalc(years, calculateAge);
var fullJapan = arrayCalc(ages, isFullAge.bind(this, 20));
console.log(ages);
console.log(fullJapan);

*/


/*
--- Let's build a fun quiz game in the console! ---

1. Build a function constructor called Question to describe a question. A question should include:
a) question itself
b) the answers from which the player can choose the correct one (choose an adequate data structure here,
array, object, etc.)
c) correct answer (I would use a number for this)

2. Create a couple of questions using the constuctor

3. Store them all inside an array

4. Select one random question and log it on the console, together with the possible answers (each
question should have a number) (Hint: write a method for the Question objects for this task).

5. Use the 'prompt' function to ask the user for the correct answer. The user should input the number of the
correct answer such as you displayed it on Task 4.

6. Check if the answer is correct and print to the console whether the answer is correct or not (Hint:
write another method for this).

7. Suppose this code would be a plugin for other programmers to use in their code. So make sure that all
your code is private and doesn't interfere with the other programmmers code (Hint: we learned a special
technique to do exactly that).

8. After you display the result, display the next random question, so that the game never ends (Hint:
write a function for this and call it right after displaying the result)

9. Be careful: after Task 8, the game literally never ends. So include the option to quit the game if the user writes 'exit' instead of the answer.
In this case, DON'T call the function from task 8.

10. Track the user's score to make the game more fun! So each time an answer is correct, add 1 point to
the score (Hint: I'm going to use the power of closures for this, but you don't have to, just do this
with the tools you feel more comfortable at this point).

11. Display the score in the console. Use yet antoher method for this.
*/




// Build a function constructor called Question to describe a question. A question should include:
// a) a question itself b) the answers from which the player can choose the correct one( choose an adequate data structure here,
// array, object, etc.)
// correct answer ( I would use a number for this)

// build a function constuctor
// my solution
/*
var myCode = (function () {
var question = {
  quest: ['How do you solve a problem?', 'How do you market so that someone else can solve your problems?', 'What is the purpose of a machine?'],
  Ans0: ['0. Research', '1. Talking', '2. Not Working'],
  Ans1: ['0. Building', '1.  Finding Paying Customers ', '2. Waiting'],
  Ans2: ['0. Save Time', '1. Only for Games', '2. Facebook'],
};

// create a function that iterates for the answers maybe...
// console.log(question.quest[0]);
// console.log(question.Ans0[0] + '\n' + question.Ans0[1] + '\n' + question.Ans0[2]);

var q_zero, q_one, q_two

var gen_quest = function() {
  i = Math.floor(Math.random() * 2)
if (question.quest[i] === question.quest[1]) {
  q_zero = question.quest[0];
  console.log(question.quest[0]);
  console.log(question.Ans0[0] + '\n' + question.Ans0[1] + '\n' + question.Ans0[2]);
} else if (question.quest[i] === question.quest[2]) {
  q_one = question.quest[1]
  console.log(question.quest[1]);
  console.log(question.Ans1[0] + '\n' + question.Ans1[1] + '\n' + question.Ans1[2]);
} else {
  q_two = question.quest[i];
  console.log(question.quest[2]);
  console.log(question.Ans2[0] + '\n' + question.Ans2[1] + '\n' + question.Ans2[2]);
}
    return q_zero, q_one, q_two
}

gen_quest();

var answer = prompt("Please enter your answer.")

var prod_answ = function() {

if (q_zero && answer === '0') {
  console.log("Correct Answer!")
} else if (q_one && answer === '1') {
  console.log("Correct Answer!")
} else if (q_two && answer === '0') {
  console.log("Correct Answer!")
} else {
  console.log("Wrong Answer")
}

}

prod_answ();

})();
*/



/*
(function() {
console.log("Hey not fair this is a private method.")
function Question(question, answers, correct) {
    this.question = question;
    this.answers = answers;
    this.correct = correct;
}

Question.prototype.displayQuestion = function() {
  console.log("Who called displayQuestion.")
  console.log(this.question);

  for (var i = 0; i < this.answers.length; i++) {
        console.log(i + ': ' + this.answers[i]);
  }
  console.log("About to run this prompt.")
  var answer = parseInt(prompt('Please select the correct answer.'));
  console.log("I am leaving displayQuestion.")
  return this.checkAnswer(answer)
}

Question.prototype.checkAnswer = function(ans) {
    console.log("Who called checkAnswer!")
    if (ans === this.correct) {
      console.log('Correct answer!');
      return wrapper()
    } else if (ans != this.correct){
      console.log('Wrong Answer. Try Again!');
      return this.question;
    } else {
      console.log("hey!")
  }
  console.log("I am leaving checkAnswer calling nextRandomNumber")
}

console.log("When do you run me!")

var q1 = new Question('Is Javascript the coolest programming language in the world?', ['Yes', 'No'], 0);

var q2 = new Question('What is the name of this course\'s teacher?', ['John', 'Micheal', 'Jonas'], 2);

var q3 = new Question('What does best describe coding?', ['Boring', 'Hard', 'Fun', 'Tedious'], 2);

var questions = [q1, q2, q3];

var wrapper = function() {
    var n = Math.floor(Math.random() * 3)
    questions[n].displayQuestion(n);
 }

console.log("Hey I am down here, Alante'")

wrapper();

})();
*/



(function() {
function Question(question, answers, correct) {
    this.question = question;
    this.answers = answers;
    this.correct = correct;
}

Question.prototype.displayQuestion = function() {
  console.log(this.question);

  for (var i = 0; i < this.answers.length; i++) {
        console.log(i + ': ' + this.answers[i]);
  }
}

Question.prototype.checkAnswer = function(ans, callback) {
    if (ans === this.correct) {
      var sc;
      console.log('Correct answer!');
      sc = callback(true);

    } else {
      console.log('Wrong Answer. Try Again!');

      sc = callback(false);
    }
    this.displayScore(sc);
}

Question.prototype.displayScore =
function(score) {
  console.log('Your current score is: ' + score);
  console.log('------------------');
}

var q1 = new Question('Is Javascript the coolest programming language in the world?', ['Yes', 'No'], 0);

var q2 = new Question('What is the name of this course\'s teacher?', ['John', 'Micheal', 'Jonas'], 2);

var q3 = new Question('What does best describe coding?', ['Boring', 'Hard', 'Fun', 'Tedious'], 2);

var questions = [q1, q2, q3];

    function score() {
      var sc = 0;
      return function(correct) {
        if (correct) {
          sc++;
        }
        return sc;
      }
    }

    var keepScore = score();

    function nextQuestion() {

    var n = Math.floor(Math.random() * questions.length);

    questions[n].displayQuestion();

    var answer = prompt('Please select the correct answer.');

    if (answer !== 'exit') {

    questions[n].checkAnswer(parseInt(answer), keepScore);
    nextQuestion();
  }
}

nextQuestion();

})();
