SELECT * FROM pet;

UPDATE pet SET name = 'Zed''s Pet' WHERE id IN (
      SELECT pet.id
      FROM person, pet, person_pet
      WHERE
      person.id = person_pet.person_id AND
      pet.id = person_pet.pet_id AND
      person.first_name = 'Zed'
);

SELECT * FROM pet;
