<?php

include ("databaseconfig.php");


$response = array(
'status' => 0,
'message' => 'submission failed'
);


if( isset($_POST['new_name']) || isset($_POST['new_email']) || isset($_POST['new_password']) || isset($_POST['confirmpass']) || isset($_POST['new_id']) )
{
   $name = $_POST['new_name'];
   $email = $_POST['new_email'];
   $password = $_POST['new_password'];
   $cpassword = $_POST['confirmpass'];
   $id = $_POST['new_id'];

if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($id)){
   $hashpass = md5($password);
   $select = "SELECT * FROM username WHERE email= '$email' && id= '$id' ";
   $result = mysqli_query($conn,$select);
   $check = mysqli_num_rows($result);

   if($check > 0)
   {
      $response['status'] = 0;
      $response['message'] = 'User already exist! check your ID or Email';
   }
   else
   {
   if($password != $cpassword){
         $response['status'] = 0;
         $response['message'] = 'Password not matched!';
         
      }
      else{
        $response['status'] = 1;
        $sql="insert into username(name,email,password,id) values('$name','$email','$hashpass','$id')";
        $result=mysqli_query($conn,$sql);
        $response['message'] = "Account Created!!";
        
      }
   }
}
else{
    $response['message'] = "Please fill all the fields";
}

}


echo json_encode($response);

?>