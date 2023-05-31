<?php
include('protect.php');
include('config.php');

$id = $_GET['id'];
$sql = "SELECT * FROM pessoa WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($user_data = mysqli_fetch_assoc($result)) {
    $nome = $user_data['nome'];
    $data_nascimento = $user_data['data_nascimento'];
    $estado_civil = $user_data['estado_civil'];
    $naturalidade = $user_data['naturalidade'];
    $cep = str_replace("-", "", $user_data['cep']);
    $endereco = $user_data['endereco'];
    $municipio = $user_data['municipio'];
    $estado = $user_data['estado'];
    $telefone_residencial = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $user_data['telefone_residencial']))));
    $telefone_contato = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $user_data['telefone_contato']))));
    $telefone_celular = str_replace("(", "", str_replace(")", "", str_replace(" ", "", str_replace("-", "", $user_data['telefone_celular']))));
    $whatsapp = $user_data['whatsapp'];
    $indicacao = $user_data['indicacao'];
    $relacionamento = $user_data['nivel_relacionamento'];
    $complemento = $user_data['complemento'];
    $numero = $user_data['numero'];
    $sexo = $user_data['sexo'];
    $voto = $user_data['voto'];

  }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/personalizado.js"></script>
  <title>Cadastro de Eleitores</title>
</head>

<body>

  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="principal.php">Eleitores 2023</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
        aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <form class="d-flex ms-auto my-3 my-lg-0">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="edit_usuario">Minha Conta</a></li>
              <li><a class="dropdown-item" href="#">____________________</a></li>
              <li>
                <a class="dropdown-item" href="logout.php">Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3">

            </div>
          </li>
          <li>
            <a href="principal.php" class="nav-link px-3 ">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Gerenciamento
            </div>
            <a href="listar_eleitor.php" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-person-vcard"></i></span>
              <span>Eleitores</span>
            </a>
            <a href="listar_usuario.php" class="nav-link px-3 ">
              <span class="me-2"><i class="bi  bi-person-add"></i></span>
              <span>Usuários</span>
            </a>
            <a href="agenda.php" class="nav-link px-3">
              <span class="me-2"><i class="bi  bi-calendar3"></i></span>
              <span>Agenda</span>
            </a>
            <a href="listar_contato.php" class="nav-link px-3">
              <span class="me-2"><i class="bi  bi-megaphone"></i></span>
              <span>Contatos</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->
  <main class="mt-5 pt-3">
    <!-- inicio do form -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row g-1 align-items-center">
                <div class="container mt-50">
                  <h4>Cadastro de Eleitor</h4>
                  <hr class="dropdown-divider bg-dark" />

                  <?php
                  // Verificar se a variável de sessão existe e não está vazia
                  if (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])) {
                    // Exibir a mensagem dentro do alerta Bootstrap
                    echo $_SESSION['mensagem'];

                    // Limpar a variável de sessão para não exibir a mensagem novamente na próxima página
                    unset($_SESSION['mensagem']);
                  }
                  ?>
                  <form class="row g-4" action="sedit.php" method="POST">
                    <div style="visibility:hidden">
                      <input display=none value="<?php echo $id ?>" type="text" class="form-control" id="id"
                        name="id" />
                    </div>
                    <div class="col-md-8">
                      <label for="nome">Nome Completo:</label>
                      <input value="<?php echo $nome ?>" type="text" class="form-control" id="nome" name="nome"
                        placeholder="Digite seu nome completo" required />
                    </div>
                    <div class="col-md-4">
                      <label for="voto">Situação do voto:</label>
                      <select class="form-control" id="voto" name="voto">
                        <option value="<?php echo $voto ?>"><?php echo $voto ?></option>
                        <option value="Em aberto">Em aberto</option>
                        <option value="Certo">Certo</option>
                        <option value="Não">Não</option>
                        <option value="Incerto">Incerto</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="data-nascimento">Data de Nascimento:</label>
                      <input value="<?php echo $data_nascimento ?>" type="date" class="form-control"
                        id="data-nascimento" name="data-nascimento" required />
                    </div>
                    <div class="col-md-4">
                      <label for="estado-civil ">Estado Civil:</label>
                      <select class="form-control" id="estado-civil" name="estado-civil" required>
                        <option value="<?php echo $estado_civil ?>"><?php echo $estado_civil ?></option>
                        <option value="solteiro">Solteiro(a)</option>
                        <option value="casado">Casado(a)</option>
                        <option value="divorciado">Divorciado(a)</option>
                        <option value="viuvo">Viúvo(a)</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="sexo">Sexo:</label>
                      <select class="form-control" id="sexo" name="sexo" required>
                        <option value="<?php echo $sexo ?>"><?php echo $sexo ?></option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Marculino</option>
                        <option value="Prefiro não informar">
                          Prefiro não informar
                        </option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <label for="indicacao">Indicação:</label>
                      <input value="<?php echo $indicacao ?>" type="text" class="form-control" id="indicacao"
                        name="indicacao" placeholder="Nome da pessoa que te indicou" />
                    </div>
                    <div class="form-group col-md-4">
                      <label for="relacionamento">Relacionamento:</label>
                      <select class="form-control" id="relacionamento" name="relacionamento">
                        <option value="<?php echo $relacionamento ?>"><?php echo $relacionamento ?></option>
                        <option value="Amigo(a)">Amigo(a)</option>
                        <option value="Conhecido(a)">Conhecido(a)</option>
                        <option value="Familiar">Familiar</option>
                        <option value="Professor(a)">Professor(a)</option>
                        <option value="Funcionario(a)">Funcionário(a)</option>
                        <option value="Prefiro não informar">
                          Prefiro não informar
                        </option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="naturalidade">Naturalidade:</label>
                      <input value="<?php echo $naturalidade ?>" type="text" class="form-control" id="naturalidade"
                        name="naturalidade" placeholder="Local de Nascimento" required />
                    </div>
                    <div class="col-md-6">
                      <label for="cep">CEP:</label>
                      <input type="text" value="<?php echo $cep ?>" class="cep_mask form-control" id="cep" name="cep"
                        required />
                    </div>
                    <div class="col-md-12">
                      <label for="endereco">Endereço:</label>
                      <input type="text" value="<?php echo $endereco ?>" class="form-control" id="endereco"
                        name="endereco" placeholder="Endereço completo" />
                    </div>
                    <div class="col-md-8">
                      <label for="complemento">Complemento:</label>
                      <input type="text" value="<?php echo $complemento ?>" class="form-control" id="complemento"
                        name="complemento" required />
                    </div>
                    <div class="col-md-4">
                      <label for="numero">Número:</label>
                      <input type="text" value="<?php echo $numero ?>" class="form-control" id="numero" name="numero" />
                    </div>
                    <div class="col-md-6">
                      <label for="municipio">Município:</label>
                      <input type="text" value="<?php echo $municipio ?>" class="form-control" id="municipio"
                        name="municipio" required />
                    </div>
                    <div class="col-md-6">
                      <label for="estado">Estado:</label>
                      <select class="form-control" id="estado" name="estado" required>
                        <option value="<?php echo $estado ?>"><?php echo $estado ?></option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">MatoGrosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="tel-residencial">Telefone Residencial:</label>
                      <input type="tel" class="phone-mask form-control" id="tel-residencial" name="tel-residencial"
                        value="<?php echo $telefone_residencial ?>" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" />
                    </div>
                    <div class="col-md-6">
                      <label for="tel-contato">Telefone de Contato:</label>
                      <input type="tel" class="phone-mask form-control" value="<?php echo $telefone_contato ?>"
                        id="tel-contato" name="tel-contato" required />
                    </div>
                    <div class="col-md-6">
                      <label for="celular">Celular:</label>
                      <input type="tel" value="<?php echo $telefone_celular ?>" class="cel-mask form-control"
                        id="celular" name="celular" required />
                    </div>
                    <div class="col-md-6">
                      <label for="whatsapp">Este celular é whatsapp?</label>
                      <select class="form-control" id="whatsapp" name="whatsapp">
                        <option value="<?php echo $whatsapp ?>"><?php echo $whatsapp ?>app</option>
                        <option value="Nao e">Não é whatsapp</option>
                        <option value="2">Sim é whatsapp</option>
                        <option value="NI">Não Informar</option>
                      </select>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-dark col-lg-12">
                        Salvar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim do form -->

  </main>


  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>


  <script>
    var urlParams = new URLSearchParams(window.location.search);
    var mensagem = urlParams.get('mensagem');
    if (mensagem !== null) {
      alert(mensagem);
    }
  </script>
</body>

</html>