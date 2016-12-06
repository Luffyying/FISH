var WINDOW_WIDTH = 1106;
var WINDOW_HEIGHT = 768;
var RADIUS = 8;
var MARGIN_TOP = 60;
var MARGIN_LEFT = 80;
const endTime = new Date(2016,11,6,16,24,00);
var curSeconds = 0;
var balls = [];
const colors =['#33b5e5','#aa66cc','#9933cc','#ff4444','#ff8800','#ffbb33','#99cc00'];

window.onload = function(){
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	canvas.width = WINDOW_WIDTH;
	canvas.height = WINDOW_HEIGHT;
	curSeconds = getCurSeconds();
	setInterval(function(){
		render(context);
		update();
	},50);
	

}
function update(){
	var nextTime = getCurSeconds();
	var nhours = parseInt(nextTime/3600);
	var nminutes = parseInt((nextTime - nhours *3600)/60);
	var nseconds = parseInt(nextTime%60);
	var chours = parseInt(curSeconds/3600);
	var cminutes = parseInt((curSeconds - nhours *3600)/60);
	var cseconds = parseInt(curSeconds%60);
	if(nseconds !=cseconds){
		if(parseInt(chours/10)!=parseInt(nhours/10)){
			addBalls(MARGIN_LEFT +0,MARGIN_TOP,parseInt(chours/10));
		}
		if(parseInt(chours%10)!=parseInt(nhours%10)){
			addBalls(MARGIN_LEFT +15*(RADIUS+1),MARGIN_TOP,parseInt(chours%10));
		}
		if(parseInt(cminutes/10)!=parseInt(nminutes/10)){
			addBalls(MARGIN_LEFT +39*(RADIUS+1),MARGIN_TOP,parseInt(cminutes/10));
		}
		if(parseInt(cminutes%10)!=parseInt(nminutes%10)){
			addBalls(MARGIN_LEFT +54*(RADIUS+1),MARGIN_TOP,parseInt(chours%10));
		}
		if(parseInt(cseconds/10)!=parseInt(nseconds/10)){
			addBalls(MARGIN_LEFT +78*(RADIUS+1),MARGIN_TOP,parseInt(cseconds/10));
		}
		if(parseInt(cseconds%10)!=parseInt(nseconds%10)){
			addBalls(MARGIN_LEFT +93*(RADIUS+1),MARGIN_TOP,parseInt(cseconds%10));
		}

		curSeconds = nextTime;
	}

	updateBalls();
}
function updateBalls(){
	for(var i=0;i<balls.length;i++){
		balls[i].x +=balls[i].vx;
		balls[i].y +=balls[i].vy;
		balls[i].vy +=balls[i].g;
		if(balls[i].y >=WINDOW_HEIGHT-RADIUS){
			balls[i].y = WINDOW_HEIGHT-RADIUS;
			balls[i].vy = -balls[i].vy*0.75;
		}
	}
}
function addBalls(x,y,num){
	for(var i=0;i<digit[num].length;i++){
		for(var j=0;j<digit[num][i].length;j++){
			if(digit[num][i][j]==1){
				var aBall = {
					x:x+j*2*(RADIUS+1)+(RADIUS+1),
					y:y+i*2*(RADIUS+1)+(RADIUS+1),
					g:1.5+Math.random(),
					vx:Math.pow(-1,Math.ceil(Math.random()*1000))*4,
					vy:-5,
					color:colors[Math.floor(Math.random()*colors.length)]
				}
				balls.push(aBall);
			}
		}
	}
}
function getCurSeconds(){
	var curTime = new Date();
	var ret = endTime.getTime() - curTime.getTime();
	ret = Math.round(ret/1000);
	return ret>=0?ret:0;
}
function render(cxt){
	cxt.clearRect(0,0,WINDOW_WIDTH,WINDOW_HEIGHT);
	var hours = parseInt(curSeconds/3600);
	var minutes = parseInt((curSeconds - hours *3600)/60);
	var seconds = parseInt(curSeconds%60);
	renderDigit(MARGIN_LEFT,MARGIN_TOP,parseInt(hours/10),cxt);
	renderDigit(MARGIN_LEFT+15*(RADIUS+1),MARGIN_TOP,parseInt(hours%10),cxt);
	renderDigit(MARGIN_LEFT+30*(RADIUS+1),MARGIN_TOP,10,cxt);
	renderDigit(MARGIN_LEFT+39*(RADIUS+1),MARGIN_TOP,parseInt(minutes/10),cxt);
	renderDigit(MARGIN_LEFT+54*(RADIUS+1),MARGIN_TOP,parseInt(minutes%10),cxt);
	renderDigit(MARGIN_LEFT+69*(RADIUS+1),MARGIN_TOP,10,cxt);
	renderDigit(MARGIN_LEFT+78*(RADIUS+1),MARGIN_TOP,parseInt(seconds/10),cxt);
	renderDigit(MARGIN_LEFT+93*(RADIUS+1),MARGIN_TOP,parseInt(seconds%10),cxt);
	for(var i=0;i<balls.length;i++){
		cxt.fillStyle = balls[i].color;
		cxt.beginPath();
		cxt.arc(balls[i].x,balls[i].y,RADIUS,0,2*Math.PI,true);
		cxt.closePath();
		cxt.fill();
	}
}

function renderDigit(x,y,num,cxt){
	cxt.fillStyle = 'rgb(0,102,153)';
	for(var i=0;i<digit[num].length;i++){
		for(var j=0;j<digit[num][i].length;j++){
			if(digit[num][i][j]==1){
				cxt.beginPath();
				cxt.arc(x+j*2*(RADIUS+1) + (RADIUS+1),y+i*2*(RADIUS+1)+(RADIUS+1),
					RADIUS,0,2*Math.PI);
				cxt.closePath();
				cxt.fill();
			}
		}
	}
}
