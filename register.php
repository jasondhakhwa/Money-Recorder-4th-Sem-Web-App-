<?php include('./includes/navbar.php'); ?>

<?php

if (isset($_POST['__CHECK__'])) {
  // sanitizeData();
  if ($error = validateForm()) {
    showErrors($error);
    showForm();
  } else {
    saveData();
  }
} else {
  showForm();
}

function showErrors($errors)
{
  echo <<< ERROR_TEXT
    <h2>Plese Correct These Errors</h2>
    <ul>
    ERROR_TEXT;

  foreach ($errors as $error) {
    echo "<li>$error</li>";
  }

  echo "</ul>";
}


function saveData()
{
  $connection = mysqli_connect("localhost", "root", "", "money_manager");
  if (!$connection) {
    die("Cannot connect to the database server" . mysqli_connect_error());
  }
  $query = "insert into users(username, password)
    values('$_POST[username]', '$_POST[password]')
    ";
  mysqli_query($connection, $query);
  if (!$query) {
    die("Query error: " . mysqli_error($connection));
  }
  mysqli_close($connection);
  echo "<h2>Data Inserted Successfully</h2>";
  showForm();
}


function sanitizeDatas()
{
  $_POST['username'] = htmlentities($_POST['username']);
  $_POST['password'] = htmlentities($_POST['password']);
}


function validateForm()
{
  $errors = array();

  if (strlen($_POST['username']) < 2) {
    $errors[] = "Username must be at least two characters long";
  }

  if (strlen($_POST['password']) < 6) {
    $errors[] = "Password must be at least six characters long";
  }


  return $errors;
}


function showForm()
{
  echo <<<__REGISTER__
  <!-- Register Container -->
  <div class="login-contains">
  <div class="login-container">
    <h2>Register</h2>
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
        <tr>
          <td>Confirm:</td>
          <td><input placeholder="Password" name='re-passowrd' type='password'/></td>
        </tr>
        <input type="hidden" value="1" name='__CHECK__' />
        <tr>
          <td>
            <button type='submit'>Register</button>
          </td>
        </tr>
      </table>
    </form>
    <div>
      <p>Already have an account? <a href="login.php" class='log-button'>Login</a></p>
    </div>
  </div>
  <div>
  <img src='./images/undraw/register.svg' class='welcome-image'/>
  </div>
  </div>
__REGISTER__;
}
?>
</body>

</html>