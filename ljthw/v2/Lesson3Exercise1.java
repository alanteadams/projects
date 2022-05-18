import java.util.Scanner;

public class Lesson3Exercise1 {
public static void main(String[] args) {


  int calcAge;
  Scanner currentAge = new Scanner(System.in);

  System.out.println("Please input your age.");



  if(currentAge.hasNextInt()) {
    int placeHolder = currentAge.nextInt();
    calcAge = placeHolder + 14;
    System.out.println("You are now " + placeHolder + " years old.\nIn 14 years, you will be " + calcAge + " years old.");
  }
}
}
