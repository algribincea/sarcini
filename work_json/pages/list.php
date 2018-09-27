<?
require_once "functions.php";
$fileName = 'books.json';
$fileData = file_get_contents($fileName);
$books = json_decode($fileData, true);
?>

<table border="1">
    <thead>
    <tr>
        <th>Editie</th>
        <th>Titlu</th>
        <th>Pagini</th>
        <th>Autori</th>
    </tr>
    </thead>
    <tbody>
    <?
    foreach ($books as $cart) {?>
        <tr>
            <td><?=$cart['an'];?></td>
            <td><?=formatName($cart['titlu']);?></td>
            <td><?=$cart['pag'];?></td>
            <td>
                <?
                foreach ($cart['autori'] as $autor) {?>
                    <?=formatName($autor['nume']);?> <?=formatName($autor['prenume']);?> <br>
                <?}
                ?>
            </td>

        </tr>
    <?}
    ?>
    </tbody>
</table>
