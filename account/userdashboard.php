<?php require_once('/apps/xampp/htdocs/project/layout/header.php'); ?>
<html>
    <head>
        <link rel="stylesheet" href="profileCSS.css">
        <link rel="stylesheet" href="headerfooter.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <div style="margin-top:100px;">    
    <body style="background-image: url('background.JPG'); ">
    <div class="bar">
        <button id="button1" class="MainBarActive" onclick="SwitchTabs('button1')">My Detials</button>
        <button id="button2" class="MainBar" onclick="SwitchTabs('button2')">Family Details</button>
    </div>
    </div>
        
        <div id="editpersonal" >
        <form id="personform">
               
            <p> Personal Info</p>
            <div class = "form-message">  </div>
            <label >Name</label> <input type="text" name="editname" placeholder="Name">
            <label >Phone Number</label> <input type="text" name="editphonenumber" placeholder="Phone number">
                  
        

            <p> Address</p>
            <label >Address Line</label> <input type="text" name="editaddress" placeholder="Address line">
            <label >Postcode</label> <input type="text" name="editpostcode" placeholder="Postal code">
            <label >Country</label> <input type="text" name="editcountry" placeholder="Country">
          
    

            <p>Info</p>
            <label >Nationality</label> <input type="text" name="editnationality" placeholder="Nationality">
        
            <input type="submit" name="user_btn"  value="EDIT" />
        </form> 
        </div> 


        <div id="editfamily" class="FormHidden">
            <form id="familyform">

                <div id="wrapper">
                <div class = "form-message2">  </div>
                    <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
                    <tr>
                    <th>Name</th>
                    <th>Passport</th>
                    <th>Nationality ID</th>
                    <th>Age</th>
                    <th>Settings</th>
                    </tr>
                    
                    <tr id="row1">
                    <td id="name_row1">Nametest</td>
                    <td id="passport_row1">1233test</td>
                    <td id="nationalityid_row1">egytest</td>
                    <td id="age_row1">999</td>

                    <td>
                    <input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
                    <input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
                    <input type="button" value="Delete" class="delete" onclick="delete_row('1')">
                    </td>
                    </tr>
            
                    
                    <tr>
                    <td><input type="text" id="new_name"></td>
                    <td><input type="text" id="new_passport"></td>
                    <td><input type="text" id="new_nationalityid"></td>
                    <td><input type="text" id="new_age"></td>
                    <td><input type="button" class="add" onclick="add_row();" value="Add Row"></td>
                    </tr>
                    
                    </table>
                    </div>
            </form>
        </div>
    
</body>


<script type="text/javascript">
$(document).ready(function(){
    $("#personform").on('submit',function(k){
        k.preventDefault();
        $.ajax({
            type: "POST",
            url: "edituser.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            
            success:function(response2){
                $(".form-message").css("display","block");
                
                if(response2.status == 1)
                {
                   
                    $("#personform")[0].reset();
                    $(".form-message").html('<p>' + response2.message + '</p>');
                }
                else
                {
                    
                    $(".form-message").html('<p>' + response2.message + '</p>');
                }
            }
        });
    });
});


$(document).ready(function(){
    $("#familyform").on('submit',function(e){
        e.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "editfamily.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            
            success:function(response){
                $(".form-message").css("display","block");
                
                if(response.status == 1)
                {
                    $("#familyform")[0].reset();
                    $(".form-message").html('<p>' + response.message + '</p>');
                    setTimeout(function(){
                    window.location.reload(1);
                                     }, 2000);
                }
                else
                {
                    
                    $(".form-message").html('<p>' + response.message + '</p>');
                }
            }
        });
    });
});
</script>


<script>
function SwitchTabs(SelectedButton)
    {
        document.getElementById('button1').className = 'MainBar';
        document.getElementById('button2').className = 'MainBar';
        document.getElementById(SelectedButton).className='MainBarActive';

        if(SelectedButton=='button1')
        {
            document.getElementById('editpersonal').className = 'Form';
            document.getElementById('editfamily').className = 'FormHidden';
        }
        if(SelectedButton=='button2')
        {
            document.getElementById('editfamily').className = 'Form';
            document.getElementById('editpersonal').className = 'FormHidden';
            
        }
        
    }

        function edit_row(no)
        {
         document.getElementById("edit_button"+no).style.display="none";
         document.getElementById("save_button"+no).style.display="block";
            
         var name=document.getElementById("name_row"+no);
         var passport=document.getElementById("passport_row"+no);
         var age=document.getElementById("age_row"+no);
            
         var name_data=name.innerHTML;
         var passport_data=passport.innerHTML;
         var age_data=age.innerHTML;
            
         name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
         passport.innerHTML="<input type='text' id='passport_text"+no+"' value='"+passport_data+"'>";
         age.innerHTML="<input type='text' id='age_text"+no+"' value='"+age_data+"'>";
        }
        
        function save_row(no)
        {
         var name_val=document.getElementById("name_text"+no).value;
         var passport_val=document.getElementById("passport_text"+no).value;
         var age_val=document.getElementById("age_text"+no).value;
        
         document.getElementById("name_row"+no).innerHTML=name_val;
         document.getElementById("passport_row"+no).innerHTML=passport_val;
         document.getElementById("age_row"+no).innerHTML=age_val;
        
         document.getElementById("edit_button"+no).style.display="block";
         document.getElementById("save_button"+no).style.display="none";
        }
        
        function delete_row(no)
        {
         document.getElementById("row"+no+"").outerHTML="";
        }
        
        function add_row()
        {
         var new_name=document.getElementById("new_name").value;
         var new_passport=document.getElementById("new_passport").value;
         var new_age=document.getElementById("new_nationalityid").value;
         var new_age=document.getElementById("new_age").value;
            
         var table=document.getElementById("data_table");
         var table_len=(table.rows.length)-1;
         var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='passport_row"+table_len+"'>"+new_passport+"</td><td id='age_row"+table_len+"'>"+new_age+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";
        
         document.getElementById("new_name").value="";
         document.getElementById("new_passport").value="";
         document.getElementById("new_age").value="";
        }

 </script>



</html> 