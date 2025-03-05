<?php
include 'conn.php';
session_start();
if(isset($_POST['update_artwork']))
{
    $Magazine_Id = $_POST['Magazine_Id'];
    $m_name =  $_POST['magazine_name'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $lang = $_POST['language'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $file = $_FILES['pdf_file']['name'];

    $temp_name = $_FILES['pdf_file']['tmp_name'];
    $uploadDir = 'uploads/'.$file;
    mysqli_query($cn, "UPDATE `magazines` SET Magazine_Name='$m_name', Author='$author ',Category='$category ',Language='$lang',Description='$desc' ,Price ='$price'  WHERE Magazine_Id = '$Magazine_Id'") or die('query failed');
    if(!empty($file)){
      mysqli_query($cn, "UPDATE `magazines` SET M_File = '$file' WHERE Magazine_Id = '$id'") or die('query failed');
      move_uploaded_file($temp_name,$uploadDir);
   }  
   header('location:admin_view_magazines.php');
}
if(isset($_GET['delete']))
{
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `magazines` WHERE Magazine_Id = '$delete_id'") or die('query failed');
   header('location:admin_view_magazines.php');
}
?>
<html>
<head>
   <title>view Magazines</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="index_css.css">
    <link rel="stylesheet" href="admin_css.css">
    <link rel="stylesheet" href="register_css.css">
    <link rel="stylesheet" href="admin_css1.css">
    <link rel="stylesheet" href="report.css">
    <link rel="stylesheet" href="table.css">
    <style>
   input[type="date"]::-webkit-calendar-picker-indicator{
      filter:invert(1);
   }
</style>
</head>
<body style="background-color: black;">
<?php 
    include 'admin_header.php'; 
?>
<br><br><br><br>
<h1 class="title" style ="color: white;"> Magazines </h1><br>
<table class="container">
      <thead>
         <th>Magazine</th>
         <th><h1>Magazine name</h1></th>
         <th><h1>Author</h1></th>
         <th><h1>Category</h1></th>
         <th><h1>Language</h1></th>
         <th><h1>description</h1></th>
         <th><h1>Price</h1></th>
         <th><h1>placed on</h1></th>
         <th id="remove"><h1>action</h1></th>
      </thead>
      <tbody>
         <?php
            $result = mysqli_query($cn, "SELECT * FROM `magazines` order by Magazine_Name");
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_assoc($result)){
         ?>

         <tr>
            <td><a href="./uploads/<?php echo $row['M_File'] ?>"><img src="images/<?php echo $row['M_Image']; ?>"></a></td>
            <td><?php echo $row['Magazine_Name']; ?></td>
            <td><?php echo $row['Author']; ?></td>
            <td><?php echo $row['Category']; ?></td>
            <td><?php echo $row['Language']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td>₹<?php echo $row['Price']; ?>/-</td>
            <td><?php echo $row['Placed_On']; ?></td>
            <td id="remove">
               <a style = "color:black;" id="remove" href="admin_view_magazines.php?update=<?php echo $row['Magazine_Id']; ?>" class="option-btn"><i class="fas fa-edit" style = "color:black;"></i>update</a><br>
               <a id="remove" href="admin_view_magazines.php?delete=<?php echo $row['Magazine_Id']; ?>" class="delete-btn" onclick="return confirm('delete this artwork?');"><i class="fas fa-trash"></i> delete</a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo '<p class="empty">no magazines added yet!</p>';
            };
         ?>
      </tbody>
   </table>
</section>

<section class="edit-product-form">
  <div id="wrapper">
    <div class="scrollbar" id="style-1">
        <div class="force-overflow">
   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $res = mysqli_query($cn, "SELECT * FROM `magazines` WHERE Magazine_Id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
   ?>
   <form action="admin_view_magazines.php" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="Magazine_Id" value="<?php echo $row['Magazine_Id']; ?>">
      <input type="hidden" name="pdf_file" value="<?php echo $row['M_File']; ?>">
      <a href="./uploads/<?php echo $row['M_File'] ?>"></a>
      <input type="text" name="m_name" value="<?php echo $row['Magazine_Name']; ?>" class="box" required placeholder="enter Magazine name">
      <input type="text" name="author" value="<?php echo $row['Author']; ?>" class="box" required placeholder="enter Publisher name">
     
      <select name="category" class="box" required>
            <option><?php echo $row['Category']; ?></option>
               <option value="fashion">Fashion</option>
               <option value="technology">Technology</option>
               <option value="health">Health</option>
               <option value="business">Business</option>
         </select>
      <input type="text" name="lang" value="<?php echo $row['Language']; ?>" min="0" class="box" required placeholder="enter Magazine Language">
      <input type="text" name="desc" value="<?php echo $row['Description']; ?>" min="0" class="box" required placeholder="enter Magazine description">
      <input type="number" name="price" value="<?php echo $row['Price']; ?>" min="0" class="box" required placeholder="enter Magazine price">
      <input type="file" class="box" name="image" accept="image/jpg, image/jpeg, image/png">
      <button type="submit" name="update_artwork" class="btn"><i class="fas fa-edit"></i> update</button>
      <button type="reset" class="delete-btn"><a href="admin_view_magazines.php"><i class="fa fa-times"></i>cancel</a></button>
   </form>
</div></div></div>
   <?php
         }
        }
      }else{
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
     }
   ?>
</section>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="src.js"></script>
</body>
</html>

