/**
	let
*/ 
/*基本用法*/  
//let声明的变量只在let命令所在的代码块内有效
{
	let a = 10;
	var b=1;
}
a//referenceerror : a is not define
b//1
//for循环的计数器，很适合使用let命令
for(let i=0;i<10;i++){}
	console.log(i);//referenceerror : a is not define
example:
var a = [];
for (var i = 0; i < 10; i++) {
  a[i] = function () {
    console.log(i);
  };
}
a[6](); // 10
var a = [];
for (let i = 0; i < 10; i++) {
  a[i] = function () {
    console.log(i);
  };
}
a[6](); // 6

//不存在变量提升，so，变量一定要在声明后使用，否则报错
console.log(foo); // 输出undefined
console.log(bar); // 报错ReferenceError
var foo = 2;
let bar = 2;
//暂时性死区，只要块级作用域内存在let命令，它所声明的变量就“绑定”（binding）这个区域，不再受外部的影响
var tmp = 123;
if (true) {
  tmp = 'abc'; // ReferenceError
  let tmp;
}
//不允许重复声明
// 报错
function () {
  let a = 10;
  var a = 1;
}
// 报错
function () {
  let a = 10;
  let a = 1;
}
function func(arg) {
  let arg; // 报错
}

function func(arg) {
  {
    let arg; // 不报错
  }
}
/*块级作用域*/  
//ES5只有全局作用域和函数作用域，没有块级作用域，这带来很多不合理的场景。
//第一种场景，内层变量可能会覆盖外层变量。
var tmp = new Date();
function f() {
  console.log(tmp);
  if (false) {
    var tmp = "hello world";
  }
}

f(); // undefined
//let实际上为JS新增了块级作用域
function f1() {
  let n = 5;
  if (true) {
    let n = 10;
  }
  console.log(n); // 5
}
//在块级作用域中声明函数，并且ES6规定，块级作用域之中，函数声明语句的行为类似于let，在块级作用域之外不可引用
'use strict';
if(true){
	function f(){}
}//不报错

/**
  const命令
*/
//const声明一个只读的常量，一旦声明，常量的值就不能改变,对于const来说，只声明不赋值，就会报错。
const PI = 3.1415;
PI // 3.1415
PI = 3;// TypeError: Assignment to constant variable.
//const的作用域与let命令相同：只在声明所在的块级作用域内有效。
if (true) {
  const MAX = 5;
}
MAX // Uncaught ReferenceError: MAX is not defined
//const命令声明的常量也是不提升，同样存在暂时性死区，只能在声明的位置后面使用。,
//与Let一样不可重复声明
//对于复合类型的变量，变量名不指向数据，而是指向数据所在的地址。const命令只是保证变量名指向的地址不变，并不保证该地址的数据不变，所以将一个对象声明为常量必须非常小心。
const foo = {};
foo.prop = 123;
foo.prop
// 123
foo = {}; // TypeError: "foo" is read-only
//es6一共有六种声明变量的方法，import class let const var function

/**
  顶层对象的属性
*/
//var命令和function命令声明的全局变量，依旧是顶层对象的属性；另一方面规定，let命令、const命令、class命令声明的全局变量，
//不属于顶层对象的属性。也就是说，从ES6开始，全局变量将逐步与顶层对象的属性脱钩。
