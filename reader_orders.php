<?php
include 'conn.php';
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}
if(isset($_POST['order_btn'])){
   $name = mysqli_real_escape_string($cn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($cn, $_POST['email']);
   
   $address = mysqli_real_escape_string($cn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('Y-m-d');
   $final_total = 0;
   $cart_magazines[] = '';
   $result1 = mysqli_query($cn, "SELECT * FROM `cart` INNER JOIN magazines ON magazines.Magazine_Id=cart.Magazine_Id WHERE cart.User_Id = '$reader_id'") or die('query1 failed');
   if(mysqli_num_rows($result1) > 0){
      while($row1 = mysqli_fetch_assoc($result1)){
         $cart_magazines[] = $row1['Magazine_Name'].' ('.$row1['Quantity'].') ';
         $total = ($row1['Price'] * $row1['Quantity']);
         $final_total += $total;
      }
   }
   $total_magazines = implode(', ',$cart_magazines);
   $result2 = mysqli_query($cn, "SELECT * FROM `orders` WHERE User_Id = '$reader_id' AND R_Name='$name' AND Mobile = '$number' AND R_Email = '$email' AND Address = '$address' AND Total_Magazines = '$total_magazines' AND Total_Price = '$final_total'") or die('query2 failed...');
   if($final_total == 0){
      $message[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($result2) > 0){
         $message[] = 'order already placed!'; 
      }else{
         mysqli_query($cn, "INSERT INTO `orders`(User_Id,R_Name, Mobile, R_Email, Address, Total_Magazines, Total_Price, Placed_On) VALUES('$reader_id', '$name', '$number', '$email', '$address', '$total_magazines', '$final_total', '$placed_on')") or die('query3 failed');
         $message[] = 'order placed successfully!';
         mysqli_query($cn, "DELETE FROM `cart` WHERE User_Id = '$reader_id'") or die('query4 failed');
      }
   }
}




?>
<html>
<head>
   <title>reader-order</title>
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
    <link rel="stylesheet" href = "register_css.css">
    <link rel="stylesheet" href = "display.css">
</head>
<body><br><br><br><br><br>
<?php include 'reader_header.php'; ?>
<div class="w3-black w3-hover-shadow w3-center">

   <?php  
      $final_price = 0;
      $result3 = mysqli_query($cn, "SELECT * FROM `cart` INNER JOIN magazines ON magazines.Magazine_Id=cart.Magazine_Id WHERE cart.User_Id='$reader_id'") or die('query failed');
      if(mysqli_num_rows($result3) > 0){
         while($row3 = mysqli_fetch_assoc($result3)){
            $total_price = ($row3['Price'] * $row3['Quantity']);
            $final_price += $total_price;
   ?>
   <p> <?php echo $row3['Magazine_Name']; ?> <span>(<?php echo '₹'.$row3['Price'].'/-'.'  '. $row3['Quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <br><center>
    grand total : <span>₹<?php echo $final_price; ?>/-</span>
</div><br>
<section class="reader-orders">
<div class= "container-fluid">
<form action="" method="post">
    <div class="container-form">
        <h1 align="center">place your order</h1>
        <hr>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>

         <div class="inputBox">
            <span>Flat/House No :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no/house no.">
         </div>
         <div class="inputBox">
            <span>Street Name :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="inputBox">
            <span>city :</span>
            <select name="city">
               <option value="tirunelveli">tirunelveli</option>
               <option value="tuticorin">tuticorin</option>
               <option value="tiruchendhur">tiruchendhur</option>
            </select>
         </div>
         <div class="inputBox">
            <span>state :</span>
            <select name="state">
               <option value="tamilnadu">tamilnadu</option>
            </select>
         </div>
         <div class="inputBox">
            <span>country :</span>
            <select name="country">
               <option value="india">india</option>
            </select>
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <center><input type="submit" value="order now" class="btn" name="order_btn"></center>
   </form>
</section>
<script src="js/script.js"></script>
</body>
</html>
