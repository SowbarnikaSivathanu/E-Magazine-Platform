<?php
include 'conn.php';
session_start();

?>
<html>
<head><br><br><br><br>
   <title>search page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="index_css.css">
   <link rel="stylesheet" href="reader_css.css">
   <link rel="stylesheet" href="admin_css1.css">
   <link rel="stylesheet" href="admin_css.css">
   
</head>
<body style="color:#fff; background-color: black;"> 

<?php include 'admin_header.php'; ?>

<section id="remove" class="search-form">
<h1 class="title"><span>SEARCH Magazines</span></h1>
   <form action="" method="post">
      <input type="text" name="search" placeholder="search magazines..." class="box">
      <input type="submit" name="submit" value="search" class="search-btn">
   </form>
</section>

<section class="user-table">
<h1 class="title">all Magazines </h1><br>
   <table>
      <thead>
         <th>Image</th>
         <th>Magazine name</th>
         <th>Author</th>
         <th>Price</th>
         <th>Category</th>
         <th>Language</th>
         <th>description</th>
         <th>placed on</th>
      </thead>
      <tbody>
         <?php
      if(isset($_POST['submit'])){
         $search_magazines = $_POST['search'];
         $res = mysqli_query($cn, "SELECT * FROM `magazines` WHERE Magazine_Name LIKE '%{$search_magazines}%' OR Category LIKE '%{$search_magazines}%' OR  Author LIKE '%{$search_magazines}%'") or die('query failed');
         if(mysqli_num_rows($res) > 0){
         while($row = mysqli_fetch_assoc($res)){
            ?>

         <tr>
            <td><img src="images/<?php echo $row['M_Image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['Magazine_Name']; ?></td>
            <td><?php echo $row['Author']; ?></td>
            <td>₹<?php echo $row['Price']; ?>/-</td>
            <td><?php echo $row['Category']; ?></td>
            <td><?php echo $row['Language']; ?></td>
            <td><?php echo $row['Description']; ?></td>
            <td><?php echo $row['Placed_On']; ?></td>
         </tr>

     <?php 
      }
   }else{
      echo '<h1>no magazines found!</h1>';
   }
}
?>
</div>
</section>

<script src="src.js"></script>
<div><center><button onclick="window.print()" class="btnn">print report</button></center></div>
</body>
</html>