<?php
include 'conn.php';
session_start();
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($cn, "DELETE FROM `comment` WHERE Comment_Id = '$delete_id'") or die('query failed');
   header('location:comment.php');
}
?>
<html>
<head><br><br><br><br>
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
<h1 class="title" style="color: white"> Admin Users comments </h1><br>
<table class="container">
      <thead>
        
         <th><h1>user Name</h1></th>
         <th><h1>Email Id</h1></th>
         <th><h1>Comments</h1></th>
         <th id="remove"><h1>action</h1></th>
      </thead>
      <tbody>
         <?php
            $result = mysqli_query($cn, "SELECT * FROM `comment`");
            if(mysqli_num_rows($result) > 0){
               while($row = mysqli_fetch_assoc($result)){
         ?>
         <tr>
            
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['femail']; ?></td>
            <td><?php echo $row['fcomments']; ?></td>
    
            <td id="remove">
            <a href="comment.php?delete=<?php echo $row['Comment_Id']; ?>" onclick="return confirm('delete this comment?');" class="delete-btn" id="remove"><i class="fas fa-trash"></i> remove comment</a>
         </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no comment found!</div>";
            };
         ?>
      </tbody>
   </table>
</section>
<center><button onclick="window.print()" class="btnn">print report</button></center>
<script src="src.js"></script>
</body>
</html>
