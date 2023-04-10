<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (!empty($_POST['user']) && !empty($_POST['pass'])) {

		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$con = mysqli_connect("localhost", "root", "", "sql_injection");
		if (!$con) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$query = "SELECT * FROM login WHERE username = '$user' AND password = '$pass'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);

		// echo $query;

		if (!$row) {
			header('Location: login.html');
		} else {
			header('Location: logado.html');
		}
	}
} else {
	echo "Insira o sue dados!";
}

?>


<!-- Comandos

'='  /* Ao ser inserido nos campos de Login e Senha, engana a query indicando um valor verdadeiro */

'or 1=1;#  /* Ao ser adicionando no campo de Login comenta e ignora senha */

'or '1'='1 /* Ao ser inserido nos campos de Login e Senha concatena o password e engana a query indicando um valor verdadeiro */

				-->

<!-- Teste de conexão -->
<!-- $con = mysqli_connect("host", "user","pass", "db");
	 if (!$con) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
				} -->