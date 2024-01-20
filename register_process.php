<?php
// register_process.php
$servername = "localhost";
$username = "rxzxp7b_Liuba";
$password = "Qazwsx123456";
$dbname = "rxzxp7b_Quiz";

$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (name, email, password, created_at) VALUES ('$name', '$email', '$password', CURRENT_TIMESTAMP)";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
