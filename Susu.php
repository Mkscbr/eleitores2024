<script>
  function voltarPaginaAnterior() {
    // Voltar para a página anterior
    window.history.back();
  }
</script>
<?php
include('protect.php');

include('config.php');


if (isset($_SESSION['id']) || isset($_SESSION['id'])) {

  $telefone_celular = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $_POST['celular']))));
  $id = $conn->real_escape_string($_POST['id']);
  $nome = $conn->real_escape_string($_POST['nome']);
  //$data_nascimento =  $conn->real_escape_string($_POST['data-nascimento']);
  $perfil = $conn->real_escape_string($_POST['perfil']);
  $telefone = $conn->real_escape_string($telefone_celular);
  $email = $conn->real_escape_string($_POST['email']);
  $senha = password_hash($conn->real_escape_string($_POST['senha']), PASSWORD_DEFAULT);
  $hoje = date('Y-m-d');

  $sql_code = "SELECT id, email FROM usuarios WHERE email = '$email'";
  $result = $conn->query($sql_code);
  $row = $result->fetch_assoc();

  if ($result->num_rows > 0 && $id != $row['id']){

    $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Não cadastrado: E-mail já existe no banco de dados. " </div>';
    $conn->close();
    echo '<script>voltarPaginaAnterior();</script>';

  } else {
    if ($id > 0) {
      $sql_code = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', tipo = '$perfil', telefone = '$telefone' WHERE id = '$id'";

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
    $conn->close();
    header("Location: listar_usuario.php");
  }
}
?>

