/* normal join equality */
SELECT pet.id, pet.name, pet.age, pet.dead
FROM pet, person_pet, person
WHERE
person_pet.person_id = person.id AND
person_pet.pet_id = pet.id AND
person.first_name = 'Zed';

/* Using a subselect */
SELECT pet.id, pet.name, pet.age, pet.dead
FROM pet
WHERE pet.id IN (
  SELECT pet_id
  FROM person_pet, person
  WHERE person_pet.person_id = person.id AND
  person.first_name = 'Zed'

);
