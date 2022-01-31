<?php

$dbConfig = json_decode(file_get_contents('./config.json'));

// Create connection
$conn = new mysqli($dbConfig->servername, $dbConfig->username, $dbConfig->password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully \n";

$conn->close();

 ?>
