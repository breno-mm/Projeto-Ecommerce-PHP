<?php foreach($res as $obj){ ?>
<tr>
    <td>
        <a class="mouse-click" onclick="removerItem(<?=$obj->codigoPedido?>, <?=$obj->codigoProduto?>)">
            <i class="fa-solid fa-trash"></i>
        </a>
    </td>
    <td><?=$obj->codigoPedido?></td>
    <td><?=$obj->codigoProduto?></td>
    <td><?=$obj->quantidade?></td>
</tr>
<?php } ?>