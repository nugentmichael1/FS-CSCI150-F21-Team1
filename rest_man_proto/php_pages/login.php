<?php

$servername = "localhost";
$dbusername = "rest_manager";
$dbpassword = "iF2ONNbmcCTcdjrd";
$dbname = "rest_info";

$playerusername = $_POST['u'];
$playerpassword = $_POST['p'];


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM user_test where username='$playerusername' AND password='$playerpassword'";

$results = $conn->query($sql);

$exists = $results->num_rows;

if ($exists > 0)
{
    echo "1";
}
else
{
  echo "Username does not exist or incorrect password";
}

if ($conn->query($sql) !== FALSE) {
  } 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
if($exists==1)
{
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $playerusername;

}

$conn->close();


?>