<?php
foreach($res as $obj ){   
?>
<tr>
    <td>
        <a class="mouse-click" onclick="alterar(<?=$obj->codigoUnidade?>)"><i class="fa-solid fa-pen-to-square"></i></a>
    </td>
    <th><?=$cont?></th>
    <td><?=$obj->descricaoUnidade?></td>
</tr>
<?php
    $cont++;
}
?>