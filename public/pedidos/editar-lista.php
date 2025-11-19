<?php foreach($res as $obj){ ?>
<tr>
    <td>
        <a class="mouse-click" onclick="alterar(<?=$obj->codigoPedidos?>)"><i class="fa-solid fa-pen-to-square"></i></a>
    </td>
    <th><?=$obj->codigoPedidos?></th>
    <td><?=$obj->CodigoCliente?></td>
    <td><?=date('d/m/Y', strtotime($obj->dataPedido))?></td>
</tr>
<?php } ?>