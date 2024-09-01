<?php
// 投稿画面に入力用フィールドの枠設置
	function init_admin_field() {
		add_meta_box(
			'custom_field',
			'PDF出力',
			'custom_fields_form',
			'news',
			'normal',
			'default'
		);
	}

	add_action('admin_menu', "init_admin_field");
?>
