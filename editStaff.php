<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM staff WHERE staffId = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);


$queryShift = "SELECT * FROM shift";
$resultShift = mysqli_query($conn, $queryShift);

if( isset($_POST["editData"]))
{
    $staffId = htmlspecialchars($_POST["staffId"]);
    $shiftCode = htmlspecialchars($_POST["shiftCode"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $noHp = htmlspecialchars($_POST["noHp"]);
    $email = htmlspecialchars($_POST["email"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);

    $queryStaff = "UPDATE staff SET
                staffId = '$staffId', 
                shiftCode = '$shiftCode', 
                nama = '$nama',
                noHp = '$noHp',
                email = '$email',
                jabatan = '$jabatan'
            WHERE staffId = '$keyword'";
    mysqli_query($conn, $queryStaff);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'staff.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'staff.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: staff.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
    <link rel="stylesheet" href="editMenu.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Edit Staff - <?= $res["staffId"]; ?></h1>

            <form action="" method="post">
                <label for="staffId"></label>
                <input type="hidden" name="staffId" id="staffId" autocomplete= "off" value="<?= $res["staffId"]; ?>"required>
                <label for="shiftCode">Kode Shift : </label>
                    <select name="shiftCode" id="shiftCode">
                        <option value= "<?= $res["shiftCode"]; ?>"> <?= $res["shiftCode"]; ?></option>
                        <?php while ($ress = mysqli_fetch_assoc($resultShift)) : ?>
                            <option value= "<?= $ress["shiftCode"]; ?>"> <?= $ress["shiftCode"]; ?></option>
                        <?php endwhile; ?>
                    </select>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" autocomplete= "off" value="<?= $res["nama"]; ?>" required>
                <label for="noHp">Nomor HP : </label>
                <input type="text" name="noHp" id="noHp" autocomplete= "off" value="<?= $res["noHp"]; ?>" required>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" autocomplete= "off" value="<?= $res["email"]; ?>" required>
                <label for="jabatan">Jabatan : </label>
                <input type="text" name="jabatan" id="jabatan" autocomplete= "off" value="<?= $res["jabatan"]; ?>" required>
                <button type="submit" name="editData">Edit data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>
</html>