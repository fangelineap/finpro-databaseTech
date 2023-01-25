<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM peminjaman WHERE idPeminjaman = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

$queryDenda = "SELECT * FROM denda";
$resultDenda = mysqli_query($conn, $queryDenda);

$queryMember = "SELECT * FROM member";
$resultMember = mysqli_query($conn, $queryMember);

$queryStaff = "SELECT * FROM staff";
$resultStaff = mysqli_query($conn, $queryStaff);

$queryBooks = "SELECT * FROM books";
$resultBooks = mysqli_query($conn, $queryBooks);

if( isset($_POST["editData"]))
{
    $idPeminjaman = htmlspecialchars($_POST["idPeminjaman"]);
    $idDenda = htmlspecialchars($_POST["idDenda"]);
    $memberId = htmlspecialchars($_POST["memberId"]);
    $staffId = htmlspecialchars($_POST["staffId"]);
    $bookId = htmlspecialchars($_POST["bookId"]);
    $jumlahBuku = htmlspecialchars($_POST["jumlahBuku"]);
    $tanggalPeminjaman = htmlspecialchars($_POST["tanggalPeminjaman"]);
    $tanggalPengembalian = htmlspecialchars($_POST["tanggalPengembalian"]);
    $bentukBuku = htmlspecialchars($_POST["bentukBuku"]);
    $statusPeminjaman = htmlspecialchars($_POST["statusPeminjaman"]);

    $queryStaff = "UPDATE peminjaman SET
                idPeminjaman = '$idPeminjaman', 
                idDenda = '$idDenda', 
                memberId = '$memberId',
                staffId = '$staffId',
                bookId = '$bookId',
                jumlahBuku = '$jumlahBuku',
                tanggalPeminjaman = '$tanggalPeminjaman',
                tanggalPengembalian = '$tanggalPengembalian',
                bentukBuku = '$bentukBuku',
                statusPeminjaman = '$statusPeminjaman'
            WHERE idPeminjaman = '$keyword'";
    mysqli_query($conn, $queryStaff);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'borrowing.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'borrowing.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: borrowing.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="editMenu.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Edit Borrowing List - <?= $res["idPeminjaman"]; ?></h1>

            <form action="" method="post">
                <label for="idPeminjaman"></label>
                <input type="hidden" name="idPeminjaman" id="idPeminjaman" autocomplete= "off" value="<?= $res["idPeminjaman"]; ?>"required>
                
                <label for="idDenda">ID Denda : </label>
                <select name="idDenda" id="idDenda">
                    <option value= "<?= $res["idDenda"]; ?>"> <?= $res["idDenda"]; ?></option>
                    <?php while ($resDenda = mysqli_fetch_assoc($resultDenda)) : ?>
                        <option value= "<?= $resDenda["idDenda"]; ?>"> <?= $resDenda["idDenda"]; ?></option>
                    <?php endwhile; ?>
                </select>
                
                <label for="memberId">ID Member : </label>
                <select name="memberId" id="memberId">
                    <option value= "<?= $res["memberId"]; ?>"> <?= $res["memberId"]; ?></option>
                    <?php while ($resMember = mysqli_fetch_assoc($resultMember)) : ?>
                        <option value= "<?= $resMember["memberId"]; ?>"> <?= $resMember["memberId"]; ?></option>
                    <?php endwhile; ?>
                </select>
                
                <label for="staffId">ID Staff : </label>
                <select name="staffId" id="staffId">
                    <option value= "<?= $res["staffId"]; ?>"> <?= $res["staffId"]; ?></option>
                    <?php while ($resStaff = mysqli_fetch_assoc($resultStaff)) : ?>
                        <option value= "<?= $resStaff["staffId"]; ?>"> <?= $resStaff["staffId"]; ?></option>
                    <?php endwhile; ?>
                </select>
                
                <label for="bookId">ID Buku : </label>
                <select name="bookId" id="bookId">
                    <option value= "<?= $res["bookId"]; ?>"> <?= $res["bookId"]; ?></option>
                    <?php while ($resBooks = mysqli_fetch_assoc($resultBooks)) : ?>
                        <option value= "<?= $resBooks["bookId"]; ?>"> <?= $resBooks["bookId"]; ?></option>
                    <?php endwhile; ?>
                </select>

                <label for="jumlahBuku">Jumlah Buku : </label>
                <input type="text" name="jumlahBuku" id="jumlahBuku" autocomplete= "off" value="<?= $res["jumlahBuku"]; ?>" required>
                
                <label for="tanggalPeminjaman">Tanggal Peminjaman : </label>
                <input type="text" name="tanggalPeminjaman" id="tanggalPeminjaman" autocomplete= "off" value="<?= $res["tanggalPeminjaman"]; ?>" required>
                
                <label for="tanggalPengembalian">Tanggal Pengembalian : </label>
                <input type="text" name="tanggalPengembalian" id="tanggalPengembalian" autocomplete= "off" value="<?= $res["tanggalPengembalian"]; ?>" required>
                
                <label for="bentukBuku">Bentuk Buku : </label>
                <select name="bentukBuku" id="bentukBuku">
                    <option value= "<?= $res["bentukBuku"]; ?>"> <?= $res["bentukBuku"]; ?></option>
                    <option value="Fisik">Fisik</option>
                    <option value="Digital">Digital</option>
                </select>

                <label for="statusPeminjaman">Status Peminjaman : </label>
                <select name="statusPeminjaman" id="statusPeminjaman">
                    <option value= "<?= $res["statusPeminjaman"]; ?>"> <?= $res["statusPeminjaman"]; ?></option>
                    <option value="Belum">Belum</option>
                    <option value="Sudah">Sudah</option>
                </select>

                <button type="submit" name="editData">Edit data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>
</html>