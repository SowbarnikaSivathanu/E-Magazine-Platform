<?php
include 'conn.php';
session_start();
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `p_bankaccounts` WHERE Bank_Id = '$delete_id'") or die('query failed');
   header('location:admin_publisher_bank.php');
}
?>
<html>
<head><br><br><br><br><br><br><br><br>
   <title>Admin Publisher bank details</title>
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
<body style="background-color: black">
<?php include 'admin_header.php'; ?>
<h1 class="title" style="color: white"> Admin Publisher accounts details </h1><br>
<table class="container">
      <thead>
         <th><h1>Bank Id</h1></th>
         <th><h1>user id</h1></th>
         <th><h1>account no</h1></th>
         <th><h1>bank name</h1></th>
         <th><h1>account name</h1></th>
         <th><h1>Expiry  Date</h1></th>
         <th><h1>CCV</h1></th>
         <th id="remove"><h1>action<</h1></th>
      </thead>
      <tbody>
         <?php
            $result = mysqli_query($cn, "SELECT * FROM `p_bankaccounts`");
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_assoc($result)){
         ?>
         <tr>
            <td><?php echo $row['Bank_Id']; ?></td>
            <td><?php echo $row['User_Id']; ?></td>
            <td><?php echo $row['Acc_No']; ?></td>
            <td><?php echo $row['Bank_Name']; ?></td>
            <td><?php echo $row['Acc_Name']; ?></td>
            <td><?php echo $row['Expiry_Date']; ?></td>
            <td><?php echo $row['CCV']; ?></td>
            <td id="remove">
            <a href="admin_publisher_bank.php?delete=<?php echo $row['Bank_Id']; ?>" onclick="return confirm('delete this bank account?');" class="delete-btn" id="remove"><i class="fas fa-trash"></i> remove user</a>
         </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no publisher bank account found!</div>";
            };
         ?>
      </tbody>
   </table>
</section>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="src.js"></script>
</body>
</html>
