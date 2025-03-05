<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
}
?>
<header>
<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container-fluid">
    <div class="navbar-header" style =" font: 400 15px/1.8 Lato, sans-serif;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="logo.png" alt="logo" width="" height="">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav navbar-right" >
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li><a href="admin_view_magazines.php"> MAGAZINE</a></li>
        <li><a href="admin_orders.php">ORDERS</a></li>
        <li><a href="admin_users.php">USERS</a></li>
        <li><a href="admin_publishers.php">PUBLISHERS</a></li>
        <li><a href="admin_publisher_payment.php">PAYMENTS</a></li>
        <li><a href="admin_publisher_bank.php">BANK DETAILS</a></li><li>
        <li><a href="#contact"><span class="glyphicon glyphicon-usd"></span></a></li>
        <li><a href="comment.php"><span class="glyphicon glyphicon-envelope"></span></a></li>
        <li><a href="admin_search.php"><span class="glyphicon glyphicon-search"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">
            <li><a href="" data-toggle="#myModal">
                 <span class="ca-icon"><i class="fa fa-plus-square fa-3x"></i></span>
                 <div>
                   <a href="publisher_profile_update.php" class="up-btn"><i class="fa fa-edit"></i> update profile</a><br>
                   <a href="logout.php" class="login-btn">logout</a>
                 </div>
             </a></li>
          </ul>
        </li>
        </ul>
    </div>
  </div>
</nav>
</header>