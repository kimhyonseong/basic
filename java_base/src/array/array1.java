package array;

public class array1 {
    public static void main(String[] args) {
        /*
        int[] score;  //선언
        score = new int[5];  //생성
        */

        int[] score = new int[5];
        score[3] = 100;

        for (int i=0; i<score.length; i++) {
            System.out.println("score["+i+"] = "+score[i]);
        }

        int val = score[3];
        System.out.println("val = "+val);
    }
}
