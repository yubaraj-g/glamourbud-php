<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gb_01";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    // function alert_ok($okmsg) {
    //     echo
    //     "<script>
    //         console.log('$okmsg');
    //     </script>";
    // }
    function alert_error($errmsg) {
        echo
        "<script>
            alert('$errmsg');
        </script>";
    }

    if(!$conn) {
        alert_error("Connection Failed!").mysqli_connect_error();
    } else {
        // alert_ok("Connection ok!");

        function alert_successful($yesmsg) {
            echo
            "<script>
                console.log('$yesmsg');
            </script>";
        }

        alert_successful("connection successful!");

        // echo '<script>alert("Connection ok!")</script>';
    }
?>