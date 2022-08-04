<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Money Manager</title>
  <link rel="stylesheet" href="./CSS/index.css" />
  <link rel="stylesheet" href="./CSS/transaction.css" />
  <link rel="stylesheet" href="./CSS/edit.css" />
</head>

<body>
  <!-- Add button popup -->
  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>

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
        <!-- <a href="register.html">Register</a> -->
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="transaction-content">
    <h2>Transaction</h2>
    <div class="transaction-blocks-container">
      <div class="transaction-contains">
        <div class="transaction-row transaction-head">
          <span>Date</span>
          <span>Type</span>
          <span>Account</span>
          <span>Category</span>
          <span>Amount</span>
          <span>Actions</span>
        </div>

        <div class="transaction-row">
          <span>2017</span>
          <span>Expense</span>
          <span>Cash</span>
          <span>Food</span>
          <span>1000</span>
          <div>
            <a href="edit.html">
              <img class="action-buttons" src="edit.svg" />
            </a>
            <a href="edit.html">
              <img class="action-buttons" src="delete.svg" />
            </a>
          </div>
        </div>
      </div>

      <div class="transaction-contains">
        <table class="transaction-summary-table">
          <tr>
            <td>Income</td>
            <td>1200</td>
          </tr>
          <tr>
            <td>Expenses</td>
            <td>1200</td>
          </tr>
          <tr>
            <td>Total</td>
            <td>1200</td>
          </tr>
        </table>
      </div>
    </div>
    <a class="add-transaction-button" id="add-transaction" href="add.php">+</a>
  </div>

  <!--   -->
  <script>
    function openForm() {
      document.getElementById("add-transaction").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>


</body>

</html>