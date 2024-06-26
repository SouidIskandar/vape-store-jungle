<?php include ("db.php");


$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
$categories = $result->fetch_all(MYSQLI_ASSOC);




$search = '';
if (isset($_GET) && $_GET && $_GET['search']) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM `products` WHERE `name` LIKE '%" . $_GET['search'] . "%' or `description	` LIKE '%" . $_GET['search'] . "%';";
} else {
  $sql = "SELECT * FROM `products`";
}

$result = $conn->query($sql);
$conn->close();
?>

<?php
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
</head>
<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<!-- CSS Files -->
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/media.css" />
<style>
  .header {
    width: 100%;
    height: 300vh;
    position: relative;
    background: linear-gradient(120deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)),
      url("images/green-smooth-textured-paper.jpg") no-repeat;
    background-size: cover;
    background-position: top;
  }
</style>
</head>

<body>
  <!-- Home Page -->
  <header class="header overflow-hidden">
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
      <nav class="navbar">
        <div class="logo">
          <a href="#"><img src="images/logo.png" alt="" height="100px" width="115px"></a>
        </div>
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
          <a href="http://localhost/ecommerce/auth/login.php"><i class='bx bx-log-in-circle' style='color:#ffffff'></i>
            Login</a>
          <a href="http://localhost/ecommerce/cart/pannier.php"><i class='bx bxs-shopping-bag'></i></i>
            Shop</a>
        </div>
      </nav>
      <style>
        .navbar {
          display: flex;
          align-items: center;
          justify-content: space-between;

          padding: 10px 20px;
        }

        .navbar a {
          color: white;
          text-decoration: none;
          padding: 14px 20px;
        }

        .navbar a:hover {

          color: yellow;
        }

        .nav-links {
          display: flex;
          align-items: center;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          min-width: 160px;
          z-index: 1;
        }

        .dropdown-content a {
          color: white;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {
          color: yellow;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }

        .auth-buttons a {
          padding: 10px 20px;
          border-radius: 4px;
          margin-left: 10px;
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
          right: -360px;
          top: -15px;
        }

        .searchButton {
          color: white;
          position: absolute;
          right: 8px;
          width: 50px;
          height: 50px;
          border-radius: 50%;
          background: var(--gradient-2, linear-gradient(90deg, #cd3858 0%, #dc3545 100%));
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
      <br><br><br><br><br><br><br><br><br>
      <!-- Products -->
      <div class="our-products">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center mb-5">
              <h4 class="text-uppercase small-title">BEST PRODUCTS</h4>
              <h3 class="display-5 mb-5">PRODUCTS SELECTION</h3>

              <div class="searchBox">
                <input class="searchInput" type="text" name="search" placeholder="Search something"
                  value="<?= $search ?>">
                <input type="submit" class="searchButton" />
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
                      <rect width="28.0702" height="28.0702" fill="white" transform="translate(0.403503 0.526367)">
                      </rect>
                    </clipPath>
                  </defs>
                </svg>

              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-6 col-12 mb-5">
                  <div class="product-card text-center">
                    <div class="product-image">
                      <img src="<?= $row["image"] ?>" class="w-75" alt="" />
                    </div>
                    <div class="product-name my-5">
                      <h3><?= $row["name"] ?></h3>
                      <p><?= $row["description"] ?></p>
                      <h4 class="price"><?= number_format($row["price"], 2) ?> DT</h4>
                    </div>
                    <form action="add_to_cart.php" method="post">
                      <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                      <input type="hidden" name="quantity" value="1">
                      <button type="submit" class="btn btn-success">Add to Cart</button>
                    </form>
                  </div>
                </div>
              <?php }
            } else {
              echo "0 results";
            }
            ?>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="footer overflow-hidden">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <img src="images/logo.png" alt="" class="logo w-75 mb-3 overflow-hidden" />
            </div>
            <div class="col-lg-3 col-md-6 col-12 text-center d-flex justify-content-center">
              <p class="lead">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                accusantium cum eveniet vel illo ab earum voluptatem ipsa numquam
                nam.
              </p>
            </div>
            <div class="col-lg-3 col-md-6 col-12 text-center d-flex justify-content-center">
              <div class="quick-links">
                <h5 class="text-uppercase">quick links</h5>
                <ul>
                  <li>
                    <a href="#" class="nav-link text-uppercase mb-3">Home</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-uppercase mb-3">About us</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-uppercase mb-3">products</a>
                  </li>
                  <li>
                    <a href="#" class="nav-link text-uppercase mb-3">services</a>
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