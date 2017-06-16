package dto;

import java.util.ArrayList;

public class StudentReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Student> student;

	public boolean isValid() {
		return valid;
	}

	public void setValid(boolean valid) {
		this.valid = valid;
	}

	public ArrayList<String> getError() {
		return error;
	}

	public void setError(ArrayList<String> error) {
		this.error = error;
	}

	public ArrayList<Student> getStudent() {
		return student;
	}

	public void setStudent(ArrayList<Student> student) {
		this.student = student;
	}
}