<?php
    include('config.php');
    
   // Obter dados do formulário
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
  
  $sql = "INSERT INTO pessoa (nome, data_nascimento, idade, estado_civil, sexo, naturalidade, cep, endereco, complemento, numero, municipio, estado, telefone_residencial, telefone_celular, whatsapp, telefone_contato, indicacao, nivel_relacionamento, voto) VALUES ('$nome', '$data_nascimento', '$idade','$estado_civil','$sexo', '$naturalidade', '$cep', '$endereco', '$complemento','$numero','$municipio', '$estado', '$telefone_residencial', '$telefone_celular', '$whatsapp', '$telefone_contato', '$indicacao', '$relacionamento','$voto')";

  // Executa a query SQL
  if ($conn->query($sql)=== TRUE) {
    $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
    $conn->close();
    header("Location: listar_eleitor.php");

  } else {
    $_SESSION['mensagem'] = "Usuário!";
    header("Location: listar_eleitor.php");
    $conn->close();

  }

  // Fecha a conexão
 // $conn->close();
  exit();

?>