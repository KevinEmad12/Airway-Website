<?php
session_start();
?>



</html>
<head> 
  <link rel="stylesheet" href="/apps/xampp/htdocs/project/main/mainstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<a href="/project/main/Home.php"><div class="topnav"> 
    <div >
  <img  class="logo-image" src="/project/main/img/logo.jfif">
</div></a>
  <a  href="/project/main/Home.php"><i class="fa fa-fw fa-home"></i>Home</a>
  <a  href="/project/main/ContactUs.php"><i class="fa fa-fw fa-envelope"></i>Contact</a>
  <a  href="/project/main/AboutUs.php"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a>
  <div class="topnav-right">

<?php
if(isset($_SESSION['qc']))
{
  echo "<a href='/project/account/userdashboard.php'><i class='fa fa-fw fa-user'></i>";
  echo $_SESSION['qc'];
  echo "</a>";
}
else if (isset($_SESSION['cs']))
{
  echo "<a href='/project/account/userdashboard.php'><i class='fa fa-fw fa-user'></i>";
  echo $_SESSION['cs'];
  echo "</a>";
}
else if (isset($_SESSION['User'])){
  echo "<a href='/project/account/userdashboard.php'><i class='fa fa-fw fa-user'></i>";
  echo $_SESSION['User'];
  echo "</a>";
}
else{
  echo "<a href='/project/account/inpage.php'><i class='fa fa-fw fa-user'></i>Sign up | Login</a>";

}
?>

  </div>
</div>
</html>
