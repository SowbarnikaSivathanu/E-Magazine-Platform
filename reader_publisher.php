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
   <link rel="stylesheet" href="index_css.css">   </head>
   <style>
   body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
   .w3-bar-block .w3-bar-item {padding:10px}
   div.polaroid {
    width: 250px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
}
</style>
<body align-items = "center"><br><br> 
<?php include 'reader_header.php'; ?>
<div id="band" class="container text-center">
  <h3>Atlas Magsters</h3>
  <p><em>Where stories come alive!</em></p>
  <p>We have created a  Magazine websites.</p>
  <br>
  <h1>Publisers</h1>
  <?php
    $result = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Type='publisher'");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
  ?>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong></strong></p><br>
      <a href="#demo" data-toggle="collapse">
      <a href="publisher.php?publisher_id=<?php echo $row['User_Id'];?>"  class="single-category">
      <img src="<?php echo $row['U_image'] ;?>" />
      <div class="category-title"><?php echo $row['U_Name'] ;?></div></a>
      </a>
    </div>
    

   <?php
    }
   } 
   ?>
   </section></div></div>
<script src="script.js"></script>
</body>
</html>