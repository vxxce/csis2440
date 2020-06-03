<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AJAX</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
  <style>
 p {
   max-width: 650px;
 }

 .wrap {
   margin: 2rem;
 }
  </style>
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
    <div class='wrap'>
    <p>
      How many divs do you want? I'll make you that many divs. I'll even color them, just for you. It will be hideous, I should warn you.
      I'm just going to color them randomly. But first, I'm just going to sit on your request for, oh, 10 seconds?
      I'll be doing basically nothing, just... making you wait. When you finally get them, you will have witnessed
      something that is actually sort of amazing: Asynchrony! You may not see what's amazing about it. If you want
      to, though, I recommend watching <a href="https://www.youtube.com/watch?reload=9&v=8aGhZQkoFbQ">this!</a> And <a href="https://www.youtube.com/watch?v=8LCx9Dir8BU">this</a> too.
    </p>
    <p>
      Oh, and check out <a href="displayResults.js">the script</a> this page uses to see two different ways that you can make your request. Both will
      demonstrate asynchrony. You can make your request either way and the result will be the same. But you can toggle this toggler &rarr;<input type="radio" name="fetchToggle" id="fetchToggle">&larr; anyway to try one
      or the other and I'll fix the button to let you know which one you're doing :) 
    </p>
    <hr>
    <label for="number">How many divs?</label>
    <input type="number" name="num" id="num" max="10000001" min="0">
    <button class="fetcher" type="button" style="display: inline-block; margin: 1rem;">Get em</button>
    <div id="results"></div>
    <div>
  </main>
  <script src="displayResults.js" type="application/javascript"></script>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>
