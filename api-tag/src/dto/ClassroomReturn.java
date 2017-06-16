package dto;

import java.util.ArrayList;

public class ClassroomReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Classroom> classroom;

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

	public ArrayList<Classroom> getClassroom() {
		return classroom;
	}

	public void setClassroom(ArrayList<Classroom> classroom) {
		this.classroom = classroom;
	}
}