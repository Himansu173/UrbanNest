<?php 
   require_once "../../database/propertiesDetailsDb.php";
   require_once "../../database/userDb.php";
   require_once "navbar.php";
   if(!isset($_GET['id'])){
      ?>
         <script>window.location="./allProperties.php"</script>
      <?php
   }
   $data=getPropertyById($_GET['id']);
   $loc=getPropertyLocation($_GET['id']);
   $finance=getFinancialDetails($_GET['id']);
   $user=getUserById($data['uid']);
   $images=getPropertyImg($data['pid']);
   $similarProperties=getSimillarProperties($data['house_type'],$data['building_type'],getPropertyPrice($data['pid']),$loc['city'],$loc['state']);
?>
<style>
   .property-info{
      width:33%;
      margin-top:7px;
   }
   @media only screen and (max-width:567px) {
      .property-info{
         width:50%;
      }
   }
</style>
<div class="container">
   <div class="row mt-2">
      <div class="col-md-7">
         <div id="propertyImg" class="carousel slide w-100" data-bs-ride="carousel" pause interval="2">
            <div class="carousel-inner h-100 w-100">
               <?php
                  foreach ($images as $key => $value) {
                     echo "<div class='carousel-item ".($key==0?"active":"")."'><img src='../../database/".$value['imgpath']."' class='card-img rounded' alt='ax' height='400px'></div>";
                  }
               ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#propertyImg" data-bs-slide="prev">
               <span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyImg" data-bs-slide="next">
               <span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
            </button>
         </div>
      </div>
      <div class="col-md-5">
         <div class="card-body px-2 px-md-0 pe-md-1 p-0">
            <p class="card-title fw-semibold fs-3 m-0 p-0 text-primary-emphasis"><?php 
               if($loc){
                  echo $loc['locality'];
              }else{
                  echo "Unknown";
              }
            ?></p>
            <p class="card-text mb-1 fs-5"><?php
                  echo $data['house_type']." ".$data['property_type']." property for ".$data['listing_type'];
            ?></p>
            <p class="card-text mb-1 fs-3 text-primary-emphasis m-0 fw-semibold">&#8377; <?php echo getPropertyPrice($data['pid']) ?></p>
            <p class="card-text mb-1 fs-6 d-flex align-items-center">
               <img src="../assets/img/bedroom.png" alt="img" width="23rem">
               <span class="ms-2 fw-semibold"> <?php echo $data['house_type'] ?></span>
            </p>
            <p class="card-text mb-1 fs-6 d-flex align-items-center">
               <img src="../assets/img/sofa.png" alt="img" width="23rem">
               <span class="ms-2 fw-semibold"> <?php echo $data['furnishing_type'] ?></span>
            </p>
            <p class="card-text mb-1 fs-6 d-flex align-items-center">
               <img src="../assets/img/area.png" alt="img" width="23rem">
               <span class="ms-2 fw-semibold"> <?php echo $data['area'] ?> (Build up Area)</span>
            </p>
            <p class="card-text mb-1 fs-6 d-flex align-items-center">
               <i class="bi bi-geo-alt fs-4"></i>
               <span class="ms-2 fw-semibold"> <?php echo $loc['city'].", ".$loc['state']; ?></span>
            </p>
            <div class="mt-3 d-flex align-items-center justify-content-between">
               <div class="d-flex align-items-center" style="cursor:pointer;" onclick="window.location='./venderProfile.php?uid=<?php echo $user['uid'] ?>'">
                  <img src="../../database/<?php echo $user['profile_pic'] ?>" alt="user" height="35px" width="35px" class="rounded-circle">
                  <p class="card-text ms-2 fw-semibold fs-5"><?php echo $user['name'] ?></p>
               </div>
               <div class="d-flex align-items-center">
               <i class="bi bi-telephone-fill fs-6"></i>
               <p class="card-text ms-2 fw-semibold fs-5"><?php echo $user['contact'] ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row mt-3 pb-3">
      <div class="col-md-7">
         <div class="card border-0 shadow">
            <div class="fs-4 fw-semibold mx-2 p-2 border-bottom border-3">Key Highlights</div>
            <div class="d-flex flex-wrap justify-content-evenly align-item-center mt-3">
               <div class="card rounded-pill p-2 m-1">Near City Center</div>
               <div class="card rounded-pill p-2 m-1">Affordable</div>
               <div class="card rounded-pill p-2 m-1">Spacious</div>
               <div class="card rounded-pill p-2 m-1">Well ventilated</div>
               <div class="card rounded-pill p-2 m-1">Well Maintained</div>
            </div>
            <div class="px-3">
               <p class="card-text">Experience the true essence of comfortable living at this <?php echo $data['house_type']." ".$data['furnishing_type']." ".$data['building_type']." in ".$loc['city'].", ".$loc['state'].".";?></p>
               <ul>
                  <?php
                     $desc=explode(".", $data['description']);
                     foreach ($desc as $key => $value) {
                        if(strlen($value)==0)
                           continue;
                        echo "<li>$value.</li>";
                     }
                  ?>
               </ul>
            </div>
         </div>
         <div class="card border-0 shadow my-3 pb-3">
            <div class="fs-4 fw-semibold mx-2 p-2 border-bottom border-3">Property Information</div>
            <div class="mt-3 d-flex flex-wrap px-2">
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Listing Type</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['listing_type'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Listed By</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['listed_by'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Property Type</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['property_type'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Building Type</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['building_type'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">House Type</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['house_type'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Property Age</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['property_age'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Balcony</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['balcony'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Area</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['area'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Carpet Area</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['carpet_area'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Parking</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['parking'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Furnishing Type</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['furnishing_type'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Power Backup</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['power_backup'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Lift</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['lift'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Floor</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['floor'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Date Of Listing</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['date_of_listing'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Date Of Available</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $data['date_of_available'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Rent/Price</p>
                     <p class="fs-6 fw-semibold m-0">&#8377; <?php echo $finance['rent_amount'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Security Deposit</p>
                     <p class="fs-6 fw-semibold m-0">&#8377; <?php echo $finance['security_deposit'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Lease Period</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $finance['lease_period'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Mentainance</p>
                     <p class="fs-6 fw-semibold m-0">&#8377; <?php echo $finance['m_charges'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Negotiable</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $finance['negotiable'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">State</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $loc['state'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">City</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $loc['city'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Locality</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $loc['locality'] ?></p>
                  </div>
               </div>
               <div class="property-info p-0">
                  <div class="border-bottom mx-3">
                     <p class="fs-6 text-gray m-0">Pin Code</p>
                     <p class="fs-6 fw-semibold m-0"><?php echo $loc['pincode'] ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-5">
         <div class="shadow rounded p-1" id="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.7806764633715!2d85.8037610752383!3d20.350677281134352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1908e064769e73%3A0x9288172f3a98c7a4!2sSilicon%20University!5e0!3m2!1sen!2sin!4v1733336564038!5m2!1sen!2sin" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
         <div class="card shadow mt-3 pb-3 border-0" id="simillarPropertyContainer">
            <div class="fs-4 fw-semibold mx-2 p-2 border-bottom border-3">Simillar Properties</div>
         </div>
      </div>
   </div>
</div>
</div>
<?php 
   require_once "footer.php";
   while($property=$similarProperties->fetch_assoc()){
      ?>
         <script>
            $("#simillarPropertyContainer").append(`
               <div class="row mt-3 g-0 px-2 w-100 d-flex justify-content-between" onMouseOver="this.style.backgroundColor='#f5f5f5'" onMouseOut="this.style.backgroundColor=''" onclick="window.location='propertyDetails.php?id=<?php echo $property['pid'] ?>'" style="cursor:pointer;">
                  <div class="col-3">
                        <img src="../../database/<?php echo getPropertyImg($property['pid'])[0]['imgpath'] ?>" alt="img" height="60px" width="100%" class="rounded">
                  </div>
                  <div class="col-md-5 col-sm-5 col-6 d-flex align-items-center flex-wrap overflow-hidden">
                        <div class="d-flex align-items-center justify-content-center w-100 overflow-hidden" style="font-size:0.9rem">
                           <?php echo $property['house_type']." ".$property['building_type'] ?> 
                        </div>
                        <div class="d-flex align-items-center justify-content-center w-100 overflow-hidden" style="font-size:0.9rem">
                           <?php echo getPropertyLocation($property['pid'])['city'] ?>
                        </div>
                  </div>
                  <div class="col-xl-2 d-xl-flex align-items-center justify-content-center overflow-hidden d-none" style="font-size:0.9rem">
                        <?php echo $property['area'] ?>
                  </div>
                  <div class="col-2 d-flex align-items-center justify-content-center overflow-hidden" style="font-size:0.9rem">
                  &#8377; <?php echo getPropertyPrice($property['pid']) ?>
                  </div>
               </div>
            `)
         </script>
      <?php
      }
?>