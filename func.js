/*** global vars ***/
//to keep track of size
var size = 7;
//to keep track of errors
var errors = 0;
//to keep track of turns
var turns = 0;
//to pull a level
var levelPull=[];
//to pull scores
var scorePull=[];
//for the stupid timer
var timerVar = 0;
//for the did I win to be able to access
var clock; 
//timer limit 
var timerLimit = 10000; 
//to keep track of levels to increment
var levelTracker= 0; 
//to wrap div 
var wrapper = document.createElement('div');
//making this a global
var levelType = 'arcade';
//to figure out styling elem in CSS for the cells
var tableSize=728;
var tableCellSize=728/8;
    //for calculating the score, for the little grid
    var totalCorrect = 0;
    var totalScore = 0;

/************************************************************************
 Table of contents of all available functions: 
updateCellSize()
changeGridColor(input)
changeBorderColor(input)
changeSize()
startGame()
startChallengeGame()
nextLevelBtn()
changeBlockColor(color)
timer()
timerDown()
errorCheck()
copyObject(obj)
isGameOver()
makeLevel()
didIWin()
playAgain()
squareClick(td,i,j)
floatRight()
postData(url,rawData={},callback=nooperation) 
picrossArray()
scoreTracker()
bestScores()
 ***********************************************************************/


 function updateCellSize() {
     tableCellSize = 728/(size+1);
 }

/** changes the grid color***/
function changeGridColor(input){ //should we specify color?
    let table = document.getElementById("board");
    table.style.backgroundColor = input.value;
    console.log(input.value);
    localStorage.setItem("backgroundcolor",input.value);
}

/** changes the border color***/
function changeBorderColor(input){ //should we specify color?
    let table = document.getElementById("board");
    for (let i=0; i<size;i++){
        let tr = table.children[i];
        for (let j = 0; j < size;j++){
            let td = tr.children[j];
            td.style.border = '1px solid '+ input.value;
        }
    }
}

/*** Change the grid size***/
function changeSize(){
    //reset level 
    levelTracker = 0;
    clearInterval(clock);
    timerVar=0;
if (size===13) {
    size=7;
    getLevels(drawLevel);
}
else {
    size =13;
    getLevels(drawLevel);
}
updateCellSize();
    
    
}

function startGame(){
    levelType = 'arcade';
    getLevels(drawLevel);
}

function startChallengeGame(){
    levelType = 'challenge';
    getLevels(drawLevel);
}

/** to make play buton change to next level**/
function nextLevelBtn(){
     document.getElementById("playGame").style.display = "none";
     document.getElementById("next").style.display = "none";
     document.getElementById("stats").innerHTML = "";
     drawLevel();
}

/*** change the color of the blocks ***/
function changeBlockColor(color){    
    document.body.style.background('tr') = red; // this isn't right at all
}

/*** timer ***/
function timer(){
    clock = setInterval(function(){
        timerVar++;
        document.getElementById('timer').innerHTML = "Timer: " + timerVar;
    }, 1000);
}


/** countdown timer to be used in challenge mode**/
function timerDown(){
    //need to use different variables for this function 
    timerLimit = 100;
    clock = setInterval(function(){      
        document.getElementById('timerDown').innerHTML = --timerLimit;
        if (timerLimit <=0){
            //to redirect to a different page
            window.location.href="youLoose.html";
            document.getElementById('timerDown').innerHTML = "You have lost! "
        }
    }, 1000);
    //for challenge mode add this to the shit that checks if you won or not 
}

/***To keep track of errros ***/
function errorCheck(){
    var errorCount;
    errorCount++;
}

var board = {
    square: []
}

var square = {touched: false, isSecret: false}

// ---------------- utility functions
function copyObject(obj) {
	return JSON.parse(JSON.stringify(obj));
}

    function drawLevel(passedLevel = "") {
        document.getElementById("tableLevel").setAttribute("colspan",size);
        document.getElementById("tableLevel").setAttribute("rowspan",size);

        document.getElementById("playGame").style.display="none";
        let table = document.createElement('table');
        table.id = "board"; // give the table an id so we can manipulate it later ************************

        document.getElementById('tableLevel').innerHTML= "";
        
        board = passedLevel || JSON.parse(levelPull[levelTracker].jsonData);
        //console.log(levelPull);
        for (let i = 0; i < size; i++) {
            let tr = document.createElement('tr');
            for (let j = 0; j < size; j++) {
                board.square[i][j].touched=false;
                //makes a copy of the square 
                let td = document.createElement('td');
                //adding x and y coords to td
                td.id = i+"|"+j;
                //change the size for the table 
                td.style= "width: "+tableCellSize +"px";
                td.innerHTML = 'x'; // just to make the table show
    
                //to be able to pass the squar coords into it 
                td.onclick= function(){
                    squareClick(this,i,j);
                }
    
                tr.appendChild(td); // append the the tr instead
                td.style.border = '1px solid red';
                //cell padding in the grid
                //td.width = '100';
               // td.height = '100';
            }
            
            table.align = "center";
            table.appendChild(tr);
            //I think I should call the color funct in func.js at this point for user to choose a color
            table.style.backgroundColor = 'black';
        }
    
    document.getElementById('tableLevel').appendChild(table);

    //styling table 
    table.style.border = '1px solid black';  
    table.style.borderCollapse = 'collapse';

    //trying to connect the div to match the CSS styling BS
    //wrapper.style = "lineArray";
    //just need to do this around the first trs and first tds
    //tr.wrapper; 
    //td.wrapper;

    //want the picross array to display as soon as board is made 
    picrossArray();

        if (levelType==='arcade'){
            timer();
        }
        else {
            timerDown();
        }
}

function isGameOver(){
    if (errors >= 4){
        document.getElementById("cheat").style.display = "block";
    }
    if(errors == 10){
        console.log("You lost!");
        window.location.href="youLoose.html";
    }
}


/***manual level creation***/
function makeLevel(){
    for (let i=0; i<size; i++){
        for (let j=0; j<size; j++){
            board.square[i][j].isSecret=board.square[i][j].touched;
            board.square[i][j].touched=false;
        }
    }
}

/** help a player if they get stuck **/
//this whole func might have to go into the create board one
function cheat(){
    for (let i =0; i < size; i++){
        for (let j = 0; j < size; j++){
            console.log(board.square[i][j].isSecret);
            if (board.square[i][j].isSecret == true && board.square[i][j].touched==false){
                board.square[i][j].touched == true;
                //change the color to green
                td = document.getElementById(i+"|"+j);
                td.style.backgroundColor= 'green';
                //because it will cheat its way through
                didIWin();
                return;
            }
        }
    }
}

/** checks to see if the player has won**/
function didIWin(){
    //traverse each square, to see if all of the isSecret have been clicked on 
    for (let i = 0; i<size;i++){
        for (let j = 0; j<size; j++){
            // tried doing errors > 10 
            if (board.square[i][j].isSecret == true && board.square[i][j].touched == false){
                return 0; 
            } 
        } 
    }
    
    levelTracker++;
    //if levelTracker < 3 then you can keep playing the next level 
    if (levelTracker < 4) {
        document.getElementById("stats").innerHTML = "You won!";
        console.log("Next level!");
        document.getElementById("next").style.display="block";
    }   
    else { //if all levels are checked off then you won 
        document.getElementById('timer').innerHTML = "You won the game! Time to finish: "+timerVar;
        console.log("Player won the game! In time: " +timerVar);
       //insert all values into score 
        clearInterval(clock);
        return 2;
}
    return 1;
}

/** to have a replay button show up once they have won the game**/
function playAgain(){
    if (didIWin() === 1){
        document.getElementById("repeat").display.style="block";
        let repeatPlay = document.getElementById("repeat");
        repeatPlay.setAttribute("href","arcade.html");
        window.location.href="youLoose.html";
        //need to load this with the next level
        
        //to show the time when the user has won
        console.log(clock);
    }
}

/*** finding a square, to be used for levels***/
function squareClick(td,i,j){
    turns++;
    document.getElementById("stats").innerHTML= "Num of Turns: " + turns;
    //to add a break line 
    document.getElementById("stats").innerHTML += "<br>";
    //did you touch it? 
    board.square[i][j].touched = true; 

   console.log(board.square[i][j]);
   if (board.square[i][j].isSecret == true){
       td.innerHTML= "o";
       td.style.backgroundColor= 'green';
   } else {
       td.style.backgroundColor = 'red';
       errors++;
   }
   //so that I can create line breaks in CSS 
   //var linebreak = document.createElement("br");
   //document.appendChild(linebreak);
   document.getElementById("stats").innerHTML+= "Errors: " + errors; 
   document.getElementById("stats").innerHTML += "<br>";
   isGameOver();
   if (didIWin() === 1){
       //pass time into the score tracker as well, and errors and turns, etc -- all db info
       scoreTracker();
       clearInterval(clock);
       
   }
}

/*** Trying to center the table so that it isn't floating***/
function floatRight() {
    document.getElementById("table").style.cssFloat = "right";
}

//if I don't feel like doing a call back
var nooperation = function(){};

//from lab 9
function postData(url,rawData={},callback=nooperation) {
	var json = JSON.stringify(rawData);
	console.log("data to save:");
	console.log(json);

	var data = {};
	//data.data = json;
	data = json;

	// Sending and receiving data in JSON format using POST method
	var xhr = new XMLHttpRequest();  
	console.log(url);
	xhr.open("POST", url, true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4 && xhr.status === 200) {
			console.log(xhr);
			var json = JSON.parse(xhr.responseText);
            console.log(json);
            callback(json);
		}
	};
    xhr.send(data);
}

//to read the level data from the json in the sql
function getLevels(callback,param=""){
    postData("getLevels.php?size=" + size,{},
    function(json){ 
        console.log(json);
        levelPull = json;
        callback(param);
    }
    );
}

/** array structure for board numbers */
function picrossArray(){
    // I just find this interesting board.square[i][j].length= size lol
    document.getElementById("picrossDisplay").style.display="";
    
    //need to gather data from sql database
    // or count occupied blocks and psuh them into an array
    //count consecutive streaks 
    let count=0;
    let streakRow="";
    let streakCol="";
    //hides to start over
    let sizeplusplus=size+1;
    document.getElementById("colnothing").style  = "width: "+tableCellSize +"px";

    for (let i=0; i<13 ; i++){
        document.getElementById("row"+i).style.display="none";
        document.getElementById("col"+i).style.display="none";
    }

    //displaying the picross array 
    for (let i=0; i<size ; i++){
        console.log(i);
        document.getElementById("col"+i).style.display="table-cell";
        document.getElementById("row"+i).style.display="table-cell";
        let sizeplusplus=size+1;
        document.getElementById("col"+i).style= "width: "+tableCellSize +"px";

        for (let j =0; j <size; j++){
            if (board.square[i][j].isSecret === true){
                count++;
            }
            else {
                if (count>0){
                    streakRow+=count + "<br>";
                    count=0;
                }

            }
        }
        
        if (count>0){
            console.log("ccc");
            streakRow+=count + "<br>";
            count=0;
        }
        count=0;
        
        if (streakRow.length>0){
            document.getElementById("row"+i).innerHTML=streakRow;
        }
        else {
            document.getElementById("row"+i).innerHTML="0";
        }
        document.getElementById("row"+i).style.display= "table-cell";
        
        streakRow="";   
    }
    console.log(streakRow);
    console.log(streakCol);

    //then make an array of those arrays for all sides

    count=0;
    for (let j=0; j<size; j++){
        for (let i =0; i <size; i++){
            //to find the streaks in the columns
            if (board.square[i][j].isSecret === true){
                totalCorrect++;
                count++;
            }
            else {
                if (count>0){
                    streakCol+=count + "<br>";
                    count=0;
                }
               
            }
        }
        if (count>0){
            //console.log(count);
            streakCol+=count + "<br>";
        }
        count=0;
        //to find the streaks in the col
        if (streakCol.length>0){
            document.getElementById("col"+j).innerHTML=streakCol;
        }
        else {
            document.getElementById("col"+j).innerHTML="0";
        }
        
        streakCol="";
    }
    
}

//function to calculate score of user
function scoreTracker(callback, param = ""){
    let numerator = totalCorrect - errors; 
    //possible of a negative number in there 
    if (numerator < 0){
    numerator*-1;
    } 
    if (numerator == 0){
        totalScore = 0;
    }
    //get total size of grid for game
    if (size == 7){
        Math.round(totalScore = numerator/49);
    }else {
        Math.round(totalScore = numerator/169);
    }

    let username = document.getElementById('username').innerText || "anonymous";
//to be used in the post
    let obj = {
        //to keep track of username, time, score, size of board
        username: username,
        duration: timerVar,
        numErrors: errors,
        score: totalScore,
        gameCol: size,
        gameType: levelType
    };


    postData("insertScores.php",obj, function(json){
        scorePull = json;
        callback(param);
    });
    //this needs to get pushed into the SQL table
}

//to read the score data from the json in the sql
function getScores(){
    obj={};
    postData("getScores.php", obj,
    function(json){
        scorePull = json;
        tableForScores();
    }
    );
}

function tableForScores(){
    let table = document.createElement('table');
    table.id = "scoreboard"; 
        for (let i = 0; i < scorePull.length; i++) {
        let tr = document.createElement('tr');
		let td = document.createElement('td');
		td.style= "width: "+tableCellSize +"px";
		td.style.border = '1px solid brown';
		td.innerHTML = scorePull[i].username;
		tr.appendChild(td); 

		let td2 = document.createElement('td');
		td2.style= "width: "+tableCellSize +"px";
		td2.style.border = '1px solid brown';
		td2.innerHTML = scorePull[i].score;
		tr.appendChild(td2); 

		let td3 = document.createElement('td');
		td3.style= "width: "+tableCellSize +"px";
		td3.style.border = '1px solid brown';
		td3.innerHTML = scorePull[i].duration;
		tr.appendChild(td3); 

		let td4 = document.createElement('td');
		td4.style= "width: "+tableCellSize +"px";
		td4.style.border = '1px solid brown';
		td4.innerHTML = scorePull[i].gameType;
		tr.appendChild(td4); 

        table.align = "center";
        table.appendChild(tr);
        //I think I should call the color funct in func.js at this point for user to choose a color
        table.style.backgroundColor = 'green';
    }

	document.getElementById('showScores').appendChild(table);

	//styling table 
	table.style.border = '1px solid black';  
	table.style.borderCollapse = 'collapse';
}

/** I need to keep generating random numbers rather than just once**/
function generateRandomNumber(min_value , max_value) {
    //made random number a global variable!! 
    var randomNumber = Math.floor(Math.random() * (max_value-min_value) + min_value);
    return randomNumber;
} 

/* for the creator == me */
function createRandomLevel(){
    let row = [];
    for (let i = 0; i < size; i++) {
        let col = [];
        for (let j = 0; j < size; j++) {
            let square = {touched:false,
                isSecret: false,
            }
            //randomly making a square it, as long as i is being made 
            if (generateRandomNumber(0,9) < 3){
                square.isSecret = true; 
            }
            col[j] = square;
        }
        row[i]=col;
    }
    
    console.log(row);
    board.square =  row;   
    //console.log(levelPull[levelTracker].jsonData); 
    drawLevel(board);
}