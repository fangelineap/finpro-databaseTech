<?php

$email = $_COOKIE['email'];
$password = $_COOKIE['pass'];
$conn = mysqli_connect("localhost", "root", "", "sistemperpustakaan");
$query = "SELECT * FROM member WHERE memberId = '$password'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

if( isset($_POST["update"]))
{
    $memberId = $_POST["membId"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $noHp = $_POST["noHp"];
    $riwayatPeminjaman = $_POST["riwayatPeminjaman"];

    $updateQuery = "UPDATE member SET
                memberId = '$memberId',
                nama = '$nama',
                email = '$email',
                noHp = '$noHp',
                riwayatPeminjaman = '$riwayatPeminjaman'
                WHERE memberId = '$memberId'
                ";

    mysqli_query($conn, $updateQuery);
    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
        <script>
            alert('data updated successfully!');
            document.location.href = 'user.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('error updating data..');
            document.location.href = 'user.php';
        </script>
        ";
    }

}

if( isset($_POST["back"]))
{
    header("Location: user.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Data</title>
    <link rel="stylesheet" href="menustyle.css">
</head>
<body>

<?php
if( isset($_POST["loginuser"]))
{
    header("Location: loginuser.php");
    exit;
}
?>

<div class = "container">
    <form action="" method= "post">

        <h1>Update Personal Data</h1>
        <hr>

        <input type="hidden"
        name= "membId"
        id= "membId"
        value= "<?= $res['memberId']; ?>"
        autocomplete= "off">

        <label for="nama">Nama</label>
        <input type="text"
        name= "nama"
        id= "nama"
        value= "<?= $res["nama"]; ?>"
        placeholder="Enter your name"
        autocomplete= "off">

        <label for="email">Email</label>
        <input type="text"
        name= "email"
        id= "email"
        value= "<?= $res['email']; ?>"
        placeholder="Enter your email"
        autocomplete= "off">

        <label for="noHp">Nomor HP</label>
        <input type="text"
        name= "noHp"
        id= "noHp"
        value= "<?= $res['noHp']; ?>"
        placeholder="Enter your phone number"
        autocomplete= "off">

        <input type="hidden"
        name= "riwayatPeminjaman"
        id= "riwayatPeminjaman"
        value= "<?= $res['riwayatPeminjaman']; ?>"
        autocomplete= "off">

        <button type= "submit" name= "update">Update</button>
        <button type= "submit" name="back">Back</button>
    </form>

</div>

</body>
</html>
