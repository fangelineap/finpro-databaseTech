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
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <div class="all">
            <h1>Admin menu</h1>
            <hr>
            <div class="admin">
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

                <form action="logout.php">
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        <div class= "right">
            <img src="image.png" alt="">
        </div>
    </div>
</body>
</html>