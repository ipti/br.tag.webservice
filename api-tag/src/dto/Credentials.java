package dto;

public class Credentials {
	
	private String id;
	private String name;
	private String instructor_fk;
	private String username;
	private String password;
	private String type;
	
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
	
	public String getInstructor_fk() {
		return instructor_fk;
	}
	
	public void setInstructor_fk(String instructor_fk) {
		this.instructor_fk = instructor_fk;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}
	
	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}
}