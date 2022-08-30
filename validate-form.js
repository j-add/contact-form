const nameInput = document.getElementById('#input-name');
const emailInput = document.getElementById('#input-email');
const messageInput = document.getElementById('#input-message');

//Validate name - Check not empty
const validateName = () => {
    return nameInput.value.trim() !== "";
}

//Validate email - Check right format (regex) && not empty
const validateEmail = () => {
    let regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}])|(([a-zA-Z\-\d]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(emailInput.value.trim());
}

//Validate message - Check not empty
const validateMessage = () => {
    return messageInput.value.trim() !== "";
}