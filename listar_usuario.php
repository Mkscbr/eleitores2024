<?php
include('protect.php');
include('config.php');
$sql = "SELECT * FROM usuarios WHERE desabilitado = '0' ORDER BY id DESC";
$result = $conn->query($sql);
$id
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
  <title>Cadastro de Usuários</title>
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
            <a href="listar_eleitor.php" class="nav-link px-3 ">
              <span class="me-2"><i class="bi bi-person-vcard"></i></span>
              <span>Eleitores</span>
            </a>
            <a href="listar_usuario.php" class="nav-link px-3 active">
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Gerenciamento de Usuários</h4>
          <hr class="dropdown-divider bg-dark" />
        </div>
        <?php
        // Verificar se a variável de sessão existe e não está vazia
        if (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])) {
          // Exibir a mensagem dentro do alerta Bootstrap
          echo $_SESSION['mensagem'];

          // Limpar a variável de sessão para não exibir a mensagem novamente na próxima página
          unset($_SESSION['mensagem']);
        }
        ?>
        <div class="col-md-4">
          <a href='criar_usuario.php' class="btn btn-success">Cadastrar Novo Usuário</a>
          <p>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Usuários Cadastrados
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Perfil:</th>
                        <th scope="col">Criado em:</th>
                        <th scope="col">Telefone:</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['id'] . "</td>";
                        echo "<td>" . $user_data['nome'] . "</td>";
                        echo "<td>" . $user_data['email'] . "</td>";
                        echo "<td>" . $user_data['tipo'] . "</td>";
                        echo "<td>" . $user_data['data'] . "</td>";
                        echo "<td>" . $user_data['telefone'] . "</td>";
                        //echo"<td>".$user_data['Editar']."</td>";
                        //echo"<td>".$user_data['Excluir']."</td>";
                        echo "<td> 
                        <a class='btn btn-sm btn-primary' href='editar_usuario.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                             <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                         </svg>
                        </a>
                     </td>";
                        echo "<td> 
                        <button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#confirmarExclusao' data-nome='" . $user_data['nome'] . "' data-id='" . $user_data['id'] . "'>
                        <i class='bi bi-trash-fill'></i> </button>
                                </td>";

                      }
                      ?>

                      </tfoot>
                  </table>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="modal fade" id="confirmarExclusao" tabindex="-1" aria-labelledby="confirmarExclusaoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmarExclusaoLabel">Confirmação de Exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Você tem certeza que deseja excluir este usuário <strong id="usuarioExclusao"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a id="btnExcluir" class="btn btn-danger" href="#">Excluir</a>
        </div>
      </div>
    </div>
  </div>

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="./js/jquery-3.5.1.js"></script>
  <script src="./js/jquery.dataTables.min.js"></script>
  <script src="./js/dataTables.bootstrap5.min.js"></script>
  <script src="./js/script.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });

    $('#confirmarExclusao').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var nome = button.data('nome');
      var id = button.data('id');
      var modal = $(this);
      modal.find('#usuarioExclusao').text(nome);
      modal.find('#btnExcluir').attr('href', 'excluir_usuario.php?id=' + id);
    });
  </script>
</body>

</html>