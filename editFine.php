<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM denda WHERE idDenda = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

if( isset($_POST["editData"]))
{
    $idDenda = htmlspecialchars($_POST["idDenda"]);
    $totalDenda = htmlspecialchars($_POST["totalDenda"]);
    $hariKeterlambatan = htmlspecialchars($_POST["hariKeterlambatan"]);
    $jenisPembayaran = htmlspecialchars($_POST["jenisPembayaran"]);
    $jenisDenda = htmlspecialchars($_POST["jenisDenda"]);

    $query = "UPDATE denda SET
                idDenda = '$idDenda', 
                totalDenda = $totalDenda, 
                hariKeterlambatan = $hariKeterlambatan,
                jenisPembayaran = '$jenisPembayaran',
                jenisDenda = '$jenisDenda'
            WHERE idDenda = '$idDenda'";
    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'fine.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'fine.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: fine.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
    <link rel="stylesheet" href="editMenu.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Edit Fine - <?= $res["idDenda"]; ?></h1>

            <form action="" method="post">
                <label for="idDenda"></label>
                <input type="hidden" name="idDenda" id="idDenda" autocomplete= "off" value="<?= $res["idDenda"]; ?>"required>
                <label for="totalDenda">Total Denda : </label>
                <input type="text" name="totalDenda" id="totalDenda" autocomplete= "off" value="<?= $res["totalDenda"]; ?>" required>
                <label for="hariKeterlambatan">Hari Keterlambatan : </label>
                <input type="text" name="hariKeterlambatan" id="hariKeterlambatan" autocomplete= "off" value="<?= $res["hariKeterlambatan"]; ?>" required>
                <label for="jenisPembayaran">Jenis Pembayaran : </label>
                <input type="text" name="jenisPembayaran" id="jenisPembayaran" autocomplete= "off" value="<?= $res["jenisPembayaran"]; ?>" required>
                <label for="jenisDenda">Jenis Denda : </label>
                <select name="jenisDenda" id="jenisDenda">
                    <option value="<?= $res["jenisDenda"]; ?>"> <?= $res["jenisDenda"]; ?> </option>
                    <option value="-">-</option>
                    <option value="Hilang">Hilang</option>
                    <option value="Terlambat">Terlambat</option>
                </select>
                <button type="submit" name="editData">Edit data</button>

            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>
</html>