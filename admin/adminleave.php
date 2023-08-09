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

        //Drop down list for doctors
        // $sql = "SELECT  `name` FROM `doctors` WHERE 1;";
        $sql = "SELECT  `docname` FROM `doctors` WHERE 1;";

        $result = mysqli_query($conn, $sql);


        //Add dates to database
        // $sql = "SELECT  `id` FROM `leavedates` WHERE 1;";
        if (isset($_POST["addName"]))
            {
                $customerName = $_POST["docname"];
                // $id = $_POST["id"];
                
                if (isset($customerName)) {
                for ($a = 0; $a < count($_POST["docname"]); $a++)
                {
                    $sql = "INSERT INTO leavedates (`docname`, `datee`) VALUES ('" . $_POST["docname"][$a] . "', '" . $_POST["datee"][$a] . "')";
                    mysqli_query($conn, $sql);
                }
                echo "<script>alert('Leave Successfully Applied')</script>";
                $sql = "ALTER TABLE leavedates AUTO_INCREMENT = 1";
                }

             else {
                echo "<script>alert('Leave Not Applied')</script>";
            }
        }
                            
            // } else {
            //     echo "<script>alert('Leave Not Applied')</script>";
            // }
            
            // unset($_POST["addName"]);

?>

<!-- Script to Add new dates -->
<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = "<tr>";
            html += "<td>" + items + "</td>";
            html += "<td><input type='text' name='docname[]'>";
            html += "</td>";
            html += "<td><input type='Date' name='datee[]'></td>";
            // Delete Button styling -> class='dropdownbutton'
            html += "<td><button type='button' class='dropdownbutton' onclick='deleteRow(this);'>Delete</button></td>"
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    items--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}

</script>

<!DOCTYPE html>
<html>
    <head>
            <title>ViViGo Clinic</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="adminleave.css">
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
                <h2>Admin Leave Management</h2><br>
                <!-- Drop Down List for Doctors -->
                <div>
                <label>Our Doctors: </label>
                    <form action="adminleave.php" method="post">
                            <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['docname'] . "'>" . $row['docname'] . "</option>";
                                    }
                                }
                            ?>
                        <!-- <input type="submit" name="submit" value="Submit"> -->
                    </form>
                </div>


                <!-- Select Leave Dates -->
                <br><div class="date" >
                    <div class="calendar">
                        <label for="date" >Leave Dates</label>
                        
                        <form method="POST" action="adminleave.php">
                            <div class="row">
                                <table>
                                    <tr class="leavetable">
                                        <th>No.</th>
                                        <th>Doctors Name</th> 
                                        <th>Date</th>
                                        <!-- <th></th> -->
                                    </tr>
                                    <tbody id="tbody"></tbody>
                                </table>
                            </div>
                            <!-- Add rows -->
                            <div class="dropdown">
                                <button type="button" class="dropdownbutton" onclick="addItem();">Add Rows</button>
                            </div>

                            <!-- Add to db -->
                            <div class="dropdown">
                                <input class="dropdownbutton" type="submit" name="addName" value="Confirm Leave Dates" />
                            </div>
                            <!-- <input type="submit" name="addInvoice" value="Add Invoice"> -->
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




