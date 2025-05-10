<?php
require_once "dbconnect.php";
session_start();

if (isset($_POST['update'])) {
    $userId = $_SESSION['userId'];
    $pid = $_POST['pid'];
    $listingType = $_POST['listingType'];
    $propertyType = $_POST['propertyType'];
    $buildingType = $_POST['buildingType'];
    $listedBy = $_POST['listedBy'];
    $houseType = $_POST['houseType'];
    $state = $_POST['stateProperty'];
    $city = $_POST['cityProperty'];
    $locality = $_POST['locality'];
    $pinCode = $_POST['pinCode'];
    $area = $_POST['area'] . " sq.ft";
    $carpetArea = $_POST['carpetArea'] . " sq.ft";
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

    $stmt = $conn->prepare("UPDATE property SET listing_type=? , property_type=? , building_type=? , listed_by=? , house_type=? ,property_age=? ,balcony=? ,area=? ,carpet_area=? ,parking=? ,furnishing_type=? ,power_backup=? ,lift=? ,floor=?, date_of_listing=?, date_of_available=? ,description=? WHERE pid=?");

    $stmt->bind_param(
        'sssssssssssssssssi',
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
        $description,
        $pid
    );

    if ($stmt->execute()) {
        $qry1 = "UPDATE finance_details SET rent_amount=? ,security_deposit=? ,lease_period=? ,m_charges=? ,negotiable=? WHERE pid=?";
        $qry2 = "UPDATE address SET state=? ,city=? ,locality=? ,pincode=? WHERE pid=?";
        $stmt1 = $conn->prepare($qry1);
        $stmt2 = $conn->prepare($qry2);
        $stmt1->bind_param("sssssi",$rent,$securityDeposite,$leasePeriod,$maintenanceCharges,$negotiable,$pid);
        $stmt2->bind_param("ssssi", $state, $city, $locality, $pinCode,$pid);
        $res1 = $stmt1->execute();
        $res2 = $stmt2->execute();
        
        $uploadDir = "property_images/";
        $res3 = true;
        foreach ($_FILES['images']['tmp_name'] as $index => $tmpName) {
            if (!empty($tmpName)) {
                $originalName = $_FILES['images']['name'][$index];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $newFileName = "property" . $pid . "_" . $originalName . "." . $extension;
                $targetFilePath = $uploadDir . $newFileName;

                if (move_uploaded_file($tmpName, $targetFilePath)) {
                    $stmt3 = $conn->prepare("INSERT INTO property_photo(pid,imgpath) VALUES (?,?)");
                    $stmt3->bind_param("is", $pid,$targetFilePath);
                    $res3 =$stmt3->execute();
                    $stmt3->close();
                }else{
                    $res3=false;
                }
            }
        }

        if (isset($_POST['deleteImages'])) {
            foreach ($_POST['deleteImages'] as $jsonData) {
                $data = json_decode($jsonData, true);
                if ($data && isset($data['phid']) && isset($data['imgpath'])) {
                    $phid = $data['phid'];
                    $imgPath = $data['imgpath'];
        
                    if (file_exists($imgPath)) {
                        unlink($imgPath);
                    }
        
                    $stmt = $conn->prepare("DELETE FROM property_photo WHERE phid = ?");
                    $stmt->bind_param("i", $phid);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
        

        if($res1 && $res2 && $res3){
            header("location:../frontend/ui/ownerProfile.php");
            exit();
        }else{
            echo "Something went wrong.";
        }
        $stmt1->close();
        $stmt2->close();
        
        $stmt->close();
    }
}else{
    header("location:../frontend/ui/ownerProfile.php");
    exit();
}
?>