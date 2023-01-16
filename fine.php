<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$query = "SELECT * FROM denda ORDER BY idDenda";
$result = mysqli_query($conn, $query);

if( isset($_POST["search"]))
{
    $keyword = $_POST["keyword"];
    if( $keyword == '')
    {
        $querySearch = "SELECT * FROM denda";
        $result = mysqli_query($conn, $querySearch);
    }
    else
    {
        $querySearch = "SELECT * FROM denda WHERE 
        idDenda LIKE '%$keyword%' OR
        jenisPembayaran LIKE '%$keyword%' OR
        jenisDenda LIKE '%$keyword%'
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
    header("Location: addFine.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-U
