<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM denda ORDER BY idDenda";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM denda";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM denda WHERE 
        idDenda LIKE '%$keyword%'
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
    header("Location: addFine.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine</title>
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
        <h1>Fine</h1>

        <form action="" method="post">
            <input type="text" name="keyword" size= "30" 
            placeholder="Enter keyword..." autocomplete="off">
            <button type= "submit" name= "search">Search</button>
        </form>

        <table border="1" class= "content-table">
            <thead>
                <tr>
                    <th>ID Denda</th>
                    <th>Total Denda</th>
                    <th>Hari Keterlambatan</th>
                    <th>Jenis Pembayraan</th>
                    <th>Jenis Denda</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php while($res = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                    <td> <?= $res["idDenda"]; ?></td>
                    <td> <?= $res["totalDenda"]; ?></td>
                    <td> <?= $res["hariKeterlambatan"]; ?></td>
                    <td> <?= $res["jenisPembayaran"]; ?></td>
                    <td> <?= $res["jenisDenda"]; ?></td>
                    <td>
                        <a href="editFine.php?id=<?= $res["idDenda"]; ?>">Edit</a> |
                        <a href="deleteFine.php?id=<?= $res["idDenda"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
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