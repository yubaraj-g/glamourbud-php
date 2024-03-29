<?php
include "./dbconn.php";
$session = session_start();

$loginPage = './login.php';
$homepage = './index.php';

$userSession = $_SESSION['user_email'];

if (!$userSession) {
    header('location: ' . $loginPage);
    exit();
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
    <title>Salon Page - GlamourBud</title>

    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/parlour.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

    <script src="./js/booking.js"></script>
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
                        <a class="nav-link" aria-current="page" href="./index.php">Home</a>
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
                        // $email = $_SESSION['user_email'];

                        $query = "SELECT * FROM users WHERE email = '$userSession' ";

                        $runQuery = mysqli_query($conn, $query);

                        $totalRowsData = mysqli_num_rows($runQuery);

                        if ($totalRowsData == 1) {
                            while ($row = mysqli_fetch_assoc($runQuery)) {
                                echo "<p>Hello <i>" . $row["first_name"] . "</i></p>";
                            }
                        } else {
                            echo "<p>Hello err_user!</p>
                                <script>console.log('error in users database. Please check database for repeated email ids.')</script>";
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

            <div class="d-flex collapse navbar-collapse px-4 py-2 gap-3 align-center" id="navbarSupportedContent">
                <ul class="d-flex align-center navbar-nav mb-lg-0 d-flex flex-grow-1 justify-content-between fw-normal margin-r-5">

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


    <!-- parlour section starts here -->
    <div class="parlour">
        <div class="div1">
            <div class="parlour-image">
                <img src="./img/saloninterior.jpg" alt="salon interior" class="p-img" width="">
            </div>
            <div class="title-details">
                <div class="parlour-title d-flex">
                    <h2>DAVID's BEAUTY & SPA</h2>
                    <p>unisex</p>
                </div>
                <div class="stars-rating">
                    <p>Rating</p>
                    <div class="d-flex">
                        <img src="./img/star-fill.png" alt="">
                        <img src="./img/star-fill.png" alt="">
                        <img src="./img/star-fill.png" alt="">
                        <img src="./img/star-fill.png" alt="">
                        <img src="./img/star-fill.png" alt="">
                    </div>
                </div>

                <div class="select-gender">
                    <div class="form-check btn btn-primary">
                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                        <label class="" for="btn-check">Male</label>
                    </div>
                    <div class="form-check btn btn-primary">
                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                        <label class="" for="btn-check">Female</label>
                    </div>
                    <div class="form-check btn btn-primary">
                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                        <label class="" for="btn-check">Others</label>
                    </div>

                </div>
            </div>
            <div class="parent-offer d-flex flex-column">
                <div class="offer mb-4">
                    <div class="offer-text mb-2">
                        <h5>OFFER</h5>
                        <h4>20% off on festive days</h4>
                        <a href="">Click for more details</a>
                    </div>
                </div>
                <div class="fav-button">
                    <button type="button" class="btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                        </svg>
                        Favourite
                    </button>
                </div>
            </div>
        </div>

        <div class="div2">
            <div class="categories">
                <h2>Categories</h2>
                <ul>
                    <li class="btn-light" id="haircare" onClick="haircare()" value="Hair Care">
                        Hair Care
                    </li>
                    <li class="btn-light" id="facials" onClick="facials()" value="Facial Treatments">
                        Facial Treatments
                    </li>
                    <li class="btn-light" id="advFacials" onClick="advFacials()" value="Advanced Facial Treatments">
                        Advanced Facial Treatments
                    </li>
                    <li class="btn-light" id="antiAging" onClick="antiAging()" value="Anti Ageing Treatments">
                        Anti Ageing Treatments
                    </li>
                    <li class="btn-light" id="eyeTreatment" onClick="eyeTreatment()" value="Eye Treatment Center">
                        Eye Treatment Center
                    </li>
                    <li class="btn-light" id="bodyMsg" onClick="bodyMsg()" value="Body Massage">
                        Body Massage
                    </li>
                    <li class="btn-light" id="makeups" onClick="makeups()" value="Makeup Services">
                        Makeup Services
                    </li>
                    <li class="btn-light" id="waxing" onClick="waxing()" value="Waxing">
                        Waxing
                    </li>
                    <li class="btn-light" id="nailcare" onClick="nailcare()" value="Nail Care">
                        Nail Care
                    </li>
                </ul>
            </div>
            <div class="services" id="services">
                <h2>Services</h2>
                <div class="service-item">
                    <h6 id="service1">Haircut Men</h6>
                    <p class="price">26$</p>
                    <button class="btn btn-primary" onclick="addS1()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service2">Haircut Women (above shoulders)</h6>
                    <p class="price">28$</p>
                    <button class="btn btn-primary" onclick="addS2()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service3">Haircut Women (below shoulders)</h6>
                    <p class="price">35$</p>
                    <button class="btn btn-primary" onclick="addS3()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service4">Highlights & Color (Full)</h6>
                    <p class="price">130$</p>
                    <button class="btn btn-primary" onclick="addS4()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service5">Permanent Color</h6>
                    <p class="price">99$</p>
                    <button class="btn btn-primary" onclick="addS5()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service6">Full Perm</h6>
                    <p class="price">99$</p>
                    <button class="btn btn-primary" onclick="addS6()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service7">Acid Repair Perm</h6>
                    <p class="price">129$</p>
                    <button class="btn btn-primary" onclick="addS7()">add</button>
                </div>
                <div class="service-item">
                    <h6 id="service8">Japanese Straightning Perm</h6>
                    <p class="price">290$</p>
                    <button class="btn btn-primary" onclick="addS8()">add</button>
                </div>
            </div>


            <!-- just a dummy test js code -->

            <!-- <script>
                let code = '<h2>who are you</h2>';

                document.getElementById("services").innerHTML = code;
            </script> -->



            <!-- <div class="timeSlots">
                <div class="available-slots">
                    <h3 class="mb-2">Available Slots</h3>
                    <div>11:00am - 11:30am <button class="btn btn-light" onclick="addTime1()">+</button></div>
                    <div>11:30am - 12:00am <button class="btn btn-light" onclick="addTime2()">+</button></div>
                    <div>12:00am - 12:30am <button class="btn btn-light" onclick="addTime3()">+</button></div>
                    <div>12:30am - 01:00am <button class="btn btn-light" onclick="addTime4()">+</button></div>
                    <div>01:00am - 01:30am <button class="btn btn-light" onclick="addTime5()">+</button></div>
                    <div>01:30am - 02:00am <button class="btn btn-light" onclick="addTime6()">+</button></div>
                    <div>02:00am - 02:30am <button class="btn btn-light" onclick="addTime7()">+</button></div>
                </div>
                <div class="already-booked">
                    <h3 class="mb-2">Already Booked</h3>
                    <div>11:00am - 11:30am</div>
                    <div>11:00am - 11:30am</div>
                    <div>11:00am - 11:30am</div>
                    <div>11:00am - 11:30am</div>
                </div>
            </div> -->

            <form class="availability d-flex flex-column justify-content-start align-items-start" method="post">
                <h3 class="d-flex align-items-start">Check Availabiliy Here!</h3>
                <button class="btn btn-outline-primary" onclick="availableChk()" type="submit" name="chk-available">Check Availability</button>

                <div class="available-seats d-flex flex-column mt-4">
                    <h4>Available Seats:

                        <?php
                        $associate = "davids beauty and spa";
                        $sql4 = " SELECT * FROM tbl_seats WHERE associate = '$associate' ";
                        $run_seats = mysqli_query($conn, $sql4);

                        while ($seats_results = mysqli_fetch_array($run_seats)) {

                            $total_seats = $seats_results['seats'];
                            $t_seats = number_format($total_seats);
                            $booked_seats = $seats_results['b_seats'];
                            $b_seats = number_format($booked_seats);

                            // $associate = $_SESSION['associate'];

                            // echo $a;



                            if (isset($_POST['chk-available'])) {

                                if ($associate) {
                                    if ($b_seats == null || $b_seats == 0 || $b_seats < 1) {
                                        echo $t_seats;
                                    } else {
                                        $available_seats = $t_seats - $b_seats;
                        ?>
                                        <span id="av-seats">
                                            <?php
                                            echo $available_seats;
                                            ?>
                                        </span>
                        <?php
                                    }
                                }
                            }
                        }

                        ?>
                        <!-- <script>
                            let totalSeats = '';
                            let bookedSeats = '';

                            let availableSeats = parseInt(totalSeats) - parseInt(bookedSeats);

                            function availableChk() {
                                document.getElementById('av-seats').innerHTML = availableSeats;
                            }
                        </script> -->
                    </h4>
                </div>
            </form>
        </div>
    </div>


    <div class="booked-services">
        <form class="wrapper" action="bookingSubmit.php" method="post">
            <h5>Booked Services</h5>
            <hr />
            <div class="the-service" id="theBookedService">
                <h3 id="servicename"></h3>
                <h4 id="timeperiod"></h4>
                <h3>
                    <span id="price"></span> $
                </h3>
                <input type="hidden" name="servicename" id="h_servicename">
                <input type="hidden" name="timeperiod" id="h_timeperiod">
                <input type="hidden" name="price" id="h_price">
                <button class="btn btn-warning" type="submit" name="confirm">Confirm ?</button>
            </div>
        </form>

    </div>


    <form action="#" method="POST" class="d-flex w-100 justify-content-center mt-5">
        <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>


    <!-- map here  -->
    <div class="map">
        <h3>MAP</h3>
    </div>




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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>

</body>

</html>