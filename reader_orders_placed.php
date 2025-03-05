<?php
include 'conn.php';
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap"/>
    
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="display.css">
  <link rel="stylesheet" href="index_css.css">
</head>
<body style = "background-color: white;"><br><br><br><br><br>
<?php include 'reader_header.php'; ?>
<div class="card" >
<div class="card-content">
      <h1>Your Order Details</h1>
      <?php
         $res = mysqli_query($cn, "SELECT * FROM `orders` inner join users on orders.User_Id=users.User_Id WHERE orders.User_Id = '$reader_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
      ?>
         <h2 style="color:blue;"> order placed on : <span><?php echo $row['Placed_On']; ?></span> </h2>
         <p> Name : <span  style="color:blue;"><?php echo $row['R_Name']; ?></span> </p>
         <p> Number : <span><?php echo $row['Mobile']; ?></span> </p>
         <p> Email : <span><?php echo $row['R_Email']; ?></span> </p>
         <p> Address : <span><?php echo $row['Address']; ?></span> </p>      
         <p> Your orders : <span><?php echo $row['Total_Magazines']; ?></span> </p>
         <p> Total price : <span>₹<?php echo $row['Total_Price']; ?>/-</span> </p>
         <center><br><hr width="100%" color="grey" size="4"></center>
         <p> order status : <span style="color:<?php if($row['Payment_Status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $row['Payment_Status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<h1>no orders placed!</h1>';
      }
      ?>
   </div></div>
</section>
<script src="js/script.js"></script>
</body>
</html>
