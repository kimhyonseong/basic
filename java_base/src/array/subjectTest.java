package array;

public class subjectTest {

	public static void main(String[] args) {
		
		Student student1 = new Student(1001,"Lee");
		student1.addSubject("국어", 100);
		student1.addSubject("수학", 80);
		
		Student student2 = new Student(1002,"Kim");
		student2.addSubject("국어", 80);
		student2.addSubject("수학", 80);
		student2.addSubject("과학", 90);
		
		student1.showScoreInfo();
		System.out.println("============");
		student2.showScoreInfo();
	}

}
