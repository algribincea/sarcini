<?php

$page = isset($_GET['list']) ? $_GET['add'] : 'index';

switch($page) {
    case 'list':
        $title = 'List page';
        break;
    case 'add':
        $title = 'add page';
        break;
    default:
        $page = 'index';
        $title = 'List page';
        break;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $title; ?>
    </title>
</head>
<body>
<div>
    <a href="index.php?page=list">list</a>
    <a href="index.php?page=add">add</a>
</div>
<div>
    <? if(!empty($_GET['page'])){
        if(file_exists("pages/{$_GET['page']}.php"))
            include "pages/{$_GET['page']}.php";
        else
            include 'pages/404.php';
    }else{
        include 'pages/list.php';
    }
    ?>
</div>
</body>
</html>