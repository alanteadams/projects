public class Lesson8Exercise1 {
  public static void main(String[] args) throws java.io.IOException {

    int i;
    char letterTest = 'A';
    char favL;


    System.out.println("Print your favorite letter please!");
    favL  = (char) System.in.read();

    for(i = 1; i <= 26; i++) {

      if (favL == letterTest)
        break;

        letterTest++;
      }
      System.out.println("Your favorite letter is " + favL + " which is letter number " + i);
  }
}
