UPDATE person SET first_name = 'Hilarious Guy'
    WHERE first_name = 'Zed';

UPDATE pet SET name = 'Fancy Pants'
    WHERE id = 0;

SELECT * FROM pet;
SELECT * FROM person;


UPDATE person SET first_name = 'Zed'
    WHERE id = 0;

SELECT * FROM person;

UPDATE pet SET name = 'DECEASED'
    WHERE dead = 1;

SELECT * FROM pet;
