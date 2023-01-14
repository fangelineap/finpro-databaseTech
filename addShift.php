<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

if (isset($_POST["addData"])) {
    $shiftCode = htmlspecialchars($_POST["shiftCode"]);
    $jamMulai = htmlspecialchars($_POST["jamMulai"]);
    $jamPulang = htmlspecialchars($_POST["jamPulang"]);

    $query = "INSERT INTO shift
                VALUES
                ('$shiftCode', '$jamMulai', '$jamPulang')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Data has been added.');
                document.location.href= 'shift.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'shift.php'
            </script>
        ";
    }
}

if (isset($_POST["back"])) {
    header("Location: shift.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Shift</title>
    <link rel="stylesheet" href="addMenu.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <h1>Add Shift</h1>

            <form action="" method="post">
                <label for="shiftCode">Shift Code : </label>
                <input type="text" name="shiftCode" id="shiftCode" autocomplete="off" required>
                <label for="jamMulai">Jam Mulai : </label>
                <input type="text" name="jamMulai" id="jamMulai" autocomplete="off" required>
                <label for="jamPulang">Jam Pulang : </label>
                <input type="text" name="jamPulang" id="jamPulang" autocomplete="off" required>
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
</body>

</html>