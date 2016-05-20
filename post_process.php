<?php
	require_once 'includes/db_connected.php';
	
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
		exit;
	}

	DB::insert('posts', array(
		'username' => $_SESSION['username'],
		'postText' => $_POST['post_text']
		));

	// $posts = array_reverse($posts);
	header("Location: index.php?post=success");

?>