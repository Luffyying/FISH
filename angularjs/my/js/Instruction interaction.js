var myapp = angular.module('Myapp',[]);
myapp.directive('superman',function(){
	return {
		scope:{},
		restrict:'AE',
		controller:function($scope){
			$scope.abilities = [];
			this.addStrength =function(){
				$scope.abilities.push('strength');
			};
			this.addSpeed = function(){
				$scope.abilities.push('speed');
			};
			this.addLight = function(){
				$scope.abilities.push('light');
			}
		},
		link:function(scope,element,attrs){
			element.addClass('btn btn-primary');
			element.bind('mouseenter',function(){
				console.log(scope.abilities)
			});
		}

	}
});
myapp.directive('strength',function(){
	return {
		require:'^superman',
		link:function(scope,element,attrs,supermanCtrl){
			supermanCtrl.addStrength();
		}
	}
});
myapp.directive('speed',function(){
	return {
		require:'^superman',
		link:function(scope,element,attrs,supermanCtrl){
			supermanCtrl.addSpeed();
		}
	}
});
myapp.directive('light',function(){
	return {
		require:'^superman',
		link:function(scope,element,attrs,supermanCtrl){
			supermanCtrl.addLight();
		}
	}
})
//link 用于处理指令内部的事务
//controller 用于暴漏一些函数，给外部调用