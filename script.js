var imageC =1;
var total = 5;
function slide(x){
	var image = document.getElementById("img");
	imageC =imageC+x;
	if(imageC>total){
		imageC=1;
	}
	if (imageC <1) {
		imageC=total;
	};
	image.src="images/i" + imageC +".jpg";

}
window.setInterval(function slideAuto(){
	var image = document.getElementById("img");
	imageC =imageC+1;
	if(imageC>total){
		imageC=1;
	}
	if (imageC <1) {
		imageC=total;
	};
	image.src="images/i" + imageC +".jpg";

},3000);


function dorpdown(){
	
	document.getElementById("community").style.display='block';

}
function dorpup(){
	document.getElementById("community").style.display='none';

}

function lived(){
	document.getElementById("live").style.display='block';
	document.getElementById('home-page').style.color='black'
}

function liveout(){
	document.getElementById("live").style.display='none';
}
function comin(){
	document.getElementById("commerce").style.display='block';
}
function comout(){
	document.getElementById("commerce").style.display='none';
}
function learn(){
	document.getElementById("learn").style.display='block';
}
function learnout(){
	document.getElementById("learn").style.display='none';
}
function medical(){
	document.getElementById("medical").style.display='block';
}
function medicalout(){
	document.getElementById("medical").style.display='none';
}