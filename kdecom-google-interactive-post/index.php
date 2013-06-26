<?php
/*
 * Plugin Name: Kdecom Google Interactive Post
 * Plugin URI: http://www.kdecom.com
 * Description: Google plus Interactive post.
 * Version: 1.0
 * Author: Purvesh
 * Author URI: http://www.kdecom.com

  Copyright 2012  REV

 */

require_once 'include/kdecom.php';

$kdecom = new Kdecom();


add_filter('the_content', array($kdecom,'content_filter'));

add_action('admin_menu', array($kdecom,'add_global_options')); 

?>