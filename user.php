<?php

session_start();

$email = $_COOKIE['email'];
$password = $_COOKIE['pass'];

if( !isset($_SESSION["loginuser"]))
{
    header("Location: loginuser.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container">
        <div class = "login">

            <form action="personal.php" method= "">
                <h1>User menu</h1>
                <hr>
                <button>Update Personal Data</button>
            </form>

            <form action="borrow.php" method= "">
                <button>History & Book Search</button>
            </form>

            <form action="logout.php">
                <button type="submit">Logout</button>
            </form>

        </div>
        <div class= "right">
            <img src="image.png" alt="">
        </div>
    </div>

</body>
</html>