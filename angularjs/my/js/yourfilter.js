var app = angular.module('myapp',[]);
app.filter('myFilter',function(){
	return function(item){
		return item + 'o(n_n)o';
	}
});