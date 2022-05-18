import java.util.Scanner;

public class Lesson2Exercise2 {
  public static void main(String[] args) {

    Scanner userGrades = new Scanner(System.in);


    double grade1 = 0;
    double grade2 = 0;
    double grade3 = 0;

    double gradeAns;


    System.out.println("Please enter three grades from 0 to 100.");

    if (userGrades.hasNextDouble()) {
      grade1 = userGrades.nextDouble();
      grade2 = userGrades.nextDouble();
      grade3 = userGrades.nextDouble();
    }

    gradeAns = gradeAvg(grade1, grade2, grade3);

    System.out.println("Your average grade is: " + gradeAns);

  }
    public static double gradeAvg(double a, double b, double c) {
      return (a + b + c) / 3;
    }
 }
