<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{

	if(!empty($_POST['user']) && !empty($_POST['pass'])) {

				    $user=$_POST['user'];
				    $pass=$_POST['pass'];

$con = mysqli_connect("localhost", "root","", "sql_injection");
				    if (!$con) {
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}

				    $stmt = $con->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
				    $stmt->bind_param("ss", $user, $pass);
        			$stmt->execute();

        			$result = $stmt->get_result();
        			$row = $result->fetch_assoc();

        			if(!$row){
						header('Location: solucaoLogin.html');
						// echo "<SCRIPT>alert('Login ou senha inválida!');</SCRIPT>";
			            // echo "Dados Incorretos!";
			        }
			        else {
			            header('Location: solucaoLogado.html');
			            }
			        }
	}
	else {
 		echo "Insira o seus dados!";
 	}

?>
