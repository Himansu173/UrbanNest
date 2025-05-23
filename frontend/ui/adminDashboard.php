<?php
// session_start();
require_once "navbar.php";
require_once "../../database/userDb.php";
require_once "../../database/propertiesDetailsDb.php";
require_once "../../database/contactDb.php";

if(!isset($_SESSION['userId']) or $_SESSION['userId']!='1000'){
    ?>
        <script>window.location.href="./home.php"</script>
    <?php
}

$userData = getUsers();
$propertyData = getPropertyData();
$contactData = getContats();

$totalUser = getTotalUser();
$totalProperty = getTotalProperty();
$totalContacts = getTotalContats();

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4" onclick="showTable('userTable', 'User Details')">
            <div class="card shadow border-0" style="background-color:#6da4ed; cursor:pointer;">
                <div class="card-body">
                    <h6 class="mb-20 text-white fs-5 fw-bolder">Users</h6>
                    <h2 class="d-flex justify-content-between align-items-center text-white">
                        <span class="fs-1 fw-bold"><?php echo $totalUser ?></span>
                        <i class="bi bi-people-fill"></i>
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-4" onclick="showTable('propertyTable', 'Property Details')">
            <div class="card shadow border-0" style="background-color:#6de9ed; cursor:pointer;">
                <div class="card-body">
                    <h6 class="m-b-20 text-white fs-5 fw-bolder">Properties</h6>
                    <h2 class="d-flex justify-content-between align-items-center text-white">
                        <span class="fs-1 fw-bold"><?php echo $totalProperty ?></span>
                        <i class="bi bi-houses-fill"></i>
                    </h2>
                </div>
            </div>
        </div>        

        <div class="col-md-4 feedback" onclick="showTable('feedbackTable', 'Customer Feedbacks')">
            <div class="card shadow border-0 bg-warning" style="cursor:pointer;">
                <div class="card-body">
                    <h6 class="m-b-20 text-white fs-5 fw-bolder">Customer Feedbacks</h6>
                    <h2 class="d-flex justify-content-between align-items-center text-white">
                        <span class="fs-1 fw-bold"><?php echo $totalContacts ?></span>
                        <i class="bi bi-chat-right-text-fill"></i>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <fieldset id="tableTitle" class="responsive-fieldset fs-3">User Details</fieldset>
            <div class="table-responsive">

                <table id="userTable" class="table table-bordered table-hover table-striped dashboard-data">
                    <thead class="thead-dark table-primary">
                        <tr class="text-center">
                            <th scope="col">SL No.</th>
                            <th scope="col">UID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Address</th>
                            <th scope="col">Profile Picture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($userData): ?>
                            <?php $slNo = 1; ?>
                            <?php while ($row = $userData->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $slNo++ ?></td>
                                    <td class="align-middle"><?= $row['uid'] ?></td>
                                    <td class="align-middle"><?= $row['name'] ?></td>
                                    <td class="align-middle"><?= $row['email'] ?></td>
                                    <td class="align-middle"><?= $row['contact'] ?></td>
                                    <td class="align-middle"><?= $row['address'] ?></td>
                                    <td class="text-center align-middle">
                                        <img src="<?= "../../database/".$row['profile_pic'] ?>" alt="Profile Picture" width="50" height="50" class="rounded-circle">
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No data Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
                <!-- Property Table -->
                <table id="propertyTable" class="table table-bordered table-hover table-striped dashboard-data d-none">
                    <thead class="thead-dark table-success">
                        <tr class="text-center">
                            <th scope="col">SL No.</th>
                            <th scope="col">House Type</th>
                            <th scope="col">Carpet Area</th>
                            <th scope="col">Rent</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($propertyData): ?>
                            <?php $slNo = 1; ?>
                            <?php while ($row = $propertyData->fetch_assoc()): ?>
                                <tr style="cursor:pointer;">
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="text-center align-middle"><?= $slNo++ ?></td>
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="align-middle"><?= $row['house_type'] ?></td>
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="align-middle"><?= $row['carpet_area'] ?></td>
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="align-middle"><?= $row['rent_amount'] ?></td>
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="align-middle"><?= $row['city'] ?></td>
                                    <td onclick="window.location = 'propertyDetails.php?id=<?php echo $row['pid'] ?>'" class="align-middle"><?= $row['state'] ?></td>
                                    <td class="text-center align-middle">
                                        <a href="../../database/propertyDelete.php?pid=<?= $row['pid'] ?>" class="cursor-pointer d-block w-100 h-100" onclick="return confirm('Are you sure you want to delete this property?')">
                                            <i class="bi bi-trash-fill text-danger text-center"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No data Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Feedback Table -->
                <table id="feedbackTable" class="table table-bordered table-hover table-striped dashboard-data d-none">
                    <thead class="thead-dark table-warning">
                        <tr class="text-center">
                            <th scope="col" style="">Sl&nbsp;No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($contactData): ?>
                            <?php $slNo = 1;?>
                            <?php while ($row = $contactData->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center align-middle"><?= $slNo++ ?></td>
                                    <td class="align-middle"><?= $row['name'] ?></td>
                                    <td class="align-middle"><?= $row['email'] ?></td>
                                    <td class="align-middle"><?= $row['subject'] ?></td>
                                    <td class="align-middle"><?= $row['message'] ?></td>
                                    <td class="text-center align-middle">
                                        <a href="../../database/contactDelete.php?id=<?= $row['sn'] ?>" class="cursor-pointer d-block w-100 h-100" onclick="return confirm('Are you sure you want to delete this record?')">
                                            <i class="bi bi-trash-fill text-danger text-center"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">No data Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function showTable(tableId, title) {
        document.getElementById('feedbackTable').classList.add('d-none');
        document.getElementById('propertyTable').classList.add('d-none');
        document.getElementById('userTable').classList.add('d-none');

        document.getElementById(tableId).classList.remove('d-none');

        document.getElementById('tableTitle').textContent = title;
    }
</script>


<?php
require_once "footer.php";
?>
