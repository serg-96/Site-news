<?php

// Сообщение об ошибке:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";


/*
/   Выбираем все комментарии и наполняем массив $comments объектами
*/

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
    $comments[] = new Comment($row);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Простая система комментариев с использованием AJAX </title>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>

<div id="main">
<?php

/*  Вывод комментариев один за другим:*/
foreach($comments as $c){
    echo $c->markup();
}

?>

<div id="addCommentContainer">
    <p>Добавить комментарий</p>
    <form id="addCommentForm" method="post" action="">
        <div>
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" />

            <label for="email">Email</label>
            <input type="text" name="email" id="email" />

            <label for="body">Содержание комментария</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>

            <input type="submit" id="submit" value="Отправить" />
        </div>
    </form>
</div>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html>
