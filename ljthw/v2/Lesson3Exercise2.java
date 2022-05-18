import java.util.Scanner;

public class Lesson3Exercise2 {
  public static void main(String[] args) {

    double radius = 0;
    double area = 0;

    Scanner radiusInput = new Scanner(System.in);

    System.out.println("Enter the radius of the circle: ");

    if(radiusInput.hasNextDouble()) {
      radius = radiusInput.nextDouble();

      area = radius * radius * 3.14;
    }

    System.out.println("The radius of the circle is " + radius + " meters.\nThe area of the circle is " + area + " square meters.");
  }
}
