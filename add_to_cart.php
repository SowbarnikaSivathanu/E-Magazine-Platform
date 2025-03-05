<?php

if(isset($_POST['add_to_cart'])){
   $id = $_POST['id'];
   $price = $_POST['price'];
   $quan = $_POST['quantity'];
   $image = $_POST['image'];
   $res = mysqli_query($cn, "SELECT * FROM `cart` WHERE Magazine_Id = '$id' and User_Id='$reader_id'") or die('query failed');
   if(mysqli_num_rows($res) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($cn, "INSERT INTO `cart`(Magazine_Id, User_Id, Price, Quantity, M_Image) VALUES('$id', '$reader_id', '$price', '$quan', '$image')") or die('query failed');
      $message[] = 'added to cart!';
   }
}
?>