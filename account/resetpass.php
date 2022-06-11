
<?php

include ("databaseconfig.php");


$response = array(
'status' => 0,
'message' => 'submission failed'
);


if( isset($_POST['email']) || isset($_POST['password']) || isset($_POST['cpassword']) )
{
   $email = $_POST['email'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];

if(!empty($email) && !empty($password) && !empty($cpassword) ){
   $hashpass = md5($password);
   $select = "SELECT * FROM username WHERE email= '$email' ";
   $result = mysqli_query($conn,$select);
   $check = mysqli_num_rows($result);

   if($check == 0)
   {
      $response['status'] = 0;
      $response['message'] = 'User not found';
   }
   else
   {
   if($password != $cpassword){
         $response['status'] = 0;
         $response['message'] = 'Password not matched!';
         
      }
      else{
        $response['status'] = 1;
        $query = "UPDATE username SET password = '$hashpass' WHERE email = '$email' ";
        $res = mysqli_query($conn,$query);
        $response['message'] = "password updated";
        
        
      }
   }
}
else{
    $response['message'] = "Please fill all the fields";
}

}


echo json_encode($response);

?>