<?php
        // For Doctors Dropdownlist
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vivigo";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // $conn = mysqli_connect('localhost', 'root', '', 'vivigo');

        // Check connection
        if (!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }
        //drop down list of doctors
        $sql = "SELECT  `name` FROM `doctors` WHERE 1;";
        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <head>
            <title>ViViGo Clinic</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="adminbooking.css">
            <!-- <link rel="stylesheet" href="viewappts.css"> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>

        <!-- Navigation Bar -->

        <div class="navbarContainer">
            <div class="logo"> ViViGo</div>
            <div class="navbarRight">
            <div class="navbarText">
                <a href="adminleave.php" class="navbarLink">Manage Leave</a>
                <a href="adminbooking.php" class="navbarLink">Manage Booking</a>
            </div>
            <div class="navbarButtons">
                <!-- <button> Book appointment </button> -->
                <!-- <button class="bookbutton">
                    Book Appointment
                </button> -->
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                    <div class="username">Admin</div>
                </div>
            </div>
        </div>
        </div>

        <!-- Nav Bar for Booking/Reschedule -->



        <!-- Admin Page -->
        <div class="adminpage">
            <div class="container">
                <h2>Admin Booking Management</h2><br>

                <!-- Drop Down List for Doctors -->
                <div class="topHomebar">
                        <form name="form" action="adminbooking.php" method="post">
                                <label>Doctors</label>
                                <div class="row">
                                    <select class="doctors" name="doctors" name='NEW'>
                                    <!-- <option value="" disabled selected> Select doctor </option> -->
                                    <option value=""> Select doctor </option>
                                        
                                        <?php
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        ?>
                                    </select>
                                    <div class="dropdown">
                                        <input class="dropdownbutton" type="submit" name="Submit" value="Select" />
                                        <!-- <button type="submit">Select</button> -->
                                    </div>
                                </div>

                        </form>   
                    <!-- </div> -->
                </div>

                <!-- Select Date -->
                <!-- <div class="date" >
                    <div class="calendar">
                        <h4>Date</h4>
                        <form action="/action_page.php">
                            <label for="date" ></label>
                            <input type="date" class="cal_font" id="cal" name="cal">
                        </form>
                    </div>
                </div> -->

                <!-- Patient Details -->
                <div class="patientdetails">
                    <table class="theader">
                        <tr>
                            <th id="first">Doctor</th>
                            <th id="second">Date</th>
                            <th id="third">Time Slot</th>
                            <th id="fourth">Patient Name</th>
                        </tr>
                    </table>
                    <?php include 'viewappts.php'; ?>
                    <!-- <table class="tablepat">
                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time Slot</th>
                            <th>Patient Name</th>
                        </tr>
                        <tr>
                            <td><label>Dr. Michelle</label></td>
                            <td><input type="text" disabled selected value="2022-10-31"></td>
                            <td><label>08:00-09:00</label></td>
                            <td>Teh Kah Shin</td>
                            
                            <div class="button">
                                <td><a href="#!" class="bookbutton">Reschedule</a></td>
                            </div>

                            <div class="button">
                                <td><a href="#!" class="bookbutton">Cancel</a></td>
                            </div>
                        </tr>
                    </table> -->
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