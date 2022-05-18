public class Lesson16Exercise1 {
  public static void main(String[] args) {
    String boss =  "Humpty Dumpty Sat On The Wall.";
    char j[] = new char[30];
    int i;

    System.out.println(boss);

    boss.getChars(0, 30, j, 0);

    for (i =29; i >= 0; i--) {
      System.out.println(j[i]);
    }



  }
}
