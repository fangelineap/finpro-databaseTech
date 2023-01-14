<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

if (isset($_POST["addData"])) {
    $memberId = htmlspecialchars($_POST["memberId"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $noHp = htmlspecialchars($_POST["noHp"]);
    $riwayatPeminjaman = htmlspecialchars($_POST["riwayatPeminjaman"]);

    $query = "INSERT INTO member
                VALUES
                ('$memberId', '$nama', '$email', '$noHp', '$riwayatPeminjaman')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'member.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'member.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: member.php");
}

function random()
{
    $num = '0123456789';
    $string = 'MEMB';
    for ($i = 0; $i < 4; $i++) {
        $string .= $num[rand(0, 9)];
    }
    return $string;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Member</h1>

            <form action="" method="post">
                <label for="memberId">ID Member : </label>
                <input type="text" name="memberId" id="memberId" autocomplete="off" value="<?php echo random();?>" required>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" autocomplete="off" required>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" autocomplete="off" required>
                <label for="noHp">Nomor HP : </label>
                <input type="text" name="noHp" id="noHp" autocomplete="off" required>
                <label for="riwayatPeminjaman">Riwayat Peminjaman : </label>
                <input type="text" name="riwayatPeminjaman" id="riwayatPeminjaman" autocomplete="off" required>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>
