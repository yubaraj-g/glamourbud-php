<?php
include("./dbconn.php");
// include("./login.php");

$session = session_start();
$session;

function sess_log($s_alrt)
{
    echo "<script>
        console.log('$s_alrt');
        console.log('We are on homepage');
    </script>";
}

if ($session) {
    sess_log("session started");
}

// logging session in console (literally a comment)

function alert_welcome($useremail)
{
    echo
    "<script>
        console.log('Welcome ' . '$useremail');
        
    </script>";
}

alert_welcome($_SESSION['user_email']);


// if login fails then go back to login.php (literally comment)

$loginPage = './login.php';
$homepage = './index.php';

$userSession = $_SESSION['user_email'];

if (!$userSession) {
    header('location: ' . $loginPage);
    exit();

    // script to log the error for accessing the page directly --------------(keep this commented)---------
    // echo "<script>
    //     console.log('login failed, wrong credentials.');
    // </script>"; ----------(keep this comented)----------

} else if (isset($_POST['logout'])) {
    $sessionClose = session_destroy();
    $sessionClose;

    header('location: ' . $loginPage);
    die();

    echo "<script>console.log('session closed');</script>";
}
// else {
//     header('location: ' . $homepage);
//     die();
// }



?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - GlamourBud</title>

    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">

    <link rel="stylesheet" href="./css/index.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="w-full">

    <!-- main navbar is here -->
    <nav class="navbar navbar-expand-lg bg-light px-4 w-full" style="height: 70px">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./img/gb-logo.png" alt="glamourbud-logo" width="120px" height="40px"></a>

            <!-- hamburger starts -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- hamburger ends -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold d-flex flex-grow-1 justify-content-center">
                    <li class="nav-item mx-2">
                        <a class="nav-link disabled" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./about.php">About us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./contact.php">Contact us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./associate-register.php">Become an associate</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="./support.php">Support</a>
                    </li>
                </ul>
                <div class="btn btn-light d-flex signin-btn">
                    <img src="./img/gg_profile.png" alt="profile-icon" width="40px" height="40px">
                    <div class="d-flex flex-column btn-text-wrapper">
                        <?php
                        $email = $_SESSION['user_email'];

                        $query = "SELECT * FROM users WHERE email = '$email' ";

                        $runQuery = mysqli_query($conn, $query);

                        $totalRowsData = mysqli_num_rows($runQuery);

                        if ($totalRowsData == 1) {
                            while ($row = mysqli_fetch_assoc($runQuery)) {
                                echo "<p>Hello <i>" . $row["first_name"] . "</i></p>";
                            }
                        } else {
                            echo "<p>Hello err_user!</p>
                                <script>console.log('error in users database. Please check database for repeated emails.')</script>";
                        }
                        ?>
                        <!-- <p>Hello</p> -->
                        <p>Sign in or Sign up</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- 2nd navbar starts here -->
    <nav class="nav2 navbar-dark navbar-expand-lg bg-dark w-full">
        <div class="container-fluid w-full">

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <div class="d-flex collapse navbar-collapse px-4 py-2 gap-3 align-center" id="navbarSupportedContent">
                <ul class="d-flex align-center navbar-nav mb-lg-0 d-flex flex-grow-1 justify-content-between fw-normal margin-r-5">

                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Select your location
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ganeshguri</a></li>
                            <li><a class="dropdown-item" href="#">Dispur</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Show all</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item dropdown dropdown-toggle" style="width: 17%">
                        <select class="nav-link dropdown-menu form-select bg-dark text-light" aria-label="Default select example" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <option selected class="bg-light nav-link text-dark">Select your location</option>
                            <option value="1" class="bg-light text-dark">Azara</option>
                            <option value="2" class="bg-light text-dark">Bamunimaidan</option>
                            <option value="3" class="bg-light text-dark">Basistha</option>
                            <option value="4" class="bg-light text-dark">Beharbari</option>
                            <option value="5" class="bg-light text-dark">Beltola</option>
                            <option value="6" class="bg-light text-dark">Bhangagarh</option>
                            <option value="6" class="bg-light text-dark">Bharalumukh</option>
                            <option value="6" class="bg-light text-dark">Bhetapara</option>
                            <option value="6" class="bg-light text-dark">Borbari</option>
                            <option value="6" class="bg-light text-dark">Borjhar</option>
                            <option value="6" class="bg-light text-dark">Chandmari</option>
                            <option value="6" class="bg-light text-dark">Christianbasti</option>
                            <option value="6" class="bg-light text-dark">Dispur</option>
                            <option value="6" class="bg-light text-dark">Ganeshguri</option>
                            <option value="6" class="bg-light text-dark">Geetanagar</option>
                            <option value="6" class="bg-light text-dark">GS Road</option>
                            <option value="6" class="bg-light text-dark">Hatigaon</option>
                            <option value="6" class="bg-light text-dark">Hengerabari</option>
                            <option value="6" class="bg-light text-dark">Jalukbari</option>
                        </select>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Home Visit</a></li>
                            <li><a class="dropdown-item" href="#">Parlour Services</a></li>
                            <li><a class="dropdown-item" href="#">Salon Services</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <li><a class="dropdown-item" href="#">All Parlours</a></li>
                            <li><a class="dropdown-item" href="#">All Salons</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu specials-regulars">
                            <li class="specials">
                                <a class="dropdown-item" href="#">Specials &raquo;</a>
                                <ul class="specials-ul dropdown-submenu dropdown-menu">
                                    <li><a href="" class="dropdown-item">Trending</a></li>
                                    <li><a href="" class="dropdown-item">Traditional</a></li>
                                    <li><a href="" class="dropdown-item">Bridal</a></li>
                                    <li><a href="" class="dropdown-item">Grooming</a></li>
                                </ul>
                            </li>
                            <li class="regulars">
                                <a class="dropdown-item" href="#">Regular Services &raquo;</a>
                                <ul class="regulars-ul dropdown-submenu dropdown-menu">
                                    <li><a href="" class="dropdown-item">Hair Cutting</a></li>
                                    <li><a href="" class="dropdown-item">Head Massage</a></li>
                                    <li><a href="" class="dropdown-item">Body Massage</a></li>
                                    <li><a href="" class="dropdown-item">Hair Styling</a></li>
                                    <li><a href="" class="dropdown-item">Makeup</a></li>
                                    <li><a href="" class="dropdown-item">Beard Cutting / Trimming / Styling</a></li>
                                    <li><a href="" class="dropdown-item">Facial</a></li>
                                    <li><a href="" class="dropdown-item">Face Massage</a></li>
                                    <li><a href="" class="dropdown-item">Manicures & Pedicures</a></li>
                                    <li><a href="" class="dropdown-item">Waxing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Discounts
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">all</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex w-max35" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>

                <a href="./booking-cart.php" class="btn btn-dark d-flex booking-cart">
                    <img src="./img/booking-cart.png" alt="profile-icon" width="40px" height="40px">
                    <div class="d-flex flex-column btn-text-wrapper">
                        <p>Your</p>
                        <p>Bookings</p>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <!-- navbar ended -->

    <!-- Carousel first -->
    <div class="container my-4 mx-4 w-full cards-large-show">

        <div class="d-flex section-headings">
            <p class="text-light bg-primary rounded px-2 py-1 fw-semibold">The Premium Provisions from Glamourbud <img src="./img/premium-icon.png" alt="premium-icon" width="28" height="25"></p>

            <p class="mx-3 fw-normal">Book from your choice of budstation</p>
        </div>


        <!-- <hr class="my-4"> -->

        <!--Carousel Wrapper-->
        <div class="carousel-wrapper my-4">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <button class="c-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon prev-ico" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="c-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!--/.Carousel Wrapper-->


    </div>


    <!-- Carousel mobile -->

    <div class="container my-4 mx-4 w-full mobile-show">
        <div class="d-flex section-headings">
            <p class="text-light bg-primary rounded px-2 py-1 fw-semibold">The Premium Provisions from Glamourbud <img src="./img/premium-icon.png" alt="premium-icon" width="28" height="25"></p>

            <p class="mx-3 fw-normal">Book from your choice of budstation</p>
        </div>

        <div class="carousel-wrapper">
            <div id="carouselExampleControls2" class="carousel slide cards-mobile" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div> -->

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev z-99" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next z-99" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>


    <!-- Carousel second -->
    <div class="container my-4 mx-4 w-full cards-large-show">

        <div class="d-flex section-headings">
            <p class="text-light bg-primary rounded px-2 py-1 fw-semibold">Available Budstations Near You <img src="./img/premium-icon.png" alt="premium-icon" width="28" height="25"></p>

            <p class="mx-3 fw-normal">Book from your choice of budstation</p>
        </div>


        <!-- <hr class="my-4"> -->

        <!--Carousel Wrapper-->
        <div class="carousel-wrapper my-4">
            <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="carousel-item">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row px-5 gap">
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg px-0 card d-flex flex-col">
                                <img src="./img/saloninterior.jpg" class="card-img-top" alt="salon-image">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex w-full justify-content-between align-center">
                                        <h4 class="card-title my-0">DAVID'S</h4>
                                        <div class="d-flex">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                            <img src="./img/star-fill.png" alt="star-rating">
                                        </div>
                                    </div>

                                    <div class="d-flex align-center">
                                        <img src="./img/map-pin.png" alt="map-icon">
                                        <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                                    </div>


                                    <p class="d-flex icon-gap">
                                        <img src="./img/wifi.png" alt="wifi-icon">
                                        <img src="./img/tv.png" alt="wifi-icon">
                                        <img src="./img/cctv.png" alt="wifi-icon">
                                    </p>
                                    <div class="d-flex w-full justify-content-between align-center card-btn">
                                        <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                        <a class="my-0" href="./salonPage.php">Go inside -></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button class="c-control-prev" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon prev-ico" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="c-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!--/.Carousel Wrapper-->


    </div>

    <!-- Carousel mobile 2 -->
    <div class="container my-4 mx-4 w-full mobile-show">
        <div class="d-flex section-headings">
            <p class="text-light bg-primary rounded px-2 py-1 fw-semibold">Available Budstations Near You <img src="./img/premium-icon.png" alt="premium-icon" width="28" height="25"></p>

            <p class="mx-3 fw-normal">Book from your choice of budstation</p>
        </div>

        <div class="carousel-wrapper">
            <div id="carouselExampleControls4" class="carousel slide cards-mobile" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div> -->

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="./img/saloninterior.jpg" alt="saloninterior" class="d-block w-100">
                        <div class="card-body d-flex flex-column justify-content-between row-gaps-10">
                            <div class="d-flex w-full justify-content-between align-center">
                                <h4 class="card-title my-0">DAVID'S</h4>
                                <div class="d-flex">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                    <img src="./img/star-fill.png" alt="star-rating">
                                </div>
                            </div>

                            <div class="d-flex align-center">
                                <img src="./img/map-pin.png" alt="map-icon">
                                <p class="d-flex align-center card-text font-small fw-light m-left-5">Rajgarh Road, House No.12, 2nd floor left</p>
                            </div>


                            <p class="d-flex icon-gap">
                                <img src="./img/wifi.png" alt="wifi-icon">
                                <img src="./img/tv.png" alt="wifi-icon">
                                <img src="./img/cctv.png" alt="wifi-icon">
                            </p>
                            <div class="d-flex w-full justify-content-between align-center card-btn">
                                <a class="btn btn-primary align-center" href="./salonPage.php">Book now</a>
                                <a class="my-0" href="./salonPage.php">Go inside -></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev z-99" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next z-99" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <form action="#" method="POST" class="d-flex w-100 justify-content-center mt-5">
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-white text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 link-secondary">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <!-- <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Company name
                        </h6> -->
                        <img src="./img/gb-logo.png" alt="glamourbud logo" width="150px" style="margin: 20px 0;">
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> Lachit Nagar, Guwahati 24, Assam</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            support@glamourbud.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Glamourbud.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- if (isset($_POST['logout'])) {
        $sessionClose = session_destroy();
        $sessionClose;

        header('location: ' . $loginPage);
        die();

        echo "<script>console.log('session closed');</script>";
    } -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>