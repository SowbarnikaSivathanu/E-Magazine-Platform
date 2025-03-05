<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
}
include 'publisher_header.php'; ?>
<html>
<head>
   <title>Payment for Publisher</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="display.css">
</head>
<body align = center style = "background-color:white;"><br><br><br><br><br>
<section class="publisher">

<h1><span>your </span>Magazine payment</h1><hr>
   <?php
        $res = mysqli_query($cn, "SELECT m.M_File,m.M_Image,m.Magazine_Name,m.Price,p.Final_price,p.Status FROM publisher_payment p INNER JOIN magazines m ON p.M_Name=m.Magazine_Name where p.User_Id='$publisher_id'");
        if(mysqli_num_rows($res)>0){
         while($row = mysqli_fetch_assoc($res)){             
    ?>
          <div class="card">
          <a href="./uploads/<?php echo $row['M_File'] ?>"><img src="images/<?php echo $row['M_Image']; ?>" height="" alt=""></a><hr>
          <div class="card-content">
          <h1><?php echo $row['Magazine_Name']; ?></h1>
          <p>Magazine price : <span>₹<?php echo $row['Price'] ?>/-</span></p>
          <p>Our commission : <span>₹100/-</span></p>
          <p>Total price : <span>₹<?php echo $row['Final_price'] ?>/-</span></p> 
          <p> Status : <span><?php echo $row['Status'] ?></span> </p>        
      </div></div>
      <?php
       }
      }
      ?>
   </div><br>
</section>
<center><button onclick="window.print()" class="btnn" id="remove">print report</button></center>
<script src="src.js"></script>
</body>
</html>

