<?php 
include "dbconnect.php";
session_start();

if (isset($_POST['userid']) && isset($_POST['password']))
{

  $userid = $_POST['userid'];
  $password = $_POST['password'];
$password = md5($password);

  $query = 'select * from users '
           ."where username='$userid' "
           ." and password='$password'";

  $result = $dbcnx->query($query);
  if ($result->num_rows >0 )
  {
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $userid;    
  }
  $dbcnx->close();
}
?>



<html>
    <head>
            <title>ViViGo Clinic</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="loginPatient.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <!-- Navigation Bar -->

        <div class="navbarContainer">
            <div class="logo"> ViViGo</div>
            <div class="navbarRight">
            <div class="navbarText">
                <a href="homepage.php" class="navbarLink">Home</a>
                <a href="aboutus.php" class="navbarLink">About Us</a>
                <a href="services.php" class="navbarLink">Our Services</a>
                <a href="doctors.php" class="navbarLink">Our Doctors</a>
                <a href="contact.php" class="navbarLink">Contact Us</a>
            </div>
            <div class="navbarButtons">
                <a href="loginPatient.php" class="bookbutton">
                    Book Appointment
                </a>
                <!-- <div class="profile"> -->
                    <a href="loginPatient.php" class="profile">
                        <i class="fa-solid fa-user"></i>
                        <div class="username">Guest</div>
                        </a>
                <!-- </div> -->
            </div>
        </div>
        </div>


        <!-- Log In -->
       

      <div class="loginPatientContainer">
        <h2>Login</h2>

            
<?php
if (isset($_SESSION['valid_user']))
{
  if ($_SESSION['valid_user'] == "admin")
  {
    echo '<script> window.location.href="admin/adminleave.php"; </script>';
  }
  else {
  echo '<script> window.location.href="bookingPatient.php"; </script>';
  }
}
else
{
  
    
  if (isset($userid))
  {
    echo '<script>alert ("You have entered wrong details. Please try again.");
	</script>';
  }

  echo '<form method="post" action="loginPatient.php" id=loginForm>
  <input type="text" name="userid" placeholder="Username" required> 
 <input type="password" name="password" placeholder="Password" required>
  <input type="submit" value="Login"> </input>
  </form>';
}
 ?>  
    <a href="signupPatient.html" class="loginLink">Create account</a>
   </div>
      
       
    </body>

    <!-- Footer -->

    <footer>

        <div class="footerContainer">
            <div class="footerColumn">
                <h4>ABOUT US</h4>
                <p></p>
                <a href="#!"> Our mission and values </a>
                <a href="#!"> Our history </a>
            </div>
            <div class="footerColumn">
                <h4>OUR SERVICES</h4>
                <p></p>
                <a href="#!"> General Consultation </a>
                <a href="#!"> Vaccination </a>
                <a href="#!"> Health Screening </a>
                <a href="#!"> Chronic Illness Follow-up </a>
            </div>
            <div class="footerColumn">
                <h4>OPENING HOURS</h4>
                <p></p>
                <p><i class="fa-solid fa-clock"></i>&ensp;Monday-Friday&emsp;08:00-20:00</p>
                <p><i class="fa-solid fa-clock"></i>&ensp;Saturday&emsp;09:00-20:00</p>
            </div>
            <div class="footerColumn">
                <h4>FIND US</h4>
                <p></p>
                <p>34 Toa Pah Yoh Central</p>
                <p>#01-06/08/09</p>
                <p>S890745</p>
                <p></p>
                <div class="contactLinks">
                    <i class="fa-solid fa-phone"></i>
                    +65 8522 8988
                </div>
                <div class="contactLinks">
                <i class="fa-solid fa-envelope"></i>
                vivigoclinic@email.com
                </div>
                <div class="contactLinks">
                <a href="#!"><i class="fa-brands fa-twitter"></i></a>
                <a href="#!"><i class="fa-brands fa-facebook"></i></a>
                <a href="#!"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="copyrightContainer">
            Copyright &copy; 2022 ViViGo Medical Group Pte Ltd. All Rights Reserved.
        </div>

    </footer>
</html>