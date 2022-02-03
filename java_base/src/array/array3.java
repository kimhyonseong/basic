package array;

import java.util.Arrays;

public class array3 {
    public static void main(String[] args) {
        int[] iArr = {100,95,80,70,60};

        for (int i=0; i<iArr.length; i++) {
            System.out.println(iArr[i]);
        }

        System.out.println(Arrays.toString(iArr));


        char[] chArr = {'a','b','c','d'};

        System.out.println(chArr);  // abcd 붙여서 나옴
    }
}
