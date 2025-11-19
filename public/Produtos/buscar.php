<?php
include_once("../../Config/conexao.php");
include_once("../../Controller/Produtos-Controller.php");

$termo = $_POST['termo'] ?? '';
$tarefa = new ProdutosController();

// Se o termo estiver vazio, busca todos, senão busca pelo nome
if(empty($termo)){
    $produtos = $tarefa->buscaTodos();
    $titulo = "Todos os Produtos";
} else {
    $produtos = $tarefa->buscaNome($termo);
    $titulo = "Resultados para: '" . htmlspecialchars($termo) . "'";
}
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark"><i class="bi bi-search me-2"></i><?=$titulo?></h3>
        <?php if(!empty($termo)): ?>
            <button onclick="ajaxopen('produtos/buscar', {termo: ''}, '#corpo')" class="btn btn-sm btn-outline-secondary">Limpar busca</button>
        <?php endif; ?>
    </div>

    <?php if(count($produtos) > 0): ?>
        <div class="row g-4">
            <?php foreach ($produtos as $p): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card card-produto h-100 border-0 shadow-sm">
                        <img src="uploads/produtos/<?= $p->foto ?>" class="img-produto card-img-top" style="height: 200px; object-fit: contain; padding: 10px;" alt="<?= $p->nomeProduto ?>">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fs-6 fw-bold text-truncate"><?= $p->nomeProduto ?></h5>
                            <div class="mt-auto">
                                <p class="card-text fs-4 text-primary fw-bold mb-2">
                                    R$ <?= number_format($p->precoUnitario, 2, ',', '.') ?>
                                </p>
                                <a href="#" class="btn btn-primary w-100 rounded-pill">
                                    <i class="bi bi-bag-plus me-1"></i> Comprar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <i class="bi bi-emoji-frown display-4"></i><br><br>
            Nenhum produto encontrado com esse nome.
        </div>
    <?php endif; ?>
</div>