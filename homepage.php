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
            <link rel="stylesheet" href="homepage.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

       <!-- Navigation Bar -->

       <div class="navbarContainer">
            <div class="logo"> ViViGo</div>
            <div class="navbarRight">
            <div class="navbarText">
                <a href="homepage.php" class="navbarLink" id=selected>Home</a>
                <a href="aboutus.php" class="navbarLink">About Us</a>
                <a href="services.php" class="navbarLink">Our Services</a>
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


        <!-- Homepage -->
        <div class="homepage">
            <div class="apptbar">
                <!-- <img src="tophomebar.jpg" alt="tophomebar" height="600" width="400"> -->
                <div class="topHomebar">
                    <img class="topImage" src="images/appt.jpg" alt="tophomebar" height="600" width="400">
                    <div class="textHomebar">
                        <h1>We Care About Your Health</h1><br>
                        <p> We are a team of doctors and nurses who are passionate about providing the best care for our patients. </p><br>
                        <!-- <button class="apptbutton"> Book Appointment </button> -->
                        <a href="loginPatient.php">  
                            <button class="apptbutton"> Book Appointment </button>  
                        </a>    
                    </div>
                </div>
            </div>

            <div class="aboutUsbar" >
                <img class="aboutUsImage" src="images/abtus.jpg" alt="aboutus" height="600" width="400">
                <div>
                    <h1>About Us</h1><br>
                    <p> ViViGo Medical was established in 1981 & we always make sure to provide our patients with the best service!<br><br>
                        <strong>Click here to read more about how it all started.</strong></p><br>
                    <!-- <button class="readMore"> Read More </button>     -->
                    <a href="aboutus.php">  
                        <button class="readMore"> Read More </button>  
                    </a>
                </div>
            </div>

            <div class="testimonials" >
                <div class="test1">
                    <h1>Testimonials</h1><br>
                    <p> "I have been a patient of Dr. Tan for 10 years and I am very happy with the service he provides. He is very professional and always makes sure I am comfortable. I would recommend him to anyone!"<br><br>
                        <strong>- Eric Lee</strong></p><br>
                </div>
                <div class="test2">
                    <h1></h1><br><br><br>
                    <p> "I have been a patient of Dr. Chua for 8 years and I am very happy with the service he provides. He is very professional and always makes sure I am comfortable. I would recommend him to anyone!"<br><br>
                        <strong>- John Nathan</strong></p><br>
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