<?php

if ( ! defined('ABSPATH')) exit; // exit if direct access.



function voting_ajax_result($input_color)
	{
		

		
		$votetype = $_POST['votetype'];
		$data_id = $_POST['data_id'];
		
		
		
	
		if(isset($_COOKIE['voting_limit'][$data_id]))
			{
				echo "You Voted";

				die();
			}
			
		
		
		
		
		
		
		
		if($votetype=='upvote')
			{
				
				$voting_upvote = get_post_meta( $data_id, 'voting_upvote', true );
				$voting_upvote += 1;
				update_post_meta( $data_id, 'voting_upvote', $voting_upvote );
				


			}
		else if($votetype=='downvote')
			{
				$voting_downvote = get_post_meta( $data_id, 'voting_downvote', true );
				$voting_downvote += 1;
				update_post_meta( $data_id, 'voting_downvote', $voting_downvote );
				


			}
			
		else
			{
			
			}
		
		
		$voting_upvote = get_post_meta( $data_id, 'voting_upvote', true );
		$voting_downvote = get_post_meta( $data_id, 'voting_downvote', true );
		$count = $voting_upvote - $voting_downvote;
		

		echo $count;
		

		
		
		

		die();
	}



add_action('wp_ajax_voting_ajax_result', 'voting_ajax_result');
add_action('wp_ajax_nopriv_voting_ajax_result', 'voting_ajax_result');



	
	


