#include <stdio.h>
#include <stdlib.h>

int main(int argc, char *argv[])
{
  int i = 0;

  // go through each string in argv
  // why am I skipping argv[0]?
  for (i = 1; i < argc; i++) {
    printf("arg %d: %s\n", i, *(argv + i));
  }

  // let's make your own array of strings
  /*
  char *states[] = {
      "California", "Oregon",
      "Washington", "Texas"
  };
  */

  char **states = malloc(sizeof(states[0][0]) * 4);

  states[0] = "California";
  states[1] = "Oregon";
  states[2] = "Washington";
  states[3] = "Texas";

  int num_states = 4;

  for (i = 0; i < num_states; i++) {
    printf("state %d: %s\n", i, *(states + i));
  }

  return 0;
}
