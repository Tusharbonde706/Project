<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- CSS Files-->
    <link href="css/header_black.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/footer.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="css/acc_dropdown.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <!-- Fevicon -->
    <link rel="shortcut icon" href="img/website_logo.webp" type="image/x-icon" />


    <title>News | Mostly True</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cabin&display=swap');
        body {
            background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(./img/news_background.webp);
        }
        
        a {
            color: white;
            text-decoration: none;
            font-size: 25px;
        }
        
        a:hover {
            color: black;
        }
        .no_news{
            text-align: center;
            padding-left: 60vh;
            margin: 0 5px;
            
        }
    </style>


</head>

<body>
    <!-- Header -->
    <header>
        <img src="img/logo.webp" alt="website logo">

        <a href="index.php" class="logo"><span style="font-family: 'Cabin', sans-serif;">Mostly</span><span style="font-family: 'Courgette', cursive;">true</span></a>
        <ul style="margin-bottom: 0px;padding-left: 0px ;">
            <li>
                <a href="index.php" style="font-size: 21px;">Home</a></li>
            <li>
                <a href="weather.php" style="font-size: 21px;">Weather</a></li>
            <li>
                <a href="latest_news.php" style="font-size: 21px;">Latest News</a></li>
            <li>
                <a href="about.php" style="font-size: 21px;">About</a></li>
            <li>
                <a href="contact.php" style="font-size: 21px;">Contact</a></li>
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


    <div class="container m-5" style="position: relative;top: 76px;left: 45px;">
        <div class="d-flex justify-content-center mb-3"><img src="./img/news.webp  " width="150px"></div>
        <div class="col-12 d-flex justify-content-center">
            <div class="input-group mb-3" style="width: 50%;transform: scale(1.3);">
                <input type="text" class="form-control shadow" id="keyword" placeholder="What you looking for ?" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-danger shadow" type="submit" onclick="getnews()" id="button-addon2">Search</button>
            </div>
        </div>

    </div>
    <div class="container" style=" position: relative; top: 45px;">
        <!--Spinner-->
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-danger" id="load_ui" role="status" style="margin: 70px 0px 200px 0px; padding: 50px 50px;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="posts" style="margin-bottom: 200px;"></div>

    </div>


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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        getnews();

        function getnews() {
            $(".posts").text("");
            var keyword = $("#keyword").val();
            if (keyword == '') {
                keyword = "India";
            }
            var url = "http://newsapi.org/v2/top-headlines?q=" + keyword + "&apiKey=abb03acd91554991998cb3adf435cf60"

            $("#load_ui").show(); /*Spinner show*/
            $.get(url, (response) => {
                $("#load_ui").hide(); /*Spinner hide*/
                var count =response.totalResults;
                console.log(count);
                if(count==0)
                {
                    var html = `<div class="card m-3 shadow">
                    <div class="row g-0">
                        
                        <div class="col-md-8">
                        <h3 class="no_news">No Search Result Found</h3>
                        </div>
                    </div>
                    </div>`;

                    $(".posts").append(html);
                }
                else
                {
                    for (i = 0; i < 6; i++) {
                    var html = `<div class="card m-3 shadow">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="${response.articles[i].urlToImage}" class="img-fluid rounded-start" alt="No Image Available">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${response.articles[i].title}</h5>
                            <p class="card-text">${response.articles[i].content}</p>
                            <p class="card-text"><small class="text-muted">${response.articles[i].publishedAt} | ${response.articles[i].source.name} - ${response.articles[i].author}</small></p>
                        <a href="${response.articles[i].url}" target="_blank" class="btn btn-secondary">Read More</a>
                        <p></p>
                        </div>
                        </div>
                    </div>
                    </div>`;

                    $(".posts").append(html);
                }
                }
                
            })
        }
    </script>
</body>

</html>