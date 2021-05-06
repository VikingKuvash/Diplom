var profile = angular.module('profile', []);

profile.controller("profileController", function($scope, $http, $window){
	
		$scope.updateUserData = function (){
			id = angular.element("#id").val();
			newfullName = angular.element("#newfullName").val();
			newphone = angular.element("#newphone").val();
			newcountry = angular.element("#newcountry ").val();
			newcity = angular.element("#newnewcity").val();
			newregion = angular.element("#newnewregion").val();
			newinstitution = angular.element("#newinstitution ").val();
			// console.log (id);
			// console.log ($scope.newfullName);
			// console.log ($scope.newphone);
			// console.log ($scope.newcountry);
			// console.log ($scope.newregion);
			// console.log ($scope.newcity);
			// console.log ($scope.newinstitution);
			$http({
				method: "POST",
				url: "http://diplom1/cabinet/profile/updateUserData",
				data: $.param({id: id, newfullName: $scope.newfullName, newphone: $scope.newphone, newcountry: $scope.newcountry, newregion: $scope.newregion, newcity: $scope.newcity, newinstitution: $scope.newinstitution}),
				headers: {"Content-Type": 'application/x-www-form-urlencoded'}
			}).then(function(result){
				// TODO
				console.log(result);
			})
		}

	$scope.saveProfileData = function() {
		id = angular.element("#userId").val();
		login = angular.element("#login").val();
		email = angular.element("#email").val();

		$http({
			method: "POST",
			url: "http://diplom1/cabinet/profile/updateProfile",
			data: $.param({id: id, login: login, email: email}),
			headers: {"Content-Type": 'application/x-www-form-urlencoded'}
		}).then(function(result){
			// TODO
			console.log(result);
		})
	}


	$scope.updatePassword = function() {
		id = angular.element("#userId").val();

		$http({
			method: "POST",
			url: "http://diplom1/cabinet/profile/updatePassword",
			data: $.param({id: id, newpass: $scope.newpass, repeatpass: $scope.repeatpass}),
			headers: {"Content-Type": 'application/x-www-form-urlencoded'}
		}).then(function(result){
			// TODO
			console.log(result);
		})
	}

	


})