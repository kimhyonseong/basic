package ObjectOrient;

class MyPoint {
    int x;
    int y;
}

//class Circle extends MyPoint {
//    int r;
//}

class Circle {
    MyPoint p = new MyPoint();  // 참조변수 초기화
    int r;
}

public class InheritanceTest {
    public static void main(String[] args) {
        Circle c = new Circle();
        c.p.x=1;
        c.p.y=2;
        c.r=3;

        System.out.println("c.p.x="+c.p.x);
        System.out.println("c.p.y="+c.p.y);
        System.out.println("c.r="+c.r);
    }
}
