/*
#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[])
{
    // create two arrays we care about
    int *ages = malloc(sizeof(ages[0]) * 6);

    ages[0] = 23;
    ages[1] = 43;
    ages[2] = 12;
    ages[3] = 89;
    ages[4] = 2;
    ages[5] = -1;

    free(ages);

    char **names = malloc(sizeof(names[0][0]) * 5);

    names[0] = "Alan";
    names[1] = "Frank";
    names[2] = "Mary";
    names[3] = "John";
    names[4] = "Lisa";

    free(names);


     = {
      "Alan", "Frank",
      "Mary", "John", "Lisa"
    };


    // safely get the sizes of ages
    // int count = sizeof(ages) / sizeof(int);

    int i = 0;

    // first way using indexes
    for (i = 0; ages[i] != -1; i++) {
      printf("%s has %d years alive.\n", names[i], ages[i]);
    }

    printf("---\n");


    // setup the pointers to the start of the arrays
    int *cur_age = ages;
    char **cur_name = names;

    // second way using pointers
    for (i = count - 1; i >= 0; i--) {
      printf("%s is %d years old.\n",
              *(cur_name + i), *(cur_age + i));
    }

    printf("---\n");

    // third way, pointers are just arrays
    for (i = count - 1; i >= 0; i--) {
        printf("%s is %d years old again.\n", cur_name[i], cur_age[i]);
    }

    printf("---\n");

    // fourth way with pointers in a stupid complex way
    for (cur_name = names, cur_age = ages;
            (cur_age - ages) < count; cur_name++, cur_age++) {
        printf("%s lived %d years so far.\n", *cur_name, *cur_age);
    }


    return 0;
}



#include <stdio.h>

// first way using indexes
void first_way(int ages[], char *names[], int count) {

int i = 0;

for (i = 0; i < count; i++) {
  printf("%s has %d years alive.\n", names[i], ages[i]);
}

printf("---\n");
}

void second_way(int *cur_age, char **cur_name, int count) {
  // second way using pointers

  int i = 0;

  for (i = 0; i < count; i++) {
    printf("%s is %d years old.\n",
            *(cur_name + i), *(cur_age + i));
  }

  printf("---\n");

}

void third_way(int *cur_age, char **cur_name, int count) {
  // third way, pointers are just arrays

  int i = 0;

  for (i = 0; i < count; i++) {
      printf("%s is %d years old again.\n", cur_name[i], cur_age[i]);
  }

  printf("---\n");
}

void fourth_way(int *cur_age, char **cur_name, int ages[], int count) {
  // fourth way with pointers in a stupid complex way
  for (;(cur_age - ages) < count; cur_name++, cur_age++) {
      printf("%s lived %d years so far.\n", *cur_name, *cur_age);
  }
}

int main(int argc, char *argv[])
{
  // create two arrays we care about
  int ages[] = {23, 43, 12, 89, 2};
  char *names[] = {
    "Alan", "Frank",
    "Mary", "John", "Lisa"
  };

  // safely get the sizes of ages
  int count = sizeof(ages) / sizeof(int);

  first_way(ages, names, count);

  // setup the pointers to the start of the arrays
  int *cur_age = ages;
  char **cur_name = names;

  second_way(cur_age, cur_name, count);
  third_way(cur_age, cur_name, count);
  fourth_way(cur_age, cur_name, ages, count);


    return 0;
}
*/

#include <stdio.h>

// first way using indexes
void first_way(int ages[], char *names[], int count) {

int i = 0;

while (i < count) {
  printf("%s has %d years alive.\n", names[i], ages[i]);
  i++;
}

printf("---\n");
}

void second_way(int *cur_age, char **cur_name, int count) {
  // second way using pointers

  int i = 0;

  while (i < count) {
    printf("%s is %d years old.\n",
            *(cur_name + i), *(cur_age + i));
    i++;
  }

  printf("---\n");

}

void third_way(int *cur_age, char **cur_name, int count) {
  // third way, pointers are just arrays

  int i = 0;

  while (i < count) {
      printf("%s is %d years old again.\n", cur_name[i], cur_age[i]);
      i++;
  }

  printf("---\n");
}

void fourth_way(int *cur_age, char **cur_name, int ages[], int count) {
  // fourth way with pointers in a stupid complex way
  while ((cur_age - ages) < count) {
      printf("%s lived %d years so far.\n", *cur_name, *cur_age);
      cur_name++, cur_age++;
  }
}

int main(int argc, char *argv[])
{
  // create two arrays we care about
  int ages[] = {23, 43, 12, 89, 2};
  char *names[] = {
    "Alan", "Frank",
    "Mary", "John", "Lisa"
  };

  // safely get the sizes of ages
  int count = sizeof(ages) / sizeof(int);

  first_way(ages, names, count);

  // setup the pointers to the start of the arrays
  int *cur_age = ages;
  char **cur_name = names;

  second_way(cur_age, cur_name, count);
  third_way(cur_age, cur_name, count);
  fourth_way(cur_age, cur_name, ages, count);


    return 0;
}
