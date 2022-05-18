public class Lesson2Exercise1 {
  public static void main(String[] args) throws java.io.IOException {

    int input;
    char input2;

    System.out.println("Enter any CAPITAL letter from the keyboard: ");

    input = System.in.read();
    input2 = (char) input;

    for(input = 65; input <= 90; input++) {
      System.out.println("Letter\t\tAscii Value\n" + input2 + "\t\t" + input);
      input = input2++;
    }

  }
}
