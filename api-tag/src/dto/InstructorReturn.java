package dto;

import java.util.ArrayList;

public class InstructorReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Instructor> instructor;

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

	public ArrayList<Instructor> getInstructor() {
		return instructor;
	}

	public void setInstructor(ArrayList<Instructor> instructor) {
		this.instructor = instructor;
	}
}