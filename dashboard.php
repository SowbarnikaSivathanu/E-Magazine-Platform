<?php
include 'conn.php';
session_start();
?>
<html>
<head>
   <title>admin panel</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="dashboard.css">
</head>
<body style="background-color: black">
   <center>
<?php include 'admin_header.php'; ?>

<section class="dashboard"><br><br><br><br>
   <h1 class="title">DASHBOARD</h1><br><br>
   <div class="box-container">

      <div class="box">
         <?php
            $result = 0;
            $sql = mysqli_query($cn, "SELECT * FROM `orders` WHERE payment_status != 'completed'") or die('query failed');
            $row = mysqli_num_rows($sql);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>orders pending</p>
      </div>

      <div class="box">
         <?php
            $result = 0;
            $sql = mysqli_query($cn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            $row = mysqli_num_rows($sql);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>completed orders</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `orders`") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `publisher_payment` where status != 'pending' && status !=''") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Publisher payment completed</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `publisher_payment` where status = 'pending' || status =''") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Publisher payment pending</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `publisher_payment`") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>total Publisher payment</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `magazines`") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Magazines Available</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Type = 'reader'") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Readers</p>
      </div>

      <div class="box">
         <?php 
            $res = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Type = 'publisher'") or die('query failed');
            $row = mysqli_num_rows($res);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Publishers</p>
      </div>

      <div class="box">
         <?php 
            $sql = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Type = 'advertiser'") or die('query failed');
            $row = mysqli_num_rows($sql);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>Advertisers</p>
      </div>

      <div class="box">
         <?php 
            $sql = mysqli_query($cn, "SELECT * FROM `users`") or die('query failed');
            $row = mysqli_num_rows($sql);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>total accounts</p>
      </div>

      <div class="box">
         <?php 
            $sql = mysqli_query($cn, "SELECT * FROM `review`") or die('query failed');
            $row = mysqli_num_rows($sql);
         ?>
         <h3><?php echo $row; ?></h3>
         <p>new Review</p>
      </div>

   </div>
</section>
<script src="src.js"></script>
</body>
</html>