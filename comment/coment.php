<?php

// Сообщение об ошибке:
error_reporting(E_ALL^E_NOTICE);

include ("comment.class.php");


$db = @mysql_connect ("localhost","root",""); //зєднуємось з базою
mysql_select_db ("sites_test",$db);

    /*   Выбираем все комментарии и наполняем массив $comments объектами */
    $comments = array();
    $result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

    while($row = mysql_fetch_assoc($result))
    {
        $comments[] = new Comment($row);
    }

?>

<div id="main">
        <?php
                /*  Вывод комментариев один за другим: */
                foreach($comments as $c){
                    echo $c->markup();
                }
        ?>

    <form role="form"  id="addCommentForm" class="modal-dialog " method="post" action="">
     <div class="form-group">
      <p>Добавить комментарий</p>
      <label for="name">Імя</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Введите імя">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Введите email">
      <label for="body">Зміст комментарію</label>
      <textarea name="body" class="form-control" id="body" cols="20" rows="5"></textarea>
     </div>
     <button type="submit" class="btn btn-success" id="submit">Відправити</button>
    </form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</div>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script> -->
