<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="./CSS/index.css" />
</head>

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
            <a href="login.html">Login</a>
         </div>
      </div>
   </div>

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
      $query = "insert into users(user, first_name, last_name, email, password)
    values('$_POST[user]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]',  '$_POST[password]')
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
          <td><input placeholder="Username" name='user'/></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input placeholder="Password" name='passowrd'/></td>
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
      <p>Already have an account? <a href="login.html">Login</a></p>
    </div>
  </div>
__REGISTER__;
   }
   ?>
</body>

</html>