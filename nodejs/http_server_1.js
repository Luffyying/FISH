var http = require('http');
var fs = require('fs');
var server = http.createServer(function(request,response){
	//response.end('hello nodejs');
	//response.end('<html><body><h2>haha</h2></body></html>');
	fs.readFile('index.html','utf-8',function(err,data){
		response.end(data);
	});
});
server.listen(8080);
// http.createServer(function(request,response){
// 	response.end('hello nodejs');
	
// }).listen(8080);链式操作
//commonjs是规范
//nodejs基于commonjs 是分为各个模块，通过npm引入包