
<?php
    session_start();
    if(isset($_POST['news_check'])) {
        include 'dbcon.php';
        $news=$_POST["input_news"];
        $temp=exec("python app.py .$news");
        if($temp==1)
        {
            echo '<script>alert("Yaayyy...!!! This News is True.");</script> ';
        }
        elseif($temp==0)
        {
            echo '<script>alert("Ooops...!!! This News is False.");</script> ';
        }

        /* Inserting Search Result for Logged in user*/
        if(isset($_SESSION['Login'])){
            $id=$_SESSION["id"];
            $news=$_POST["input_news"];
            if($temp==1)
            {
                $result='True';
            }
            elseif($temp==0)
            {
                $result='False';
            }
            $adden_on=date('Y-m-d h:i:s');

            mysqli_query($conn,"INSERT INTO `search_result` (`Headline`, `Result`, `Date`) VALUES ('$news', '$result', '$adden_on')");
            
            /* Fetching Search ID from database */
            $query = "SELECT SearchID FROM `search_result` WHERE Headline='$news';";
                                                $result = mysqli_query($conn, $query);  
                                                $row = mysqli_fetch_array($result);
                                                $searchid= $row['SearchID'];


            mysqli_query($conn,"INSERT INTO `ruser_join` (`RUserID`, `SearchID`) VALUES ('$id','$searchid')");
        }
        /* Inserting Search Result for Anonymous user*/
        else
        {
            $news=$_POST["input_news"];
            if($temp==1)
            {
                $result='True';
            }
            elseif($temp==0)
            {
                $result='False';
            }
            $adden_on=date('Y-m-d h:i:s');

            mysqli_query($conn,"INSERT INTO `search_result` (`Headline`, `Result`, `Date`) VALUES ('$news', '$result', '$adden_on')");
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostly True</title>

    <link rel='stylesheet' href='https://npmcdn.com/flickity@1.2/dist/flickity.min.css'>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

    <style type="text/css">
        .no-fouc {
            display: none;
            
        }
        
    </style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

    <!-- Typed JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>



    <!-- CSS Files -->
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/header.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/footer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/cards.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/partners.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/testimonial.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/donation.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/acc_dropdown.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/scroll_to_top.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/flip_card.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
        

    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/aos.css">

    <!-- Fevicon -->
    <link rel="shortcut icon" href="img/website_logo.webp" type="image/x-icon" />

    <!-- Google Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');
    
    /* Cards font */
        
        @import url('https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap');
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
            /*session_start();*/
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

    <!-- Sticky Header JS -->

    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>


    <!-- Section - I -->


    <div class="section1">
        <div class="tag_line">
            <h1>
                ''The only difference between being<br>uninformed and misinformed is that one is<br>your choice and the other is theirs...''
            </h1>
        </div>
        <div class="tagline_2">
     
            <h2>
                Just Do, Mostly True!
            </h2>
        </div>
        <button onclick="window.location.href='#section2'" class="search"><span>Search Now</span></button>

    </div>


    <!--Typeing JS -->

    <script>
        var typed = new Typed(".tagline_2 h2", {
            strings: ["Just Do, Mostly True!", "Just Do, Mostly True!"],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true,
            showCursor: false
        });
    </script>


    <!-- Section - II -->


    <section class="section2" id="section2">
        <div class="container1">
            <div class="text">
                Search Your Headline
            </div>

            <form method="POST">
            <div class="design">
                <div class="searchPanel">
                    
                    <input type="text" name="input_news" id="" placeholder="Paste Your Headline Here" maxlength="250" required>
                    <ion-icon name="newspaper-outline"></ion-icon>
                </div>
            </div>
            <button type="submit" class="checkme" name="news_check" onclick="myFunction()">Check Me</button>
            </form>
            

            </div>
    </section>

    <!-- Section - III -->


    <section class="section3" id="section3">
        <div class="container">
            <div class="serviceBox">
                <div class="icon" style="--i:#4eb7ff">
                    <i class="material-icons">
                        newspaper
                    </i>
                </div>
                <div class="content">
                    <h2 style="font-family:'PT Sans Narrow', sans-serif;letter-spacing: 2px;">Fake News</h2>
                    <p style=" font-size: 17px;">Fake news or junk news or pseudo-news is a type of yellow journalism or propa- ganda that consists of deliberate disinformation or hoaxes spread via traditional print and broadcast news media or online social media.Social media is
                        a decentralized source of information with minimal credibility.The issue of fake news has become a serious problem in India because of high digital illiteracy and low digital penetration.</p>
                </div>
            </div>
            <div class="serviceBox">
                <div class="icon" style="--i:#fd6469">
                    <ion-icon name="golf-outline"></ion-icon>
                </div>
                <div class="content">
                    <h2 style="font-family:'PT Sans Narrow', sans-serif;letter-spacing: 2px;">Our Goal</h2>
                    <p style="font-size: 18px;">The goal of the Fake News Challenge is to explore how artificial intelligence technologies, particularly machine learning and natural language processing, might be leveraged to combat the fake news problem. We believe that these Al
                        technologies hold promise for significantly automating parts of the procedure human fact checkers use today to determine if a story is real or a hoax.</p>
                </div>
            </div>

            <div class="serviceBox">
                <div class="icon" style="--i:#ffb508">
                    <i class="material-icons">manage_accounts
                    </i>
                </div>
                <div class="content">
                    <h2 style="font-family:'PT Sans Narrow', sans-serif;letter-spacing: 2px;">Process</h2>
                    <p style="font-size: 17.5px;">Fortunately, the process can be broken down into steps or stages. A helpful first step towards identifying fake news is to understand what other news organizations are saying about the topic. We believe automating this process, called
                        Stance Detection, could serve as a useful building block in an Al assisted fact-checking pipeline.</p>
                </div>
            </div>

        </div>

        <!-- Section III Icon -->

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    </section>

    <!-- SECTION - IV (Customer reviews)-->
    <section class="section4" id="section4">

        <h1>CUSTOMER REVIEWS</h1>


        <!-- Speech Bubble Slider -->

        <section class="quotes">
            <div class="bubble" style="height:250px">
                <blockquote>I think Mostlytrue website is extremely helpful. It's easy to use so I can get valuable feedback, you know you can't trust news nowadays. Thank you for making this awesome website for us.
                </blockquote>
                <div></div>
                <cite> James Maxwell</cite> </div>
            <div class="bubble">
                <blockquote> Found that this website is very effective, user friendly interface. I am thoroughly satisfied with it. Highly recommended and have done so with my frineds etc.
                </blockquote>
                <div></div>
                <cite>  Mihir Mandviya</cite> </div>
            <div class="bubble">
                <blockquote>This is the best website I have seen till now the user interface is very easy and nice anyone can easily findthe results and stay aware of the fake news and frauds around the world.
                </blockquote>
                <div></div>
                <cite> Tushar Soni</cite> </div>
            <div class="bubble">
                <blockquote>In this pandemic, I was very much struggling with fake news. I can't trust social media for news as there is all clickbait and fraud content so thankful for this website now I can cross-check any news around me. </blockquote>
                <div></div>
                <cite> Anjali Sharma </cite> </div>
        </section>
        <br><br><br>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js'></script>
        <script src="js/testimonial.js"></script>

    </section>

    <!-- SECTION - V (Our News Partners)-->
    <div class="partner">
        <h2>Our Trusted News Partners</h2>
    </div>

    <div class="slider">
        <div class="slide-track">
            <div class="slide "><img src="news_icons/1." alt=""></div>
            <div class="slide "><img src="news_icons/2.webp" alt=""></div>
            <div class="slide "><img src="news_icons/3.webp" alt=""></div>
            <div class="slide "><img src="news_icons/4.webp" alt=""></div>
            <div class="slide "><img src="news_icons/5.webp" alt=""></div>
            <div class="slide "><img src="news_icons/6.webp" alt=""></div>
            <div class="slide "><img src="news_icons/7.webp" alt=""></div>
            <div class="slide "><img src="news_icons/8.webp" alt=""></div>
            <div class="slide "><img src="news_icons/9.webp" alt=""></div>
            <div class="slide "><img src="news_icons/10.webp" alt=""></div>
            <!-- same 9 slides d<img src="news_icons/5.webp" alt="">ubled (duplicate) -->
            <div class="slide "><img src="news_icons/11.webp" alt=""></div>
            <div class="slide "><img src="news_icons/12.webp" alt=""></div>
            <div class="slide "><img src="news_icons/13.webp" alt=""></div>
            <div class="slide "><img src="news_icons/14.webp" alt=""></div>
            <div class="slide "><img src="news_icons/15.webp" alt=""></div>
            <div class="slide "><img src="news_icons/16.webp" alt=""></div>
            <div class="slide "><img src="news_icons/17.webp" alt=""></div>
            <div class="slide "><img src="news_icons/18.webp" alt=""></div>
            <div class="slide "><img src="news_icons/1.webp" alt=""></div>
            <div class="slide "><img src="news_icons/2.webp" alt=""></div>
        </div>
    </div>



    <!-- SECTION - VI (Donation Part)-->


    <section class="section6">
        <div class="section_6">
            <div class="tagline_3">
                <h1>
                    Do You Love Our Work?
                </h1>
            </div>
            <!--<div class="tagline_4">
                <h2>
                    'Want to <br>Buy me a Coffee? <br>Now You Can!''

                </h2>
            </div>
        </div>-->
            <div class="tag2" id="tag2">
                <img src="./img/support.gif">
            </div>
            <div class="coffee_circle">
                <img src="./img/coffee_circle.webp">
            </div>

            <!--<div class="tag3" id="tag3">
            <h1 style="font-weight: lighter;    "> Buy me a Coffee? </h1><br>
            </div>
            <div class="tag4" id="tag4">
                <h1> Now You Can! </h1>
            </div> -->
            <button class="coffee_button" id="rzp-button1"><a href="#"><img src="./img/coffee_button.gif"></a></button>

            <!-- Payment (Buy me a coffee) Using Razor pay API-->

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
            <script>
                var options = {
                    "key": "rzp_test_iQetFg6HIBdhuT",
                    "amount": "15000",
                    "currency": "INR",
                    "name": "Mostly True",
                    "description": "Buy Me A Coffee",
                    //"image": "https://photos.app.goo.gl/Eq92pD8vo9QCmmwr5",

                    "handler": function(response) {

                        jQuery.ajax({
                            type: 'post',
                            url: 'payment.php',
                            data: 'payment_id=' + response.razorpay_payment_id,
                            success: function(result) {
                                window.location.href = "payment_ty.php"
                            }
                        });
                    }
                };
                var rzp1 = new Razorpay(options);
                document.getElementById('rzp-button1').onclick = function(e) {
                    rzp1.open();
                    e.preventDefault();
                }
            </script>


    </section>




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



    <!-- AOS js Library -->

    <script src="./js/aos.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>



</html>

