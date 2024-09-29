<?php
// Ihuza rya database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_system";

// Connect muri database
$conn = new mysqli($servername, $username, $password, $dbname);

// Reba niba connection ya database ari sawa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL Query yo gusoma abarwayi bose
$sql = "SELECT first_name, last_name, email, phone_number, address FROM patients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urutonde rw'Abarwayi</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
    <h2>Urutonde rw'Abarwayi</h2>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            // Kwereka abarwayi muri HTML table
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nta barwayi babonetse.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>
</html>
