<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Welcoming Publisher</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="index_css.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'publisher_header.php'; ?>
</body>
</html>