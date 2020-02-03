// Provides the animal associated with any given year in the Chinese Zodiac
const animalYears = {
  0: 'Monkey',
  1: 'Rooser',
  2: 'Dog',
  3: 'Boar',
  4: 'Rat',
  5: 'Ox',
  6: 'Tiger',
  7: 'Rabbit',
  8: 'Dragon',
  9: 'Snake',
  10: 'Horse',
  11: 'Lamb'
}

document.getElementById('checkYear').addEventListener('click', _e => {
  let year = document.getElementById('year').value
  let animal = animalYears[year % 12]
  document.getElementById('answer').innerHTML = `${year.toString()} is the year of the ${animal}`
})

// Reloads the page to replay game
document.getElementById('reload').addEventListener('click', _e => [
  location.reload()
])