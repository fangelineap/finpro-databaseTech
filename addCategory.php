<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

if (isset($_POST["addData"])) {
    $idKategori = htmlspecialchars($_POST["idKategori"]);
    $namaKategori = htmlspecialchars($_POST["namaKategori"]);

    $query = "INSERT INTO kategori
                VALUES
                ('$idKategori', '$namaKategori')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'category.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'category.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: category.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Category</h1>

            <form action="" method="post">
                <label for="idKategori">ID Kategori : </label>
                <input type="text" name="idKategori" id="idKategori" autocomplete="off" required>
                <label for="namaKategori">Nama Kategori : </label>
                <input type="text" name="namaKategori" id="namaKategori" autocomplete="off" required>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>