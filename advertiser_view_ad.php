<?php
include 'conn.php';
session_start();
$advertiser_id = $_SESSION['advertiser_id'];
if(!isset($advertiser_id)){
   header('location:login.php');
}

if(isset($_POST['update_ad']))
{
    $cname = $_POST['cname'];
    $adtitle = $_POST['adtitle'];
    $daysdis = $_POST['daysdis'];
    $image = $_FILES['image']['name'];

   mysqli_query($cn, "UPDATE `add_adver` SET Company_Name='$cname ',Title_Ad=' $adtitle',Days_Dis='$daysdis' WHERE Ad_Id = '$id'") or die('query failed');
   if(!empty($image)){
      mysqli_query($cn, "UPDATE `add_adver` SET Ad_Image = '$image' WHERE Ad_Id = '$id'") or die('query failed');
   }  
   header('location:advertiser_view_ad.php');
}
if(isset($_GET['delete']))
{
   $delete_id = $_GET['delete'];

   mysqli_query($cn, "DELETE add_adver FROM add_adver WHERE Ad_Id='$delete_id'") or die('query failed');
   header('location:advertiser_view_ad.php');
}
?>

<html>
<head>
   <title>Advertiser</title>   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="cards.css">
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
<h1 class="title" style = "color: white"> Advertisement </h1>
<?php 
    include 'advertiser_header.php'; 
?>
 
         <?php
            $res = mysqli_query($cn, "SELECT * FROM `add_adver` where User_Id='$advertiser_id'  order by Company_Name");
            if(mysqli_num_rows($res) > 0){
               while($row = mysqli_fetch_assoc($res)){
         ?>
         <section class="card" >
         <article>
         <div class="article-wrapper">
         <figure><br><br>
         <img src="images/<?php echo $row['Ad_Image']; ?>" height="200" alt=""></a></figure>
            <div class="article-body">
            <h2>Company Name: <?php echo $row['Company_Name']; ?><br></h2>
            <p>
            Advertisement Title:  <?php echo $row['Title_Ad']; ?><br>
         
            </p></div></div></article>
            <td>
               <a style = "color: black"  href="advertiser_view_ad.php?update=<?php echo $row['Ad_Id']; ?>" class="option-btn"><i class="glyphicon glyphicon-pencil"></i> update</a>
               <a style = "color: black"  href="advertiser_view_ad.php?delete=<?php echo $row['Ad_Id']; ?>" class="delete-btn" onclick="return confirm('delete this Magazine?');"><i class="glyphicon glyphicon-trash"></i> delete</a>
            </td><hr>
   </section><br>
        
         <?php
            };    
            }else{
               echo '<p class="empty">No advertisement added yet!</p>';
            };
         ?>

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $res = mysqli_query($cn, "SELECT * FROM `add_adver` WHERE Ad_Id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){
   ?>
   <div class="container-form">
        <h1 align="center">Advertisement Update</h1>
        <hr>
		<tr>
   <form action="advertiser_view_ad.php" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="id" value="<?php echo $row['Ad_Id']; ?>">
      <input type="hidden" name="image" value="<?php echo $row['Ad_Image']; ?>">
      <input type="text" name="cname" value="<?php echo $row['Company_Name']; ?>" class="box" required placeholder="Enter Magazine name">
      <input type="text" name="adtitle" value="<?php echo $row['Title_Ad']; ?>" class="box" required placeholder="Enter Author name">
      <input type="text" name="daysdis" value="<?php echo $row['Days_Dis']; ?>" min="0" class="box" required placeholder="Enter Language">
      <button type="submit" name="update_ad" class="btn"><i class="fas fa-edit"></i> update</button>
      <button type="reset" class="delete-btn"><a href="advertiser_view_ad.php"><i class="fa fa-times"></i>cancel</a></button>
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