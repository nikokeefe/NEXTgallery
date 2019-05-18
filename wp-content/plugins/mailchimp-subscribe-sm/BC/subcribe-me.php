<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

include 'config.php';
include 'ssm_cs_post_type.php';
include 'ssm_cs_scripts.php';
include 'ssm_meta_boxes.php';
include 'ssm_menu_pages.php';
include 'ssm_wp_ajax.php';
include 'ssm_wp_widgets.php';
//include 'Ask-Rev.php';
include 'admin-class.php';



function ssmf_plugin_redirect_activation() {
if (get_option('ssmf_plugin_activation_check_option', false)) {
    delete_option('ssmf_plugin_activation_check_option');
    if(!isset($_GET['activate-multi']))
    {
        wp_redirect("edit.php?post_type=subscribe_me_forms&page=ssm_dashboard");
        exit();
    }
 }
}


$MSFSMAdminClass = new MSFSM_AdminClass();

  ?>