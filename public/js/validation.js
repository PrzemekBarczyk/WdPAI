const form = document.querySelector("form");

const titleInput = form.querySelector('input[name="title"]');
const categoryInput = form.querySelector('input[name="category"]');
const descriptionInput = form.querySelector('textarea[name="description"]')
const fileInput = form.querySelector('input[name="file"]')

const emailInput = form.querySelector('input[name="email"]');
const phoneInput = form.querySelector('input[name="phone"]');
const locationInput = form.querySelector('input[name="location"]')
const passwordInput = form.querySelector('input[name="password"]')

function validateProject() {
    if (!isFilled(titleInput.value) || !isFilled(categoryInput.value) || !isFilled(descriptionInput.value) || !isFilled(fileInput.value)) {
        alert("Uzupełnij wszystkie pola formularza i dodaj zdjęcie");
        return false;
    }
    return true;
}

function validateRegister() {
    if (!isEmail(emailInput.value)) {
        alert("Niepoprawny format emaila");
        return false;
    }
    if (!isPhone(phoneInput.value)) {
        alert("Niepoprawny numer telefonu: podaj numer w formie 9 cyfrowego ciągu");
        return false;
    }
    if (!isFilled(locationInput.value)) {
        alert("Podaj lokalizację");
        return false;
    }
    if(!isFilled(passwordInput.value)) {
        alert("Podaj hasło");
        return false;
    }
    return true;
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function isPhone(phone) {
    phone = phone.replaceAll(" ", "");
    return !isNaN(phone) && phone.length === 9;
}

function isFilled(input) {
    return input.length > 0;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function addEventListener(input, condition) {
    input.addEventListener(
        'keyup',
        function() {
            setTimeout(function() { markValidation(input, condition(input.value)); })
        }
    );
}

if (titleInput != null)
    addEventListener(titleInput, isFilled);

if (categoryInput != null)
    addEventListener(categoryInput, isFilled);

if (descriptionInput != null)
    addEventListener(descriptionInput, isFilled);

if (fileInput != null)
    addEventListener(fileInput, isFilled);

if (emailInput != null)
    addEventListener(emailInput, isEmail);

if (phoneInput != null)
    addEventListener(phoneInput, isPhone);

if (locationInput != null)
    addEventListener(locationInput, isFilled);

if (passwordInput != null)
    addEventListener(passwordInput, isFilled);
