public class Lesson20Exercise1 {
  public static void main(String[] args) {

    char character_upper;
    int counter = 65;
    int counter_two = 97;
    char character_lower;

    for(counter = 65; counter <= 90; counter++){

      character_upper = (char) counter;
      character_lower = (char) counter_two;
      counter_two++;
      System.out.println(character_upper + "\t" + character_lower);
    }

  }
}
