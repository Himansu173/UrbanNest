<?php
require_once "dbconnect.php";
function getRecentPost(){
    try{
        // $conn = getNewConnection();
        global $conn ;
        // $query = "SELECT *FROM property p JOIN finance_details f ON p.pid = f.pid JOIN address a ON p.pid = a.pid ORDER BY p.pid DESC LIMIT 6;";
        $query = "SELECT p.pid, p.house_type, p.carpet_area, f.rent_amount, a.city, a.state 
              FROM property p 
              JOIN finance_details f ON p.pid = f.pid 
              JOIN address a ON p.pid = a.pid 
              WHERE p.status='Available'
              ORDER BY p.date_of_listing DESC
              LIMIT 8";
        $stmt = $conn->prepare($query);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return $result;
            }
        }
    }catch(Exception $e){
        echo $e->error();
    }finally{
        // $conn->close();
    }
}

function getPropertyImg($pid){
    global $conn;
    $qry="SELECT imgpath FROM property_photo WHERE pid=?";
    $stm=$conn->prepare($qry);
    $stm->bind_param("i",$pid);
    $res=$stm->execute();
    if($res){
        $res=$stm->get_result();
        if($res->num_rows>0){
            return $res->fetch_all(MYSQLI_ASSOC);
        }
    }
    return false;
}
?>