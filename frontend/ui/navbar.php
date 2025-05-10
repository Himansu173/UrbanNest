<?php  
  session_start();
  $isLogged = false;
  $isAdmin = false;
  if(isset($_SESSION['userId'])){
    if($_SESSION['userId']=='1000'){
      $isAdmin=true;
    }else{
      $isLogged = true;
    }
    require_once "../../database/userDb.php";
    $user = getUserById($_SESSION['userId']);
    // print_r($user);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>UrbanNest - Your Home Away From Home</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon" />

    <!-- Vendor CSS Files -->
    <link
      href="../assets/vendor/bootstrap/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="../css/allProperties.css" />
    <link rel="stylesheet" href="../css/ownerProfile.css" />
    <link rel="stylesheet" href="../css/adminDashboard.css" />

    <!-- Main CSS File -->
    <link href="../css/main.css" rel="stylesheet" />
    <!-- <script src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></script> -->
  </head>

  <body class="index-page">
    <div
      class="container-fluid py-xl-0 py-3 position-relative d-flex align-items-center position-sticky sticky-top justify-content-between bg-white shadow-sm"
    >
      <a href="home.php" class="logo d-flex align-items-center me-xl-0">
        <!-- <img src="../assets/img/logo.png" alt="LOGO" class="rounded" height="35px"> -->
        <div class="p-1 bg-black text-white rounded fw-bold">UN</div>
        <h4 class="fw-semibold text-black mb-0 ms-1">UrbanNest</h4>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="./home.php#hero" class="active">Home</a></li>
          <li>
            <a href="./home.php#recent-posts" class="active">Recent Posts</a>
          </li>
          <li>
            <a href="./allProperties.php?page=1 " class="active">All Properties</a>
          </li>
          <li><a href="./home.php#contact" class="active">Support</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php
       if($isLogged){ 
        echo '<div class="dropdown">
            <a
              data-mdb-dropdown-init
              class="dropdown-toggle-d-none d-flex align-items-center hidden-arrow"
              href="#"
              id="navbarDropdownMenuAvatar"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="../../database/' .($user['profile_pic']) . '"
                class="rounded-circle"
                height="40"
                alt="Black and White Portrait of a Man"
                loading="lazy"
              />
            </a>
            <ul
              class="dropdown-menu "
              aria-labelledby="navbarDropdownMenuAvatar"
            >
              <li>
                <a class="dropdown-item" href="./ownerProfile.php">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="./logout.php">Logout</a>
              </li>
            </ul>
          </div>';
       }elseif($isAdmin){
        echo '<div class="dropdown">
            <a
              data-mdb-dropdown-init
              class="dropdown-toggle-d-none d-flex align-items-center hidden-arrow"
              href="#"
              id="navbarDropdownMenuAvatar"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="../../database/' .($user['profile_pic']) . '"
                 class="rounded-circle"
                height="40"
                width="40"
                alt="Black and White Portrait of a Man"
                loading="lazy"
              />
            </a>
            <ul
              class="dropdown-menu "
              aria-labelledby="navbarDropdownMenuAvatar"
            >
              <li>
                <a class="dropdown-item" href="./adminDashboard.php">Admin Dashborad</a>
              </li>
              <li>
                <a class="dropdown-item" href="./ownerProfile.php">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="./logout.php">Logout</a>
              </li>
            </ul>
          </div>';
       }
        else{ 
        echo '<a
            class="btn btn-danger btn-sm fw-medium fs-6"
            data-bs-toggle="modal"
            data-bs-target="#loginModal"
          >
            Log In
          </a>';
        }
        

       require_once "login.php"; 
       require_once "signup.php"
      ?>
    </div>
  </body>
</html>
