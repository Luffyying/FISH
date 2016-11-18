console.log('this is a log');
console.info('this is an info');
console.error('this is an error');
console.warn('this is a warn');
//利用尖括号的重定向，可以将log info的日志内容重定向到文件中，但是
//其他两个就不可以了。
//但是可以采用高级行为，1>log.txt 2>error.txt
console.time('text');
for(var i=0;i<1000;i++){};
console.timeEnd('text');