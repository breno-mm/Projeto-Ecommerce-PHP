<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->nomeCategoria?></td>
</tr>
<?php
    $cont++;
}
?>