<?php
    require_once "dbconnect.php";
    function getUserById($uid){
        global $conn;
        $qry="SELECT * FROM user WHERE uid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("i",$uid);
        $res=$stm->execute();
        if($res){
            $res=$stm->get_result();
            if($res->num_rows>0){
                return $res->fetch_assoc();
            }
        }
        return false;
    }
    function updateUserDetails($uid,$name,$email,$contact,$address){
        global $conn;
        $qry="UPDATE user SET name=?, email=?, contact=?, address=? WHERE uid=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("ssssi",$name,$email,$contact,$address,$uid);
        return $stm->execute();
    }
    function updateUserPassword($uid,$oldPassword,$newPassword){
        global $conn;
        $qry="SELECT * FROM user WHERE uid=? AND password=?";
        $stm=$conn->prepare($qry);
        $stm->bind_param("is",$uid,$oldPassword);
        $stm->execute();
        $res=$stm->get_result();
        if($res->num_rows>0){
            $qry="UPDATE user SET password=? WHERE uid=?";
            $stm=$conn->prepare($qry);
            $stm->bind_param("i",$newPassword);
            if($stm->execute()){
                return ["success","Password updated successfuly."];
            }else{
                return ["error","Some went wrong durring update."];
            }
        }else{
            return ["error","Wrong current password."];
        }
    }
?>