var app = angular.module('CssModule',[]);
app.controller('MyCtrl',['$scope',function($scope){
	$scope.isError = false;
	$scope.isWarning = false;
	$scope.showError = function(){
		$scope.isError=true;
		$scope.isWarning = false;
		$scope.message = 'this is a error'
	};
	$scope.showWarning = function(){
		$scope.isWarning = true;
		$scope.isError = false;
		$scope.message = 'this is a warning'
	}
}]);