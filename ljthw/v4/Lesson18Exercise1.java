public class Lesson18Exercise1 {
  public static void main(String[] args) {
    String jason = new String("jason went to washington dc.");

    System.out.println(jason);

    jason = jason.replace("j", "J");
    jason = jason.replace("w", "W");
    jason = jason.replace("dc", "DC");

    System.out.println(jason);
  }
}
