<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "DELETE FROM denda WHERE idDenda = '$keyword'";
mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0)
{
    echo "
        <script>
            alert('Data has been deleted.');
            document.location.href= 'fine.php';
        </script>
    ";
}
else
{
    echo "
        <script>
            alert('Error.');
            document.location.href= 'fine.php';
        </script>
    ";
}
?>