<?php
include 'config.php';

// Create Question
function createQuestion($questionText, $optionA, $optionB, $optionC, $optionD, $correctOption) {
    global $conn;
    $sql = "INSERT INTO Questions (QuestionText, OptionA, OptionB, OptionC, OptionD, CorrectOption) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption);
    return $stmt->execute();
}

// Read Questions
function getQuestions() {
    global $conn;
    $result = $conn->query("SELECT * FROM Questions");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Update Question
function updateQuestion($questionID, $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption) {
    global $conn;
    $sql = "UPDATE Questions SET QuestionText=?, OptionA=?, OptionB=?, OptionC=?, OptionD=?, CorrectOption=? WHERE QuestionID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi', $questionText, $optionA, $optionB, $optionC, $optionD, $correctOption, $questionID);
    return $stmt->execute();
}

// Delete Question
function deleteQuestion($questionID) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM Questions WHERE QuestionID=?");
    $stmt->bind_param('i', $questionID);
    return $stmt->execute();
}
