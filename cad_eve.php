<?php
include('protect.php');
include('config.php');

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$cor = $_POST['cor'];
$inicio = date('Y/m/d H:i:s', strtotime(str_replace("/", "-", str_replace(",", "", $_POST['inicio']))));
$fim = date('Y/m/d H:i:s', strtotime(str_replace("/", "-", str_replace(",", "", $_POST['fim']))));
$contato = $_POST['contato'];
$obs = $_POST['obs'];

if ($id > 0) {
  $sql = "UPDATE eventos SET titulo = '$titulo', cor = '$cor', inicio = '$inicio', fim = '$fim', contato = '$contato', obs = '$obs' WHERE eventos.id = '$id';";
  if ($conn->query($sql) === TRUE) {
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Evento Alterado com sucesso!" </div>';
    $conn->close();
    header("Location: agenda.php");

  } else {
    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Evento Não Alterado Cadastrado!" </div>';
    $conn->close();
    header("Location: agenda.php");

  }
} else {
  $sql = "INSERT INTO eventos (titulo, cor, inicio, fim, contato, obs) VALUES ('$titulo', '$cor', '$inicio', '$fim','$contato', '$obs')";
  if ($conn->query($sql) === TRUE) {
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Evento cadastrado com sucesso!" </div>';
    $conn->close();
    header("Location: agenda.php");

  } else {
    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Evento  Não Cadastrado!" </div>';
    $conn->close();
    header("Location: agenda.php");

  }
}




?>