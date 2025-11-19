<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login / Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row">
    <!-- Coluna Login -->
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <ul class="nav nav-tabs" id="loginTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="cliente-login-tab" data-bs-toggle="tab" data-bs-target="#cliente-login" type="button">Cliente</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="fornecedor-login-tab" data-bs-toggle="tab" data-bs-target="#fornecedor-login" type="button">Fornecedor</button>
            </li>
          </ul>
          <div class="tab-content mt-3">
            <!-- Login Cliente -->
            <div class="tab-pane fade show active" id="cliente-login">
              <form method="POST" action="login-cliente.php">
                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Senha</label>
                  <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar como Cliente</button>
              </form>
            </div>
            <!-- Login Fornecedor -->
            <div class="tab-pane fade" id="fornecedor-login">
              <form method="POST" action="login-fornecedor.php">
                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Senha</label>
                  <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Entrar como Fornecedor</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Coluna Registro -->
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body">
          <ul class="nav nav-tabs" id="registerTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="cliente-reg-tab" data-bs-toggle="tab" data-bs-target="#cliente-reg" type="button">Cliente</button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="fornecedor-reg-tab" data-bs-toggle="tab" data-bs-target="#fornecedor-reg" type="button">Fornecedor</button>
            </li>
          </ul>
          <div class="tab-content mt-3">
            <!-- Registro Cliente -->
            <div class="tab-pane fade show active" id="cliente-reg">
              <form method="POST" action="./clientes/actions/registrar-cliente.php">
                <div class="mb-3">
                  <label>Nome</label>
                  <input type="text" name="nomeCliente" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>CPF</label>
                  <input type="text" name="CPF" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Senha</label>
                  <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrar Cliente</button>
              </form>
            </div>
            <!-- Registro Fornecedor -->
            <div class="tab-pane fade" id="fornecedor-reg">
              <form method="POST" action="./fornecedores/actions/registrar-fornecedor.php">
                <div class="mb-3">
                  <label>Nome da Empresa</label>
                  <input type="text" name="nomeFornecedor" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>CNPJ</label>
                  <input type="text" name="CNPJ" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Senha</label>
                  <input type="password" name="senha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Registrar Fornecedor</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
