public class controlStatement {
    public static void main(String[] args) {
        final int A = 3;
        int count = 7;

        for (int i=0; i<count; i++){
            if (A == i) continue;
            for (int j = i; j<count; j++){
                if (A == j) continue;
                System.out.print(j + " ");
            }
            for (int k=5; k>count-i-2;k--) {
                if (A == k) continue;
                System.out.print(k + " ");
            }
            System.out.println("");
        }
    }
}
