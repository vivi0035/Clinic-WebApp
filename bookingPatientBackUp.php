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


<!-- <?php
include "dbconnect.php";

$query= "SELECT datee AS blockeddate FROM `leavedates`";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);
$row = $result->fetch_assoc();

if ($result->num_rows >0 ) {
    //array to store the dates
 $blockeddate[] = $row['blockeddate'];
}

?> -->

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
                            <form method="post" action="checktime.php">
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

                            
                                Date <input type="date" name="date1" id="date1" value="Select Date" min="<?php echo date('Y-m-d'); ?>">
                                <input type="submit" value="Check Timeslots"></input>  
                            </form>

                               <script>
                                const picker = document.getElementById('date1');
                                picker.addEventListener('input', function(e){
                                    var day = new Date(this.value).getDay();
                                    if([5,0].includes(day)){
                                e.preventDefault();
                                this.value = '';
                                alert('We are closed on Sundays');
                            }
                            });
                            </script>

                            <!-- <script>
                                const picker = document.getElementById('date1');
                                picker.addEventListener('input', function(e){
                                    if picker == $blockeddate[i]{
                                e.preventDefault();
                                this.value = '';
                                alert('Doctor on leave');
                            }
                            });

                            //if document.getElementById('date1') = $blockeddate
                            // <script> 
                            // <alert class=""></alert>
                            // </script> -->
                                
            
                            </div>
                            
                            
                                    <!-- <p>Time</p> -->
                                    
                                    <div class="timeContainer">

                                    <!-- <?php

                                    echo '<div class="dropdownDivRadio">';
                                    echo '<div class="radioContainer"><input type="radio" id="8" name="time" value="8">';
                                    echo '<label for="8">08:00-09:00</label></div>';
                                    echo '<br>';
                                    
                                    echo'<div class="radioContainer"><input type="radio" id="9" name="time" value="9">';
                                    echo'<label for="9">09:00-10:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="10" name="time" value="10">';
                                    echo'<label for="10">10:00-11:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="11" name="time" value="11">';
                                    echo'<label for="11">11:00-12:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="12" name="time" value="12">';
                                    echo'<label for="12">12:00-13:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="13" name="time" value="13">';
                                    echo'<label for="13">13:00-14:00</label></div>';
                                    echo'<br>';
                                    echo'</div>';


                                    echo'<div class="dropdownDivRadio">';
                                    echo'<div class="radioContainer"><input type="radio" id="14" name="time" value="14">';
                                    echo'<label for="14">14:00-15:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="15" name="time" value="15">';
                                    echo'<label for="15">15:00-16:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="16" name="time" value="16">';
                                    echo'<label for="16">16:00-17:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="17" name="time" value="17">';
                                    echo'<label for="17">17:00-18:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="18" name="time" value="18">';
                                    echo'<label for="18">18:00-19:00</label></div>';
                                    echo'<br>';

                                    echo'<div class="radioContainer"><input type="radio" id="19" name="time" value="19">';
                                    echo'<label for="19">19:00-20:00</label></div>';
                                      ?> -->
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