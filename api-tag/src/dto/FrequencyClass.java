package dto;

public class FrequencyClass {

	private String month;
	private String discipline_fk;
	private String discipline_name;
	private String classroom_fk;
	private int classes;

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

	public String getDiscipline_name() {
		return discipline_name;
	}

	public void setDiscipline_name(String discipline_name) {
		this.discipline_name = discipline_name;
	}

	public String getClassroom_fk() {
		return classroom_fk;
	}

	public void setClassroom_fk(String classroom_fk) {
		this.classroom_fk = classroom_fk;
	}

	public int getClasses() {
		return classes;
	}

	public void setClasses(int classes) {
		this.classes = classes;
	}
}
