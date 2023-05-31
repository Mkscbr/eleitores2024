<?php
include('protect.php');
include('config.php');

$id = $_GET['id'];
$sql_code = "DELETE FROM pessoa WHERE id = '$id'";
//$result = $conn->query($sql_code);

if ($conn->query($sql_code) === TRUE) {     
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Eleitor excluido sucesso!" </div>';
  } else {
    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Eleitor não excluido!" </div>';
  }

header("Location: listar_eleitor.php");

?>