package webService;

import java.util.ArrayList;

import javax.annotation.ManagedBean;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import org.codehaus.jackson.annotate.JsonAutoDetect.Visibility;
import org.codehaus.jackson.annotate.JsonMethod;
import org.codehaus.jackson.annotate.JsonProperty;
import org.codehaus.jackson.map.ObjectMapper;
import org.codehaus.jackson.map.SerializationConfig;

import dto.Classroom;
import dto.Instructor;
import dto.School;
import dto.Student;
import model.TAGManager;

@Path("/TagService")
public class TAGService {

	ObjectMapper objectMapper = new ObjectMapper();
	ArrayList<Student> arrayStudent = new ArrayList<>();
	ArrayList<Instructor> arrayInstructor = new ArrayList<>();
	ArrayList<Classroom> arrayClassroom = new ArrayList<>();
	ArrayList<School> arraySchool = new ArrayList<>();
	TAGManager tagManager = new TAGManager();

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
}
