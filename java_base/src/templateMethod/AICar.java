package templateMethod;

public class AICar extends Car{

    @Override
    public void drive() {
        System.out.println("자동 드라이브 중");
    }

    @Override
    public void stop() {
        System.out.println("스스로 멈춤");
    }

    @Override
    public void washCar() {
        System.out.println("세차 완.");
    }
}
