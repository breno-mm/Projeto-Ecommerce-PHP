<?php
include "../Config/config.php";
include_once(__DIR__ . "/../Controller/Produtos-Controller.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Login / Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php"><i class="bi bi-shop"></i> Acessar Conta</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
          <li class="nav-item"><a class="nav-link active" href="login.php"><i class="bi bi-box-arrow-in-right"></i>
              Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="container my-5 min-vh-100">
    <div class="row justify-content-center">
      <!-- Coluna Login -->
      <div class="col-md-6 mb-4">
        <h2 class="">Acessar sua conta:</h2>
        <div class="card shadow-lg border-0">
          <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-box-arrow-in-right"></i> Acesso
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="loginTabs" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" id="cliente-login-tab" data-bs-toggle="tab"
                  data-bs-target="#cliente-login" type="button">Cliente</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" id="fornecedor-login-tab" data-bs-toggle="tab"
                  data-bs-target="#fornecedor-login" type="button">Fornecedor</button>
              </li>
            </ul>
            <div class="tab-content mt-3">
              <!-- Login Cliente -->
              <div class="tab-pane fade show active" id="cliente-login">
                <form method="POST" action="login-cliente.php">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100"><i class="bi bi-person-check"></i> Entrar como
                    Cliente</button>
                </form>
              </div>
              <!-- Login Fornecedor -->
              <div class="tab-pane fade" id="fornecedor-login">
                <form method="POST" action="login-fornecedor.php">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success w-100"><i class="bi bi-building-check"></i> Entrar como
                    Fornecedor</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Coluna Registro -->
      <div class="col-md-6 mb-4">
        <h2>Crie sua conta:</h2>
        <div class="card shadow-lg border-0">
          <div class="card-header bg-success text-white fw-bold">
            <i class="bi bi-person-plus"></i> Registro
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="registerTabs" role="tablist">
              <li class="nav-item">
                <button class="nav-link active" id="cliente-reg-tab" data-bs-toggle="tab" data-bs-target="#cliente-reg"
                  type="button">Cliente</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" id="fornecedor-reg-tab" data-bs-toggle="tab" data-bs-target="#fornecedor-reg"
                  type="button">Fornecedor</button>
              </li>
            </ul>
            <div class="tab-content mt-3">
              <!-- Registro Cliente -->
              <div class="tab-pane fade show active" id="cliente-reg">
                <form method="POST" action="./clientes/actions/registrar-cliente.php">
                  <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nomeCliente" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" name="CPF" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100"><i class="bi bi-person-plus-fill"></i> Registrar
                    Cliente</button>
                </form>
              </div>
              <!-- Registro Fornecedor -->
              <div class="tab-pane fade" id="fornecedor-reg">
                <form method="POST" action="./fornecedores/actions/registrar-fornecedor.php">
                  <div class="mb-3">
                    <label class="form-label">Nome da Empresa</label>
                    <input type="text" name="nomeFornecedor" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">CNPJ</label>
                    <input type="text" name="CNPJ" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success w-100"><i class="bi bi-building-add"></i> Registrar
                    Fornecedor</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Botão voltar para home -->
    <div class="text-center mt-4">
      <a href="index.php" class="btn btn-success">
        <i class="bi bi-arrow-left-circle"></i> Voltar para Home
      </a>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer-copyright text-center text-white py-3" style="background-color: #004085;">
    © <?= $_SESSION['version'] ?> Copyright: <a class="text-white"
      href="https://rafaellfrasson.com.br/"><?= $_SESSION['copyright'] ?></a>
  </footer>
  <!-- Bootstrp scrip -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <!--JQuery -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.7.1.js"></script>
  <!-- func Ajax pré-configuradas -->
  <script src="./assets/js/ajaxpg.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>