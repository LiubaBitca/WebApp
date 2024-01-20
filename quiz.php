<?php
// quiz.php
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
    $row = $result->fetch_assoc();
    // Convert the result to JSON format and send it to the quiz page
    $quiz_data = json_encode($row);
} else {
    $quiz_data = json_encode(array("question" => "No questions available."));
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <link rel="stylesheet" href="quiz.css">
    <script>
        // Pass the fetched quiz data to JavaScript
        var quizData = <?php echo $quiz_data; ?>;
    </script>
</head>
<body>
    <div class="quiz-container">
        <!-- Quiz content goes here using JavaScript to populate questions and answers -->
    </div>
    <script src="quiz.js"></script> <!-- Create a separate JavaScript file for quiz logic -->
</body>
</html>
