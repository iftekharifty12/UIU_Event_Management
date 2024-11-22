<?php
session_start();
@include 'config.php';
//data from rejected_event table
$sqlSelectRejected = "SELECT * FROM rejected_event";
$resultRejected = $conn->query($sqlSelectRejected);
$rejectCount = $resultRejected->num_rows;

//recent pending events
$sqlRecentPending = "SELECT * FROM pending_event ORDER BY id DESC LIMIT 3";
$resultRecentPending = $conn->query($sqlRecentPending);
$recentPendingCount = $resultRecentPending->num_rows;

//recent booked events
$sqlRecentBooked = "SELECT * FROM booked_event ORDER BY id DESC LIMIT 3";
$resultRecentBooked = $conn->query($sqlRecentBooked);
$recentBookedCount = $resultRecentBooked->num_rows;

$Upcoming=$recentPendingCount + $recentBookedCount;
//for name
$user_id = $_SESSION['user_id'];
$query = "SELECT Full_Name FROM sign_up WHERE S_ID_T_ID = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_name);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width,initial-scale=1,maximum-scale=1">
        <meta
            name="description"
            content="Stay organized with our user-friendly Calendar featuring events, reminders, and a customizable interface. Built with HTML, CSS, and JavaScript. Start scheduling today!" />
        <meta
            name="keywords"
            content="calendar, events, reminders, javascript, html, css, open source coding" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />

        <title>User Dashboard</title>
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="user_dashboard_style.css">
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
                        <a href>
                            <span class="ti-home"></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>

                        <span class="ti-calendar"></span>
                        <span id="calender-btn">Schedule Calendar</span>

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
                <span class="ti-user"></span>
                <span class="user-name" id="user-name"><?php echo $user_name; ?></span>
                <div></div>
            </div>
            </header>

            <main id="main">

                <h2 class="dash-title">Overview</h2>

                <div class="dash-cards">
                    <div class="card-single">
                        <div class="card-body">
                            <span class="ti-calendar"></span>
                            <div>
                                <h5>Upcoming Event</h5>
                                <h4> <?php echo $Upcoming; ?> </h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a id="view" href="#">View all</a>
                        </div>
                    </div>
                    <div class="overlay" id="overlay"> </div>
                    <div id="pending">
                        <div class="activity-card">
                            <h3>Upcoming Event</h3>
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
                        <button id="closepending">Close</button>
                    </div>

                    <div class="card-single">
                        <div class="card-body">
                            <span class="ti-menu-alt"></span>
                            <div>
                                <h5>Rejected Event</h5>
                                <h4><?php echo $rejectCount; ?></h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a id="Bview" href="#">View all</a>
                        </div>

                    </div>
                    <div id="Booked">
                        <div class="activity-card">
                            <h3>Rejected</h3>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultRejected->num_rows > 0) {
                        while ($row = $resultRejected->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['Event_Name'] . '</td>';
                            echo '<td>' . $row['Event_Date'] . '</td>';
                            echo '<td>' . $row['Start_Date'] . '</td>';
                            echo '<td>' . $row['End_Date'] . '</td>';
                            echo '<td>' . $row['Organizer'] . '</td>';
                            echo '<td>' . $row['Vanue'] . '</td>';
                            echo '<td><span class="badge warning">Rejected</span></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No rejected events</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
                            </div>
                        </div>
                        <button id="closebooked">Close</button>
                    </div>
                </div>
                
                
                <a href="/event/reg_form/reg_form.php"><button name="create_event" class="hola">Create Event</button></a>
                <a href="/event/event_reg/event_reg.php"><button name="Reg_event" class="hola">Registration For Event</button></a>
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
        <script src="//code.tidio.co/tgx5ge5gucp6m2pqwkt7txaezcnhyeao.js" async></script>
        <script src="cscript.js"></script>
    </body>
</html>