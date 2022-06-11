<?php

session_start();

include ("databaseconfig.php");

$response = array(
'status' => 0,
'message' => 'submission failed'
);

    if( isset($_POST['editname']) || isset($_POST['editphonenumber']) || isset($_POST['editaddress']) || isset($_POST['editpostcode']) || isset($_POST['editcountry']) || isset($_POST['editnationality']) )
    {
       $name = $_POST['editname'];
       $phone = $_POST['editphonenumber'];
       $address = $_POST['editaddress'];
       $postcode = $_POST['editpostcode'];
       $country = $_POST['editcountry'];
       $nationality = $_POST['editnationality'];
    
    if(!empty($name) && !empty($phone) && !empty($address) && !empty($postcode) && !empty($country) &&!empty($nationality) ){ 
            $response['status'] = 1;
            $sql="UPDATE users SET Name='$name',phone_num='$phone',address='$address',postal_code='$postcode',country='$country',nationality='$nationality' WHERE email ='".$_SESSION['User']."' ";
            $result=mysqli_query($conn,$sql);
            $response['message'] = "Account Edited";
    }
    else
    {

        $response['message'] = "Please fill all the fields";
    }
    
    }
   
echo json_encode($response);

?>