<?php
/**
 * Plugin Name: Alert Box Block
 * Description: Provide contextual feedback messages with alert box block
 * Version: 1.1.0
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: alert-box-block
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'ABB_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.1.0' );
define( 'ABB_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'ABB_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once ABB_DIR_PATH . 'inc/block.php';