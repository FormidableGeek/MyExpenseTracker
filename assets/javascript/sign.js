function verifyInputs() {
  const emailInput = document.getElementById("text");
  const passwordInput = document.getElementById("password");
  const confirmPasswordInput = document.getElementById("confirm-password");

  if (
    emailInput.value === "" ||
    passwordInput.value === "" ||
    confirmPasswordInput.value === ""
  ) {
    alert("Please fill in all fields");
    return;
  }

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailRegex.test(emailInput.value)) {
    alert("Invalid email address");
    return;
  }

  if (passwordInput.value !== confirmPasswordInput.value) {
    alert("Passwords do not match");
    return;
  }

  alert("All inputs are valid!");
  
}

document.getElementById("submit-btn").addEventListener("click", verifyInputs);
