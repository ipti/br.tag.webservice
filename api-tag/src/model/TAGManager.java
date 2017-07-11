package model;

import java.sql.Connection;
import java.util.ArrayList;

import dao.Database;
import dao.TAGProject;
import dto.ClassroomReturn;
import dto.CredentialsReturn;
import dto.DisciplinesByClassReturn;
import dto.DisciplinesReturn;
import dto.FrequencyClassStudentReturn;
import dto.GradeReturn;
import dto.InstructorReturn;
import dto.InstructorTeachingDataReturn;
import dto.LoginReturn;
import dto.SchoolReportReturn;
import dto.SchoolReturn;
import dto.StudentReturn;
import dto.UserInfoReturn;

public class TAGManager {

	private Database database = new Database();
	private Connection connection;
	private TAGProject tagProject = new TAGProject();

	public TAGManager() {
		try {
			connection = database.getConnection();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	// --------------- LOGIN ------------------ //
	public ArrayList<LoginReturn> getLogin(String username, String password) throws Exception {
		try {
			return tagProject.getLogin(connection, username, password);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<CredentialsReturn> getCredentials(String username, String password) throws Exception {
		try {
			return tagProject.getCredentials(connection, username, password);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- LOGIN ------------------ //
	public ArrayList<UserInfoReturn> getUserInfo(String username) throws Exception {
		try {
			return tagProject.getUserInfo(connection, username);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- STUDENT ------------------ //
	public ArrayList<StudentReturn> getChildrenPerParent(String responsable_cpf) throws Exception {
		try {
			return tagProject.getChildrenPerParent(connection, responsable_cpf);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<SchoolReportReturn> getStudentParent(String responsable_cpf) throws Exception {
		try {
			return tagProject.getStudentParent(connection, responsable_cpf);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<StudentReturn> getStudents() throws Exception {
		try {
			return tagProject.getStudents(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<StudentReturn> getStudents(String inep_id) throws Exception {
		try {
			return tagProject.getStudents(connection, inep_id);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<StudentReturn> getStudentsPerClassroom(String classroom_id) throws Exception {
		try {
			return tagProject.getStudentsPerClassroom(connection, classroom_id);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<StudentReturn> getStudentsByName(String name) throws Exception {
		try {
			return tagProject.getStudentsByName(connection, name);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<StudentReturn> getStudentsByID(String classroom_id, String id) throws Exception {
		try {
			return tagProject.getStudentsByID(connection, classroom_id, id);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- INSTRUCTOR ------------------ //
	public ArrayList<InstructorReturn> getInstructors() throws Exception {
		try {
			return tagProject.getInstructors(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<InstructorReturn> getInstructor(String inep_id) throws Exception {
		try {
			return tagProject.getInstructor(connection, inep_id);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<InstructorReturn> getInstructorByID(String id) throws Exception {
		try {
			return tagProject.getInstructorByID(connection, id);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- CLASSROOM ------------------ //
	public ArrayList<ClassroomReturn> getClassrooms() throws Exception {
		try {
			return tagProject.getClassrooms(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<ClassroomReturn> getClassroomsOfInstructor(String instructor_fk, String year) throws Exception {
		try {
			return tagProject.getClassroomsOfInstructor(connection, instructor_fk, year);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<ClassroomReturn> getClassroomsBySchoolInep(String school_inep_fk) throws Exception {
		try {
			return tagProject.getClassroomsBySchoolInep(connection, school_inep_fk);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<ClassroomReturn> getClassrooms(String inep_id) throws Exception {
		try {
			return tagProject.getClassrooms(connection, inep_id);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- DISCIPLINE ------------------ //
	public ArrayList<DisciplinesReturn> getDisciplines() throws Exception {
		try {
			return tagProject.getDisciplines(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<DisciplinesByClassReturn> getDisciplinesByClassID(String id) throws Exception {
		try {
			return tagProject.getDisciplinesByClassID(connection, id);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<InstructorTeachingDataReturn> getInstructorTeachingData(String id) throws Exception {
		try {
			return tagProject.getInstructorTeachingData(connection, id);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- SCHOOL ------------------ //
	public ArrayList<SchoolReturn> getSchools() throws Exception {
		try {
			return tagProject.getSchools(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<SchoolReturn> getSchools(String inep_id) throws Exception {
		try {
			return tagProject.getSchools(connection, inep_id);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<SchoolReturn> getSchoolsByUserFK(String user_fk) throws Exception {
		try {
			return tagProject.getSchoolsByUserFK(connection, user_fk);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- GRADE ------------------ //
	public ArrayList<GradeReturn> getGrade() throws Exception {
		try {
			return tagProject.getGrades(connection);
		} catch (Exception e) {
			throw e;
		}
	}

	public ArrayList<GradeReturn> getGrade(String enrollment_fk, String classroom_fk) throws Exception {
		try {
			return tagProject.getGrades(connection, enrollment_fk, classroom_fk);
		} catch (Exception e) {
			throw e;
		}
	}

	// --------------- FREQUENCY ------------------ //
	public ArrayList<FrequencyClassStudentReturn> getFrequency(String student_fk, String classroom_fk, String month)
			throws Exception {
		try {
			return tagProject.getFrequency(connection, student_fk, classroom_fk, month);
		} catch (Exception e) {
			throw e;
		}
	}
}