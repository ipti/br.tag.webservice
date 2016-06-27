package webService;

import java.util.ArrayList;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import org.codehaus.jackson.annotate.JsonAutoDetect.Visibility;
import org.codehaus.jackson.annotate.JsonMethod;
import org.codehaus.jackson.annotate.JsonProperty;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.map.SerializationConfig;

import com.google.gson.Gson;

import dto.Classroom;
import dto.Credentials;
import dto.DisciplinesByClass;
import dto.Instructor;
import dto.InstructorTeachingData;
import dto.School;
import dto.Student;
import model.TAGManager;

@Path("/")
public class TAGService {

	ObjectMapper objectMapper = new ObjectMapper();
	ArrayList<Student> arrayStudent = new ArrayList<>();
	ArrayList<Instructor> arrayInstructor = new ArrayList<>();
	ArrayList<InstructorTeachingData> arrayInstructorTeachingData = new ArrayList<>();
	ArrayList<Classroom> arrayClassroom = new ArrayList<>();
	ArrayList<School> arraySchool = new ArrayList<>();
	ArrayList<Credentials> arrayCredentials = new ArrayList<>();
	ArrayList<DisciplinesByClass> arrayDisciplinesByClass = new ArrayList<DisciplinesByClass>();

	TAGManager tagManager = new TAGManager();

	@GET
	@Path("/getCredentials")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getCredentials() throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayCredentials = tagManager.getCredentials();
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayCredentials);
	}

	@GET
	@Path("/getCredentials/{username}/{password}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getCredentials(@PathParam("username") String username, @PathParam("password") String password)
			throws Exception {
		arrayCredentials = tagManager.getCredentials(username, password);
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayCredentials);
	}

	@GET
	@Path("/getStudents")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudents() throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayStudent = tagManager.getStudents();
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayStudent);
	}

	@GET
	@Path("/getStudents/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudents(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayStudent = tagManager.getStudents(inep_id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayStudent);
	}

	@GET
	@Path("/getStudentsPerClassroom/{classroom_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsPerClassroom(@PathParam("classroom_id") String classroom_id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayStudent = tagManager.getStudentsPerClassroom(classroom_id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayStudent);
	}

	@GET
	@Path("/getStudentsByName/{name}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsByName(@PathParam("name") String name) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayStudent = tagManager.getStudentsByName(name);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayStudent);
	}

	@GET
	@Path("/getStudentsByID/{classroom_id}/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getStudentsByID(@PathParam("classroom_id") String classroom_id, @PathParam("id") String id)
			throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayStudent = tagManager.getStudentsByID(classroom_id, id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayStudent);
	}

	@GET
	@Path("/getInstructors")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructors() throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayInstructor = tagManager.getInstructors();
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayInstructor);
	}

	@GET
	@Path("/getInstructors/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getInstructors(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayInstructor = tagManager.getInstructors(inep_id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayInstructor);
	}

	@GET
	@Path("/getClassrooms")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassrooms() throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayClassroom = tagManager.getClassrooms();
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayClassroom);
	}

	@GET
	@Path("/getClassrooms/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassrooms(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayClassroom = tagManager.getClassrooms(inep_id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayClassroom);
	}

	@GET
	@Path("/getClassroomsOfInstructor/{instructor_fk}/{year}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getClassroomsOfInstructor(@PathParam("instructor_fk") String instructor_fk,
			@PathParam("year") String year) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayClassroom = tagManager.getClassroomsOfInstructor(instructor_fk, year);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayClassroom);
	}

	@GET
	@Path("/getDisciplinesByClassID/{id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getDisciplinesByClassID(@PathParam("id") String id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayDisciplinesByClass = tagManager.getDisciplinesByClassID(id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayDisciplinesByClass);
	}

	@GET
	@Path("/getClassroomsBySchoolInep/{school_inep_fk}")
	@Produces(MediaType.APPLICATION_JSON + ";**charset=utf-8**")
	@JsonProperty
	public String getClassroomsBySchoolInep(@PathParam("school_inep_fk") String school_inep_fk) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arrayClassroom = tagManager.getClassroomsBySchoolInep(school_inep_fk);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arrayClassroom);
	}

	@GET
	@Path("/getSchools")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchools() throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arraySchool = tagManager.getSchools();
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arraySchool);
	}

	@GET
	@Path("/getSchools/{inep_id}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchools(@PathParam("inep_id") String inep_id) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arraySchool = tagManager.getSchools(inep_id);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arraySchool);
	}

	@GET
	@Path("/getSchoolsByUserFK/{user_fk}")
	@Produces(MediaType.APPLICATION_JSON + "; charset=utf-8")
	@JsonProperty
	public String getSchoolsByUserFK(@PathParam("user_fk") String user_fk) throws Exception {
		objectMapper.configure(SerializationConfig.Feature.INDENT_OUTPUT, true);
		arraySchool = tagManager.getSchoolsByUserFK(user_fk);
		objectMapper.setVisibility(JsonMethod.FIELD, Visibility.ANY);
		return objectMapper.writeValueAsString(arraySchool);
	}
}
