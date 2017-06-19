<?php
session_start();
// подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT * FROM users ",$db);// запрос на выборку

while($row=mysql_fetch_array($result))
{
echo '<p>Запись id= '.$row['id'].'<p> login: '.$row['login'].' password= '.$row['password'].'</p>';// выводим данные
}

?>
