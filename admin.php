<?php
session_start();

if( !isset($_SESSION["loginadmin"]))
{
    header("Location: loginadmin.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu for admin</title>
</head>
<body>
    <a href="logout.php">
        <button type="submit">Logout</button>
    </a>

    <form action="shift.php">
        <button>Shift</button>
    </form>

    <form action="staff.php">
        <button>Staff</button>
    </form>

    <form action="category.php">
        <button>Category</button>
    </form>

    <form action="books.php">
        <button>Books</button>
    </form>

    <form action="fine.php">
        <button>Fine</button>
    </form>

    <form action="member.php">
        <button>Member</button>
    </form>
    
    <form action="borrowing.php">
        <button>Borrowing List</button>
    </form>
</body>
</html>