<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$queryDenda = "SELECT * FROM denda";
$resultDenda = mysqli_query($conn, $queryDenda);

$queryMember = "SELECT * FROM member";
$resultMember = mysqli_query($conn, $queryMember);

$queryStaff = "SELECT * FROM staff";
$resultStaff = mysqli_query($conn, $queryStaff);

$queryBooks = "SELECT * FROM books";
$resultBooks = mysqli_query($conn, $queryBooks);

if (isset($_POST["addData"])) {
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

    $query = "INSERT INTO peminjaman
                VALUES
                ('$idPeminjaman', '$idDenda', '$memberId', '$staffId', '$bookId', '$jumlahBuku', '$tanggalPeminjaman', '$tanggalPengembalian', '$bentukBuku', '$statusPeminjaman')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'borrowing.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'borrowing.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: borrowing.php");
}

function random(){
    $num = '0123456789';
    $string = 'PNJ';
    for($i = 0; $i < 7; $i++){
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
    <title>Add Borrowing List</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Borrowing List</h1>
            <form id="generate" action="" method="post" top=50% right=100%>
                    <button type="submit" id="generate" onclick="random()"> Generate Transaction ID </button>
            </form>
            
            <form action="" method="post">
                <label for="idPeminjaman">ID Peminjaman : </label>
                <input type="text" name="idPeminjaman" id="idPeminjaman" value="<?php echo random(); ?>" autocomplete="off" required>
                <label for="idDenda">ID Denda</label>
                <select name="idDenda" id="idDenda">
                    <option disabled selected>Pilih</option>
                    <?php while ($resDenda = mysqli_fetch_assoc($resultDenda)) : ?>
                        <option value="<?= $resDenda["idDenda"]; ?>"> <?= $resDenda["idDenda"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="memberId">ID Member</label>
                <select name="memberId" id="memberId">
                    <option disabled selected>Pilih</option>
                    <?php while ($resMember = mysqli_fetch_assoc($resultMember)) : ?>
                        <option value="<?= $resMember["memberId"]; ?>"> <?= $resMember["memberId"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="staffId">ID Staff</label>
                <select name="staffId" id="staffId">
                    <option disabled selected>Pilih</option>
                    <?php while ($resStaff = mysqli_fetch_assoc($resultStaff)) : ?>
                        <option value="<?= $resStaff["staffId"]; ?>"> <?= $resStaff["staffId"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="bookId">ID Buku</label>
                <select name="bookId" id="bookId">
                    <option disabled selected>Pilih</option>
                    <?php while ($resBooks = mysqli_fetch_assoc($resultBooks)) : ?>
                        <option value="<?= $resBooks["bookId"]; ?>"> <?= $resBooks["bookId"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="jumlahBuku">Jumlah Buku : </label>
                <input type="text" name="jumlahBuku" id="jumlahBuku" autocomplete="off" required>
                <label for="tanggalPeminjaman">Tanggal Peminjaman : </label>
                <input type="text" name="tanggalPeminjaman" id="tanggalPeminjaman" autocomplete="off" required>
                <label for="tanggalPengembalian">Tanggal Pengembalian : </label>
                <input type="text" name="tanggalPengembalian" id="tanggalPengembalian" autocomplete="off" required>
                <label for="bentukBuku">Bentuk Buku : </label>
                <select name="bentukBuku" id="bentukBuku">
                    <option value="Fisik">Pilih</option>
                    <option value="Fisik">Fisik</option>
                    <option value="Digital">Digital</option>
                </select>

                <label for="statusPeminjaman">Status Peminjaman : </label>
                <select name="statusPeminjaman" id="statusPeminjaman">
                    <option value="Belum">Pilih</option>
                    <option value="Belum">Belum</option>
                    <option value="Sudah">Sudah</option>
                </select>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>
