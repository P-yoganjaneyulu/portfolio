document.getElementById("registration-form").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitButton = this.querySelector("button[type='submit']");
    submitButton.disabled = true; // Disable the button to prevent multiple submissions
    submitButton.textContent = "Submitting..."; // Show loading text

    fetch("https://formspree.io/f/meoabnbd", {
        method: "POST",
        body: formData,
        headers: {
            "Accept": "application/json"
        }
    })
    .then(response => {
        if (response.ok) {
            alert("✅ Thanks! Your response has been submitted.");
            document.getElementById("registration-form").reset();
        } else {
            alert("❌ Something went wrong while submitting.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("❌ An error occurred. Please try again later.");
    })
    .finally(() => {
        submitButton.disabled = false; // Re-enable the button
        submitButton.textContent = "Submit"; // Reset button text
    });
});
