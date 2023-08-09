<?php
include "dbconnect.php";
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty ($_POST['email'])
		|| empty ($_POST['mobile']) || empty ($_POST['password']) || empty ($_POST['password2']) ) {
	echo '<script>alert ("All records to be filled in");
	window.history.back();
	</script>';

	exit;
        }
	}
	
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

// echo ("$username" . "<br />". "$password2" . "<br />");
if ($password != $password2) {
	echo '<script>alert ("Password do not match");
	window.history.back();
	</script>';

	exit;
	}

$password = md5($password);
// echo $password;
$sql = "INSERT INTO users (username, email, mobile, password) 
		VALUES ('$username', '$email', '$mobile', '$password')";
//	echo "<br>". $sql. "<br>";
$result = $dbcnx->query($sql);

if (!$result) 
	echo "Your query failed.";
else
	echo '<script> alert("You have successfully signed up!");
    window.location.href="loginPatient.php"; </script>';
	
?>