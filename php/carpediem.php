<?php
session_start(); // Start the session (if not already started)

// Check if the user is logged in
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    $welcome_message = "Welcome, $user_name";
    
    // Logout button logic
    if (isset($_POST['logout'])) {
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
        header('Location: login.php'); // Redirect to the login page after logging out
        exit();
    }
} else {
    $welcome_message = "Welcome to BEAST";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BEAST</title>
    <!-- Link your external CSS files here -->
    <link rel="stylesheet" href="../css/carpediem.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/try2.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/try.css" />

    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Josefin+Sans:ital,wght@1,200&family=Roboto+Mono:wght@300&family=Sofia+Sans:wght@1&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/54099d0a-024f-486f-82ad-d6d7de207e2c/webchat/config.js" defer></script>
</head>
<body>
  <div class="preloader" id="preloader"></div>
    <header class="header" id="header">
        <div class="left">
            <img src="../pics/BEAST(1).png" alt="">
        </div>
        <div class="mid">
            <ul class="navbar">
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="../ConnectU/index.php">B.net</a></li>
                <li><a href="../html/mem.html">Mem</a></li>
            </ul>
        </div>
        
        <div class="right">
        <?php echo $welcome_message; ?>
        
        <?php if (isset($_SESSION['user_name'])) { ?>
            <form method="post" action="">
                <a href="logout.php" class="btn">logout</a>
            </form>
        <?php } else { ?>
            <a href="login.php" class="btn">Login</a>
        <?php } ?>
    </div>
    </header>
    <div class="rev">
      <p>LET'S <br> REVOLUTIONIZE <br>FITNESS</p>
    </div>
    
        <div class="content" data-aos="fade-right">
            <img src="../pics/wallpaperflare.com_wallpaper 2.jpg" alt="">
            <div class="text-box reveal" id="about">
                <h2>About Us</h2>
                <br>
                <br>
                <br>
                <br>
                <p>BEAST envisions a future where fitness is inclusive, accessible, and personalized. By offering free customized workout plans, affordable fitness apparel, premium subscription options, top-quality supplements, and dietary guidance, BEAST empowers individuals to seize the day and embark on their fitness journeys with enthusiasm and confidence. As a company dedicated to promoting healthier lifestyles, BEAST is poised to revolutionize the fitness industry, making wellness attainable for all. Embrace the opportunity to BEAST, and unlock your full potential on the path to a healthier, happier you.</p>
            </div>
            
        </div>


        <div class="services" data-aos="fade-right">

          <div class="service" id="service"><p>SERVICE'S BY BEAST</p></div>
          <div class="upper">

            <div class="left1">
              <a href="../html/shop.html">
              <img src="../pics/Black Minimalist Sportswear Instagram Post.jpg" alt="">
            </a>
            </div>
            <div class="right1">
              <a href="../html/diet.html">
              <img src="../pics/Black Modern Diet Tips Pinterest Pin.jpg" alt="">
            </a>
            </div>
          </div>
          <div class="bottom">
            <div class="left2">
              <a href="#">
              <img src="../pics/open2.jpg" alt="">
            </a>
            </div>
            <div class="right2">
              <a href="../html/workout.html">
              <img src="../pics/Black Green Esport Match Day Instagram Story.jpg" alt="">
            </a>
            </div>
          </div>
        </div>







        <div class="custrev" data-aos="fade-right">
          <p>CUSTOMER REVIEW</p>
        </div>
        <section class="containeer" >
            <div class="testimonial mySwiper" data-aos="fade-in">
              
              <div class="testi-content swiper-wrapper">
                <div class="slide swiper-slide">
                  <img src="../pics/dhoni.jpg" alt="" class="image" />
                  <p>
                      "BEAST delivers exceptional fitness results with expert guidance."
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">MS DHONI</span>
                    <span class="job">CRICKETER</span>
                  </div>
                </div>
                <div class="slide swiper-slide">
                  <img src="../pics/kohli psprt.jpg" alt="" class="image" />
                  <p>
                    "BEAST's personal training delivers impressive results with tailored workouts and skilled trainers."
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">VIRAT KOHLI</span>
                    <span class="job">CRICKETER</span>
                  </div>
                </div>
                <div class="slide swiper-slide">
                  <img src="../pics/ronaldo.jpg" alt="" class="image" />
                  <p>
                    "BEAST's inclusive vibe is a breath of fresh air. Friendly staff and members create a comfortable fitness haven."
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">RONALDO</span>
                    <span class="job">FOOTBALLER</span>
                  </div>
                </div>
                <div class="slide swiper-slide">
                  <img src="../pics/messi.jpg" alt="" class="image" />
                  <p>
                    "BEAST Fitness: Where sweat meets fun! The variety of classes keeps workouts exciting and effective."
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">MESSI</span>
                    <span class="job">FOOTBALLER</span>
                  </div>
                </div>
                <div class="slide swiper-slide">
                  <img src="../pics/tiger psprt.jpg" alt="" class="image" />
                  <p>
                    "BEAST's personal trainers are fitness wizards. Results exceeded my expectations. Money well spent!"
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">TIGER</span>
                    <span class="job">ACTOR</span>
                  </div>
                </div>
                <div class="slide swiper-slide">
                  <img src="../pics/hritik.jpg" alt="" class="image" />
                  <p>
                    "BEAST's friendly atmosphere boosts confidence. A gym where everyone feels welcome and supported."
                  </p>
      
                  <i class="bx bxs-quote-alt-left quote-icon"></i>
      
                  <div class="details">
                    <span class="name">HRITIK</span>
                    <span class="job">ACTOR</span>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next nav-btn"></div>
              <div class="swiper-button-prev nav-btn"></div>
              <div class="swiper-pagination"></div>
            </div>
          </section>
      
          <!-- Swiper JS -->
          <script src="../js/try2.js"></script>
          <!-- JavaScript -->
          <script src="../js/try.js"></script>
    
    
   <div class="createdby" data-aos="fade-right"><p><h1><center>CREATED BY</center></h1></p></div>
    <div class="container" data-aos="fade-right">
        
        <div class="card1" id="card1" data-tilt>
            <img src="../pics/IMG_6804.jpg" alt="">
            <h2>ARYAN SATYAM</h2>  
            <div class="link">
                <a href="https://www.instagram.com/aaryan.satyam/"><img src="pngwing.com.png" alt=""></a>
                <a href="https://www.linkedin.com/in/aryan-satyam-7888b21b5/?original_referer=https%3A%2F%2Fwww%2Egoogle%2Ecom%2F&originalSubdomain=in"><img src="pngwing.com(1).png" alt=""></a>
            </div>   
            <a href="#" class="btn">message me</a> 
        </div>
         
    </div>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>




    





    <footer>
        <div class="footer-content">
            <h3>BEAST</h3>
            <p>BEAST: Elevate Your Play. From inspiring apparel to tailored fitness programs, we empower you to conquer every moment, one rep at a time.</p>
            <div class="contact">
                Contact phone-number: +91 8789950364
            </div>
            <div class="footer-bottom">
                <p>Copyright &copy; 2021 BEAST. Designed by <span>BEAST</span></p>
            </div>
          </div>
    </footer>


    <script>
      var loader = document.getElementById("preloader");
    
      // Add a delay of 1.5 seconds (1500 milliseconds) before hiding the preloader
      setTimeout(function () {
        loader.style.display = "none";
      }, 1500);
    </script>

    <script src="../js/tilt.js"></script>

    
    

    
  
</body>
</html>
