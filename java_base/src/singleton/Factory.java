package singleton;

public class Factory {
	private static Factory instance = new Factory();
	
	private Factory() {
		
	}
	
	public Car createCar() {
		Car car = new Car();
		return car;
	}
	
	public static Factory getInstance() {
		if(instance == null) {
			instance = new Factory();
		}
		return instance;
	}
}
