<?php
require_once "dbconnect.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // echo "Server Response $name $email $subject $message";
    try {
        $query = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {
            echo "success";
        } else {
            throw new Exception("Error executing query: " . $stmt->error);
        }
        $stmt->close();
    } catch (Exception $e) {
        echo $e->getMessage();
        echo "error";
    }
}
?>