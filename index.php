<?php
	require_once 'includes/db_connected.php';
	require_once 'includes/head.php';
	require_once 'includes/header.php';
	require_once 'includes/footer.php';
	$posts = DB::query("SELECT * FROM posts");
	$posts = array_reverse($posts);
	date_default_timezone_set("America/New_York");

	$all_posts = DB::query("SELECT posts.*,
		COALESCE(SUM(votes.voteUp), 0) as totalVotesUp,
		COALESCE(SUM(votes.voteDown), 0) as totalVotesDown
		FROM posts
		LEFT JOIN votes ON posts.id = votes.pid
		GROUP BY posts.id;");


?>

<div id="main-wrapper" class="container">
	<div id="index-wrapper">
	    <div id="yak-section">
	        <h1 id="topic-title">Million Dollars, But... $?$!$</h1>
	    </div>
		{{message}}
	    <div id="message-title">
	    	<div id="topic-image">
	    		<h2 class="title-post">Million Dollar, But... The Game!</h2>
	    	</div>
	    	<div class="rules">
	    		<p>Million Dollars, But... is an ongoing show by <a href="http://www.roosterteeth.com">Rooster Teeth Productions</a> that is based off the hypothetical question, "What would you do for a million dollars?" In each episode the three hosts each provide their own hypothetical question of, "You get a million dollars, but..." with live action skits being performed of their questions and answers.</p>
	    		<p>Example: You get a Million Dollars, But... Everytime you hear the doorbell you will bark like a dog
	    		for 10 seconds. Use the <span class="fa fa-arrow-up no-post"></span> arrows or <span class="fa fa-arrow-down no-post"></span> arrows to vote on someone's scenario if you take the money or not! Let's have some fun!</p>
	    	</div>
	    </div>

	    

	    <div id="post-area" class="container">
			<?php if(isset($_SESSION['username'])): ?>
				<form action="post_process.php" method="post">
					<div class="form-group">
						<label class="post-text-title" for="post-text">Your Million Dollar, But... Message...</label>
						<textarea maxlength="255" class="col-sm-6" id="post-text" name="post_text"></textarea>
					</div>
					<button type="submit" class="btn btn-primary post-btn">Post</button>
				</form>
			<?php else: ?>
				<h5> You must be <a href="login.php">Logged in</a> to make a post</h5>
			<?php endif ?>
	        
		</div>
		<h3>Recent posts</h3>
		<?php foreach($all_posts as $post): 




		$time_stamp_unix = strtotime($post['timestamp']);


		?>
		
		
		<div class="container">
			<div id="row">
				<div class="post col-sm-11 panel">
					<div class="user-img"><img src="img/thumbnail.jpg"></div>
					<div class="user"><h5><?php print $post['username']; ?></h5></div>
					<div class="text"><p><span class="fa fa-money"></span> You get 1 million dollars, but... </p><?php print $post['postText']; ?></div>
					<div class="date">Posted: <?php print date("D F j, Y -  h:ia", $time_stamp_unix); ?> By:<span class="user-post"> <?php print $post['username']; ?></span></div>
					
					<div id="<?php print $post['id']; ?>" class="arrow-up" ng-click="processVote($event, 1)">
						
						<p class="vote"><?php print $post['totalVotesUp']; ?></p>
						<span class="fa fa-arrow-up my-arrow"></span>


					</div>
					<div  id="<?php print $post['id']; ?>" class="arrow-down" ng-click="processVote($event, 0)">

						<p class="vote-two"><?php print $post['totalVotesDown']; ?></p>
						<span class="fa fa-arrow-down my-arrow"></span>

					</div>
				</div>	
			</div>

		</div>

		<?php endforeach; ?>
		<div id="follow" class="col-md-6 col-md-offset-1">
    		<h4>Posts From Million Dollar, But... Game!</h4>
    		<p style='font-style:italic;'>Sign up so you can follow your family & friends! Play Million Dollar, But... with!</p>
		</div>
	</div>
</div>

