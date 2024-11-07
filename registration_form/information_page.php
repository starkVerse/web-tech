<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Information</title>
    <link rel="stylesheet" href="info.css">
</head>
<body>
    <h2>Registration Information</h2>
    <?php
        
        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $id = $_GET['id'];
        $qualification = $_GET['qualification'];
        $university = $_GET['university'];
        $pdf = $_GET['pdf'];
        $image = $_GET['image'];
        echo "<p>Name: $name</p>";
        echo "<p>Phone: $phone</p>";
        echo "<p>Email: $email</p>";
        echo "<p>ID: $id</p>";
        echo "<p>Academic Qualification: $qualification</p>";
        echo "<p>University: $university</p>";
        echo "<p>Uploaded Image:</p>";
        echo "<img src='$image' alt='Uploaded Image'>";
    ?>
</body>
</html>
