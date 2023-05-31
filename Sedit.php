<?php
    include('config.php');
    include('protect.php');
   // Obter dados do formulário
  $id = $conn->real_escape_string($_POST['id']);
  $nome = $conn->real_escape_string($_POST['nome']);
  $data_nascimento = $conn->real_escape_string($_POST['data-nascimento']);
  $estado_civil = $conn->real_escape_string($_POST['estado-civil']);
  $naturalidade = $conn->real_escape_string($_POST['naturalidade']);
  $cep = str_replace("-", "", $conn->real_escape_string($_POST['cep']));
  $endereco = $conn->real_escape_string($_POST['endereco']);
  $municipio = $conn->real_escape_string($_POST['municipio']);
  $estado = $conn->real_escape_string($_POST['estado']);
  $telefone_residencial = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $conn->real_escape_string($_POST['tel-residencial'])))));
  $telefone_contato = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $conn->real_escape_string($_POST['tel-contato'])))));
  $telefone_celular = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $conn->real_escape_string($_POST['celular'])))));
  $whatsapp = $conn->real_escape_string($_POST['whatsapp']);
  $indicacao = $conn->real_escape_string($_POST['indicacao']);
  $relacionamento = $conn->real_escape_string($_POST['relacionamento']);
  $complemento = $conn->real_escape_string($_POST['complemento']);
  $numero = $conn->real_escape_string($_POST['numero']);
  $sexo = $conn->real_escape_string($_POST['sexo']);
  $voto = $conn->real_escape_string($_POST['voto']);

  //calculo da idade  
  $atual = new DateTime();
  $nascimento = new DateTime($data_nascimento);
  $diferenca = $nascimento->diff($atual);
  $idade = $diferenca->y;
  echo $idade;
  
  if ($whatsapp == 2){
      $whatsapp = $telefone_celular;
  }
  $sql = "UPDATE `pessoa` SET `nome` = '$nome', `data_nascimento` = '$data_nascimento', `idade` = '$idade', `estado_civil` = '$estado_civil', `sexo` = '$sexo', `naturalidade` = '$naturalidade', `cep` = '$cep', `endereco` = '$endereco', `complemento` = '$complemento', `numero` = '$numero', `municipio` = '$municipio', `estado` = '$estado', `telefone_residencial` = '$telefone_residencial', `telefone_celular` = '$telefone_celular',  `whatsapp` = '$whatsapp', `telefone_contato` = '$telefone_contato', `indicacao` = '$indicacao',`voto`='$voto', `nivel_relacionamento` = '$relacionamento' WHERE `pessoa`.`id` = '$id';";
  
  // Executa a query SQL
  if ($conn->query($sql)=== TRUE) {
    $_SESSION['mensagem'] =  '<div class="alert alert-success"> "Informações atualizadas com sucesso!" </div>';
    $conn->close();

    header("Location: editar_eleitor.php?id=".urlencode($id));
  } else {
    $_SESSION['mensagem'] =  '<div class="alert alert-danger"> "Usuário não cadastrado!" </div>';
    header("Location: editar_eleitor.php?id=".urlencode($id));
    $conn->close();

  }

  // Fecha a conexão
  $conn->close();
  exit();

?>