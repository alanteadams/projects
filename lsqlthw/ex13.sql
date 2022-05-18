/*Update the existing database records with the new column data using UPDATE statements. Don't forget about the purchased_on column in person_pet relation table to indicate when that person bought the pet.
Add 4 more people and 5 more pets and assign their ownership and what pets are parents. On this last part remember that you get the id of the parent, then set it in the parent column.
Write a query that can find all the names of pets and their owners bought after 2004. Key to this is to map the person_pet based on the purchased_on column to the pet and parent.
Write a query that can find the pets that are children of a given pet. Again look at the pet.parent to do this. It's actually easy so don't over think it.*/
ALTER TABLE person ADD COLUMN dead INTEGER;
ALTER TABLE person ADD COLUMN phone_number TEXT;
ALTER TABLE person ADD COLUMN salary FLOAT;
ALTER TABLE person ADD COLUMN dob DATETIME;
ALTER TABLE pet ADD COLUMN dob DATETIME;
ALTER TABLE person_pet ADD COLUMN purchased_on DATETIME;
ALTER TABLE pet ADD COLUMN parent INTEGER;

UPDATE person
SET dead = 0, phone_number = '222-222-2222', salary = 120000, dob = '1971-03-20'
WHERE person.id = 0;

UPDATE person SET dead = 0, phone_number = '333-333-3333', salary = 150000, dob = '1994-02-08'
WHERE person.id = 1;

INSERT INTO person (id, first_name, last_name, age, dead, phone_number, salary, dob)
    VALUES (2, 'Helen', 'Ayim', 23, 0, '324-456-8090', 780450678, '1995-10-27');

INSERT INTO person (id, first_name, last_name, age, dead, phone_number, salary, dob)
    VALUES (3, 'Lorraine', 'Payne', 74, 0, '459-345-7891', 459086445, '1994-03-12');

INSERT INTO person (id, first_name, last_name, age, dead, phone_number, salary, dob)
    VALUES (4, 'Aaron', 'Adams', 50, 0, '985-456-4435', 564345234, '1968-11-09');

INSERT INTO person (id, first_name, last_name, age, dead, phone_number, salary, dob)
    VALUES (5, 'Kendra', 'Adams', 51, 0, '985-500-1722', 7648923489, '1967-11-08');

UPDATE pet SET dob = '1989-02-07', parent = 10 WHERE pet.id = 0;
UPDATE pet SET dob = '1987-04-10', parent = 9 WHERE pet.id = 1;
UPDATE pet SET dob = '1951-06-15', parent = 8 WHERE pet.id = 2;
UPDATE pet SET dob = '1976-07-11', parent = 7 WHERE pet.id = 3;
UPDATE pet SET dob = '1980-06-12', parent = 6 WHERE pet.id = 4;
UPDATE pet SET dob = '1979-03-09', parent = 5 WHERE pet.id = 5;

UPDATE person_pet SET purchased_on = '2007-03-04' WHERE person_pet.pet_id = 0;
UPDATE person_pet SET purchased_on = '1994-06-09' WHERE person_pet.pet_id = 1;
UPDATE person_pet SET purchased_on = '2003-03-10' WHERE person_pet.pet_id = 2;
UPDATE person_pet SET purchased_on = '2002-09-03' WHERE person_pet.pet_id = 3;
UPDATE person_pet SET purchased_on = '2003-05-04' WHERE person_pet.pet_id = 4;
UPDATE person_pet SET purchased_on = '2003-02-30' WHERE person_pet.pet_id = 5;

INSERT INTO person_pet (person_id, pet_id, purchased_on)
    VALUES (2, 6, '1999-04-20');

INSERT INTO person_pet (person_id, pet_id, purchased_on)
    VALUES (3, 7, '2002-02-15');

INSERT INTO person_pet (person_id, pet_id, purchased_on)
    VALUES (4, 8, '2004-05-06');

INSERT INTO person_pet (person_id, pet_id, purchased_on)
    VALUES (5, 9, '2002-05-10');

INSERT INTO person_pet (person_id, pet_id, purchased_on)
    VALUES (5, 10, '2004-09-15');






INSERT INTO pet (id, name, breed, age, dead, dob, parent)
    VALUES (6, 'Learning', 'beast', 100, 0, '2003-11-06', 0);

INSERT INTO pet (id, name, breed, age, dead, dob, parent)
    VALUES (7, 'Power', 'Bull', 20, 0, '2004-08-12', 1);

INSERT INTO pet (id, name, breed, age, dead, dob, parent)
    VALUES (8, 'Respect', 'Lion', 19, 0, '1960-04-23', 2);

INSERT INTO pet (id, name, breed, age, dead, dob, parent)
    VALUES (9, 'Money', 'Eagle', 8, 0, '1970-04-10', 3);

INSERT INTO pet (id, name, breed, age, dead, dob, parent)
    VALUES (10, 'Self-Discipline', 'Ant', 100, 0, '1980-03-05', 4);





SELECT first_name, last_name, purchased_on
FROM person, pet, person_pet
WHERE person.id = person_pet.person_id AND
      pet.id = person_pet.pet_id AND
      person_pet.purchased_on > '2004-01-01';

SELECT name, breed
FROM person, pet, person_pet
WHERE person.id = person_pet.person_id AND
      pet.id = person_pet.pet_id AND
      pet.parent = 2;
