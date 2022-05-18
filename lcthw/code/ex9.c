#include <stdio.h>

int main(int argc, char *argv[])
{
    int i = 25;
    while(i <= 25 && i > 0) {
      if(i == 5) {
        printf("%d I am on five\n\n give me some space.\n", i);
        break;
      }
      printf("%d", i);
      i--;
    }

    // need this to add the final newline
    printf("\n");

    return 0;

}
