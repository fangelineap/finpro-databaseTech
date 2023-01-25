<?php
$conn = mysqli_connect("localhost", "root", "", "sistemperpustakaan");

$query = "SELECT * FROM peminjaman JOIN denda ON peminjaman.idDenda = denda.idDenda";

$result = mysqli_query($conn, $query);

while($res = mysqli_fetch_assoc($result))
{
    if($res["statusPeminjaman"] == "Belum")
    {
        if($res["tanggalPengembalian"] < date("Y-m-d"))
        {
            $date1 = date_create($res["tanggalPengembalian"]);
            $date2 = date_create(date("Y-m-d"));
            $diff = date_diff($date1, $date2);
            $late = $diff->format("%a");
            $fine = $late * 5000;
            $idDenda =$res["idDenda"];
            $queryUpdate = "UPDATE denda SET
                            totalDenda = $fine,
                            hariKeterlambatan = $late
                            WHERE idDenda = '$idDenda'";
            mysqli_query($conn, $queryUpdate);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "container">
        <div class = "login">
            <form action="loginadmin.php">
            <h1>Login</h1>
            <hr>
            <p>Please select your role...</p>
                <button type="">Admin</button>
            </form>
            <form action="loginuser.php">
                <button type="">Member</button>
            </form>
        </div>
        <div class= "right">
            <img src="image.png" alt="">
        </div>
    </div>
</body>
</html>