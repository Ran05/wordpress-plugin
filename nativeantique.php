<?php

/**
 * @package nativeAntique
 * @version 1.0.0
 */
 /*
 Plugin Name: nativeAntique PLugin
 Description: This is a nativeAntique wordpress plugin 
 Author: RanProgramming
 Author URI: https://github.com/Ran05
 Version: 1.0.0
 License: GPLv2 or later
 Text Domain: nativeAntique-plugin
 */


defined('ABSPATH') or die('You are not in wordpress.');

class nativeAntiquePlugin{

//=======start my method here===//


function register(){
    //for javascript
    add_action('admin_enqueue_scripts',array($this,'enqueue'));
}

function __construct(){
    add_action('init', array($this,'custom_post_type'));
}

function activate(){

    $this->custom_post_type();

    //to refresh database
    flush_rewrite_rules();      
}

function deactivate(){
    
    flush_rewrite_rules();    
}


function uninstall(){

    
    
}

function custom_post_type(){
    
//add custom post type
register_post_type('Products',['public' => true, 'labels' => array('name' =>__('Products'),
 'singular_name'=> __('Products'),'add new item' => __('Add new Products'), 'add_new' =>__('Add Products'))]);

}//=======End of Method here=====//



function enqueue(){
    wp_enqueue_style('nativeantique', plugins_url('/assets/style.css', __FILE__));
    wp_enqueue_script('nativeantique', plugins_url('/assets/custom.js', __FILE__));

    
}


}//end of class



//for security

if(class_exists('nativeAntiquePlugin')){
    $nativeAntique = new nativeAntiquePlugin();
    $nativeAntique->register();     

}

//activate plugin

register_activation_hook(__FILE__, array($nativeAntique, 'activate'));

//deactivate plugin

register_deactivation_hook(__FILE__, array($nativeAntique, 'deactivate'));

//uninstall 

register_uninstall_hook(__FILE__, array($nativeAntique, 'uninstall'));