<?php 
session_start();
include("../db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{

$gmail = $_POST['email'];
$password = $_POST['password'];

if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
{
   $query = "select * from users where email = '$gmail' limit 1";
   $result = mysqli_query($conn, $query);

   if($result)
   {
   if($result && mysqli_num_rows($result) > 0)
   {
      $user_data = mysqli_fetch_assoc($result);

      if($user_data['password'] == $password)
      {
         header("Location: ../admin/dashboard.php");
         die;
      }
   }
   }
   echo"<script type='text/javascript'> alter('Successfully Register')</script>";
}
else echo "<script>alert('Error : Please fill all fields and use a valid email address');</script>";
}
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
<link rel="stylesheet" href="../css/styles.css" />
<link rel="stylesheet" href="../css/media.css" />
</head>

<body>
<header>
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
            <a href="#"><img src="../images/logo.png" alt="" height="100px" width="115px"></a>
          </div>
          <div class="nav-links">
            <a href="http://localhost/ecommerce/index.php"><i class='bx bx-home'></i> Home</a>
            <a href="http://localhost/ecommerce/shop.php">Shop</a>
            <a href="http://localhost/ecommerce/about.php">About</a>
            <div class="dropdown">
              <a href="#">Categories</a>
              <div class="dropdown-content">
                <a href="#">E-liquides</a>
                <a href="#">Puffs</a>
                <a href="#">Diy</a>
                <a href="#">Accessoires</a>
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
        </style>
    

    <form class="form" method="POST">
        <p class="title">Register </p>
        <p class="message">Signup now and get full access to our app. </p> 
                
        <label>
            <input type="email" name="email" id="" placeholder="yourmail@gmail.com"  class="input" required>
            <span>Email</span>
        </label> 
            
        <label>
            <input type="password" name="password" id="" placeholder="password"  class="input" required>
            <span>Password</span>
        </label>
        <input type="submit" value="Se connecter" class="submit">
        <p class="signin">Already have an acount ? <a href="#">Signin</a> </p>
    </form>
    
    <style>
      .form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 350px;
        padding: 20px;
        border-radius: 20px;
        position: relative;
        right: -33%;
        top: 100px;
        
      }
      
      .title {
        font-size: 28px;
        color: #fff;
        font-weight: 600;
        letter-spacing: -1px;
        position: relative;
        display: flex;
        align-items: center;
        padding-left: 30px;
      }
      
      .title::before,.title::after {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        border-radius: 50%;
        left: 0px;
        background-color: #f7d33d;
      }
      
      .title::before {
        width: 18px;
        height: 18px;
        background-color: #f7d33d;
      }
      
      .title::after {
        width: 18px;
        height: 18px;
        animation: pulse 1s linear infinite;
      }
      
      .message, .signin {
        color:#fff;
        font-size: 14px;
      }
      
      .signin {
        text-align: center;
      }
      
      .signin a {
        color: #f7d33d;
      }
      
      .signin a:hover {
        text-decoration: underline #f7d33d;
      }
      
      .flex {
        display: flex;
        width: 100%;
        gap: 6px;
      }
      
      .form label {
        position: relative;
      }
      
      .form label .input {
        width: 100%;
        padding: 10px 10px 20px 10px;
        outline: 0;
        border: 1px solid rgba(105, 105, 105, 0.397);
        border-radius: 10px;
         background-color:#ADADAD;
      }
      
      .form label .input + span {
        position: absolute;
        left: 10px;
        top: 15px;
        color: grey;
        font-size: 0.9em;
        cursor: text;
        transition: 0.3s ease;
      }
      
      .form label .input:placeholder-shown + span {
        top: 15px;
        font-size: 0.9em;
      }
      
      .form label .input:focus + span,.form label .input:valid + span {
        top: 30px;
        font-size: 0.7em;
        font-weight: 600;
      }
      
      .form label .input:valid + span {
        color: green;
      }
      
      .submit {
        border: none;
        outline: none;
        background-color: #3f553f;
        padding: 10px;
        border-radius: 10px;
        color: #fff;
        font-size: 16px;
        transform: .3s ease;
      }
      
      .submit:hover {
        background-color: #f7d33d;
      }
      
      @keyframes pulse {
        from {
          transform: scale(0.9);
          opacity: 1;
        }
      
        to {
          transform: scale(1.8);
          opacity: 0;
        }
      }
      </style>
      </div>
    </header>
</body>

</html>