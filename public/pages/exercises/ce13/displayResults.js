const displayResults = async () => {
  const display = document.querySelector('#results')
  const num = Number(document.querySelector('#num').value)
  const url = `results.php?num=${num}`
  await fetch(url).then(r => r.text()).then(r => display.innerHTML = r)
  return false
}