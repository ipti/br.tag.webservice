package dto;

public class StudentReport {

	private String id;
	private String name;
	private String classroom_id;
	private String classroom_name;
	private String situation;
	private String enrollment_fk;

	public String getId() {
		return id;
	}

	public void setId(String id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getClassroom_id() {
		return classroom_id;
	}

	public void setClassroom_id(String classroom_id) {
		this.classroom_id = classroom_id;
	}

	public String getClassroom_name() {
		return classroom_name;
	}

	public void setClassroom_name(String classroom_name) {
		this.classroom_name = classroom_name;
	}

	public String getSituation() {
		return situation;
	}

	public void setSituation(String situation) {
		this.situation = situation;
	}

	public String getEnrollment_fk() {
		return enrollment_fk;
	}

	public void setEnrollment_fk(String enrollment_fk) {
		this.enrollment_fk = enrollment_fk;
	}
}
