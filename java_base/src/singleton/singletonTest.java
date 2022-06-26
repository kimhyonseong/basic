package singleton;

public class singletonTest {

	public static void main(String[] args) {
		Factory factory = Factory.getInstance();
		Car myCar1 = factory.createCar();
		Car myCar2 = factory.createCar();

		System.out.println(myCar1.getCar());
		System.out.println(myCar2.getCar());
	}

}
