package api;

import java.util.HashSet;
import java.util.Set;

import javax.ws.rs.core.Application;

import org.glassfish.jersey.media.multipart.MultiPartFeature;

public class ApplicationConfig extends Application {

	@Override
	public Set<Class<?>> getClasses() {
		final Set<Class<?>> resources = new HashSet<>();

		resources.add(TAGService.class);
		resources.add(MultiPartFeature.class);

		return resources;
	}
}
