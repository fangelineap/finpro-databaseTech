<?php

$conn = mysqli_connect("localhost", "root", "", "sistemPerpustakaan");

$keyword = $_GET["id"];

$query = "DELETE FROM staff WHERE staffId = '$keyword'";
mysqli_query($conn, $query);

if( mysqli_affected_rows($conn) > 0)
{
    echo "
        <script>
            alert('Data has been deleted.');
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
?>