public class Lesson3Exercise1 {
  public static void main(String[] args) {

    groceryStore houstonStore = new groceryStore(534, 0.99, 429, 0.87);
    groceryStore seattleStore = new groceryStore(765, 0.86, 842, 0.91);
    groceryStore orlandoStore = new groceryStore(402, 0.77, 398, 0.79);


    System.out.println("The Gross Revenue for the Houston Store is " + houstonStore.grossRevenue());
    System.out.println("The Gross Revenue for the Seattle Store is " + seattleStore.grossRevenue());
    System.out.println("The Gross Revenue for the Orlando Store is " + orlandoStore.grossRevenue());

    System.out.println("The amount of Apples needed for the target of $1000 for the Houston store is " + houstonStore.appleRevenueTarget(1000));
    System.out.println("The amount of Apples needed for the target of $1000 for the Seattle store is " + seattleStore.appleRevenueTarget(1000));
    System.out.println("The amount of Apples needed for the target of $1000 for the Orlando store is " + orlandoStore.appleRevenueTarget(1000));

    System.out.println("The amount of Oranges needed for the target of $800 for the Houston store is " + houstonStore.orangeRevenueTarget(800));
    System.out.println("The amount of Oranges needed for the target of $800 for the Seattle store is " + seattleStore.orangeRevenueTarget(800));
    System.out.println("The amount of Oranges needed for the target of $800 for the Orlando store is " + orlandoStore.orangeRevenueTarget(800));

  }
}

 class groceryStore {
  int numApSpy;
  double retPriceAp;
  int numOrSpy;
  double retPriceOr;

  groceryStore(int nSy, double pApples, int nOy, double pOranges) {

    numApSpy = nSy;
    retPriceAp = pApples;
    numOrSpy = nOy;
    retPriceOr = pOranges;

  }

  double grossRevenue() {

    double grossRev;

    grossRev = (numApSpy * retPriceAp) + (numOrSpy * retPriceOr);

    return grossRev;

  }
  double appleRevenueTarget(double target) {

    double appRevT;

    appRevT = target / retPriceAp;

    return appRevT;
  }
  double orangeRevenueTarget(double target) {

    double oraRevT;

    oraRevT = target / retPriceOr;

    return oraRevT;
  }
  }
