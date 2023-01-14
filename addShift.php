<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

if (isset($_POST["addData"])) {
    $shiftCode = htmlspecialchars($_POST["shiftCode"]);
    $jamMulai = htmlspecialchars($_POST["jamMulai"]);
    $jamPulang = htmlspecialchars($_POST["jamPulang"]);

    $query = "INSERT INTO shift
                VALUES
                ('$shiftCode', '$jamMulai', '$jamPulang')";

    $sCode = "SELECT * FROM shift WHERE shiftCode = '$shiftCode'";
    $check = mysqli_query($conn, $sCode) or die(mysqli_error($conn));

    if (mysqli_num_rows($check) > 0) {
        echo "<script> alert('Shift Code sudah terpakai'); document.location.href= 'shift.php';</script>";
    } else {
        mysqli_query($conn, $query);
        echo "<script>document.location.href= 'shift.php';</script>";
    }

    /*
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
    */
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
                <input type="text" name="shiftCode" id="shiftCode" onkeyup="validation()" autocomplete="off" required>
                <span id="sCode-error"></span>
                <br>
                <label for="jamMulai">Jam Mulai : </label>
                <select name="jamMulai" id="jamMulai" autocomplete="off" required>
                    <option value="07:00:00">07:00</option>
                    <option value="10:00:01">10:00</option>
                    <option value="13:00:01">13:00</option>
                    <option value="16:00:01">16:00</option>
                </select>
                <!--<input type="text" name="jamMulai" id="jamMulai" autocomplete="off" required>-->
                <label for="jamPulang">Jam Pulang : </label>
                <select name="jamPulang" id="jamPulang" autocomplete="off" required>
                    <option value="10:00:00">10:00</option>
                    <option value="13:00:00">13:00</option>
                    <option value="16:00:00">16:00</option>
                    <option value="19:00:00">19:00</option>
                </select>
                <!--<input type="text" name="jamPulang" id="jamPulang" autocomplete="off" required>-->
                <button type="submit" name="addData">Add data</button>
            </form>

            <form action="" method="post" class="backButton">
                <button type="submit" name="back">Back</button>
            </form>
        </div>
    </div>
    <script>
        var shCode = document.getElementById("shiftCode");
        var shError = document.getElementById("sCode-error");

        function validation() {
            if (!shCode.value.match(/^[S][H]*[0-9]{3}$/)) {
                shError.innerHTML = "Shift Code invalid. Please enter with the format 'SH***'";
                return false;
            }

            shError.innerHTML = "";
            return true;
        }
    </script>
</body>

</html>