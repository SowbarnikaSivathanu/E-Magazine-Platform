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
   <title>Welcoming Advertiser</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="index_css.css">
   <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.hero-image {
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("add.jpg");
  height: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.hero-text button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

.hero-text button:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'advertiser_header.php'; ?>
<body><br><br><br><br>
<div class="hero-image">
  <div class="hero-text">
    <h1 style="font-size:50px">I am <?php  echo $_SESSION['advertiser_name']; ?></h1>
    <p>And I'm a Advertiser</p>
    
  </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>