// Write another program that uses math on the letter to convert it to lowercase, and then remove all of the extraneous uppercase letters in the switch.

#include <stdio.h>

int main(int argc, char *argv[])
{
  if (argc != 3) {
    printf("ERROR: You need two arguments.\n");

    return 1;
  }

  int i = 0;
  int letter2 = 0;
  char letter;

  for (i = 0; argv[1][i] != '\0'; i++) {
    letter = argv[1][i];
    letter2 = letter;


    if (letter2 >= 65 && letter2 <= 90) {
      letter2 += 32;
      letter = letter2;

    } else {
      printf("ERROR: PLEASE INPUT ONLY CAPITAL LETTERS!\n");

       return 1;
    }

    if ((letter == 'a') || (letter == 'e') || (letter == 'i') || (letter == 'o') || (letter == 'u')) {
      printf("%d: '%c'\n", i, letter);

    } else if (letter == 'y') {
      if (i > 2) {
        printf("%d: '%c'\n", i, letter);
      } } else {
        printf("%d: %c is not a vowel.\n", i, letter);
      }
/*
    switch (letter) {

      case 'a':
          printf("%d: 'a'\n", i);
          break;

      case 'e':
          printf("%d: 'e'\n", i);
          break;

      case 'i':
          printf("%d: 'i'\n", i);
          break;

      case 'o':
          printf("%d: 'o'\n", i);
          break;

      case 'u':
          printf("%d: 'u'\n", i);
          break;

      case 'y':

          if (i > 2) {
            printf("%d: 'y'\n", i);
          }
          break;

      default:
          printf("%d: %c is not a vowel.\n", i, letter);
  }
*/
}

for (i = 0; argv[2][i] != '\0'; i++) {
  letter = argv[2][i];
  letter2 = letter;


  if (letter2 >= 65 && letter2 <= 90) {
    letter2 += 32;
    letter = letter2;

  } else {
    printf("ERROR: PLEASE INPUT ONLY CAPITAL LETTERS!\n");

     return 1;
  }

  switch (letter) {

    case 'a':
        printf("%d: 'a'\n", i);
        break;

    case 'e':
        printf("%d: 'e'\n", i);
        break;

    case 'i':
        printf("%d: 'i'\n", i);
        break;

    case 'o':
        printf("%d: 'o'\n", i);
        break;

    case 'u':
        printf("%d: 'u'\n", i);
        break;

    case 'y':

        if (i > 2) {
          printf("%d: 'y'\n", i);

        }
        break;


    default:
        printf("%d: %c is not a vowel.\n", i, letter);
}
}
    return 0;
}
