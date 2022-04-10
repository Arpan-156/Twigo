<?php session_start();
if($_SESSION["cemail"]){
    $cemail = $_SESSION["cemail"];
    include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../img/fav.png">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: rgb(255, 255, 255);
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            margin-left: 12%;
            padding: 16px;
            background-color: white;
            margin-top: 80px;
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 70%;
            padding: 15px;
            margin: 5px 0px 33px 0px;
            display: block;
            border: none;
            background: #f1f1f1;
            border-radius: 30px;
        }

        input[type=text]:focus,
        input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            /* border: 1px solid #ff0000;
      margin-bottom: 25px;
      margin-right: 850px; */
            border: #ee0000;
            width: 20%;
        }

        /* Set a style for the submit button */
        .loginbtn {
            background-color: #ee0000;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
            display: inline-block;
            opacity: 0.9;
            border-radius: 30px;
        }

        .loginbtn:hover {
            opacity: 1;
        }


        a {
            color: rgb(255, 0, 0);
        }


        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }

        .backbtn {
            background-color: #ee0000;
            display: inline-block;
            text-decoration: none;
            color: rgb(255, 255, 255);
            cursor: pointer;
            padding: 16px 30px;
            font-size: 13px;
            position: relative;
            border: none;
            border-radius: 30px;
        }

        .backbtn:hover {
            opacity: 1;
        }

        .image {
            /* padding: 10px ; */
            width: 80%;
            padding-right: 10px;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <div class="container">
            <table>
                <tr>
                    <td>
                        <h1>Twi<span style="color: #ee0000;">Go</span> Update Password</h1>
                        <hr style=" border: 1px solid #ff0000;
      margin-bottom: 25px;
      margin-right: 850px;">
                        <br>
                        <label for="email"><b>Enter Your Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $cemail ?>" required readonly>



                        <label for="psw"><b>Type New Password</b></label>
                        <input type="password" placeholder="Enter New Password" name="psw1" id="psw" required>

                        <label for="psw"><b>Reconfirm New Password</b></label>
                        <input type="password" placeholder="Reconfirm New Password" name="psw" id="psw" required>

                        <input class="loginbtn" type='submit' name='login' value='submit' style="font-size: 20px;"></input>

                        <a href="../html/index.html" class="backbtn"
                            style="font-size: 20px; margin-left: 100px;">Back</a>
                    </td>
                    <td><img src="../img/undraw_forgot_password_re_hxwm.svg" class="image"></img></td>
                </tr>
            </table>

        </div>

    </form>

</body>
<?php 

include '../php/db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
//   echo "Connected successfully";

  if($_POST){
    session_destroy();

    if($_POST["psw1"]==$_POST["psw"]){
        $password = $_POST["psw"];
        $email = $_POST["email"];

        $sql = "UPDATE customer SET C_password='$password' WHERE C_email='$email'";
    
        if($conn->query($sql)){
            header("location: ../html/customerlog.html");
        }else{
            echo "Error submitting the form!";
        }
    }
  }else{
      echo $conn->error;
  }

?>
</html>
<?php } ?>