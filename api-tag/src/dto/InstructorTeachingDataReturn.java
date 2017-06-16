package dto;

import java.util.ArrayList;

public class InstructorTeachingDataReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<InstructorTeachingData> discipline;

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

	public ArrayList<InstructorTeachingData> getDiscipline() {
		return discipline;
	}

	public void setDiscipline(ArrayList<InstructorTeachingData> discipline) {
		this.discipline = discipline;
	}
}