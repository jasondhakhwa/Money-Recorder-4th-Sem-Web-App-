<?php include('./includes/navbar.php'); ?>

<?php
function saveUser()
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = mysqli_connect("localhost", "root", "", "money_manager");
    if (!$connection) {
        die("Cannot connect to the database server" . mysqli_connect_error());
    }

    $query = "select * from users where username='$username' and password='$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($connection));
    }
    if (!mysqli_num_rows($result)) {
        echo "<h2>Invalid Login Credentials</h2>";
        showForm();
    } else {
        $_SESSION['user'] = mysqli_fetch_assoc($result);
        header("Location: http://localhost/College/Web%20App/MoneyManager/transaction.php");
    }
    mysqli_close($connection);
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        unset($_SESSION['user']);
        header("Location: http://localhost/College/Web%20App/MoneyManager/login.php");
    }
}


function sanitizeDatas()
{
    $_POST['username'] = htmlentities($_POST['username']);
    $_POST['password'] = htmlentities($_POST['password']);
}

if (isset($_POST['__CHECK__'])) {
    saveUser();
} else {
    showForm();
}

function showForm()
{
    echo <<<__LOGIN__
        <!-- Login Container -->
        <div class='login-contains'>
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
                        <td><input placeholder="Password" name='password' type='password'/></td>
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
                <p>Don't have an account? <a href="register.php"  class='log-button'>Register</a></p>
            </div>
        </div> 
        <div>
        <img src='./images/undraw/login.svg' class='welcome-image'/>
        </div>
        </div>
__LOGIN__;
}

?>
</body>

</html>