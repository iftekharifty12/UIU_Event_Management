<?php
@include 'config.php';

$sql = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM booked_event ORDER BY id DESC LIMIT 3";
$result = mysqli_query($conn, $sql);

$popularEvents = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $popularEvents[] = $row;
    }
}
$sqlPending = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM pending_event ORDER BY id DESC LIMIT 3";
$resultPending = mysqli_query($conn, $sqlPending);
if (mysqli_num_rows($resultPending) > 0) {
  while ($row = mysqli_fetch_assoc($resultPending)) {
      $PendingEvents[] = $row;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Roboto:ital,wght@0,300;0,400;1,100;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    

    <title>UIU EMS Event</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <div id="nav-logo" class="d-flex">
            <img  id="logo" class="" src="uiu.png" alt="">
            <h3 class="pt-4 fw-bold">UIU Event Management</h3>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mb-2 fw-bold  ">
              <li class="nav-item me-3">
                <a class="nav-link text-dark " aria-current="page" href="Home.php">Home</a>
              </li>
              <li class="nav-item me-3">
                <a class="nav-link text-dark" href="#">Event</a>
              </li>
                <li class="nav-item me-3">
                <a class="nav-link text-dark" href="about.php">About</a>
              </li>
              <li class="nav-item me-3">
                <a class="nav-link text-dark" href="../login.php" tabindex="-1" aria-disabled="true">Login</a>
              </li>
              <li class="nav-item  bg-white me-5">
                <a class="nav-link text-dark " href="../signup.php" tabindex="-1" aria-disabled="true">Signup</a>
              </li>
            </ul>
          </div>
        </div>
         </nav>
<br>
<br>

<div id="card-box-container">
    <div class="d-flex justify-content-between px-5">
        <div class="fw-bold">Latest Events</div>
    </div>
    <br>

    <!-- seemore button -->
    <div id="card-main-box" class="card-main">
    <?php
    $count = 0; // Initialize a counter
    foreach ($popularEvents as $event) {
        if ($count >= 3) {
            echo '<div class="card card-box more-events" style="width: 18rem; display: none;">';
        } else {
            echo '<div class="card card-box" style="width: 18rem;">';
        }
        $imagePath = $event['Event_img'];
        ?>
        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Event Image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $event['Event_Name']; ?></h5>
            <p class="card-text"><?php echo $event['Event_des']; ?></p>
            <p class="card-text">Organizer: <?php echo $event['Organizer']; ?></p>
            <p class="card-text">Venue: <?php echo $event['Vanue']; ?></p>
        </div>
        </div>
        <?php
        $count++; // Increment the counter
    }
    ?>
</div>
<div class="button-see">
<button id="see-more-btn" style="background-color: #f68b1f; border: none; color: white;">See More</button>
<button id="see-less-btn"  style="display: none; background-color: #f68b1f; border: none; color: white;">See Less</button>
</div>
         <div>

            <br>
            <br>
        
            
              <div class="event-main">
                   
                    <div>
                        <select id="s2"class="event-box"  name="cars">
                    <option value="">Select Club</option>
                    <option value="">Computer Club</option>
                    <option value="">App Forum </option>
                    <option value="">Sports Club</option>
                    </select>
                    </div>
                <input type="button"class="event-box"  id="b1" value="Search">
              </div>
           
         </div>


           <br>
           <br>
            <br>
            <div id="card-box-container">
    <div class="d-flex justify-content-between px-5">
        <div class="fw-bold">Upcoming Event</div>
    </div>
    <br>

    <!-- seemore button -->
    <div id="card-main-box" class="card-main">
    <?php
    $count = 0; // Initialize a counter
    foreach ($PendingEvents as $eventP) {
        if ($count >= 3) {
            echo '<div class="card card-box more-events" style="width: 18rem; display: none;">';
        } else {
            echo '<div class="card card-box" style="width: 18rem;">';
        }
        $imagePath = $eventP['Event_img'];
        ?>
        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Event Image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $eventP['Event_Name']; ?></h5>
            <p class="card-text"><?php echo $eventP['Event_des']; ?></p>
            <p class="card-text">Organizer: <?php echo $eventP['Organizer']; ?></p>
            <p class="card-text">Venue: <?php echo $eventP['Vanue']; ?></p>
        </div>
        </div>
        <?php
        $count++; // Increment the counter
    }
    ?>
</div>




        
//

        <div>

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
                    <li class="list-inline-item"><a class="text-dark" href="">Home</a></li>
                    <li ><a class="text-dark" href="">About Us</a></li>
                    <li><a class="text-dark" href="">Events</a></li>
                    <li><a class="text-dark" href="">Contact Us</a></li>
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
        </div>








         <script src="event.js" type="module"></script>

         <script>
  window.chatbaseConfig = {
    chatbotId: "ok8Bj4L3a33juTJ2m98KI",
  }
</script>
<script
  src="https://www.chatbase.co/embed.min.js"
  id="ok8Bj4L3a33juTJ2m98KI"
  defer>
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>