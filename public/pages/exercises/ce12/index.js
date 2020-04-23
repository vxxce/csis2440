const isValidEmail = email => email.match(/[\w\.-]+@([\w-]+\.)+[\w-]{2,}/) ? true : false
const isValidLength = (input, min=0, max=Number.MAX_VALUE) => input.length >= min && input.length <= max
const isAlpha = input => input.match(/[^a-zA-Z]/) ? false : true
const isNumeric = input => input.match(/[^\d]/) ? false : true
const meetsPasswordRequirements = (input, passwordRegEx) => input.match(passwordRegEx) ? true : false

const fname = document.querySelector('#fname')
const lname = document.querySelector('#lname')
const email = document.querySelector('#email')
const password = document.querySelector('#password')
const confirm = document.querySelector('#confirm')

const isValid = () => {
  const errors = { fname: [], lname: [], email: [], confirm: [] };
  if (!isAlpha(fname.value)) errors.fname.push("Name may only include characters A-Z") 
  if (!isValidLength(fname.value, 1, 100)) errors.fname.push("Name must be between 0 and 100 characters")
  if (!isAlpha(lname.value)) errors.lname.push("Name may only include characters A-Z")
  if (!isValidLength(lname.value, 1, 100)) errors.lname.push("Name must be between 0 and 100 characters")
  if (!isValidEmail(email.value)) errors.email.push("Email is invalid.")
  if (password.value != confirm.value) errors.confirm.push("Passwords do not match.")
  if (!meetsPasswordRequirements(confirm.value, /thisexactpassword/)) errors.confirm.push("Password is not thisexactpassword.")
  if (!Object.values(errors).flat().length) return true
  else {
    [fname, lname, email, confirm].forEach(el => {
      (errors[el.id].length) 
        ? el.style.boxShadow = "rgb(255, 0, 0) 0px 0px 3px 2px"
        : el.style.boxShadow = "none"
      errorBox = document.querySelector(`#${el.id}-group + p`).textContent = errors[el.id].join('\n')
    })
  }
  return false
}