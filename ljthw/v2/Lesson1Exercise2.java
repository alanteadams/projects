public class Lesson1Exercise2 {
  public static void main(String[] args) throws java.io.IOException {

    char input;

    System.out.println("I am thinking of a letter between A and Z.\nGuess my letter: ");
    input = (char) System.in.read();

    if ((input == 'W') || (input == 'w')) {
      System.out.println("Correct!");
    } if ((input != 'W') && (input != 'w')) {
      System.out.println("Nope, not correct!");
    }
  }
}
