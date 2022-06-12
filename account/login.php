<?php

include ("databaseconfig.php");


$response2 = array(
'status' => 0,
'message' => 'submission failed'
);

session_start();


if(isset($_POST['email']) || isset($_POST['password']))
{
   $email = $_POST['email'];
   $password = $_POST['password'];
   $dehashpass = md5($password);
   if(!empty($email) && !empty($password))
   {
   $select = "SELECT * FROM users WHERE Email = '$email' AND Password = '$dehashpass' ";
   $result = mysqli_query($conn, $select);
   $check = mysqli_num_rows($result);
   if($check == 0)
   {
      $response2['status'] = 0;
      $response2['message'] = "Details are incorrect check your email or password";

   }
   else
   {

    $role = "SELECT role FROM `users` WHERE role  = 'qc' && email = '$email' ";
    $result1 = mysqli_query($conn, $role);
    $check1 = mysqli_fetch_array($result1);

    $role2 = "SELECT role FROM `users` WHERE role  = 'cs' && email = '$email' ";
    $result2 = mysqli_query($conn, $role2);
    $check2 = mysqli_fetch_array($result2);

    if($check1["role"] == "qc")
    {
      $response2['status'] = 1;
      $response2['message'] = "<script>window.location = '/project/qc_home.html' </script>";
    }
    else if($check2['role'] == "cs")
    {
      $response2['status'] = 1;
      $response2['message'] = "<script>window.location = '/project/main/AboutUs.php' </script>";
    }
    else
    {
      $response2['status'] = 1;
      $_SESSION['User'] = $email;
      $response2['message'] = "<script>window.location = '/project/main/Home.php' </script>";
    }
       
        
   }
   
}
else
  {
    $response2['message'] = "Please fill all the fields";
  }

}

echo json_encode($response2);

?>
