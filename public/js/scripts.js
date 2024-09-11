let currentStep = 1; // Keeps track of which question we're on
let totalSteps = 2; // Initially, we have quiz title and one question

// Handle sliding to the next step (First to Second Screen)
document
    .getElementById("next-to-question")
    .addEventListener("click", function () {
        const title = document.getElementById("quiz_title").value.trim();
        if (!title) {
            alert("Please enter a quiz title.");
            return;
        }

        const slidingContainer = document.getElementById("sliding-container");
        slidingContainer.style.width = `${totalSteps * 100}%`;
        slidingContainer.classList.add("slide-left");
        document
            .getElementById("quiz-question-section-1")
            .classList.remove("hidden");
    });

// Handle adding another question
document
    .getElementById("add-another-question")
    .addEventListener("click", function () {
        currentStep++;
        totalSteps++;

        const slidingContainer = document.getElementById("sliding-container");

        // Create a new question section
        const newSection = document.createElement("div");
        newSection.classList.add("form-section");
        newSection.id = `quiz-question-section-${currentStep}`;
        newSection.innerHTML = `
        <div class="mb-3 text-center">
            <label for="quiz_question_${currentStep}" class="form-label fs-2 mb-3">Question ${currentStep}</label>
            <input type="text" class="form-control" id="quiz_question_${currentStep}" placeholder="Enter your question">
        </div>

        <div class="options-container" id="options-container-${currentStep}">
            <input type="text" class="form-control mb-2" id="option_${currentStep}_1" placeholder="Option 1">
            <input type="text" class="form-control mb-2" id="option_${currentStep}_2" placeholder="Option 2">
            <input type="text" class="form-control mb-2" id="option_${currentStep}_3" placeholder="Option 3 (optional)" style="display: none;">
            <input type="text" class="form-control mb-2" id="option_${currentStep}_4" placeholder="Option 4 (optional)" style="display: none;">
            <button class="btn btn-outline-secondary mb-3" id="add-option-${currentStep}" type="button">Add Another Option</button>
        </div>

        <div class="mb-3">
            <label for="correct_answer_${currentStep}" class="form-label">Correct Answer</label>
            <select class="form-control" id="correct_answer_${currentStep}">
                <option value="option_${currentStep}_1">Option 1</option>
                <option value="option_${currentStep}_2">Option 2</option>
                <option value="option_${currentStep}_3" style="display: none;">Option 3</option>
                <option value="option_${currentStep}_4" style="display: none;">Option 4</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <button class="btn btn-secondary" type="button" id="back-to-title-${currentStep}">Back</button>
            <button class="btn btn-primary" type="button" id="add-another-question">Add Another Question</button>
            <button class="btn btn-success" type="button" id="submit-quiz">Submit Quiz</button>
        </div>
    `;

        // Append the new section
        slidingContainer.appendChild(newSection);

        // Expand sliding container width to accommodate new section
        slidingContainer.style.width = `${totalSteps * 100}%`;

        // Slide to the newly created section
        slidingContainer.classList.add("slide-left");
    });
