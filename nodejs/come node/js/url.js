url.parse('http://sdfsdf');
url.format({protocol:'http',host:'imooc.com:8080',port:'8080',hostname:'imooc.com'});
//结果为：http://imooc.com:8080
url.resolve('http://imooc.com/','/course/list');
// 结果为：http://imooc.com/course/list
url.parse('//imooc.com');
