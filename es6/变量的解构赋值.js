/**
数组的解构赋值
*/
//基本用法
//什么是解构，就是对变量进行赋值
var a = 1;
var b = 2;
//but now.. in the es6 ,you can do this like
var [a,b,c]=[1,2,3];
let [foo, [[bar], baz]] = [1, [[2], 3]];
foo // 1
bar // 2
baz // 3

let [ , , third] = ["foo", "bar", "baz"];
third // "baz"

let [x, , y] = [1, 2, 3];
x // 1
y // 3

let [head, ...tail] = [1, 2, 3, 4];
head // 1
tail // [2, 3, 4]

let [x, y, ...z] = ['a'];
x // "a"
y // undefined
z // []
let [x, y] = [1, 2, 3];
x // 1
y // 2

let [a, [b], d] = [1, [2, 3], 4];
a // 1
b // 2
d // 4
//如果解构不成功，变量的值就等于undefined,如下的foo都是解析不成功的时候
var [foo] = [];
var [bar, foo] = [1];
//默认值
//注意，ES6内部使用严格相等运算符（===），判断一个位置是否有值。所以，如果一个数组成员不严格等于undefined，默认值是不会生效的。
var [x = 1] = [undefined];
x // 1
var [x = 1] = [null];
x // null
let [x = 1, y = x] = [];     // x=1; y=1
let [x = 1, y = x] = [2];    // x=2; y=2
let [x = 1, y = x] = [1, 2]; // x=1; y=2
let [x = y, y = 1] = [];     // ReferenceError
//对象的解构赋值
//变量必须与属性同名，才能取到正确的值,与数组赋值类似
var { foo: foo, bar: bar } = { foo: "aaa", bar: "bbb" };
//如果变量名和属性名不一致，必须写成下面这样的
var { bar,foo }= { foo: "aaa", bar: "bbb" };
foo // "aaa"
bar // "bbb"
var { baz } = { foo: "aaa", bar: "bbb" };
baz // undefined
//字符串的解构赋值
//字符串被转换成了一个类似数组的对象
const [a,b,c,d,e]='hello';
a // "h"
b // "e"
c // "l"
d // "l"
e // "o"
//数值和布尔值的解构赋值
//解构赋值的规则是，只要等号右边的值不是对象，就先将其转为对象。由于undefined和null无法转为对象，所以对它们进行解构赋值，都会报错
let {toString: s} = 123;
s === Number.prototype.toString // true
let {toString: s} = true;
s === Boolean.prototype.toString // true
let { prop: x } = undefined; // TypeError
let { prop: y } = null; // TypeError
//用途
//（1）交换变量的值
[x,y]=[y,x]
//一个函数返回多个值
// 返回一个数组

function example() {
  return [1, 2, 3];
}
var [a, b, c] = example();

// 返回一个对象

function example() {
  return {
    foo: 1,
    bar: 2
  };
}
var { foo, bar } = example();