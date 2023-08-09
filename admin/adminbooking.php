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

<!DOCTYPE html>
<html>
    <head>
            <title>ViViGo Clinic</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="adminbooking.css">
            <!-- changeappt.css is used for viewappts.php + adminbooking.php -->
            <link rel="stylesheet" href="changeappt.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="changeappt.js"></script>
    </head>

    <body>
        <!-- For Changing Patient timeslot -->
	    <?php include 'changeappt.php'; ?>

        <!-- Navigation Bar -->

        <div class="navbarContainer">
            <div class="logo"> ViViGo</div>
            <div class="navbarRight">
            <div class="navbarText">
                <a href="adminleave.php" class="navbarLink">Manage Leave</a>
                <a href="adminbooking.php" class="navbarLink">Manage Booking</a>

            </div>
            <div class="navbarButtons">
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
                    <a href="../logout.php" class="dropdownnLink">Logout</a>
                  </div>
            </div>
            </div>
        </div>
        </div>

        <!-- Nav Bar for Booking/Reschedule -->



        <!-- Admin Page -->
        <div class="adminpage">
            <div class="container">
                <h2>Admin Booking Management</h2><br>

                
                <div class="patientdetails">
                    
                    <?php include 'viewappts.php'; ?>
                    
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