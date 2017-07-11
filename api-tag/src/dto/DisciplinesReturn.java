package dto;

import java.util.ArrayList;

public class DisciplinesReturn {

	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Disciplines> disciplines;

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

	public ArrayList<Disciplines> getDisciplines() {
		return disciplines;
	}

	public void setDisciplines(ArrayList<Disciplines> disciplines) {
		this.disciplines = disciplines;
	}
}
