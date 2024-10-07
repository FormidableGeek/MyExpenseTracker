let main = document.querySelector("main");
function verifyEmail() {
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");

  if (emailInput.value === "" || passwordInput.value === "") {
    alert("Please fill in all fields");
    return;
  }

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailRegex.test(emailInput.value)) {
    alert("Invalid email address");
    return;
  }
  
  alert("Email and password are valid!");
}

document.getElementById("submit-btn").addEventListener("click", verifyEmail);

