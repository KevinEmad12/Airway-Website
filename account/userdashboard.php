<?php require_once('/apps/xampp/htdocs/project/layout/header.php'); ?>
<html>
    <head>
        <link rel="stylesheet" href="profileCSS.css">
        <link rel="stylesheet" href="headerfooter.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
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
                <div class = "form-message2">  </div>
                    <table class="table" id="data_table">
                    <tr>
                    <th>Name</th>
                    <th>National ID </th>
                    <th>Age</th>
                    <th>Settings</th>
                    </tr>
                    
                    <tr id="row1">
                    <td id="name_row1"></td>
                    <td id="nationalid_row1"></td>
                    <td id="age_row1"></td>

                    <td>
                    <input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
                    <input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
                    <input type="button" value="Delete" class="delete" onclick="delete_row('1')">
                    </td>
                    </tr>
            
                    
                    <tr>
                    <td><input type="text" id="new_name"></td>
                    <td><input type="text" id="new_nationalid"></td>
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


function familydatabase()
{
    $(document).ready(function(){
    $("#familyform").on('click',function(e){
        e.preventDefault();
        alert("test");
        $.ajax({
            type: "POST",
            url: "editfamily.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            
            success:function(response){
                $(".form-message2").css("display","block");
                
                if(response.status == 1)
                {
                    $("#familyform")[0].reset();
                    $(".form-message2").html('<p>' + response.message + '</p>');
                    setTimeout(function(){
                    window.location.reload(1);
                                     }, 2000);
                }
                else
                {
                    
                    $(".form-message2").html('<p>' + response.message + '</p>');
                }
            }
        });
    });
});

}

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
	
 var name=document.getElementById("name_row1"+no);
 var nationalid=document.getElementById("nationalid_row1"+no);
 var age=document.getElementById("age_row1"+no);
	
 var name_data=name.innerHTML;
 var nationalid_data=nationalid.innerHTML;
 var age_data=age.innerHTML;
	
 name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
 nationalid.innerHTML="<input type='text' id='nationalid_text"+no+"' value='"+nationalid_data+"'>";
 age.innerHTML="<input type='text' id='age_text"+no+"' value='"+age_data+"'>";
}

function save_row(no)
{
 var name_val=document.getElementById("name_text"+no).value;
 var nationalid_val=document.getElementById("nationalid_text"+no).value;
 var age_val=document.getElementById("age_text"+no).value;

 document.getElementById("name_row1"+no).innerHTML=name_val;
 document.getElementById("nationalid_row1"+no).innerHTML=nationalid_val;
 document.getElementById("age_row1"+no).innerHTML=age_val;

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
 var new_nationalid=document.getElementById("new_nationalid").value;
 var new_age=document.getElementById("new_age").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row1"+table_len+"'>"+new_name+"</td><td id='nationalid_row1"+table_len+"'>"+new_nationalid+"</td><td id='age_row1"+table_len+"'>"+new_age+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_name").value="";
 document.getElementById("new_nationalid").value="";
 document.getElementById("new_age").value="";
}

 </script>



</html> 
