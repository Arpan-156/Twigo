<?php

session_start();
if ($_SESSION["loggedin"]) {
  include '../php/db.php';

  //   if (isset($_POST["val"])) {
  //     $V_id = $_POST["V_id"];
  //   };

  $email = $_SESSION["email"];
  $V_id = $_SESSION["V_id"];
  $R_email = $_SESSION["R_email"];

  $bdate = $_POST["bdate"];

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $d = "SELECT * FROM driver WHERE D_status=0";
  //$b = "SELECT * FROM booking WHERE B_date='$bdate' AND V_id = '$V_id'";
  $dresult = $conn->query($d);
  $drivrow = $dresult->fetch_assoc();
  //$bresult = $conn->query($b);
  //$brivrow = $bresult->fetch_assoc();

  if (isset($_POST['submit'])) {

    $rtype = $_POST["rt"];
    //$km = $_POST["km"];
    //$pickup = $_POST["padd"];
    $drop = $_POST["dadd"];
    $V_type = $_SESSION["V_type"];
    if ($V_type == "Sedan") {
      $amount = 5000;
    } else if ($V_type == "Suv") {
      $amount = 8000;
    } else if ($V_type == "Hatchback") {
      $amount = 3500;
    } else if ($V_type == "EV-Sedan") {
      $amount = 4000;
    }

    //$paymentstatus = "0";

    $sq = "INSERT INTO booking(C_email, V_id, B_type, B_distance, B_drop_address, B_date, 
    B_amount) 
    values('$email', '$V_id', '$rtype', '$km', '$drop', '$bdate',
    '$amount')";

    $sql = "SELECT B_id FROM booking WHERE V_id = '$V_id' AND B_date='$bdate'";

    if ($conn->query($sq)) {
      $dres = $conn->query($sql);
      $drow = $dres->fetch_assoc();
      $bid = $drow["B_id"];
      $_SESSION["bookingid"] = $bid;
      header("location: solocheckout.php");
    } else {
      echo "Error submitting the form!" . $conn->error;
    }
  } else {
    echo "<script>alert(' No Driver available OR No booking available for this date!')
    window.location='../php/soloride.php';</script>";
  }
} else {
  header("location: ../html/customerlog.html");
}
