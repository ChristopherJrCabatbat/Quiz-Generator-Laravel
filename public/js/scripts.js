let currentStep = 0; // Keeps track of which step we're on (0 = quiz title)
let optionCount = 2; // Tracks the number of visible options

// Handle sliding to the next step
document.getElementById('next-to-question').addEventListener('click', function () {
    // const title = document.getElementById('quiz_title').value.trim();
    // if (!title) {
    //     alert('Please enter a quiz title.');
    //     return;
    // }

    const slidingContainer = document.getElementById('sliding-container');
    currentStep++;
    slidingContainer.style.transform = `translateX(-${currentStep * 100}%)`;
});

// Handle going back to the previous step
document.getElementById('back-to-title').addEventListener('click', function () {
    if (currentStep > 0) {
        currentStep--;
        const slidingContainer = document.getElementById('sliding-container');
        slidingContainer.style.transform = `translateX(-${currentStep * 100}%)`;
    }
});

// Handle adding another option (up to 4 options)
document.getElementById('add-option').addEventListener('click', function () {
    optionCount++;
    if (optionCount === 3) {
        document.getElementById('option_1_3').style.display = 'block'; // Show Option 3
    } else if (optionCount === 4) {
        document.getElementById('option_1_4').style.display = 'block'; // Show Option 4
        this.style.display = 'none'; // Hide the "Add Another Option" button after showing 4 options
    }
});

// Handle adding another question (Optional functionality placeholder)
document.getElementById('add-another-question').addEventListener('click', function () {
    alert('This functionality can be added later.');
});