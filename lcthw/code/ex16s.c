#include <stdio.h>

struct Person
{
  char *name;
  int age;
  int height;
  int weight;
};

void print_structure(struct Person g) {
  printf("Name: %s\n", g.name);
  printf("\tAge: %d\n", g.age);
  printf("\tHeight: %d\n", g.height);
  printf("\tWeight: %d", g.weight);

  printf("\n---------\n");
}

int main(int argc, char *argv[])
{
  struct Person joe;
  joe.name = "Joe Alex";
  joe.age = 32;
  joe.height = 64;
  joe.weight = 140;

  print_structure(joe);

  struct Person frank;
  frank.name = "Frank Blank";
  frank.age = 20;
  frank.height = 72;
  frank.weight = 180;

  print_structure(frank);

  return 0;
}
