<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
}
if(isset($_POST['update_profile'])){
   $uname = $_POST['uname'];
   $email = $_POST['email'];
   $image = $_FILES['image']['name'];
   mysqli_query($cn, "UPDATE `users` SET U_Name = '$uname', U_Email='$email', U_Image = '$image' WHERE User_Id = '$publisher_id'") or die('query failed');
   
   $old_pw= $_POST['old_pw'];
   $update_pw = $_POST['update_pw'];
   $new_pw = $_POST['new_pw'];
   $c_pw = $_POST['c_pw'];

   if(!empty($update_pw) AND !empty($new_pw) AND !empty($c_pw)){
      if($update_pw != $old_pw){
         $message[] = 'old password not matched!';
      }elseif($new_pw != $c_pw){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($cn, "UPDATE `users` SET password='$new_pw' WHERE User_Id = '$publisher_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }
}
?>
<html>
<head>
   <title>update profile</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="register_css.css">
   <link rel="stylesheet" href="index_css.css">
</head>
<body style = "background-color:white">
<div class= "container-fluid"><br><br><br><br><br>
<form action="" method="POST"  enctype="multipart/form-data">
<div class="container-form">
<h1 class="title">update <span>profile</span></h1>

   <?php
         $res = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Id='$publisher_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
         $row = mysqli_fetch_assoc($res);
      ?>
      <hr>
         <label for="name"><b>Name</b></label>
         <input type="text" name="uname" value="<?php echo $row['U_Name']; ?>" placeholder="update username" required>
         <label for="email"><b>Email</b></label><br>
         <input type="email" name="email" value="<?php echo $row['U_Email']; ?>" placeholder="update email" required>
         <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
         <hr>
         <input type="hidden" name="old_pw" value="<?php echo $row['Password']; ?>">
         <label for="oldpass"><b>old password :</b></label>
         <input type="password" name="update_pw" placeholder="enter previous password" class="box">
         <label for="newpass"><b>new password :</b></label>
         <input type="password" name="new_pw" placeholder="enter new password" class="box">
         <label for="confirmpass"><b>confirm password :</b></label>
         <input type="password" name="c_pw" placeholder="confirm new password" class="box">
      </div>
      <button type ="submit" class="btnn" value="update profile" name="update_profile" >
   </form>
<?php
}
?>
</section>
<script src="src.js"></script>
</body>
</html>
