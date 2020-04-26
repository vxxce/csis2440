// Validator functions
const isValidEmail = email => email.match(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/) ? true : false
const isValidLength = (input, min=0, max=Number.MAX_VALUE) => input.length >= min && input.length <= max
const isAlpha = input => input.match(/[^a-zA-Z]/) ? false : true
const meetsPasswordRequirements = (input, passwordRegEx) => input.match(passwordRegEx) ? true : false

// Form elements
const name = document.querySelector('#name')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const confirm = document.querySelector('#confirm')

// Full form validity check
// Dom updated to highlight invalid fields and display error.
const isValid = () => {
    const errors = { name: [], email: [], confirm: [] };
    if (!isAlpha(name.value)) errors.name.push("Name may only include characters A-Z")
    if (!isValidLength(name.value, 1, 100)) errors.name.push("Name must be between 0 and 100 characters")
    if (!isValidEmail(email.value)) errors.email.push("Email is invalid.")
    if (password.value != confirm.value) errors.confirm.push("Passwords do not match.")
    if (!meetsPasswordRequirements(confirm.value, /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/)) {
        errors.confirm.push("Password must have 8+ characters including one numeric, one uppercase, and one special character.")
    }
    if (Object.values(errors).flat().length) return true
    else [name, email, confirm].forEach(el => {
            (errors[el.id].length)
                ? el.style.boxShadow = "rgb(255, 0, 0) 0px 0px 3px 2px"
                : el.style.boxShadow = "none"
            document.querySelector(`#${el.id}-group + p`).textContent = errors[el.id].join('\n')
        })
    return false
}