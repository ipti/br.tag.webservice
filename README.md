# API TAG

> Essa API é para retorno de informações que estão cadastrados no [TAG](https://github.com/ipti/tag), que são:

  - Estudantes
  - Escolas
  - Turmas 
  - Professores

> Essa API é composta por 8 métodos:

- getStudents();
- getStudents(inep_id);
- getInstructors();
- getInstructors(inep_id);
- getClassrooms();
- getClassrooms(inep_id);
- getSchools();
- getSchools(inep_id);

# TAGProject

Essa classe será responsavel por fazer a query SELECT com o banco e o preenchimento dos Arrays, com os seguintes métodos:

### getStudents

- getStudents(inep_id): Metódo para retorno de um estudante específico cadastrado na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações do estudante através do seu "INEP_ID" passado no parâmetro do método. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Student", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Student" e no fim de tudo, esse objeto será adicionado dentro de um array.

- getStudents(): Metódo para retorno de todos os estudantes cadastrados na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações de todos os estudantes. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Student", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Student" e no fim de tudo, esse objeto será adicionado dentro de um array.

### getInstructors

- getInstructors(inep_id): Metódo para retorno de um professor específico cadastrado na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações do professor através do seu "INEP_ID" passado no parâmetro do método. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Instructor", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Instructor" e no fim de tudo, esse objeto será adicionado dentro de um array.

- getInstructors(): Metódo para retorno de todos os professores cadastrados na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações de todos os professores. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Instructor", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Instructor" e no fim de tudo, esse objeto será adicionado dentro de um array.

### getClassrooms

- getClassrooms(inep_id): Metódo para retorno de uma turma específica cadastrada na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações da turma através do seu "INEP_ID" passado no parâmetro do método. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Classroom", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Classroom" e no fim de tudo, esse objeto será adicionado dentro de um array.

- getClassrooms(): Metódo para retorno de todas as turmas cadastradas na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações de todas as turmas. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "Classroom", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "Classroom" e no fim de tudo, esse objeto será adicionado dentro de um array.

### getSchools

- getSchools(inep_id): Metódo para retorno de uma escola específica cadastrada na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações da escola através do seu "INEP_ID" passado no parâmetro do método. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "School", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "School" e no fim de tudo, esse objeto será adicionado dentro de um array.

- getSchools(): Metódo para retorno de todas as escolas cadastradas na base do TAG: Nesse método é criado um PreparedStatement, onde ele irá receber, através da variável "connection", uma query SELECT que irá trazer as informações de todas as escolas. Depois é criado um ResultSet, que executará a query e fará a pesquisa dentro do Banco do TAG. Também será criado um objeto da classe "School", que, enquanto o ResultSet executa a query, também ficará a cargo de ir setando os valores nas variaveis do objeto "School" e no fim de tudo, esse objeto será adicionado dentro de um array.

# TAGManager

Essa classe será responsavel por fazer os métodos que a classe TAGService irá usar para mostrar ao usuário todas as informaçõs necessárias, são eles os métodos:

### getStudents

- getStudents(): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getStudents().

- getStudents(inep_id): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getStudents(inep_id).

### getInstructors

- getInstructors(): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getInstructors().

- getInstructors(inep_id): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getInstructors(inep_id).

### getClassrooms

- getClassrooms(): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getClassrooms().

- getClassrooms(inep_id): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getClassrooms(inep_id).

### getSchools

- getSchools(): Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getSchools().

- getSchools(inep_id); Com a variavel do tipo Connection já criada, dentro do método, ela ira receber o método da classe Database, chamado "getConnection", após isso, com um array criado, esse array irá receber o método da classe TAGProject chamado getSchools(inep_id).

# TAGService

Essa classe será a Restful, onde terá os métodos que serão chamados para retornar as informações em um JSON. Consiste em 4 arrays, uma variável do tipo ObjectMapper (servirá para formatar o JSON) e uma variável do TAGManager. O funcionamento dos métodos é semelhante aos da classe TAGManager. Através da anotação @GET, ele irá pegar o valor passado na anotação @Path, para poder retornar o que o usuário deseja.