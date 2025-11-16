<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->codigoCliente?>,'<?=$obj->nomeCliente?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nomeCliente?></td>
</tr>
<?php
    $cont++;
}
?>