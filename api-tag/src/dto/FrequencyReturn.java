package dto;

import java.util.ArrayList;

public class FrequencyReturn {

	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<Frequency> frequency;

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

	public ArrayList<Frequency> getFrequency() {
		return frequency;
	}

	public void setFrequency(ArrayList<Frequency> frequency) {
		this.frequency = frequency;
	}
}