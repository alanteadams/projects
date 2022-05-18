import java.util.Scanner;

public class Lesson6Exercise1 {
  public static void main(String[] args) {

    int grade = 0;

    Scanner userGrade = new Scanner(System.in);

    System.out.println("What did you recieve on your exam?");

    if (userGrade.hasNextInt()) {
      grade = userGrade.nextInt();
    }

    System.out.println("You scored a \"" + grade + "\".");

    if (grade >= 90) {
      System.out.println("You earned an \"A\" on the Exam!");
    } else if ((grade >= 80) && (grade <= 90)) {
      System.out.println("You earned a \"B\" on the Exam!");
    } else if ((grade >= 70) && (grade <= 80)) {
      System.out.println("You earned a \"C\" on the Exam!");
    } else if ((grade >= 60) && (grade <= 70)) {
      System.out.println("You earned a \"D\" on the Exam!");
    } else {
      System.out.println("You earned an \"F\" on the Exam!");
    }
  }
}
