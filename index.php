<?php
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
        console.log('Welcome '.'$useremail');
        
    </script>";
}

alert_welcome($_SESSION['user_email']);


// if login fails then go back to login.php (literally comment)

$loginPage = './login.php';

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
    <nav class="navbar navbar-expand-lg bg-light px-4 w-full">
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Become an associate</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                </ul>
                <div class="btn btn-light d-flex signin-btn">
                    <img src="./img/gg_profile.png" alt="profile-icon" width="40px" height="40px">
                    <div class="d-flex flex-column btn-text-wrapper">
                        <p>Hello</p>
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

            <div class="d-flex collapse navbar-collapse px-4 py-2 gap-5 align-center" id="navbarSupportedContent">
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
                    <li class="nav-item dropdown dropdown-toggle">
                        <select class="nav-link dropdown-menu form-select bg-dark text-light" aria-label="Default select example" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <option selected class="bg-light nav-link text-dark">Select your location</option>
                            <option value="1" class="bg-light text-dark">Guwahati</option>
                            <option value="2" class="bg-light text-dark">Nagaon</option>
                            <option value="3" class="bg-light text-dark">Tezpur</option>
                            <option value="4" class="bg-light text-dark">Jorhat</option>
                            <option value="5" class="bg-light text-dark">Lakhimpur</option>
                            <option value="6" class="bg-light text-dark">Dibrugarh</option>
                        </select>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ganeshguri</a></li>
                            <li><a class="dropdown-item" href="#">Dispur</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Show all</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ganeshguri</a></li>
                            <li><a class="dropdown-item" href="#">Dispur</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Show all</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle disabled" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Discounts
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ganeshguri</a></li>
                            <li><a class="dropdown-item" href="#">Dispur</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Show all</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex w-max35" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>


            </div>
        </div>
    </nav>

    <!-- navbar ended -->


    <div class="container my-4 mx-4 w-full">

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




    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row px-5 gap">

                </div>
            </div>
            <div class="carousel-item active">
                <div class="row px-5 gap">

                </div>
            </div>
            <div class="carousel-item active">
                <div class="row px-5 gap">

                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <form action="#" method="POST" class="d-flex w-100 justify-content-center mt-5">
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>




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