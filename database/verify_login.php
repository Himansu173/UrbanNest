<?php
    require_once "dbconnect.php";
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginQry = "SELECT * FROM user where email=?";
    $stmt = $conn->prepare($loginQry);
    $stmt->bind_param("s",$email);
    $res = $stmt->execute();
    if(!$res){
      die($conn->error);
    }
    $result = $stmt->get_result();

    if($result->num_rows > 0){
      $user = $result->fetch_assoc();
      if($user['password']==$password){
        $_SESSION['userId']= $user['uid'];
        echo "success";
      }else{
        echo "error2";
      }
    }else{
      echo "error1";
    }
    // if($email === "soumendrabehera99@gmail.com" && $password === "password"){
    //   echo "success";
    // }else{
    //   echo "error";
    // }
    // mehta12
    // tanya.mehta@example.com
?>
