<?php
// Include database connection code from 'config.php'
@include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data (use mysqli_real_escape_string to sanitize data)
    $Your_Name = mysqli_real_escape_string($conn, $_POST["Your_Name"]);
    $Your_ID = mysqli_real_escape_string($conn, $_POST["Your_ID"]);
    $Email = mysqli_real_escape_string($conn, $_POST["Email"]);
    $Event_Name = mysqli_real_escape_string($conn, $_POST["Event_Name"]);
    $Organizer = mysqli_real_escape_string($conn, $_POST["Organizer"]);

    // Prepare and execute SQL query to insert data into the table
    $sql = "INSERT INTO registration_for_event (Your_Name, Your_ID, Email, Event_Name, Organizer)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Your_Name, $Your_ID, $Email, $Event_Name, $Organizer);

    if ($stmt->execute()) {
        echo "<script>window.onload = function() { successMessage(); }</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
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
    <link rel="stylesheet" href="event_reg_style.css" />
    <script>
      function successMessage() {
        // Show a success message
        alert("Data inserted successfully!");

        // Redirect to the previous page
        window.history.back();
      }
    </script>
  </head>
  <body>
  
    <div
      class="main-container container w-50 p-5 position-absolute top-50 start-50 translate-middle"
    >
      <h5 class="custom-underline">Registration for Event</h5>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
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
              <input type="text" class="form-control custom-placeholder"
              id="Your_ID" name="Your_ID" placeholder="Enter your ID" autocomplete="off"/>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group app-form">
              <label for="ID" class="mt-2">Your Mail</label>
              <input type="text" class="form-control custom-placeholder"
              id="Email" name="Email" placeholder="Enter your mail" autocomplete="off"/>
            </div>
          </div>
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
        </div>
        </div> 
        <!-- -->
        <div class="button text-center mt-4">
            <button name="submit" type="submit" class="px-5 py-3 border-0 rounded">
              Apply for Event
            </button>
        </div>
    </div>
  </form>
  </body>
</html>
