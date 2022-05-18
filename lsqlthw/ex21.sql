/* test our query from ex16 */
SELECT pet.breed, pet.dead, count(dead)
FROM person, person_pet, pet
WHERE person.id = person_pet.person_id AND
      pet.id = person_pet.pet_id
GROUP BY pet.breed, pet.dead;

/* create the view */
CREATE VIEW dead_pets AS
SELECT pet.breed, pet.dead, count(dead) AS total
FROM person, person_pet, pet
WHERE person.id = person_pet.person_id AND
      pet.id = person_pet.pet_id
GROUP BY breed, dead;

/*Try it out*/
SELECT * FROM dead_pets WHERE total > 10;

/* get rid of Cats to see if it changes dead_pets */
DELETE FROM pet WHERE breed = 'Cat';

SELECT * FROM dead_pets;

/* Drop */
DROP VIEW dead_pets;
