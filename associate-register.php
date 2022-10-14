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
    <title>Associate Registration</title>

    <link rel="stylesheet" href="./css/associate.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

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
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link disabled" href="#">Become an associate</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Support</a>
                    </li>
                </ul>
                <div class="btn btn-light d-flex signin-btn">
                    <img src="./img/gg_profile.png" alt="profile-icon" width="40px" height="40px">
                    <div class="d-flex flex-column btn-text-wrapper">
                        <?php
                            $email = $_SESSION['user_email'];

                            $query = "SELECT * FROM users WHERE email = '$userSession' ";

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
                                <ul class="specials-ul dropdown-menu dropdown-submenu">
                                    <li><a href="" class="dropdown-item">Trending</a></li>
                                    <li><a href="" class="dropdown-item">Traditional</a></li>
                                    <li><a href="" class="dropdown-item">Bridal</a></li>
                                    <li><a href="" class="dropdown-item">Grooming</a></li>
                                </ul>
                            </li>
                            <li class="regulars">
                                <a class="dropdown-item" href="#">Regular Services &raquo;</a>
                                <ul class="regulars-ul dropdown-menu dropdown-submenu">
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

    
    <section class="h-100 h-custom gradient-custom-2 register-section">
        <h4 class="d-flex justify-content-center w-full mb-2">Welcome to Glamourbud</h4>
        <h6 class="d-flex justify-content-center w-full">Please provide the necessary information for further processing of your associate application</h6>

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">


                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>

                                        <div class="row">
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <input type="text" id="form3Examplev2" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplev2">First name</label>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4 pb-2">

                                                <div class="form-outline">
                                                    <input type="text" id="form3Examplev3" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplev3">Last name</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplev4" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplev4">Position</label>
                                            </div>
                                        </div>

                                        <div class="row mb-4 pb-2">
                                            <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">

                                                <div class="form-outline">
                                                    <input type="text" id="form3Examplev5" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplev5">Bussiness Arena</label>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <select class="select">
                                                    <option value="">Employees</option>
                                                    <option value="0-20">0-20</option>
                                                    <option value="20-50">20-50</option>
                                                    <option value="50+">50+</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="form3Examplev6">Please upload your Certificate</label>
                                            <input type="file" id="form3Examplev6" name="upload-certificate" accept="image/png, image/jpeg, application/pdf">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="form3Examplev6">Please upload your parlour photo</label>
                                            <input type="file" id="form3Examplev6" name="upload-p-image" accept="image/png, image/jpeg">
                                        </div>

                                    </div>
                                </div>



                                <div class="col-lg-6 bg-indigo text-white">
                                    <div class="p-5">
                                        <h3 class="fw-normal mb-5">Contact Details</h3>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Street + House No.</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea3" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea3">Address Line 2 + Landmark</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="form3Examplea4" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea4">Zip Code</label>
                                                </div>

                                            </div>
                                            <div class="col-md-7 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="form3Examplea5" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea5">Area</label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea6" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea6">City</label>
                                            </div>
                                        </div>

                                        <div class="mb-4 pb-2">
                                            <div class="form-outline form-white">
                                                <input type="tel" id="phone" name="phone" pattern="[0-9]{2}-[0-9]{5}-[0-9]{5}" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea8">Phone Number</label>
                                            </div>
                                        </div>

                                        <!-- <div class="row">
                                            <div class="col-md-5 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="form3Examplea7" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea7">PIN CODE</label>
                                                </div>

                                            </div>
                                            <div class="col-md-7 mb-4 pb-2">

                                                <div class="form-outline form-white">
                                                    <input type="text" id="form3Examplea8" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Examplea8">Phone Number</label>
                                                </div>

                                            </div>
                                        </div> -->

                                        <div class="mb-4">
                                            <div class="form-outline form-white">
                                                <input type="text" id="form3Examplea9" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea9">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                            <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                                            <label class="form-check-label text-white" for="form2Example3">
                                                I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your
                                                site.
                                            </label>
                                        </div>

                                        <button type="button" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Register</button>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>