$(document).ready(function() {
    $("#registrationForm").submit(function(e) {
        e.preventDefault();

        let regNumberPattern = /^BCS-\d{2}-\d{4}-\d{4}$/;
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        let regNumber = $("#regNumber").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let confirmPassword = $("#confirmPassword").val();

        if (!regNumberPattern.test(regNumber)) {
            alert("Invalid Registration Number Format!");
            return false;
        }
        if (!emailPattern.test(email)) {
            alert("Invalid Email Format!");
            return false;
        }
        if (!passwordPattern.test(password)) {
            alert("Password must contain at least 8 characters, a number, and a special character!");
            return false;
        }
        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }

        this.submit();
    });
});
