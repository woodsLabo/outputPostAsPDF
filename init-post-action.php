<?php
/*
投稿画面にボタンを表示
管理画面でpdf出力を選択時に動作
*/
function init_post_action($content) {
	$post_id = get_the_ID();
	$select_radio = get_post_meta($post_id, "select_radio", true);

	$el = "" ;
	if ($select_radio == 1) {
		// TODO : button文言fix時に対応
		$el = <<<EOM
			<div class="opap__wrap">
				<form action="" method="post"><button class="opap__button">PDF化</button></form>
			</div>
		EOM;
	}
	return "{$content}{$el}";
}

add_filter("the_content", "init_post_action");
?>
