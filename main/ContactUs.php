<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="mainstyle.css">
</head>

<?php require_once('/apps/xampp/htdocs/project/layout/header.html'); ?>

</div>
    <div class="container-contact">
        <div class="about-section">
            <h1>Contact Us</h1>
            <p>Swing by for a trip around the world, or leave us a message: </p>
        </div>
        <div class="row">
          <div class="column-contact">
            <img src="img/Contact.webp" style="width:100%">
          </div>
          <div class="column-contact">
            <form method="POST">
              <label for="fname">First Name</label>
              <input type="text" id="fname" name="firstname" required="required" placeholder="Your name..">
              <label for="lname">Last Name</label>
              <input type="text" id="lname" name="lastname" required="required" placeholder="Your last name..">
              <label for="country">City</label>
                <input type="text" name="FromC"  required="required" id="City" list="FromC" placeholder="Country..." onkeyup="Country()">
                <datalist id="FromC">
                </datalist>
                <label for="email">Email</label>
              <input type="email" id="email" name="email" required="required" placeholder="Your email..">
              <label for="subject">Subject (Optional)</label>
              <textarea id="subject" name="subject" optional="optional" placeholder="Write something..(500 char)" maxlength="500" style="height:170px"></textarea>
              <input class="button" id="submit" type="submit" value="Submit" onclick="ShowAlert()">
            </form>
          </div>
        </div>
      </div>

      <?php require_once('/apps/xampp/htdocs/project/layout/footer.html'); ?>


<script>
      function Country() {
            jQuery.ajax(
                {
                    url:"FlightSearchAid.php",
                    data:"City="+document.getElementById('City').value,
                    type:"GET",
                    success:function(data)
                    {
                        document.getElementById("FromC").innerHTML = data;                     
                    }
                }
            );
        }

$("form").on("submit", function (e) {
    var dataString = $(this).serialize();
     
    $.ajax({
      type: "POST",
      url: "ContactUs.php",
      data: dataString,
      success: function () {
        alert("Data Added Successfully");
      }
    });
 
    e.preventDefault();
});
  </script>
    
</html>
