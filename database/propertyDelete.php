<?php
require_once "dbconnect.php";

if (isset($_GET['pid'])) {

    $pid = $_GET['pid'];

    $stmt = $conn->prepare("DELETE FROM property WHERE pid = ?");
    $stmt->bind_param("i", $pid);

    if ($stmt->execute()) {
        ?><script>alert('Property deleted successfully.');</script><?php
    } else {
        ?><script>alert('Some ERROR');</script><?php
    }
    ?><script>window.location = '../frontend/ui/adminDashboard.php'</script>"<?php

    $stmt->close();
}
$conn->close();
?>
