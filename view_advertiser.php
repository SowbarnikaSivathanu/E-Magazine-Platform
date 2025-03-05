<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
};
if(isset($_POST['update_magazine']))
{
   $id = $_POST['id'];
   $m_name = $_POST['m_name'];
   $category = $_POST['category'];
   $author = $_POST['author'];
   $lang = $_POST['language'];
   $des = $_POST['description'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $file = $_FILES['pdf_file']['name'];

   $temp_name = $_FILES['pdf_file']['tmp_name'];
   $uploadDir = 'uploads/'.$file;

   mysqli_query($cn, "UPDATE `magazines` SET Magazine_Name='$m_name',Author='$author',Category='$category',Language='$lang',Price='$price',Description='$des' WHERE Magazine_Id = '$id'") or die('query failed');
   if(!empty($image)){
      mysqli_query($conn, "UPDATE `magazines` SET M_Image = '$image' WHERE Magazine_Id = '$id'") or die('query failed');
   }  
   header('location:publisher_view.php');
   if(!empty($file)){
       mysqli_query($cn, "UPDATE `magazines` SET M_File = '$file' WHERE Magazine_Id = '$id'") or die('query failed');
       move_uploaded_file($temp_name,$uploadDir);
    }  
   header('location:publisher_view.php');
}
if(isset($_GET['delete']))
{
   $delete_id = $_GET['delete'];

   mysqli_query($cn, "DELETE magazines FROM magazines WHERE Magazine_Id='$delete_id'") or die('query failed');
   header('location:publisher_view.php');
}
?>

<html>
<head>
   <title>adding publisher Magazines</title>   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="card.css">
   <link rel="stylesheet" href="register_css.css">
   <style>
   body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
   .w3-bar-block .w3-bar-item {padding:10px}
   div.polaroid {
    width: 250px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    text-align: center;
}
</style>
</head>
<body align="center" style ="background-color: white "><br><br><br><br>
<h1 class="title" style = "color: white"> Magazines </h1>
<?php 
    include 'publisher_header.php'; 
?>
 
         <?php
            $res = mysqli_query($cn, "SELECT * FROM `magazines` where User_Id='$publisher_id'  order by Magazine_name");
            if(mysqli_num_rows($res) > 0){
               while($row = mysqli_fetch_assoc($res)){
         ?>
         <section class="card" >
         <article>
         <div class="article-wrapper">
         <figure><br><br>
         <a href="./uploads/<?php echo $row['M_File'] ?>">
         <img src="images/<?php echo $row['M_Image']; ?>" height="" alt=""></a></figure>
            <div class="article-body">
            <h2><?php echo $row['Magazine_Name']; ?><br></h2>
            <p>
            <?php echo $row['Author']; ?><br>
            <?php echo $row['Category']; ?><br>
            <?php echo $row['Language']; ?><br>
            Rs.<?php echo $row['Price']; ?><br>
            <?php echo $row['Description']; ?><br></p></div></div></article>
            <td>
               <a style = "color: black"  href="publisher_view.php?update=<?php echo $row['Magazine_Id']; ?>" class="option-btn"><i class="glyphicon glyphicon-pencil"></i> update</a>
               <a style = "color: black"  href="publisher_view.php?delete=<?php echo $row['Magazine_Id']; ?>" class="delete-btn" onclick="return confirm('delete this Magazine?');"><i class="glyphicon glyphicon-trash"></i> delete</a>
            </td><hr>
   </section><br>
        
         <?php
            };    
            }else{
               echo '<p class="empty">No Magazines added yet!</p>';
            };
         ?>

<div class="container-form">
        <h1 align="center">Magazine Update</h1>
        <hr>
		<tr>
   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $res = mysqli_query($cn, "SELECT * FROM `magazines` WHERE Magazine_Id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
   ?>
   <form action="publisher_view.php" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?php echo $row['Magazine_Id']; ?>">
      <input type="hidden" name="pdf_file" value="<?php echo $row['M_File']; ?>">

      <input type="text" name="m_name" value="<?php echo $row['Magazine_Name']; ?>" class="box" required placeholder="Enter Magazine name">
      <input type="text" name="author" value="<?php echo $row['Author']; ?>" class="box" required placeholder="Enter Author name">

      <select name="category" class="box" required>
            <option><?php echo $row['Category']; ?></option>
               <option value="comic">Comic</option>
               <option value="fiction">Fiction</option>
               <option value="thriller">Thriller</option>
               <option value="fantasy">Fantasy</option>
         </select>

      <input type="text" name="language" value="<?php echo $row['Language']; ?>" min="0" class="box" required placeholder="Enter Language">
      
      <input type="textarea" name="description" value="<?php echo $row['Description']; ?>" class="box">
      <input type="text" name="price" value="<?php echo $row['Price']; ?>" min="0" class="box" required placeholder="Enter price">
      <input type="file" name="pdf_file" accept="application/pdf" class="box">
      <button type="submit" name="update_magazine" class="btn"><i class="fas fa-edit"></i> update</button>
      <button type="reset" class="delete-btn"><a href="publisher_view.php"><i class="fa fa-times"></i>cancel</a></button>
   </form>
</div></div></div>
   <?php
         }
        }
      }else{
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
     }
   ?>
</div>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="script.js"></script>
</body>
</html>