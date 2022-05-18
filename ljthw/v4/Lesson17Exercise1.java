public class Lesson17Exercise1 {
  public static void main(String[] args) {
    String password = new String("apples");
    String passWordTypedIn = new String("APPLES");


    if (passWordTypedIn.toLowerCase().equals(password)) {
      System.out.println("Password Accepted");
    } else {
      System.out.println("Wrong Password");
    }
  }
}
