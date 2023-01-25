<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM peminjaman ORDER BY idPeminjaman";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM peminjaman";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM peminjaman WHERE 
        idPeminjaman LIKE '%$keyword%' OR
        idDenda LIKE '%$keyword%' OR
        memberId LIKE '%$keyword%' OR
        staffId LIKE '%$keyword%' OR
        bookId LIKE '%$keyword%' OR
        tanggalPeminjaman LIKE '%$keyword%' OR
        tanggalPengembalian LIKE '%$keyword%' OR
        statusPeminjaman LIKE '%$keyword%'
        ";
        $result = mysqli_query($conn, $querySearch);
    }
}

if( isset($_POST["back"]))
{
    header("Location: admin.php");
}

if( isset($_POST["add"]))
{
    header("Location: addBorrowing.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow</title>
    <link rel="stylesheet" href="adminMenu.css">
</head>
<body>
    <?php
    if( isset($_POST["loginadmin"]))
    {
        header("Location: loginadmin.php");
        exit;
    }
    ?>

    <div class="container">
        <div class="login">
            <h1>Borrowing list</h1>

            <form action="" method="post">
                <input type="text" name="keyword" size= "30" 
                placeholder="Enter keyword..." autocomplete="off">
                <button type= "submit" name= "search">Search</button>
            </form>

            <table border="1" class= "content-table">
                <thead>
                    <tr>
                        <th>ID Peminjaman</th>
                        <th>ID Denda</th>
                        <th>ID Member</th>
                        <th>ID Staff</th>
                        <th>ID Buku</th>
                        <th>Jumlah Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Bentuk Buku</th>
                        <th>Status Peminjaman</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($res = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                        <td> <?= $res["idPeminjaman"]; ?></td>
                        <td> <?= $res["idDenda"]; ?></td>
                        <td> <?= $res["memberId"]; ?></td>
                        <td> <?= $res["staffId"]; ?></td>
                        <td> <?= $res["bookId"]; ?></td>
                        <td> <?= $res["jumlahBuku"]; ?></td>
                        <td> <?= $res["tanggalPeminjaman"]; ?></td>
                        <td> <?= $res["tanggalPengembalian"]; ?></td>
                        <td> <?= $res["bentukBuku"]; ?></td>
                        <td> <?= $res["statusPeminjaman"]; ?></td>
                        <td>
                            <a href="editBorrowing.php?id=<?= $res["idPeminjaman"]; ?>">Edit</a> |
                            <a href="deleteBorrowing.php?id=<?= $res["idPeminjaman"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <form action="" method="post">
                <button type= "submit" name= "add">Add</button>
                <button type= "submit" name= "back">Back</button>
            </form>
        </div>
    </div>
</body>
</html>