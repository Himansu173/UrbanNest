<?php
require_once "navbar.php"
?>

<main class="main">

  <section id="hero" class="hero section dark-background">
    <img 
      id="hero-img" 
      src="../assets/img/hero-bg3.jpg" 
      alt="hero image" 
      class="z-n1"
    >
    <div class="w-100 h-100 position-absolute bg-dark" style="opacity:0.6"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 text-light my-3">
          <h2>Welcome to UrbanNest</h2>
          <p class="fw-medium">Your Home Away From Home.</p>
        </div>
        <div class="col-lg-5">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Success Modal --> <div class="modal fade" id="passwordUpdatedModal" tabindex="-1" aria-labelledby="passwordUpdatedModalLabel" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered"> <div class="modal-content"> <div class="modal-header bg-success text-white"> <h5 class="modal-title" id="passwordUpdatedModalLabel">Password Updated</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> </div> <div class="modal-body"> Your password has been successfully updated. For security reasons, please log in again. </div> <div class="modal-footer"> <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button> </div> </div> </div> </div>
  </section>
  
  <section id="recent-posts" class="recent-posts section">
    <div class="container section-title">
      <h2>Recent Posts</h2>
      <p>Discover Your Perfect Rental Home with Our Curated Selection of Recent Posts Tailored to Suit Your Style, Needs, and Budget!</p>
      <a class="my-3 float-end text-danger fw-semibold fs-6" href="./allProperties.php?page=1">View All<i class="bi bi-chevron-double-right text-danger"></i></a>
    </div>

    <div class="container">
      <div class="row mx-auto">
        <?php
          require_once "../../database/recentPost.php";
          $property = getRecentPost();
        ?>
        <?php if ($property){
          while ($row = $property->fetch_assoc()){ 
            $images=getPropertyImg($row['pid']); ?>
            <div class="col-xl-3 col-md-6 p-3">
              <article class="property-card">
                <div class="post-img">
                  <img src="../../database/<?php echo $images[0]['imgpath']?>" alt="<?php echo $row['house_type']; ?>" class="img-fluid">
                </div>
                <div class="card-body">
                  <h2 class="title fs-5" style="margin-bottom: 5px;"><?php echo $row['house_type']; ?></h2>
                  <p class="price" style="margin-bottom: 5px;">
                    <span class="text-success fs-5">₹<?php echo number_format($row['rent_amount'], 0); ?></span>
                    <span>Rent/month</span>
                    <span class="text-muted"> (<?php echo $row['carpet_area']; ?>)</span>
                  </p>
                  <p class="location" style="margin-bottom: 5px;">
                    <strong>City:</strong> <?php echo $row['city']; ?><br>
                    <strong>State:</strong> <?php echo $row['state']; ?>
                  </p>
                  <a href="./propertyDetails.php?id=<?php echo $row['pid'] ?>" class="btn custom-btn mt-2">View Details</a>
                </div>
              </article>
            </div>
          <?php }
        }else{ ?>
          <p>No recent posts found.</p>
        <?php } ?>
      </div>
    </div>

  </section>

  <section id="contact" class="contact section">

    <div class="container section-title">
      <h2>Support</h2>
      <p>Contact Us for Queries, Property Details, or Assistance with Your Ideal House Rental</p>
    </div>

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-item bg-body-tertiary">
                <i class="bi bi-geo-alt text-danger"></i>
                <h3>Address</h3>
                <p>Silicon Hills, BBSR</p>
                <p>India, 751024</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-item bg-body-tertiary">
                <i class="bi bi-telephone text-danger"></i>
                <h3>Call Us</h3>
                <p>+91 12345 06789</p>
                <p>+91 45126 46720</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-item bg-body-tertiary">
                <i class="bi bi-envelope text-danger"></i>
                <h3>Email Us</h3>
                <p>info@urbannest.com</p>
                <p>contact@urbannest.com</p>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info-item bg-body-tertiary">
                <i class="bi bi-clock text-danger"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday</p>
                <p>10:00AM - 06:00PM</p>
              </div>
            </div>

          </div>

        </div>

        <div class="col-lg-6">
          <form action="" method="post" class="php-email-form bg-body-tertiary" id="contactForm">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control bg-body" id="username" placeholder="Your Name" >
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control bg-body" name="email" id="useremail" placeholder="Your Email" >
              </div>

              <div class="col-12">
                <input type="text" class="form-control bg-body" name="subject" id="subject" placeholder="Subject" >
              </div>

              <div class="col-12">
                <textarea class="form-control bg-body" name="message" rows="6" id="message" placeholder="Message" ></textarea>
              </div>

              <div class="col-12 text-center">
                <input type="submit" value="Send Message" class="btn btn-danger">
              </div>
              <div id="toastContainer"></div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </section>

</main>

<?php require_once "footer.php"; 
if (isset($_GET['password_updated'])): ?> 
  <script> window.addEventListener('DOMContentLoaded', () => { 
    <?php if ($_GET['password_updated'] == '1'): ?> 
    const modalElement = document.getElementById('passwordUpdatedModal'); 
    const successModal = new bootstrap.Modal(modalElement); 
    modalElement.addEventListener('hidden.bs.modal', () => { 
      window.location.href = 'home.php'; }); 
      successModal.show(); <?php endif; ?> 
    }); 
  </script> 
  <?php endif; 
?>
