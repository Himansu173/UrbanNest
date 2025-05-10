<?php
require_once "dbconnect.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM contacts WHERE sn = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        ?><script>alert('Record deleted successfully');</script><?php
    } else {
        ?><script>alert('Some ERROR');</script><?php
    }
    ?><script>window.location = '../frontend/ui/adminDashboard.php'</script>"<?php

    $stmt->close();
}
$conn->close();
?>
