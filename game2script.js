window.addEventListener('load',init);

var verif=0;
let dif=1;
let time;
let score = 0;


var x;
var y;
var nr=0;
var min=1;
var max=10;
var i=1;
var interval;
var copy;


if (localStorage.getItem("hs2easy") === null) {
	localStorage.setItem("hs2easy",0);
}

if (localStorage.getItem("hs2medium") === null) {
	localStorage.setItem("hs2medium",0);
}

if (localStorage.getItem("hs2hard") === null) {
	localStorage.setItem("hs2hard",0);
}

if (localStorage.getItem(dif) === null) {
	localStorage.setItem(dif,1);
}

let isPLaying;

	function easy(){
		localStorage.setItem(dif,1);
		localStorage.setItem(verif,1)
		document.location.reload(false)
	}

	function medium(){
		localStorage.setItem(dif,2);
		localStorage.setItem(verif,1);
		document.location.reload(false)
	}

	function hard(){
		localStorage.setItem(dif,3);
		localStorage.setItem(verif,1);
		document.location.reload(false)
	}




const NumberInput = document.querySelector('#numbers');
const currentNumber = document.querySelector('#currentNumber');
const scores = document.querySelector('#scores');
const times = document.querySelector('#times');
const hscores = document.querySelector('#hscores');
const message = document.querySelector('#message');
const circle = document.querySelector('#circle');

function init(){

		
		if(localStorage.getItem(dif)==1)
			{
				hscores.innerHTML=localStorage.getItem("hs2easy");
				time=8;
				times.innerHTML="8";
				document.getElementById("easy").style.marginTop="-5px";
				document.getElementById("easy").style.boxShadow = "0 7px 10px #969696";
			}
		if(localStorage.getItem(dif)==2)
			{
				hscores.innerHTML=localStorage.getItem("hs2medium");
				time=6;
				times.innerHTML="6";
				document.getElementById("medium").style.marginTop="-5px";
				document.getElementById("medium").style.boxShadow="0px 7px 10px #969696";
			}
		if(localStorage.getItem(dif)==3)
			{
				hscores.innerHTML=localStorage.getItem("hs2hard");
				time=4;
				times.innerHTML="4";
				document.getElementById("hard").style.marginTop="-5px";
				document.getElementById("hard").style.boxShadow="0px 7px 10px #969696";
			}



		showWord(i);
		document.getElementById('numbers').readOnly = true;

		setTimeout(function(){
			hideNumber();
		},(time-3)*1000)

		setTimeout(function(){
			document.getElementById('numbers').readOnly = false;
			document.getElementById('numbers').style.cursor = "auto";
			NumberInput.addEventListener('input', startMatch);
			interval = setInterval(countdown,1000);
			setInterval(checkstatus,50);
		},(time-3)*1000)
		
	
}




function randomNumber(min,max){
	return Math.floor(Math.random()*(max-min))+min;
}


function startMatch(){
	if (matchWords()) {
		i=i*10;
		isPLaying=true;
		score++;
		if(localStorage.getItem(dif)==1)
			{
				time=9;
				var hscore=localStorage.getItem("hs2easy");
				if(score>=hscore)
					localStorage.setItem("hs2easy",score);
				hscores.innerHTML=localStorage.getItem("hs2easy");
			}
		if(localStorage.getItem(dif)==2)
			{
				time=7;
				var hscore=localStorage.getItem("hs2medium");
				if(score>=hscore)
					localStorage.setItem("hs2medium",score);
				hscores.innerHTML=localStorage.getItem("hs2medium");
			}
		if(localStorage.getItem(dif)==3)
			{
				time=5;
				var hscore=localStorage.getItem("hs2hard");
				if(score>=hscore)
					localStorage.setItem("hs2hard",score);
				hscores.innerHTML=localStorage.getItem("hs2hard");
			}	
			
		
		showWord(i);
		NumberInput.value='';
		times.innerHTML=time-1;

		window.clearInterval(interval);
		document.getElementById('numbers').readOnly = true;

		setTimeout(function(){
			hideNumber();
		},(time-3)*1000)

		setTimeout(function(){
			hideNumber();
			document.getElementById('numbers').readOnly = false;
			interval = setInterval(countdown,1000);

		},(time-2)*1000)

		if (score === -1) {
    		scores.innerHTML = 0;
  		} else {
    		scores.innerHTML = score;

  		}


	}
}
function matchWords(){
	if (NumberInput.value === currentNumber.innerHTML) {
    		return true;
		}
		else{
			message.innerHTML = '';
			return false;
		}
}

function showWord(i){
	currentNumber.style.opacity =1;
	n=randomNumber(i,i*10)
	currentNumber.innerHTML =n;

}

function hideNumber()
{
	currentNumber.style.opacity=0;
}

function countdown(){


	if(time > 0)
		{	
			time--;
			times.innerHTML=time;
		}
	else if(time === 0){
		isPLaying=false;
	}
	
}

function checkstatus(){
	if(!isPLaying && time===0){
		currentNumber.style.opacity=1;
		currentNumber.innerHTML="Game Over";
		document.getElementById('info').style.opacity="1";
		document.getElementById('numbers').readOnly = true;
		document.getElementById('numbers').style.cursor = "no-drop";
		document.getElementById('info').style.cursor = "pointer";
		document.getElementById('infotext').style.cursor = "pointer";
		document.getElementById('info').onclick = function(){
			window.location.href = 'game2.html';
		};
		document.getElementById('infotext').onclick = function(){
			window.location.href = 'game2.html';
		};
		score=-1;
		
		
	}
	
}	