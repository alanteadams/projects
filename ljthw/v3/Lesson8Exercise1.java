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

    double houstonGrRev;
    double seattleGrRev;
    double orlandoGrRev;

    houstonGrRev = houstonStore.grossRevenue();
    seattleGrRev = seattleStore.grossRevenue();
    orlandoGrRev = orlandoStore.grossRevenue();

    System.out.println("The Houston Store gross revenue is: " + houstonGrRev);
    System.out.println("The Seattle store gross revenue is: " + seattleGrRev);
    System.out.println("The Orlando store gross revenue is: " + orlandoGrRev);
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
  }
