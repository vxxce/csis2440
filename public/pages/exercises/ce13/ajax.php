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
    main {
      display: block;
      width: max-content;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/pages/headerNav.php"; ?>
  <main>
    <p>
      Enter a large number and I'll spend some time building an unwieldy string of randomly-colored divs in a
      willfully inefficient manner. When I'm done, I'll send it back--if I can! Notice that even if you
      type 1000000 your browser doesn't totally freeze up, despite how long the server takes to make
      that string of divs and how long the script listening for a response takes to render them. <em>(Although,
        you'll notice everything on your end gets quite a bit stickier when your browser splits its attention between
        finishing the painful work it already has and listening to you for more.)</em>
      That's only possible because everything's being done asynchronously! Even though Javascript is single-threaded,
      it's also non-blocking. Do some googling (or <a href="https://duckduckgo.com">Ducking</a>) for the "Event Loop"
      that your browser's Javascript runtime engine uses to listen for events, like you clicking a button. Incredible!
    </p>
    <p>
      Oh, and check out <a href="displayResults.js">the script</a> this page uses to see a modern way to do what XMLHttpRequest is doing here: the Fetch API! (feat Async/Await).
      Toggle this discreet toggler &rarr;<input type="radio" name="fetchToggle" id="fetchToggle">&larr; to try the page using Fetch! It will... look the same, admittedly, but I'll
      fix the button so you can be confident you're fetching.
    </p>
    <p>
      Try entering the number 1000000 and then immediately entering 1 and clicking the button again. Toggle the toggler and try it again.
      Did you notice anything different?
    </p>
    <hr>
    <label for="number">How many divs?</label>
    <input type="number" name="num" id="num" max="10000001" min="0">
    <button type="button" style="display: inline-block; margin: 1rem;">Get em</button>
    <div id="results"></div>
  </main>
  <script src="displayResults.js" type="application/javascript"></script>
  <script src="/assets/js/navbar.js" type="application/javascript"></script>
</body>

</html>