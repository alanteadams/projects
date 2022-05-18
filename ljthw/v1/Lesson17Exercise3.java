public class LessonExercise3 {
    public static void main(String[] args) {

      int inches, counter = 0;
      double feet;

      for(inches = 1; inches <= 20; inches++) {
        feet = inches/12.0;
        if (inches == 1) {
          System.out.println(inches + " inch is equal to " + feet + " feet.");
        }
        if (inches != 1) {
        System.out.println(inches + " inches is equal to " + feet + " feet.");
        counter++;
      }

        if (counter == 4) {
          System.out.println();
          counter = 0;

        }
      }
    }
}
