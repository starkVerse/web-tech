<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['id']) && !empty($_POST['qualification']) && !empty($_POST['university']) && !empty($_FILES['pdf']['name']) && !empty($_FILES['image']['name'])) {
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $email = htmlspecialchars($_POST['email']);
        $id = htmlspecialchars($_POST['id']);
        $qualification = htmlspecialchars($_POST['qualification']);
        $university = htmlspecialchars($_POST['university']);
        
        // PDF
        $pdfDir = "pdfs/";
        $pdfFileName = basename($_FILES['pdf']['name']);
        $pdfFilePath = $pdfDir . $pdfFileName;
        $pdfFileType = pathinfo($pdfFilePath, PATHINFO_EXTENSION);
        
        // Check PDF
        if ($pdfFileType === 'pdf') {
            // Upload PDF 
            if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdfFilePath)) {
                
                
                // image
                $imageDir = "images/";
                $imageFileName = basename($_FILES['image']['name']);
                $imageFilePath = $imageDir . $imageFileName;
                
                // Upload image
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $imageFilePath)) {
                    
                    header("Location: information_page.php?name=$name&phone=$phone&email=$email&id=$id&qualification=$qualification&university=$university&pdf=$pdfFilePath&image=$imageFilePath");
                    exit;
                } else {
                    echo "Error uploading image.";
                }
            } else {
                echo "Error uploading PDF.";
            }
        } else {
            echo "Invalid file format. Please upload a PDF file.";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    
    header("Location: registration_form.html");
    exit;
}
?>
