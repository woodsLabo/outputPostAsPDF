<?php
/*
Plugin Name: output post as pdf
Description: 投稿をpdf化しダウンロードするプラグイン
Author: woodsLabo
Version: 1.0
Author URI: https://woodslabo.com
 */

// plugin version
define("OPAP_VERSION", "1.0");

class Output_post_as_pdf {
	public function __construct() {
		global $pagenow;
		// 投稿画面にカスタムフィールドのエリア設定
		include_once("init-admin-field.php");
		// カスタムフィールド設定
		include_once("create-output-field.php");
		// assets設定
		if ($pagenow === "post.php") add_action('admin_enqueue_scripts', array($this, "init_plugin_assets"));
	}

	public function init_plugin_assets() {
		wp_enqueue_script("script", plugins_url("assets/src/js/Field.js", __FILE__));
	}
}

$output_post_as_pdf = new Output_post_as_pdf;
?>
