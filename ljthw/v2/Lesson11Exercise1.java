import java.util.Scanner;

public class Lesson11Exercise1 {
  public static void main(String[] args) {

    Scanner userInput = new Scanner(System.in);

    int correctGuess = 17;
    int input = 1;

    do {

          System.out.println("Guess a number between 1 and 20.");

          if(userInput.hasNextInt()) {
            input = userInput.nextInt();
          }

              if(input == correctGuess) {
                System.out.println("You are correct!");
              } else if (input < correctGuess) {
                System.out.println("Your guess is too low.");
              } else if (input > correctGuess) {
                System.out.println("Your guess it too high");
              }

    } while (input != 17);
  }
}
