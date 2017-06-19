<?php
     session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   $titl=$row['title'];
            include_once "head.php"; ?>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/blog.css">
        <link rel="stylesheet" href="css/bootstrap.css">
         <link href="css/dopstyle.css" rel="stylesheet" media="screen">
         <!-- <link rel="stylesheet" type="text/css" href="comment/styles.css" /> -->
</head>
<body>
<div class="container ">
   <div class="row">
    <?php include_once "head-block.php"; ?><!-- head-block -->

      <div class="col-md-12 blog-post full_news"> <!-- blog post -->
<?php
      include ("bd.php");

        // Получаем количество записей таблицы news
      $res = mysql_query("SELECT * FROM `news` WHERE `id`=  " .$_GET['id'] );
      while($row=mysql_fetch_array($res))
      {
        echo'
         <h2 class=\'blog-post-title\'>'.$row['title'].'</h2>
         <p class=\'blog-post-meta dates\'>'.$row['data'].'</p>
         <p>'.$row['full_text'].'</p>';
      }
?>
</div><!-- /.blog-post -->


    <?php  include ("demo/demo.php"); ?>


   <?php  include ("footer.php"); ?>
   </div>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
