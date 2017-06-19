<?php
session_start();
require "bd.php";


$id = $_GET["id"];
pagedel($id);
header ("location: index.php");

function pagedel($id){    // функция удаления страниц
    $sql = "DELETE  FROM `news` WHERE id=$id";
    mysql_query($sql) or die (mysql_error());
}



/*<a href="delete-form-page.php?id=<?=$items["id"]?>">Удалить </a>`*/
?>


