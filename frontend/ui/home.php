<?php
require_once "navbar.php"
?>

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <img 
      id="hero-img" 
      src="../assets/img/hero-bg2.jpg" 
      alt="" 
      style="
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        position: absolute; 
        transition: opacity 1s ease-in-out; 
        opacity: 1;
      "
    >
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <h2 data-aos="fade-up" data-aos-delay="100">Welcome to UrbanNest</h2>
          <p data-aos="fade-up" data-aos-delay="200">Your Home Away From Home.</p>
        </div>
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="300">
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="location-form">
              <input type="text" name="location" placeholder="Search by location">
              <input type="submit" value="Search">
            </div>
            <!-- <div class="error-message"></div> -->
          </form>
        </div>
      </div>
    </div>
  </section>
  <script>
    const images = [
      '../assets/img/hero-bg1.jpg',
      '../assets/img/hero-bg2.jpg',
      '../assets/img/hero-bg3.jpg'
    ];

    let currentImageIndex = 0;

    function changeHeroImage() {
      const heroImg = document.getElementById('hero-img');
      heroImg.style.opacity = 0;
      setTimeout(() => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        heroImg.src = images[currentImageIndex];
        heroImg.style.opacity = 1;
      }, 600);
    }

    // Change the image every 5 secods
    setInterval(changeHeroImage, 5000);
  </script><!-- Hero Section -->

  <!-- Recent Posts Section -->
  <section id="recent-posts" class="recent-posts section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Recent Posts</h2>
      <p>Discover Your Perfect Rental Home with Our Curated Selection of Recent Posts Tailored to Suit Your Style, Needs, and Budget!</p>
      <a class="my-3 float-end" href="./allProperties.php?page=1">All<i class="bi bi-chevron-double-right"></i></a>
    </div><!-- End Section Title -->

    <div class="container">
      <div class="row mx-auto">
        <?php
          require_once "../../database/recentPost.php";
          $property = getRecentPost();
        ?>
        <?php if ($property){ ?>
          <?php while ($row = $property->fetch_assoc()){ $images=getPropertyImg($row['pid']); ?>
            <div class="col-xl-3 col-md-6 p-3" data-aos="fade-up" data-aos-delay="100">
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
          <?php } ?>
        <?php }else{ ?>
          <p>No recent posts found.</p>
        <?php } ?>
      </div>
    </div>

  </section><!-- /Recent Posts Section -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Support</h2>
      <p>Contact Us for Queries, Property Details, or Assistance with Your Ideal House Rental</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-item" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>Silicon Hills, BBSR</p>
                <p>India, 751024</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>+91 12345 06789</p>
                <p>+91 45126 46720</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>info@urbannest.com</p>
                <p>contact@urbannest.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>Monday - Friday</p>
                <p>10:00AM - 06:00PM</p>
              </div>
            </div><!-- End Info Item -->

          </div>

        </div>

        <div class="col-lg-6">
          <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200" id="contactForm">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" id="username" placeholder="Your Name" >
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" id="useremail" placeholder="Your Email" >
              </div>

              <div class="col-12">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" >
              </div>

              <div class="col-12">
                <textarea class="form-control" name="message" rows="6" id="message" placeholder="Message" ></textarea>
              </div>

              <div class="col-12 text-center">
                <input type="submit" value="Send Message" class="btn custom-btn">
              </div>
              <div id="toastContainer"></div>
            </div>
          </form>
        </div><!-- End Contact Form -->
      </div>
    </div>

  </section><!-- /Contact Section -->

</main>

<!-- Footer -->
<?php require_once "footer.php"?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<!-- <div id="preloader"></div> -->
<!-- <script src="../assets/vendor/bootstrap/bootstrap.bundle.min.js"></scrip>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/glightbox/glightbox.min.js"></script>
<script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../js/main.js"></script> -->
