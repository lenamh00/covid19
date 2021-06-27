<?php
require_once "pdo.php";
require_once "funcs.php";
session_start();

if(!isset($_SESSION["username"])){
  redirect("login.php");
}

flash_msg();

 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>index</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/styles.css">
  </head>

  <header >
      <nav>
        <div class="container"  style="background-color:#92badd; width:100%;"> 
             <ul class="nav navbar-nav">
               <a href="index.php"><h2 class="brand"     style="color:white;"> your Account </h2></a>
               <li>
                 <a href="add.php"   style="color:white;"><br>Add</a>
               </li>
              <li>
                <a href="profile.php"    style="color:white;"></br><?=$_SESSION["username"]?></a>
              </li>
              <li>
                <a href="logout.php"   style="color:white;"></br>logout</a>
              </li>
            </ul>
        </div>
      </nav>
    </header>
  <body style="background-color:silver;">
    <div class="container" style="background-color:silver; width:100%;">
      <div id="home-tiles" class="row">

        <div class="tiles" style="height: 350px; padding-bottom:30px;">
          <img class="center" width="65%" height="100%" src="images/web_dev.jpg"></img>
          <span>Welcome!</span>
        </div>
        <?php
        $stmt = $pdo->query("SELECT * FROM images");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-xm-12 col-sm-6 col-md-4">';
            echo '<div class="tiles">';
            echo '<img src="images/'.$row["image"].'" style="width:100%;height:100%;">';
            echo '<span>'.$row["title"];
          if($_SESSION["user_id"] == $row["user_id"]){
            echo '<a href="delete_images.php?src=images/'.$row["image"].'&image_id='.$row["image_id"].'"> del</a>';
          }
            echo '</span>';
            echo '</div>';
            echo '</div>';
}
 ?>
      </div>
    </div>
  </body>
  <!--
  <footer class="panel-footer" style="background-color: #222; border:0;">
     <div class="container">
       <div class="text-center">©Copyright <a href="https://MahmudMardini.bartinrehberi.info/ar" target="_blank">Mahmud Mardini</a> 2020</div>
     </div>
  </footer>-->
</html>
