<?php
session_start();
include('./dbconn.php');

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$city = $_POST['city'];
$email = $_POST['email'];
$password = $_POST['password'];
$c_password = $_POST['cpassword'];

// $sql = "INSERT INTO `users` (`first_name`, `last_name`, `city`, `email`, `password`, `c_password`) VALUES ('$first_name','$last_name','$city','$email','$password','$c_password');";


// checking new code

if(!$conn) {
    echo "connection error" . mysqli_connect_error();
} else {

    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `city`, `email`, `password`, `c_password`) VALUES ('$first_name','$last_name','$city','$email','$password','$c_password');";
    // $insertData = $conn->prepare("INSERT INTO `users` (`first_name`, `last_name`, `city`, `email`, `password`, `c_password`) VALUES (?, ?, ?, ?, ?, ?);");

    // $insertData->bind_param("ssssss", $first_name, $last_name, $city, $email, $password, $c_password);
    // $insertData->execute();

    $runInsert = mysqli_query($conn, $sql);
    //above we created a variable and stored the $conn + $sql and executed in the same instance


    echo "
        <script>
            alert('Account Created.');
        </script>
    ";


    // redirecting to index page on successful login ---
    ?>
    <meta http-equiv="refresh" content="0; url = /gb-php/index.php" />
    <?php
    // $redirectHome = '/gb-php/index.php';
    // header('Location: ' . $redirectHome);
    // exit();

    // $insertData->close();
    mysql_close();
}

?>