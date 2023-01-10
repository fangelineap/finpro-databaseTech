<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM member WHERE memberId = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

if( isset($_POST["editData"]))
{
    $memberId = htmlspecialchars($_POST["memberId"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $noHp = htmlspecialchars($_POST["noHp"]);
    $riwayatPeminjaman = htmlspecialchars($_POST["riwayatPeminjaman"]);

    $query = "UPDATE member SET
                memberId = '$memberId', 
                nama = '$nama', 
                email = '$email',
                noHp = '$noHp',
                riwayatPeminjaman = '$riwayatPeminjaman'
            WHERE memberId = '$memberId'";
    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'member.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'member.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: member.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link rel="stylesheet" href="editMenu.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Edit Member - <?= $res["memberId"]; ?></h1>

            <form action="" method="post">
                <label for="memberId"></label>
                <input type="hidden" name="memberId" id="memberId" autocomplete= "off" value="<?= $res["memberId"]; ?>"required>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" autocomplete= "off" value="<?= $res["nama"]; ?>" required>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" autocomplete= "off" value="<?= $res["email"]; ?>" required>
                <label for="noHp">Nomor HP : </label>
                <input type="text" name="noHp" id="noHp" autocomplete= "off" value="<?= $res["noHp"]; ?>" required>
                <label for="riwayatPeminjaman">Riwayat Peminjaman : </label>
                <input type="text" name="riwayatPeminjaman" id="riwayatPeminjaman" autocomplete= "off" value="<?= $res["riwayatPeminjaman"]; ?>" required>
                <button type="submit" name="editData">Edit data</button>

            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>

</body>
</html>