package dto;

import java.util.ArrayList;

public class GradeReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Grade> grade;

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

	public ArrayList<Grade> getGrade() {
		return grade;
	}

	public void setGrade(ArrayList<Grade> grade) {
		this.grade = grade;
	}
}