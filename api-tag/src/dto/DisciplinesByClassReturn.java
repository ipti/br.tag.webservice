package dto;

import java.util.ArrayList;

public class DisciplinesByClassReturn {
	
	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<DisciplinesByClass> disciplines;

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

	public ArrayList<DisciplinesByClass> getDisciplines() {
		return disciplines;
	}

	public void setDisciplines(ArrayList<DisciplinesByClass> disciplines) {
		this.disciplines = disciplines;
	}
}