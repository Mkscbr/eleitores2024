<?php
include('protect.php');
include('config.php');


if (isset($_SESSION['id']) || isset($_SESSION['id'])) {

  $eleitor = $conn->real_escape_string($_POST['nome_eleitor']);
  $id = $conn->real_escape_string($_POST['id']);
  $data = $conn->real_escape_string($_POST['data']);
  $tipo = $conn->real_escape_string($_POST['tipo']);
  $situacao= $conn->real_escape_string($_POST['situacao']);
  $encaminhado = $conn->real_escape_string($_POST['encaminhado']);
  $solicitacao = $conn->real_escape_string($_POST['solicitacao']);
  $solucao = $conn->real_escape_string($_POST['solucao']);
   
    if ($id > 0) {
      $sql_code = "UPDATE contato SET eleitor = '$eleitor', data = '$data', tipo = '$tipo', solicitacao = '$solicitacao', solucao = '$solucao', situacao = '$situacao', encaminhado = '$encaminhado' WHERE id = '$id'";
      //$sql_code = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$perfil', telefone='$telefone' WHERE `usuarios`.`id` = '$id');";
      if ($conn->query($sql_code) === TRUE) {
        $_SESSION['mensagem'] = '<div class="alert alert-success"> "Contatto atualizado com sucesso!" </div>';
      } else {
        $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Contatto atualizado não cadastrao!" </div>';
      }
    } else {
      $sql_code = "INSERT INTO contato (eleitor, data, tipo, solicitacao, solucao, situacao, encaminhado) VALUES ('$eleitor','$data','$tipo','$solicitacao','$solucao','$situacao','$encaminhado');";
      if ($conn->query($sql_code) === TRUE) {
        $_SESSION['mensagem'] = '<div class="alert alert-success"> "Contato salvo com sucesso!" </div>';
      } else {
        $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Contato não cadastrao!" </div>';
      }
    }
    $conn->close();
    header("Location: listar_contato.php");
  }


// Fecha a conexão
?>

