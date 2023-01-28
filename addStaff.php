<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$queryShift = "SELECT * FROM shift";
$resultShift = mysqli_query($conn, $queryShift);

if (isset($_POST["addData"])) {
    $staffId = htmlspecialchars($_POST["staffId"]);
    $shiftCode = htmlspecialchars($_POST["shiftCode"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $noHp = htmlspecialchars($_POST["noHp"]);
    $email = htmlspecialchars($_POST["email"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);

    $query = "INSERT INTO staff
                VALUES
                ('$staffId', '$shiftCode', '$nama', '$noHp', '$email', '$jabatan')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'staff.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'staff.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: staff.php");
}

function random(){
    $num = '0123456789';
    $string = 'ST';
    for($i = 0; $i < 3; $i++){
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
    <title>Add Staff</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Staff</h1>
            <form id="generate" action="" method="post" top=50% right=100%>
                    <button type="submit" id="generate" onclick="random()"> Generate Staff ID </button>
            </form>
            
            <form action="" method="post">
                <label for="staffId">ID Staff : </label>
                <input type="text" name="staffId" id="staffId" value="<?php echo random(); ?>" autocomplete="off" required>
                <label for="shiftCode">Kode Shift</label>
                <select name="shiftCode" id="shiftCode">
                    <option disabled selected>Pilih</option>
                    <?php while ($res = mysqli_fetch_assoc($resultShift)) : ?>
                        <option value="<?= $res["shiftCode"]; ?>"> <?= $res["shiftCode"]; ?></option>
                    <?php endwhile; ?>
                </select>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" autocomplete="off" required>
                <label for="noHp">Nomor HP : </label>
                <input type="text" name="noHp" id="noHp" autocomplete="off" required>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" autocomplete="off" required>
                <label for="jabatan">Jabatan : </label>
                <input type="text" name="jabatan" id="jabatan" autocomplete="off" required>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>
