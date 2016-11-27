var myapp = angular.module('Commend',[]);
myapp.controller('Ctrl1',['$scope',function($scope){
	$scope.getData1 = function(){
		console.log('加载数据1...');
	}
}]);
myapp.controller('Ctrl2',['$scope',function($scope){
	$scope.getData2 = function(){
		console.log('加载数据2...');
	}
}]);
myapp.directive('com',function(){
	return {
		restrict:'AE',
		link:function(scope,element,attrs){
			element.bind('mouseenter',function(){
				scope.$apply(attrs.how);
			})
		}
	}
});