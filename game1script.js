window.addEventListener('load',init);

var verif=0;
let dif=1;
let time;
let score = 0;
let i;
let ok=0;
var x;
var y;
var nr=0;

if (localStorage.getItem("hseasy") === null) {
	localStorage.setItem("hseasy",0);
}

if (localStorage.getItem("hsmedium") === null) {
	localStorage.setItem("hsmedium",0);
}

if (localStorage.getItem("hshard") === null) {
	localStorage.setItem("hshard",0);
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




const WordInput = document.querySelector('#words');
const currentWord = document.querySelector('#currentWord');
const scores = document.querySelector('#scores');
const times = document.querySelector('#times');
const hscores = document.querySelector('#hscores');
const message = document.querySelector('#message');
const circle = document.querySelector('#circle');



const words = [
'afraid','x-ray','delay','aboriginal','long','half','various','sharp','whip','embarrassed','level','habitual','berserk','makeshift','handy','roasted','distribution','neck','icicle','envious','play','egg','school','elfin','milk','quilt','wilderness','dad','adorable','greedy','little','reply','desert','actually',
'scientific','new','aboard','number','tergiversation','resonant','stir','pale','zebra','coat','vanish','chess','passenger','nutritious','use','obedient','receipt','aboriginal','brainy','nonchalant','distinct','embarrassed','highfalutin','futuristic','squeal','loutish','pie','harbor','bumpy','health','broken',
'mind','horses','capricious','waves','accidental','basketball','nine','voyage','efficient','birth','knotty','match','admire','meeting','line','tame','freezing','glorious','writer','competition','steer','abrasive','overjoyed','knowing','five','doll','judicious','bucket','oranges','veil','womanly','government',
'witty','truculent','mix','agree','plastic','greedy','bear','sense','chin','trouble','accidental','thought','simplistic','small','thundering','jaded','mitten','acrid','suggest','ocean','scent','fetch','wish','chilly','paltry','enchanting','position','complete','amusement','bee','impartial','quiver','chance',
'neck','fuel','thinkable','amused','power','moan','point','door','recess','jellyfish','lake','reflect','grandfather','supply','tested','cautious','amazing'

]




function init(){

		if(localStorage.getItem(dif)==1)
			{
				
				hscores.innerHTML=localStorage.getItem("hseasy");
				time=6;
				times.innerHTML="6";
				document.getElementById("easy").style.marginTop="-5px";
				document.getElementById("easy").style.boxShadow = "0 7px 10px #969696";
			}
		if(localStorage.getItem(dif)==2)
			{
				
				hscores.innerHTML=localStorage.getItem("hsmedium");
				time=4;
				times.innerHTML="4";
				document.getElementById("medium").style.marginTop="-5px";
				document.getElementById("medium").style.boxShadow="0px 7px 10px #969696";
			}
		if(localStorage.getItem(dif)==3)
			{
				
				hscores.innerHTML=localStorage.getItem("hshard");
				time=2;
				times.innerHTML="2";
				document.getElementById("hard").style.marginTop="-5px";
				document.getElementById("hard").style.boxShadow="0px 7px 10px #969696";
			}

	document.getElementById('words').readOnly = true;
	c1();
	setTimeout(c2,700);
	setTimeout(c3,1400);
	setTimeout(c4,2100);
	setTimeout(function(){
	document.getElementById('words').readOnly = false;
	showWord(words);
	WordInput.addEventListener('input', startMatch);
	setInterval(countdown,1000);
	setInterval(checkstatus,50);

	},2800);
	
}

function c1()
{
	currentWord.innerHTML = 3;
}

function c2()
{
	currentWord.innerHTML = 2;
}

function c3()
{
	currentWord.innerHTML = 1;
}

function c4()
{
	currentWord.innerHTML = "START";
}



function startMatch(){
	if (matchWords()) {

		isPLaying=true;
		score++;
		if(localStorage.getItem(dif)==1)
			{
				time=7;
				var hscore=localStorage.getItem("hseasy");
				if(score>hscore)
					localStorage.setItem("hseasy",score);
				hscores.innerHTML=localStorage.getItem("hseasy");
			}
		if(localStorage.getItem(dif)==2)
			{
				time=5;
				var hscore=localStorage.getItem("hsmedium");
				if(score>hscore)
					localStorage.setItem("hsmedium",score);
				hscores.innerHTML=localStorage.getItem("hsmedium");
			}
		if(localStorage.getItem(dif)==3)
			{
				time=3;
				var hscore=localStorage.getItem("hshard");
				if(score>hscore)
					localStorage.setItem("hshard",score);
				hscores.innerHTML=localStorage.getItem("hshard");
			}

		

		showWord(words);
		WordInput.value='';
		if (score === -1) {
    		scores.innerHTML = 0;
  		} else {
    		scores.innerHTML = score;
  		}


	}
}
function matchWords(){
	if (WordInput.value.toUpperCase() === currentWord.innerHTML.toUpperCase()) {
    		return true;
		}
		else{
			message.innerHTML = '';
			return false;
		}
}

function showWord(words){
	const randIndex = Math.floor(Math.random() * words.length);
	currentWord.innerHTML =words[randIndex];

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
		currentWord.innerHTML="Game Over";
		score=-1;
		document.getElementById('info').style.opacity="1";
		document.getElementById('words').readOnly = true;
		document.getElementById('words').style.cursor = "no-drop";
		document.getElementById('info').style.cursor = "pointer";
		document.getElementById('infotext').style.cursor = "pointer";
		document.getElementById('info').onclick = function(){
			window.location.href = 'game1.html';
		};
		document.getElementById('infotext').onclick = function(){
			window.location.href = 'game1.html';
		};
	}
	
}	