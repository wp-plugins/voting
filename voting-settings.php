<?php	
/**
 * Social Share Button main setting page.
 *
 * @author 		ParaTheme
 * @version     1.0
 */
	if ( ! defined('ABSPATH')) exit; // exit if direct access.

	if(empty($_POST['voting_hidden']))
		{
			$voting_enable = get_option( 'voting_enable' );	
			$voting_lmit = get_option( 'voting_lmit' );				
			$voting_themes = get_option( 'voting_themes' );			
			$voting_bg_color = get_option( 'voting_bg_color' );
			$voting_posttype = get_option( 'voting_posttype' );					
			
		}
	else
		{
	
		if($_POST['voting_hidden'] == 'Y') {
			//Form data sent

			
			$voting_enable = $_POST['voting_enable'];
			update_option('voting_enable', $voting_enable);			

			$voting_lmit = $_POST['voting_lmit'];
			update_option('voting_lmit', $voting_lmit);
			
			$voting_themes = $_POST['voting_themes'];
			update_option('voting_themes', $voting_themes);	
			
			$voting_bg_color = $_POST['voting_bg_color'];
			update_option('voting_bg_color', $voting_bg_color);
			
			$voting_posttype = $_POST['voting_posttype'];
			update_option('voting_posttype', $voting_posttype);			
					

			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>

			<?php
		} 
	}
	
	
	


	
	
	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".voting_plugin_name." Settings</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="voting_hidden" value="Y">
        <?php settings_fields( 'voting_plugin_options' );
				do_settings_sections( 'voting_plugin_options' );
			
		?>
       
	<br />
	<div class="voting-settings">
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Voting Options</li>
            <li nav="2" class="nav2">Style</li>
            <li nav="3" class="nav3">Content</li>
        
        </ul>

        <ul class="box">
            <li style="display: block;" class="box1 tab-box active">
                <div class="option-box">
                    <p class="option-title">Voting Enable ?</p>
                    <p class="option-info">To display voting on post you need to enable first. you can disable any time if you don't want display voting under post.</p>
                    
                    <select name="voting_enable">
                        <option value="yes" <?php  if($voting_enable=='yes') echo "selected"; ?>>Yes</option>
                        <option value="no" <?php  if($voting_enable=='no') echo "selected"; ?>>No</option>
                       
                    </select>
                </div>




<div class="option-box">
                    <p class="option-title">Voting Unlmited ?</p>
                    <p class="option-info">Voting count unlmited</p>
                    
                    <select name="voting_lmit">
                        <option value="single" <?php  if($voting_lmit=='single') echo "selected"; ?>>Single</option>
                        <option value="unlimited" <?php  if($voting_lmit=='unlimited') echo "selected"; ?>>Unlimited</option>
                       
                    </select>
                </div>










				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Please report any issue via support forum <a href="#">wordpress.org &raquo; support</a>.</p>
                </div>




            </li>
            <li class="box2 tab-box">
				<div class="option-box">
                    <p class="option-title">voting Themes ?</p>
                    <p class="option-info">Choose different themes for voting which is suit your website template.</p>
                    
                    <select name="voting_themes">
                        <option value="flat" <?php  if($voting_themes=='flat') echo "selected"; ?>>Flat</option>
                       
                    </select>
                </div>
                
                
                
				<div class="option-box">
                    <p class="option-title">Background Color.</p>
                    <p class="option-info">Background color for voting area.</p>

			 <?php

                echo "<input  value='".$voting_bg_color."'    placeholder='#18c967' id='voting_bg_color' name='voting_bg_color'  type='text' />";            
            
            ?>






                </div>                
                

                
                
            </li>

            <li class="box3 tab-box">
				<div class="option-box">
                    <p class="option-title">Display share button On These Post Type Only.</p>
                    <p class="option-info">By choosing post type you can filter display share button only these post type.</p>
                    
                    <?php

					$post_types = get_post_types( '', 'names' ); 
					
					foreach ( $post_types as $post_type ) {
					
					   echo '<label for="voting_posttype['.$post_type.']"><input type="checkbox" name="voting_posttype['.$post_type.']" id="voting_posttype['.$post_type.']"  value ="1" '; 
					   if ( isset( $voting_posttype[$post_type] ) ) echo "checked"; 
					   echo' >'. $post_type.'</label><br />' ;
					}
					
					?>
                </div>
            </li>

</ul>







<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>
	</div>

</div>
