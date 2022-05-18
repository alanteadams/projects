/*
#include <stdio.h>
#include <ctype.h>

void print_letters(char arg[])
{
  int i = 0;

for (i = 0; arg[i] != '\0'; i++) {
  char ch = arg[i];

  if (isalpha((int)ch) || isblank((int)ch)) {
    printf("'%c' == %d ", ch, ch);
  }
}

printf("\n");
}

int main(int argc, char *argv[])
{
  int i = 0;

  for (i = 0; i < argc; i++) {
    print_letters(argv[i]);

  return 0;
}
}
*/

/*
Have print_arguments figure out how long each argument string is by using the strlen function
and then pass that length to print_letters. Then, rewrite print_letters so it only processes
this fixed length and doesn't rely on the '\0' terminator.
You'll need the #include <string.h> for this.
*/

#include <stdio.h>
#include <ctype.h>
#include <string.h>

// forward declarations
int can_print_it(char ch);
void print_letters(char arg[], int argcl);

void print_arguments(int argc, char *argv[])
{

  int i = 0;
  int argcl = 0;

  for (i = 0; i < argc; i++) {
    argcl = strlen(argv[i]);
    print_letters(argv[i], argcl);
  }
}

void print_letters(char arg[], int argcl)
{
  int i = 0;

for (i = 0; i <= argcl; i++) {
  char ch = arg[i];

  if (can_print_it(ch)) {
    printf("'%c' == %d %d ", ch, ch, argcl);
  }
}

printf("\n");
}

int can_print_it(char ch)
{
  return isalpha((int)ch) || isblank((int)ch);
}

int main(int argc, char *argv[])
{

  print_arguments(argc, argv);
  return 0;
}
