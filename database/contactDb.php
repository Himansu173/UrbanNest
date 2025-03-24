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

function getContats() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM contacts  ORDER BY sn DESC;");
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
}

function getTotalContats() {
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_contacts FROM contacts");
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // echo "No of contacts ".$row['total_contacts'];
            return $row['total_contacts']; 
        } else {
            return 0; 
        }
    }
}

?>