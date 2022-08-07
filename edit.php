<?php include('./includes/navbar.php'); ?>

<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'update') {
    $connection = mysqli_connect("localhost", "root", "", "money_manager");
    if (!$connection) {
      die("Connection error" . mysqli_connect_error());
    }

    $query = "select * from transactions where id='$_GET[id]'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Query failed..." . mysqli_error($connection));
    }

    $info = mysqli_fetch_assoc($result);
  }
}

if (isset($_POST['__CHECK__'])) {
  $connection = mysqli_connect("localhost", "root", "", "money_manager");
  if (!$connection) {
    die("Connectionn error..." . mysqli_connect_error());
  }
  $query = "
      update transactions 
      set 
          account='$_POST[account]' ,
          category='$_POST[category]' ,
          type='$_POST[type]' ,
          amount='$_POST[amount]'
      where id=$_POST[id]
  ";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die("Query error..." . mysqli_error($connection));
  }

  header("Location: http://localhost/College/Web%20App/MoneyManager/transaction.php");
}
?>

<?php

echo <<<__EDIT__
<!-- Edit Content -->
<div class="edit-container">
  <div class="edit-content">
    <h2>Edit Transaction</h2>
    <form action="$_SERVER[PHP_SELF]" method="post">
      <table>
        <tr>
          <td>Type:</td>
          <td>
            <input type="radio" name="type" value="Income"  id="input-type-income" />
            <label for="input-type-income">Income</label>
            <input type="radio" name="type" value="Expense" id="input-type-expenses" />
            <label for="input-type-expenses">Expenses</label>
          </td>
        </tr>
        <tr>
          <td>Account:</td>
          <td><input placeholder="Account" value='$info[account]' name='account' /></td>
        </tr>
        <tr>
          <td>Category:</td>
          <td><input placeholder="Category" value='$info[category]' name='category' /></td>
        </tr>
        <tr>
          <td>Amount:</td>
          <td><input placeholder="Amount"  value='$info[amount]' name='amount' type='number'/></td>
        </tr>
        <input type="hidden" value="1" name='__CHECK__' />
        <input type="hidden" value="$info[id]" name='id' />
        <tr>
          <td>
            <button type='submit'>Save</button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
__EDIT__;
?>
</body>

</html>