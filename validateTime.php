<?php
  session_start();

  // echo '<h1>Members only</h1>';

  // check session variable

  if (isset($_SESSION['valid_user']))
  {
    $displayname = $_SESSION['valid_user'];
  }
  else
  {
    $displayname = "Guest";
  }

  // echo '<a href="authmain.php">Back to main page</a>';
?>

<?php
include "dbconnect.php";
session_start();

$selected_time = $_POST['time'];

$query= "SELECT appTime AS timeslot FROM `blockeddates` WHERE appDate = '$selected_date'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
  $row = $result->fetch_assoc();
  $timeslot = $row['timeslot']; 
$dbcnx->close();

echo $timeslot;

?>