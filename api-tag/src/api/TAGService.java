package api;

import java.util.ArrayList;

import javax.ws.rs.FormParam;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.ext.Provider;

import org.glassfish.jersey.server.ResourceConfig;

import com.fasterxml.jackson.annotation.JsonAutoDetect.Visibility;
import com.fasterxml.jackson.annotation.JsonProperty;
import com.fasterxml.jackson.annotation.PropertyAccessor;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.fasterxml.jackson.databind.SerializationFeature;

import dto.ClassroomReturn;
import dto.CredentialsReturn;
import dto.DisciplinesByClassReturn;
import dto.GradeReturn;
import dto.InstructorReturn;
import dto.InstructorTeachingDataReturn;
import dto.LoginReturn;
import dto.SchoolReportReturn;
import dto.SchoolReturn;
import dto.StudentReturn;
import dto.UserInfoReturn;
import filter.CORSFilter;
import model.TAGManager;

@Path("/")
@Provider
public class TAGService {

	private ArrayList<CredentialsReturn> arrayCredentialsReturn = new ArrayList<>();
	private ArrayList<LoginReturn> arrayLoginReturn = new ArrayList<>();
	private ArrayList<UserInfoReturn> arrayUserInfoReturn = new ArrayList<>();
	private ArrayList<StudentReturn> arrayStudentReturn = new ArrayList<>();
	private ArrayList<InstructorReturn> arrayInstructorReturn = new ArrayList<>();
	private ArrayList<InstructorTeachingDataReturn> arrayInstructorTeachingDataReturn = new ArrayList<>();
	private ArrayList<ClassroomReturn> arrayClassroomReturn = new ArrayList<>();
	private ArrayList<DisciplinesByClassReturn> arrayDisciplinesByClassReturn = new ArrayList<>();
	private ArrayList<SchoolReturn> arraySchoolReturn = new ArrayList<>();
	private ArrayList<SchoolReportReturn> arraySchoolReportReturn = new ArrayList<>();
	private ArrayList<GradeReturn> arrayGradeReturn = new ArrayList<>();

	private TAGManager tagManager = new TAGManager();
	private ObjectMapper objectMapper = new ObjectMapper();
	private ResourceConfig resourceConfig = new ResourceConfig();

	// --------------- LOGIN ------------------ //
	@POST
	@Path("parent/login")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getLogin(@FormParam("username") String username, @FormParam("password") String password)
			throws Exception {
		arrayLoginReturn = tagManager.getLogin(username, password);
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayLoginReturn);
	}

	@POST
	@Path("users/login")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getCredentials(@FormParam("username") String username, @FormParam("password") String password)
			throws Exception {
		arrayCredentialsReturn = tagManager.getCredentials(username, password);
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayCredentialsReturn);
	}

	// --------------- USER ------------------ //
	@GET
	@Path("user/info/{username}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getUserInfo(@PathParam("username") String username) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayUserInfoReturn = tagManager.getUserInfo(username);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayUserInfoReturn);
	}

	// --------------- STUDENT ------------------ //
	@GET
	@Path("children/parent/{responsable_cpf}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getChildrenPerParent(@PathParam("responsable_cpf") String responsable_cpf) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getChildrenPerParent(responsable_cpf);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	@GET
	@Path("student/parent/{responsable_cpf}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentParent(@PathParam("responsable_cpf") String responsable_cpf) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arraySchoolReportReturn = tagManager.getStudentParent(responsable_cpf);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arraySchoolReportReturn);
	}

	@GET
	@Path("students")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudents() throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getStudents();
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	@GET
	@Path("student/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudents(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getStudents(inep_id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	@GET
	@Path("student/classroom/{classroom_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsPerClassroom(@PathParam("classroom_id") String classroom_id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getStudentsPerClassroom(classroom_id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	@GET
	@Path("student/name/{name}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsByName(@PathParam("name") String name) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getStudentsByName(name);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	@GET
	@Path("student/{classroom_id}/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsByID(@PathParam("classroom_id") String classroom_id, @PathParam("id") String id)
			throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayStudentReturn = tagManager.getStudentsByID(classroom_id, id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayStudentReturn);
	}

	// --------------- INSTRUCTOR ------------------ //
	@GET
	@Path("instructors")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructors() throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayInstructorReturn = tagManager.getInstructors();
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayInstructorReturn);
	}

	@GET
	@Path("instructor/inep/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructors(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayInstructorReturn = tagManager.getInstructor(inep_id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayInstructorReturn);
	}

	@GET
	@Path("instructor/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructorByID(@PathParam("id") String id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayInstructorReturn = tagManager.getInstructorByID(id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayInstructorReturn);
	}

	// --------------- CLASSROOM ------------------ //
	@GET
	@Path("classrooms")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassrooms() throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayClassroomReturn = tagManager.getClassrooms();
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayClassroomReturn);
	}

	@GET
	@Path("classroom/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassrooms(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayClassroomReturn = tagManager.getClassrooms(inep_id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayClassroomReturn);
	}

	@GET
	@Path("classroom/instructor/{instructor_fk}/{year}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassroomsOfInstructor(@PathParam("instructor_fk") String instructor_fk,
			@PathParam("year") String year) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayClassroomReturn = tagManager.getClassroomsOfInstructor(instructor_fk, year);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayClassroomReturn);
	}

	@GET
	@Path("classroom/school/{school_inep_fk}")
	@Produces(MediaType.APPLICATION_JSON + ";**charset=utf-8**")
	@JsonProperty
	public String getClassroomsBySchoolInep(@PathParam("school_inep_fk") String school_inep_fk) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayClassroomReturn = tagManager.getClassroomsBySchoolInep(school_inep_fk);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayClassroomReturn);
	}

	// --------------- DISCIPLINE ------------------ //
	@GET
	@Path("discipline/classroom/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getDisciplinesByClassID(@PathParam("id") String id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayDisciplinesByClassReturn = tagManager.getDisciplinesByClassID(id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayDisciplinesByClassReturn);
	}

	@GET
	@Path("discipline/instructor/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructorTeachingData(@PathParam("id") String id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayInstructorTeachingDataReturn = tagManager.getInstructorTeachingData(id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayInstructorTeachingDataReturn);
	}

	// --------------- SCHOOL ------------------ //
	@GET
	@Path("schools")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchools() throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arraySchoolReturn = tagManager.getSchools();
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arraySchoolReturn);
	}

	@GET
	@Path("school/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchools(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arraySchoolReturn = tagManager.getSchools(inep_id);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arraySchoolReturn);
	}

	@GET
	@Path("school/user/{user_fk}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchoolsByUserFK(@PathParam("user_fk") String user_fk) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arraySchoolReturn = tagManager.getSchoolsByUserFK(user_fk);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arraySchoolReturn);
	}

	// --------------- GRADE ------------------ //
	@GET
	@Path("grades")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getGrade() throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayGradeReturn = tagManager.getGrade();
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayGradeReturn);
	}

	@GET
	@Path("grade/{enrollment_fk}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getGrade(@PathParam("enrollment_fk") String enrollment_fk) throws Exception {
		objectMapper.configure(SerializationFeature.INDENT_OUTPUT, true);
		arrayGradeReturn = tagManager.getGrade(enrollment_fk);
		objectMapper.setVisibility(PropertyAccessor.FIELD, Visibility.ANY);
		resourceConfig.register(new CORSFilter());
		return objectMapper.writeValueAsString(arrayGradeReturn);
	}
}
