<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "SELECT * FROM shift WHERE shiftCode = '$keyword'";
$result = mysqli_query($conn, $query);
$res = mysqli_fetch_assoc($result);

if( isset($_POST["editData"]))
{
    $shiftCode = htmlspecialchars($_POST["shiftCode"]);
    $jamMulai = htmlspecialchars($_POST["jamMulai"]);
    $jamPulang = htmlspecialchars($_POST["jamPulang"]);

    $query = "UPDATE shift SET
                shiftCode = '$shiftCode', 
                jamMulai = '$jamMulai', 
                jamPulang = '$jamPulang'
            WHERE shiftCode = '$keyword'";
    mysqli_query($conn, $query);

    if( mysqli_affected_rows($conn) > 0)
    {
        echo "
            <script>
                alert('Data has been edited.');
                document.location.href= 'shift.php';
            </script>
        ";
    }
    else
    {
        echo "
            <script>
                alert('Error.');
                document.location.href= 'shift.php';
            </script>
        ";
    }
}


if( isset($_POST["back"]))
{
    header("Location: shift.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shift</title>
    <link rel="stylesheet" href="editMenu.css">
</head>
<body>

<div class="container">
    <div class="login">
        <h1>Edit Shift - <?= $res["shiftCode"]; ?></h1>

        <hr>

        <form action="" method="post">
            <label for="shiftCode"></label>
                <input type="hidden" name="shiftCode" id="shiftCode" autocomplete= "off" value="<?= $res["shiftCode"]; ?>"required>
            <label for="jamMulai">Jam Mulai : </label>
                <input type="text" name="jamMulai" id="jamMulai" autocomplete= "off" value="<?= $res["jamMulai"]; ?>" required>
            <label for="jamPulang">Jam Pulang : </label>
                <input type="text" name="jamPulang" id="jamPulang" autocomplete= "off" value="<?= $res["jamPulang"]; ?>" required>
            <button type="submit" name="editData">Edit data</button>
        </form>

        <form action="" method="post" class="backButton">
            <button type="submit" name="back">Back</button>
        </form>
    </div>
</div>

</body>
</html>