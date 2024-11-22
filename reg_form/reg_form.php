<?php
@include 'config.php';

// process form submission
if (isset($_POST['submit'])) {
    $Your_Name = mysqli_real_escape_string($conn, $_POST['Your_Name']);
    $Your_ID = mysqli_real_escape_string($conn, $_POST['Your_ID']);
    $Event_Name = mysqli_real_escape_string($conn, $_POST['Event_Name']);
    $Event_Date = mysqli_real_escape_string($conn, $_POST['Event_Date']);
    $Start_Date = mysqli_real_escape_string($conn, $_POST['Start_Date']);
    $Organizer = mysqli_real_escape_string($conn, $_POST['Organizer']);
    $End_Date = mysqli_real_escape_string($conn, $_POST['End_Date']);
    $Vanue = mysqli_real_escape_string($conn, $_POST['room']);
    $Event_des = mysqli_real_escape_string($conn, $_POST['Event_des']);

    //image Upload
    $targetDirectory = "uploads/";  // Change this to your desired directory
    $targetFile = $targetDirectory . basename($_FILES["Event_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // check if image file is a actual image or fake image
    $check = getimagesize($_FILES["Event_img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.')</script>";
        $uploadOk = 0;
    }

    // check if file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.')</script>";
        $uploadOk = 0;
    }

    //check file size
    if ($_FILES["Event_img"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }

    // allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
        if (move_uploaded_file($_FILES["Event_img"]["tmp_name"], $targetFile)) {
            //insert data into create_table and pending_table
            $createQuery = "INSERT INTO `creat_event` (Your_Name, Your_ID, Event_Name, Event_Date, Start_Date, Organizer, End_Date, Vanue, Event_des, Event_img) 
                            VALUES ('$Your_Name', '$Your_ID', '$Event_Name', '$Event_Date', '$Start_Date', '$Organizer', '$End_Date', '$Vanue', '$Event_des', '$targetFile')";
            $result_create_query = mysqli_query($conn, $createQuery);

            $pendingQuery = "INSERT INTO `pending_event` (Your_Name, Your_ID, Event_Name, Event_Date, Start_Date, Organizer, End_Date, Vanue, Event_des, Event_img) 
                             VALUES ('$Your_Name', '$Your_ID', '$Event_Name', '$Event_Date', '$Start_Date', '$Organizer', '$End_Date', '$Vanue', '$Event_des', '$targetFile')";
            $result_pending_query = mysqli_query($conn, $pendingQuery);

            if ($result_create_query && $result_pending_query) {
                echo "<script>
                alert('Successfully Created');
                window.location.href = '/event/UserDashboard/user_dashboard.php';
                </script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
        }
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Registration Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="reg_form_style.css" />
  </head>
  <body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div
      class="main-container container w-50 p-5 position-absolute top-50 start-50 translate-middle"
    >
      <h5 class="custom-underline">Create Event</h5>
      <form action="/" method="post" class="my-3">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name" class="mt-2">Your Name</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="name"
                name="Your_Name"
                placeholder="Enter your name"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group app-form">
              <label for="ID" class="mt-2">Your ID</label>
              <input type="text" class="form-control custom-placeholder" id="Your_ID" name="Your_ID" placeholder="Enter your email" autocomplete="off"/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="id" class="mt-2">Event Name</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="Event_Name"
                name="Event_Name"
                placeholder="Enter event name"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id" class="mt-2">Event Date</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="Event_Date"
                name="Event_Date"
                placeholder="Enter event date"
                autocomplete="off"
              />
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="event" class="mt-2">Start Time</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="Start_Date"
                name="Start_Date"
                placeholder="Enter event Start Time"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id" class="mt-2">End Time</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="End_DATE"
                name="End_Date"
                placeholder="Enter event End Time"
                autocomplete="off"
              />
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="event" class="mt-2">Organizer</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="Organizer"
                name="Organizer"
                placeholder="Enter Organizer Name"
                autocomplete="off"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="id" class="mt-2">Event Description</label>
              <input
                type="text"
                class="form-control custom-placeholder"
                id="Event_des"
                name="Event_des"
                placeholder="Enter event Description"
                autocomplete="off"
              />
            </div>
          </div>
          
        </div>  
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
              <label for="event" class="mt-2">Event Photo</label>
              <input
                type="file"
                class="form-control custom-placeholder"
                id="Event photo"
                name="Event_img"
                placeholder="Choose Photo"
              />
            </div>
          </div>
        <div class="col-md-6">
  <div class="form-group">
    <label for="category" class="mt-2">Category</label>
    <select class="form-control custom-placeholder" id="category" name="category">
      <option value="auditorium">Auditorium</option>
      <option value="classroom">Class Room</option>
      <option value="seminarroom">Seminar Room</option>
    </select>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="room" class="mt-2">Room</label>
    <select class="form-control custom-placeholder" id="room" name="room">
      <!-- Default option for Auditorium -->
      <option value="auditorium">Auditorium</option>
    </select>
  </div>
</div>
        </div>
        <div class="button text-center mt-4">
          <button name="submit" type="submit" class="mt-3 px-5 py-3 border-0 rounded">
            Apply for Event
          </button>
        </div>
        <!-- -->
        </div>
        
        
        <script>
  // JavaScript code to dynamically update room options based on category
  document.getElementById('category').addEventListener('change', function() {
    const category = this.value;
    const roomSelect = document.getElementById('room');

    // Clear existing options
    roomSelect.innerHTML = '';

    // Add options based on selected category
    if (category === 'classroom') {
      for (let floor = 1; floor <= 10; floor++) {
        for (let roomNumber = 1; roomNumber <= 30; roomNumber++) {
          const option = document.createElement('option');
          option.value = `classroom-floor${floor}-room${roomNumber}`;
          option.textContent = `Class Room - Floor ${floor} - Room ${roomNumber}`;
          roomSelect.appendChild(option);
        }
      }
    } else if (category === 'seminarroom') {
      for (let floor = 1; floor <= 10; floor++) {
        for (let roomNumber = 1; roomNumber <= 2; roomNumber++) {
          const option = document.createElement('option');
          option.value = `seminarroom-floor${floor}-room${roomNumber}`;
          option.textContent = `Seminar Room - Floor ${floor} - Room ${roomNumber}`;
          roomSelect.appendChild(option);
        }
      }
    } else {
      // Default option for other categories (e.g., 'auditorium')
      const option = document.createElement('option');
      option.value = category;
      option.textContent = category.charAt(0).toUpperCase() + category.slice(1);
      roomSelect.appendChild(option);
    }
  });
</script>
      </form>
    </div>
  </form>
  </body>
</html>
