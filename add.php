<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Money Manager</title>
    <link rel="stylesheet" href="./CSS/edit.css">
    <link rel="stylesheet" href="./CSS/index.css">
</head>

<?php
function saveData()
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
    <?php
    include('./includes/navbar.php')
    ?>

    <!-- Edit Content -->
    <div class="edit-container">
        <div class="edit-content">
            <h2>Add</h2>
            <form>
                <table>
                    <tr>
                        <td>Type: </td>
                        <td>
                            <input type="radio" name="type" value="income" id="income" />
                            <label for="income">
                                Income
                            </label>
                            <input type="radio" name="type" value="expense" id="expense"/>
                            <label for="expense">
                                Expense
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Account: </td>
                        <td>
                            <select>
                                <option>Cash</option>
                                <option>Credit</option>
                                <option>Debit</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td>
                            <select>
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
                    <tr>
                        <td>
                            <button type="submit">Save</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>