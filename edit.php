<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Money Manager</title>
    <link rel="stylesheet" href="./CSS/edit.css" />
    <link rel="stylesheet" href="./CSS/index.css" />
  </head>
  <body>
    <?php
        include('./includes/navbar.php')
    ?>

    <!-- Edit Content -->
    <div class="edit-container">
      <div class="edit-content">
        <h2>Add Transaction</h2>
        <form>
          <table>
            <tr>
              <td>
                <input
                  type="radio"
                  name="transaction-type"
                  value="Income"
                  id="input-type-income"
                />
                <label for="input-type-income">Income</label>
                <input
                  type="radio"
                  name="transaction-type"
                  value="Expenses"
                  id="input-type-expenses"
                />
                <label for="input-type-expenses">Expenses</label>
              </td>
            </tr>
            <tr>
              <td>Date:</td>
              <td><input placeholder="Date" /></td>
            </tr>
            <tr>
              <td>Description:</td>
              <td><input placeholder="Description" /></td>
            </tr>
            <tr>
              <td>Type:</td>
              <td><input placeholder="Type" /></td>
            </tr>
            <tr>
              <td>Amount:</td>
              <td><input placeholder="Amout" /></td>
            </tr>
            <tr>
              <td>
                <button>Save</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>
