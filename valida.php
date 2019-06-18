<?php

if(!isset($_SESSION))
    session_start();
//Login de Usários
if(isset($_POST['email'])){

  include('class/conexao.php');
  
  $erro = array();

  // Captação de dados
    $senha = $_POST['senha'];
    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
    // Validação de dados
    if(!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL))
        $erro[] = "Preencha seu <strong>e-mail</strong> corretamente.";

    if(strlen($senha) < 1 || strlen($senha) > 16)
        $erro[] = "Preencha sua <strong>senha</strong> corretamente.";
	echo "Preencha sua senha corretamente!";
     print "<br /> <input type='BUTTON' value='voltar' onclick='javascript:history.go(-1)'>";
    if(count($erro) == 0){

        $sql = "SELECT senha as senha, cod as valor 
        FROM usuarios 
        WHERE email = '" . $_SESSION['email'] . "'";
        $que = $mysqli->query($sql) or die($mysqli->error);
        $dado = $que->fetch_assoc();


        if($que->num_rows == 0)
            $erro[] = "Nenhum usuário possui o <strong>e-mail</strong> informado.";

        elseif(strcmp($dado['senha'], ($senha)) == 0){
            $_SESSION['usuario_logado'] = $dado['valor'];
        }else
            $erro[] = "<strong>Senha</strong> incorreta.";

        if(count($erro) == 0){
        	header("Location: usuario.php");
            exit();
            unset($_SESSION['email']);
        }

    }
}

$servername = "localhost";
$database = "usuarios";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


             $name = "SELECT nome FROM usuarios WHERE cod = " . $_SESSION['usuario_logado'] . "";

            $nome = $conn->query($name);

            if ($nome) {
                $row = mysqli_fetch_row($nome); //Pega o nome do usuario no banco de dados pelo codigo. CARALHO CONSEGUI FAZER ISSO 
            }

            $email = "SELECT email FROM usuarios WHERE  cod = " . $_SESSION['usuario_logado'] . "";

            $email = $conn->query($email);

            if ($email) {
                $em = mysqli_fetch_row($email);
            }
?>