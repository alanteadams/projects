public class Lesson1Exercise1 {
  public static void main(String[] args)
  throws java.io.IOException {

    char character;

    System.out.println("The capital of the United States is Washington, DC? (Answer T of F): ");
    character = (char) System.in.read();

    if (character == 'T') {
      System.out.println("Correct!");
    } if (character == 'F') {
      System.out.println("Incorrect!");
    }
  }
}
