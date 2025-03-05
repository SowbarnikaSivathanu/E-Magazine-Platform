<form action="" method="post" class="box">
<div class="box"><a href="./uploads/<?php echo $row['M_File'] ?>"><?php echo $row['M_File'] ?></a></div>
   <div class="name"><?php echo $row['Magazine_Name']; ?></div>
   <h2>₹<?php echo $row['Price']; ?>/-</h2>
   <p>Author: <span><?php echo $row['Author']; ?></span></p>
   <p>Category: <span><?php echo $row['Category']; ?></span></p>
   <p>Language  : <span><?php echo $row['Language']; ?></span></p>
   <p>Description: <span><?php echo $row['Description']; ?></span></p>
   <p>Quantity: <input type="number" min="1" name="quantity" value="1" class="qty"></p>
   <input type="hidden" name="id" value="<?php echo $row['Magazine_Id']; ?>">
   <input type="hidden" name="name" value="<?php echo $row['Magazine_Name']; ?>">
   <input type="hidden" name="author_name" value="<?php echo $row['Author']; ?>">
   <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
   <input type="hidden" name="categorytype" value="<?php echo $row['Category']; ?>">
   <input type="hidden" name="language" value="<?php echo $row['Language']; ?>">
   <input type="hidden" name="des" value="<?php echo $row['Description']; ?>">

   <input type="hidden" name="pdf_file" accept= " image/jpg, image/jpeg, image/png, application/pdf value=" <?php echo $row['M_File']; ?>">
   <input type="submit" value="Add to cart" name="add_to_cart" class="btnn"><br><br>
</form>
</div>
