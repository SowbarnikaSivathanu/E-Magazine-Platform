<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index_css.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php include 'index_header.php'; ?><br><br><br><br>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="news.jpg" alt="New York" width="800" height="500">
        <div class="carousel-caption">
          <h3>Newspaper</h3>
          <p>Read the World Day by Day!</p>
        </div>      
      </div>

      <div class="item">
        <img src="book.jpg" alt="Chicago" width="800" height="500">
        <div class="carousel-caption">
          <h3>Story Books</h3>
          <p>Let's live another life in another world!</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="mag.jpg" alt="Los Angeles" width="728" height="410">
        <div class="carousel-caption">
          <h3>Magazines</h3>
          <p>Heart of all News!</p>
        </div>      
      </div>
    </div>
 
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div id="band" class="container text-center">
  <h3>CHRONICLES OF ATLAS</h3>
  <p><em>Where stories come alive!</em></p>
  <p>We have created a  Magazine websites.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Magazines</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="fashion.jpg" class="img-bordered person" alt="view" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>All Fashion Magazines</p>
        <a href = "rcategory.php?category=fashion">The elite</a>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Magazines</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="business.jpg" class="img-bordered person" alt="view" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>All Business Magazines</p>
        <a href = "rcategory.php?category=business">The Yellow page</a>
        <p>Ever since 70s</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Magazines</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="technology.jpg" class="img-bordered person" alt="view" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Magazines - Technology Today </p>
        <a href = "rcategory.php?category=technology">The Robic</a>
        <p>all magazines</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Magazines</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="health.jpg" class="img-bordered person" alt="view" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Magazines - Health</p>
        <a href = "rcategory.php?category=health">Health</a>
        <p>all magazines</p>
      </div>
    </div>
  </div>
</div>
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">About our website</h3>
    <p class="text-center">Magazines<br> Remember to read!</p>
    </div>
</div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Tickets</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Tickets, $23 per person</label>
              <input type="number" class="form-control" id="psw" placeholder="How many?">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Send To</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
              <button type="submit" class="btn btn-block">Pay 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <p>Need <a href="#">help?</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("conn.php");
if (isset($_POST['add']))
{
   
    $fname = $_POST['fname'];
    $femail = $_POST['femail'];
    $fcomments = $_POST['fcomments'];
    $date=date('Y-m-d');
     $res = mysqli_query($cn, "INSERT INTO `comment`(fname, femail, fcomments, date) VALUES('$fname','$femail', '$fcomments' , '$date')");
         
         if($res)
         {
             $message[] = 'comment added successfully!';
         }else{
             $message[] = 'UnSuccessfull!';
         }
       }

?>
<div id="contact" class="container">
<form method="post" enctype="multipart/form-data">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our Readers!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Tirunelveli, TamilNadu</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +91 94421 16673</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: atlas@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="fname" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="femail" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="fcomments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit" name = "add">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <h3 class="text-center">From The Founder</h3>  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Alzan</a></li>
    <li><a data-toggle="tab" href="#menu1">Alizeh</a></li>
    <li><a data-toggle="tab" href="#menu2">Ayan</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h2>Alzan, Manager</h2>
      <p>....</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h2>Alizeh, co-editor</h2>
      <p>...</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h2>Ayan, co-editor</h2>
      <p>...</p>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
<?php include 'script.js'; ?>
</body>
</html>
