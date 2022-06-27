package templateMethod;

public class ManualCar extends Car{
    @Override
    public void drive() {
        System.out.println("드라이브 중");
    }

    @Override
    public void stop() {
        System.out.println("브레이크를 밟음");
    }
}
