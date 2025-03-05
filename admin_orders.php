<?php
include 'conn.php';
session_start();
if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($cn, "UPDATE `orders` SET Payment_Status = '$update_payment' WHERE Order_Id = '$order_update_id'") or die('query failed');
   $message[] = 'payment status has been updated!';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `orders` WHERE Order_Id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}
?>

<html>
<head><br><br><br><br>
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
<?php include 'admin_header.php'; ?>
<section id="remove" class="orders">
   <h1 class="title" style="color: white">placed orders</h1> 
</section>
<table class="container">
      <thead>
         <th><h1>user id<h1></th>
         <th><h1>placed on<h1></th>
         <th><h1>Reader Name<h1></th>
         <th><h1>email<h1></th>
         <th><h1>address<h1></th>
         <th><h1>total products<h1></th>
         <th><h1>total price<h1></th>

         <th><h1>status<h1></th>
         <th id="remove">action</th>
      </thead>
      <tbody>
         <?php
            $result = mysqli_query($cn, "SELECT * FROM `orders` INNER JOIN users ON orders.User_Id=users.User_Id");
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_assoc($result)){
         ?>
         <tr>
            <td><?php echo $row['User_Id']; ?></td>
            <td><?php echo $row['Placed_On']; ?></td>
            <td><?php echo $row['R_Name']; ?></td>
            <td><?php echo $row['R_Email']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Total_Magazines']; ?></td>
            <td><?php echo $row['Total_Price']; ?></td>

            <td>
            <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $row['Order_Id']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $row['Payment_Status']; ?></option>
               <option value="Atlas has accepted your order">Atlas has accepted your order</option>
               <option value="your item has been shipped">your item has been shipped</option>
               <option value="your order is arriving soon">your order is arriving soon</option>
               <option value="your order has almost reached">your order has almost reached</option>
               <option value="Your order from Atlas was delivered">Your order from Atlas was delivered</option>
               <option value="completed">completed</option>
            </select>
            <button  style = "color:black;" type="submit" name="update_order" class="btn"><i class="fas fa-edit"></i>update<button>
               </form>   
            </td>
            <td id="remove">
               <a href="admin_orders.php?delete=<?php echo $row['Order_Id']; ?>" class="btnn" onclick="return confirm('remove this order?');"> remove</a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo '<p class="empty">no orders placed yet!</p>';
            };
         ?>
      </tbody>
   </table>
</section>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="src.js"></script>
</body>
</html>
