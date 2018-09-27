<?php

$autori = dbSelect('SELECT id_a, first_name, last_name FROM autori ORDER BY first_name');

if(!empty($_POST['titlu']) && !empty($_POST['pagini'])){
    $queryString = "
      INSERT INTO books 
        (titlu, pagini, editie, id_a) 
      VALUES 
        (
        '{$_POST['titlu']}', 
        '{$_POST['pagini']}', 
        {$_POST['editie']},
        {$_POST['id_a']}
        )";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Add success';
    }else{
        $message = 'Add error';
    }

}
?>
<? if(empty($message)){?>

<form action="" method="post">
    <table border="1">
        <tr>
            <td>titlu</td>
            <td><input type="text" name="titlu"></td>
        </tr>
        <tr>
            <td>pagini</td>
            <td><input type="number" name="pagini"></td>
        </tr>
        <tr>
            <td>editie</td>
            <td><input type="number" name="editie"></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td>
                <select name="id_a">
                    <option value="0">select autor</option>
                    <? foreach ($autori as $autor) {?>
                        <option value="<?=$autor['id_a'];?>"><?=$autor['first_name']?> <?=$autor['last_name']?></option>
                    <?}?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="add">
            </td>
        </tr>
    </table>
</form>
<? }else{?>
    <strong><?=$message;?></strong>
<? }?>
