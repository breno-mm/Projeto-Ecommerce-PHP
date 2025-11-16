<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->nomeCliente?></td>
</tr>
<?php
    $cont++;
}
?>