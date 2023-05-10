<?php
    if(isset($_POST['send'])) {
        include 'dbcon.php';
        $Fname=$_POST["Fname"];
        $Lname=$_POST["Lname"];
        $Email=$_POST["Email"];
        $Number=$_POST["Number"];
        $Message=$_POST["Message"];
      
        

        $query="INSERT INTO `contact` (`Fname`, `Lname`, `Email`, `Number`, `Message`) VALUES('$Fname','$Lname','$Email','$Number','$Message')";
        //$query="insert into `contact us`(`FName`,`LName`,`Email`,`Number`,`Message') values('$Fname','$Lname','$Email','$Number','$Message')";
        $result = mysqli_multi_query($conn, $query);
        if ($result) {
            //echo '<script>alert("Registered successfully.")</script>';
            echo "<script>window.location.href='contact_ty.php'</script>";
        } 
}
?>
    

<html>

<head>
    <!--CSS Files-->
    <link href="css/contact.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/header_black.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/footer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/acc_dropdown.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <title>Contact | Mostly True</title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="img/website_logo.webp" type="image/x-icon" />


    <!-- Google Fonts-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');
    </style>


</head>

<body>

    <!-- Header -->


    <header>
        <img src="img/logo.webp" alt="website logo">

        <a href="index.php" class="logo"><span style="font-family: 'Cabin', sans-serif;">Mostly</span><span style="font-family: 'Courgette', cursive;">true</span></a>
        <ul>
            <li>
                <a href="index.php">Home</a></li>
            <li>
                <a href="weather.php">Weather</a></li>
            <li>
                <a href="latest_news.php">Latest News</a></li>
            <li>
                <a href="about.php">About</a></li>
            <li>
                <a href="contact.php">Contact</a></li>
        </ul>

        <?php  
            session_start();
            if(isset($_SESSION['Login'])){
                echo ' &ensp; &ensp;


                <!-- Account details-->


                <div class="action">
                    <div class="profile" onclick="menuToggle();">
                    <img src="https://avatars.dicebear.com/api/initials/'.$_SESSION["Name"].'.svg">
                    </div>
                    <div class="menu">
                    <h3>'. $_SESSION["Name"] . '</h3>
                        <ul style="display: block;">
                            <li><img src="img/profile.webp"><a href="user/dashboard_user.php">Dashboard</a></li>
                            <li><img src="img/logout.webp"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
               
                ';
            }else{
                echo "<button class='login' onclick='window.location.href=\"login.php\"'><span>LOGIN</span></button>";
                
            }    
        
        ?>
                
                
        <script>
                    function menuToggle() {
                        const toggleMenu = document.querySelector('.menu');
                        toggleMenu.classList.toggle('active')
                    }
        </script>



    </header>

    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>



    <!--Contact Us-->
    <section>
        <div class="container">
            <div class="contactinfo">
                <div>
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><img src="img/location.webp" ></span>
                            <span onclick="window.location='https://goo.gl/maps/q9megdVyX6bevjZMA'"> 19, Prin.V.K. Jaog Path, Bund Garden Rd, Pune, Maharashtra 411001</span>
                        </li>

                        <li>
                            <span><img src="img/mail.webp"></span>
                            <span onclick="window.location='mailto:info@mostlytrue.com'">info@mostlytrue.com</span>
                        </li>

                        <li>
                            <span><img src="img/call.webp"></span>
                            <span onclick="window.location='tel:1234567890'">1234567890</span>
                        </li>
                    </ul>
                </div>


                <!-- Google Maps -->
                <ul class="GoogleMaps">

                    <div id="googleMap" style="width:100%;height:200px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.9300261334743!2d73.87813511422586!3d18.532063973660936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c0f88217370f%3A0x6d37fbed17f04892!2sNess%20Wadia%20College%20of%20Commerce!5e0!3m2!1sen!2sin!4v1637309480912!5m2!1sen!2sin"
                            width="100%" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>



                </ul>

            </div>
            <div class="contactForm">
                <h2>Send a Message</h2>
                <form class="formBox" method="POST" id="form" onsubmit="return email_validation()&&phone_validation();">
                    <div class="inputBox w50">
                        <input type="text" name="Fname" required>
                        <span>First Name</span>
                    </div>
                    <div class="inputBox w50">
                        <input type="text" name="Lname" required>
                        <span>Last Name</span>
                    </div>
                    <div class="inputBox w51">
                        <input type="text" name="Email" id="reg_email" required onkeyup="email_validation()">
                        <span>Email Address</span>
                        <span id="text"></span>
                    </div>
                    <div class="inputBox w52" id="phone_validation">
                        <input type="text" name="Number" id="reg_phoneno" required onkeyup="phone_validation()">
                        <span>Mobile Number</span>
                        <span id="phone_text"></span>

                    </div>
                    <div class="inputBox w100">
                        <textarea name="Message" required></textarea>
                        <span>Write your message here...</span>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" value="Send" name="send">
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Contact form validation-->
    <script>
        /* Email validation */
        function email_validation() {
            var form = document.getElementById("form");
            var email = document.getElementById("reg_email").value;
            var text = document.getElementById("text");
            var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (email.length > 0) {
                if (email.match(pattern)) {
                    form.classList.add("valid");
                    form.classList.remove("invalid");
                    text.innerHTML = "Your Email Address is Valid.";
                    text.style.color = "#4caf50";
                    return true
                } else {
                    form.classList.remove("valid");
                    form.classList.add("invalid");
                    text.innerHTML = "Invalid Email Address";
                    text.style.color = "#FF0000";
                    return false;
                }
            } else {
                text.innerHTML = "";
                form.classList.remove("invalid");
            }
        }


        /* Phone number validation validation */
        function phone_validation() {
            var form = document.getElementById("form");
            var phone = document.getElementById("reg_phoneno").value;
            var text = document.getElementById("phone_text");
            var pattern = /^[6789]\d{9}$/;
            if (phone.length > 0) {
                if (phone.match(pattern)) {
                    form.classList.add("valid_phone");
                    form.classList.remove("invalid_phone");
                    text.innerHTML = "Valid Phone number.";
                    text.style.color = "#4caf50";
                    return true
                } else {
                    form.classList.remove("valid_phone");
                    form.classList.add("invalid_phone");
                    text.innerHTML = "Invalid Phone number";
                    text.style.color = "#FF0000";
                    return false;
                }
            } else {
                text.innerHTML = "";
                form.classList.remove("invalid_phone");

            }
        }
    </script>

    <!-- Footer -->


    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li>
                <a href="https://www.facebook.com">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
            </li>
            <li>
                <a href="https://twitter.com">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
        </ul>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="team.php">Team</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <p>Mostlytrue &copy; 2022 | All Rights Reserved</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>