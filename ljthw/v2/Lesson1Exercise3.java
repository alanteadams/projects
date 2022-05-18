public class Lesson1Exercise3 {
public static void main(String[] args) throws java.io.IOException {

    char input;
    char upperCase;

    System.out.println("Type in any LOWERCASE letter: ");
    input = (char) System.in.read();
    System.out.println("You typed in the letter: " + input);

    upperCase = input -= 32;

    System.out.println("The Uppercase version is: " + upperCase);

}
}
