public class Lesson10Exercise1 {
  public static void main(String[] args) {
    String a = new String("Lou, Lou, skip to my Lou");
    String b = new String("Lou, Lou, skip to my Lou");
    String c = new String("lou, lou, skip to my lou");
    String d = new String("Skip to my Lou, my darlin!");

    System.out.println(a);
    System.out.println(b);
    System.out.println(c);
    System.out.println(d);

    System.out.println("String 1 compared with String 2: " + a.equals(b));
    System.out.println("String 1 compared with String 3: " + a.equals(c));
    System.out.println("String 1 compared with String 4: " + a.equals(d));
  }
}
