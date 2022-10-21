<?php
session_start();
include('./dbconn.php');

$modal = <<<EOD

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

EOD;

$usermail = $_SESSION['user_email'];
$servicename = $_POST['servicename'];
$timeperiod = $_POST['timeperiod'];
$price = $_POST['price'];

if(!$conn) {
    echo "connection error" . mysqli_connect_error();
} else {
    
    if(isset($_POST['confirm'])) {
        // $sql = " INSERT INTO `bookings` (`usermail`, `servicename`, `timeslots`, `price`) VALUES ($usermail, $servicename, $timeperiod, $price) ";

        // $sql = mysqli_query($conn, "INSERT INTO bookings SET usermail = '$usermail', servicename = '$servicename', timeslots = '$timeperiod', price = '$price'");
        $sql = mysqli_query($conn, " INSERT INTO `bookings` (`usermail`, `servicename`, `timeslots`, `price`) VALUES ('$usermail', '$servicename', '$timeperiod', '$price') ");

        // $run_insert_query = mysqli_query($conn, $sql);

        echo $modal;
    }

    else {
        echo "
        <script>
            alert('Booking Function Error.');
        </script>
        ";
    }
    
}



?>


