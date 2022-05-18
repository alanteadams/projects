import java.util.Scanner;

public class Lesson19Exercise1 {
  public static void main(String[] args) {

    Scanner userInput = new Scanner(System.in);
    String j = "";

    System.out.println("User Please input something to the screen.");

    j = userInput.nextLine();
    j = j.toUpperCase();

    System.out.println(j);
  }
}
