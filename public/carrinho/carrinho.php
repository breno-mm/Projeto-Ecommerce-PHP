<?php
// --- PROTEÇÃO CONTRA ERRO "UNDEFINED VARIABLE" ---
// Se o $produtosController não veio do index, criamos ele aqui e agora.
if (!isset($produtosController)) {
    require_once __DIR__ . "/../../Controller/Produtos-Controller.php";
    $produtosController = new ProdutosController();
}
// -------------------------------------------------

$carrinho = $_SESSION['carrinho'] ?? [];
$totalGeral = 0;
?>

<div class="container my-5">
    <h2 class="mb-4"><i class="bi bi-cart3"></i> Meu Carrinho</h2>

    <?php if (empty($carrinho)): ?>
        <div class="alert alert-info text-center py-5 rounded-3 shadow-sm">
            <h4 class="fw-light">Seu carrinho está vazio!</h4>
            <p class="mb-4">Que tal adicionar alguns itens?</p>
            <a href="?home" class="btn btn-primary btn-lg rounded-pill px-5">Ver Produtos</a>
        </div>
    <?php else: ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Produto</th>
                                        <th class="text-center">Qtd</th>
                                        <th>Preço</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($carrinho as $idProduto => $quantidade): 
                                        // Busca dados no banco
                                        $prod = $produtosController->buscaCodigo($idProduto);
                                        
                                        // Se o produto foi deletado do banco mas está na sessão, ignora
                                        if(!$prod) continue; 
                                        
                                        $subtotal = $prod->precoUnitario * $quantidade;
                                        $totalGeral += $subtotal;
                                    ?>
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <img src="uploads/produtos/<?= $prod->foto ?>" 
                                                     style="width: 60px; height: 60px; object-fit: contain;" 
                                                     class="me-3 border rounded bg-white p-1"
                                                     onerror="this.src='assets/image/sem-foto.png'">
                                                <div>
                                                    <h6 class="mb-0 fw-bold"><?= $prod->nomeProduto ?></h6>
                                                    <small class="text-muted">Cód: <?= $prod->codigoProduto ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-white text-dark border"><?= $quantidade ?></span>
                                        </td>
                                        <td>R$ <?= number_format($prod->precoUnitario, 2, ',', '.') ?></td>
                                        <td class="fw-bold text-primary">R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                                        <td class="text-end pe-4">
                                            <button onclick="removerDoCarrinho(<?= $idProduto ?>)" class="btn btn-outline-danger btn-sm rounded-circle">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 bg-white">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold mb-4">Resumo do Pedido</h5>
                        
                        <div class="d-flex justify-content-between mb-2 text-muted">
                            <span>Subtotal</span>
                            <span>R$ <?= number_format($totalGeral, 2, ',', '.') ?></span>
                        </div>
                        
                        <hr class="my-3">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <strong class="fs-5">Total</strong>
                            <strong class="fs-4 text-success">R$ <?= number_format($totalGeral, 2, ',', '.') ?></strong>
                        </div>

                        <?php if (isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])): ?>
                            <button onclick="finalizarCompra()" class="btn btn-success w-100 py-3 fw-bold rounded-3 shadow-sm mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i> Finalizar Compra
                            </button>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-warning w-100 py-3 fw-bold text-dark mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Entre para Finalizar
                            </a>
                        <?php endif; ?>
                        
                        <a href="?home" class="btn btn-outline-secondary w-100 border-0">
                            <i class="bi bi-arrow-left me-1"></i> Continuar Comprando
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
</div>

<script>
function removerDoCarrinho(id) {
    if(confirm('Tem certeza que deseja remover este item?')) {
        $.post('carrinho/remover.php', {id: id}, function() {
            window.location.reload();
        });
    }
}

function finalizarCompra() {
    if(confirm('Confirmar o fechamento do pedido?')) {
        alert("Função de finalizar será implementada com gravação no banco!");
    }
}
</script>