<!DOCTYPE html>
<html>
<head>
    <title>Add Transaction</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Add New Transaction</h2>
    <form method="POST" action="">
        Amount: <input type="number" step="0.01" name="amount" required><br><br>
        Type: 
        <select name="type">
            <option value="Income">Income</option>
            <option value="Expense">Expense</option>
        </select><br><br>
        Category: 
        <select name="category">
            <?php
            include 'db_connect.php';
            $result = $conn->query("SELECT * FROM Category");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['CategoryID']}'>{$row['CategoryName']}</option>";
            }
            ?>
        </select><br><br>
        Payment Method:
        <select name="payment">
            <?php
            $result = $conn->query("SELECT * FROM PaymentMethod");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['PaymentID']}'>{$row['MethodName']}</option>";
            }
            ?>
        </select><br><br>
        Description: <input type="text" name="description"><br><br>
        <input type="submit" value="Add Transaction">
        <a href="view_transactions.php">View All Transactions</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $amount = $_POST['amount'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $payment = $_POST['payment'];
        $desc = $_POST['description'];

        $sql = "INSERT INTO Transaction (UserID, Amount, Type, CategoryID, PaymentID, Description)
                VALUES (1, '$amount', '$type', '$category', '$payment', '$desc')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Transaction added successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
        }
    }
    ?>

    <br><br><a href="index.php">⬅️ Back to Home</a>
</body>
</html>
