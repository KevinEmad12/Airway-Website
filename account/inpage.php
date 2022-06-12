<html>
    <head>
        <link rel="stylesheet" href="instyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body style="background-image: url('background.JPG');">
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <div class="form">
                <form id="myForm">
                <h1>Create Account</h1>
                <div class = "form-message">  </div>
                <input type="text"  name="new_name" placeholder="Name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' required />
                <input type="email"  name="new_email" placeholder="Email" required />
                <input type="password"  name="new_password" placeholder="Password" required/>
                <input type="password" name="confirmpass" placeholder="Confrim Password" required/>
                <input type="number" name="new_id" placeholder="National ID number" required/>
                <input type="file" name="new_pic" accept="image/png, image/jpeg" />
                    <label for="familysb">Family members:</label>
                    <select id="familysb">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                    <br>
                    <button name="familyadd" onclick="familyfunction()" type="button">add</button>
                    <br><br>
                    <div id="divfamily">
                    </div>
                    <input type="submit" name="submit_btn"  value="Sign Up" />       
                </form>
            </div>
            
        </div>
        <div class="form-container sign-in-container">
        <div class="form">
            <form id="loginform">
                <h1>Log in</h1>
                <div class = "form-message2">  </div>
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required/>
                <a href="forgotpass.html">Forgot your password?</a>
                <input type="submit" name="login_btn"  value="Sign In" />
            </form>
       </div>
        </div>
        <!-- OVERLAY for swiping -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already a member? Sign in</h1>
                    <p>login with your personal info</p>
                    <button class="ghost" id="signIn" onclick="y()">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Dont have account? Sign Up</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp" onclick="x()" >Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
    $("#loginform").on('submit',function(k){
        k.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "login.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            
            success:function(response2){
                $(".form-message2").css("display","block");
                
                if(response2.status == 1)
                {
                   
                    $("#loginform")[0].reset();
                    $(".form-message2").html('<p>' + response2.message + '</p>');
                }
                else
                {
                    
                    $(".form-message2").html('<p>' + response2.message + '</p>');
                }
            }
        });
    });
});
$(document).ready(function(){
    $("#myForm").on('submit',function(e){
        e.preventDefault();
       
        $.ajax({
            type: "POST",
            url: "signup.php",
            data:new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            
            success:function(response){
                $(".form-message").css("display","block");
                
                if(response.status == 1)
                {
                    $("#myForm")[0].reset();
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
</body>
</html>
<script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');
        function familyfunction() 
        {
            document.getElementById("divfamily").innerHTML = "";
            const valuef = document.getElementById("familysb").value;
            for(var i = 0;i<valuef;i++)
            {
                var fpic = document.createElement("input");
                fpic.setAttribute("type", "file");
                fpic.setAttribute("name", "familypic");
                document.getElementById("divfamily").append(fpic);
            }
            
        };
function x(){
	container.classList.add("right-panel-active");
}
function y(){
	container.classList.remove("right-panel-active");
}
</script>
