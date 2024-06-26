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
    <header class="header  overflow-hidden" style="height:210vh;">
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
                        <a href="http://localhost/ecommerce/index.php"><img src="images/logo.png" alt=""
                                height="100px"></a>
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
                        <a href="http://localhost/ecommerce/auth/register.php"><i class='bx bx-user-plus'
                                style='color:#ffffff'></i> Signup</a>
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
                        background-color:transparent;
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

                    .contact-bg {
                        height: 40vh;
                        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(image/contact-bg.jpg);
                        background-position: 50% 100%;
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        text-align: center;
                        color: #fff;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                    }

                    .contact-bg h3 {
                        font-size: 1.3rem;
                        font-weight: 400;
                    }

                    .contact-bg h2 {
                        font-size: 3rem;
                        text-transform: uppercase;
                        padding: 0.4rem 0;
                        letter-spacing: 4px;
                    }

                    .line div {
                        margin: 0 0.2rem;
                    }

                    .line div:nth-child(1),
                    .line div:nth-child(3) {
                        height: 3px;
                        width: 70px;
                        background: #d8385a;
                        border-radius: 5px;
                    }

                    .line {
                        display: flex;
                        align-items: center;
                    }

                    .line div:nth-child(2) {
                        width: 10px;
                        height: 10px;
                        background: #d8385a;
                        border-radius: 50%;
                    }

                    .text {
                        font-weight: 300;
                        opacity: 0.9;
                    }

                    .contact-bg .text {
                        margin: 1.6rem 0;
                    }

                    .contact-body {
                        max-width: 1320px;
                        margin: 0 auto;
                        padding: 0 1rem;
                    }

                    .contact-info {
                        margin: 2rem 0;
                        text-align: center;
                        padding: 2rem 0;
                    }

                    .contact-info span {
                        display: block;
                    }

                    .contact-info div {
                        margin: 0.8rem 0;
                        padding: 1rem;
                    }

                    .contact-info span .fas {
                        font-size: 2rem;
                        padding-bottom: 0.9rem;
                        color: #d8385a;
                    }

                    .contact-info div span:nth-child(2) {
                        font-weight: 500;
                        font-size: 1.1rem;
                    }

                    .contact-info .text {
                        padding-top: 0.4rem;
                    }



                    .contact-footer {
                        padding: 2rem 0;
                        background: #000;
                    }

                    .contact-footer h3 {
                        font-size: 1.3rem;
                        color: #fff;
                        margin-bottom: 1rem;
                        text-align: center;
                    }

                    .social-links {
                        display: flex;
                        justify-content: center;
                    }

                    .social-links a {
                        text-decoration: none;
                        width: 40px;
                        height: 40px;
                        color: #fff;
                        border: 2px solid #fff;
                        border-radius: 50%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin: 0.4rem;
                        transition: all 0.4s ease;
                    }

                    .social-links a:hover {
                        color: #f7327a;
                        border-color: #f7327a;
                    }

                    @media screen and (min-width: 768px) {
                        .contact-bg .text {
                            width: 70%;
                            margin-left: auto;
                            margin-right: auto;
                        }

                        .contact-info {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                        }
                    }

                    @media screen and (min-width: 992px) {
                        .contact-bg .text {
                            width: 50%;
                        }

                        .contact-form {
                            display: grid;
                            grid-template-columns: repeat(2, 1fr);
                            align-items: center;
                        }
                    }

                    @media screen and (min-width: 1200px) {
                        .contact-info {
                            grid-template-columns: repeat(4, 1fr);
                        }
                    }
                </style>
                <br><br><br><br><br><br>
                <div class="contact-section">
                    <div class="contact-bg">
                        <h3>Get in Touch with Us</h3>
                        <h2>contact us</h2>
                        <div class="line">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <p class="text">Welcome To Our Store</p>
                    </div>


                    <div class="contact-body">
                        <div class="contact-info">
                            <div>
                                <span><i class="fas fa-mobile-alt"></i></span>
                                <span>Phone</span>
                                <span class="text">(+216)95 004 441</span>
                            </div>
                            <div>
                                <span><i class="fas fa-envelope-open"></i></span>
                                <span>E-mail</span>
                                <span class="text">mail@company.com</span>
                            </div>
                            <div>
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <span>Address</span>
                                <span class="text"> Rue catacombes cite zahra, Sousse, Tunisia</span>
                            </div>
                            <div>
                                <span><i class="fas fa-clock"></i></span>
                                <span>Opening Hours</span>
                                <span class="text"> Ouvert : Mon-Fri 08:00 - 17:00</span>
                            </div>
                        </div>
                    </div>

                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3235.3750305740414!2d10.624772711373014!3d35.81527327242975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1302756f6ff13ba9%3A0xe6a8746e2f6bca44!2sJungle%20vape%20store!5e0!3m2!1sfr!2stn!4v1717002410114!5m2!1sfr!2stn"
                            width="1300" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <br><br><br><br>
                <!-- Footer -->
                <footer class="footer overflow-hidden">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <a href="http://localhost/ecommerce/index.php"><img src="images/logo.png" alt=""
                                        height="100px"></a>

                            </div>

                            <div class="col-lg-3 col-md-6 col-12 text-center d-flex justify-content-center">
                                <div class="quick-links">
                                    <h5 class="text-uppercase">quick links</h5>
                                    <ul>
                                        <li>
                                            <a href="http://localhost/ecommerce/index.php"
                                                class="nav-link text-uppercase mb-3">Home</a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/ecommerce/about.php"
                                                class="nav-link text-uppercase mb-3">About</a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/ecommerce/shop.php"
                                                class="nav-link text-uppercase mb-3">Shop</a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/ecommerce/contact.php"
                                                class="nav-link text-uppercase mb-3">Contact</a>
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