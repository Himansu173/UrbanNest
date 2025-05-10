<?php
    require_once "dbconnect.php";
 if(isset($_GET['pid'])){
    try{
        global $conn ;
        $new_status=$_GET['status']=="Available"? 'Unavailable': 'Available';
        $query = "UPDATE property SET status=? WHERE pid=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$new_status,$_GET['pid']);
        if($stmt->execute()){
            header("location:../frontend/ui/ownerProfile.php");
        }else{
            echo "Something went wrong.";
        }
    }catch(Exception $e){
        echo $e;
    }
 }else{
    header("location:../frontend/ui/home.php");
 }
?>