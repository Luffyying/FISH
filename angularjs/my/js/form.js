var userInforModule = angular.module('UserInforModule',[]);
userInforModule.controller('UserInforCtrl',['$scope',function($scope){
	$scope.userInfor = {
		email:'12423232@qq.com',
		password:'12423232',
		autoLogin:true
	};
	$scope.getFormData = function(){
		console.log($scope.userInfor);
	};
	$scope.setFormData = function(){
		$scope.userInfor={
			email:'hahah@126.com',
			password:'ssss',
			autoLogin:false
		}
	};
	$scope.restFormData = function(){
		$scope.userInfor = {
		email:'',
		password:'',
		autoLogin:false
	};
	}
}]);

