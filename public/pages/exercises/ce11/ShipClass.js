class Ship {

  constructor(n, s, h, ca, co, i) {
    this.name = n
    this.speed = s
    this.hardPoints = h
    this.cargo = ca
    this.cost = co
    this.image = i
    this.armor = 100
  }

  displayShip(divtag) {
    divtag.innerHTML = ""
    var displayString = "<table><tr><td>" + this.name + "</td></tr>"
    displayString += "<tr><td>Speed</td><td>" + this.speed + "</td></tr>"
    displayString += "<tr><td>Weapon Hard Points</td><td>" + this.hardPoints + "</td></tr>"
    displayString += "<tr><td>Cargo Space in Tonnes</td><td>" + this.cargo + "</td></tr>"
    displayString += "<tr><td>Cost in Intergalactic Credits</td><td>" + this.cost + "</td></tr>"
    displayString += "<tr><td>Armor</td><td>" + this.armor + "</td></tr>"
    displayString += "<tr><td colspan='2'><img src='imgs/" + this.image + "' alt='ship image'></td></tr></table>"
    divtag.innerHTML = displayString
    return true
  }
}