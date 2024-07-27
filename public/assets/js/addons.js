document
    .getElementById("togglePassword")
    .addEventListener("click", function () {
        const passwordField = document.getElementById("password");
        const passwordFieldType = passwordField.getAttribute("type");
        if (passwordFieldType === "password") {
            passwordField.setAttribute("type", "text");
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.setAttribute("type", "password");
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });


    document
    .getElementById("toggleConfirmPassword")
    .addEventListener("click", function () {
        const passwordField = document.getElementById("confirmpassword");
        const passwordFieldType = passwordField.getAttribute("type");
        if (passwordFieldType === "password") {
            passwordField.setAttribute("type", "text");
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.setAttribute("type", "password");
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });
