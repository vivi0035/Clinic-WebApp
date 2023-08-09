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




$query= "SELECT appDate AS appDate FROM `appointments` WHERE username = '$displayname'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows >0 ) {
$appDate = $row['appDate']; 
}

else {
$appDate = "N.A.";
}

$query= "SELECT timeslot AS blockedTime FROM `appointments` WHERE username = '$displayname'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows >0 ) {
$blockedTime = $row['blockedTime']; 
}
else {
    $blockedTime = "N.A.";
    }

$query= "SELECT appType AS appType FROM `appointments` WHERE username = '$displayname'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows >0 ) {
$appType = $row['appType']; 
}
else {
    $appType = "N.A.";
    }

$query= "SELECT doctor AS doctor FROM `appointments` WHERE username = '$displayname'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
$row = $result->fetch_assoc();
if ($result->num_rows >0 ) {
$doctor = $row['doctor']; 
}
else {
    $doctor = "N.A.";
    }

?>




<html>
    <head>
            <title>ViViGo Clinic</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="bookingPatient.css">
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
                <!-- <button> Book appointment </button> -->
                <a href="bookingPatient.php" class="bookbutton">
                    Book Appointment
                </a>

                <div class="dropdownn">
                    <button class="profile">
                        <i class="fa-solid fa-user"></i>
                        <div class="username">
                            <?php
                            echo $displayname;
                            ?>
                            </div>
                        <i class="fa-solid fa-chevron-down"></i>
                </button>
                

                <div class="dropdownn-content">
                    <a href="bookingPatient.php" class="dropdownnLink">Manage Appointment</a>
                    <a href="logout.php" class="dropdownnLink">Logout</a>
                  </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
        </div>


        <!-- Booking -->

        <div class="bookingPatientContainer">
            <h2>Bookings</h2>
            <div class="upcomingAppointment">
                <h4>Upcoming Appointment</h4>
                <p>Type: <?php echo $appType?></p>
                <p>Date: <?php echo $appDate?></p>
                <p>Time: <?php echo $blockedTime?></p>
                <p>Doctor: <?php echo $doctor?></p>

                <?php

                if ($appDate !== "N.A.") {
                
                echo '<div class="bookingBtn">
                    <button onclick="scrolldiv()" class="bookbutton">Reschedule</button>
                    <script>
                    function scrolldiv() {
                        window.scrollTo(0,400);
                    }
                    </script>
                    <form method="post" action="cancelBooking.php">
                    <input type="submit" class="bookbutton" value="Cancel"></input>
                    </form>
                </div>';
                }

                ?>

            </div>
            <div class="newAppointment" id="newAppointment">
                <h4>New Appointment</h4>
                <p>You can only have 1 appointment at a time. Booking a new appointment will cancel your upcoming appointment.</p>
                        <!-- <form method="post" action="" onsubmit=""> -->
                            <div class="dropdownDiv">
                            <form method="post" action="checkdate.php">
                                <label for="appointmentType">Appointment Type</label>
                                <select id="appointmentType" name="appointmentType">
                                  <option value="General Consultation" selected>General Consultation</option>
                                  <option value="Vaccination">Vaccination</option>
                                  <option value="Health Screening">Health Screening</option>
                                  <option value="Chronic Illness Follow-up">Chronic Illness Follow-up</option>

                                </select>
            
                            </div>

                            <div class="dropdownDiv">
                                <label for="doctor">Doctor</label>
                                <select id="doctor" name="doctor">
                                  <option value="Dr. Boon Kian Chua" selected>Dr. Boon Kian Chua</option>
                                  <option value="Dr. Crystal Lee">Dr. Crystal Lee</option>
                                  <option value="Dr. Michelle Tan">Dr. Michelle Tan</option>
                                  <option value="Dr. Daniel Tan">Dr. Daniel Tan</option>

                                </select>
            
                            </div>


                            <div class="dropdownDiv">
                                <input type="submit" value="Check Available Dates"></input>  
                            </form>

                                                 
                                
            
                            </div>
                            
                            
             

                                    

            
                            </div>



                        
                <div class="bookingBtn">
                        <a href="#!" class="bookbutton">Submit</a>
                </div>
                    <!-- </form> -->
                        </div>
                </div>
            </div>
            

        </div>    

    </body>

    <!-- Footer -->

    <footer>

        <div class="footerContainer">
            <div class="footerColumn">
                <h4>ABOUT US</h4>
                <p></p>
                <a href="aboutus.php"> Our mission and values </a>
                <a href="aboutus.php"> Our history </a>
            </div>
            <div class="footerColumn">
                <h4>OUR SERVICES</h4>
                <p></p>
                <a href="services.php"> General Consultation </a>
                <a href="services.php"> Vaccination </a>
                <a href="services.php"> Health Screening </a>
                <a href="services.php"> Chronic Illness Follow-up </a>
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
                <a href="https://twitter.com/"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
        </div>

        <div class="copyrightContainer">
            Copyright &copy; 2022 ViViGo Medical Group Pte Ltd. All Rights Reserved.
        </div>

    </footer>
</html>