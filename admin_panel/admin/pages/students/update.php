<?php


$autori = dbSelect('SELECT id_a, first_name, last_name FROM autori ORDER BY first_name');

$books = dbSelect("
    SELECT
       books.id_c,
       books.titlu,
       books.pagini,
       books.editie,
       CONCAT(autori.first_name, ' ', autori.last_name) AS nume_autor
    FROM
        books
        JOIN autori ON books.id_a = autori.id_a
    WHERE
      books.id_c = {$_GET['id']} 
");
$book = current($books);

if(!empty($_POST['titlu']) && !empty($_POST['pagini'])){
    $queryString = "
      UPDATE books 
      SET 
        titlu= '{$_POST['titlu']}', 
        pagini= '{$_POST['pagini']}', 
        editie= {$_POST['editie']},
        id_a= {$_POST['id_a']}
      WHERE id_c = {$_GET['id']}
        ";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Update success';
    }else{
        $message = 'Update error';
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
            <td>Autor</td>
            <td>
                <select name="id_a">
                    <option value="0">select autor</option>
                    <? foreach ($autori as $autor) {?>
                        <option value="<?=$autor['id_a'];?>" <? if($autor['id_a'] === $student['id_a']) echo 'selected'?>><?=$autor['first_name']?> <?=$autor['last_name']?></option>
                    <?}?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="save">
            </td>
        </tr>
    </table>
</form>
<? }else{?>
    <strong><?=$message;?></strong>
<? }?>
