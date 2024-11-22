<?php
   // Create a new mysqli connection
   $conn = new mysqli('localhost', 'root', '', 'eventmang');

   // Check if the connection was successful
   if ($conn->connect_error) {
       die("Failed to connect: " . $conn->connect_error);
   }
?>
