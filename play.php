<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylin.css" />
    <!-- needed for stencil font in nav bar -->
    <link
      href="https://fonts.googleapis.com/css?family=Allerta Stencil"
      rel="stylesheet"
    />
    <title>PLAY</title>
    <style>
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        padding: 12px 16px;
        z-index: 1;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }
    </style>
  </head>

  <body>
    <!-- navbar file to include-->
    <?php include 'navbar.php';?>
    <!-- formatting images to fit side by side-->
    <div class="row">
      <div class="column">
        <a href="arcade.php">
          <img src="arcade.jpg" alt="arcade img" class="resize" />
        </a>
    </div>
    <div class = "column">
        <a href="challenge.php">
          <img src="challenge.jpg" alt="challenge img" class="resize" />
        </a>
    </div>
      </div>
    </div>
  </body>
</html>
