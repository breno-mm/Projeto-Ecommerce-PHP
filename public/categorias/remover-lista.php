<?php
foreach($res as $obj ){   
?>
<tr>
    <td>
        <a class="mouse-click" onclick="remover(<?=$obj->codigoCategoria?>, '<?=$obj->nomeCategoria?>')"><i class="fa-solid fa-trash"></i></a>
    </td>
    <th><?=$cont?></th>
    <td><?=$obj->nomeCategoria?></td>
</tr>
<?php
    $cont++;
}
?>