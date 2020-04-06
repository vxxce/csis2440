let shipSelect = document.getElementById('shipsoftheline')
for (let i in ships) {
    shipSelect.innerHTML += `<option value='${i}'>${ships[i].name}</option>`
}