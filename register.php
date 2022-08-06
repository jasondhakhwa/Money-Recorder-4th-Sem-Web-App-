<?php include('./includes/navbar.php'); ?>

<?php
if (isset($_POST['__CHECK__'])) {
  saveData();
} else {
  showForm();
}

function saveData()
{
  $connection = mysqli_connect("localhost", "root", "", "money_manager");
  if (!$connection) {
    die("Cannot connect to the database server" . mysqli_connect_error());
  }
  $query = "insert into users(username, first_name, last_name, email, password)
    values('$_POST[username]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]',  '$_POST[password]')
    ";
  mysqli_query($connection, $query);
  if (!$query) {
    die("Query error: " . mysqli_error($connection));
  }
  mysqli_close($connection);
  echo "<h2>Data Inserted Successfully</h2>";
  showForm();
}

function showForm()
{
  echo <<<__REGISTER__
  <!-- Register Container -->
  <div class="login-container">
    <h2>Register</h2>
    <form action="$_SERVER[PHP_SELF]" method="POST">
      <table>
        <tr>
          <td>First Name:</td>
          <td><input placeholder="First Name" name='first_name' /></td>
        </tr>
        <tr>
          <td>Last Name:</td>
          <td><input placeholder="Last Name" name='last_name' /></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input placeholder="Email" name='email'/></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td><input placeholder="Username" name='username'/></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input placeholder="Password" name='password'/></td>
        </tr>
        <tr>
          <td>Confirm:</td>
          <td><input placeholder="Password" name='re-passowrd'/></td>
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
      <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
__REGISTER__;
}
?>
</body>

</html>