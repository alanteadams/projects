import java.util.Scanner;

public class Lesson1Exercise {
  public static void main(String[] args) {

    Scanner input = new Scanner(System.in);
    int user = 0;

    System.out.print("Enter the season by entering a number. (1=Spring, 2=Summer, 3=Fall, 4=Winter)\n");

    if(input.hasNextInt()) {
      user = input.nextInt();
    }



    if (user == 1) {
      printSpring();
    } else if (user == 2) {
      printSummer();
    } else if (user == 3) {
      printFall();
    } else if (user == 4){
      printWinter();
    } else {
      System.out.println("This is not a valid entry!");
    }
  }

  public static void printSpring() {
    System.out.println("The season is Spring, flowers are blooming!");
  }
  public static void printSummer() {
    System.out.println("The season is Summer, and it is getting hot!");
  }
  public static void printFall() {
    System.out.println("The season is Fall, and leaves are falling!");
  }
  public static void printWinter() {
    System.out.println("The season is Winter, and it is snowing!");
  }

}
