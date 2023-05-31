<?php
include('protect.php');
include('config.php');

$id = $_GET['id'];
$sql_code = "UPDATE usuarios SET desabilitado = '1' WHERE id = '$id'";
//$result = $conn->query($sql_code);

if ($conn->query($sql_code) === TRUE) {     
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Usuário excluido sucesso!" </div>';
  } else {
    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Usuário não excluido!" </div>';
  }

header("Location: listar_usuario.php");

?>