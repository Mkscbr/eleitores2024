<?php
include('protect.php');
include('config.php');

$id = $_GET['id'];
$sql_code = "DELETE FROM contato WHERE id = '$id'";
//$result = $conn->query($sql_code);

if ($conn->query($sql_code) === TRUE) {     
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Contato excluido sucesso!" </div>';
  } else {
    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Falha ao excluir o contato!" </div>';
  }

header("Location: listar_contato.php");

?>