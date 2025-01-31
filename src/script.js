"use strict"

const registerButton = document.getElementById("button-registrieren");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");


registerButton.addEventListener("click", function(){
    alert("Hi");
})




function validateMyForm(event)
{
  if(password != confirmPassword)
  { 
    event.preventDefault();
    
  }
}