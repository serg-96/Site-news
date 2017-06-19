<?php
/* Конец секции */

$db = @mysql_connect ("localhost","root","")or die('Не могу установить соединение с базой данных'); //зєднуємось з базою
mysql_query("SET NAMES 'utf8'");
mysql_select_db ("sites_test",$db);


// mysql_query("SET NAMES 'utf8'");
// mysql_select_db("db_database",$link);

?>
