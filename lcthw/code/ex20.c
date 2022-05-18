#include <stdio.h>

int main()
{
   char *str;

   /* Stored in read only part of data segment */
   str = "GfG";

   /* Problem:  trying to modify read only memory */
//   *(str+1) = 'n';
   printf("I just did it.\n");
   return 0;
}
