/*SELECT * FROM pet;*/

/*Deleting people who have dead pets*/

/*DELETE FROM pet WHERE id IN (
  SELECT person_pet.pet_id FROM person, pet, person_pet
  WHERE
  person.id = person_pet.person_id AND
  pet.id = person_pet.pet_id AND
  person.first_name = 'Alante' AND
  pet.dead = 1
);*/

/* Doing the inverse and deleting people who have dead pets */

/*SELECT * FROM person;
SELECT * FROM pet;
DELETE FROM person WHERE id IN (
SELECT person_pet.person_id FROM person, person_pet, pet
WHERE
person.id = person_pet.person_id AND
pet.id = person_pet.pet_id AND
pet.dead = 1
);

SELECT * FROM person;*/

SELECT * FROM person_pet;

DELETE FROM person_pet WHERE pet_id IN (
  SELECT pet.id FROM pet, person, person_pet
  WHERE
  pet.id = person_pet.pet_id AND
  person.id = person_pet.person_id AND
  pet.dead = 1

);

SELECT * FROM person_pet;
