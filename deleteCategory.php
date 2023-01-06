<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "DELETE FROM kategori WHERE idKategori = '$keyword'";
mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0)
{
    echo "
        <script>
            alert('Data has been deleted.');
            document.location.href= 'category.php';
        </script>
    ";
}
else
{
    echo "
        <script>
            alert('Error.');
            document.location.href= 'category.php';
        </script>
    ";
}
?>