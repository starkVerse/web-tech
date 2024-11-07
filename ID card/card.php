<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
    $name = $_POST['name'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];
    
   
    $target_dir = "idcard/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
    
    
    $id_card_html = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>ID Card</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }
    .id-card {
        width: 300px;
        border: 1px solid #000;
        padding: 20px;
        margin: 0 auto;
    }
    .id-card img {
        max-width: 100%;
        height: auto;
    }
    </style>
    </head>
    <body>
    
    <div class='id-card'>
        <img src='$target_file' alt='Profile Picture'>
        <h2>$name</h2>
        <p>Course: $course</p>
        <p>Phone: $phone</p>
        <p>Email: $email</p>
        <p>Batch: $batch</p>
    </div>
    
    </body>
    </html>";
    
    
    $id_card_file = fopen("idcard/form.html", "w") or die("Unable to open file!");
    fwrite($id_card_file, $id_card_html);
    fclose($id_card_file);
    
  
    header("Location: idcard/form.html");
    exit();
}
?>
