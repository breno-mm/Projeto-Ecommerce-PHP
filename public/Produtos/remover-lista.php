<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="remover(<?=$obj->codigoProduto?>,'<?=$obj->nomeProduto?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nomeProduto?></td>
    <td>R$<?=$obj->precoUnitario?></td>
</tr>
<?php
    $cont++;
}
?>