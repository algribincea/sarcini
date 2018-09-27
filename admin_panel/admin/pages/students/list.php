<?php
if(!empty($_GET['delete'])){
    $queryString = "DELETE FROM books WHERE id_c = {$_GET['id']}";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Delete success';
    }else{
        $message = 'Delete error';
    }
}
?>
<?php

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
");
?>


<strong><?=$message;?></strong>

<? if(count($books)){?>
<table border="1">
    <thead>
        <tr>
            <th>Titlu</th>
            <th>Nr pagini</th>
            <th>An editie</th>
            <th>Nume autor</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($books as $book) {?>
        <tr>
            <td><?=$book['titlu'];?></td>
            <td><?=$book['pagini'];?></td>
            <td><?=$book['editie'];?></td>
            <td><?=$book['nume_autor'];?></td>
            <td>
                <a href="?module=students&action=list&delete=1&id=<?=$book['id_c'];?>" onclick="return confirm('Delete this record?')">X</a>
                <a href="?module=students&action=update&id=<?=$book['id_c'];?>">U</a>
            </td>
        </tr>
        <? }?>
    </tbody>
</table>
<? }else{?>
    <strong>No records</strong>
<? }?>
