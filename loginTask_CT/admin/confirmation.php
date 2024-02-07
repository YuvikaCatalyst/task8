<?php
include('database1.php');

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$passwords = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($passwords == $confirm_password) {
    $sql = "INSERT INTO formuser (firstname, middlename, lastname, passwords) VALUES ('$first_name', '$middle_name', '$last_name', '$passwords')";
    
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Kindly enter correct password";
}
?>
