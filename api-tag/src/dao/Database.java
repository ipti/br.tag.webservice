package dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Database {

	public Connection getConnection() throws Exception {
		try {
			String driver = "com.mysql.jdbc.Driver";
			String connectionURL = "jdbc:mysql://localhost:3306/br.org.ipti.local.tag.demo";
			Connection connection = null;
			Class.forName(driver).newInstance();
			connection = DriverManager.getConnection(connectionURL, "root", "");
			//PRODUÇÃO
//			connection = DriverManager.getConnection(connectionURL, "user.tag", "123456");
			return connection;
		} catch (SQLException e) {
			throw e;
		} catch (Exception e) {
			throw e;
		}
	}

}
