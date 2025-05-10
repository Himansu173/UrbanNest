<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="urbannest";
    $conn=new mysqli($host,$username,$password) or die($conn->connect_error);
    $stm=$conn->prepare("SHOW DATABASES LIKE '$database'");
    $stm->execute();
    $res=$stm->get_result();
    if($res->num_rows==0){
        $stm=$conn->prepare("CREATE DATABASE $database");
        $res=$stm->execute();
        if(!$res){
            die($conn->error);
        }
        $conn=new mysqli($host,$username,$password,$database) or die($conn->connect_error);
        
        $user='CREATE TABLE user (
            uid INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            contact VARCHAR(20),
            address TEXT,
            password VARCHAR(255) NOT NULL,
            profile_pic VARCHAR(255) DEFAULT "./users_profile_images/default_profile_image.jpeg",
            bg_pic VARCHAR(255) DEFAULT "./users_bg_images/default_bg_image.png"
        )';
        $stm=$conn->prepare($user);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }
        $user="ALTER TABLE user AUTO_INCREMENT = 9000";
        $stm=$conn->prepare($user);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }

        $property='CREATE TABLE property (
            pid INT AUTO_INCREMENT PRIMARY KEY,
            uid INT NOT NULL,
            listing_type VARCHAR(50) NOT NULL,
            listed_by VARCHAR(50) NOT NULL, 
            property_type VARCHAR(50) NOT NULL, 
            building_type VARCHAR(30) NOT NULL,
            house_type VARCHAR(50) NOT NULL,
            property_age VARCHAR(20) DEFAULT "NA", 
            balcony VARCHAR(20) NOT NULL, 
            area VARCHAR(20) NOT NULL, 
            carpet_area VARCHAR(20) NOT NULL, 
            status VARCHAR(20) DEFAULT "Available", 
            parking VARCHAR(20) DEFAULT "NA",
            furnishing_type VARCHAR(50) NOT NULL,
            power_backup VARCHAR(20) DEFAULT "No",
            lift VARCHAR(10) DEFAULT "No",
            floor VARCHAR(10) DEFAULT "NA",
            date_of_listing DATE NOT NULL, 
            date_of_available DATE NOT NULL,
            description TEXT DEFAULT "No Description Available.",
            FOREIGN KEY (uid) REFERENCES user(uid) ON DELETE CASCADE 
        )';
        
        $stm=$conn->prepare($property);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }
        $property="ALTER TABLE property AUTO_INCREMENT = 1000";
        $stm=$conn->prepare($property);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }

        $finaceDetails='CREATE TABLE finance_details (
            pid INT PRIMARY KEY,
            rent_amount VARCHAR(10),
            security_deposit VARCHAR(10),
            lease_period VARCHAR(10),
            m_charges VARCHAR(10),
            negotiable VARCHAR(10),
            FOREIGN KEY (pid) REFERENCES property(pid) ON DELETE CASCADE
        )';
        $stm=$conn->prepare($finaceDetails);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }

        $address='CREATE TABLE Address (
            pid INT PRIMARY KEY,
            state VARCHAR(50),
            city VARCHAR(50),
            locality VARCHAR(50),
            pincode VARCHAR(10),
            FOREIGN KEY (pid) REFERENCES property(pid) ON DELETE CASCADE
        )';
        $stm=$conn->prepare($address);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }

        $photo='CREATE TABLE property_photo (
            phid INT AUTO_INCREMENT PRIMARY KEY,
            pid INT NOT NULL,
            imgpath VARCHAR(255) NOT NULL,
            FOREIGN KEY (pid) REFERENCES property(pid) ON DELETE CASCADE
        )';
        $stm=$conn->prepare($photo);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }
        
        $contacts='CREATE TABLE contacts (
            sn INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            email VARCHAR(40) NOT NULL,
            subject VARCHAR(50) NOT NULL,
            message VARCHAR(255) NOT NULL
        )';
        $stm=$conn->prepare($contacts);
        $response=$stm->execute();
        if(!$response){
            die($conn->error);
        }
    }else{
        $conn=new mysqli($host,$username,$password,$database) or die($conn->connect_error);
    }
?>
