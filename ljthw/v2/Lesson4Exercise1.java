import java.util.Scanner;

public class Lesson4Exercise1 {
  public static void main(String[] args) {

    Scanner ageInput = new Scanner(System.in);

    int ageReal = 25;
    int age = 0;

    System.out.println("Guess my age por favor. ");

    if(ageInput.hasNextInt()) {
      age = ageInput.nextInt();
    } if (age == ageReal) {
      System.out.println("Lo entendiste' corractamente!");
    } else {
      System.out.println("You guessed the wrong age.");
    }


  }
}
