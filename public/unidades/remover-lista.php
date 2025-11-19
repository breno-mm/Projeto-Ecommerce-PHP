<?php
foreach($res as $obj ){   
?>
<tr>
    <td>
        <a class="mouse-click" onclick="remover(<?=$obj->codigoUnidade?>,'<?=$obj->descricaoUnidade?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th><?=$cont?></th>
    <td><?=$obj->descricaoUnidade?></td>
</tr>
<?php
    $cont++;
}
?>