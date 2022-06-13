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
   $select = "SELECT * FROM users WHERE Email= '$email' ";
   $result = mysqli_query($conn,$select);
   $check = mysqli_num_rows($result);

   if($check == 1)
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
        $sql="insert into users(Name,Email,Password,natid) values('$name','$email','$hashpass','$id')";
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

<?php
class NationalID
{
    public $fileNewName;
    function nationalID_Upload()
    {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        $allowed = array('jpeg','jpg','png','pdf');
        if(in_array($fileActualExt, $allowed))
        {
            if($fileError === 0)
            {
                if($fileSize < 1000000)
                {
                    $fileNewName = uniqid('',true).".".$fileActualExt;
                    $fileDestination = '/htdocs/project/uploads'.$fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $this->fileNewName = $fileNewName;
                }
                else
                {
                    die("
                    <div class='alert alert-danger' role='alert'>
                        <strong>Registration Incomplete!</strong><br><br>File is large.
                        <br><br>Page will be reloaded.
                    </div>
        
                    <script>
                        setTimeout(function()
                            {
                                window.location.href = 'inpage.php';
                            }, 5000);
                    </script>
                    ");
                    header("refresh:5; url=inpage.php");
                }
            }
            else
            {
                die("
                <div class='alert alert-danger' role='alert'>
                    <strong>Registration Incomplete!</strong><br><br>There was an error uploading this file.<br><br>Reloading the page.
                    <br><br>Page will be reloaded.
                </div>
    
                <script>
                    setTimeout(function()
                        {
                            window.location.href = 'inpage.php';
                        }, 5000);
                </script>
                ");
                header("refresh:5; url=inpage.php");
            }
        }
        else
        {
            die("
            <div class='alert alert-danger' role='alert'>
                <strong>Registration Incomplete!</strong><br><br>File type is not accepted.
                <br><br>Page will be reloaded.
            </div>
            <script>
                setTimeout(function()
                    {
                        window.location.href = 'inpage.php';
                    }, 5000);
            </script>
            ");
            header("refresh:5; url=inpage.php");
        }
    }

    function nationalID_getFileName()
    {
        return $this->fileNewName;
    }
}
?>
