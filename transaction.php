<?php include('./includes/navbar.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
  die("<h1>Please <a href='login.php'>Login</a></h1>");
}

$connection = mysqli_connect("localhost", "root", "", "money_manager");
if (!$connection) {
  die("Connection failed..." . mysqli_connect_error());
}
$username = $_SESSION['user']['username'];
$query = "select * from transactions 
  where user= '$username' ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die("Query failed..." . mysqli_error($connection));
};


if (isset($_GET['action'])) {
  if ($_GET['action'] == "delete") {
    $connection = mysqli_connect("localhost", "root", "", "money_manager");
    if (!$connection) {
      die(mysqli_connect_error());
    }
    $query = "delete from transactions where id=$_GET[id]";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die(mysqli_error($connection));
    }
  }
  header("Location: http://localhost/College/Web%20App/MoneyManager/transaction.php");
}
?>

<!-- Page Content -->
<div class="transaction-content">
  <h2>Transaction</h2>
  <div class="transaction-blocks-container">
    <div class="transaction-contains">
      <div class="transaction-row transaction-head">
        <span>Type</span>
        <span>Account</span>
        <span>Category</span>
        <span>Amount</span>
        <span>Actions</span>
      </div>

      <?php
      $income = 0;
      $expense = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['type'] == 'income') {
          $income += $row['amount'];
        } else {
          $expense += $row['amount'];
        }
        echo "
            <div class='transaction-row'>
              <span>$row[type]</span>
              <span>$row[account]</span>
              <span>$row[category]</span>
              <span>$row[amount]</span>
              <div>
                <a href='edit.php?action=update&id=$row[id]'>
                  <img class='action-buttons' src='./images/actions/edit.svg' />
                </a>
                <a href='$_SERVER[PHP_SELF]?action=delete&id=$row[id]'>
                  <img class='action-buttons' src='./images/actions/delete.svg' />
                </a>
              </div>
            </div>
          ";
      }
      ?>
    </div>

    <div class="transaction-contains">
      <table class="transaction-summary-table">
        <tr>
          <td>Income</td>
          <td><?php echo $income ?></td>
        </tr>
        <tr>
          <td>Expenses</td>
          <td><?php echo $expense ?></td>
        </tr>
        <tr>
          <td>Total</td>
          <td><?php echo ($income - $expense) ?></td>
        </tr>
      </table>
    </div>
  </div>
  <a class="add-transaction-button" id="add-transaction" href="add.php">+</a>
</div>

</body>

</html>