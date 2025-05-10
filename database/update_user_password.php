<?php 
    require_once "dbconnect.php"; 
    session_start(); 
    if (!isset($_SESSION['userId'])) { 
    header("Location: ../frontend/ui/ownerProfile.php"); 
    exit(); 
    } 
    if ($_SERVER["REQUEST_METHOD"] === "POST") { 
        $userId = $_SESSION['userId']; 
        $existingPassword = $_POST['existingPassword'] ?? ''; 
        $newPassword = $_POST['newPassword'] ?? ''; 
        $confirmPassword = $_POST['confirmPassword'] ?? ''; 
        if (empty($existingPassword) || empty($newPassword) || empty($confirmPassword) || $newPassword !== $confirmPassword) { 
            header("Location: ../frontend/ui/ownerProfile.php?password_updated=0");
            exit();
        }

        $stmt = $conn->prepare("SELECT password FROM user WHERE uid = ?"); 
        $stmt->bind_param("i", $userId); 
        $stmt->execute();
        $stmt->bind_result($storedPassword); 
        $stmt->fetch();
        $stmt->close();
        if ($existingPassword !== $storedPassword) {
            header("Location: ../frontend/ui/ownerProfile.php?password_updated=0");
            exit();
        }else{
            $updateStmt = $conn->prepare("UPDATE user SET password = ? WHERE uid = ?"); 
            $updateStmt->bind_param("si", $newPassword, $userId); 
            if ($updateStmt->execute()) {
                session_unset();
                session_destroy();
                header("Location: ../frontend/ui/home.php?password_updated=1");
                exit();
            } else {
                header("Location: ../frontend/ui/ownerProfile.php?password_updated=0");
                exit();
            }
            $updateStmt->close(); 
        }
    } 
?>