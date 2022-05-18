public class Lesson4Exercise1 {
  public static void main(String[] args) {
    int revenueArray[][] = new int[12][2];
    int i;

    revenueArray[0][0] = 1;
    revenueArray[1][0] = 2;
    revenueArray[2][0] = 3;
    revenueArray[3][0] = 4;
    revenueArray[4][0] = 5;
    revenueArray[5][0] = 6;
    revenueArray[6][0] = 7;
    revenueArray[7][0] = 8;
    revenueArray[8][0] = 9;
    revenueArray[9][0] = 10;
    revenueArray[10][0] = 11;
    revenueArray[11][0] = 12;

    revenueArray[0][1] = 34;
    revenueArray[1][1] = 44;
    revenueArray[2][1] = 23;
    revenueArray[3][1] = 76;
    revenueArray[4][1] = 65;
    revenueArray[5][1] = 98;
    revenueArray[6][1] = 123;
    revenueArray[7][1] = 102;
    revenueArray[8][1] = 87;
    revenueArray[9][1] = 43;
    revenueArray[10][1] = 34;
    revenueArray[11][1] = 12;

    for(i = 0; i <= 11; i++) {
      System.out.println("The revenue for month: " + revenueArray[i][0] + " is $" + revenueArray[i][1]);
    }
  }
}
