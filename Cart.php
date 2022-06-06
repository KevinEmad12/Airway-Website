<html>
<link rel="stylesheet" href="styles.css">
    <?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT rev_num, f_code, f_code2, f_code3, f_date FROM reservations WHERE name='".$_SESSION['User']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $count=0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $count++;
            echo"<div class='FlightCardTopBar'> <input id=". $row['rev_num']." type='button' onclick='Remove(this.id)' value='Remove' class='right'></div>";
            echo"<div class='FlightCard'>";
            echo"<div style='text-align: center;'>";
            if($row['rev_num']==NULL)
                echo"Reservation Status:Pending";
            else if($row['rev_num']=="Fail")
                echo"Reservation Status:Failed";
            else
            {
                echo"Reservation Code:";
                echo($row['rev_num']);
            }    
            echo"</div>";
            echo "<span style='text-align: left;'> Flight Code:".$row['f_code']."</span>";
            if($row['f_code2']!=NULL)
                echo "<span style='float:right;'> Flight 2 Code: " . $row["f_code2"]."</span>";
            echo"<br>";
            if($row['f_code3']!=NULL)
                echo "<span style='text-align: left;'> Flight 2 Code: " . $row["f_code3"]."</span>";
            echo "</div>";
            echo "<br>";
        }
        echo"<br>";
        echo"<br>";
        echo"<br>";
    }   
    else {
            echo "0 results";
          }
          $conn->close();
    ?>
    <div class="CartBarB">
        <div class="CartBar">
            <form action="hi.html">
                Check Out To Complete Payment 
                <button class="CartButton">Check Out</button>
                <div class="NumberDisplay">
                    <?php
                    echo($count);
                    ?>
                </div>
            </form>
        </div>
    </div>
</html>