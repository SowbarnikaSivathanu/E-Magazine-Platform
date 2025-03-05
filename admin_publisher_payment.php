<?php
include 'conn.php';
session_start();
if(isset($_POST['update'])){
   $id = $_POST['id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($cn, "UPDATE `publisher_payment` SET Status = '$update_payment' WHERE Publisher_Id = '$id'") or die('query failed');
   $message[] = 'payment status has been updated!';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `publisher_payment` WHERE Publisher_Id = '$delete_id'") or die('query failed');
   header('location:admin_publisher_payment.php');
}
?>
<html>
<head>
   <title>orders</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index_css.css">
    <link rel="stylesheet" href="admin_css.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="admin_css1.css">
    <link rel="stylesheet" href="report.css">
    <link rel="stylesheet" href="table.css">
</head>
<style>
   input[type="date"]::-webkit-calendar-picker-indicator{
      filter:invert(1);
   }
</style>
<body style="background-color: black">
<?php include 'admin_header.php'; ?><br><br><br><br><br><br>
<center> 
<!-- <section id="remove" class="orders"> 
   <h1 class="title">Search payment details</h1>
   <form action="search_payment.php" method="post">
      <label>Date From <input type="date" name="startDate">&nbsp;</label>
      <label>To <input type="date" name = "endDate"><br><br></label>
      <input type="submit" name="search" class="btn" value="search artworks"><br><br><br>
   </form>
</center> 
</section> -->
<h1 class="title" style="color: white"><span>Publisher payment</h1>
<table class="container">
      <thead>
         <th><h1>id</h1></th>
         <th><h1>user id</h1></th>
         <th><h1>Magazine price</h1></th>
         <th><h1>final price</h1></th>
         <th><h1>placed on</h1></th>
         <th><h1>status</h1></th>
         <th id="remove"><h1>actions</h1></th>
      </thead>
      <tbody>
         <?php
            $res = mysqli_query($cn, "SELECT a.Publisher_Id,a.User_Id,p.Magazine_Name,a.Final_Price,a.Placed_On,a.Status FROM publisher_payment a INNER JOIN magazines p ON a.M_Name=p.Magazine_Name") or die('query failed');
            if(mysqli_num_rows($res) > 0){
               while($row = mysqli_fetch_assoc($res)){
         ?>
         <tr>
            <td><?php echo $row['Publisher_Id']; ?></td>
            <td><?php echo $row['User_Id']; ?></td>
            <td><?php echo $row['Magazine_Name']; ?></td>
            <td><?php echo $row['Final_Price']; ?></td>
            <td><?php echo $row['Placed_On']; ?></td>
            <td>
            <form action="admin_publisher_payment.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Publisher_Id']; ?>">
            <select name="update_payment" style = "color:black;">
               <option value="" selected disabled><?php echo $row['Status']; ?></option>
               <option value="Rs.<?php echo $row['Final_Price']?> is credited">credited</option>
               <option value="pending">pending</option>
            </select>
            <button style = "color:black;" id="remove" type="submit" name="update" class="btn"><i class="fas fa-edit"></i>update<button>
               </form>   
            </td>
            <td id="remove">
               <a id="remove" href="admin_publisher_payment.php?delete=<?php echo $row['Publisher_Id']; ?>" class="btnn" onclick="return confirm('remove this payment?');"> remove</a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo '<p class="empty">no payment yet!</p>';
            };
         ?>
      </tbody>
   </table>
</section>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="src.js"></script>
</body>
</html>
   