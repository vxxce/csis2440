<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Character Creator</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/characterCreator.css">
</head>

<body>
  <?php require("../../headerNav.php"); ?>
  <main>
    <h2>Character Creator</h2>
    <div class="hr"></div>
    <div id="character-container">
      <header id="character-header">
        <h3 id="character-title">(name) of (kingdom)</h3>
      </header>
      <figure id="character-figure">
        <figcaption>
          {RACE} {CLASS}
          <br>
          AGE age
        </figcaption>
        <img id="character-img" src="/assets/imgs/HuThMa.jpg" alt="Your character" />
      </figure>
      <div id="character-stats">
        <ul id="stats-list">
          <li class="stats-item"><b>Strength:</b> 10</li>
          <li class="stats-item"><b>Constitution:</b> 10</li>
          <li class="stats-item"><b>Dexterity:</b> 10</li>
          <li class="stats-item"><b>Wisdom:</b> 10</li>
          <li class="stats-item"><b>Intelligence:</b> 10</li>
          <li class="stats-item"><b>Charisma:</b> 10</li>
        </ul>
      </div>
      <div id="character-description">
        <section id="race-description">
          <h4>Race: (race)</h4>
          <p><b>Description:</b> Humans come in a broad variety of shapes and sizes. An
            average Human male in good health stands around six feet tall and weighs about
            175 pounds. Most Humans live around 75 years.</p>
          <p><b>Restrictions</b>: Humans
            may be any single class. They have no minimum or maximum ability score requirements.
          </p>
          <p><b> Special Abilities</b>: Humans learn unusually quickly, gaining a bonus
            of 10% to all experience "points earned. Saving Throws: Humans are the “standard,”
            and thus have no saving throw bonuses.</p>
        </section>
        <section id="class-description">
          <h4>Class: (Class)</h4>
          <p>Fighters include soldiers, guardsmen, barbarian warriors,
            and anyone else for whom fighting is a way of life. They
            train in combat, and they generally approach problems
            head on, weapon drawn.</p>
          <p>Not surprisingly, Fighters are best at fighting of all the
            classes. They are also the hardiest, able to take more
            punishment than any other class. Although they are not
            skilled in the ways of magic, Fighters can nonetheless use
            many magic items, including but not limited to magical
            weapons and armor.</p>
          <p>The Prime Requisite for Fighters is Strength; a character
            must have a Strength score of 9 or higher to become a
            Fighter. Members of this class may wear any armor and
            use any weapon.</p>
        </section>
      </div>
    </div>
  </main>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>