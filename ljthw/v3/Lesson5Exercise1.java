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

    System.out.println("Houston Store\nApples sold - " + houstonStore.numApSpy + "\nApple retail cost - " + houstonStore.retPriceAp + "\n\nOranges sold - " + houstonStore.numOrSpy + "\nOranges retail cost - " + houstonStore.retPriceOr);

  }
}

 class groceryStore {
  int numApSpy;
  double retPriceAp;
  int numOrSpy;
  double retPriceOr;
  }
