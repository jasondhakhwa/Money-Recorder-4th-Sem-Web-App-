<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/index.css" />
    <link rel="stylesheet" href="./CSS/transaction.css" />
    <link rel="stylesheet" href="./CSS/edit.css" />
</head>

<body>
    <!-- Navbar Content -->
    <div class="navbar-container">
        <div class="navbar-contains">
            <p>Logo</p>
            <div>
                <a href="transaction.php">Transaction</a>
            </div>
            <div>
                <?php
                if (!isset($_SESSION['user'])) {
                    echo "<a href='login.php'>Login</a>";
                } else {
                    echo $_SESSION['user']['username'];
                    echo "<a href='login.php?action=logout'>Logout</a>";
                }
                ?>
            </div>
        </div>
    </div>