document.getElementById("registration-form").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);

    fetch("submit.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        document.getElementById("registration-form").reset();
    })
    .catch(error => console.error("Error:", error));
});
