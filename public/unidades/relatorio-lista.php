<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->descricaoUnidade?></td>
</tr>
<?php
    $cont++;
}
?>