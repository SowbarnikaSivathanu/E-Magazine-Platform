<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="register_css.css">
  <link rel="stylesheet" href="index_css.css">
</head>
<body align-items="center" style = "background-color:white"> 
<?php include 'index_header.php'; ?><br><br><br><br><br>
	<div class= "container-fluid">
    <form method="post">
    <div class="container-form" >
        <h1 align="center">LOGIN</h1>
	      <p align = "center">Please Login with your Mail Id!</p>
        <hr>
		<label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
		<div align = "center"class="clearfix">
            <button type="submit" name="submit" class="signupbtn">Login</button>
        </div>  

		<p align="center">Don't have an account?<a href="register.php"> Registered? </a></p>
</form>
</body>
</html>
<?php
include 'conn.php';
session_start();
if(isset($_POST['submit'])){
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $res = mysqli_query($cn, "SELECT * FROM `Users` WHERE U_Email = '$email' AND Password = '$pass'") or die('query failed');
   if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
      if($row['User_Type'] == 'reader'){
         $_SESSION['reader_name'] = $row['U_Name'];
         $_SESSION['reader_email'] = $row['U_Email'];
         $_SESSION['reader_id'] = $row['User_Id'];
         header('location:readerhome.php');
      }elseif($row['User_Type'] == 'publisher'){
         $_SESSION['publisher_name'] = $row['U_Name'];
         $_SESSION['publisher_email'] = $row['U_Email'];
         $_SESSION['publisher_id'] = $row['User_Id'];
         header('location:publisherhome.php');
      }
      elseif($row['User_Type'] == 'advertiser'){
         $_SESSION['advertiser_name'] = $row['U_Name'];
         $_SESSION['advertiser_email'] = $row['U_Email'];
         $_SESSION['advertiser_id'] = $row['User_Id'];
         header('location:advertiser_home.php');
      }
   }else{
      $message[] = 'incorrect email or password!';
   }
}
?>