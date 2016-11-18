var http = require('http');
var url = require('url');
var fs = require('fs');
http.createServer(function(request,response){
	var urlObj = url.parse(request.url);
	console.log(urlObj);
	var pathname = urlObj.pathname;
	var query = urlObj.query;
	if(pathname =='/'){//根目录，默认首页
		read('/index.html',response);
	}else if(pathname=='/ajax'){
		response.end("{'msg':'http'}");
	}else{
		read(pathname,response);
	}
	
	//response.end('url parse');
}).listen(8080);
function read(pathname,response){
	fs.readFile(pathname.substr(1),'utf-8',function(err,data){
		if(err){
			response.writeHead(404);
			response.end('sorry ,the file is not found');
		}else{
			response.end(data);
		}
		});
}
