/* include a header file that communicates with the input and output stream*/
#include <stdio.h>
/*header file to assert if something is true or false*/
#include <assert.h>
/*include this header file to get raw memory (malloc) and deal with pointers */
#include <stdlib.h>
/*manipulate strings*/
#include <string.h>

/*declare a structure name Person that has name, age, height, weight*/
struct Person {
  /*declare pointer name name that is of type char*/
  char *name;
  /*declare an integer named age*/
  int age;
  /*declare an int named height*/
  int height;
  /*declare an int named weight*/
  int weight;
};
/*create a function named *Person_create that returns a pointer named who that points to a structure named Person*/
struct Person *Person_create(char *name, int age, int height,
        int weight)
{
/*get a raw memory and assign it to *who*/
  struct Person *who = malloc(sizeof(struct Person));
  /*validates input or it outputs and error message it is truly a macro*/
  assert(who != NULL);
/*initialize the stucture with name usingth strdup which duplicates the string to make sure the string is in the structure*/
  who->name = strdup(name);
  /*initializes age to the structure element age*/
  who->age = age;
  /*initializes height to the structure element height*/
  who->height = height;
  /*initializes height to the sturcture element weight*/
  who->weight = weight;
  /*return the pointer called who to the caller this pointer points to a Person type structure */
  return who;
}
/*create a function that returns nothing pass it the structure */
void Person_destroy(struct Person *who)
{
  /*checks and see if the structure isn't null*/
  assert(who != NULL);
/*free up the strdup*/
  free(who->name);
  /*free up the raw memory that malloc create*/
  free(who);
}
/*create a Person_print that takes a pointer that point to a stuct Person type*/
void Person_print(struct Person *who)
/*prints structure elements/components*/
{
  printf("Name: %s\n", who->name);
  printf("\tAge: %d\n", who->age);
  printf("\tHeight: %d\n", who->height);
  printf("\tWeight: %d\n", who->weight);
}

int main(int argc, char *argv[])
{
  // make two people structures
  struct Person *joe = Person_create("Joe Alex", 32, 64, 140);

  struct Person *frank = Person_create("Frank Blank", 20, 72, 180);

  // print them out and where they are in memory
  printf("Joe is at memory location %p:\n", joe);
  Person_print(joe);

  printf("Frank is at memory location %p:\n", frank);
  Person_print(frank);

  // make everyone age 20 years and print them again
  joe->age += 20;
  joe->height -= 2;
  joe->weight += 40;
  Person_print(joe);

  frank->age += 20;
  frank->weight += 20;
  Person_print(frank);

  //destroy them both so we clean up

  Person_destroy(joe);
  Person_destroy(frank);


  return 0;
}
