<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

if (isset($_POST["addData"])) {
    $idDenda = htmlspecialchars($_POST["idDenda"]);
    $totalDenda = htmlspecialchars($_POST["totalDenda"]);
    $hariKeterlambatan = htmlspecialchars($_POST["hariKeterlambatan"]);
    $jenisPembayaran = htmlspecialchars($_POST["jenisPembayaran"]);
    $jenisDenda = htmlspecialchars($_POST["jenisDenda"]);

    $query = "INSERT INTO denda
                VALUES
                ('$idDenda', $totalDenda, $hariKeterlambatan, '$jenisPembayaran', '$jenisDenda')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'fine.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'fine.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: fine.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Fine</h1>

            <form action="" method="post">
                <label for="idDenda">ID Denda : </label>
                <input type="text" name="idDenda" id="idDenda" autocomplete="off" required>
                <label for="totalDenda">Total Denda : </label>
                <input type="text" name="totalDenda" id="totalDenda" autocomplete="off" required>
                <label for="hariKeterlambatan">Hari Keterlambatan : </label>
                <input type="text" name="hariKeterlambatan" id="hariKeterlambatan" autocomplete="off" required>
                <label for="jenisPembayaran">Jenis Pembayaran : </label>
                <input type="text" name="jenisPembayaran" id="jenisPembayaran" autocomplete="off" required>
                <label for="jenisDenda">Jenis Denda : </label>
                <select name="jenisDenda" id="jenisDenda">
                    <option value="-">Pilih</option>
                    <option value="-">-</option>
                    <option value="Hilang">Hilang</option>
                    <option value="Terlambat">Terlambat</option>
                </select>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>