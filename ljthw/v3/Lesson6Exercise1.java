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

    houstonGrRev = (houstonStore.numApSpy * houstonStore.retPriceAp) + (houstonStore.numOrSpy * houstonStore.retPriceOr);
    seattleGrRev = (seattleStore.numApSpy * seattleStore.retPriceAp) + (seattleStore.numOrSpy * seattleStore.retPriceOr);
    orlandoGrRev = (orlandoStore.numApSpy * orlandoStore.retPriceAp) + (orlandoStore.numOrSpy * orlandoStore.retPriceOr);

    System.out.println("Houston Store Gross Revenue: " + houstonGrRev);
    System.out.println("Seattle Store Gross Revenue: " + seattleGrRev);
    System.out.println("Orlando Store Gross Revenue: " + orlandoGrRev);

  }
}

 class groceryStore {
  int numApSpy;
  double retPriceAp;
  int numOrSpy;
  double retPriceOr;
  }
