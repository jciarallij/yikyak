var mdApp = angular.module("mdApp", []);

mdApp.controller("mdController", function($scope, $http) {



	$scope.follow = function(username, followMethod){
		console.log(username);
		$http.post('process_follow.php', {
			poster: username,
			followMethod: followMethod
		}).then(function successCallback(response){
			console.log(response.data);
		}, function errorCallback(response){
			console.log(response);
		});		

	}

    $scope.processVote = function(element, vote) {

        $http.post('process_vote.php', {
            voteDirection: vote,
            idOfPost: element.target.parentElement.id
        }).then(function successCallback(response) {
            if (vote == 1){
                if (response.data == "notLoggedIn") {
                    element.currentTarget.children[0].innerHTML = "You must be loggin to vote";
                } else {
                    element.currentTarget.children[0].innerHTML = response.data;
                }
            } else if(vote == 0){
                if (response.data == "notLoggedIn") {
                    element.currentTarget.children[0].innerHTML = "You must be loggin to vote";
                } else {
                    element.currentTarget.children[0].innerHTML = response.data;
                }
            }
        }, function errorCallback(response) {
            console.log(response);
        });

    }

});
