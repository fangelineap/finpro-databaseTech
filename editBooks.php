<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM books WHERE bookId = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);


$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($conn, $queryKategori);

if (isset($_POST["editData"])) {
    $bookId = htmlspecialchars($_POST["bookId"]);
    $idKategori = htmlspecialchars($_POST["idKategori"]);
    $judul = htmlspecialchars($_POST["judul"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $status = htmlspecialchars($_POST["status"]);
    $tanggalTerbit = htmlspecialchars($_POST["tanggalTerbit"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $isbn = htmlspecialchars($_POST["isbn"]);

    $queryStaff = "UPDATE books SET
                bookId = '$bookId', 
                idKategori = '$idKategori', 
                judul = '$judul',
                jumlah = '$jumlah',
                status = '$status',
                tanggalTerbit = '$tanggalTerbit',
                harga = '$harga',
                isbn = '$isbn'
            WHERE bookId = '$keyword'";
    mysqli_query($conn, $queryStaff);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'books.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'books.php';
            </script>
        ";
    }
}


if (isset($_POST["back"])) {
    header("Location: books.php");
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
            <h1>Edit Books - <?= $res["bookId"]; ?></h1>

            <form action="" method="post">
                <label for="bookId"></label>
                <input type="hidden" name="bookId" id="bookId" autocomplete="off" value="<?= $res["bookId"]; ?>" required>
                <label for="idKategori">ID Buku : </label>
                <select name="idKategori" id="idKategori">
                    <option value="<?= $res["idKategori"]; ?>"> <?= $res["idKategori"]; ?></option>
                    <?php while ($ress = mysqli_fetch_assoc($resultKategori)) : ?>
                        <option value="<?= $ress["idKategori"]; ?>"> <?= $ress["idKategori"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" autocomplete="off" value="<?= $res["judul"]; ?>" required>
                <label for="jumlah">Jumlah : </label>
                <input type="text" name="jumlah" id="jumlah" autocomplete="off" value="<?= $res["jumlah"]; ?>" required>
                <label for="status">Status : </label>
                <select name="status" id="status">
                    <option value="<?= $res["status"]; ?>"> <?= $res["status"]; ?></option>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
                <label for="tanggalTerbit">Tanggal Terbit : </label>
                <input type="text" name="tanggalTerbit" id="tanggalTerbit" autocomplete="off" value="<?= $res["tanggalTerbit"]; ?>" required>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" autocomplete="off" value="<?= $res["harga"]; ?>" required>
                <label for="isbn">ISBN : </label>
                <input type="text" name="isbn" id="isbn" autocomplete="off" value="<?= $res["isbn"]; ?>" required>
                <button type="submit" name="editData">Edit data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>

</body>

</html>
