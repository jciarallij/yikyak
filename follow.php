<?php
	require_once 'includes/db_connected.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';


	//See Meekrodb for queryOneColumn syntax. It will remove the array inside array and just return a single field (parameter one) in an array. This will give us a list of arrays
	$following_array = DB::queryOneColumn('poster', "SELECT poster FROM following WHERE follower = %s", $_SESSION['username']);

	//Implode will take an array and turn it into a string. It will separate the elements in the array by whatever parameter comes first. In this example, it will break up the array by commas. Explode does exactly the opposite. It takes a string and turns it into an array. 
	//We need a string of items to pass to our "NOT IN" query. With the help of implode, we have it.
	$people_user_is_following_as_string = implode("','",$following_array);

	//Now, we can write a query that will get all the usernames in the user table that are not in the "people_user_is_following_as_string" we made above. we use the "NOT IN" 
	$not_following_array = DB::queryOneColumn('username', "SELECT username FROM users 
		WHERE username != %s 
			AND username NOT IN ('" . $people_user_is_following_as_string. "' )", $_SESSION['username']);

?>

<div id="follow" class="wrapper container" ng-controller="mdController">
<div class="container">
	<div class="row">
		<h3>Users you are following</h3>
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
				<?php foreach($following_array as $user): ?>
					<div class="col-sm-8"><?php print $user; ?></div>
					<div class="col-sm-4"><button ng-click="follow('<?php print $user;?>', 'unfollow')" class="btn btn-danger">Unfollow</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<h3>Users you are not following</h3>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
				<?php foreach($not_following_array as $user): ?>
					<div class="col-sm-8"><?php print $user; ?></div>
					<div class="col-sm-4"><button ng-click="follow('<?php print $user;?>','follow')" class="btn btn-primary">Follow</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>
</div>



