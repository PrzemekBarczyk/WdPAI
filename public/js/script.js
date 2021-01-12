const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const phoneInput = form.querySelector('input[name="phone"]');
const locationInput = form.querySelector('input[name="location"]')
const passwordInput = form.querySelector('input[name="password"]');

// condition for email
function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

// condition for other inputs (typed any two characters)
function isInput(input) {
    return /\S+/.test(input);
}

// adds red border if input doesn't satisfy condition
function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

// adds listener to email input field
emailInput.addEventListener(
    'keyup',
    function () {
        setTimeout(function () { markValidation(emailInput, isEmail(emailInput.value)); },
        1000);
    }
);

phoneInput.addEventListener(
    'keyup',
    function () {
        setTimeout(function () { markValidation(phoneInput, isInput(phoneInput.value)); },
            1000);
    }
);

locationInput.addEventListener(
    'keyup',
    function () {
        setTimeout(function () { markValidation(locationInput, isInput(locationInput.value)); },
            1000);
    }
);

passwordInput.addEventListener(
    'keyup',
    function () {
        setTimeout(function () { markValidation(passwordInput, isInput(passwordInput.value)); },
            1000);
    }
);
