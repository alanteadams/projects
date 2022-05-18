/* Lightspeed is 186,282 miles per second.  Write a program
to calculate how far a lightbeam will travel after 300 minutes
and output the result to the screen.  Note that the answer
will need to be held in a "long" variable. */

public class Lesson18Exercise1 {
  public static void main(String[] args) {


    long lightSpeed = 186_282L;
    int minutes = 300;
    long howFar;

    howFar = lightSpeed * minutes * 60;

    System.out.println(howFar);


  }
}
