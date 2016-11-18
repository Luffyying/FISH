//process.stdout-->standard output
//process.stderr-->standard error
process.stdout.write('this is stdout');
process.stderr.write('this is stderrn');
process.stdin.setEncoding('utf-8');
// process.stdin.on('data',function(data){
// 	console.log(data);
// })
process.stdin.on('readable',function(){
	var a = process.stdin.read();
	console.log(a);
});
process.on('exit',function(){//当程序即将结束的时候触发
	console.log('program will exit');
})
//SIGINT signal interrupted
process.on('SIGINT',function(){
	console.log('program has a sigint');//会改变退出行为
	process.exit();
});