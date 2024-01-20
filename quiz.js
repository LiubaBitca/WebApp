document.addEventListener("DOMContentLoaded", function () {
    // Access the quizData variable from PHP
    var quizData = <?php echo $quiz_data; ?>;

    // Check if a question is available
    if (quizData.question !== "No questions available.") {
        // Populate the quiz container with question and answer options
        var quizContainer = document.querySelector(".quiz-container");

        // Create HTML elements to display the question and answer options
        var questionElement = document.createElement("div");
        questionElement.textContent = quizData.question;
        quizContainer.appendChild(questionElement);

        // Create radio buttons for answer options
        for (var option in quizData) {
            if (option.startsWith("Option")) {
                var optionElement = document.createElement("input");
                optionElement.type = "radio";
                optionElement.name = "answer";
                optionElement.value = quizData[option];
                var labelElement = document.createElement("label");
                labelElement.textContent = quizData[option];
                quizContainer.appendChild(optionElement);
                quizContainer.appendChild(labelElement);
            }
        }
    } else {
        // No questions available, display a message
        var quizContainer = document.querySelector(".quiz-container");
        quizContainer.textContent = "No questions available.";
    }
});
