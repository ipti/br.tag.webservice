package dto;

import java.util.ArrayList;

public class SchoolReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<School> school;

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

	public ArrayList<School> getSchool() {
		return school;
	}

	public void setSchool(ArrayList<School> school) {
		this.school = school;
	}
}