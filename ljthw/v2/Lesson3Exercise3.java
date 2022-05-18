import java.util.Scanner;

public class Lesson3Exercise3 {
  public static void main(String[] args) {

    double width;
    double length;
    double perimeter;
    double area;

     Scanner userSide = new Scanner(System.in);

     System.out.println("Enter the length of the rectangle: ");
     if(userSide.hasNextDouble()) {
     length = userSide.nextDouble();
     System.out.println("Enter the width of the rectangle: ");
     if(userSide.hasNextDouble()) {
     width = userSide.nextDouble();
     perimeter = width + width + length + length;
     area = length * width;
     System.out.println("The perimeter of this rectangle is: " + perimeter);
     System.out.println("The area of this rectangle is: " + area);
     }
   }
  }
}
