<?php
// Guhuza na database
$servername = "localhost";
$username = "root";  // Izina rya MySQL user
$password = "";  // Password yawe muri MySQL
$dbname = "health_system";  // Iyi niyo database twashyizeho mbere

// Connect na database
$conn = new mysqli($servername, $username, $password, $dbname);

// Reba niba connection ari sawa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Akira amakuru aturutse muri form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // SQL Query yo kwinjiza umurwayi mushya muri database
    $sql = "INSERT INTO patients (first_name, last_name, email, phone_number, address)
            VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Umurwayi mushya yongewemo neza!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungura connection
$conn->close();
?>
