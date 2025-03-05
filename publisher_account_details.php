<?php
include 'conn.php';
session_start();
$publisher_id = $_SESSION['publisher_id'];
if(!isset($publisher_id)){
   header('location:login.php');
}
include 'publisher_header.php'; ?>
<html>
<head>
   <title>Publisher Account Details</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><link rel="stylesheet" href="admin_css.css">
   <link rel="stylesheet" href="register_css.css">
  <link rel="stylesheet" href="index_css.css">
</head>
<body  style="background-color: white; color:#fff"><br><br><br><br>
<div class= "container-fluid">
   
    <div class="container-form">
<h1 class="title"><span>Fill your </span>Account details</h1>

</style>
<form action="publisher_account_details.php" method="POST">
		Account Number:<input type="number"  name="a_no" required >
		<br>
		Banks:
		<select name="b_name" class="box">
			<option disabled selected>Select Your Bank</option>
			<option value="SBI">State Bank Of India</option>
			<option value="ICICI">ICICI Bank</option>
			<option value="Canara">Canara Bank</option>
	   </select>
		<br>
      Account Name:
		<input type="text" name="a_name" required >
		<br>
		Expiry Date:
		<input type="text" name="ex" placeholder="MM/YY" required >
		<br>
      CCV:
		<input type="text" name="ccv" placeholder="XXX" required >
		<br>

		<input type="submit" value="Submit" name="submit" class="btn">
	</form>
<?php
if(isset($_POST['submit']))
{
   $a_no = $_POST['a_no'];
   $b_name = $_POST['b_name'];
   $a_name = $_POST['a_name'];
   $ex = $_POST['ex'];
   $ccv = $_POST['ccv'];
   $date=date('Y-m-d');
   $publisher_id=$_SESSION['publisher_id'];
   $sql1 = mysqli_query($cn, "SELECT User_Id FROM p_bankaccounts WHERE User_Id = '$publisher_id'") or die('query failed');
    if(mysqli_num_rows($sql1) > 0)
    {
        echo "<h2><center>Your bank details already added!</center></h1>";
    }
    else{
   $sql = "INSERT INTO p_bankaccounts (User_Id, Acc_No, Bank_Name, Acc_Name, Expiry_Date, CCV ) values ('$publisher_id','$a_no','$b_name','$a_name','$ex','$ccv')";  
   $result = mysqli_query($cn, $sql);  
   if($result)
   {
       echo "<h2><i> <center>Inserted successfully!</i> </center></h1>";  
   }  
   else
   {  
       echo "<h2><i> <center>Inserted failed!</i> </center></h1>";
   }     
}
}
?>
<script src="src.js"></script>