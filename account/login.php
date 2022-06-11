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
   $select = "SELECT * FROM username WHERE email = '$email' AND password = '$dehashpass' ";
   $result = mysqli_query($conn, $select);
   $check = mysqli_num_rows($result);

   if($check == 0)
   {
      $response2['status'] = 0;
      $response2['message'] = "Details are incorrect check your email or password";

   }
   else
   {
        $response2['status'] = 1;
        $_SESSION['email'] = $email;
        $response2['message'] = "<script>window.location = '/project/main/Home.php' </script>";
        
   }
   
}
else
  {
    $response2['message'] = "Please fill all the fields";
  }

}

echo json_encode($response2);

?>