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
    $query = " SELECT * FROM users WHERE email = '$email' ";
    // running this query to check and verify
    $runQuery = mysqli_query($conn, $query);


    // calling the number of rows available in our database matching the entered data in this login page.
    $totalRowsData = mysqli_num_rows($runQuery);

    if($totalRowsData > 0) {
        echo "
        <script>
            alert('Email already exists! Please log in.');
        </script>
        ";

        // header('Location: /gb-php/login.php');
        // exit();

        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/gb-php/login.php" />
        <?php

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
        
        $query = " SELECT * FROM users WHERE email = '$email' ";
        // running this query to check and verify
        $runQuery = mysqli_query($conn, $query);


        // calling the number of rows available in our database matching the entered data in this login page.
        $totalRowsData = mysqli_num_rows($runQuery);

        if($totalRowsData > 0) {
            // redirecting to index page on successful signup ---
            ?>
            <meta http-equiv="refresh" content="5; url = http://localhost/gb-php/index.php" />
            <?php
            
        }
        

        // $redirectHome = '/gb-php/index.php';
        // header('Location: /gb-php/index.php');
        // exit();
        
        // $insertData->close();
        $conn->close();
    }


}

?>