public class Lesson2Exercise2 {
  public static void main(String[] args) {

    int bossArray[] = new int [100];
    int i;

    for (i = 0; i <= 99; i++) {
      bossArray[i] = i * i;
    }
    for (i = 0; i <= 99; i++) {
      System.out.println("The square of " + i + " is " + bossArray[i]);
    }
  }
}
