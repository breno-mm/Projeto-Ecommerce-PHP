<?php
foreach($res as $obj ){   
?>
<tr>
    <td >
        <a class="mouse-click" onclick="alterar(<?=$obj->codigoCliente?>)"><i class="fa-solid fa-user-pen"></i></a>
    </td>
    <th ><?=$cont?></th>
    <td ><?=$obj->nomeCliente?></td>
</tr>
<?php
    $cont++;
}
?>