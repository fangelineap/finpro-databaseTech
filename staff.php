<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM staff ORDER BY staffId";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM staff";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM staff WHERE 
        staffId LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
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
    header("Location: addStaff.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff</title>
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
            <h1>Staff</h1>

            <form action="" method="post">
                <input type="text" name="keyword" size= "30" 
                placeholder="Enter keyword..." autocomplete="off">
                <button type= "submit" name= "search">Search</button>
            </form>

            <table border="1" class= "content-table">
                <thead>
                    <tr>
                        <th>ID Staff</th>
                        <th>Kode Shift</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($res = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                        <td> <?= $res["staffId"]; ?></td>
                        <td> <?= $res["shiftCode"]; ?></td>
                        <td> <?= $res["nama"]; ?></td>
                        <td> <?= $res["noHp"]; ?></td>
                        <td> <?= $res["email"]; ?></td>
                        <td> <?= $res["jabatan"]; ?></td>
                        <td>
                            <a href="editStaff.php?id=<?= $res["staffId"]; ?>">Edit</a> |
                            <a href="deleteStaff.php?id=<?= $res["staffId"]; ?>" onclick= "return confirm('Delete this data?');">Delete</a>
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