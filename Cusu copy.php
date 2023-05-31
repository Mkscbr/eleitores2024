<?php
include('protect.php');

include('config.php');

$telefone_celular = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $_POST['celular']))));

if (isset($_SESSION['id']) || isset($_SESSION['id'])) {

  $id = $conn->real_escape_string($_POST['id']);
  $nome = $conn->real_escape_string($_POST['nome']);
  //$data_nascimento =  $conn->real_escape_string($_POST['data-nascimento']);
  $perfil = $conn->real_escape_string($_POST['perfil']);
  $telefone = $conn->real_escape_string($telefone_celular);
  $email = $conn->real_escape_string($_POST['email']);
  $senha = password_hash($conn->real_escape_string($_POST['senha']), PASSWORD_DEFAULT);
  $hoje = date('Y-m-d');
  
  if ($id > 0) {
    $sql_code = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$perfil', telefone = '$telefone' WHERE id = '$id'";

    //$sql_code = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$perfil', telefone='$telefone' WHERE `usuarios`.`id` = '$id');";
    if ($conn->query($sql_code) === TRUE) {     
      $_SESSION['mensagem'] = '<div class="alert alert-success"> "Atualizado com sucesso!" </div>';
    } else {
      $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Usuário não cadastrao!" </div>';
    }
  } else {
    $sql_code = "INSERT INTO usuarios (nome, email, criado_por, senha, tipo, `data`,telefone) VALUES ('$nome','$email','{$_SESSION['id']}','$senha','$perfil','$hoje','$telefone');";
    if ($conn->query($sql_code) === TRUE) {     
      $_SESSION['mensagem'] = '<div class="alert alert-success"> "Criado com sucesso!" </div>';
    } else {
      $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Usuário não cadastrao!" </div>';
    }
  }
  // $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

  // Executa a query SQL
  //if ($conn->query($sql_code) === TRUE) {
  //  $_SESSION['mensagem'] = '<div class="alert alert-success"> "Atualizado com sucesso!" </div>';
  //} else {
  //  $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Usuário não cadastrao!" </div>';
//  }
}
// Fecha a conexão
$conn->close();

header("Location: listar_usuario.php");



?>