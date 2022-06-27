package templateMethod;

public class CarTest {
    public static void main(String[] args) {
        AICar aiCar = new AICar();
        ManualCar manualCar = new ManualCar();

        //
        aiCar.run();
        System.out.println("==============");
        manualCar.run();
    }
}
