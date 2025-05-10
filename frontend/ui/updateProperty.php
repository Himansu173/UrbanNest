<?php
    include_once "navbar.php";
    include_once "../../database/propertiesDetailsDb.php";
    if (isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        $propertyData = getPropertyDataById($pid);
        $property = $propertyData->fetch_assoc();
        if($property['uid']!=$_SESSION['userId']){
           ?>
            <script>window.location.href='./home.php';</script>
           <?php
        }
        $images=getPropertyImg($pid);
    }else{
        header("Location:home.php");
    }
?>
<div class="container mt-5">
    <div class="bg-secondary p-1 my-4">
        <h2 class="text-center text-white">Update Your Property</h2>
    </div>
    <form action="../../database/updateProperty.php" method="post" enctype="multipart/form-data" id="formProperty">
        <input type="number" name="pid" class="d-none" value="<?php echo $property['pid']; ?>">
        <p class="text-center text-danger">(*) fields indicate mandatory field.</p>
        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
            <h5 class="mt-4">Listing Details</h5>
            <hr class="">
            <div class="col-md-4">
                <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Listing Type <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listingType" id="rentListing" class="btn-check" value="Rent" <?php echo ($property['listing_type'] == 'Rent') ? 'checked' : ''; ?> required>
                        <label for="rentListing" class="btn btn-outline-success">Rent</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listingType" id="sale" class="btn-check" value="Sale" <?php echo ($property['listing_type'] == 'Sale') ? 'checked' : ''; ?> required>
                        <label for="sale" class="btn btn-outline-success">Sale</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listingType" id="pg" class="btn-check" value="PG" <?php echo ($property['listing_type'] == 'PG') ? 'checked' : ''; ?> required>
                        <label for="pg" class="btn btn-outline-success">PG</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="" class="form-label fw-semibold" style="font-size: 0.9rem;">Property Type <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="propertyType" id="residensial" class="btn-check" value="Residential" <?php echo ($property['property_type'] == 'Residential') ? 'checked' : ''; ?> required>
                        <label for="residensial" class="btn btn-outline-success">Residential</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="propertyType" id="commercial" class="btn-check" value="Commercial" <?php echo ($property['property_type'] == 'Commercial') ? 'checked' : ''; ?> required>
                        <label for="commercial" class="btn btn-outline-success">Commercial</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="" class="form-label fw-semibold" style="font-size: 0.9rem;">Building Type <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="buildingType" id="house" class="btn-check" value="house" <?php echo ($property['building_type'] == 'house') ? 'checked' : ''; ?> required>
                        <label for="house" class="btn btn-outline-success">House</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="buildingType" id="apartment" class="btn-check" value="apartment" <?php echo ($property['building_type'] == 'apartment') ? 'checked' : ''; ?> required>
                        <label for="apartment" class="btn btn-outline-success">Apartment</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="buildingType" id="OfficeSpace" class="btn-check" value="office" <?php echo ($property['building_type'] == 'office') ? 'checked' : ''; ?> required>
                        <label for="OfficeSpace" class="btn btn-outline-success">Office Space</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Listed By <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listedBy" id="owner" class="btn-check" value="Owner" <?php echo ($property['listed_by'] == 'Owner') ? 'checked' : ''; ?> required>
                        <label for="owner" class="btn btn-outline-success">Owner</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listedBy" id="builder" class="btn-check" value="Builder" <?php echo ($property['listed_by'] == 'Builder') ? 'checked' : ''; ?> required>
                        <label for="builder" class="btn btn-outline-success">Builder</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="listedBy" id="agent" class="btn-check" value="Agent" <?php echo ($property['listed_by'] == 'Agent') ? 'checked' : ''; ?> required>
                        <label for="agent" class="btn btn-outline-success">Agent</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="houseType" class="form-label fw-semibold" style="font-size: 0.9rem;">House Type <span class="text-danger">*</span></label>
                <select class="form-select border-success" id="houseType" name="houseType" required>
                    <option selected disabled>Choose House Type</option>
                    <option value="1 BHK" <?php echo ($property['house_type'] == '1BHK') ? 'selected' : ''; ?>>1 BHK</option>
                    <option value="2 BHK" <?php echo ($property['house_type'] == '2BHK') ? 'selected' : ''; ?>>2 BHK</option>
                    <option value="3 BHK" <?php echo ($property['house_type'] == '3BHK') ? 'selected' : ''; ?>>3 BHK</option>
                    <option value="4 BHK" <?php echo ($property['house_type'] == '4BHK') ? 'selected' : ''; ?>>4 BHK</option>
                    <option value="5 BHK" <?php echo ($property['house_type'] == '5BHK') ? 'selected' : ''; ?>>5 BHK</option>
                    <option value="1 Hall" <?php echo ($property['house_type'] == '1Hall') ? 'selected' : ''; ?>>1 Hall</option>
                    <option value="villa" <?php echo ($property['house_type'] == 'villa') ? 'selected' : ''; ?>>Villa</option>
                    <option value="Others" <?php echo ($property['house_type'] == 'Others') ? 'selected' : ''; ?>>Others</option>
                </select>
            </div>
        </div>
        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
            <h5 class="mt-4">Location Information</h5>
            <hr class="">
            <div class="col-md-4">
                <label for="state" class="fw-semibold form-label" style="font-size: 0.9rem;">State <span class="text-danger">*</span></label>
                <input type="text" name="stateProperty" id="stateProperty" class="form-control border-success" value="<?php echo $property['state']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="city" class="fw-semibold form-label" style="font-size: 0.9rem;">City <span class="text-danger">*</span></label>
                <input type="text" name="cityProperty" id="cityProperty" class="form-control border-success" value="<?php echo $property['city']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="locality" class="fw-semibold form-label" style="font-size: 0.9rem;">Locality <span class="text-danger">*</span></label>
                <input type="text" name="locality" id="locality" class="form-control border-success" value="<?php echo $property['locality']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="pinCode" class="fw-semibold form-label" style="font-size: 0.9rem;">Pin Code <span class="text-danger">*</span></label>
                <input type="zip" name="pinCode" id="pinCode"  class="form-control border-success" value="<?php echo $property['pincode']; ?>" required>
                <label for="" id="errorPincode" class="text-danger"></label>
            </div>
        </div>

        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
    <h5 class="mt-4">Property Specifications</h5>
    <hr class="">

    <div class="col-md-4">
        <label for="area" class="fw-semibold form-label" style="font-size: 0.9rem;">Area <span class="text-danger">*</span></label>
        <input type="text" name="area" id="area" class="form-control border-success" value="<?php echo $property['area']; ?>" required>
    </div>

    <div class="col-md-4">
        <label for="carpetArea" class="fw-semibold form-label" style="font-size: 0.9rem;">Carpet Area <span class="text-danger">*</span></label>
        <input type="text" name="carpetArea" id="carpetArea" class="form-control border-success" value="<?php echo $property['carpet_area']; ?>" required>
    </div>

    <div class="col-md-4">
        <label for="age" class="fw-semibold form-label" style="font-size: 0.9rem;">Age of Property</label>
        <input type="text" name="age" id="age" class="form-control border-success" value="<?php echo $property['property_age']; ?>">
    </div>

    <div class="col-md-4">
        <label for="floorNumber" class="fw-semibold form-label" style="font-size: 0.9rem;">Floor Number</label>
        <input type="text" name="floorNumber" id="floorNumber" class="form-control border-success" value="<?php echo $property['floor']; ?>">
    </div>

    <div class="col-md-4">
        <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Furnishing Status <span class="text-danger">*</span></label>
        <div>
            <div class="form-check form-check-inline">
                <input type="radio" name="furnish" id="fully" class="btn-check" value="Fully Furnished" <?php echo ($property['furnishing_type'] == 'Fully Furnished') ? 'checked' : ''; ?> required>
                <label for="fully" class="btn btn-outline-success">Fully</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="furnish" id="semi" class="btn-check" value="Semi-furnished" <?php echo ($property['furnishing_type'] == 'Semi-furnished') ? 'checked' : ''; ?> required>
                <label for="semi" class="btn btn-outline-success">Semi</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="furnish" id="unFurnished" class="btn-check" value="Unfurnished" <?php echo ($property['furnishing_type'] == 'Unfurnished') ? 'checked' : ''; ?> required>
                <label for="unFurnished" class="btn btn-outline-success">Unfurnished</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Balcony <span class="text-danger">*</span></label>
        <div>
            <div class="form-check form-check-inline">
                <input type="radio" name="balcony" id="individual" class="btn-check" value="Yes" <?php echo ($property['balcony'] == 'Yes') ? 'checked' : ''; ?> required>
                <label for="individual" class="btn btn-outline-success">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="balcony" id="common" class="btn-check" value="No" <?php echo ($property['balcony'] == 'No') ? 'checked' : ''; ?> required>
                <label for="common" class="btn btn-outline-success">No</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Power Backup</label>
        <div>
            <div class="form-check form-check-inline">
                <input type="radio" name="power" id="available" class="btn-check" value="available" <?php echo ($property['power_backup'] == 'Available') ? 'checked' : ''; ?>>
                <label for="available" class="btn btn-outline-success">Available</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="power" id="powerNa" class="btn-check" value="not available" <?php echo ($property['power_backup'] == 'Not Available') ? 'checked' : ''; ?>>
                <label for="powerNa" class="btn btn-outline-success">Not Available</label>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Lift Availability</label>
        <div>
            <div class="form-check form-check-inline">
                <input type="radio" name="lift" id="liftYes" class="btn-check" value="Yes" <?php echo ($property['lift'] == 'Yes') ? 'checked' : ''; ?>>
                <label for="liftYes" class="btn btn-outline-success">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="lift" id="liftNo" class="btn-check" value="No" <?php echo ($property['lift'] == 'No') ? 'checked' : ''; ?>>
                <label for="liftNo" class="btn btn-outline-success">No</label>
            </div>
        </div>
    </div>

            <div class="col-md-4">
                <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Parking</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="parking" id="parkingAvailable" class="btn-check" value="available" <?php echo ($property['parking'] == 'Available') ? 'checked' : ''; ?>>
                        <label for="parkingAvailable" class="btn btn-outline-success">Available</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="parking" id="parkingNa" class="btn-check" value="not available" <?php echo ($property['parking'] == 'Not Available') ? 'checked' : ''; ?>>
                        <label for="parkingNa" class="btn btn-outline-success">Not Available</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
            <h5 class="mt-4">Financial Details</h5>
            <hr class="">

            <div class="col-md-4">
                <label for="rent" class="fw-semibold form-label" style="font-size: 0.9rem;">Rent <span class="text-danger">*</span></label>
                <input type="text" name="rent" id="rent" class="form-control border-success" value="<?php echo $property['rent_amount']; ?>" required>
                <label for="" id="errorRent" class="text-danger"></label>
            </div>

            <div class="col-md-4">
                <label for="securityDeposite" class="fw-semibold form-label" style="font-size: 0.9rem;">Security Deposite <span class="text-danger">*</span></label>
                <input type="text" name="securityDeposite" id="securityDeposite" class="form-control border-success" value="<?php echo $property['security_deposit']; ?>" required>
                <label for="" id="errorSecurityDeposite" class="text-danger"></label>
            </div>

            <div class="col-md-4">
                <label for="" class="fw-semibold form-label" style="font-size: 0.9rem;">Negotiable <span class="text-danger">*</span></label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="negotiable" id="negotiableYes" class="btn-check" value="Yes" <?php echo ($property['negotiable'] == 'Yes') ? 'checked' : ''; ?> required>
                        <label for="negotiableYes" class="btn btn-outline-success">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="negotiable" id="negotiableNo" class="btn-check" value="No" <?php echo ($property['negotiable'] == 'No') ? 'checked' : ''; ?> required>
                        <label for="negotiableNo" class="btn btn-outline-success">No</label>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="leasePeriod" class="fw-semibold form-label" style="font-size: 0.9rem;">Lease Period <span class="text-danger">*</span></label>
                <input type="text" name="leasePeriod" id="leasePeriod" class="form-control border-success" value="<?php echo $property['lease_period']; ?>" required>
            </div>

            <div class="col-md-4">
                <label for="maintenanceCharges" class="fw-semibold form-label" style="font-size: 0.9rem;">Maintenance Charges <span class="text-danger">*</span></label>
                <input type="text" name="maintenanceCharges" id="maintenanceCharges" class="form-control border-success" value="<?php echo $property['m_charges']; ?>" required>
            </div>

        </div>

        <div class="row mb-3 g-2 shadow-sm p-2 rounded">
            <h5 class="mt-4">Availability</h5>
            <hr class="">
            <div class="col-md-4">
                <label for="availabilityDate" class="fw-semibold form-label" style="font-size: 0.9rem;">Availability Date <span class="text-danger">*</span></label>
                <input  type="date" name="availabilityDate" id="availabilityDate" value="<?php echo $property['date_of_available']; ?>" class="form-control border-success" required>
            </div>            
        </div>

        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
            <h5 class="mt-4">Property Images</h5>
            <hr class="">
            <div class="row g-3">
                <?php foreach ($images as $key => $value): ?> 
                    <div class='col-md-3'>
                        <img src="../../database/<?= htmlspecialchars($value['imgpath']) ?>" class='card-img rounded' alt='Image' height='180px'>
                        <div class="text-center py-1">
                            <input class="form-check-input" type="checkbox"
                                style="cursor:pointer;"
                                name="deleteImages[]"
                                value='<?= json_encode(["phid" => $value["phid"], "imgpath" => $value["imgpath"]]) ?>'
                                id="delete<?= $key ?>">
                            <label class="form-check-label text-danger fw-bold"
                                style="cursor:pointer;"
                                for="delete<?= $key ?>">Delete</label>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <label for="photos" class="form-label fw-semibold" style="font-size: 0.9rem;">Upload Photos</label>
            <input  type="file" class="form-control border-success w-50" id="photos" name="images[]" multiple>
        </div>

        <div class="row my-4 g-2 shadow-sm py-3 px-2 rounded">
            <h5 class="mt-4">Property Description</h5>
            <hr class="">
            <div class="col-md-12">
                <label for="description" class="fw-semibold form-label" style="font-size: 0.9rem;">Property Description <span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control border-success" rows="4" required><?php echo $property['description']; ?></textarea>
            </div>
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" name="update" class="btn btn-success">Update Property</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    console.log("form loaded");
    const form = document.querySelector("#formProperty");
    const rent = document.querySelector("#rent");
    const securityDeposite = document.querySelector("#securityDeposite");
    const maintenanceCharges = document.querySelector("#maintenanceCharges");
    const pinCode = document.querySelector("#pinCode");

    form.addEventListener("submit", (e) => {
        let isValid = true;
        document.getElementById("errorRent").innerText="";
        document.getElementById("errorSecurityDeposite").innerText="";
        document.getElementById("errorMaintenanceCharges").innerText="";
        document.getElementById("errorPincode").innerText="";
        if(!rent.value.match(/^[0-9]+$/)){
            document.getElementById("errorRent").innerText="contains only numbers";
            isValid = false;
        }
        if(!securityDeposite.value.match(/^\d+$/)){
            document.getElementById("errorSecurityDeposite").innerText="contains only numbers";
            isValid = false;
        }
        if(!maintenanceCharges.value.match(/^\d+$/)){
            document.getElementById("errorMaintenanceCharges").innerText="contains only numbers";
            isValid = false;
        }
        if(!maintenanceCharges.value.match(/^\d+$/)){
            document.getElementById("errorMaintenanceCharges").innerText="contains only numbers";
            isValid = false;
        }
        if(!pinCode.value.match(/^[1-9][0-9]{5}$/)){
            document.getElementById("errorPincode").innerText="Enter a valid Pincode";
            isValid = false;
        }
        if(!isValid){
            e.preventDefault();
        }else{
            form.submit();
        }
    });
});
</script>
<?php require_once "footer.php" ?>