querystring.stringify({name:'haha',age:23,course:['1,2']});
'name=haha&course=1&course=2&age=23';
querystring.stringify({name:'haha',age:16},',');
'name=haha,age=16';
querystring.stringify({name:'haha',age:16},',',':');
'name:haha,age:16';

querystring.parse();