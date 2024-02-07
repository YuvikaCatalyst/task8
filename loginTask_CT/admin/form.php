<?php
include('database2.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
    <title>user form</title>
</head>
<body>
<?php
    $sql = "SELECT * FROM user_data ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <form  method="post" action="#" enctype="multipart/form-data">
       <label for="heading">add heading:<br>
        <input type="text" class="heading" value="<?php echo $row['headings']; ?>"><br>
        <label for="para">add paragraph:<br>
        <input type="text" class="para" value="<?php echo $row['texts']; ?>"><br>
        <input type="file" name="upload_file" id="upload_file" ><br>
        <input type="submit" class="add_data">
</form>
</body>
</html>