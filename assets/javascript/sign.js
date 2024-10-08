function verifyInputs() {
  let emailInput = document.getElementById("email");
  let usernameInput = document.getElementById("username");
  let passwordInput = document.getElementById("password");
  let confirmPasswordInput = document.getElementById("confirm-password");

  if (
    emailInput.value === "" ||
    usernameInput.value === "" ||
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

  
}




var form=document.getElementById('reg-form');

form.addEventListener('submit',function(event){
  event.preventDefault();
  verifyInputs();
    //stops the form from being submitted so that we can perform certain actions
    //let name=document.getElementById('name').value;
    //let link='http://127.0.0.1:8000/';
    //let data=new FormData(form);
    console.log(usernameInput)
    
  var emailInput = document.getElementById("email");
  var usernameInput = document.getElementById("username");
  var passwordInput = document.getElementById("password");
    let data={
      username:usernameInput.value,
      password:passwordInput.value,
      email:emailInput.value
    }


    fetch('/user/store',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
        },
        body:JSON.stringify(data)
    }).then(function(response){
        return response.json();
    }).then(function(data){
      if (data.status === 'success') {
          window.location.href = data.redirect;
      }

    }).catch(function(error){
      console.log(error)
        console.log('Try again later an error occured.');
    });


});