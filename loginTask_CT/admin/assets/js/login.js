$(document).ready(function(){
    $('.add_user').click(function(e){
e.preventDefault();
        var first_name=$('.first_name').val();
        var middle_name=$('.middle_name').val();
        var last_name=$('.last_name').val();
        var password=$('.password').val();
        var confirm_password=$('.confirm_password').val();
        $.ajax({
            type: 'POST',
            url: 'confirmation.php',
            data: {
                first_name:first_name,
                middle_name:middle_name,
                last_name:last_name,
                password:password,
                confirm_password:confirm_password
            },
            success:function(response){
                if(response=="Record inserted successfully"){ alert(response);
                    window.open('index.php');
                }
            }
        })
    });

    $('.login').click(function(e){
        e.preventDefault();
        var username=$('.username').val();
        var password=$('.password').val();
        $.ajax({
            type: 'POST',
            url: 'check.php',
            data: {
                username:username,
                password:password
            },
            success:function(response){
                if(response == 1){
                window.open("form.php");
              }
              else{
                alert("kindlly enter correct data");
              }
                            }

        })
    });   

    $('.add_data').click(function(e){
        e.preventDefault();
        var form_heading=$('.heading').val();
        var form_text= $('.para').val(); 
        
        var formData = new FormData();
    formData.append("form_heading", form_heading);
    formData.append("form_text", form_text);

    var fileInput = $("#upload_file")[0].files[0];
    formData.append("upload_file", fileInput);

    $.ajax({
        type: "POST",
        url: "user_data.php",
        data: formData,
        contentType: false,
        processData: false,
        success:function(response){
          alert(response);
              }
      });
    })
});
