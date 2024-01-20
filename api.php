<?php
include 'questions.php';

header('Content-Type: application/json');

// Handle API Requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(getQuestions());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (createQuestion($data['QuestionText'], $data['OptionA'], $data['OptionB'], $data['OptionC'], $data['OptionD'], $data['CorrectOption'])) {
        echo json_encode(['message' => 'Question created successfully']);
    } else {
        echo json_encode(['error' => 'Failed to create question']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    $questionID = $data['QuestionID'];

    if (updateQuestion($questionID, $data['QuestionText'], $data['OptionA'], $data['OptionB'], $data['OptionC'], $data['OptionD'], $data['CorrectOption'])) {
        echo json_encode(['message' => 'Question updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update question']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $questionID = $data['QuestionID'];

    if (deleteQuestion($questionID)) {
        echo json_encode(['message' => 'Question deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete question']);
    }
}
