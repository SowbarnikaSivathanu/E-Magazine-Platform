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
<head>
   <title>Magazines</title>
   
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap"/>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cards.css" />
    <link rel="stylesheet" href="index_css.css">
</head>
<body > 
<?php include 'reader_header.php'; ?>
<div class = "container">
<h1 align = "center" class="heading" style="color:white"> Our <span>Magazine Category</span></h1>
<div class="categories-container" style="background: #000">
      <h2>Categories</h2>
       <section class="magazine_category">
       <div class="categories-list">
        <a href="rcategory.php?category=fashion" class="single-category"> <img src="fashion.jpg" alt="" /><div class="category-title">Fashion</div></a>
        <a href="rcategory.php?category=technology" class="single-category"> <img src="technology.jpg" alt="" /><div class="category-title">Technology</div></a>
        <a href="rcategory.php?category=health" class="single-category"> <img src="health.jpg" alt="" /><div class="category-title">Health</div></a>
        <a href="rcategory.php?category=business" class="single-category"> <img src="business.jpg" alt="" /><div class="category-title">Business</div></a>
       </div>
       </section>
</div>
</div>
<div class=" card-container">
      <?php  
      $res = mysqli_query($cn, "SELECT * FROM `magazines`") or die('query failed');
      if(mysqli_num_rows($res) > 0){
         while($row = mysqli_fetch_assoc($res)){
            include 'card.php';
      }
   }else{
      echo '<h1>No Magazines added yet!</h1>';
   }
   ?>
  <?php include 'ad_view.php'; ?>
</div>
<script src="js/script.js"></script>
</body>
</html>
