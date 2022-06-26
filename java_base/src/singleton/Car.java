package singleton;

public class Car {
	protected static int serialNum = 1000;
	private int carNum;
	
	public Car() {
		serialNum++;
		this.carNum = serialNum;
	}

	public int getCar() {
		return carNum;
	}

	public void setCarNum(int carNum) {
		this.carNum = carNum;
	}
}
