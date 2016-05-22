<?php
 session_start();
 $resp = [];
 $resp['status'] = 'success';

 if(!isset($_SESSION['username'])){
   // print("notLoggedIn");
   $resp['status'] = 'notLoggedIn';
 } else {

 require_once 'includes/db_connected.php';
 $json_recieved = file_get_contents('php://input');
 $decoded_json = json_decode($json_recieved, true);
 $post_id = $decoded_json['idOfPost'];
 $voteUp = $decoded_json['voteUp'];
 $voteDown = $decoded_json['voteDown'];

 $did_vote = DB::query("SELECT * FROM votes WHERE username = %s AND pid = %i", $_SESSION['username'], $post_id);

 if(DB::count() != 0){
   // print 'Already Voted'; // Changing to a bootstrap popup
   $resp['status'] = 'alreadyVoted';
   //exit;
 } else {

   DB::insert('votes', array(
   'username' => $_SESSION['username'],
   'voteUp' => $voteUp,
   'voteDown' => $voteDown,
   'pid' => $post_id
   ));

   //$total_votes = DB::query("SELECT * FROM votes WHERE pid=".$post_id);

   $total_votes = DB::query("SELECT SUM(voteUp) AS voteUpTotal, SUM(voteDown) AS voteDownTotal FROM votes WHERE pid = %i",$post_id);

   $resp['totalVotesUp'] = intval($total_votes[0]['voteUpTotal']);
   $resp['totalVotesDown'] = intval($total_votes[0]['voteDownTotal']);

   // print json_encode($resp);

     }
   }
   print json_encode($resp);
?>