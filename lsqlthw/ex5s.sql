SELECT * FROM pet WHERE age > 10;

SELECT * FROM person WHERE age > 25;

SELECT * FROM person WHERE age < 25;

SELECT * FROM person WHERE first_name = 'Alante' AND age = '25';

SELECT first_name, last_name, age FROM person WHERE age > 24 AND last_name = 'Adams' OR last_name = 'Shaw' AND age = '37';
