<?php

$servername = "localhost";
$dbusername = "rest_manager";
$dbpassword = "iF2ONNbmcCTcdjrd";
$dbname = "rest_info";



$jsonarray = $_POST['msg_obj'];

$decoded = json_decode($jsonarray, true);

$name = $decoded['name'];
$email = $decoded['email'];
$subject = $decoded['subject'];
$msg = $decoded['msg'];
$user = $decoded['user'];

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "INSERT INTO messages (name, email, subject, mes, username) 
VALUES ('$name','$email','$subject','$msg','$user');";


if ($conn->query($sql) !== FALSE) {
  echo 1;
  } 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
$conn->close();


?>