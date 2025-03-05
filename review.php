<?php
include "conn.php";
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    
    $reviewer_name = $_POST["reviewer_name"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    $time = date("Y-m_d H:i:s");

    //$query=mysqli_query($cn,"SELECT * FROM `review` INNER JOIN users ON review.User_Id = users.User_Id where review.User_Id='$reader_id'") or die('query1 failed');
    
    $qry=mysqli_query($cn,"SELECT * FROM `review` where review.Magazine_Id = $id and review.User_Id='$reader_id'") or die('query1 failed');
    if(mysqli_num_rows($qry) == 0)
    {

      $res = mysqli_query($cn, "INSERT INTO `review`(User_Id, Magazine_Id, Reviewer_Name, Rating, Review, Submission_Date) VALUES('$reader_id','$id','$reviewer_name', '$rating', '$review', '$time')");

      if($res)
      {
          $message[] = 'Review submitted successfully!';
      }else{
          $message[] = 'UnSuccessfull!';
      }
    }
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
<body align-items="center" style = "background-color:white"> 
<?php include 'reader_header.php'; ?><br><br><br><br><br>	
<div class= "container-fluid">
    <form method="post" enctype="multipart/form-data">
    <div class="container-form">
        <h1 align="center">Product Review</h1>

<form method="post">
    <label for="reviewer_name">Your Name:</label>
    <input type="text" id="reviewer_name" name="reviewer_name" placeholder = "Reviewer Name" required><br><br>

    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" placeholder = "Rate 1 to 5" required><br><br>

    <label for="review">Review:</label><br>
    <textarea id="review" name="review" rows="4" cols="50" placeholder = "Review" required></textarea><br><br>

    <button type="submit" name="submit"  >Submit Review</button>
</form>

<a href="reader_magazines.php">Back</a><br>


</body>
</html>