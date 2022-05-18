public class Lesson11Exercise1 {
  public static void main(String[] args) {
    String a = "apple pie";
    String b = "zebras";
    String c = "bubble gum";
    String d = "Fish Sticks";

    System.out.println(a);
    System.out.println(b);
    System.out.println(c);
    System.out.println(d);

    if(a.compareTo(b) < 0) System.out.println("\"" + a + "\" comes before " + "\"" + b + "\"");
    if(a.compareTo(b) > 0) System.out.println("\"" + a + "\" comes after " + "\"" + b + "\"");

    if(a.compareTo(c) < 0) System.out.println("\"" + a + "\" comes before " + "\"" + c + "\"");
    if(a.compareTo(c) > 0) System.out.println("\"" + a + "\" comes after " + "\"" + c + "\"");

    if(a.compareTo(d) < 0) System.out.println("\"" + a + "\" comes before " + "\"" + d + "\"");
    if(a.compareTo(d) > 0) System.out.println("\"" + a + "\" comes after " + "\"" + d + "\"");

  }
}
