/*Exercise 1

Create an one dimensional array with the following floating point data:
332.1
55.4
76.4
88.5
45.3
88.8
76.7

Use a for loop that utilizes the length instance variable for this array
to print the contents of this array. Next, add a few additional values to the array
and verify that the print loop continues to function properly.


 */

 public class Lesson5Exercise1 {
   public static void main(String[] args) {

     int i;
     double oneDem[] = {332.1, 55.4, 76.4, 88.5, 45.3, 88.8, 76.7, 78, 1 ,2,3,3,4,5,56};

     for(i = 0; i <= oneDem.length - 1; i++) {
       System.out.println(oneDem[i]);
     }
   }
 }
