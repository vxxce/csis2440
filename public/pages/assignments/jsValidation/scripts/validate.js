// Validator functions
const isAlpha = input => input.match(/^[a-zA-Z]+$/)
const isFilled = input => input != ""
const isValidPhone = input => Boolean(input.replace(/[\(\)-\.\s]/g, "").match(/[0-9]{10}/))
const isValidEmail = input => Boolean(input.match(/[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/))
const passwordsMatch = (password, confirm) => password == confirm
const isValidLength = (input, min, max) => input.length >= min && input.length <= max

// Error Messages
const filledMessage = "Please fill out this field."
const alphaMessage = "Only characters A-Z are allowed."
const phoneMessage = "Please enter a valid 10-digit phone number"
const emailMessage = "Please enter a valid email format"
const matchMessage = "Passwords do not match"
const passwordLengthMessage = "Password must be 10+ characters"
const allEmptyMessage = "Please fill out at least one field"

const isValidAdd = () => {
    let valid = true
    // Get elements
    const fname = document.querySelector('#fname')
    const lname = document.querySelector('#lname')
    const email = document.querySelector('#email')
    const phone = document.querySelector('#phone')
    const password = document.querySelector('#password')
    const confirm = document.querySelector('#confirm')
    const fnameError = document.querySelector('#fnameError')
    const lnameError = document.querySelector('#lnameError')
    const emailError = document.querySelector('#emailError')
    const phoneError = document.querySelector('#phoneError')
    const passwordError = document.querySelector('#passwordError')
    const confirmError = document.querySelector('#confirmError')
    
    // Check all fields, use constraint validation api if html5 supported or
    // default to manually display error message and returning false on submit button
    
    if (!isFilled(fname.value)) {
        fname.setCustomValidity(filledMessage)
        fnameError.textContent = filledMessage
        valid = false
    } else if (!isAlpha(fname.value)) {
            fname.setCustomValidity(alphaMessage)
            fnameError.textContent = alphaMessage
            valid = false
    } else {
        fname.setCustomValidity('')
        fnameError.textContent = ''
    }
    if (!isFilled(lname.value)) {
        lname.setCustomValidity(filledMessage)
        lnameError.textContent = filledMessage
        valid = false
    } else if (!isAlpha(lname.value)) {
            lname.setCustomValidity(alphaMessage)
            lnameError.textContent = alphaMessage
            valid = false
    } else {
        lname.setCustomValidity('')
        lnameError.textContent = ''
    }
    if (!isValidPhone(phone.value)) {
        phone.setCustomValidity(phoneMessage)
        phoneError.textContent = phoneMessage
        valid = false
    } else {
        phone.setCustomValidity('')
        phoneError.textContent = ""
    }
    if (!isValidEmail(email.value)) {
        email.setCustomValidity(emailMessage)
        emailError.textContent = emailMessage
        valid = false
    } else {
        email.setCustomValidity('')
        emailError.textContent = ''
    }
    if (!isValidLength(password.value, 10, 50)) {
        password.setCustomValidity(passwordLengthMessage)
        passwordError.textContent = passwordLengthMessage
        valid = false
    } else if (!passwordsMatch(password.value, confirm.value)) {
        password.setCustomValidity('')
        passwordError.textContent = ''
        confirm.setCustomValidity(matchMessage)
        confirmError.textContent = matchMessage
        valid = false
    } else {
        confirm.setCustomValidity('')
        confirmError.textContent = ''
    }
    return valid
}

const isValidUpdate = () => {
    let valid = true
    // Get elements
    const fname = document.querySelector('#fname')
    const lname = document.querySelector('#lname')
    const email = document.querySelector('#email')
    const password = document.querySelector('#password')
    const fnameError = document.querySelector('#fnameError')
    const lnameError = document.querySelector('#lnameError')
    const emailError = document.querySelector('#emailError')
    const passwordError = document.querySelector('#passwordError')
    
    // Check all fields, use constraint validation api if html5 supported or
    // default to manually display error message and returning false on submit button
    
    if (!isFilled(fname.value)) {
        fname.setCustomValidity(filledMessage)
        fnameError.textContent = filledMessage
        valid = false
    } else if (!isAlpha(fname.value)) {
        fname.setCustomValidity(alphaMessage)
        fnameError.textContent = alphaMessage
        valid = false
    } else {
        fname.setCustomValidity('')
        fnameError.textContent = ''
    }
    if (!isFilled(lname.value)) {
        lname.setCustomValidity(filledMessage)
        lnameError.textContent = filledMessage
        valid = false
    } else if (!isAlpha(lname.value)) {
        lname.setCustomValidity(alphaMessage)
        lnameError.textContent = alphaMessage
        valid = false
    } else {
        lname.setCustomValidity('')
        lnameError.textContent = ''
    }
    if (!isValidEmail(email.value)) {
        email.setCustomValidity(emailMessage)
        emailError.textContent = emailMessage
        valid = false
    } else {
        email.setCustomValidity('')
        emailError.textContent = ''
    }
    if (!isValidLength(password.value, 10, 50)) {
        password.setCustomValidity(passwordLengthMessage)
        passwordError.textContent = passwordLengthMessage
        valid = false
    } else {
        password.setCustomValidity('')
        passwordError.textContent = ''
    }
    return valid
}

const isValidSearch = () => {
    let valid = true
    // Get elements
    const fname = document.querySelector('#fname')
    const lname = document.querySelector('#lname')
    const namesError = document.querySelector('#namesError')
    // Check all fields, use constraint validation api if html5 supported or
    // default to manually display error message and returning false on submit button
    
    if (!isFilled(fname.value) && !isFilled(lname.value)) {
        fname.setCustomValidity(allEmptyMessage)
        lname.setCustomValidity(allEmptyMessage)
        namesError.textContent = allEmptyMessage
        valid = false
    } else {
        fname.setCustomValidity('')
        lname.setCustomValidity('')
        namesError.textContent = ''
    }
    return valid
}

