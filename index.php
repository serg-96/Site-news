<?php
    //  вся процедура работает на сессиях.
    //Именно в ней хранятся данные  пользователя, пока он находится на сайте.
    // Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
<!DOCTYPE html>
<html>
  <head>
        <?php   $titl='auto';
                include_once "head.php";  ?>
        <link rel="stylesheet" href="css/blog.css">
        <link rel="stylesheet" href="css/bootstrap.css">
         <link href="css/dopstyle.css" rel="stylesheet" media="screen">
   <!--  <link href="blog.css" rel="stylesheet"> -->
  </head>
  <!-- ///////////////////////////////////////////// -->
<body>
<div class="container ">
<div class="row">
    <?php include_once "head-block.php"; ?><!-- head-block -->
  <div class="col-md-12 blog-post "> <!-- blog post -->
    <?php
      include ("bd.php");
        // Получаем количество записей таблицы news
      $res = mysql_query("SELECT * FROM `news` ORDER BY `data` DESC");
      while($row=mysql_fetch_array($res))
      {
        echo'<div class=" news p-16">  <div class="date"> <a class="btn " href="delRow.php?id='.$row["id"].'">
          <span class=\'glyphicon glyphicon-remove \'></span> </a></div>
         <h2 class=\'blog-post-title hTitli\'>'.$row['title']. '</h2>

          <p class=\'blog-post-meta dates\'>'.$row['data'].'</p>
         <p>'.$row['intro_text'].'</p>
         <p><a class="btn btn-default" href="full_news.php?id='.$row['id'].'"
          role="button">Даллі &raquo;</a></p>  </div> ';// выводим данные
      }
    ?>
  <!-- <h2 class="blog-post-title">Sample blog post</h2>
  <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark-оцінка</a></p>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
    Amet quo dolor praesentium sunt tempore incidunt ea minima eaque asperiores vel!
    Totam recusandae rem ullam obcaecati cum beatae quia, et repellat.</p>
  <p><a class="btn btn-default" href="#" role="button">Даллі &raquo;</a></p> -->
</div><!-- /.blog-post -->


    <div class="col-md-12 top-material"></div>
    <div class="col-md-3 left-sidebar"></div>
    <div class="col-md-9 content"></div>
    <?php  include ("footer.php"); ?>
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


