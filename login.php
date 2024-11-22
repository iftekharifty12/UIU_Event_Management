<?php
session_start();

@include 'config.php';

if (isset($_POST['login'])) {
    $s_id_t_id = $_POST['S_ID_T_ID'];
    $password = $_POST['password'];

    // Retrieve the password from the database based on the S_ID_T_ID
    $query = "SELECT Password FROM sign_up WHERE S_ID_T_ID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $s_id_t_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $stored_password);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Check if the entered credentials match admin credentials
    if ($s_id_t_id === 'admin' && $password === 'admin123') {
        // Admin credentials are correct, admin is authenticated
        $_SESSION['user_id'] = 'admin';
        echo "<script>alert('Admin login successful')</script>";
        header("Location: AdminDashboard/adminD.php"); // Redirect to the admin dashboard or desired page
        exit();
    } elseif ($password === $stored_password) {
        // Regular user credentials are correct, user is authenticated
        $_SESSION['user_id'] = $s_id_t_id;
        echo "<script>alert('Login successful')</script>";
        header("Location: UserDashboard/user_dashboard.php"); // Redirect to the user dashboard or desired page
        exit();
    } else {
        echo "<script>alert('Invalid credentials')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="loginStyle.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Roboto:ital,wght@0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <div class="section_1">
    <div class="container-fluid" style="background-color: #f68b1f; height: 160px">
      <div class="logo-container text-center p-3">
        <div class="nav-brand text-center">
          <a href=""><img src="uiu.png" alt="logo" style="height: 80px; width: 80px" /></a>
          <h3 class="pt-3">UIU Event Management</h3>
        </div>
      </div>
    </div>
    <!--login form start-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="row m-5">
        <div class="col-md-6">
            <div class="mb-3 input-box">
              <h3 style="color:#f68b1f;" class="fw-bolder py-3">Login</h3>
              <label for="exampleInputEmail1" class="form-label">S_ID(Stduent)/T_ID(Teacher)</label>
              <input name="S_ID_T_ID" type="id" class="form-control custom-placeholder" placeholder="Example:000 111 222/ AAB" />
            </div>
            <div class="mb-3 input-box">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input name="password" type="password" class="form-control custom-placeholder" placeholder="Enter Your Password" />
            </div>
            <div class="button text-center mt-4">
              <button name="login" class="fw-bold border-0 rounded m-3" type="login">Login</button>
              <div class="signup">
                <p class="pt-3 fw-bold">Don't have an account? <a href="signup.php"> Sign up here</a> </p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="p-3 mx-2 container-fluid text-center">
            <img src=".\img\uiu.jpg" class="rounded-pill feature_image container-fluid" alt="image">
          </div>
        </div>
      </div>
    </div>
    </form>
    <!-- login form end -->
  </div>
  <!-- footer start -->
  <footer class="text-dark p-5 footer_info">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>UIU Event Management</h5>
          <p class="px-0">Social Media</p>
          <ul class="p-0 cursor-pointer">
            <li class="list-inline-item "><a href=""><i class="bi bi-facebook text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-twitter text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-linkedin text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-instagram text-dark"></i></a></li>
          </ul>
        </div>
        <div class="col-md-4 text-dark cursor-pointer">
          <h5>Quick Links</h5>
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-dark" href="./old/home.php">Home</a></li>
            <li><a class="text-dark" href="./old/about.php">About Us</a></li>
            <li><a class="text-dark" href="./old/event.php">Events</a></li>
            <li><a class="text-dark" href="./old/about.php">Contact Us</a></li>
            <li><a class="text-dark" href="">Privacy Policy</a></li>
            <li><a class="text-dark" href="">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="col-md-4 text-dark">
          <h5>Newsletter</h5>
          <p>Subscribe To Get Latest Media Updates</p>
          <button class="btn btn-light px-5 mt-2">Live Chat</button>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer end -->
  </div>
  <!-- Header -->
  <!-- cdn js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>