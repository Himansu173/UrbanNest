<?php
    require_once "navbar.php";
    require_once "../../database/userDb.php";
    require_once "../../database/propertiesDetailsDb.php";
    if(!isset($_SESSION['userId'])){
        ?>
        <script>window.location="home.php"</script>
        <?php
    }
    $user=getUserById($_SESSION['userId']);
    $userProperty=getPropertyByOwner($_SESSION['userId']);
?>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-6 px-sm-2">
            <div class="card shadow-sm border-0 p-0 d-flex justify-content-center align-items-center">
                <div class="bg-img d-flex justify-content-center align-items-end w-100 img-container"
                    style="height: 250px; background-image: url('../../database/<?php echo $user['bg_pic'] ?>');">
                    <label for="bgImg" class="bg-img-upload h-100 w-100 justify-content-center align-items-center"
                        style="background-color: rgba(0, 0, 0, 0.187);">
                        <i class="bi bi-upload fs-1" style="color: whitesmoke;"></i>
                    </label>
                    <input type="file" class="d-none" id="bgImg">
                </div>
                <div class="rounded-circle shadow z-1 position-relative" style="margin-top: -60px;">
                    <img src="../../database/<?php echo $user['profile_pic'] ?>"
                        alt="user" height="120px" width="120px" class="rounded-circle">
                    <label
                        class="position-absolute bottom-0 p-2 translate-middle badge rounded-circle bg-white shadow-sm"
                        for="userImg" style="cursor: pointer; margin-left: -10px;  margin-bottom: -12px;">
                        <i class="bi bi-camera-fill fs-5 text-dark"></i>
                    </label>
                    <input type="file" class="d-none" id="userImg">
                </div>
                <div class="mt-3 text-center align-items-center">
                    <h4><?php echo $user['name'] ?></h4>
                    <h6><?php echo $user['address'] ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 px-sm-2">
            <div class="card shadow-sm border-0 p-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label fs-5 fw-semibold mb-0">Name</label>
                        <input type="text" class="inp inp-details fs-5 border-bottom read-only"
                            value="<?php echo $user['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-5 fw-semibold mb-0">Email</label>
                        <input type="email" class="inp inp-details fs-5 border-bottom read-only" value="<?php echo $user['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fs-5 fw-semibold mb-0">Phone No.</label>
                        <input type="text" class="inp inp-details fs-5 border-bottom read-only" value="<?php echo $user['contact'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Address" class="form-label fs-5 fw-semibold mb-0">Address</label>
                        <textarea name="Address" class="inp inp-details fs-5 border-bottom read-only" rows="1"><?php echo $user['address'] ?></textarea>
                    </div>
                    <div class="mb-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-dark text-white me-2" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">Update Password</button>
                        <input type="button" class="btn btn-secondary update-btn hide me-2" value="Cancle" id="cancle">
                        <input type="submit" class="btn btn-primary update-btn hide" value="Update" id="Update">
                        <input type="button" class="btn btn-dark edit-btn text-white" value="Edit Details" id="edit">
                    </div>
                </form>
                <div class="modal fade" id="updatePasswordModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updatePasswordModalLabel">Update Your Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body mb-0">
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold mb-0">Existing
                                            Password</label>
                                        <input type="password" class="inp border-bottom" name="existingPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold mb-0">New Password</label>
                                        <input type="password" class="inp border-bottom" name="newPassword">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label fw-semibold mb-0">Confirm
                                            Password</label>
                                        <input type="password" class="inp border-bottom" name="confirmPassword">
                                    </div>
                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal" onclick="closePasswordUpdateModal()">Close</button>
                                        <input type="submit" value="Update" class="btn btn-dark"
                                            data-bs-dismiss="modal">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center my-2">
            <span class="fw-bold fs-4">Your Properties</span>            
            <button class="btn btn-dark" id="addNew"><i class="bi bi-plus-lg"></i> Add new property</button>
        </div>
    </div>
    <div class="d-flex flex-wrap justify-content-evenly" id="yourProperties"></div>
</div>
<script src="../js/ownersProfile.js"></script>
<?php 
    require_once "footer.php";
    while($property=$userProperty->fetch_assoc()){
        $loc=getPropertyLocation($property['pid']);
        $images=getPropertyImg($property['pid']);   
        ?>
        <script>
            $("#yourProperties").append(`
                <div class="card property-card border-0 mb-3 overflow-y-hidden" style="width:20rem;">
                    <div id="<?php echo $property['pid'] ?>" class="carousel slide w-100">
                        <div class="carousel-inner h-100 w-100">
                        <?php
                            foreach ($images as $key => $value) {
                                echo "<div class='carousel-item ".($key==0?"active":"")."'><img src='../../database/".$value['imgpath']."' class='card-img' alt='ax' height='200px'></div>";
                            }
                        ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $property['pid'] ?>"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $property['pid'] ?>"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-secondary rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body p-2 property-body bg-white">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title"><?php echo $loc['locality'] ?></h5>
                            <span class="badge ms-2 text-bg-success propertyStatus" style="cursor:pointer;">Available</span>
                        </div>
                        <p class="card-text mb-1 fs-6">
                            <img src="../assets/img/bed.png" alt="img" width="20rem">
                            <span class="ms-1">
                            <?php
                                if($loc){
                                    echo $property['house_type']." ".$property['property_type']." property for ".$property['listing_type']." in ".$loc['city'].", ".$loc['state'];
                                }else{
                                    echo $property['house_type']." ".$property['property_type']." property for ".$property['listing_type'];
                                }
                            ?>
                            </span>
                        </p>
                        <p class="card-text mb-1 fs-4 m-0 fw-semibold">&#8377; <?php echo getPropertyPrice($property['pid']) ?></p>
                        <a class="btn btn-secondary fw-semibold btn-sm my-1 w-100" href="./propertyRegister.php"><i class="bi bi-pen"></i> Edit Property Details</a>
                    </div>
                </div>
            `);
        </script>
<?php
    }
?>