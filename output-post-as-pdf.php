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
		// admin_assets設定
		if ($pagenow === "post.php") add_action('admin_enqueue_scripts', array($this, "init_admin_assets"));
		// postにボタン反映
		include_once("init-post-action.php");

		add_action('wp_enqueue_scripts', array($this, "init_post_assets"));
	}

	public function init_admin_assets() {
		wp_enqueue_script("script", plugins_url("assets/dist/js/Field.js", __FILE__));
		wp_enqueue_style("style", plugins_url("assets/dist/css/style.css", __FILE__));
	}

	public function init_post_assets() {
		// wp_enqueue_style("style", plugins_url("assets/dist/css/post.css", __FILE__));
		wp_enqueue_style("layout", plugins_url("assets/dist/css/layout.css", __FILE__));
	}
}

$output_post_as_pdf = new Output_post_as_pdf;
?>
