<?php include 'db.php';

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vape Store</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/media.css" />
</head>



<body>
  <!-- Home Page -->
  <header class="header  overflow-hidden" style="height:180vh;">
    <div class="container position-relative">
      <div class="topbar mt-4 mb-1 px-3 py-1">
        <div class="location">
          <i class="fas fa-map-marker"></i>
          Rue catacombes cite zahra, Sousse, Tunisia
        </div>
        <div class="tel">
          <i class="fas fa-phone"></i>
          (+216) 95 004 441
        </div>
        <div class="opening">
          <i class="far fa-clock"></i>
          ouvert : Mon-Fri 08:00 - 17:00
        </div>
      </div>
      <!-- Navbar -->

      <body>
        <nav class="navbar">
          <div class="logo">
            <a href="http://localhost/ecommerce/index.php"><img src="images/logo.png" alt="" height="100px"></a>
          </div>
          <div class="menu-toggle" id="mobile-menu"><i class='bx bx-menu'></i></div>
          <div class="nav-links">
            <a href="http://localhost/ecommerce/index.php"><i class='bx bx-home'></i> Home</a>
            <a href="http://localhost/ecommerce/shop.php">Shop</a>
            <div class="dropdown">
              <a href="#">Categories</a>
              <div class="dropdown-content">
                <?php
                foreach ($categories as $category): ?>
                  <a href="#"><?php echo htmlspecialchars($category['name']); ?></a>
                <?php endforeach; ?>
              </div>
            </div>
            <a href="http://localhost/ecommerce/contact.php">Contact</a>
          </div>
          <div class="auth-buttons">
            <a href="http://localhost/ecommerce/auth/login.php"><i class='bx bx-log-in-circle'
                style='color:#ffffff'></i> Login</a>
            <a href="http://localhost/ecommerce/auth/register.php"><i class='bx bx-user-plus' style='color:#ffffff'></i>
              Signup</a>
          </div>
        </nav>

        <script>
          const mobileMenu = document.getElementById('mobile-menu');
          const navbar = document.querySelector('.navbar');

          mobileMenu.addEventListener('click', () => {
            navbar.classList.toggle('active');
          });
        </script>
        <style>
          .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
          }

          .navbar a:hover {
            color: yellow;
          }

          .nav-links,
          .auth-buttons {
            display: flex;
            align-items: center;
          }

          .dropdown {
            position: relative;
          }

          .dropdown-content {
            display: none;
            position: absolute;
            background-color: transparent;
            min-width: 160px;
           
            z-index: 1;
          }

          .dropdown-content a {
            padding: 12px 16px;
            display: block;
          }

          .dropdown:hover .dropdown-content {
            display: block;
          }

          .auth-buttons a {
            padding: 10px 20px;
            border-radius: 4px;
            margin-left: 10px;
          }

          .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
          }

          @media (max-width: 768px) {

            .nav-links,
            .auth-buttons {
              flex-direction: column;
              width: 100%;
              display: none;
            }

            .nav-links a,
            .auth-buttons a {
              text-align: center;
              padding: 10px;
              width: 100%;
            }

            .navbar {
              flex-direction: column;
              align-items: flex-start;
            }

            .menu-toggle {
              display: block;
              color: white;
            }

            .navbar.active .nav-links,
            .navbar.active .auth-buttons {
              display: flex;
            }
          }

          .searchBox {
            display: flex;
            width: 530px;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            background: #ADADAD;
            border-radius: 50px;
            position: relative;
          }

          .searchButton {
            color: white;
            position: absolute;
            right: 8px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-2, linear-gradient(90deg, #2AF598 0%, #009EFD 100%));
            border: 0;
            display: inline-block;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
          }

          /*hover effect*/
          button:hover {
            color: #fff;
            background-color: #1A1A1A;
            box-shadow: rgba(0, 0, 0, 0.5) 0 10px 20px;
            transform: translateY(-3px);
          }

          /*button pressing effect*/
          button:active {
            box-shadow: none;
            transform: translateY(0);
          }

          .searchInput {
            border: none;
            background: none;
            outline: none;
            color: white;
            font-size: 15px;
            padding: 24px 46px 24px 26px;
          }
        </style>

        <div class="intro">
          <div class="searchBox">
            <input class="searchInput" type="text" name="" placeholder="Search something">
            <button class="searchButton" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
                <g clip-path="url(#clip0_2_17)">
                  <g filter="url(#filter0_d_2_17)">
                    <path
                      d="M23.7953 23.9182L19.0585 19.1814M19.0585 19.1814C19.8188 18.4211 20.4219 17.5185 20.8333 16.5251C21.2448 15.5318 21.4566 14.4671 21.4566 13.3919C21.4566 12.3167 21.2448 11.252 20.8333 10.2587C20.4219 9.2653 19.8188 8.36271 19.0585 7.60242C18.2982 6.84214 17.3956 6.23905 16.4022 5.82759C15.4089 5.41612 14.3442 5.20435 13.269 5.20435C12.1938 5.20435 11.1291 5.41612 10.1358 5.82759C9.1424 6.23905 8.23981 6.84214 7.47953 7.60242C5.94407 9.13789 5.08145 11.2204 5.08145 13.3919C5.08145 15.5634 5.94407 17.6459 7.47953 19.1814C9.01499 20.7168 11.0975 21.5794 13.269 21.5794C15.4405 21.5794 17.523 20.7168 19.0585 19.1814Z"
                      stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
                      shape-rendering="crispEdges"></path>
                  </g>
                </g>
                <defs>
                  <filter id="filter0_d_2_17" x="-0.418549" y="3.70435" width="29.7139" height="29.7139"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                      result="hardAlpha"></feColorMatrix>
                    <feOffset dy="4"></feOffset>
                    <feGaussianBlur stdDeviation="2"></feGaussianBlur>
                    <feComposite in2="hardAlpha" operator="out"></feComposite>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_17"></feBlend>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_17" result="shape"></feBlend>
                  </filter>
                  <clipPath id="clip0_2_17">
                    <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)"></rect>
                  </clipPath>
                </defs>
              </svg>
            </button>
          </div>




          <div class="intro-text">
            <h1 class="text-uppercase mt-5 mb-3" data-aos="fade-up" data-aos-duration="2000">
              the best vape store
            </h1>

            <div class="btns mt-5 text-center d-flex justify-content-evenly">


            </div>
          </div>
        </div>
    </div>
  </header>
  <!-- Statistics -->
  <div class="menu mb-5">
    <div class="statistics mb-5">
      <div class="container raduis-10">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-8 mx-auto">
            <div class="counter">
              <span id="count1" class="display-3"></span>
              <sup>+</sup>
              <br />
              Vapesters
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-8 mx-auto">
            <div class="counter">
              <span id="count2" class="display-3"></span>
              <sup>+</sup>
              <br />
              Happy Customers
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-8 mx-auto">
            <div class="counter">
              <span id="count3" class="display-3"></span>
              <sup>+</sup>
              Pre-Made Flavors
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-8 mx-auto">
            <div class="counter counter-4">
              <span id="count4" class="display-3"></span>
              <sup>+</sup>
              Gift Collections
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- WHO WE ARE -->
    <div class="who-we-are">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-12">
            <div class="who-content">
              <h3 class="subtitle text-uppercase"> NOUS SOMMES QUI !</h3>
              <h2 class="main-title display-4 mb-5">
                Nous sommes la meilleure boutique de cigarettes électroniques en ville.
              </h2>


              <div class="follow-us mb-5">
                <h4>Contactez Nous :</h4>
                <div class="social d-flex justify-content-between w-50">
                  <a href="https://www.facebook.com/people/Jungle-vape-store/100091433521683/" class="icon"><i
                      class="fab fa-facebook"></i></a>

                  <a href="https://www.instagram.com/jungle_vape_store?igshid=MXd1NWR6dW4zc29oMA==" class="icon"><i
                      class="fab fa-instagram"></i></a>


                </div>
              </div>


            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-12 overflow-hidden">
            <div class="who-images d-flex justify-content-between">
              <img src="images/home-image-3.jpg" class="raduis-10 mt-5" alt="" data-aos="fade-left"
                data-aos-duration="2000" />
              <img src="images/home-image-1.jpg" class="raduis-10" alt="" data-aos="fade-left" data-aos-delay="500"
                data-aos-duration="1000" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- The Benfits -->
  <div class="benfits">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h4 class="small-title">THE BENEFITS</h4>
          <h3 class="display-5 mb-5">VAPING VS SMOKING</h3>
        </div>
        <!--  -->
        <div class="col-lg-4 col-12 d-flex justify-content-center">
          <div class="benfit-cards">
            <div class="benfit-card d-flex raduis-10" data-aos="fade-left" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-regular fa-face-smile"></i>
              </div>
              <div class="text">
                <h5>No Bad Smell</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
            <div class="benfit-card d-flex raduis-10" data-aos="fade-left" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-solid fa-wallet"></i>
              </div>
              <div class="text">
                <h5>More Cost Effective</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
            <div class="benfit-card d-flex raduis-10" data-aos="fade-left" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-solid fa-smoking"></i>
              </div>
              <div class="text">
                <h5>Help Quit Smoking</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-lg-4 col-12">
          <div class="vape-shape">
            <div class="shape raduis-10"></div>
            <div class="vape text-center">
              <img src="images/vape.png" alt="" data-aos="fade-up" data-aos-duration="1500" />
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-lg-4 col-12 d-flex justify-content-center">
          <div class="benfit-cards">
            <div class="benfit-card br d-flex raduis-10" data-aos="fade-right" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-solid fa-skull"></i>
              </div>
              <div class="text">
                <h5>Safer than Smoking</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
            <div class="benfit-card br d-flex raduis-10" data-aos="fade-right" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-solid fa-user-group"></i>
              </div>
              <div class="text">
                <h5>Harmless to Around</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
            <div class="benfit-card br d-flex raduis-10" data-aos="fade-right" data-aos-duration="1500"
              data-aos-delay="500">
              <div class="icon">
                <i class="fa-solid fa-kit-medical"></i>
              </div>
              <div class="text">
                <h5>Better For Your Health</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Categories -->
  <div class="categories">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h4 class="text-uppercase small-title">Categories</h4>
          <h3 class="display-5 mb-5">PRODUCT SELECTION</h3>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
          <a href="http://localhost/ecommerce/shop.php" class="btn btn-light text-uppercase px-4 py-2">more products</a>
        </div>

        <div class="col-8 col-md-6 col-lg-4 p-0 mx-auto">
          <div class="ctegory-text" data-aos="fade-right" data-aos-duration="1000">
            <div class="content">
              <h4 class="mb-4">E-JUICES</h4>
              <p class="mb-4">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed,
                earum.
              </p>
              <a href="#" class="btn text-uppercase text-light">Explore <i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-8 col-md-6 col-lg-4 p-0 mx-auto">
          <div class="category-image">
            <img src="images/Capture.PNG" alt="" />
          </div>
        </div>
        <div class="col-8 col-md-6 col-lg-4 p-0 mx-auto">
          <div class="ctegory-text" data-aos="fade-right" data-aos-duration="1000">
            <div class="content">
              <h4>DEVICES</h4>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed,
                earum.
              </p>
              <a href="#" class="btn text-uppercase text-light">Explore <i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-8 col-md-6 col-lg-4 p-0 d-flex mx-auto">
          <div class="category-image">
            <img src="images/devices.PNG" alt="" />
          </div>
        </div>
        <div class="col-8 col-md-6 col-lg-4 p-0 mx-auto">
          <div class="ctegory-text" data-aos="fade-right" data-aos-duration="1000">
            <div class="content">
              <h4>ACCESSORIES</h4>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sed,
                earum.
              </p>
              <a href="#" class="btn text-uppercase text-light">Explore <i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-8 col-md-6 col-lg-4 p-0 mx-auto">
          <div class="category-image">
            <img src="images/accesories.PNG" alt="" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Why Us -->
  <div class="why-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="why-content">
            <h4 class="text-uppercase small-title">WHY CHOOSE US</h4>
            <h3 class="display-5 mb-5">WHY CHOOSE OUR PRODUCTS</h3>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi
              reiciendis velit asperiores inventore porro expedita commodi
              delectus cum dolores, temporibus magni voluptates officiis
              deserunt adipisci repudiandae suscipit quaerat voluptate natus.
            </p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <div class="features">
            <div class="feature">
              <div class="feature-name">
                <h5>BATTERY LIFE</h5>
                <h5>90%</h5>
              </div>
              <div class="progress">
                <div data-aos="fade-right" data-aos-duration="1000" class="progress-bar bg-primary" role="progressbar"
                  style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="feature">
              <div class="feature-name">
                <h5>FIRING BUTTON</h5>
                <h5>75%</h5>
              </div>
              <div class="progress">
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300" class="progress-bar bg-primary"
                  role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="feature">
              <div class="feature-name">
                <h5>SAFETY FEATURES</h5>
                <h5>92%</h5>
              </div>
              <div class="progress">
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300" class="progress-bar bg-primary"
                  role="progressbar" style="width: 92%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="feature">
              <div class="feature-name">
                <h5>AIR FLOW CONTROL</h5>
                <h5>86%</h5>
              </div>
              <div class="progress">
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300" class="progress-bar bg-primary"
                  role="progressbar" style="width: 86%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Our best Service -->
  <div class="our-service">
    <div class="container">
      <div class="row position-relative">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="our-service-img">
            <img src="images/img.jpg" alt="" class="service-img" />
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <div class="our-services-content">
            <h4 class="text-uppercase small-title">OUR BEST SERVICE</h4>
            <h3 class="display-5 mb-5">PROVIDE THE BEST VAPE SERVICE</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
              quo veniam quam pariatur omnis qui distinctio, necessitatibus
              similique? Quo reprehenderit necessitatibus vel! Dolorum
              incidunt exercitationem ut eligendi expedita quae molestiae!
            </p>
            <a href="#" class="btn m-btn py-2 px-4">learn more<i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="qualities raduis-10 p-5" data-aos="fade-up" data-aos-duration="1000">
          <div class="left">
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Best vape store</p>
            </div>
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Friendly services</p>
            </div>
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Friendly services</p>
            </div>
          </div>
          <div class="right">
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Good Prices</p>
            </div>
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Best product quality</p>
            </div>
            <div class="mb-4">
              <i class="fas fa-check"></i>
              <p>Many choices of liquids</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Testemonials -->
  <div class="testimonials">
    <div class="container overflow-hidden">
      <div class="row">
        <div class="col-10 text-center mb-5 mx-auto">
          <h4 class="small-title">TESTIMONIAL</h4>
          <h3 class="display-6 mb-5">WHAT OUR CUSTOMERS SAY</h3>
        </div>
        <div class="col-lg-6 col-md-6 col-12 position-relative">
          <i class="fas fa-quote-left"></i>
          <div class="rating-header mb-3">
            <div class="rating-text d-inline">Best Product Ever!</div>
            <div class="rating d-inline">
              <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
            </div>
          </div>
          <div class="rating-body">
            <p class="text lead">
              "I will recommend you to my colleagues. Buy this now. Thanks to
              vape, we've just launched our 5th website! I will recommend you
              to my colleagues."
            </p>
            <div class="rating-person d-flex">
              <div class="person-img">
                <img src="images/custumer1.jpg" alt="" />
              </div>
              <div class="name">
                <h6>CLARINE MAROSHKA</h6>
                <p>Customer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 position-relative">
          <i class="fas fa-quote-left"></i>
          <div class="rating-header mb-3">
            <div class="rating-text d-inline">It's Amazing Product!</div>
            <div class="rating d-inline">
              <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
              <i class="fas fa-star text-warning"></i>
            </div>
          </div>
          <div class="rating-body">
            <p class="text lead">
              "Vape did exactly what you said it does. Vape is worth much more
              than I paid. If you want real marketing that works and effective
              implementation."
            </p>
            <div class="rating-person d-flex">
              <div class="person-img">
                <img src="images/custumer2.jpg" alt="" />
              </div>
              <div class="name">
                <h6>MICHAEL DEAN</h6>
                <p>Customer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
    </div>
  </div>

  <!-- Partners -->
  <div class="partners">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <div class="headline raduis-10">
            <h4>TRUSTED BY OUR PARTNERS</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center">
          <img src="images/logo-1d.png" alt="" data-aos="fade-up" data-aos-duration="1000" />
        </div>
        <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center">
          <img src="images/logo-2.png" alt="" data-aos="fade-down" data-aos-duration="1000" />
        </div>
        <div class="col-lg-3 col-md-6 col-12 d-flex justify-content-center">
          <img src="images/logo-4.png" alt="" data-aos="fade-up" data-aos-duration="1000" />
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12">
          <a href="http://localhost/ecommerce/index.php"> <img src="images/logo.png" alt=""
              class="logo w-75 mb-3 overflow-hidden" /></a>
        </div>

        <div class="col-lg-3 col-md-6 col-12 text-center d-flex justify-content-center">
          <div class="quick-links">
            <h5 class="text-uppercase">quick links</h5>
            <ul>
              <li>
                <a href="http://localhost/ecommerce/index.php" class="nav-link text-uppercase mb-3">Home</a>
              </li>
              <li>
                <a href="http://localhost/ecommerce/about.php" class="nav-link text-uppercase mb-3">About</a>
              </li>
              <li>
                <a href="http://localhost/ecommerce/shop.php" class="nav-link text-uppercase mb-3">Shop</a>
              </li>
              <li>
                <a href="http://localhost/ecommerce/contact.php" class="nav-link text-uppercase mb-3">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 text-center d-flex justify-content-center">
          <div class="follow-us">
            <ul class="nav">
              <li>
                <i class="fab fa-facebook"></i>
                <a href="#" class="nav-link text-uppercase mb-3">facebook</a>
              </li>
              <li>
                <i class="fab fa-instagram"></i>
                <a href="#" class="nav-link text-uppercase mb-3">Instagram</a>
              </li>
              <li>
                <i class="fab fab fa-twitter"></i>
                <a href="#" class="nav-link text-uppercase mb-3">twitter</a>
              </li>
            </ul>
          </div>
        </div>
        <hr />
        <div class="col-12">
          <div class="all-right my-3 text-center">
            <p>© 2023 Vapiox All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>