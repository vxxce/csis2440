const getShip = shipId => {
  shipId
    ? new Ship(ships[shipId].name, ships[shipId].speed, ships[shipId].hardPoints, ships[shipId].cargo, ships[shipId].cost, ships[shipId].image).displayShip(document.getElementById('display'))
    : document.getElementById('display').innerHTML = ""
}