<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<body>

<button id="payButton" class="btn btn-primary">payment</button>


<script>
    const payButton = document.getElementById("payButton");
    const paymentContainer = document.createElement("div");

    // Add a click event listener to the button
    payButton.addEventListener("click", function() {
        // Clear the content inside the payment container
        paymentContainer.innerHTML = "";

        // Create a new div to display the payment status message
        const newPaymentStatus = document.createElement("div");
        newPaymentStatus.textContent = "Your payment is done.";

        // Append the new payment status div to the container
        paymentContainer.appendChild(newPaymentStatus);
    });

    // Append the payment container to the body
    document.body.appendChild(paymentContainer);
</script>

</body>
</html>
