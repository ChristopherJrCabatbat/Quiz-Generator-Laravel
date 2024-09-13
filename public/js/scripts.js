let questionCount = 1;
let optionCount = 2;

// Handle sliding to the next step (first question)
document.getElementById("next-to-question").addEventListener("click", function () {
    const slidingContainer = document.getElementById("sliding-container");
    slidingContainer.style.transform = `translateX(-100%)`;
    slidingContainer.style.transition = "transform 0.6s ease-in-out";
});

// Handle adding another option (up to 4 options for the last question)
document.getElementById("add-option").addEventListener("click", function () {
    optionCount++;
    if (optionCount === 3) {
        document.getElementById(`option_1_3`).style.display = "block"; // Show Option 3
    } else if (optionCount === 4) {
        document.getElementById(`option_1_4`).style.display = "block"; // Show Option 4
        this.style.display = "none"; // Hide "Add Another Option" button after showing 4 options
    }
});

// Handle adding another question
document.getElementById("add-another-question").addEventListener("click", function () {
    questionCount++; // Increment question count

    const quizSection = document.getElementById("quiz-question-section-1");

    // Create new question HTML and append to the quiz section
    const newQuestionHTML = `
        <div class="mb-3 w-50 text-center">
            <label for="quiz_question_${questionCount}" class="form-label fs-3 mb-3">Question ${questionCount}</label>
            <input type="text" class="form-control mx-auto" id="quiz_question_${questionCount}" placeholder="Enter your question">
        </div>
        <div class="options-container w-50 text-center">
            <label for="quiz_options_${questionCount}" class="form-label fs-3 mb-3">Options</label>
            <input type="text" class="form-control mb-2" id="option_${questionCount}_1" placeholder="Option 1">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_2" placeholder="Option 2">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_3" placeholder="Option 3" style="display: none;">
            <input type="text" class="form-control mb-2" id="option_${questionCount}_4" placeholder="Option 4" style="display: none;">
        </div>
    `;

    // Append the new question below the existing ones
    quizSection.insertAdjacentHTML("beforeend", newQuestionHTML);
});