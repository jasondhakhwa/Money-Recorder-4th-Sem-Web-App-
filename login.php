<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/index.css" />
</head>

<?php

function saveUser()
{

    $connection = mysqli_connect("localhost", "root", "", "money_manager");
    if (!$connection) {
        die("Cannot connect to the database server" . mysqli_connect_error());
    }

    $query = "insert into users(username, password)
    values('$_POST[username]', '$_POST[password]')";
    mysqli_query($connection, $query);

    if (!$query) {
        die("Query error: " . mysqli_error($connection));
    }

    mysqli_close($connection);
    echo "<h2>Data Inserted Successfully</h2>";
    showForm();
}
?>

<body>
    <!-- Navbar Content -->
    <div class="navbar-container">
        <div class="navbar-contains">
            <p>Logo</p>
            <div>
                <a href="transaction.html">Transaction</a>
                <a href="accounts.html">Accounts</a>
                <a href="budget.html">Budget</a>
            </div>
            <div>
                <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['__CHECK__'])) {
        saveUser();
    } else {
        showForm();
    }

    function showForm()
    {
        echo <<<__LOGIN__
        <!-- Login Container -->
        <div class="login-container">
            <h2>Login</h2>
            <form action="$_SERVER[PHP_SELF]" method="POST">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input placeholder="Username" name='username'/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input placeholder="Password" name='password'/></td>
                    </tr>
                    <input type="hidden" value="1" name='__CHECK__' />
                    <tr>
                        <td>
                            <button type='submit'>Login</button>
                        </td>
                    </tr>
                </table>
            </form>
            <div>
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div> 
__LOGIN__;
    }

    ?>
</body>

</html>