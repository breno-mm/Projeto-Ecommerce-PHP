<?php foreach ($res as $obj): ?>
<tr>
    <th scope="row"><?= $cont ?></th>
    <td><?= htmlspecialchars($obj['nomeProduto'] ?? '') ?></td>
    <td>R$<?= number_format($obj['precoUnitario'] ?? 0, 2, ',', '.') ?></td>
    <td>
        <?php if (!empty($obj['foto'])): ?>
            <img src="uploads/produtos/<?= htmlspecialchars($obj['foto']) ?>" alt="Foto" width="80">
        <?php else: ?>
            <span class="text-muted">Sem foto</span>
        <?php endif; ?>
    </td>
    <td>
        <a href="editar-produto.php?id=<?= $obj['codigoProduto'] ?>" class="btn btn-sm btn-warning">Editar</a>
        <a href="remover-produto.php?id=<?= $obj['codigoProduto'] ?>" class="btn btn-sm btn-danger">Remover</a>
    </td>
</tr>
<?php $cont++; endforeach; ?>
