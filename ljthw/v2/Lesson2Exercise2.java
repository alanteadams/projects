public class Lesson2Exercise2 {
  public static void main(String[] args) throws java.io.IOException {

    char input, input2, input_l;

    System.out.println("Is it sunny outside? (Enter Y or N) ");

    input = (char) System.in.read();
    input_l = (char) System.in.read();

    System.out.println("Is it warm outside? (Enter Y or N) ");

    input2 = (char) System.in.read();


    System.out.println(input2 + ">>>>>>>>>" + input);

    if ((input == 'Y') && (input2 == 'Y')) {
      System.out.println("It is sunny and warm outside.");
    } if ((input == 'Y') && (input2 == 'N')) {
      System.out.println("It is sunny and cold outside.");
    } if ((input == 'N') && (input2 == 'Y')) {
      System.out.println("It is cloudy and warm outside.");
    } if ((input == 'N') && (input2 == 'N')) {
      System.out.println("It is cloudy and cold outside.");
    }
  }
}
