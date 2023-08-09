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
            <link rel="stylesheet" href="aboutus.css">
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
                <a href="services.php" class="navbarLink" id=selected>Our Services</a>
                <a href="doctors.php" class="navbarLink">Our Doctors</a>
                <a href="contact.php" class="navbarLink">Contact Us</a>
            </div>
            <div class="navbarButtons">
                 <!-- <button> Book appointment </button> -->
                 <?php if ($displayname !== "Guest") 
                        echo '<a href="bookingPatient.php" class="bookbutton">';
                      else
                      echo '<a href="loginPatient.php" class="bookbutton">'; ?>
                <!-- <a href="bookingPatient.php" class="bookbutton"> -->
                    Book Appointment
                </a>

                <?php if ($displayname !== "Guest") 
                        echo '<div class="dropdownn">';
                      else
                      echo '<div class="dropdownn hoverdisabled">'; ?>

                <!-- <div class="dropdownn"> -->
                    <button class="profile">
                        
                        <i class="fa-solid fa-user"></i>
                        <div class="username">
                            <?php
                            echo $displayname;
                            ?>
                            </div>
                            <?php if ($displayname !== "Guest") 
                        echo '<i class="fa-solid fa-chevron-down"></i>'; ?>
                        
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


        <!-- Our Services -->
        <div class="aboutuspage">
            <div class="missionBar">
                <!-- <img src="tophomebar.jpg" alt="tophomebar" height="600" width="400"> -->
                <div class="missonValues">
                    <img class="mission" src="images/mission.jpg" alt="Mission" height="600" width="400">
                    <div class="textHomebar">
                        <h2>General Consultation</h2><br>
                        <p>ViVigo Medical is dedicated to the highest quality of medical services delivered with originality, pride and honesty to our patients.<br>
                            We are committed to providing the best possible care to our patients and their families.<br>
                        </p>
                    </div>
                </div>
            </div>

            <div class="historyBar" >
                <img class="history" src="images/history.jpg" alt="history" height="600" width="400">
                <div>
                    <h2>Vaccination</h2><br>
                    <p> ViViGo Medical was established in 1981 by Dr. Vivi & Dr. Go. We are a family owned and operated business and we are proud <br>to be a part of the community.<br>
                        Our clinic has expanded ever since then and we are now able to provide a wide range of services to our patients.<br>                       
                    </p><br>
                </div>
            </div>

            <div class="historyBar" >
                <img class="history" src="images/appt.jpg" alt="history" height="600" width="400">
                <div>
                    <h2>Health Screening</h2><br>
                    <p> ViViGo Medical was established in 1981 by Dr. Vivi & Dr. Go. We are a family owned and operated business and we are proud <br>to be a part of the community.<br>
                        Our clinic has expanded ever since then and we are now able to provide a wide range of services to our patients.<br>                       
                    </p><br>
                </div>
            </div>

            <div class="historyBar" >
                <img class="history" src="images/abtus.jpg" alt="history" height="600" width="400">
                <div>
                    <h2>Chronic Illness Follow-up</h2><br>
                    <p> ViViGo Medical was established in 1981 by Dr. Vivi & Dr. Go. We are a family owned and operated business and we are proud <br>to be a part of the community.<br>
                        Our clinic has expanded ever since then and we are now able to provide a wide range of services to our patients.<br>                       
                    </p><br>
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