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
            <link rel="stylesheet" href="contact.css">
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
                <a href="contact.php" class="navbarLink" id=selected>Contact Us</a>
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


        <!-- Contact Us -->

        <div class="contactContainer">
            <div class="leftMap">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.736535260989!2d103.84822091470126!3d1.3342627990268743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da176676e2fe59%3A0x14abcf53528a6d81!2s34%20Toa%20Payoh%20Central!5e0!3m2!1sen!2ssg!4v1666288417109!5m2!1sen!2ssg" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                34 Toa Pah Yoh Central, #01-06/08/09, S890745
                <div class="contactLinks">
                        <i class="fa-solid fa-phone"></i>
                        +65 8522 8988
                </div>
                <div class="contactLinks">
                    <i class="fa-solid fa-envelope"></i>
                    vivigoclinic@email.com
            </div>
                <div class="contactLinks">
                    <a href="https://twitter.com/" class="navbarLink"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://facebook.com/" class="navbarLink"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://instagram.com/" class="navbarLink"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
                <div class="contactLinks"></div>
            </div>
            <div class="rightForm">
                <h2>How can we help? Send us a message!</h2>
                <form method="post" action="clinicMessage.php" onsubmit="myFunction()">
                <div class="formContainer">
                    Name
                    <input type="text" id="namee" name="namee" placeholder="Enter your name" required>
                    Email Address
                    <input type="email" id="emaill" name="emaill" placeholder="Enter your email" required>
                    Message
                    <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
                </div>
                <br>
                <input type="submit" value="Send Message"> </input>
            </form>
                <script>
                    function myFunction() {
                        var name = document.getElementById("namee").value;
                        var email = document.getElementById("emaill").value.indexOf("@");
                        var message = document.getElementById("message").value;
                        submitOK = "true";

                        if (name > 20) {
                        alert("The name may have no more than 20 characters");
                        submitOK = "false";
                        } 

                        if (email == -1) {
                        alert("Not a valid e-mail!");
                        submitOK = "false";
                        }

                        if (message= "") {
                            alert ("Please enter a message");
                            submitOK = "false";
                        }

                        if (submitOK == "false") {
                        return false;
                        }

                        // else {
                        //     alert("Thank you for your message!");
                        //     submitOK = "true";
                        //     return true;
                        // }


                        // if (name.length!==0 && email!==-1 && message.length!==0) {
                        //     // alert("Thank you for your message! We will get back to you soon!");
                        //     submitOK = "true";
                        //     // return true;
                        // }

                        if (submitOK == "true") {
                            alert("Thank you for your message! We will get back to you soon!");
                            return true;
                            
                        }

                        // if (submitOK == "false") {
                        // return false;
                        // }

                        // else {
                        //     submitOK == "false";
                        // }
                    }
                    </script>

            
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