window.onload = init;

function init() {
   document.getElementById("acc").onsubmit = validateForm;
   document.getElementById("fname").focus();
   var el = document.getElementById("subm");
   el.addEventListener("mouseover", changeColor);
   el.addEventListener("mouseout", revertColor);
   document.getElementById("fname").addEventListener("keydown", downColor);
   document.getElementById("fname").addEventListener("keyup", upColor);
   document.getElementById("lname").addEventListener("keydown", downColor);
   document.getElementById("lname").addEventListener("keyup", upColor);
   document.getElementById("uname").addEventListener("keydown", downColor);
   document.getElementById("uname").addEventListener("keyup", upColor);
   document.getElementById("email").addEventListener("keydown", downColor);
   document.getElementById("email").addEventListener("keyup", upColor);
   document.getElementById("phone").addEventListener("keydown", downColor);
   document.getElementById("phone").addEventListener("keyup", upColor);
   document.getElementById("pass").addEventListener("keydown", downColor);
   document.getElementById("pass").addEventListener("keyup", upColor);
   document.getElementById("cpass").addEventListener("keydown", downColor);
   document.getElementById("cpass").addEventListener("keyup", upColor);
}
function downColor(inputId) {
   document.getElementById(inputId.currentTarget.id).style.color = "red";
}
function upColor(inputId) {
   document.getElementById(inputId.currentTarget.id).style.color = "green";
}
function changeColor() {
    document.getElementById("subm").style.color = "red";
}
function revertColor() {
    document.getElementById("subm").style.color = "white";
}
function validateForm() {
   return (isNotEmpty("fname", "Please enter your first name!")
        && isNotEmpty("lname", "Please enter your last name!")
        && isNotEmpty("uname", "Please enter your username!")
        && isNumeric("phone", "Please enter a valid phone number!")
        && isValidEmail("email", "Enter a valid email!")
        && isLengthMinMax("pass", "Enter a valid password! Between 6 and 12 characters", 6, 12)
        && verifyPassword("pass", "cpass", "Difference between password and confirmation!"));
}

function isNotEmpty(inputId, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value.trim();
   var isValid = (inputValue.length !== 0);
   showMessage(isValid, inputElement, errorMsg, errorElement);
   return isValid;
}

function showMessage(isValid, inputElement, errorMsg, errorElement) {
   if (!isValid) {
      if (errorElement !== null) {
         errorElement.innerHTML = errorMsg;
      } else {
         alert(errorMsg);
      }
      if (inputElement !== null) {
         inputElement.className = "error";
         inputElement.focus();
      }
   } else {
      if (errorElement !== null) {
         errorElement.innerHTML = "";
      }
      if (inputElement !== null) {
         inputElement.className = "";
      }
   }
}
function isNumeric(inputId, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value.trim();
   var isValid = (inputValue.search(/^[0-9]+$/) !== -1);
   showMessage(isValid, inputElement, errorMsg, errorElement);
   return isValid;
}
function isLengthMinMax(inputId, errorMsg, minLength, maxLength) {
   var inputElement = document.getElementById(inputId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value.trim();
   var isValid = ((inputValue.length >= minLength) && (inputValue.length <= maxLength));
   showMessage(isValid, inputElement, errorMsg, errorElement);
   return isValid;
}
function isValidEmail(inputId, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value;
   var atPos = inputValue.indexOf("@");
   var dotPos = inputValue.lastIndexOf(".");
   var isValid = (atPos > 0) && (dotPos > atPos + 1) && (inputValue.length > dotPos + 2);
   showMessage(isValid, inputElement, errorMsg, errorElement);
   return isValid;
}
function verifyPassword(pwId, verifiedPwId, errorMsg) {
   var pwElement = document.getElementById(pwId);
   var verifiedPwElement = document.getElementById(verifiedPwId);
   var errorElement = document.getElementById(verifiedPwId + "Error");
   var isTheSame = (pwElement.value === verifiedPwElement.value);
   showMessage(isTheSame, verifiedPwElement, errorMsg, errorElement);
   return isTheSame;
}
