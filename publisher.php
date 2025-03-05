<?php
include 'conn.php';
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}
include 'add_to_cart.php';
?>
<html>
   <title>Category</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href= "cards.css">
   <link rel="stylesheet" href= "display.css">
   
</head>
<body>
<?php 
   include 'reader_header.php'; 
?><br><br><br><br>
    <h1 class="heading"><span><?php $_GET['publisher_id'];?></span> Magazines <a href="#all"><span>&#8594;</a></span></h1>
    <div class=" card-container">
   <?php  
      $p_id = $_GET['publisher_id'];
      $res = mysqli_query($cn, "SELECT * FROM `magazines` where User_Id= '$p_id'") or die('query failed');
      if(mysqli_num_rows($res) > 0){
         while($row = mysqli_fetch_assoc($res)){
            include 'card.php';
      }
   }else{
      echo '<p class="empty">No Magazines added yet!</p>';
   }
   ?>
</div>
<script src="js/script.js"></script>
</body>
</html>