<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="logo.png" alt="logo" width="" height="">
    </div><br>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav navbar-right">
        <li><a href="readerhome.php">HOME</a></li>
        <li><a href="reader_magazines.php">MAGAZINE</a></li>
        <li><a href="reader_publisher.php">PUBLISHERS</a></li>
        <li><a href="reader_orders_placed.php">ORDERS</a></li>
        <li><a href="reader_cart.php"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="#contact"><span class="glyphicon glyphicon-phone"></span></a></li>
        <li><a href="reader_search.php"><span class="glyphicon glyphicon-search"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span><?php  echo $_SESSION['reader_name']; ?></a>
          <ul class="dropdown-menu">
            <li><a href="" data-toggle="#myModal">
                 <span class="ca-icon"><i class="fa fa-plus-square fa-3x"></i></span>
                 <div>
                   <a href="reader_profile_update.php" class="up-btn"><i class="fa fa-edit"></i> update profile</a><br>
                   <a href="logout.php" class="login-btn">logout</a>
                 </div>
             </a></li>
          </ul>
        </li>
        </ul>
    </div>

  </div>
</nav>

