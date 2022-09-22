<?php
session_start();

include("./dbconn.php");

$first_name = "";
$last_name = "";
$city = "";
$email = "";
$password = "";
$c_password = "";

if($_SERVER['REQUEST_METHOD' == 'POST']) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['cpassword'];
}

// more php needed.

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="glamourbud signup, glamourbud create account, create acount glamourbud">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>GlamourBud - Log In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>




    <!-- <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="docs/assets/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="https://getbootstrap.com/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form action="#" method="POST">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Create your account</h1>

            <div class="form-floating">
                <input type="text" class="f-name form-control" name="fname" id="floatingInputFirstName" placeholder="name@example.com" value="<?php echo $first_name; ?>">
                <label for="floatingInput">First Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="l-name form-control" name="lname" id="floatingInputLastName" placeholder="name@example.com" value="<?php echo $last_name; ?>">
                <label for="floatingInput">Last Name</label>
            </div>

            <select class="form-select mb-3" aria-label="Default select example" name="city" value="<?php echo $city; ?>">
                <option selected>Select your city</option>
                <option value="1">Guwahati</option>
                <option value="2">Nagaon</option>
                <option value="3">Tezpur</option>
                <option value="4">Jorhat</option>
                <option value="5">Lakhimpur</option>
                <option value="6">Dibrugarh</option>
            </select>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInputEmail" placeholder="name@example.com" value="<?php echo $email; ?>">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" value="<?php echo $password; ?>">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="c-pass form-control" name="cpassword" id="floatingPasswordConfirm" placeholder="Password" value="<?php echo $c_password; ?>">
                <label for="floatingPassword">Confirm Password</label>
            </div>

            <!-- <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> -->
            <button class="w-100 btn btn-lg btn-primary fs-6 fw-semibold" type="submit" name="createAccount">Create Account</button>

            <p class="mt-3 mb-2">OR</p>

            <a class="w-100 btn btn-sm btn-outline-primary" href="./login.php">
                Log In
            </a>
            <p class="mt-5 mb-3 text-muted">&copy; GlamourBud 2022</p>
        </form>
    </main>


    <?php

        

        $sql = "INSERT INTO users VALUES ('$first_name',
        '$last_name','$city','$email','$password','$c_password')";

        // if(mysqli_query($conn, )) {

        // }



        if(isset($_POST['createAccount']) && mysqli_query($conn, $sql)){
            echo 
            "<script>
                alert('Account Created.');
            </script>";
        } else {
            echo 
            "<script>
                alert('Account Creation Failed! Try Again!');
            </script>";
            
        }

        mysqli_close
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->

</body>

</html>