package class_exam;

public class class_value {
    public static void main(String[] args) {
        System.out.println("Card.width = "+Card.width);
        System.out.println("Card.height = "+Card.height);
        System.out.println();

        Card c1 = new Card();
        c1.kind = "Heart";
        c1.number = 7;

        Card c2 = new Card();
        c2.kind = "Space";
        c2.number = 4;

        System.out.println("c1은 "+c1.kind+", "+c1.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
        System.out.println("c2은 "+c2.kind+", "+c2.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
        System.out.println();

        c2 = c1;
        System.out.println("c2 = c1");
        System.out.println("c1은 "+c1.kind+", "+c1.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
        System.out.println("c2은 "+c2.kind+", "+c2.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
        System.out.println();

        c2.kind = "Dia";
        c2.number = 8;

        System.out.println("c2.kind = Dia");
        System.out.println("c1은 "+c1.kind+", "+c1.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
        System.out.println("c2은 "+c2.kind+", "+c2.number+"이며, 크기는 ("+Card.width+","+Card.height+")");
    }
}

class Card {
    String kind;
    int number;
    static int width = 100;
    static int height = 250;
}