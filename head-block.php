<?php

?>
  <div class="col-md-12 head-block">  <!-- head-block -->
    <div class="col-md-7">

       <div class="col-md-1"> <!-- sign in -->
       <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#myModal">Вхід</button>
       <div id="myModal" class="modal fade">
       <div class="modal-dialog ">
       <div class="modal-content">
       <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
         <h4 class="modal-title">Вхід</h4>
       </div>
       <div class="modal-body">
       <form role="form" action="testreg.php" method="post">
       <div class="form-group">
        <label for="email">Login</label>
        <input type="text" name="login" class="form-control" id="email" placeholder="Введите login">
       </div>
       <div class="form-group">
        <label for="pass">Пароль</label>
        <input type="password" name="password"  class="form-control" id="pass" placeholder="Пароль">
       </div>
       <button type="submit" name="submit" class="btn btn-success">Войти</button>
       <br>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {    // Если пусты, то мы не выводим ссылку
         echo "Вы вошли на сайт, как гость";
    } else
    { // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login'];
    }
    // if (empty($_SESSION['login'])==TRUE)
    //   { $namaS=$_SESSION['login'];
    //   } else {
    //     $namaS="Вхід";
    //   }
    ?>
         </form>
         </div>
       <div class="modal-footer"><button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Закрыть</button></div>
       </div>
       </div>
       </div>
       </div> <!-- sign in -->

   <div class="col-md-2"> <!-- registration -->
     <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#myModalReg">Регістрація</button>
     <div id="myModalReg" class="modal fade">
     <div class="modal-dialog ">
     <div class="modal-content">
     <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
       <h4 class="modal-title">Регістрація</h4>
     </div>
     <div class="modal-body">
     <form role="form" action="save_user.php" method="post">
     <div class="form-group">
        <label for="email">Ваш логин:</label>
        <input type="text" name="login" class="form-control" id="email" placeholder="Введите логин">
     </div>
     <div class="form-group">
        <label for="pass">Пароль</label>
        <input type="password" name="password" class="form-control" id="pass" placeholder="Пароль">
     </div>
     <button type="submit" name="submit" class="btn btn-success">Зареєструватися</button>
     <br>
          <?php
          echo "$resultat";  ?>
     </form>
     </div>
     <div class="modal-footer"><button class="btn btn-default btn-sm" type="button" data-dismiss="modal">Закрыть</button></div>
     </div>
     </div>
     </div>
     </div>  <!-- registration -->

<div class="col-md-1"> <!-- add_news -->
  <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#add_news">Добавити новину</button>
  <div id="add_news" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
  <h4 class="modal-title">Новини</h4>
  </div>
  <div class="modal-body">
      <form role="form"  action="add_news.php" method="post" >
       <div class="form-group">
        <label for="title1">Заголовок тексту</label>
        <input type="title" class="form-control" name="title" id="title1" placeholder="Введіть заголовок">
       </div>

       <div class="form-group">
        <label for="datepicker">Дата добавляння</label>
        <input type="data" class="form-control" name="data" id="datepicker" value="<?php $date = date("Y-m-d"); echo $date; ?>">
       </div>
       <div class="form-group">
        <label for="intr_text">Вступний текст</label>
        <textarea class="form-control" name="intro_text"  id="intro_text" rows="3"></textarea>
       </div>
       <div class="form-group">
        <label for="exampleTextarea">Загальний текст</label>
        <textarea class="form-control" name="full_text"  id="exampleTextarea" rows="5"></textarea>
       </div>
       <button type="submit" name="go_add" class="btn btn-success">Добавити</button>
       <br>
          <?php
          echo "$add_new";  ?>
      </form>
  </div>
  <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Закрыть</button></div>
  </div>
  </div>
  </div>
</div><!-- add_news -->

     </div>
   </div>  <!-- /.head-block -->

<div class="col-md-12 top-menu">  <!-- top-menu -->
      <ul>
        <li><a href="#">Цены</a></li>
        <li><a href="#">Услуги</a></li>
        <li><a href="#">О нас</a></li>
        <li><a href="#">Контакты</a></li>
        <li><a href="#">Товары</a></li>
      </ul>
 </div>    <!-- /.top-menu -->
