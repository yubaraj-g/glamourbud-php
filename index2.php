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

if ($userSession == 0) {
    header('location: ' . $loginPage);
    exit();

    // script to log the error for accessing the page directly --------------(keep this commented)---------
    // echo "<script>
    //     console.log('login failed, wrong credentials.');
    // </script>"; ----------(keep this comented)----------
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">

    <title>Home - GlamourBud</title>

    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- main navbar here -->

    <nav class="navbar navbar-expand-lg bg-light w-full">
        <div class="container-fluid w-full">
            <a class="navbar-brand" href="#"><img src="./img/gb-logo.png" alt="glamourbud-logo" width="120px" height="40px"></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 d-flex flex-grow-1 justify-content-evenly">
                    <li class="nav-item d-flex">
                        <a class="nav-link active fw-semibold" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link fw-semibold" href="#">About us</a>
                    </li>
                    
                    <li class="nav-item d-flex">
                        <a class="nav-link fw-semibold" href="#">Contact us</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link fw-semibold" href="#">Become an associate</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link fw-semibold" href="#">Support</a>
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

    <!-- second navbar starts here -->

    <nav class="nav2 navbar-dark navbar-expand-lg bg-dark w-full">
        <div class="container-fluid w-full">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav mb-lg-0 d-flex flex-grow-1 justify-content-between margin-r-5">
                    
                    <li class="nav-item dropdown">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>


            </div>
        </div>
    </nav>

    <form action="#" method="POST" class="d-flex w-100 justify-content-center mt-5">
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>

    <?php

    if (isset($_POST['logout'])) {
        $sessionClose = session_destroy();
        $sessionClose;

        header('location: ' . $loginPage);
        die();

        echo "<script>console.log('session closed');</script>";
    }
    ?>
</body>

</html>