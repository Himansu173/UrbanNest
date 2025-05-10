<?php
    require_once "dbconnect.php"; 
    session_start(); 
    if (isset($_SESSION['userId'])) { 
        $uploadDir = "users_bg_images/";  
        if (isset($_FILES['bgImg']) && $_FILES['bgImg']['error'] === UPLOAD_ERR_OK) { 
            $originalName = $_FILES['bgImg']['name']; 
            $extension = pathinfo($originalName, PATHINFO_EXTENSION); 
            $newFileName = $_SESSION['userId'] . '.' . $extension; 
            $targetFilePath = $uploadDir . $newFileName; 
            $tmpName = $_FILES['bgImg']['tmp_name']; 
            if (move_uploaded_file($tmpName, $targetFilePath)) { 
                $stmt = $conn->prepare("UPDATE user SET bg_pic = ? WHERE uid = ?"); 
                $stmt->bind_param("si", $targetFilePath, $_SESSION['userId']); 
                if ($stmt->execute()) { 
                    $stmt->close(); 
                    header("Location: ../frontend/ui/ownerProfile.php"); 
                    exit(); 
                } else { 
                    echo "Database update failed."; 
                } 
            } else { 
                echo "Failed to move uploaded file."; 
            } 
        } else { 
            echo "No file uploaded or upload error."; 
        } 
    } else { 
        header("Location: ../frontend/ui/home.php"); 
        exit(); 
    } 
?>