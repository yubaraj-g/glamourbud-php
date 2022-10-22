<?php
$session = session_start();
$session;

function sess_log($s_alrt) {
    echo "<script>
        console.log('$s_alrt');
    </script>";
}

if($session) {
    sess_log("session started");
}

// logging session in console

function alert_welcome($useremail) {
    echo
    "<script>
        console.log('Welcome ');
        console.log('$useremail');
    </script>";
}

alert_welcome($_SESSION['user_email']);


// if login fails then go back to login.php

$loginPage = './login.php';

$userSession = $_SESSION['user_email'];

if(!$userSession) {
    header('location: ' . $loginPage);

    // script to log the error for accessing the page directly
    // echo "<script>
    //     console.log('login failed, wrong credentials.');
    // </script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout - GlamourBud</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="#" method="POST">
    <button class="btn btn-primary" name="logout" type="submit">Logout</button>
    </form>

    <?php
        $sessionUnset = session_unset();
        $sessionClose = session_destroy();

        if(isset($_POST['logout'])) {
            $sessionUnset;
            $sessionClose;

            header('location: ' . $loginPage);
            die();

            echo "<script>console.log('session closed');</script>";
        }
    ?>
</body>
</html>