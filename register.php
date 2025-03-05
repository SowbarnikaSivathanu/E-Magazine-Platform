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
    <form method="post" enctype="multipart/form-data">
    <div class="container-form">
        <h1 align="center">User Registration</h1>
	    <p align = "center">Please fill in this form to create an account.</p>
        <hr>
		<tr>
      	<td align="right"><font size="3"><b>Register as&nbsp;:&nbsp;</b></font></td>
        <td>
		<select name="user_type" id="nname" style="width: 13em; height: 2em; font-size: 15px; color: black; ">
          <option value="reader">Reader</option>
          <option value="publisher">Publisher</option>
          <option value="advertiser">Advertiser</option>
        </select>
      	</td><br>
        <hr>  	
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="uname" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label for="confirmpassword"><b>Confirm Password</b></label>
        <input type="password" placeholder="Reenter Password" name="confirmpassword" required>

        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
    
        <p align= "center">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <div align = "center"class="clearfix">
            
            <button type="submit" name="btnRegister" class="signupbtn">Sign Up</button>
        </div>  
        <p align="center">Already have an account? <a href="login.php">login</a>.</p>
        </div>
    </form>
    <?php
        if (isset($info)) {
            echo $info;
        }
    ?>
</div></body>
</html>
<?php
include("conn.php");
if (isset($_POST['btnRegister']))
{
    $user_type = $_POST['user_type'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $password = $_POST['password'];
    $confirmpassword = $_POST["confirmpassword"];
    $date=date('Y-m-d');

    if($password == $confirmpassword){
      $query = "INSERT INTO Users(U_name, U_Email, U_image, Password, User_Type,Placed_On)VALUES('$uname','$email', '$image','$password', '$user_type','$date')";  
      mysqli_query($cn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
}
?>