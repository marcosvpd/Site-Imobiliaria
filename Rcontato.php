<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$servername = "localhost";
$database = "contato";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
 
$sql = "INSERT INTO contato (nome, email, telefone, mensagem) VALUES ('$name', '$email', '$phone', '$message')";
if (mysqli_query($conn, $sql)) {

header("Location: confirmacao.html");
    
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>