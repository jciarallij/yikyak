<?php
	session_start();
	if(!isset($_SESSION['username'])){
		print("notLoggedIn");
	} else {

	require_once 'includes/db_connected.php';
	$json_recieved = file_get_contents('php://input');
	$decoded_json = json_decode($json_recieved, true);
	$post_id = $decoded_json['idOfPost'];
	$vote_direction = $decoded_json['voteDirection'];

	$did_vote = DB::query("SELECT * FROM votes WHERE username = %s AND pid = %i", $_SESSION['username'], $post_id);

	if(DB::count() != 0){
		// print 'Already Voted'; // Changing to a bootstrap popup
		exit;
	} else {

	DB::insert('votes', array(
		'username' => $_SESSION['username'],
		'vote_direction' => $vote_direction,
		'pid' => $post_id
	));

	$total_votes = DB::query("SELECT * FROM votes WHERE pid=".$post_id);

	$total_votes = DB::query("SELECT SUM(vote_direction) AS voteTotal FROM votes WHERE pid =".$post_id);

    print json_encode(intval($total_votes[0]['voteTotal']));

    	}
    }

?>