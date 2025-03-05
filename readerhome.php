<?php
include 'conn.php';
session_start();
$reader_id = $_SESSION['reader_id'];
if(!isset($reader_id)){
   header('location:login.php');
}
?>
<?php include 'reader_header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="index_css.css">
   <style>
	@import url(https://fonts.googleapis.com/css?family=Merriweather:400,300,700);

@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

body{
  background: #fbfbfb;
  font-family: 'Merriweather', serif;
  font-size: 16px;
  color:#777;
}
h1,h4{
  font-family: 'Montserrat', sans-serif;
}
.row{
  padding:50px 0;
}
.seperator{
  margin-bottom: 30px;
  width:35px;
  height:3px;
  background:#777;
  border:none;
}
.title{
  text-align: center;
  
  .row{
    padding: 50px 0 0;
  }
  
  h1{
    text-transform: uppercase;
  }
  
  .seperator{
    margin: 0 auto 10px;
  }
}
.item {
  position: relative;
  margin-bottom: 30px;
  min-height: 1px;
  float: left;
  -webkit-backface-visibility: hidden;
  -webkit-tap-highlight-color: transparent;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
  .item-in {
    background: #fff;
    padding: 40px;
    position: relative;
    
    &:hover:before {
      width: 100%;
    }
   
    &::before {
    content: "";
    position: absolute;
    bottom: 0px;
    height: 2px;
    width: 0%;
    background: #333333;
    right: 0px;
    -webkit-transition: width 0.4s;
    transition: width 0.4s;
    }
  }
}
.item{
    
  h4{
      font-size: 18px;
      margin-top: 25px;
      letter-spacing: 2px;
      text-transform: uppercase;
    }
    p{
      font-size: 12px;
    }
    a{
      font-family: 'Montserrat', sans-serif;
      font-size: 12px;
      text-transform: uppercase;
      color: #666666;
      margin-top: 10px;

      i {
        opacity: 0;
        padding-left: 0px;
        transition: 0.4s;
        font-size: 24px;
        display: inline-block;
        top: 5px;
        position: relative;
       }
      
      &:hover {
        text-decoration:none;
        i {
          padding-left: 10px;
          opacity: 1;
          font-weight: 300;
          }
        }
      }
    }
.item .icon {
  position:absolute;
  top: 27px;
  left: -16px;
  cursor:pointer;
    a{
      font-family: 'Merriweather', serif;
      font-size: 14px;
      font-weight:400;
      color: #999;
      text-transform:none;
    }
    svg{
      width:32px;
      height:32px;
      float:left;
    }
    .icon-topic{
      opacity: 0;
      padding-left: 0px;
      transition: 0.4s;
      display: inline-block;
      top: 0px;
      position: relative;
    }
    &:hover .icon-topic{
      opacity: 1;
      padding-left: 10px;
    }
  }
@media only screen and (max-width : 768px) {
  .item .icon{position: relative; top: 0; left:0;}
}

h2 { color: white; }
.row {align: center;}
</style>
</head>
<body><br><br><br><br><br>

<section class="title container">
  <div class="row">
    <div class="col-md-12">
      <h1>Atlas Magzters</h1>
      <div class="seperator"></div>
      <p>Read your Magazines Here</p>
	  <?php
    $result = mysqli_query($cn, "SELECT * FROM `users` WHERE User_Type='reader'");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
  ?>

				<div class="profile-usertitle" style = "align-items: center;">
					<div class="profile-usertitle-name">
          				<a href="reader.php?reader_id=<?php echo $row['User_Id'];?>" ></a>
          				<img src="<?php echo $row['U_image'] ;?>"  width = "50%";/>
          				<h1>Reader: <?php echo $row['U_Name'] ;?><h1>
					</div>
			 </div>
	     
</div>
</div>
<?php
    }
   } 
   ?>
    </div>
  </div>
</section>
<!-- Start Blog Layout -->
<div class="container">
  <div class="row">
    <div class="col-md-6 item">
      <div class="item-in">
        <h4>Look through!</h4>
        <div class="seperator"></div>
        <p>Discover the Latest Trends: Stay updated with the hottest trends in fashion, technology, lifestyle, and more with our curated selection of articles and magazines.<br>
    Explore Diverse Topics: From travel adventures to health tips, explore a wide range of topics that cater to every interest and passion.<br>
    Interactive Features: Engage with our community through comments, ratings, and discussions to share your thoughts and connect with fellow readers.<br>
</p>Personalized Recommendations: Receive personalized recommendations based on your reading preferences and interests to discover new content tailored just for you.<br>
        <a href="#">Read More
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </div>
    </div>

<div class="col-md-6 item">
      <div class="item-in">
        <h4>Look through!</h4>
        <div class="seperator"></div>
        <p>

Stay Connected: Follow us on social media for exclusive updates, behind-the-scenes content, and special promotions. Join our newsletter for the latest news delivered straight to your inbox.<br>
Join the Atlas Magzter Community: Become a part of our growing community of passionate readers and writers who share a love for digital content and storytelling.<br>

Start Exploring: Dive into our collection of magazines, articles, and features to embark on a journey of discovery, inspiration, and knowledge.<br>
</p>
        <a href="#">Read More
          <i class="fa fa-long-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>

   

   </body></html>