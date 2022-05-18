#include <stdio.h>

int main()
{
      int height, width;
      printf("Enter the height and width of the rectangle: ");
      scanf("%d%d", &height, &width);
      int area = height * width;
      mvprintf("The area is %d sq. in.\n", area);
      return 0;
}
