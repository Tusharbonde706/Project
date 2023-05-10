<!-- Login-->
<?php
    session_start();
    $message="";
    if(isset($_POST['login'])) {
        include 'dbcon.php';
        $username=$_POST["uname"];
        $password=$_POST["password"];

        $dep_password = password_hash($password, PASSWORD_BCRYPT);

        //Admin
        $sql = "SELECT * FROM admin WHERE UserName='$username'";
	    $rs = mysqli_query($conn,$sql);
	    $numRows = mysqli_num_rows($rs);

        //User
        $sqlu = "SELECT * FROM `registered_user` WHERE Email='$username'";
	    $rsu = mysqli_query($conn,$sqlu);
	    $numRowsu = mysqli_num_rows($rsu);
	
        if($numRows  == 1){
            $row = mysqli_fetch_assoc($rs);
            if(password_verify($password,$row['Password'])){
                $_SESSION["id"] = $row['UserName'];
                $_SESSION["Name"] = $row['Name'];
                $_SESSION["Admin_Login"] = "true";

                header('Location:admin/dashboard_admin.php');
            }
            else{
                echo '<script>alert("Invalid Username or Password.")</script>';
            }
        }elseif($numRowsu  == 1){
            $rowu = mysqli_fetch_assoc($rsu);
            if(password_verify($password,$rowu['Password'])){
                $_SESSION["id"] = $rowu['RUserID'];
                $_SESSION["Name"] = $rowu['Name'];
                $_SESSION["email"]= $row['Email'];
                $_SESSION["Login"] = "true";

                header('Location:index.php');
            }
            else{
                echo '<script>alert("Invalid Username or Password.")</script>';
            }
        }

        else{
            echo '<script>alert("Invalid Username or Password.")</script>';
        }
      
        
        /*$result = mysqli_query($conn,"SELECT * FROM admin WHERE UserName='$username' AND Password='$dep_password' ");
        
        $row  = mysqli_fetch_array($result);


        $resultu = mysqli_query($conn,"SELECT * FROM `registered_user` WHERE Email='$username' AND Password='$dep_password'");
        $rowu  = mysqli_fetch_array($resultu);
        if(is_array($row)) {
        $_SESSION["id"] = $row['UserName'];
        $_SESSION["Name"] = $row['Name'];
        $_SESSION["Admin_Login"] = "true";
        $password1=$row['Password'];
        echo password_verify($password,$row['Password']);
        if(password_verify($password,$row['Password']))
            {
                        echo '<script>alert("Admin Login sucessful !")</script>';
                        header('Location:admin/dashboard_admin.php');
        }
        else {
            $message = "Invalid Username or Password!";
            echo '<script>alert("'.$dep_password.'")</script>';
           }
    }elseif (is_array($rowu)) {
        $_SESSION["id"] = $rowu['RUserID'];
        $_SESSION["Name"] = $rowu['Name'];
        $_SESSION["email"]= $row['Email'];
        $_SESSION["Login"] = "true";
        if(password_verify($password, $dep_password))
            {
                        echo '<script>alert("User Login sucessful !")</script>';
                        header('Location:index.php');
        }
        
    }*/
     
    }
    /*if(isset($_SESSION["id"])) {
        echo '<script>alert("Login sucessful !")</script>';
    }*/
?>

<!--Sign Up-->
<?php
    //session_start();
    if(isset($_POST['signup'])){
        include 'dbcon.php';
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $enp_password = password_hash($password, PASSWORD_BCRYPT);

        $query="insert into `registered_user`(`Name`,`Email`,`Password`) values('$name','$email','$enp_password');";
        $result = mysqli_multi_query($conn, $query);
        mysqli_query($conn,$query);
        if ($result) {
            echo '<script>alert("Registered successfully.")</script>';
            echo "<script>window.location.href='login.php'</script>";
        } 
        elseif (mysqli_errno($conn) == 1062) 
        {       
            print "<script type=\"text/javascript\">"; 
            print "alert('Already Registered with this email id, Please Log in!')"; 
            print "</script>";
        }
        else
        {
            echo "<script>alert('Something went wrong. Please try again.');</script>";  
            echo "<script>window.location.href='login.php'</script>";
        }   
        
    }
    
?>

<html>
    <head>
        <title>Sign in & Sign Up | Mostly True</title>
        
        
        <!-- Fevicon -->
        <link rel="shortcut icon" href="img/website_logo.webp" type="image/x-icon" />


        <!-- CSS -->
    
        <link href="css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

        <!-- Ion Icon -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    
        <style>
            .error-message{
            background-color: #fce4e4;
            border: 1px solid #fcc2c3;
            float: left;
            border-radius: 10px;
            }
            .error-message span{
                margin: 10px 0px;
                color: #cc0033;
                font-family: Helvetica, Arial, sans-serif;
                font-size: 13px;
                font-weight: bold;
                line-height: 20px;
                text-shadow: 1px 1px rgb(250 250 250 / 30%);
            }

        </style>
    </head>
    <body>
        <section>
            <div class="container">
                  <!-- Sign in-->
                <div class="user siginBx">
                    <div class="imgBx"><img src="img/login.webp" alt="login img"></div>
                    <div class="formBx">
                        <form method="post">
                            <h2>Sign In</h2>
                            <input type="text" placeholder="Username" name="uname" required>
                            <input type="password" placeholder="Password" name="password" id="password" required>
                            <ion-icon class="signin_eye" name="eye" id="eye" onclick="togglePassword()"></ion-icon>
                            <input type="submit" Value="Login" name="login">
                            <p class="signup">Don't have an account? <a href="#" onclick="toggleForm();">Sign up.</a></p>
                        </form>
                    </div>
                </div>

                <!-- Sign up-->
                <div class="user signupBx">
                    
                    <div class="formBx">
                        <form method="post" onsubmit="return validate();">
                            <h2>Create an account</h2>
                            <input type="text" placeholder="Name" name="name">
                            <input type="text" placeholder="Email Address" name="email" id="reg_email" required>
                            
                            <input type="password"placeholder="Create Password" name="password" id="Signuppassword" required>
                            <ion-icon class="signup_eye1" name="eye" id="eye" onclick="togglePasswordSignup()"></ion-icon>
                            <input type="password"placeholder="Confirm Password" name="cpassword" id="SignupConfirmpassword" onkeyup="check(this)">
                            <ion-icon class="signup_eye2" name="eye" id="eye" onclick="togglePasswordSignupConfirm()"></ion-icon>
                            <div class="error-message">
                                <span id="alert" ></span>
                            </div>
                            <br style="clear: left;" />
                            <input style="    background: #e73e49;"type="submit" Value="Sign Up" name='signup'>
                            
                            <p class="signup">Already have an account? <a href="#" onclick="toggleForm();">Sign in.</a></p>
                        </form>
                    </div>
                    <div class="imgBx"><img src="img/1.webp" alt="signup img"></div>
                </div>

            </div>
        </section>

        <script>
            
            var state= false;
            function togglePassword(){
                if(state){
                document.getElementById("password").setAttribute("type","password");
                state=false;
                }
                else{
                document.getElementById("password").setAttribute("type","text");
                state=true;
                }
            }

            var state2= false;
            function togglePasswordSignup(){
                if(state2){
                document.getElementById("Signuppassword").setAttribute("type","password");
                state2=false;
                }
                else{
                document.getElementById("Signuppassword").setAttribute("type","text");
                state2=true;
                }
            }

            var state3= false;
            function togglePasswordSignupConfirm(){
                if(state3){
                document.getElementById("SignupConfirmpassword").setAttribute("type","password");
                state3=false;
                }
                else{
                document.getElementById("SignupConfirmpassword").setAttribute("type","text");
                state3=true;
                }
            }



            function toggleForm(){
                section = document.querySelector('section');
                container = document.querySelector('.container');
                container.classList.toggle('active');
                section.classList.toggle('active');
            }

            var password=document.getElementById('Signuppassword');
            var flag=0;
            function check(elem){
                if(elem.value.length>0){
                    if(elem.value!=password.value){
                        document.getElementById('alert').innerText="Confirm password does not match";
                        flag=0;
                    }else{
                        document.getElementById('alert').innerText="";
                        flag=1;
                    }
                }else{
                    document.getElementById('alert').innerText="Please enter confirm password";
                    flag=0;
                }
            }

            function validate(){
                if(flag==1){
                    return true;
                }else{
                    return false;
                }
            }
            /*function emailvalidation()
                {
                    var email1=document.getElementById("reg_email").value;
                   

                if(email1.indexOf('@')<=0)
                    {
                        document.getElementById('email_error_message').innerHTML="*Invalid email address";
                        return false;
                    }

                    if((email1.charAt(email1.length-4)!='.')&&(email1.charAt(email1.length-3)!='.'))
                    {
                        document.getElementById('email_error_message').innerHTML="*Invalid email address";
                        return false;
                    }
                
                }*/
        </script>
    </body>
</html>