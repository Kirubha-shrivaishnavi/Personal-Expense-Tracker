<!DOCTYPE html>
<html>
<head>
    <title>Summary</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Transaction Summary</h2>
    <?php
    include 'db_connect.php';

    $sql = "SELECT Type, SUM(Amount) AS Total FROM Transaction GROUP BY Type";
    $result = $conn->query($sql);

    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Type</th><th>Total</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['Type']}</td><td>{$row['Total']}</td></tr>";
    }
    echo "</table>";
    ?>

    <br><a href="add_transaction.php">➕ Add More Transactions</a>
    <br><br><a href="index.php">⬅️ Back to Home</a>
</body>
</html>
