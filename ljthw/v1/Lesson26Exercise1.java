public class Lesson26Exercise {
  public static void main(String[] args) {
    int num;

    System.out.println("num\t\ta=num+2\t\tb=num-2\t\tc=num*2\t\td=num/2");

    for(num = 1; num <= 15; num++) {
      int a = num, b = num, c = num;
      double d = num;

      a += 2;
      b -= 2;
      c *= 2;
      d /= 2;

      System.out.println(num + "\t\t" + a + "\t\t" + b + "\t\t" + c + "\t\t" + d);


    }
  }
}
