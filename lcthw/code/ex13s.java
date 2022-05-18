public class ex13s {
public static void main(String[] args) {
  int i = 0;

  for (i = 0; i < args.length; i++) {
    System.out.println("args" + i + ":" + args[i]);
  }

  String[] states = {
    "California", "Louisiana", "Texas", "Georgia"
  };

  for (i = 0; i < states.length; i++) {
    System.out.println("states" + i + ":" + states[i]);
  }
}
}
