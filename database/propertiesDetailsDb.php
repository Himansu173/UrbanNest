<?php
    require_once "dbconnect.php";
    function getAllProperties(){
        global $conn;
        $qry="SELECT * FROM property";
        $stm=$conn->prepare($qry);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res;
            }
        }
        return false;
    }
    function getTotalProperty() {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) AS total_property FROM property");
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // echo "No of contacts ".$row['total_user'];
                return $row['total_property']; 
            } else {
                return 0; 
            }
        }
    }
    function getPropertyLocation($pid){
        global $conn;
        $qry="SELECT * FROM address WHERE pid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$pid);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res->fetch_assoc();
            }
        }
        return false;
    }
    function getPropertyPrice($pid){
        global $conn;
        $qry="SELECT * FROM finance_details WHERE pid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$pid);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res->fetch_assoc()['rent_amount'];
            }
        }
        return "NA";
    }
    function getFinancialDetails($pid){
        global $conn;
        $qry="SELECT * FROM finance_details WHERE pid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$pid);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res->fetch_assoc();
            }
        }
        return "NA";
    }
    $results_per_page = 12;
    function getNumberOfPage(){
        global $conn;
        global $results_per_page;
        $qry="SELECT * FROM property";
        $stm=$conn->prepare($qry);
        $stm->execute();
        $res=$stm->get_result();
        return  ceil ($res->num_rows / $results_per_page);
    }
    function getPropertyPerPage($page){
        global $results_per_page;
        $page_first_result = ($page-1) * $results_per_page;
        global $conn;
        $qry="SELECT * FROM property WHERE status = 'Available' ORDER BY date_of_listing DESC LIMIT $page_first_result , $results_per_page";
        $stm=$conn->prepare($qry);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res;
            }
        }
        return false;
    }
    function getPropertyImg($pid){
        global $conn;
        $qry="SELECT phid,imgpath FROM property_photo WHERE pid=?";
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
    function getPropertyById($id){
        global $conn;
        $qry="SELECT * FROM property WHERE pid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$id);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res->fetch_assoc();
            }
        }
        return false;
    }
    function getSimillarProperties($house_type, $building_type, $price, $city, $state) {
        global $conn;
        $min_price = (int)$price - 20000;
        $max_price = (int)$price + 20000;
        $qry = "SELECT * FROM property p JOIN address a ON p.pid = a.pid JOIN finance_details f ON p.pid = f.pid WHERE p.status = 'Available' AND p.house_type = ? OR p.building_type = ? OR f.rent_amount BETWEEN ? AND ? OR a.city = ? OR a.state = ? LIMIT 6;";
        $stm = $conn->prepare($qry);
        $stm->bind_param("ssssss", $house_type, $building_type, $min_price, $max_price, $city, $state);
        $res = $stm->execute();
        if ($res) {
            $res = $stm->get_result();
            if ($res->num_rows > 0) {
                return $res;
            }
        }
        return false;
    }
    function getPropertyByOwner($uid){
        global $conn;
        $qry="SELECT * FROM property WHERE uid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$uid);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res;
            }
        }
        return false;
    }
    function getPropertyData(){
        try{
            global $conn ;
            $query = "SELECT p.pid, p.house_type, p.carpet_area, f.rent_amount, a.city, a.state 
                FROM property p 
                JOIN finance_details f ON p.pid = f.pid 
                JOIN address a ON p.pid = a.pid ;";
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
    function tooglePropertyStatus($pid,$status){
        global $conn;
        $qry="UPDATE property SET status=? WHERE pid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$pid);
        if($stm->execute()){
            ?>
            <script>window.reload()</script>
            <?php
        }else{
            ?>
            <script>alert("something went wrong.")</script>
            <?php
        }
    }

    function getPropertyDataById($pid){
        try{
            global $conn ;
            $query = "SELECT * 
                FROM property p 
                JOIN finance_details f ON p.pid = f.pid 
                JOIN address a ON p.pid = a.pid
                WHERE p.pid = $pid;";
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
?>