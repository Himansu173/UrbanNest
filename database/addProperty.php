<?php
require_once "dbconnect.php";
session_start();

if (isset($_POST['submit'])) {
    $userId = $_SESSION['userId'];
    $listingType = $_POST['listingType'];
    $propertyType = $_POST['propertyType'];
    $buildingType = $_POST['buildingType'];
    $listedBy = $_POST['listedBy'];
    $houseType = $_POST['houseType'];
    $state = $_POST['stateProperty'];
    $city = $_POST['cityProperty'];
    $locality = $_POST['locality'];
    $pinCode = $_POST['pinCode'];
    $area = $_POST['area'];
    $carpetArea = $_POST['carpetArea'];
    $age = $_POST['age'];
    $floorNumber = $_POST['floorNumber'];
    $furnish = $_POST['furnish'];
    $balcony = $_POST['balcony'];
    $power = $_POST['power'];
    $lift = $_POST['lift'];
    $parking = $_POST['parking'];
    $rent = $_POST['rent'];
    $securityDeposite = $_POST['securityDeposite'];
    $negotiable = $_POST['negotiable'];
    $leasePeriod = $_POST['leasePeriod'];
    $maintenanceCharges = $_POST['maintenanceCharges'];
    $availabilityDate = $_POST['availabilityDate'];
    $description = $_POST['description'];
    $dateOfListing=date('Y-m-d');

    // SQL Query to insert data
    $stmt = $conn->prepare("INSERT INTO property (uid,listing_type, property_type, building_type, listed_by, house_type,property_age,balcony,area,carpet_area,parking,furnishing_type,power_backup,lift,floor, date_of_listing, date_of_available, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        'isssssssssssssssss',
        $userId,
        $listingType,
        $propertyType,
        $buildingType,
        $listedBy,
        $houseType,
        $age,
        $balcony,
        $area,
        $carpetArea,
        $parking,
        $furnish,
        $power,
        $lift,
        $floorNumber,
        $dateOfListing,
        $availabilityDate,
        $description
    );

    if ($stmt->execute()) {
        $stmt = $conn->prepare("SELECT pid FROM property WHERE uid = $userId ORDER BY pid DESC LIMIT 1");
        
        if(!$stmt->execute()){
            die($conn->error);
        }
        $result = $stmt->get_result();
        
        if($result->num_rows != 0){
            $property = $result-> fetch_assoc();
            $pid = $property['pid'];
            $qry1 = "INSERT INTO finance_details(pid,rent_amount,security_deposit,lease_period,m_charges,negotiable) values(?,?,?,?,?,?)";
            $qry2 = "INSERT INTO address(pid,state,city,locality,pincode) values(?,?,?,?,?)";
            $stmt1 = $conn->prepare($qry1);
            $stmt2 = $conn->prepare($qry2);
            $stmt1->bind_param("isssss",$pid,$rent,$securityDeposite,$leasePeriod,$maintenanceCharges,$negotiable);
            $stmt2->bind_param("issss",$pid, $state, $city, $locality, $pinCode);
            $res1 = $stmt1->execute();
            $res2 = $stmt2->execute();
            
            $uploadDir = "property_images/";
            $res3=true;
            foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
                if (!empty($tmpName)) {
                    $originalName = $_FILES['images']['name'][$index];
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $newFileName = "property" . $pid . "_" . $originalName . "." . $extension;
                    $targetFilePath = $uploadDir . $newFileName;

                    if (move_uploaded_file($tmpName, $targetFilePath)) {
                        $stmt3 = $conn->prepare("INSERT INTO property_photo(pid,imgpath) VALUES (?,?)");
                        $stmt3->bind_param("is", $pid,$targetFilePath);
                        $res3 = $stmt3->execute();
                        $stmt3->close();
                    }
                    else{
                        $res3=false;
                    }
                }
            }

            if($res1 && $res2 && $res3){
                header("location:../frontend/ui/ownerProfile.php");
                exir();
            }else{
                echo "Something went wrong.";
            }
            $stmt1->close();
            $stmt2->close();
        }
        $stmt->close();
    }
}
?>