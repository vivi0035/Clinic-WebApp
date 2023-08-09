<?php
  session_start();

  // echo '<h1>Members only</h1>';

  // check session variable

  
$_SESSION['selected_type'] ;
$_SESSION['selected_doctor'] ;
$_SESSION['selected_date'];


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

// $selected_date = $_POST['date1'];
// $selected_doctor = $_POST['doctor'];
// $selected_type = $_POST['appointmentType'];
$selected_time = $_POST['timee'];

$query = "SELECT * FROM appointments WHERE username='$displayname'";
$result = $dbcnx->query($query);

if ($result->num_rows >0 )
{
  
$query = "UPDATE appointments SET appType = '".$_SESSION['selected_type']."' WHERE username='$displayname'";
$result = $dbcnx->query($query);

$query = "UPDATE appointments SET doctor = '".$_SESSION['selected_doctor']."' WHERE username='$displayname'";
$result = $dbcnx->query($query);

$query = "UPDATE appointments SET appDate = '".$_SESSION['selected_date']."' WHERE username='$displayname'";
$result = $dbcnx->query($query);

$query = "UPDATE appointments SET timeslot = '$selected_time' WHERE username='$displayname'";
$result = $dbcnx->query($query); 
}

else {
$query = "INSERT INTO appointments (appDate, timeslot, username, doctor, appType) VALUES ('".$_SESSION['selected_date']."', '$selected_time', '$displayname', '".$_SESSION['selected_doctor']."', '".$_SESSION['selected_type']."' )";
$result = $dbcnx->query($query);
}
$dbcnx->close();
?>

<?php
include "dbconnect.php";

$query = "SELECT timeslot as selected_time FROM appointments WHERE username='$displayname'";
$result = $dbcnx->query($query);
if ($result->num_rows >0 )
{
  $row = $result->fetch_assoc();
  $selected_time = $row['selected_time']; 
}

echo '<script> alert("You have successfully booked an appointment!"); </script>';

$to      = 'jamesng@localhost';
$subject = 'Booking Confirmation';
$message = 'You have successfully booked an appointment on '.$_SESSION['selected_date'].',  at '.$selected_time.'  with '.$_SESSION['selected_doctor'].' for '.$_SESSION['selected_type'].'. We look forward to seeing you at ViviGo Clinic.';
$headers = 'From: f32ee@localhost' . "\r\n" .
    'Reply-To: f32ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers,'-ff32ee@localhost');
echo ("mail sent to : ".$to);

$dbcnx->close();

echo '<script> window.location.href="bookingPatient.php"; </script>';
?>
