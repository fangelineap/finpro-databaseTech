<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM kategori ORDER BY namaKategori";
$query1 = "SELECT * FROM kategori_count ORDER BY namaKategori";
$result = mysqli_query($conn, $query);
$result1 = mysqli_query($conn, $query1);


if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM kategori";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM kategori WHERE 
        idKategori LIKE '%$keyword%' OR
        namaKategori LIKE '%$keyword%'
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
    header("Location: addCategory.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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

        <h1>Category</h1>

        <form action="" method="post">
            <input type="text" name="keyword" size= "30" 
            placeholder="Enter keyword..." autocomplete="off">
            <button type= "submit" name= "search">Search</button>
        </form>

        <table border="1" class= "content-table">
            <thead>
                <tr>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah buku</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php while($res = mysqli_fetch_assoc($result) AND $res1 = mysqli_fetch_assoc($result1)) : ?>
                    <tr>
                    <td> <?= $res["idKategori"]; ?></td>
                    <td> <?= $res["namaKategori"]; ?></td>
                    <td> <?= $res1["jumlah"]; ?></td>
                    <td>
                        <a href="editCategory.php?id=<?= $res["idKategori"]; ?>">Edit</a> 
                        <a href="deleteCategory.php?id=<?= $res["idKategori"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
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
