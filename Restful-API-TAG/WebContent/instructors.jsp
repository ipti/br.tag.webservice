<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>API TAG - Instructors</title>
</head>
<body>
	<div id="instructorDiv">
		<h3 id="titleInstructor">Escolha uma das op��es abaixo:</h3>

		<div class="btn-group-md text-center" role="group" aria-label="...">
			<div class="row">
				<div class="col-lg-6" style="margin-left: 3%">
					<a type="submit" class="btn btn-default" href="${pageContext.request.contextPath}/api/TagService/getInstructors">Todos os Professors</a>
				</div>		
				<div class="col-lg-5"  style="margin-left: -7%;">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pesquisar pelo Inep..."> 
						<span class="input-group-btn">
							<a class="btn btn-default" type="submit" href="${pageContext.request.contextPath}/api/TagService/getInstructors/{inep_id}">Ir</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>