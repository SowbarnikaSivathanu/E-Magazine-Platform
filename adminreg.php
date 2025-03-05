<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index_css.css">
  <link rel="stylesheet" href="register_css.css">
</head>
<body align="center" style = "background-color:white">
    <?php include "index_header.php" ?><br><Br><br><br><br>
	<div class= "container-fluid">
    <form method="post" action="dashboard.php">
    <div class="container-form">
        <h1 align="center">LOGIN</h1>
	      <p align = "center">Please Login with your admin password</p>
        <hr>
		<label for="email"><b>Admin Name</b></label>
        <input type="text" placeholder="Admin Name" name="admin" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>
		<div align = "center"class="clearfix">
            <button type="submit" name="submit" class="signupbtn">Login</button>
        </div>  
</form>
</body>
</html>
<?php
include 'conn.php';
session_start();
if(isset($_POST['submit'])){
   $admin = $_POST['admin'];
   $pwd = $_POST['pwd'];
   $res = mysqli_query($cn, "SELECT * FROM `admin` WHERE admin_name = '$admin' AND Password = '$pwd'") or die('query failed');
   if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_assoc($res);
         $_SESSION['adminname'] = $row['admin_Name'];
         $_SESSION['pwd'] = $row['password'];
         $_SESSION['aid'] = $row['id'];
         header('location:admin_home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }
}

