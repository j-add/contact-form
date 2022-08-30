const nameInput = document.getElementById('input-name');
const emailInput = document.getElementById('input-email');
const messageInput = document.getElementById('input-message');
const submitButton = document.querySelector('button[type="submit"]');

let inputs = [nameInput, emailInput, messageInput];

let nameErr = "Please enter your name";
let emailErr = "Please enter a valid email address";
let messageErr = "Please enter your message";

const displayErrMsg = (input, msg) => {
    input.parentElement.classList.add('error');
    input.parentElement.querySelector('small').innerText = msg.toString()
}

const clearErrMsg = (input) => {
    let formGroup = input.parentElement;
    formGroup.classList.remove('error');
    formGroup.querySelector('small').innerText = "";
}

//Validate name - Check not empty
const validateName = () => {
    return nameInput.value.trim();
}

//Validate email - Check right format (regex) && not empty
const validateEmail = () => {
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/;
    return emailInput.value.trim() && regex.test(emailInput.value);
}

//Validate message - Check not empty
const validateMessage = () => {
    return messageInput.value.trim() !== "";
}

//Validate on blur
nameInput.addEventListener('blur', () => {
    validateName() ? clearErrMsg(nameInput) : displayErrMsg(nameInput, nameErr);
})

emailInput.addEventListener('blur', () => {
    validateEmail() ? clearErrMsg(emailInput) : displayErrMsg(emailInput, emailErr);
})

messageInput.addEventListener('blur', () => {
    validateMessage() ? clearErrMsg(messageInput) : displayErrMsg(messageInput, messageErr);
})

//Validate on submit button press - prevent submit if not valid
submitButton.addEventListener('click', (e) => {
    inputs.forEach((value) => clearErrMsg(value));

    if (!validateName()) {
        displayErrMsg(nameInput, nameErr);
    }

    if (!validateEmail()) {
        displayErrMsg(emailInput,emailErr);
    }

    if (!validateMessage()) {
        displayErrMsg(messageInput, messageErr);
    }

    if (!validateName() || !validateEmail() || !validateMessage()) {
        e.preventDefault()
    }
})