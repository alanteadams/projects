public class Lesson9Exercise1 {
  public static void main(String[] args) {

    int i;

    for(i = 1; i <= 100; i++) {

      if(i % 2 != 0)
      continue;
      System.out.println(i);
    }
    System.out.println("You have to stick to programming and focus on what's in front you. (Fast Lane!)");
  }
}
