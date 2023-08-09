<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "vivigo";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // $conn = mysqli_connect('localhost', 'root', '', 'java');

  // Check connection
  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }

    //display Doctors appointments
    $sql = "SELECT  * FROM appointments;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='tablepat'>";
        // Table headings
        echo "<tr>";
        echo "  <th>Doctor</th>";
        echo "  <th>Date</th>";
        echo "  <th>Time Slot</th>";
        echo "   <th>Patient Name</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($result)) {
            $appDate = $row['appDate'];
            $timeslot = $row['timeslot'];
            $username = $row['username'];
            $doctor = $row['doctor'];
            $appType = $row['appType'];
            

                
            // Table values
              echo "<tr>"; 
              echo "  <td><label>".$doctor."</label></td>";
              echo "  <td><input type='text' disabled selected value=".$appDate."></td>";
              echo "        <td>";
              echo "    <form name='form' action='adminbooking.php' method='post'>"; // POST to changeappt.php    
              echo "      <input type='hidden' value='".$username."' name='username' />"; // send item username
              //   echo "  <td><label>".$timeslot."</label></td>";

              echo "  <span class='priceDisplay'>".$timeslot."</span>"; // endless price
              echo "  <input name='timeslot' type='text'>"; // endless input
                echo "  <button type='submit'>Update</button>";
            //   echo "      <button  type='submit'>";
            //   echo "        Update";
            //   echo "      </button>";
              echo "   </form>";
              echo "   </td>";

              echo "  <td>".$username."</td>"; 
            //   echo "  <div class='button'>"; 
            //   echo "  <td class='editCol'>";
            //   echo "    <button class='bookbutton' onClick=toggleEdit(this)>Edit</button>";
            //   echo "  </td>";
                //   echo "      <td><a href='#!' class='bookbutton'>Reschedule</a></td>"; 
            //   echo "  </div>"; 
              echo "</tr>"; 

            }
        echo "</table>";
        } else {
            echo "No Appointments have been made.";
        }
        
    mysqli_close($conn);
?>


