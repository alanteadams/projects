#include <stdio.h>
#include <stdint.h>

int main(int argc, char *argv[]) {

  int i = 0;
  if (argc <= 3) {
    printf("Life is amazing.\n");
  }

  for (i = 0; i < argc; i++) {
    printf("%s ", argv[i]);
  }

  printf("\n");
}
