var mdApp = angular.module("mdApp", []);

mdApp.controller("mdController", function($scope, $http) {



    $scope.follow = function(username, followMethod) {
        console.log(username);
        $http.post('process_follow.php', {
            poster: username,
            followMethod: followMethod
        }).then(function successCallback(response) {
            console.log(response.data);
        }, function errorCallback(response) {
            console.log(response);
        });

    }

    $scope.processVote = function(element, vote) {
        // voting up = 1, and voting down = 0
        var voteUp = 0;
        var voteDown = 0;
        if (vote == 1) {
            voteUp = 1;
        } else {
            voteDown = 1;
        }

        $http.post('process_vote_two.php', {
                voteUp: voteUp,
                voteDown: voteDown,
                idOfPost: element.target.parentElement.id
            }).then(function successCallback(response) {
                    console.log(response);
                if(response.data.status == "success"){
                    if (vote == 1) {
                        element.currentTarget.children[0].innerHTML = response.data.totalVotesUp;
                        element.currentTarget.nextSibling.innerHTML = response.data.totalVotesDown;
                    } else if (vote == 0) {
                        element.currentTarget.children[0].innerHTML = response.data.totalVotesDown;
                        element.currentTarget.previousSibling.innerHTML = response.data.totalVotesUp;
                    }
                }
            },
            function errorCallback(response) {
                console.log(response);
            });

}

});
