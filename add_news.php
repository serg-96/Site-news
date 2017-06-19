<?php

 include ("bd.php");
    if(isset($_POST['go_add']))
    {
   if (isset($_POST['title']))      {$title = $_POST['title']; if ($title == '') {unset($title);}}
   if (isset($_POST['data']))       {$data = $_POST['data']; if ($data == '') {unset($data);}}
   if (isset($_POST['intro_text'])) {$intro_text = nl2br($_POST['intro_text']); if ($intro_text == '') {unset($intro_text);}}
   if (isset($_POST['full_text']))  {$full_text = nl2br($_POST['full_text']); if ($full_text == '') {unset($full_text);}}

    if ($_POST['title']!="" && $_POST['data']!="" && $_POST['intro_text']!="" )
        {
            if (mysql_query ("INSERT INTO news (`title`,`data`,`intro_text`,`full_text`)
                             VALUES('$title','$data','$intro_text','$full_text')"))
//                  "INSERT INTO news SET
            // title='".$title."',
            // data='".$data."',
            // intro_text='".$intro_text."',
            // full_text='".$full_text."'" ))`sites_test`.
            {
                echo "<div class='clean-ok'>Новость успешно добавлена!";
            }
            else
            {
                echo "<div class='clean-gray'>Неудалось обработать базой<div>";
                      echo  $dar=mysql_error();
                // echo $der;
            }

        }
        else
          {
            echo "<div class='clean-error'><p>Незаполнена вся инфа.</p></div>";
          }
    } ?>

<!--
    <form name="form1" method="post" action="">
         <p>
           Введите название <br>
            <input type="text"  style="border:1px silver solid; width:160px;" name="title" id="title">
         </p>
           Введите дату добавления <br>
           <input name="data"  style="border:1px silver solid; width:160px;" type="text" id="datepicker" value="<?php $date = date("Y-m-d"); echo $date; ?>">
<br>
<p>
           Краткая новость<br>
           <textarea style="width:650px; height:240px;" name="intro_text" cols="80" ></textarea>
  </p>
         <p>
           Полная новость<br>
           <textarea style="width:650px; height:260px;"  name="full_text"  cols="80" ></textarea>
       </p>
     <input type="submit" class="buttons" name="go_add"  id="submit" value="Отправить">


</form> -->
