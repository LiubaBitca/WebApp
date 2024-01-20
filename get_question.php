<?php
// get_question.php
$servername = "localhost";
$username = "rxzxp7b_Liuba";
$password = "Qazwsx123456";
$dbname = "rxzxp7b_Quiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch a random question with its four answer options
$sql = "SELECT QuestionText, OptionA, OptionB, OptionC, OptionD FROM Questions ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Convert the result to a JSON format
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array("question" => "No questions available."));
}

$conn->close();
?>

