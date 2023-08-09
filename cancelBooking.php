<?php
  session_start();



  if (isset($_SESSION['valid_user']))
  {
    $displayname = $_SESSION['valid_user'];
  }
  else
  {
    $displayname = "Guest";
  }

?>




<?php
include "dbconnect.php";



$query = "DELETE FROM appointments WHERE username='$displayname'";
$result = $dbcnx->query($query);

$dbcnx->close();

?>

<?php

echo '<script> alert("You have successfully cancelled your appointment!"); </script>';

$to      = 'jamesng@localhost';
$subject = 'Booking Cancellation';
$message = 'You have successfully cancelled your upcoming appointment with ViviGo Clinic. Head over to our website to book another appointment.';
$headers = 'From: f32ee@localhost' . "\r\n" .
    'Reply-To: f32ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers,'-ff32ee@localhost');
echo ("mail sent to : ".$to);


echo '<script> window.location.href="bookingPatient.php"; </script>';
?>

