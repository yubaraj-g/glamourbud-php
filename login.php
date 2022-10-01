<?php
include("./dbconn.php");

$session = session_start();
$session;

function sess_alert($s_alrt)
{
    echo "<script>
        console.log('$s_alrt');
        console.log('We are on login page');
    </script>";
}

if ($session) {
    sess_alert("session started");
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>GlamourBud - Log In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>



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

<body class="d-flex flex-column">
    <img src="./img/gb-logo.png" alt="glamourbud-logo" width="120px" height="40px">
    <main class="form-signin w-100 m-auto text-center">
        <form action="#" method="POST" autocomplete="off">
            <!-- <img class="mb-4" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->

            <h1 class="h3 mb-3 fw-semibold">Please log in</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-md btn-primary" type="submit" name="login">Log in</button>

            <p class="mt-3 mb-2">OR</p>

            <a class="w-100 btn btn-sm btn-outline-primary" href="./signup.php">
                Create new account
            </a>

            <p class="mt-5 mb-3 text-muted">&copy; GlamourBud 2022</p>
        </form>
    </main>

    <?php


    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email' &&  password = '$password' ";


        // running this query to check and verify
        $runQuery = mysqli_query($conn, $query);


        // calling the number of rows available in our database matching the entered data in this login page.
        $totalRowsData = mysqli_num_rows($runQuery);

        // echo 
        // "<script>
        //     console.log('$totalRowsData');
        // </script>";

        // $redirectPage = '/gb-01/logout.php';
        // $redirectPage = '/gb-php/logout.php';

        if ($totalRowsData == 1) {

            $_SESSION['user_email'] = $email;

            ?>
            <!-- header('location: ' . $redirectPage);
                     exit(); -->
            <!-- <meta http-equiv="refresh" content="0; url = http://localhost/gb-01/" /> -->
            <meta http-equiv="refresh" content="0; url = http://localhost/gb-php/index.php" />

            <?php

        } else if ($totalRowsData > 1) {
            echo
            "<script>
                        alert('Error. Multiple IDs found.');
                    </script>";
        } else {
            echo
            "<script>
                        alert('Username or Password not found');
                    </script>";
        }
    }
    ?>


</body>

</html>