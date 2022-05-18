/*Exercise 1

Create an 8 element array with the following data:
12, 43, 54, 2, 7, 33, 65, 4

Use an enhanced for loop to search through this array and print out
the maximum and minimum elements of the array.
 */

 public class Lesson6Exercise1 {
   public static void main(String[] args) {
     int elemArray[] = {12, 43, 54, 2, 7, 33, 65, 4};
     int max = elemArray[0];
     int min = elemArray[0];

     for(int elements : elemArray) {

       if(elements > max) {
         max = elements;
       }
       if(elements < min) {

        min = elements;
      }
     }

     System.out.println("The largest is: " + max);
     System.out.println("The smallest is: " + min);

   }
 }
