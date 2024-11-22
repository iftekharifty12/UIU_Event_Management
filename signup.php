<?php
@include 'config.php';
// Process form submission
if (isset($_POST['submit'])) {
    $s_id_t_id = ($_POST['S_ID_T_ID']);
    $full_name = ($_POST['Full_Name']);
    $contact = ($_POST['Contact']);
    $email = ($_POST['Email_Address']);
    $password = ($_POST['Password']);

    if($s_id_t_id==''or$full_name==''or$contact==''or
    $email==''or$password==''){
        echo "<script>alert('please fill all the avaiable fields')</script>";
        exit();
    }else{
      $query = "INSERT INTO `sign_up` (S_ID_T_ID, Full_Name, Contact, Email_Address, Password) 
      VALUES ('$s_id_t_id', '$full_name', '$contact', '$email', '$password')";
      $result_query = mysqli_query($conn, $query);
      if ($result_query) {
          echo "<script>alert('Successfully Sign UP');
                        window.location.href = 'login.php';
                </script>";
          
      } else {
          echo "Error: " . mysqli_error($conn);
      }      
    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<script>
    window.onload = function() {
        // Get all the input fields within the form
        var form = document.querySelector('form');
        var inputs = form.querySelectorAll('input');

        // Loop through the input fields and clear their values
        inputs.forEach(function(input) {
            input.value = '';
        });
    };
</script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
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
          <form autocomplete="off">
            <div  aria-autocomplete="off" class="mb-3 input-box">
              <h1 style="color:#f68b1f;" class="fw-bolder py-3">Sign UP!</h1>
              <label for="exampleInputEmail1" class="form-label">S_ID(Stduent ID)</label>
              <input name="S_ID_T_ID" type="id" class="form-control custom-placeholder" placeholder="Example:000 111 222" />
            </div>
            <div class="mb-3 input-box">
              <label for="exampleInputEmail1" class="form-label">Full Name</label>
              <input name="Full_Name" type="text" class="form-control custom-placeholder" placeholder="Full Name" />
            </div>
            <div class="mb-3 input-box">
              <label for="exampleInputEmail1" class="form-label">Contact</label>
              <input name="Contact" type="text" class="form-control custom-placeholder" placeholder="Contact" />
            </div>
            <div class="mb-3 input-box">
              <label for="exampleInputEmail1" class="form-label">Email Address</label>
              <input name="Email_Address" type="text" class="form-control custom-placeholder" placeholder="Email Address (Use Official Mail)" />
            </div>
            <div class="mb-3 input-box">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input name="Password" type="password" class="form-control custom-placeholder" placeholder="Enter Your Password" />
            </div>
            <div class="button text-center mt-4">

              <button class="fw-bold border-0 rounded m-3" type="submit" name="submit">Sign Up</button>
              <div class="signup">
                <p class="pt-3 fw-bold">Already have an account ?<a href="login.php"> Login</a> </p>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6 my-5">
          <div class="container-fluid pt-4">
            <img src=".\img\uiu.jpg" class="rounded-pill feature_image container-fluid my-5" alt="image">
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
          <h5 class="fw-bolder">UIU Event Management</h5>
          <p class="px-0">Social Media</p>
          <ul class="p-0 cursor-pointer">
            <li class="list-inline-item "><a href=""><i class="bi bi-facebook text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-twitter text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-linkedin text-dark"></i></a></li>
            <li class="list-inline-item"><a href=""><i class="bi bi-instagram text-dark"></i></a></li>
          </ul>
        </div>
        <div class="col-md-4 text-dark cursor-pointer">
          <h5 class="fw-bolder">Quick Links</h5>
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
          <h5 class="fw-bolder">Newsletter</h5>
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