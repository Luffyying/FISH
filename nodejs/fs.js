var fs = require('fs');//包名和变量名最好一致
// fs.readFile('sum.js',function(err,data){//异步读取
// 	if(err){
// 		console.log(err);
// 	}else{
// 		console.log(data);//不设置的话，默认是十六进制输出
// 		console.log(data.toString());//可以这样,调用Buffer的tostring()
// 	}
// });
fs.readFile('sum.js','utf-8',function(err,data){//也可以这样，加参数
	if(err){
		console.log(err);
	}else{
		console.log(data);
	}
});
var data = fs.readFileSync('log.txt','utf-8');//同步读取
console.log(data);
//异步读取的操作，会在操作系统后台执行
//异步代码不会阻塞下面代码执行，这叫做非阻塞，而同步的叫做阻塞