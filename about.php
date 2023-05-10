<html>

<head>
    <!--CSS Files-->
    <link href="css/about.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/header_black.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/footer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/scroll_to_top.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/acc_dropdown.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>About | Mostly True</title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="img/website_logo.webp" type="image/x-icon" />

    <!-- Google icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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



    <!-- About Us -->


    <div class="container">
        <div class="timeline">
            <ul>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">09th Oct 2021</h3>
                        <h1>
                            <ion-icon name="flag"></ion-icon> &ensp;&ensp;The beggining </h1>

                        <p>We decided on our topic with its future scope and its application. We were looking for real-life problems and their solution. And we finally decided on this project..</p>

                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">10th Oct 2021</h3>
                        <h1><span class="material-icons">newspaper</span> &ensp;Our Project</h1>
                        <p>So basically our project tells about the news that it is real or fake. This is only possible with the help of ML(Machine Learning) using python and other web development tools. </p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">17th Oct 2021</h3>
                        <h1>
                            <ion-icon name="search"></ion-icon> &ensp;&ensp;Resources </h1>
                        <p>We started collecting resources and materials for our website. We read many articles and watched video about this and finally came to a solution for this problem</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">19th Oct 2021</h3>
                        <h1><span class="material-icons"> badge </span> &ensp;Website Name</h1>
                        <p>So Finally we decided to name our fake news detection website as MostlyTrue which implies the news is true or not.</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">28th Oct 2021</h3>
                        <h1>
                            <ion-icon name="document-outline"></ion-icon> &ensp;Documentation</h1>
                        <p>We have completed all the documentation and diagrams related to our system.</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">10th Nov 2021</h3>
                        <h1>
                            <ion-icon name="code-slash-outline"></ion-icon> &ensp;Let's Code</h1>
                        <p>We started coding for our website. We were working on all the phases for our website and we divided our website into smaller iterations (Agile Model).</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">12th Jan 2022</h3>
                        <h1><span class="material-icons">
                            bug_report
                            </span> &ensp;Beta Tesing</h1>
                        <p>We have completed our coding and now it's under the beta testing phase, where we are checking all the possible inputs users can check.</p>
                    </div>
                </li>
                <li>
                    <div class="timeline-content">
                        <h3 class="date">22nd Jan 2022</h3>
                        <h1><span class="material-icons">
                            devices
                            </span> &ensp;Website is Live</h1>
                        <p>So our website is ready and it has passed all the tests properly and now it is live for all the users to use.</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>



    <!-- Footer -->


    <footer style="margin-top: 10px;">
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


    <!-- Scroll To Top-->


    <div class="scrollTop" onclick="scrollToTop();">

    </div>

    <script>
        window.addEventListener('scroll', function() {
            var scroll = document.querySelector('.scrollTop');
            scroll.classList.toggle("active", window.scrollY > 500)
        })

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        }
    </script>

</body>

</html>