
///////////////////////
// phpapp AngularJS App
///////////////////////

var app = angular.module('phpapp', ['ngRoute']);

///////////////////////
// Configure app router
///////////////////////

app.config(['$routeProvider', function ($routeProvider) {
	$routeProvider
	.when ('/', {
		controller: 'PhpCtrl',
		templateUrl: 'app/views/view.html'
		})
	.otherwise ({ 
			redirectTo: '/' 
		});	
}]);

///////////////////////
// PhpCtrl Controller
///////////////////////

app.controller('PhpCtrl', ['$scope', 'phpFactory', function($scope, phpFactory) {

	$scope.submitUser = function(user) {
		phpFactory.process(user)
			.success(function(data) {
				$scope.result = data;
			})
			.error(function(data) {
				alert("Error processing input: " + error.message);
			});
	}

}]);

///////////////////////
// phpFactory Factory
///////////////////////

app.factory('phpFactory', ['$http', function($http) {

	var urlBase = 'php/';
	var phpFactory = {};
	
	phpFactory.process = function(data) {
		return $http.post(urlBase + 'post.php', data);
	};	

	return phpFactory;
}]);