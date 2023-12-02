<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>
</head>
<body>

<button id="submitButton" class="btn btn-primary">submit</button>


<script>
    const submitButton = document.getElementById("submitButton");
    const feedbackContainer = document.createElement("div");

    // Add a click event listener to the button
    submitButton.addEventListener("click", function() {
        // Clear the content inside the feedback container
        feedbackContainer.innerHTML = "";

        // Create a new div to display the feedback status message
        const newFeedbackStatus = document.createElement("div");
        newFeedbackStatus.textContent = "Your feedback is submitted.";

        // Append the new feedback status div to the container
        feedbackContainer.appendChild(newFeedbackStatus);
    });

    // Append the feedback container to the body
    document.body.appendChild(feedbackContainer);
</script>

</body>
</html>


