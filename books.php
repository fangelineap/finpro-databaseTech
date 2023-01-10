<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM books ORDER BY judul";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM books";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM books WHERE 
        bookId LIKE '%$keyword%' OR
        idKategori LIKE '%$keyword%' OR
        judul LIKE '%$keyword%' OR
        isbn LIKE '%$keyword%' OR
        status LIKE '%$keyword%'
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
    header("Location: addBooks.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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
            <h1>Books</h1>

            <form action="" method="post">
                <input type="text" name="keyword" size= "30" 
                placeholder="Enter keyword..." autocomplete="off">
                <button type= "submit" name= "search">Search</button>
            </form>

            <table border="1" class= "content-table">
                <thead>
                    <tr>
                        <th>ID Buku</th>
                        <th>ID Kategori</th>
                        <th>Judul</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Tanggal Terbit</th>
                        <th>Harga</th>
                        <th>ISBN</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($res = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                        <td> <?= $res["bookId"]; ?></td>
                        <td> <?= $res["idKategori"]; ?></td>
                        <td> <?= $res["judul"]; ?></td>
                        <td> <?= $res["jumlah"]; ?></td>
                        <td> <?= $res["status"]; ?></td>
                        <td> <?= $res["tanggalTerbit"]; ?></td>
                        <td> <?= $res["harga"]; ?></td>
                        <td> <?= $res["isbn"]; ?></td>
                        <td>
                            <a href="editBooks.php?id=<?= $res["bookId"]; ?>">Edit</a> |
                            <a href="deleteBooks.php?id=<?= $res["bookId"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
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