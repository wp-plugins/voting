<?php

function voting_themes_flat($postid)
	{

		
		$voting_bg_color = get_option( 'voting_bg_color' );
		$voting_lmit = get_option( 'voting_lmit' );
		


		$voting_upvote = get_post_meta( $postid, 'voting_upvote', true );
		$voting_downvote = get_post_meta( $postid, 'voting_downvote', true );
		$count = $voting_upvote - $voting_downvote;


		$voting_display = "";
		$voting_display .= '<style type="text/css">

		</style>';
		
		$voting_display .= '<div class="voting-flat" style="background:'.$voting_bg_color.';">';
		
		$voting_display .= '
			<div class="voting voting'.$postid.'" >
				<a class="upvote" data-id="'.$postid.'" limit="'.$voting_lmit.'"></a>
				<span class="count">'.$count.'</span>
				<a class="downvote" data-id="'.$postid.'" limit="'.$voting_lmit.'"></a>
			</div>';		
		
		$voting_display .= '</div>';
		
	
		
		
		
		return $voting_display;
		
	}
	
	
	
	
	
