<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "ekart";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data from the table
$sql = "SELECT * FROM works";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // Output data of each row
   
   while ($row = $result->fetch_assoc()) {
      echo "ID: " . $row["id"] . " - title: " . $row["title"] . " - about: " . $row["about"] ." - price: " . $row["price"] ." - image: " . $row["image"] . "<br>";
   }
} else {
   echo "No results found";
}

// Close the database connection
$conn->close();
?>