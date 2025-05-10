<?php 
    require_once "./navbar.php";
    require_once "../../database/propertiesDetailsDb.php";
    require_once "../../database/userDb.php";
    if(!isset($_GET['uid'])){
        ?>
        <script>window.location="home.php"</script>
        <?php
    }
    $user=getUserById($_GET['uid']);
    $userProperty=getPropertyByOwner($_GET['uid']);
?>
<div class="container my-2">
    <div class="card shadow-sm border-0 rounded d-flex align-items-start">
        <div class="bg-img d-flex justify-content-center align-items-end w-100 img-container"
        style="height: 300px; background-image: url('../../database/<?php echo $user['bg_pic'] ?>');">
        </div>
        <div class="rounded-circle z-1 ms-md-5 mx-auto text-center" style="margin-top: -60px;">
            <img src="../../database/<?php echo $user['profile_pic'] ?>"
                alt="user" height="120px" width="120px" class="rounded-circle shadow">
            <div class="text-md-start">
                <h4 class="fw-semibold">Jeetendra Singh</h4>
                <h6 class="fw-semibold"><i class="bi bi-geo-alt-fill"></i> Bhubaneswar, Odisha</h6>
                <h6 class="fw-semibold"><i class="bi bi-envelope-fill"></i> jeetendra@gmail.com</h6>
                <h6 class="fw-semibold"><i class="bi bi-telephone-fill"></i> 9873989827</h6>
            </div>
        </div>
    </div>
    <h5 class="my-3 fw-semibold">Recent Properties Listed By Jeetendra Singh</h5>
    <div id="venderProperties">
        <div></div>
    </div>
</div>
<?php 
    require_once "./footer.php";
    if($userProperty!=null){
        while($property=$userProperty->fetch_assoc()){
            $loc=getPropertyLocation($property['pid']);
            $images=getPropertyImg($property['pid']);
            $finance=getFinancialDetails($property['pid']);
            ?>
            <script>
                $("#venderProperties").append(`
                <div class="row mt-3 g-0 px-2 w-100 d-flex justify-content-between" onMouseOver="this.style.backgroundColor='#f5f5f5'" onMouseOut="this.style.backgroundColor=''" onclick="window.location='propertyDetails.php?id=<?php echo $property['pid'] ?>'" style="cursor:pointer;">
                    <div class="col-md-2 col-3">
                            <img src="../../database/<?php echo $images[0]['imgpath'] ?>" alt="img" width="90px" class="rounded">
                    </div>
                    <div class="col-md-4 col-sm-5 col-6 d-flex align-items-center flex-wrap overflow-hidden">
                            <div class="d-flex align-items-center w-100 overflow-hidden" style="font-size:0.8rem">
                            <?php echo $property['house_type']." ".$property['building_type'] ?> 
                            </div>
                            <div class="d-flex align-items-center w-100 overflow-hidden" style="font-size:0.8rem">
                            <?php echo $property['furnishing_type'] ?> 
                            </div>
                    </div>
                    <div class="col-xl-2 d-xl-flex align-items-center justify-content-center overflow-hidden d-none" style="font-size:0.8rem">
                            <?php echo $property['area'] ?>  Sq.Ft
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-center overflow-hidden" style="font-size:0.8rem">
                    &#8377; <?php echo $finance['rent_amount'] ?>L
                    </div>
                    <div class="col-md-2 d-md-flex align-items-center justify-content-center overflow-hidden d-none" style="font-size:0.8rem">
                            <?php echo $property['date_of_available'] ?>
                    </div>
                </div>
                `)
            </script>
        <?php
        }
    }
?>