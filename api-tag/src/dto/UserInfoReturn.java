package dto;

import java.util.ArrayList;

public class UserInfoReturn {

	private boolean valid;
	private ArrayList<String> error;
	private ArrayList<UserInfo> user;

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

	public ArrayList<UserInfo> getUser() {
		return user;
	}

	public void setUser(ArrayList<UserInfo> user) {
		this.user = user;
	}
}
