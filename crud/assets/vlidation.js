function validateForm() {
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const age = document.getElementById("age").value.trim();

    if (!name || !email || !age) {
        alert("All fields are required!");
        return false;
    }

    if (!/^\S+@\S+\.\S+$/.test(email)) {
        alert("Invalid email format!");
        return false;
    }

    if (isNaN(age) || age <= 0) {
        alert("Age must be a positive number!");
        return false;
    }

    return true;
}