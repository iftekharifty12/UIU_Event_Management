<?php
// Include your config and database connection
@include 'config.php';

if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search_query']);

    $sqlSearch = "SELECT Event_Name, Organizer, Vanue, Event_img, Event_des FROM booked_event 
                  WHERE Event_Name LIKE '%$searchQuery%' OR Event_des LIKE '%$searchQuery%'";

    $resultSearch = mysqli_query($conn, $sqlSearch);

    if (mysqli_num_rows($resultSearch) > 0) {
        echo '<div class="card-main d-flex flex-wrap justify-content-between">';
        while ($row = mysqli_fetch_assoc($resultSearch)) {
            echo '<div class="card card-box mb-3" style="width: 18rem;">';
            // Display search event details here
            ?>
            <img src="<?php echo $row['Event_img']; ?>" class="card-img-top" alt="Event Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Event_Name']; ?></h5>
                <p class="card-text"><?php echo $row['Event_des']; ?></p>
                <p class="card-text">Organizer: <?php echo $row['Organizer']; ?></p>
                <p class="card-text">Venue: <?php echo $row['Vanue']; ?></p>
            </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo '<p>No results found.</p>';
    }
}
?>
