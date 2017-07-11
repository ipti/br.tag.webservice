package dto;

public class Frequency {

	private String id;
	private String enrollment_fk;
	private String discipline_fk;
	private String discipline_name;
	private String annual_average;
	private String final_average;
	private String absences;
	private String frequency;

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getEnrollment_fk() {
		return enrollment_fk;
	}

	public void setEnrollment_fk(String enrollment_fk) {
		this.enrollment_fk = enrollment_fk;
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

	public String getAnnual_average() {
		return annual_average;
	}

	public void setAnnual_average(String annual_average) {
		this.annual_average = annual_average;
	}

	public String getFinal_average() {
		return final_average;
	}

	public void setFinal_average(String final_average) {
		this.final_average = final_average;
	}

	public String getAbsences() {
		return absences;
	}

	public void setAbsences(String absences) {
		this.absences = absences;
	}

	public String getFrequency() {
		return frequency;
	}

	public void setFrequency(String frequency) {
		this.frequency = frequency;
	}
}