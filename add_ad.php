<?php
include 'conn.php';
session_start();
$advertiser_id = $_SESSION['advertiser_id'];
if(!isset($advertiser_id)){
   header('location:login.php');
}
?>
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
<body align-items="center" style = "background-color:white"> <br><br>
<?php include 'advertiser_header.php'; ?><br><br><br><br><br>	<div class= "container-fluid">
    <form method="post" enctype="multipart/form-data">
    <div class="container-form">
        <h1 align="center">ADD ADVERTISEMENT</h1>
        <hr>
		<tr> 	
        <label for="name"><b> Company Name</b></label>
        <input type="text" placeholder="Enter Company Name" name="cname" required>

        <label for="email"><b>Advertisement Title</b></label>
        <input type="text" placeholder="Enter Title" name="adtitle" required>

        <label for="password"><b>Start Date</b></label>
        <input type="date" placeholder="Enter days" name="startdate" required>
        
        <label for="password"><b>End Date</b></label>
        <input type="date" placeholder="Enter days" name="enddate" required>


        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
    
        <button type="submit" name="btnadd" class="signupbtn">Add</button>

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
if (isset($_POST['btnadd']))
{
   
    $cname = $_POST['cname'];
    $adtitle = $_POST['adtitle'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $image = $_FILES['image']['name'];
    $date=date('Y-m-d');
    $query=mysqli_query($cn,"SELECT * FROM `add_adver` INNER JOIN users ON add_adver.User_Id = users.User_Id where add_adver.User_Id='$advertiser_id'") or die('query failed');
       if(mysqli_num_rows($query) >= 0)
       {
         $res = mysqli_query($cn, "INSERT INTO `add_adver`(User_Id, Company_Name, Title_Ad, startdate, enddate, Ad_Image, Added_On) VALUES('$advertiser_id','$cname', '$adtitle', '$startdate','$enddate', '$image', '$date')");
         
         if($res)
         {
             $message[] = 'One Advertisement added successfully!';
         }else{
             $message[] = 'UnSuccessfull!';
         }
       }
      }
?>