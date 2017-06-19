<?php
    include ("bd.php");// файл bd.php


        // Получаем количество записей таблицы news
        $res = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC");
        $res_array = mysql_fetch_row($res);

function ResToArray ($res_array)
{
   $array=array();
    while ($res_array!=false)
     {
        $array[]=$res_array;
     };
        result $array;
}






?>
