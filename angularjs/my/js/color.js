var change = angular.module('ChangeColor',[]);
change.controller('color',['$scope',function($scope){
	$scope.color = 'red';
	$scope.setColor = function(){
		$scope.color = 'green';
	}
}]);