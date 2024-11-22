<?php
@include 'config.php';

$sql = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM booked_event";
$result = mysqli_query($conn, $sql);

$popularEvents = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $popularEvents[] = $row;
    }
}
$sqlLatest = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM booked_event ORDER BY id DESC LIMIT 3";
$resultLatest = mysqli_query($conn, $sqlLatest);

if (mysqli_num_rows($resultLatest) > 0) {
  while ($row = mysqli_fetch_assoc($resultLatest)) {
      $LatestEvents[] = $row;
  }
}

$searchResults = [];

if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search_query']);

    $sqlSearch = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM booked_event 
                  WHERE Event_Name LIKE '%$searchQuery%' OR Event_des LIKE '%$searchQuery%'";

    $resultSearch = mysqli_query($conn, $sqlSearch);

    if (mysqli_num_rows($resultSearch) > 0) {
        while ($row = mysqli_fetch_assoc($resultSearch)) {
            $searchResults[] = $row;
        }
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    

    <title>UIU EMS Home</title>
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
                <a class="nav-link text-dark " aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item me-3">
                <a class="nav-link text-dark" href="Event.php">Event</a>
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
         <!--  section -->

         <div>
            <h2 id="t1">Your Event, Your Way</h2>
            
              <div class="event-main">
                <div>
    <form id="search-form" action="" method="GET">
        <input type="text" class="event-box" name="search_query" id="s2" placeholder="Search" autocomplete="off">
        <button type="submit" class="event-box" id="b1">Search</button>
    </form>
</div>

         <!-- Display search results in a modal -->
         <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="searchModalLabel">Search Results</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            if (!empty($searchResults)) {
                                foreach ($searchResults as $searchEvent) {
                                    echo '<div class="card card-box" style="width: 18rem;">';
                                    // Display search event details here
                                    ?>
                                    <img src="<?php echo $searchEvent['Event_img']; ?>" class="card-img-top" alt="Event Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $searchEvent['Event_Name']; ?></h5>
                                        <p class="card-text"><?php echo $searchEvent['Event_des']; ?></p>
                                        <p class="card-text">Organizer: <?php echo $searchEvent['Organizer']; ?></p>
                                        <p class="card-text">Venue: <?php echo $searchEvent['Vanue']; ?></p>
                                    </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p>No results found.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



         <div id="card-box-container">
    <div class="d-flex justify-content-between px-5">
        <div class="fw-bold">Popular Events</div>
    </div>
    <br>
    <!-- seemore button -->
    <div id="card-main-box" class="card-main">
    <?php
    $count = 0; // Initialize a counter


    // Display remaining popular events
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

</div>
<div class="button-see">
<button id="see-more-btn" class="seemore" style="background-color: #f68b1f; border: none; color: white;"  >See More</button>
<button id="see-less-btn"  style="display: none; background-color: #f68b1f; border: none; color: white;">See Less</button>
</div>



</div>
<div class="banner">

<div class="container">

  <div id="carouselExampleFade" class="carousel slide carousel-fade"
    data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Banner_Concert.jpg" class=" w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/brandmaster.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Coders Combat.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" id="btn_banner1" type="button"
      data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" id="btn_banner2" type="button"
      data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

  </div>

</div>

</div>
<!---->
<br>
<br>
<br>
<br>
<br>

         <!-- video-->
    <div id="card-box-container">
      <div class="d-flex justify-content-between px-5">
        <div class="fw-bold">Featured Videos</div>
      </div>
      <br>
      <div class="d-flex justify-content-around mb-3">
        <div class="card" style="width: 18rem;">
          <video controls>
            <source
              src="video/সবচেয়ে বড় ছয় এর জন্য ১০ হাজার টাকা - 10,000 BDT For The Biggest Six.mp4"
              type="video/mp4">

            not workung
          </video>
          <div class="card-body">
            <p class="card-text">UIU Sports Club organized NEYOON Team for funny
              tournament. <br> <br> Venue : Field</p>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <video controls>
            <source
              src="video/UIU Marketing Forum - UIUMF - Facebook.mp4"
              type="video/mp4">

            not workung
          </video>
          <div class="card-body">
            <p class="card-text">UIU Marketing Forum, a wing of UIU Career
              Counseling Center, has successfully organized an Inter University
              Branding Competition (National Round) branded as ‘Brand Master-
              Season 3.0’.</p>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <video controls>
            <source
              src="attachments/#WORKS~1.MP4"
              type="video/mp4">

            not workung
          </video>
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card
              title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>




    <div id="card-box-container">
    <div class="d-flex justify-content-between px-5">
        <div class="fw-bold">Latest Events</div>
    </div>
    <br>

    <!-- seemore button -->
    <div id="card-main-box" class="card-main">
    <?php
    $count = 0; // Initialize a counter
    foreach ($LatestEvents as $eventL) {
        if ($count >= 3) {
            echo '<div class="card card-box more-events" style="width: 18rem; display: none;">';
        } else {
            echo '<div class="card card-box" style="width: 18rem;">';
        }
        $imagePath = $eventL['Event_img'];
        ?>
        <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Event Image">
        <div class="card-body">
            <h5 class="card-title"><?php echo $eventL['Event_Name']; ?></h5>
            <p class="card-text"><?php echo $eventL['Event_des']; ?></p>
            <p class="card-text">Organizer: <?php echo $eventL['Organizer']; ?></p>
            <p class="card-text">Venue: <?php echo $eventL['Vanue']; ?></p>
        </div>
        </div>
        <?php
        $count++; // Increment the counter
    }
    ?>
</div>
<br>
<br>
<br>

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




        <script>
document.getElementById('see-more-btn').addEventListener('click', function() {
    var moreEvents = document.querySelectorAll('.more-events');
    moreEvents.forEach(function(event) {
        event.style.display = 'block';
    });
    document.getElementById('see-more-btn').style.display = 'none';
    document.getElementById('see-less-btn').style.display = 'block';
});

document.getElementById('see-less-btn').addEventListener('click', function() {
    var moreEvents = document.querySelectorAll('.more-events');
    moreEvents.forEach(function(event) {
        event.style.display = 'none';
    });
    document.getElementById('see-more-btn').style.display = 'block';
    document.getElementById('see-less-btn').style.display = 'none';
});
</script>



        <script src="homepage.js" ></script>
         
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#search-form').submit(function(event) {
            event.preventDefault(); // Prevent form submission
            
            // Get the search query
            const searchQuery = $('#s2').val();

            // Send an AJAX request to fetch search results
            $.ajax({
                url: 'search.php', // Modify this URL to the actual PHP script to fetch search results
                method: 'GET',
                data: { search_query: searchQuery },
                success: function(response) {
                    // Display search results in the container
                    $('#searchModal .modal-body').html(response);
                    $('#searchModal').modal('show'); // Show the modal
                },
                error: function(error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    });
</script>

    
</body>
</html>