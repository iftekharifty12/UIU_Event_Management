<?php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && isset($_POST['event_id'])) {
        $action = $_POST['action'];
        $eventId = $_POST['event_id'];
        
        if ($action === 'confirm') {
            //event details from pending_event
            $sqlSelect = "SELECT * FROM pending_event WHERE id = '$eventId'";
            $result = $conn->query($sqlSelect);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                //event details into booked_event
                $event_name = $row['Event_Name'];
                $event_date = $row['Event_Date'];
                $start_date = $row['Start_Date'];
                $end_date = $row['End_Date'];
                $organizer = $row['Organizer'];
                $venue = $row['Vanue'];
                $event_des = $row['Event_des'];
                $event_img = $row['Event_img'];
                
                $sqlInsert = "INSERT INTO booked_event (Event_Name, Event_Date, Start_Date, End_Date, Organizer, Vanue, Event_des, Event_img) 
                              VALUES ('$event_name', '$event_date', '$start_date', '$end_date', '$organizer', '$venue', '$event_des', '$event_img')";
                              
                if ($conn->query($sqlInsert) === TRUE) {
                    //the confirmed event from pending_event
                    $sqlDelete = "DELETE FROM pending_event WHERE id = '$eventId'";
                    $conn->query($sqlDelete);
                }
            }
        } elseif ($action === 'decline') {
            //event details from pending_event
            $sqlSelect = "SELECT * FROM pending_event WHERE id = '$eventId'";
            $result = $conn->query($sqlSelect);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                // insert event details into rejected_event
                $event_name = $row['Event_Name'];
                $event_date = $row['Event_Date'];
                $start_date = $row['Start_Date'];
                $end_date = $row['End_Date'];
                $organizer = $row['Organizer'];
                $venue = $row['Vanue'];
                $event_des = $row['Event_des'];
                $event_img = $row['Event_img'];
                
                $sqlInsert = "INSERT INTO rejected_event (Event_Name, Event_Date, Start_Date, End_Date, Organizer, Vanue, Event_des, Event_img) 
                            VALUES ('$event_name', '$event_date', '$start_date', '$end_date', '$organizer', '$venue', '$event_des', '$event_img')";
                              
                if ($conn->query($sqlInsert) === TRUE) {
                    // delete the declined event from pending_event
                    $sqlDelete = "DELETE FROM pending_event WHERE id = '$eventId'";
                    $conn->query($sqlDelete);
                }
            }
        }
    }
}


      //for booked_event details
$sqlBooked = "SELECT * FROM booked_event";
$resultBooked = $conn->query($sqlBooked);
$bookedCount = $resultBooked->num_rows;
/// for pending event details 
$sql = "SELECT * FROM pending_event";
$result = $conn->query($sql);
$pendingCount = $result->num_rows;

// Retrieve recent pending events
$sqlRecentPending = "SELECT * FROM pending_event ORDER BY id DESC LIMIT 3";
$resultRecentPending = $conn->query($sqlRecentPending);

// Retrieve recent booked events
$sqlRecentBooked = "SELECT * FROM booked_event ORDER BY id DESC LIMIT 3";
$resultRecentBooked = $conn->query($sqlRecentBooked);

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <meta
      name="description"
      content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!"
    />
    <meta
      name="keywords"
      content="calendar, events, reminders, javascript, html, css, open source coding"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="adminDstyle.css">
    <link rel="icon" type="image/x-icon" href="tittle logo.png">
</head>
<body>    
    <input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span>UIU Event Management </span>
            </h3> 
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#">
                        <span class="ti-layout"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/event/new/home.html">
                        <span class="ti-home"></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>

                        <span class="ti-calendar"></span>
                        <span id="calender-btn">Schedule Calendar</span>
                
                </li>
                <li>
                    <a href="https://www.tidio.com/panel/inbox/conversations/bb7c2ab5ec984c88baa898d899e163a2?stream=myOpen">
                        <span class="ti-comments"></span>
                        <span>Live Chat</span>
                    </a>
                </li>
                
                <li>
                    <a href="logout.php">
                        <span class="ti-settings"></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    
    <div class="main-content">
        
        <header>
            <div class="search-wrapper">
                <span class=""></span>
                <input type="search" placeholder="">
            </div>
            
            <div class="">
                <span class="ti-user"> <br> admin </span>
                <div></div>
            </div>
        </header>
        
        <main id="main">
            
            <h2 class="dash-title">Overview</h2>
            
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-reload"></span>
                        <div>
                            <h5>Pending event</h5>
                            <h4> <?php echo $pendingCount; ?> </h4> 
                        </div>
                    </div>
                    <div class="card-footer">
                        <a id="view" href="#">View all</a>
                    </div>
                </div>
                <div class="overlay" id="overlay"> </div>
                <div  id="pending">
                    <div class="activity-card">
                        <h3>Pending Event</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Organizer</th>
                                        <th>Venue</th>
                                        <th colspan="2"> Conformation </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['Event_Name'] . '</td>';
                                echo '<td>' . $row['Event_Date'] . '</td>';
                                echo '<td>' . $row['Start_Date'] . '</td>';
                                echo '<td>' . $row['End_Date'] . '</td>';
                                echo '<td>' . $row['Organizer'] . '</td>';
                                echo '<td>' . $row['Vanue'] . '</td>';
                                
                                // Confirm Button Form
                                echo '<td>';
                                echo '<form method="post">';
                                echo '<button type="submit" name="action" value="confirm" class="badge success" onclick="return confirm(\'Are you sure you want to confirm this event?\')">Confirm</button>';
                                echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
                                echo '</form>';
                                echo '</td>';
                                
                                // Decline Button Form
                                echo '<td>';
                                echo '<form method="post">';
                                echo '<button type="submit" name="action" value="decline" class="badge warning" onclick="return confirm(\'Are you sure you want to decline this event?\')">Decline</button>';
                                echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
                                echo '</form>';
                                echo '</td>';
                                
                                echo '</tr>';
                            }
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button id="closepending">Close</button>
                </div>
                <!-- ... for button  ... -->

<script>
    function confirmEvent(eventId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("POST", "process_event.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=confirm&event_id=" + eventId);
    }

    function declineEvent(eventId) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("POST", "process_event.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("action=decline&event_id=" + eventId);
    }
</script>

<!-- ... your existing code ... -->

                
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-lock"></span>
                        <div>
                            <h5>Booked event</h5>
                            <h4> <?php echo $bookedCount; ?> </h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a id="Bview" href="#">View all</a>
                    </div>

                </div>
                <div  id="Booked">
                    <div class="activity-card">
                        <h3>Booked</h3>
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Date</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Organizer</th>
                                        <th>Venue</th>
                                        <th colspan="2"> Conformation </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if ($resultBooked->num_rows > 0) {
                                    while ($rowBooked = $resultBooked->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $rowBooked['Event_Name'] . '</td>';
                                        echo '<td>' . $rowBooked['Event_Date'] . '</td>';
                                        echo '<td>' . $rowBooked['Start_Date'] . '</td>';
                                        echo '<td>' . $rowBooked['End_Date'] . '</td>';
                                        echo '<td>' . $rowBooked['Organizer'] . '</td>';
                                        echo '<td>' . $rowBooked['Vanue'] . '</td>';
                                        echo '<td><span class="badge success">Booked</span></td>';
                                        echo '</tr>';
                                        }
                                     }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button id="closebooked">Close</button>
                </div>
            </div>   
            <!-- Recent view -->
            <section class="recent">
    <div class="activity-grid">
        <div class="activity-card">
            <h3>Recent activity</h3>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Organizer</th>
                            <th>Venue</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function displayEvent($row, $status) {
                            echo '<tr>';
                            echo '<td>' . $row['Event_Name'] . '</td>';
                            echo '<td>' . $row['Event_Date'] . '</td>';
                            echo '<td>' . $row['Start_Date'] . '</td>';
                            echo '<td>' . $row['End_Date'] . '</td>';
                            echo '<td>' . $row['Organizer'] . '</td>';
                            echo '<td>' . $row['Vanue'] . '</td>';
                            // Determine the appropriate class based on status
                                $statusClass = ($status === 'Pending') ? 'badge warning' : 'badge success';
    
                            echo '<td><span class="' . $statusClass . '">' . $status . '</span></td>';
                            echo '</tr>';
                        }
                        while ($rowPending = $resultRecentPending->fetch_assoc()) {
                            displayEvent($rowPending, 'Pending');
                        }

                        while ($rowBookedRecent = $resultRecentBooked->fetch_assoc()) {
                            displayEvent($rowBookedRecent, 'Booked');
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

            
        </main>
        
    </div>
<!---calender--->
    <div id="calender" class="container">
        <div class="left">
          <div class="calendar">
            <div class="month">
              <i class="fas fa-angle-left prev"></i>
              <div class="date">december 2015</div>
              <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            <div class="days"></div>
            <div class="goto-today">
              <div class="goto">
                <input type="text" placeholder="mm/yyyy" class="date-input" />
                <button class="goto-btn">Go</button>
              </div>
              <button class="today-btn">Today</button>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="today-date">
            <div class="event-day">wed</div>
            <div class="event-date">12th december 2022</div>
          </div>
          <div class="events"></div>
          <div class="add-event-wrapper">
            <div class="add-event-header">
              <div class="title">Add Event</div>
              <i class="fas fa-times close"></i>
            </div>
            <div class="add-event-body">
              <div class="add-event-input">
                <input type="text" placeholder="Event Name" class="event-name" />
              </div>
              <div class="add-event-input">
                <input
                  type="text"
                  placeholder="Event Time From"
                  class="event-time-from"
                />
              </div>
              <div class="add-event-input">
                <input
                  type="text"
                  placeholder="Event Time To"
                  class="event-time-to"
                />
              </div>
            </div>
            <div class="add-event-footer">
              <button class="add-event-btn">Add Event</button>
            </div>
          </div>
        </div>
        <button class="add-event">
          <i class="fas fa-plus"></i>
        </button>
      </div>
    <script src="cscript.js"></script>
</body>
</html>