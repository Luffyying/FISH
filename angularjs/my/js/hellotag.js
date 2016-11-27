var myapp = angular.module('DiyTag',[]);
myapp.directive('hello',function(){
	return {
		restrict:'E',//模式 AEMC 属性 元素 样式 注释
		template:'<div>hello everyone!</div>',//index.html  template url
		replace:true
	}
})
// E 元素 <my-menu title=products></my-menu>
// A 属性 <div my-menu=products></div>
// C 样式类 <div class=my-menu:products></div>
// M 注释 <!-- directive:my-menu -->
为了防止标签覆盖，采用如下的方法：
myapp.directive('hello',function(){
	return {
		restrict:'E',
		transclude:true,
		template:'<div>hello everyone!<div ng-transclude></div></div>'
		compile:function(){

		},
		link:function(){
			//操作DOM，绑定事件监听器
		}
	}
})

//指令的：加载阶段 编译阶段  连接阶段