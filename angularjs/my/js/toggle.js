var Myapp = angular.module('MyModule',[]);
Myapp.controller('toggleCtrl',['$scope',function($scope){
	$scope.menuState = {show:false};
	$scope.toggleMenu = function(){
		$scope.menuState.show = !$scope.menuState.show; 
	}
}]);