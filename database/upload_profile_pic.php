<?php
    require_once "dbconnect.php"; 
    session_start(); 
    if (isset($_SESSION['userId'])) { 
        $uploadDir = "users_profile_images/";  
        if (isset($_FILES['userImg']) && $_FILES['userImg']['error'] === UPLOAD_ERR_OK) { 
            $originalName = $_FILES['userImg']['name']; 
            $extension = pathinfo($originalName, PATHINFO_EXTENSION); 
            $newFileName = $_SESSION['userId'] . '.' . $extension; 
            $targetFilePath = $uploadDir . $newFileName; 
            $tmpName = $_FILES['userImg']['tmp_name']; 
            if (move_uploaded_file($tmpName, $targetFilePath)) { 
                $stmt = $conn->prepare("UPDATE user SET profile_pic = ? WHERE uid = ?"); 
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