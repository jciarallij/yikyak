<?php
	
	require_once 'includes/db_connected.php';
	if(!isset($_SESSION['username'])){
		print("notLoggedIn");
		exit;
	} else {

		$json_recieved = file_get_contents('php://input');
		$decoded_json = json_decode($json_recieved, true);
		$poster_username = $decoded_json['poster'];
		$followMethod = $decoded_json['followMethod'];

		if($followMethod == 'follow'){
			DB::insert('following',
				array(
					'follower'=> $_SESSION['username'],
					'poster'=> $poster_username
					)
				);
		}else if($followMethod == 'unfollow'){
			DB::delete('following', "follower=%s AND poster=%s", $_SESSION['username'], $poster_username );
		}

		print 'success';
    
    }
    

?>