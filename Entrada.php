<?php
include('config.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu usuemail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        

        
            
            $usuario = $sql_query->fetch_assoc();
            if(password_verify($senha, $usuario['senha'])){
              if(!isset($_SESSION)) {
                  session_start();
              }

              $_SESSION['id'] = $usuario['id'];
              $_SESSION['nome'] = $usuario['nome'];

              header("Location: principal.php");

            } else {
              header("Location: login.html");
              echo "Falha ao logar! E-mail ou senha incorretos";
            }
    
  }
}

?>