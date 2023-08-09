<?php
  session_start();

  
$_SESSION['selected_doctor'] = $_POST['doctor'];
$_SESSION['selected_type'] = $_POST['appointmentType'];


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
$selected_doctor = $_POST['doctor'];
$selected_type = $_POST['appointmentType'];

$query= "SELECT datee AS blockedDate FROM `leavedates` 
          WHERE docname = '".$selected_doctor."'";
// echo "<br>" .$query. "<br>";
$result = $dbcnx->query($query);


while($row = mysqli_fetch_array($result)) {
    $blockedDate[] = $row['blockedDate'];
 }

$dbcnx->close();

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
                <a href="#!" class="navbarLink">Home</a>
                <a href="#!" class="navbarLink">About Us</a>
                <a href="#!" class="navbarLink">Our Services</a>
                <a href="#!" class="navbarLink">Our Doctors</a>
                <a href="contact.html" class="navbarLink">Contact Us</a>
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
                    <a href="bookingPatient.html" class="dropdownnLink">Manage Appointment</a>
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
                    <a href="#!" class="bookbutton">Reschedule</a>
                    <a href="#!" class="bookbutton">Cancel</a>
                </div>';
                }

                ?>

            </div>
            <div class="newAppointment">
                <h4>New Appointment</h4>
                <p>You can only have 1 appointment at a time. Booking a new appointment will cancel your upcoming appointment.</p>
                <p>The doctor is not available on these dates. Please refrain from choosing these dates:</p>
                <?php

                foreach($blockedDate as $blocked) {
                    if ($blocked !=="0000-00-00") {
                    echo ''.$blocked.' | ';
                    }
                }

                ?>
                        <!-- <form method="post" action="" onsubmit=""> -->
                            <div class="dropdownDiv">
                            <form method="post" action="checktime.php">
                                <label for="appointmentType">Appointment Type</label>
                                <select id="appointmentType" name="appointmentType" disabled>
                                  
                                  <option value="<?php echo $selected_type?>"><?php echo $selected_type?></option>
                                  
                                </select>
            
                            </div>

                            <div class="dropdownDiv">
                                <label for="doctor">Doctor</label>
                                <select id="doctor" name="doctor" disabled>
                                  <option value="<?php echo $selected_doctor?>"><?php echo $selected_doctor?></option>
                                  
                                </select>
            
                            </div>

                            <div class="dropdownDiv">

                            <!-- <form method="post" action="checktime.php"> -->
                                Date <input type="date" name="date1" id="date1" value="<?php echo $selected_date?>" min="<?php echo date('Y-m-d'); ?>">
                                <input type="submit" value="Check Timeslots" style="width=20px;"></input>  
                            <!-- </form> -->

                               <script>
                                const picker = document.getElementById('date1');
                                picker.addEventListener('input', function(e){
                                var day = new Date(this.value).getDay();
                                if([7,0].includes(day)){
                                    e.preventDefault();
                                    this.value = '';
                                    alert('We are closed on Sundays');
                                }


                                });
                                </script>

                                
                                
            
                            </div>
                            
                
                                 

                                   
                                    </div>

                                    

            
                            </div>
                                  </form>
                        
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