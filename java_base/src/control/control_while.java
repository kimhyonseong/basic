package control;

import java.util.Scanner;

public class control_while {
    public static void main(String[] args) {
        int num = 12345, sum = 0;

        while (num > 0) {
            sum += num % 10;
            System.out.println("sum="+sum+" num%10="+num%10);
            num = num/10;
        }


        int input = 0, answer = 0;

        answer = (int)(Math.random()*100) + 1;
        System.out.println(answer);
        Scanner scanner = new Scanner(System.in);

        System.out.print("1과 100 사이의 정수를 입력하세요 : ");
        input = scanner.nextInt();

        do {
            if (input > answer){
                System.out.println("더 작은 수로 다시 시도해보세요");
            } else {
                System.out.println("더 큰 수로 다시 시도해보세요");
            }

            System.out.print("1과 100 사이의 정수를 입력하세요 : ");
            input = scanner.nextInt();
        } while (input != answer);
    }
}
