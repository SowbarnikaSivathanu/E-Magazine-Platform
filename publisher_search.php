<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
}
include 'add_to_cart.php';
?>
<html>
<head>
   <title>search page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="reader_css.css">
   <link rel="stylesheet" href="admin_css1.css">
</head>
<body style="color:white"> 
<?php include 'publisher_header.php'; ?><br><br><br><br>
<section class="search-form">
<h1 class="heading"><span>Search Magazines</span> <a href="publisher_search.php"><span>&#8594;</a></span></h1>
   <form action="" method="post">
      <input type="text" name="search" placeholder="search magazines..." class="box">
      <input type="submit" name="submit" value="search" class="search-btn">
   </form>
</section><br><br>
<section class="magazines" style="padding-top: 10;>
   <div class="box-container">
   <?php
      if(isset($_POST['submit'])){
         $search_magazine = $_POST['search'];
         $res = mysqli_query($cn, "SELECT * FROM `magazines` WHERE Magazine_Name LIKE '%{$search_magazine}%' OR Category LIKE '%{$search_magazine}%' OR Language LIKE '%{$search_magazine}%' OR Author LIKE '%{$search_magazine}%'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
         while($row = mysqli_fetch_assoc($res)){
            include 'card.php';
      }
   }else{
      echo '<h1>No magazines found!</h1>';
   }
}
?>
</div>
</section>
<script src="js/script.js"></script>
</body>
</html>
