function animate(elem,attr,callback){
			clearInterval(elem.timer);//避免多次触动加速
			elem.timer = setInterval(function(){
				var bStop = true;
				for(var prop in attr){
				var curr = parseInt(getStyle(elem,prop));
				if (prop == 'opacity') {
					curr = parseInt(getStyle(elem,prop)*100);
				}
				var speed = (attr[prop] - curr)/8;
				speed = speed > 0 ? Math.ceil(speed):Math.floor(speed);

				if(curr != attr[prop]){
					bStop = false;
					
				}
				if(prop == 'opacity'){
					elem.style.opacity = (curr + speed)/100;
					elem.style.filter = 'alpha(opacity='+(curr+speed)+')';
				}else{
					elem.style[prop] = curr + speed + 'px';
					}	
			}
			if (bStop) {
				clearInterval(elem.timer);
				callback && callback();
				}
		},30);
}
		
		function getStyle(elem,attr){
			if(elem.currentStyle){
				return elem.currentStyle[attr];
			}else{
				return getComputedStyle(elem,false)[attr];
			}
		}//解决兼容性
