package dto;

import java.util.ArrayList;

public class SchoolReport {

	private String year;
	private ArrayList<StudentReport> students;

	public String getYear() {
		return year;
	}

	public void setYear(String year) {
		this.year = year;
	}

	public ArrayList<StudentReport> getStudents() {
		return students;
	}

	public void setStudents(ArrayList<StudentReport> students) {
		this.students = students;
	}
}
