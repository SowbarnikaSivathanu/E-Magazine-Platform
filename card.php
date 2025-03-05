<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  <style>
        *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: sans-serif;
    }
    body{
        background-color: #f0f0f0;
    }
    .card-container{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 100px;
    }
    .card{
        width: 325px;
        background-color: #f0f0f0;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0px 2px 4px rgba(0,0,0,0.2);
        margin: 20px;
    }
    .card img{
        width: 100%;
        height: auto;
    }
    .card-content{
        padding: 16px;
    }
    .card-content h3{
        color:black;
        font-size: 20px;
        margin-bottom: 8px;
    }
    .card-content p{
        color: #666;
        font-size: 15px;
        line-height: 1.3;
    }
    .card-content .btn{
        display: inline-block;
        padding: 8px 16px;
        background-color: #333;
        text-decoration: none;
        border-radius: 4px;
        margin-top: 16px;
    }
  </style>

</head>
<body>

   
    <div class="card">
        <a href="./uploads/<?php echo $row['M_File'] ?>"><img src="images/<?php echo $row['M_Image']; ?>"></a>
        <div class="card-content">
            <form action="" method="post">

            <h1><?php echo $row['Magazine_Name']; ?></h1>
            <h3><?php echo $row['Author']; ?></h3>
            <span><?php echo $row['Language']; ?></span>
            <?php echo $row['Category']; ?></p>
            <p><?php echo $row['Description']; ?></p>

            <input type="number" min="1" name="quantity" value="1" class="qty" hidden>
            <input type="hidden" name="id" value="<?php echo $row['Magazine_Id']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
            <input type="hidden" name="image" value="<?php echo $row['M_Image']; ?>">

            <ul color = "black">
                <li><i class="material-icons">₹<?php echo $row['Price']; ?>/-</i></li>
            </ul>
            <input type="submit" value="Add to cart" name="add_to_cart" class="btn" ></button> &nbsp; <a href = "review.php?id=<?php echo $row['Magazine_Id']; ?>" class="btn" >Review</a><br>
             <?php include "review_view.php"; ?>    
        </form>
        </div>
    </div>
</body>
</html>
