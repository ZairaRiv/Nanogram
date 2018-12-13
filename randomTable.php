<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylin.css" />
    <!-- needed for stencil font in nav bar -->
    <link
      href="https://fonts.googleapis.com/css?family=Allerta Stencil"
      rel="stylesheet"
    />
    <title>Level Creator</title>
    <style>
      .outer {
        display: table;
        width: 100%;
        height: 400px;
        border: 1px solid red; /* to help see the edge */
      }
      .inner {
        display: table-cell;
        align-content: center;
        text-align: center;
        vertical-align: middle;
      }
    </style>
  </head>

  <body>
  <script src="func.js" async defer></script>
    <!-- navbar file to include-->
    <?php include 'navbar.php';?>

<!-- change the size button -->
    <div><button id="size" onclick="changeSize()">Change Size</button></div>
<!-- start the game -->
    <div><button id="makeGame" onclick="createRandomLevel()">Create It!</button></div>
<!-- for the table creation -->
    <div class="outer">
      <div class="inner">
      </div>
    </div>


  </body>
</html>
