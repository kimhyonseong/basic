package templateMethod;

public abstract class Car {
    public abstract void drive();
    public abstract void stop();

    public void startCar() {
        System.out.println("시동을 켭니다.");
    }
    public void turnOff() {
        System.out.println("시동을 끕니다.");
    }

    // washCar는 여기서 정의 되어 추상 메서드는 아니고 오버라이드 해서 쓰는곳도 있고 없을 수도 있는 메서드
    public void washCar() {}

    public final void run(){
        startCar();
        drive();
        stop();
        turnOff();
        washCar();
    }
}
