<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "sistemperpustakaan");

if ( isset($_POST["login"]) )
{
    $error = false;
    $email= $_POST["email"];
    $password= $_POST["password"];
    setcookie('email', $email, time() + 30 * 60);
    setcookie('pass', $password, time() + 30 * 60);

    $result = mysqli_query($conn, "SELECT * FROM member WHERE email = '$email'");

    if( mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);
        if ( $password == $row["memberId"] )
        {
            $_SESSION["loginuser"] = true;
            header("Location: user.php");
            exit;
        }
        else
        {
            $error = true;
        }
    }
    else
    {
        $erorr = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
        if( isset($_SESSION["loginuser"]) )
        {
            header("Location: user.php");
            exit;
        }
    ?>

    <div class = "container">
        <div class = "login">
            <form action="" method= "post">

                <h1>Login</h1>
                <hr>

                <p>Login Page For Member</p>

                <label for="email">Email</label>
                <input type="text"
                name= "email"
                id= "email"
                placeholder="Enter your email"
                autocomplete= "off">

                <label for="password">Password</label>
                <input type="password"
                name= "password"
                id= "password"
                placeholder="Enter your member ID"
                autocomplete= "off">

                <?php if ( isset($error) ) : ?>
                    <p style= "font-size: 14px; color: red; font-style: italic;">*Username / password salah</p>
                <?php endif; ?>
                
                <button type= "submit" name= "login">Login</button>
            </form>
        </div>
        <div class= "right">
            <img src="image.png" alt="">
        </div>
    </div>
</body>
</html>