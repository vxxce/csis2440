const errorSpans = document.querySelectorAll('.error')
const coolant = document.querySelectorAll('[name="ec"]')
const burn = document.querySelector('#burn')
const code = document.querySelector('#code')
const statusMessage = document.querySelector('#status')

const launch = launchCode => {
  statusMessage.textContent = launchCode
  let countDown = setInterval(() => {
    if (statusMessage.textContent == 1) {
      clearInterval(countDown)
      statusMessage.textContent = "Launched!"
    }
    else if (statusMessage.textContent == launchCode) statusMessage.textContent = 10
    else statusMessage.textContent = Number.parseInt(statusMessage.textContent) - 1
  }, 1000)
}

const status = () => {
  const errors = { coolant: false, burn: false, code: false } 
  // Check coolant
  errors.coolant = coolant[0].checked == false && coolant[1].checked == true
    ? false
    : true
  // Check burn
  errors.burn = burn.value >= 20 && burn.value <= 30 
    ? false
    : true
  // Check code
  errors.code = code.value != ""
    ? false
    : true

  errors.coolant
    ? errorSpans[0].textContent = "Engine temperature too low. Turn off coolant."
    : errorSpans[0].textContent = ""
  errors.burn
    ? errorSpans[1].textContent = "Burn time should be between 20% and 30%"
    : errorSpans[1].textContent = ""
  errors.code
    ? errorSpans[2].textContent = "No Code entered"
    : errorSpans[2].textContent = ""

  if (!Object.values(errors).includes(true)) launch(code.value)
  }