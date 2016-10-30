1.
{
  const a = {name:'22'};
  Object.freeze(a);//冻结
  a.name = 33;
}
console.log(a);
es6中新增代码块{}，这是的作用域就有所限制
此时的输出a是报错的，没冻结之前可以改变a，因为a为地址，不可以变，
但是所指向的内容是可以改变的

2.
var a = 0;
function f(){
    //var a;
	console.log(a);
	//let a = 1;
	//var a =0;
}
f();
此时的输出结果为0
如果加上var a;输出为undefined
如果加上var a =0;同上
如果加上let a =1,无变量提升，则报错

3.
var set = new Set();
set.add(2);
set.add(3);
console.log(set.size);
set.clear();
//自动去重
数组去重的一个原始方法：
var arr = [2,3,4,5,5,5];
var newArr =[];
for(var i=0;i<arr.length;i++){
	if(arr.indexOf(arr[i])==i){
	   newArr.push(arr[i]);
	}
}
巧妙一些：
var set = new Set(arr);
var newArr = Array.from(set);

4.
var m = new Map();
m.set('key1',1);
m.set('key2',2);
console.log(m.get('key1'));
console.log(m.has('key2'));
m.clear();
var keys = m.keys();
var values = m.values();
var entries = m.entries();
for(var key of keys){
	console.log(key);
}
for(var value of values){
	console.log(value);
}
for(var entrie of entries){
	console.log(entrie);
}
m.forEach(function(value,key){
	console.log(value,key);
});

5.箭头函数
var fn = (name.age)=>{console.log(name,age);}
fn(1,2);
而传统的是：
function fn(){
	console.log('haha');
}
fn();

6.关于数组
var a = [1,2,3,4,5,6,7,8];
a.copyWithin(1,5,7);
console.log(a);
起始位置（从哪里开始替换后面的，包含该位）  开始位置  结束位置
输出为：
1,6,7,4,5,6,7,8

var v = a.findIndex(function(value,index,arr){
	return index > 5
});
var v = a.fill(10);
console.log(a);
输出为：
10,10,10,10,10,10,10,10

7.关于字符串
var str = 'hello'
console.log(str.includes('h',2));//从第二个位置开始找h
console.log(str.startsWith('h',2));
console.log(str.endsWidth('h',2));
console.log(str.repeat(3));//hellohellohello

8.
var name = 'wang'
function f(){
	return 'dd';
}
var str = `
<div>
    <span>${name + 'dd'}</span>
    <span>${f()}</span>
</div>`;
console.log(str);

9.数组的解构
var arr = [1,2,3];
var [a,b]= arr;
console.log(a,b);//1,2

10.
不用第三个数将两个数颠倒位置
var a = 10;
var b = 20;
[a,b] =[b,a];
console.log(b,a);//10,20

var obj = {a:1,b:{c:33}};
var {a,b:{c}} = obj;
console.log(a,c);//1,33
//保持形式一样

11.函数的应用
function f({x,y}){
	console.log(x,y);//1,2
}
f({x:1,y:2});
function f({x,y}={x:1,y:2}){
	console.log(x,y);//1,2
}
f();
function f([a=0,b=0]=[4,5]){
	
}
f();

12.判断一个数组中是否含有NaN
var arr = [2,3,NaN];
var a = arr.indexOf(NaN);
or 
var a = arr.findIndex(function(value,index,arr){
	return Object.is(value,NaN);
});

13.异步
如果要想达到一个异步的效果，原始的情况是这样的，采用函数嵌套
fn(1,function(){
	...
	fn1(2,function(){
	  ...
	  fn2(3,function(){
	      ...
	  })
	})
});
你可以通过settimeout强制执行
function fn(value,callback){
	setTimeout(function(){
	   console.log(value);
	   callback();
	},200)
}
function fn1(value,callback){
	setTimeout(function(){
	   console.log(value);
	   callback();
	},100)
}
function fn2(value,callback){
	setTimeout(function(){
	   console.log(value);
	   callback();
	},200)
}
fn();fn1();fn2();//根据速度来执行
但是es6引入promise，解决嵌套回调
var promise =new Promise(function(resolve,reject){
	fn(1,function(){
		resolve();
	})
});
promise.then(function(){
	fn1(2,function(){
	   return Promise.resolve();
	}).then(function(){
	fn2(3,function(){
	   console.log('end...');
	}).catch(function(){
	  console.log('error');
	})
	})
})
在代码同步的情况下，解决了异步问题


