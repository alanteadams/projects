public class Lesson3Exercise1 {
  public static void main(String[] args) {

    groceryStore houstonStore = new groceryStore();
    groceryStore seattleStore = new groceryStore();
    groceryStore orlandoStore = new groceryStore();

    houstonStore.numApSpy = 534;
    houstonStore.retPriceAp = 0.99;
    houstonStore.numOrSpy = 429;
    houstonStore.retPriceOr = 0.87;

    seattleStore.numApSpy = 765;
    seattleStore.retPriceAp = 0.86;
    seattleStore.numOrSpy = 842;
    seattleStore.retPriceOr = 0.91;

    orlandoStore.numApSpy = 402;
    orlandoStore.retPriceAp = 0.77;
    orlandoStore.numOrSpy = 398;
    orlandoStore.retPriceOr = 0.79;

    System.out.println("How many apples are needed to earn $1050 for the Houston store." + houstonStore.appleRevenueTarget(1050));
    System.out.println("How many oranges are needed to earn $620 for the Seattle store." + seattleStore.orangeRevenueTarget(620));
    System.out.println("How many apples are needed to earn $744 for the Orlando store." + orlandoStore.appleRevenueTarget(744));

  }
}

 class groceryStore {
  int numApSpy;
  double retPriceAp;
  int numOrSpy;
  double retPriceOr;
  double grossRev;

  double grossRevenue() {

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
