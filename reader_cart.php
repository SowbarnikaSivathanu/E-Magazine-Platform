<?php
include 'conn.php';
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}
if(isset($_POST['update_cart'])){
   $id = $_POST['id'];
   $quan = $_POST['quan'];
   mysqli_query($cn, "UPDATE `cart` SET quantity = '$quan' WHERE Cart_Id = '$id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `cart` WHERE Cart_Id = '$delete_id'") or die('query failed');
   header('location:reader_cart.php');
}
if(isset($_GET['delete_all'])){
   mysqli_query($cn, "DELETE FROM `cart` WHERE User_Id = '$reader_id'") or die('query failed');
   header('location:reader_cart.php');
}
?>
<html>
<head>
   <title>Cart</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap"/>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="cards.css" />
    <link rel="stylesheet" href="index_css.css">
    <link rel="stylesheet" href="table.css">
</head>
<body style="background-color: white">
<?php include 'reader_header.php'; ?><br><br><br><br><br>
<h1 class="heading"> your <span>cart</span></h1>
<table class="container">
  <thead>
         <th><h1>Image</h1></th>
         <th><h1>Magazine Name</h1></th>
         <th><h1>Price</h1></th>
         <th><h1>Quantity</h1></th>
         <th><h1>Total price</h1></th>
         <th><h1>Action</h1></th>
      </thead>
      <tbody>
      <?php
         $grand_total = 0;
         $res = mysqli_query($cn, "SELECT * FROM `cart` INNER JOIN magazines ON cart.Magazine_Id=magazines.Magazine_Id where cart.User_Id='$reader_id'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)){   
      ?>
      <tr>
         <td><img src="images/<?php echo $row['M_Image']; ?>" height="100" alt=""></td>
         <td><?php echo $row['Magazine_Name']; ?></td>
         <td>₹<?php echo $row['Price']; ?>/-</td>
         <td>      
         <form action="" method="post">
            <input type="hidden" name="id"  value="<?php echo $row['Cart_Id']; ?>" >
            <input type="number" name="quan" min="1"  value="<?php echo $row['Quantity']; ?>" >
            <input type="submit" value="update" name="update_cart" class="remove-btn">
         </form>   
         </td>
         <td>₹<?php echo $sub_total = ($row['Quantity'] * $row['Price']); ?>/-</td>
         <td><a href="reader_cart.php?delete=<?php echo $row['Cart_Id']; ?>" onclick="return confirm('remove item from cart?')" class="remove-btn"> <i class="fas fa-trash"></i> remove</a></td>
      </tr>
      <?php
         $grand_total += $sub_total;  
         }
      }
      ?>
      <tr class="table-bottom">
         <td><a href="reader_magazines.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
         <td colspan="3">grand total</td>
         <td>₹<?php echo $grand_total; ?>/-</td>
         <td><a href="reader_cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="remove-btn"> <i class="fas fa-trash"></i> delete all </a></td>
      </tr>
      </tbody>
   </table>
   <center><a href="reader_orders.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout&#8594;</a>
</section>
</div>
<script src="js/script.js"></script>
</body>
</html>