let questionCount = 1;

// Handle sliding to the next step (showing the first question)
document.getElementById("next-to-question").addEventListener("click", function () {
    const slidingContainer = document.getElementById("sliding-container");
    const quizQuestionContainer = document.getElementById("quiz-question-container");
    const backButton = document.getElementById("back-to-title");

    // Slide to the quiz question section
    slidingContainer.style.transform = `translateX(-100%)`;
    slidingContainer.style.transition = "transform 0.6s ease-in-out";

    // Show the quiz question container and the back button
    quizQuestionContainer.style.display = "block";
    setTimeout(() => {
        backButton.style.display = "block";
    }, 600);
});

// Handle going back to the quiz title step
document.getElementById("back-to-title").addEventListener("click", function () {
    const slidingContainer = document.getElementById("sliding-container");
    const quizQuestionContainer = document.getElementById("quiz-question-container");
    const backButton = document.getElementById("back-to-title");

    // Slide back to the quiz title section
    slidingContainer.style.transform = `translateX(0)`;

    // Delay hiding the quiz question container by 450ms and hide the back button immediately
    setTimeout(() => {
        quizQuestionContainer.style.display = "none";
    }, 450);
    backButton.style.display = "none"; // Hide back button immediately
});

// Handle adding another question
document.getElementById("add-another-question").addEventListener("click", function () {
    questionCount++; // Increment question count

    const quizSection = document.getElementById("quiz-question-section-1");

    // Create new question HTML and append to the quiz section
    const newQuestionHTML = `
        <div class="mb-3 mt-4 w-50 text-center">
            <label for="quiz_question_${questionCount}" class="form-label fs-3 mb-3">Question ${questionCount}</label>
            <input type="text" class="form-control mx-auto" id="quiz_question_${questionCount}" placeholder="Enter your question">
        </div>
        <div class="options-container w-50 text-center">
            <label for="quiz_options_${questionCount}" class="form-label fs-3 mb-3">Options</label>
            <input type="text" class="form-control mb-2" id="option_${questionCount}_1" placeholder="Option 1">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_2" placeholder="Option 2">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_3" placeholder="Option 3">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_4" placeholder="Option 4">
        </div>
        <div class="w-50 text-center mb-3">
            <label for="correct_answer_${questionCount}" class="form-label fs-3 mb-3">Correct Answer</label>
            <select class="form-control" id="correct_answer_${questionCount}">
                <option value="option_${questionCount}_1">Option 1</option>
                <option value="option_${questionCount}_2">Option 2</option>
                <option value="option_${questionCount}_3">Option 3</option>
                <option value="option_${questionCount}_4">Option 4</option>
            </select>
        </div>
    `;

    // Append the new question below the existing ones
    quizSection.insertAdjacentHTML("beforeend", newQuestionHTML);
});

// Handle form submission by collecting data
document.getElementById("submit-quiz").addEventListener("click", function (e) {
    e.preventDefault();

    const title = document.getElementById("quiz_title").value;
    const questions = [];

    for (let i = 1; i <= questionCount; i++) {
        const question = document.getElementById(`quiz_question_${i}`).value;
        const options = [
            document.getElementById(`option_${i}_1`).value,
            document.getElementById(`option_${i}_2`).value,
            document.getElementById(`option_${i}_3`).value,
            document.getElementById(`option_${i}_4`).value
        ];

        // Get the selected correct answer ID
        const correctAnswerId = document.getElementById(`correct_answer_${i}`).value;

        // Extract the index from the correctAnswerId (e.g., "option_1_1" -> 1)
        const correctAnswerIndex = parseInt(correctAnswerId.split('_')[2]) - 1;

        // Use the index to get the correct answer's text
        const correctAnswerText = options[correctAnswerIndex];

        questions.push({
            question: question,
            options: options,
            correct_answer: correctAnswerText // Store the correct answer's text
        });
    }

    // Populate hidden inputs with collected data
    document.getElementById("quiz_title_input").value = title;
    document.getElementById("questions_input").value = JSON.stringify(questions);

    // Submit the form
    document.querySelector('form').submit();
});
