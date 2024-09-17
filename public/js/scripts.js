let questionCount = 1;

// Handle sliding to the next step (showing the first question)
document
    .getElementById("next-to-question")
    .addEventListener("click", function () {
        const quizTitle = document.getElementById("quiz_title");
        const homeBackButton = document.querySelector(".back-btn"); // Select the top-left back button

        // Check if the title is empty
        if (!quizTitle.value.trim()) {
            alert("Please enter a quiz title.");
            return; // Stop further execution
        }

        const slidingContainer = document.getElementById("sliding-container");
        const quizQuestionContainer = document.getElementById(
            "quiz-question-container"
        );
        const backButton = document.getElementById("back-to-title");

        // Set the title in the display element
        document.getElementById("display-quiz-title").textContent =
            quizTitle.value;

        // Slide to the quiz question section
        slidingContainer.style.transform = `translateX(-100%)`;
        slidingContainer.style.transition = "transform 0.6s ease-in-out";

        // Hide the top-left back button
        homeBackButton.style.display = "none";

        // Show the quiz question container and the back button
        quizQuestionContainer.style.display = "block";
        setTimeout(() => {
            backButton.style.display = "block";
        }, 600);
    });

// Handle going back to the quiz title step
document.getElementById("back-to-title").addEventListener("click", function () {
    const slidingContainer = document.getElementById("sliding-container");
    const quizQuestionContainer = document.getElementById(
        "quiz-question-container"
    );
    const backButton = document.getElementById("back-to-title");
    const homeBackButton = document.querySelector(".back-btn"); // Select the top-left back button

    // Slide back to the quiz title section
    slidingContainer.style.transform = `translateX(0)`;

    // Delay hiding the quiz question container by 450ms and hide the back button immediately
    setTimeout(() => {
        quizQuestionContainer.style.display = "none";

        // Show the top-left back button again
        homeBackButton.style.display = "block";
    }, 450);
    setTimeout(() => {
        // Show the top-left back button again
        homeBackButton.style.display = "block";
    }, 600);    
    backButton.style.display = "none"; // Hide 'Back to Title' button immediately
});

// Handle adding another question
document
    .getElementById("add-another-question")
    .addEventListener("click", function () {
        questionCount++; // Increment question count

        const questionsSection = document.getElementById("questions-section");

        // Create new question HTML with numbering on the left and an <hr> line
        const newQuestionHTML = `
        <div class="form-section qq-vw mt-4">
            <div class="d-flex align-items-center mb-3 question-number">
                <label class="form-label fs-5 me-2">${questionCount}.</label>
                <input type="text" class="form-control" id="quiz_question_${questionCount}" placeholder="Enter your question" required>
            </div>
            <div class="options-container w-50 text-center">
                <input type="text" class="form-control mb-2" id="option_${questionCount}_1" placeholder="Option 1" required>
                <input type="text" class="form-control mb-2" id="option_${questionCount}_2" placeholder="Option 2" required>
                <input type="text" class="form-control mb-2" id="option_${questionCount}_3" placeholder="Option 3" required>
                <input type="text" class="form-control mb-2" id="option_${questionCount}_4" placeholder="Option 4" required>
            </div>
            <div class="w-50 text-center mb-3">
                <label for="correct_answer_${questionCount}" class="form-label fs-4 mb-3">Correct Answer</label>
                <select class="form-control" id="correct_answer_${questionCount}" required>
                    <option value="option_${questionCount}_1">Option 1</option>
                    <option value="option_${questionCount}_2">Option 2</option>
                    <option value="option_${questionCount}_3">Option 3</option>
                    <option value="option_${questionCount}_4">Option 4</option>
                </select>
            </div>
            <!-- Separator Line -->
            <div class="hr">
                <hr class="mt-4">
            </div>
        </div>
    `;

        // Insert the new question above the buttons section
        questionsSection.insertAdjacentHTML("beforeend", newQuestionHTML);
    });

// Handle form submission by collecting data
document.getElementById("submit-quiz").addEventListener("click", function (e) {
    e.preventDefault();

    const title = document.getElementById("quiz_title").value;
    const questions = [];

    if (!title.trim()) {
        alert("Quiz title is required.");
        return;
    }

    for (let i = 1; i <= questionCount; i++) {
        const question = document
            .getElementById(`quiz_question_${i}`)
            .value.trim();
        const options = [
            document.getElementById(`option_${i}_1`).value.trim(),
            document.getElementById(`option_${i}_2`).value.trim(),
            document.getElementById(`option_${i}_3`).value.trim(),
            document.getElementById(`option_${i}_4`).value.trim(),
        ];

        // Validate each question and its options
        if (!question) {
            alert(`Please enter a question for Question ${i}.`);
            return;
        }

        // Check for duplicate options within the same question
        const uniqueOptions = new Set(options);
        if (uniqueOptions.size !== options.length) {
            alert(
                `Options for Question ${i} must be unique. Please make sure there are no duplicate options.`
            );
            return;
        }

        if (options.some((option) => option === "")) {
            alert(`All options for Question ${i} are required.`);
            return;
        }

        // Get the selected correct answer ID
        const correctAnswerId = document.getElementById(
            `correct_answer_${i}`
        ).value;

        // Extract the index from the correctAnswerId (e.g., "option_1_1" -> 1)
        const correctAnswerIndex = parseInt(correctAnswerId.split("_")[2]) - 1;

        // Use the index to get the correct answer's text
        const correctAnswerText = options[correctAnswerIndex];

        questions.push({
            question: question,
            options: options,
            correct_answer: correctAnswerText, // Store the correct answer's text
        });
    }

    // Debug: Log the collected data before form submission
    console.log("Collected Questions:", questions);

    // Populate hidden inputs with collected data
    document.getElementById("quiz_title_input").value = title;
    document.getElementById("questions_input").value =
        JSON.stringify(questions);

    // Submit the form
    document.querySelector("form").submit();
});
