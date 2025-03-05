
<?php 
include 'conn.php'; 
$date = date('Y-m-d'); 

$sql = "SELECT * from add_adver WHERE '$date' BETWEEN startdate AND enddate"; 
$result = mysqli_query($cn, $sql); 
if(mysqli_num_rows($result) > 0){ 
    while($row = mysqli_fetch_assoc($result)){ 
        echo '<img src="images/' . $row['Ad_Image'] . '" height="200" alt=""></img>'; 
        echo '<p>Advertisement by : ' . $row['Company_Name'] . '</p>'; 
    } 
} else { 
    echo 'no active advertisement'; 
} 
?>