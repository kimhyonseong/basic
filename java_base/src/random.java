public class random {
    public static void main(String[] args) {
        int num = 10;

        for (int i=0; i<20; i++) {
            //System.out.println(Math.random());
            //System.out.println(Math.random());  // 0.0<=x<1.0 double
            //System.out.println((int)(Math.random()*num));  // 0<=x<10
            System.out.println((int)(Math.random()*num)+1);  // 1<=x<11
        }
    }
}