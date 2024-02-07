<?php

 include('database2.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_heading = $_POST['form_heading'];
        $form_text = $_POST['form_text'];

       $file_name = '';
        if (isset($_FILES['upload_file'])) {
            $file_name = $_FILES['upload_file']['name'];
            $file_tmp = $_FILES['upload_file']['tmp_name'];
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name);
        }

      /*  $sql = "INSERT INTO user_data (headings, texts, images) VALUES ('$form_heading', '$form_text', '$file_name')";
        if (mysqli_query($conn, $sql)) {
            echo "record created successfully";
       } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }*/

       $sql = "SELECT * FROM user_data WHERE headings = '$form_heading' OR texts = '$form_text' OR images = '$file_name'";
    $result = mysqli_query($conn, $sql);
       if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $id = $row['id']; 
        $update_sql = "UPDATE user_data SET headings = '$form_heading', texts = '$form_text', images = '$file_name' WHERE id = $id";
        if (mysqli_query($conn, $update_sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }}
        else{
            $insert_sql = "INSERT INTO user_data (headings, texts, images) VALUES ('$form_heading', '$form_text', '$file_name')";
        
            if (mysqli_query($conn, $insert_sql)) {
                echo "Record created successfully";
            } else {
                echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
            }
        }
    
    }
?>
