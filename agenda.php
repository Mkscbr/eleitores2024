<?php
include('protect.php');
include('config.php');

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
            <a href="listar_eleitor.php" class="nav-link px-3">
              <span class="me-2"><i class="bi bi-person-vcard"></i></span>
              <span>Eleitores</span>
            </a>
            <a href="listar_usuario.php" class="nav-link px-3">
              <span class="me-2"><i class="bi  bi-person-add"></i></span>
              <span>Usuários</span>
            </a>
            <a href="agenda.php" class="nav-link px-3 active">
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Agenda de Compromissos</h4>
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
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-calendar3 me-2"></i></span> Agenda
              </div>
              <div class="card-body">
                <div id="calendar"></div>
                <!-- Fim moda de Criação de envento-->
                <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="ver" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div id="id"></div>
                        <h1 class="modal-title fs-6" id="ver">Editar Evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form id="formedita" action="cad_eve.php?" method="POST">
                             <input type="text" class="form-control" name="id" id="id" hidden>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Título:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="titulo" id="titulo"
                                placeholder="Defina o título do Evento." required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cor:</label>
                            <div class="col-sm-10">
                              <select name="cor" class="form-control" id="cor" placeholder="Selecione a cor do evento."
                                required>
                                <option value="">Selecione</option>
                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Início do Evento:</label>
                            <div class="col-sm-8">
                              <input type="datetime" class="form-control" name="inicio" id="inicio" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Fim do Evento:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="fim" id="fim" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Contato:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="contato" id="contato"
                                placeholder="Responsável pelo evento">
                            </div>
                          </div>
                          <div class="row mb-3">

                            <label class="col-sm-12 col-form-label">Observações:</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="obs" id="obs"
                                placeholder="Observações sobre o Evento" style="height: 100px"></textarea>
                            </div>
                          </div>
                          <button type="submit" id="atualizar_alteracao" class="btn btn-success">Salvar
                            Alterações</button>
                          <button type="button" id="cancelar_alteracao" onclick="minhaFuncao()"
                            class="btn btn-warning">Cancelar</button>
                          <a href="" id="apagar_evento" class="btn btn-danger">Excluir Evento</a>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fim moda de Criação de envento-->


                <!--  Inicio modal de cadastro  -->
                <div class="modal fade" id="cadastrar" tabindex="-1" aria-labelledby="ver" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ver">Criar Evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="cad_eve.php" method="POST">
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Título:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="titulo" id="titulo"
                                placeholder="Defina o título do Evento." required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Cor:</label>
                            <div class="col-sm-10">
                              <select name="cor" class="form-control" id="cor" placeholder="Selecione a cor do evento."
                                required>
                                <option value="">Selecione</option>
                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Início do Evento:</label>
                            <div class="col-sm-8">
                              <input type="datetime" class="form-control" name="inicio" id="inicio" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-4 col-form-label">Fim do Evento:</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="fim" id="fim" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Contato:</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="contato" id="contato"
                                placeholder="Responsável pelo evento">
                            </div>
                          </div>
                          <div class="row mb-3">

                            <label class="col-sm-12 col-form-label">Observações:</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="obs" id="obs"
                                placeholder="Observações sobre o Evento" style="height: 100px"></textarea>
                            </div>
                          </div>
                          <button type="submit" id="cadevento" class="btn btn-success">Salvar Evento na Agenda</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--  Fim do  modal de cadastro  -->

              </div>
            </div>
          </div>
        </div>
      </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
  <script src="./dist/index.global.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
  <script src="./js/personalizado.js"></script>


</body>

</html>