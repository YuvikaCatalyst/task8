<?php
include('admin/database2.php');
$sql="SELECT * FROM user_data order by id desc limit 1;";
$result=mysqli_query($conn,$sql);

if($result)
{
    $row = mysqli_fetch_assoc($result);
    echo "<h2>{$row['headings']}</h2>";
    echo "<p>{$row['texts']}</p>";
   echo '<img src="admin/assets/uploads/' . $row['images'] . '" alt="Uploaded Image">';
}
?>
