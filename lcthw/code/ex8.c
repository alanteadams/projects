#include <stdio.h>

int main(int argc, char *argv[]) {

    int i = 0;

    if (argc == 1) {
        printf("You only have one argument. This is the name of your program %s.\n", argv[i]);
    } else if (argc > 1 && argc < 4) {
      printf("Here's your arguments:\n");

      for (i = 0; i < argc; i++) {
        printf("%s ", argv[i]);
      }
      printf("\n");
    } else {

      printf("You have too many arguments. Here is the remaining arguments\n");

      for (i = 3; i < argc; i++)
       printf("[%s], ", argv[i]);
    }
     printf("\n");

    return 0;
}
