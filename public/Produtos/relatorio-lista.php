<?php
foreach($res as $obj ){   
?>
<tr>
    <th scope="row"><?=$cont?></th>
    <td><?=$obj->nomeProduto?></td>
    <td>R$<?=$obj->precoUnitario?></td>
    <td>
        <img src="uploads/produtos/<?=$obj->foto?>" alt="Foto" width="80">
    </td>
</tr>
<?php
    $cont++;
}
?>