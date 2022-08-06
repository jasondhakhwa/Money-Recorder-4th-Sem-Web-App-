<?php
include('./includes/navbar.php');
?>
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

    $query = "insert into transactions( account, category, amount, type, user)
    values('$_POST[account]', '$_POST[category]', '$_POST[amount]', '$_POST[type]', '$_POST[user]')";
    mysqli_query($connection, $query);

    if (!$query) {
        die("Query error: " . mysqli_error($connection));
    }
    mysqli_close($connection);
    header("Location: http://localhost/College/Web%20App/MoneyManager/transaction.php");
    showForm();
}


function showForm()
{
    $user=$_SESSION['user']['username'];
    echo <<<___ADD_TRANSACTION__
<div class="edit-container">
    <div class="edit-content">
        <h2>Add</h2>
        <form action="$_SERVER[PHP_SELF]" method="post">
            <table>
                <tr>
                    <td>Type: </td>
                    <td>
                        <input type="radio" name="type" value="Income" id="income" />
                        <label for="income">
                            Income
                        </label>
                        <input type="radio" name="type" value="Expense" id="expense" />
                        <label for="expense">
                            Expense
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Account: </td>
                    <td>
                        <select name='account''>
                                <option>Cash</option>
                                <option>Credit</option>
                                <option>Debit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name=' category'>
                            <option>College</option>
                            <option>School</option>
                            <option>Friends</option>
                            <option>Bus</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Amount: </td>
                    <td><input placeholder="Amout" name="amount" /></td>
                </tr>
                <tr>
                    <td>Note: </td>
                    <td><input placeholder="Amout" name="note" /></td>
                </tr>
                <input type="hidden" value="1" name='__CHECK__' />
                <input type="hidden" value="$user" name='user' />
                <tr>
                    <td>
                        <button type="submit">Save</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </div>
___ADD_TRANSACTION__;
}
?>

</body>

</html>