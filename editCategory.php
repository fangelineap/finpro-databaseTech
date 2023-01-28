<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM kategori WHERE idKategori = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

if( isset($_POST["editData"]))
{
    $idKategori = htmlspecialchars($_POST["idKategori"]);
    $namaKategori = htmlspecialchars($_POST["namaKategori"]);

    $query = "UPDATE kategori SET
                idKategori = '$idKategori', 
                namaKategori = '$namaKategori', 
            WHERE idKategori = '$idKategori'";
    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'category.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'category.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: category.php");
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
            <h1>Edit Category - <?= $res["idKategori"]; ?></h1>

            <form action="" method="post">
                <label for="idKategori"></label>
                <input type="hidden" name="idKategori" id="idKategori" autocomplete= "off" value="<?= $res["idKategori"]; ?>"required>
                <label for="namaKategori">Nama Kategori : </label>
                <input type="text" name="namaKategori" id="namaKategori" autocomplete= "off" value="<?= $res["namaKategori"]; ?>" required>
                <button type="submit" name="editData">Edit data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>
</html>