<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM member ORDER BY nama";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM member";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM member WHERE 
        memberId LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        noHp LIKE '%$keyword%'
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
    header("Location: addMember.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
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
            <h1>Member</h1>

            <form action="" method="post">
                <input type="text" name="keyword" size= "30" 
                placeholder="Enter keyword..." autocomplete="off">
                <button type= "submit" name= "search">Search</button>
            </form>

            <table border="1" class= "content-table">
                <thead>
                    <tr>
                        <th>ID Member</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Riwayat Peminjaman</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($res = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                        <td> <?= $res["memberId"]; ?></td>
                        <td> <?= $res["nama"]; ?></td>
                        <td> <?= $res["email"]; ?></td>
                        <td> <?= $res["noHp"]; ?></td>
                        <td> <?= $res["riwayatPeminjaman"]; ?></td>
                        <td>
                            <a href="editMember.php?id=<?= $res["memberId"]; ?>">Edit</a> |
                            <a href="deleteMember.php?id=<?= $res["memberId"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
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