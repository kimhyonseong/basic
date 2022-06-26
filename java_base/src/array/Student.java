package array;

import java.util.ArrayList;

public class Student {
	private int studentId;
	private String name;
	
	ArrayList<Subject> subjectList;
	
	public Student() {}
	public Student(int num,String name) {
		setStudentId(num);
		setName(name);
		
		subjectList = new ArrayList<Subject>();
	}
	public int getStudentId() {
		return studentId;
	}
	public void setStudentId(int studentId) {
		this.studentId = studentId;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	
	public void addSubject(String subjectName, int score) {
		Subject subject = new Subject();
		subject.setSubjectName(subjectName);
		subject.setScore(score);
		
		subjectList.add(subject);
	}
	
	public void showScoreInfo() {
		int total = 0;
		
		for(Subject subject : subjectList) {
			System.out.println(subject.getSubjectName()+" / "+subject.getScore()+"점");
			total += subject.getScore();
		}
		System.out.println(this.name+" 학생의 총점은 "+total+"점 입니다.");
	}
}
