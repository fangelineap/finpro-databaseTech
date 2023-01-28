<?php
$memberId = $_COOKIE['pass'];
$conn = mysqli_connect("localhost", "root", "", "sistemperpustakaan");
$query = "SELECT peminjaman.idPeminjaman, peminjaman.idDenda, peminjaman.staffId, peminjaman.bookId, peminjaman.tanggalPeminjaman,
peminjaman.tanggalPengembalian, peminjaman.bentukBuku, books.judul, books.idKategori, books.isbn, peminjaman.statusPeminjaman
FROM peminjaman
INNER JOIN books ON peminjaman.bookId = books.bookId AND peminjaman.memberId = '$memberId'";
$queryBooks = "SELECT * FROM books";

$result = mysqli_query($conn, $query);
$resultBooks = mysqli_query($conn, $queryBooks);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM books";
        $resultBooks = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM books WHERE 
        judul LIKE '%$keyword%' OR
        idKategori LIKE '%$keyword%' OR
        isbn LIKE '%$keyword%' OR
        bookId LIKE '%$keyword%' OR
        status LIKE '$keyword%'
        ";
        $resultBooks = mysqli_query($conn, $querySearch);
    }
}

if( isset($_POST["back"]))
{
    header("Location: user.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowing Page</title>
    <link rel="stylesheet" href="borrow.css">
</head>
<body>
    <?php
    if( isset($_POST["loginuser"]))
    {
        header("Location: loginuser.php");
        exit;
    }
    ?>

    <div class= "container">
        <div class="login">
            <h1>History</h1>

            <table border="1" class= "content-table">
                <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>ID Denda</th>
                    <th>Staff ID</th>
                    <th>Book ID</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Bentuk Buku</th>
                    <th>Judul</th>
                    <th>ID Kategori</th>
                    <th>ISBN</th>
                    <th>Status Peminjaman</th>
                </tr>
                </thead>

                <tbody>
                <?php while($res = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td> <?= $res["idPeminjaman"]; ?></td>
                        <td> <?= $res["idDenda"]; ?></td>
                        <td> <?= $res["staffId"]; ?></td>
                        <td> <?= $res["bookId"]; ?></td>
                        <td> <?= $res["tanggalPeminjaman"]; ?></td>
                        <td> <?= $res["tanggalPengembalian"]; ?></td>
                        <td> <?= $res["bentukBuku"]; ?></td>
                        <td> <?= $res["judul"]; ?></td>
                        <td> <?= $res["idKategori"]; ?></td>
                        <td> <?= $res["isbn"]; ?></td>
                        <td> <?= $res["statusPeminjaman"]; ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <hr>

            <h1>Book Search</h1>
            <form action="" method= "post">
                <input type="text" name="keyword" size= "30"
                placeholder= "Enter keyword..." autocomplete= "off">
                <button type= "submit" name= "search">Search</button>
            </form>

            <table border="1" class="content-table">
                <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Category</th>
                    <th>Judul</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Tanggal Terbit</th>
                    <th>Harga</th>
                    <th>ISBN</th>
                </tr>
                </thead>

                <tbody>
                <?php while($res = mysqli_fetch_assoc($resultBooks)) : ?>
                <tr>
                    <td> <?= $res["bookId"]; ?></td>
                    <td> <?= $res["idKategori"]; ?></td>
                    <td> <?= $res["judul"]; ?></td>
                    <td> <?= $res["jumlah"]; ?></td>
                    <td> <?= $res["status"]; ?></td>
                    <td> <?= $res["tanggalTerbit"]; ?></td>
                    <td> <?= $res["harga"]; ?></td>
                    <td> <?= $res["isbn"]; ?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <form action="" method="post">
                <button type= "submit" name="back">Back</button>
            </form>
        </div>
    </div>

</body>
</html>