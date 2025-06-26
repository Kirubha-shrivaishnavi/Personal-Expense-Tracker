<!DOCTYPE html>
<html>
<head>
    <title>All Transactions</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Transaction History</h2>
    <a href="add_transaction.php">Add New Transaction</a><br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Category</th>
            <th>Payment Method</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        <?php
        include 'db_connect.php';
        $sql = "SELECT 
                    t.TransactionID, 
                    u.UserName, 
                    t.Amount, 
                    t.Type, 
                    c.CategoryName, 
                    p.MethodName, 
                    t.Description, 
                    t.TransactionDate
                FROM Transaction t
                JOIN User u ON t.UserID = u.UserID
                JOIN Category c ON t.CategoryID = c.CategoryID
                JOIN PaymentMethod p ON t.PaymentID = p.PaymentID
                ORDER BY t.TransactionDate DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['TransactionID']}</td>
                    <td>{$row['UserName']}</td>
                    <td>{$row['Amount']}</td>
                    <td>{$row['Type']}</td>
                    <td>{$row['CategoryName']}</td>
                    <td>{$row['MethodName']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['TransactionDate']}</td>
                  </tr>";
        }
        ?>
    </table>

    <br><br><a href="index.php">⬅️ Back to Home</a>
</body>
</html>
