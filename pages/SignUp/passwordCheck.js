document.getElementById("register-form")
    .addEventListener('submit', function(event) {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm-password").value;

        if (password !== confirmPassword) {
            event.preventDefault();
        }
});

document.getElementById("confirm-password")
    .addEventListener('input', function() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm-password").value;

        if (password !== confirmPassword){
            this.setCustomValidity("Passwords do not match!");
        } else {
            this.setCustomValidity("");
        }
});