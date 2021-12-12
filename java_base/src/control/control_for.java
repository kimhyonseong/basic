package control;

public class control_for {
    public static void main(String[] args) {
        for (int i=0; i<10; i++) {
            System.out.print(i+" ");
        }
        System.out.println("");

        int sum = 0;

        for(int i=0; i<10; i++) {
            sum += i;
        }
        System.out.println("sum : "+sum);

        for (int i=0; i<5; i++){
            for(int j=0; j<i; j++) {
                System.out.print("*");
            }
            System.out.println("");
        }
    }
}
