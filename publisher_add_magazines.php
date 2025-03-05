<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
};
if(isset($_POST['add_magazines']))
{
    $m_name =  $_POST['magazine_name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $lang = $_POST['language'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $file = $_FILES['pdf_file']['name'];

    $temp_name = $_FILES['pdf_file']['tmp_name'];
    $uploadDir = 'uploads/'.$file;
    $date=date('Y-m-d');
    $i=$total * 0.10;
    $total=$i;

    $m_name =  $_POST['magazine_name'];
    $query1 = mysqli_query($cn, "SELECT M_Name FROM `publisher_payment` WHERE M_Name = '$m_name'") or die('query failed');
    if(mysqli_num_rows($query1) > 0)
    {
       $message[] = 'Payment Added!';
    }
    else
    {
    $res1 = mysqli_query($cn,"INSERT INTO `publisher_payment`(User_Id, M_Name, Final_Price,Status ,Placed_On) VALUES('$publisher_id','$m_name', '$total', '','$date');");
    }

    $query2 = mysqli_query($cn, "SELECT Magazine_Name FROM `magazines` WHERE Magazine_Name = '$m_name'") or die('query2 failed');
    if(mysqli_num_rows($query2) > 0)
    {
       $message[] = 'Magazines Already Added';
    }
    else
    {
       $query3=mysqli_query($cn,"SELECT * FROM `magazines` INNER JOIN users ON magazines.User_Id = users.User_Id where magazines.User_Id='$publisher_id'") or die('query3 failed');
       if(mysqli_num_rows($query3) >= 0)
       {
         $res = mysqli_query($cn, "INSERT INTO `magazines`(User_Id, Magazine_Name, Author, Category, Language, Description ,Price,M_Image, M_File, Placed_On) VALUES('$publisher_id','$m_name', '$author', '$category', '$lang', '$desc', '$price','$image','$file','$date')");
         move_uploaded_file($temp_name,$uploadDir);
         if($res)
         {
             $message[] = 'One Magazine added successfully!';
         }else{
             $message[] = 'UnSuccessfully!';
         }
       }
    }
}
?>
<html>
<head>
   <title>Adding Publisher Magazines</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="register_css.css">
   <link rel="stylesheet" href="index_css.css">
</head>
<body style = "background-color:white;">
<?php 
    include 'publisher_header.php'; 
?>
   <br><br><br><br>
	<div class= "container">
    <div class="container-form">
        <h1 align="center" style = "color:white;">Magazines</h1>
        <hr>
		<tr>
   <form action="publisher_add_magazines.php" method="post" enctype="multipart/form-data">
      <h3 style = "color:white;">Add magazines</h3>
      <input type="text" name="magazine_name" class="box" placeholder="Enter Magazine name" required>
      <input type="text" name="author" class="box" placeholder="Author" required>
      <select name="category" class="box" required style = "color:black;">
            <option value="" selected disabled>Select Magazine category</option>
            <option value="fashion">Fashion</option>
            <option value="technology">Technology</option>
            <option value="health">Health</option>
            <option value="business">Business</option>
      </select>
      <input type="text" min="0" name="language" class="box" placeholder="Enter Magazine Language" required>
      <input type="textarea" min="0" name="description" class="box" placeholder="Enter Description" required>
      <input type="text" min="0" name="price" class="box" placeholder="Enter price" required>
      Choose Image<input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box"required>
      Choose File<input type="file" name="pdf_file" accept="image/jpg, image/jpeg, image/png, application/pdf" class="box" required>
      <input type="submit" value="Add magazines" name="add_magazines" class="btn" style = "color:green;">
   </form>
</section>
<script src="script.js"></script>
</body>
</html>