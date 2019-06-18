<?php
session_start();
session_destroy();
echo 'Você saiu da sua conta. <a href="login.php">Voltar</a>';
?>