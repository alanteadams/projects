import java.util.Scanner;

public class Lesson5Exercise1 {
  public static void main(String[] args) {

    int userGuess = 0;
    Scanner guessState = new Scanner(System.in);

    System.out.println("How many states are in the USA?");

    if(guessState.hasNextInt()) {
      userGuess = guessState.nextInt();
    }

      if(userGuess == 50) {
        System.out.println("Lo entindiste corractamente");
      } else {
          if (userGuess > 50) {
          System.out.println("You answer is too high.");
        } else {
          System.out.println("Your answer is too low.");
        }
    }
  }
}
