<?php require_once('/apps/xampp/htdocs/project/layout/header.php'); ?>

<html>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="/project/main/mainstyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function Remove(ID)
    {
        jQuery.ajax(
            {
                url:"Remove.php",
                data:"REVCode="+ID,
                type:"GET",
                success:function(data)
                {
                    alert("Removed Successfully");
                }
            }
        );
        location.href = "Cart.php";
    }
    function Book()
    {
        jQuery.ajax(
            {
                url:"Book.php",
                type:"GET",
                success:function(data)
                {
                    alert("Done");
                }
            }
        );
        location.href = "Cart.php";
    }
</script>
    <?php
    $conn = new mysqli("localhost", "root", "", "egway");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT rev_num, f_code, f_code2, f_code3, price FROM reservations WHERE name='".$_SESSION['User']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $count=0;
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $count++;
            echo"<div class='FlightCardTopBar'> <button id=".$row['rev_num']." onclick='Remove(this.id)' class='right'>Remove</button></div>";
            echo"<div class='FlightCard'>";
            echo"<div style='text-align: center;'>";
            echo"Reservation Code:";
            echo($row['rev_num']);   
            echo"</div>";
            echo "<span style='text-align: left;'> Flight Code:".$row['f_code']."</span>";
            if($row['f_code2']!=NULL)
                echo "<span style='float:right;'> Flight 2 Code: " . $row["f_code2"]."</span>";
            echo"<br>";
            if($row['f_code3']!=NULL)
                echo "<span style='text-align: left;'> Flight 3 Code: " . $row["f_code3"]."</span>";
            echo"<br>";
            echo "<span style='text-align: left;'> Price: " . $row["price"]."</span>";
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
                Check Out To Complete Payment 
                <button class="CartButton" onclick="Book()">Check Out</button>
                <div class="NumberDisplay">
                    <?php
                    echo($count);
                    ?>
                </div>
        </div>
    </div>
</html>
