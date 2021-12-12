package control;

import java.util.Scanner;

public class control_break {
    public static void main(String[] args) {
        /*
        int sum = 0;
        int i = 0;

        while (true) {
            if (sum > 100) {
                break;
            }
            ++i;
            sum += i;
        }
        System.out.println("i = "+i);
        System.out.println("sum = "+sum);

        int menu = 0;
        int num = 0;

        Scanner scanner = new Scanner(System.in);

        while (true) {
            System.out.println("1. 햄벅");
            System.out.println("2. 피자");
            System.out.println("3. 양파");
            System.out.println("원하는 메뉴(1-3)를 선택하세요.(종료:0) : ");

            String tmp = scanner.nextLine();
            menu = Integer.parseInt(tmp);

            if (menu == 0) {
                System.out.println("프로그램을 종료합니다.");
                break;
            } else if( !(1 <= menu && menu <=3) ) {
                System.out.println("메뉴를 잘못 선택하였습니다.(종료는 0)");
                continue;
            }

            System.out.println("선택하신 메뉴는 "+menu+"번 입니다.");
        }
        */
        Loop1 : for (int i = 2; i <= 9; i++) {
            for (int j = 1; j<=9; j++) {
                if (j==5) {
                    break Loop1;
                }
                System.out.println(i+"*"+j+"="+i*j);
            }
            System.out.println();
        }
    }
}
