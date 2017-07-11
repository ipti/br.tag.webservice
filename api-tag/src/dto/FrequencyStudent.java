package dto;

public class FrequencyStudent {

	private String month;
	private String discipline_fk;
	private String classroom_fk;
	private String id;
	private int faults;

	public String getMonth() {
		return month;
	}

	public void setMonth(String month) {
		this.month = month;
	}

	public String getDiscipline_fk() {
		return discipline_fk;
	}

	public void setDiscipline_fk(String discipline_fk) {
		this.discipline_fk = discipline_fk;
	}

	public String getClassroom_fk() {
		return classroom_fk;
	}

	public void setClassroom_fk(String classroom_fk) {
		this.classroom_fk = classroom_fk;
	}

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public int getFaults() {
		return faults;
	}

	public void setFaults(int faults) {
		this.faults = faults;
	}
}