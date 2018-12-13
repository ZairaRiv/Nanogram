<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="stylin.css" />
    <!-- needed for stencil font in nav bar -->
    <link
      href="https://fonts.googleapis.com/css?family=Allerta Stencil"
      rel="stylesheet"
    />
    <title>CHALLENGE</title>
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

    <!-- color picker -->
    <div>
      <input
        type="color"
        id="head"
        name="color"
        value="#e66465"
        onchange="changeGridColor(this)"
      />
      <label for="head">Grid</label>
    </div>

    <!-- another color picker -->
    <div>
      <input
        type="color"
        id="head"
        name="color"
        value="#e66465"
        onchange="changeBorderColor(this)"
      />
      <label for="head">Border</label>
    </div>

    <div><button id="size" onclick="changeSize()">Change Size</button></div>

    <div><button id="playGame" onclick="startChallengeGame()">Play</button></div>

    <div class="outer">
      <div class="inner">
        <div id="stats"></div>
        <br />
        <div id = "picrossDisplay" onclick="picrossArray();"></div>
        <div id="timerDown"></div>
        <div id="repeat" onclick="playAgain()"></div>
        <div><button id="next" onclick="nextLevelBtn();" style="display:none">Next</button></div>




<table id="maintable">
      <tr>
        <td id="colnothing"></td>
        <td id="col0"></td>
        <td id="col1"></td>
        <td id="col2"></td>
        <td id="col3"></td>
        <td id="col4"></td>
        <td id="col5"></td>
        <td id="col6"></td>
        <td id="col7" ></td>
        <td id="col8" ></td>
        <td id="col9" ></td>
        <td id="col10" ></td>
        <td id="col11"></td>
        <td id="col12"></td>
      </tr>
      <tr>
        <td id = "row0"></td>
        <td colspan="7" rowspan="7" id="tableLevel">
        </td>
      </tr>
      <tr>
        <td id = "row1"></td>
      </tr>
      <tr>
        <td id = "row2"></td>
      </tr>
      <tr>
        <td id = "row3"></td>
      </tr>
      <tr>
        <td id = "row4"></td>
      </tr>
      <tr>
        <td id = "row5"></td>
      </tr>
      <tr>
        <td id = "row6"></td>
      </tr>
      <tr>
        <td id = "row7"></td>
      </tr>
      <tr>
        <td id = "row8"></td>
      </tr>
      <tr>
        <td id = "row9"></td>
      </tr>
      <tr>
        <td id = "row10"></td>
      </tr>
      <tr>
        <td id = "row11"></td>
      </tr>
      <tr>
        <td id = "row12"></td>
      </tr>
    </table>
        <div id = "tableSetting"></div>
      </div>
    </div>


  </body>
</html>
