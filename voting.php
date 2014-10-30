<?php
/*
Plugin Name: Voting
Plugin URI: 
Description: Fully responsive and mobile ready meet the voting showcase plugin for wordpress.
Version: 1.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit; // exit if direct access.

define('voting_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('voting_plugin_dir', plugin_dir_path( __FILE__ ) );
define('voting_wp_url', '' );
define('voting_pro_url', '' );
define('voting_demo_url', '' );
define('voting_conatct_url', '' );
define('voting_qa_url', 'http://paratheme.com/qa/' );
define('voting_plugin_name', 'Voting' );
define('voting_share_url', '' );




require_once( plugin_dir_path( __FILE__ ) . 'includes/voting-functions.php');



//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');




function voting_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('voting_js', plugins_url( '/js/voting-scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('voting_js', 'voting_ajax', array( 'voting_ajaxurl' => admin_url( 'admin-ajax.php')));

		wp_enqueue_style('voting-css', voting_plugin_url.'css/voting-style.css');
		wp_enqueue_style('voting-admin', voting_plugin_url.'css/voting-admin.css');
		
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'voting-color-picker', plugins_url('/js/voting-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('voting-style-flat', voting_plugin_url.'themes/flat/style.css');
		

		
	}
add_action("init","voting_init_scripts");




register_activation_hook(__FILE__, 'voting_activation');
register_uninstall_hook(__FILE__, 'voting_uninstall');

function voting_activation(){
		$voting_version= "1.0";
		update_option('voting_version', $voting_version); //update plugin version.
		
		$voting_customer_type= "free"; //customer_type "free"
		update_option('voting_customer_type', $voting_customer_type); //update plugin customer type.
	}




function voting_uninstall()
	{
		delete_option( 'voting_version' ); //delete option from database.
		delete_option( 'voting_customer_type' ); //delete option from database.
		delete_option( 'voting_enable' ); //delete option from database.
		delete_option( 'voting_themes' ); //delete option from database.
		delete_option( 'voting_posttype' ); //delete option from database.	
	
	}






add_action('admin_menu', 'voting_menu_init');



function voting_menu_help(){
	include('voting-help.php');	
	}


function voting_menu_settings(){
	include('voting-settings.php');	
	}



function voting_menu_init() {
	add_menu_page(__('voting','voting'), __('Voting','voting'), 'manage_options', 'voting_menu_settings', 'voting_menu_settings');
	
	add_submenu_page('voting_menu_settings', __('Help & Upgrade','menu-voting'), __('Help & Upgrade','menu-voting'), 'manage_options', 'voting_menu_help', 'voting_menu_help');
	
	
	
	}















function voting_display($content){

	$voting_enable = get_option( 'voting_enable' );
	
	if($voting_enable=="yes"){
																			
		$voting_posttype = get_option( 'voting_posttype' );

		if($voting_posttype==NULL)
			{
				$type ="none";
			}
		else
			{
				$type = "";
			foreach ( $voting_posttype as  $post_type => $post_type_value )
				{
			
				$type .= $post_type.",";
				}
			}
	
	
	
	
	
	
		if ( is_singular(explode(',',$type))) 
			{	
	
				$voting_themes = get_option( 'voting_themes' );
				
				$voting_display = '';
				$voting_display .= $content;
	
				$voting_display .= '<div class="voting-container">';
				
				if($voting_themes== "flat")
					{
						$voting_display.= voting_themes_flat(get_the_ID());
					}
			
			
			
				$voting_display .='</div>';
				
				
				
				return $voting_display;
			
			}
		else
			{
				return $content;
			}
		
		}
	else
		{
			return $content;
		}
	


	
	

}


add_filter('the_content', 'voting_display');


















?>