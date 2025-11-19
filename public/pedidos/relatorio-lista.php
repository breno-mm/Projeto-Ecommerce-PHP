<?php foreach($res as $obj){ ?>
<tr>
    <th scope="row"><?=$obj->codigoPedidos?></th>
    <td><?=$obj->CodigoCliente?></td> <td><?=date('d/m/Y', strtotime($obj->dataPedido))?></td>
    <td>
        <?= ($obj->dataEnvio) ? date('d/m/Y', strtotime($obj->dataEnvio)) : '<span class="text-muted">Pendente</span>' ?>
    </td>
</tr>
<?php } ?>