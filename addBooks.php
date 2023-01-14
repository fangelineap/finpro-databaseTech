<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($conn, $queryKategori);

if (isset($_POST["addData"])) {
    $bookId = htmlspecialchars($_POST["bookId"]);
    $idKategori = htmlspecialchars($_POST["idKategori"]);
    $judul = htmlspecialchars($_POST["judul"]);
    $jumlah = htmlspecialchars($_POST["jumlah"]);
    $status = htmlspecialchars($_POST["status"]);
    $tanggalTerbit = htmlspecialchars($_POST["tanggalTerbit"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $isbn = htmlspecialchars($_POST["isbn"]);

    $query = "INSERT INTO books
                VALUES
                ('$bookId', '$idKategori', '$judul', $jumlah, '$status', '$tanggalTerbit', '$harga', '$isbn')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'books.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'books.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: books.php");
}

    function random(){
        $num = '0123456789';
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charslength = strlen($chars);
        $string = '';
        for($i = 0; $i < 5; $i++){
            $string .= $chars[rand(0, $charslength - 1)];
        }
        $string .= '-';
        for($i = 0; $i < 10; $i++){
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
    <title>Add Staff</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Books</h1>
            <form id="generate" action="" method="post" top=50% right=100%>
                    <button type="submit" id="generate" onclick="random()"> Generate Book ID </button>
            </form>
            
            <form action="" method="post">
                <label for="bookId">ID Buku : </label>
                <input type="text" name="bookId" id="bookId" value="<?php echo random(); ?>" autocomplete="off" required>
                <label for="idKategori">ID Kategori</label>
                <select name="idKategori" id="idKategori">
                    <option disabled selected>Pilih</option>
                    <?php while ($res = mysqli_fetch_assoc($resultKategori)) : ?>
                        <option value="<?= $res["idKategori"]; ?>"> <?= $res["idKategori"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" autocomplete="off" required>
                <label for="jumlah">Jumlah : </label>
                <input type="text" name="jumlah" id="jumlah" autocomplete="off" required>
                <label for="status">Status : </label>
                <select name="status" id="status">
                    <option value="Available">Pilih</option>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select>
                <label for="tanggalTerbit">Tanggal Terbit : </label>
                <input type="text" name="tanggalTerbit" id="tanggalTerbit" autocomplete="off" required>
                <label for="harga">Harga : </label>
                <input type="text" name="harga" id="harga" autocomplete="off" required>
                <label for="isbn">ISBN : </label>
                <input type="text" name="isbn" id="isbn" autocomplete="off" required>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>

</body>

</html>
