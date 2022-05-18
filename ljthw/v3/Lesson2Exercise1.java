import java.util.Scanner;

public class Lesson2Exercise {
  public static void main(String[] args) {

    Scanner userInput = new Scanner(System.in);
    int num1 = 0;
    int num2 = 0;
    int largerNum;

    System.out.println("Please Input two separate integers between 1 and 100");

    if (userInput.hasNextInt()) {
    num1  = userInput.nextInt();
    num2 = userInput.nextInt();
    }

    largerNum = whichNumLarger(num1, num2);

    System.out.println(largerNum + " is the larger number.");

  }

  public static int whichNumLarger(int a, int b) {
    if (a > b) {
      return a;
    } else {
      return b;
    }
  }
}
