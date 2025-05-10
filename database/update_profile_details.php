<?php
session_start();
require_once 'dbconnect.php';

if (isset($_POST['update']) && isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $address = isset($_POST['Address']) ? trim($_POST['Address']) : '';

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($address)) {
        $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, contact = ?, address = ? WHERE uid = ?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $userId);

        if ($stmt->execute()) {
            header("Location:../frontend/ui/ownerProfile.php");
            exit();
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
} else {
    header("Location: ../frontend/ui/home.php");
    exit();
}

$conn->close();
?>
