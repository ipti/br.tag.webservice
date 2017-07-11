package dto;

import java.util.ArrayList;

public class FrequencyClassStudentReturn {

	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<FrequencyClass> frequency_class;
	private ArrayList<FrequencyStudent> frequency_student;

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

	public ArrayList<FrequencyClass> getFrequency_class() {
		return frequency_class;
	}

	public void setFrequency_class(ArrayList<FrequencyClass> frequency_class) {
		this.frequency_class = frequency_class;
	}

	public ArrayList<FrequencyStudent> getFrequency_student() {
		return frequency_student;
	}

	public void setFrequency_student(ArrayList<FrequencyStudent> frequency_student) {
		this.frequency_student = frequency_student;
	}
}