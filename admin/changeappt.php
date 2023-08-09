<?php

  // var_dump($_POST);

  if (!empty($_POST)) { // check if there is POST data. If not, do nothing.
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vivigo";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: ".mysqli_connect_error());
    }
    // $timeslot = $mysqli->real_escape_string(implode(" ", $_POST['timeslot']));
    // $username = $mysqli->real_escape_string($_POST['username']);

    // $result = $mysqli->query("SELECT * FROM appointments WHERE timeslot = '$timeslot'");

$username=$_POST['username'];
$timeslot=$_POST['timeslot'];

$query = "UPDATE appointments SET timeslot = '$timeslot' WHERE username='$username'";
// $result = $dbcnx->query($query);
$result = mysqli_query($conn, $query);

if ($result) {
  echo "<script> alert('Timeslot updated successfully');
  window.location.href='adminbooking.php';";
    } else {
  echo "alert('Error occurred: ".mysqli_error($conn)."');";
    }
    echo "</script>";


    // $sql = "UPDATE appointments SET";
    // if (isset($_POST['timeslot'])) {
    //     /* UPDATE query */
    //     $sql .= " timeslot='$timeslot'";
    // }
    // // $sql = rtrim($sql, ','); // remove comma from end of $sql
    // $sql .= " WHERE username = '$username";

    // echo "<script>";
    // echo "  console.log('".$sql."');"; // to check $sql
    
    // if (mysqli_query($conn, $sql)) {
    //   echo "alert('Timeslot updated successfully');";
    // } else {
    //   echo "alert('Error occurred: ".mysqli_error($conn)."');";
    // }
    // echo "</script>";

    mysqli_close($conn);
  }
?>