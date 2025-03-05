<form action="" method="post" class="box">
<div class="movie_card" id="bright">
   <div class="info_section">
    <div class="movie_header">
      <img class="locandina" ><a href="./uploads/<?php echo $row['M_File'] ?>">
      <img src="images/<?php echo $row['M_Image']; ?>" height="100" alt=""></a>
      <h1><?php echo $row['Magazine_Name']; ?></h1>
      <h3><?php echo $row['Author']; ?></h3>
      <span class="minutes"><?php echo $row['Language']; ?></span>
      <p class="type"> <?php echo $row['Category']; ?></p>
    </div><br><br>
    <div class="movie_desc">
      <p class="text">
      <?php echo $row['Description']; ?></p>
    </div>
    <div class="movie_social">
      <ul color = "black">
        <li><i class="material-icons">₹<?php echo $row['Price']; ?>/-</i></li>
        <li><i class="material-icons"></i></li>
        <li><i class="material-icons">chat_bubble</i></li>
      </ul>
    </div>
  </div>
  <div class="blur_back bright_back"></div>
</div>
<input type="hidden" name="id" value="<?php echo $row['Magazine_Id']; ?>">
   <input type="hidden" name="name" value="<?php echo $row['Magazine_Name']; ?>">
   <input type="hidden" name="author_name" value="<?php echo $row['Author']; ?>">
   <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
   <input type="hidden" name="categorytype" value="<?php echo $row['Category']; ?>">
   <input type="hidden" name="language" value="<?php echo $row['Language']; ?>">
   <input type="hidden" name="des" value="<?php echo $row['Description']; ?>">

   <input type="hidden" name="pdf_file" accept= " image/jpg, image/jpeg, image/png, application/pdf value=" <?php echo $row['M_File']; ?>">
   <br><br>
</form>