const nameInput = document.getElementById('input-name');
const emailInput = document.getElementById('input-email');
const messageInput = document.getElementById('input-message');
const submitButton = document.querySelector('button[type="submit"]');

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

//Validate on submit button press - prevent submit if not valid
submitButton.addEventListener('click', (e) => {
    if (!validateName()) {
        nameInput.parentElement.classList.add('error');
        nameInput.parentElement.querySelector('small').innerText = "Please enter your name"
    }

    if (!validateEmail()) {
        emailInput.parentElement.classList.add('error');
        emailInput.parentElement.querySelector('small').innerText = "Please enter a valid email address"
    }

    if (!validateMessage()) {
        messageInput.parentElement.classList.add('error');
        messageInput.parentElement.querySelector('small').innerText = "Please enter your message"
    }

    if (!validateName() || !validateEmail() || !validateMessage()) {
        e.preventDefault()
    }
})