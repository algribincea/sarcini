<?
error_reporting(E_ALL);
$fileName = 'books.json';
//$autori = [
//    'nume' => '',
//    'prenume' => '',
//];
if(
    !empty($_POST['an'])
    &&
    !empty($_POST['titlu'])
    &&
    !empty($_POST['pag'])
    &&
    !empty($_POST['nume'])
    &&
    !empty($_POST['prenume'])
){
    $fileData = file_get_contents($fileName);
    $books = json_decode($fileData, true);
    $aut = [
        "nume" => ['nume'],
        "prenume" => ['prenume'],
    ];
    $newElement = [
        "an" => trim($_POST['an']),
        "titlu" => trim($_POST['titlu']),
        "pag" => trim($_POST['pag']),
//        "autori" => ($_POST[$aut])
        "autori" => (($_POST['nume']) && ($_POST['prenume']))
    ];

    $books[] = $newElement;
    file_put_contents($fileName, json_encode($books));
}

?>

<form method="post">
    An <input type="text" name="an"><br>
    Titlu <input type="text" name="titlu"><br>
    Pagini <input type="number" name="pag"><br>
<!--    Autor <input type="text" name="autor"><br>-->
    <hr>
    Primul Autor <br>
    nume autor <input type="text" name="nume"><br>
    prenume autor <input type="text" name="prenume"><br>
    <hr>
    Al doilea Autor <br>
    nume autor <input type="text" name="nume"><br>
    prenume autor <input type="text" name="prenume"><br>
    <input type="submit" value="Add"><br>
</form>
