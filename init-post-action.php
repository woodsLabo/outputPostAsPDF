<?php
/*
投稿画面にボタンを表示
管理画面でpdf出力を選択時に動作
*/
function init_post_action($content) {
	$select_radio = createMetaItem("select_radio");
	$main_catch = createMetaItem("input_main_catch");
	$sub_catch = createMetaItem("input_sub_catch");
	$notice_text = createMetaItem("input_notice_text");
	$bg = createMetaItem("bg_media");
	$datetime = createMetaItem("input_datetime");
	$detail_item_title_01 = createMetaItem("input_detail_item_title_01");
	$detail_item_title_02 = createMetaItem("input_detail_item_title_02");
	$detail_item_title_03 = createMetaItem("input_detail_item_title_03");
	$detail_item_title_04 = createMetaItem("input_detail_item_title_04");
	$detail_item_title_05 = createMetaItem("input_detail_item_title_05");
	$detail_item_title_01 = $detail_item_title_01 ? "<dt>{$detail_item_title_01}</dt>" : "";
	$detail_item_title_02 = $detail_item_title_02 ? "<dt>{$detail_item_title_02}</dt>" : "";
	$detail_item_title_03 = $detail_item_title_03 ? "<dt>{$detail_item_title_03}</dt>" : "";
	$detail_item_title_04 = $detail_item_title_04 ? "<dt>{$detail_item_title_04}</dt>" : "";
	$detail_item_title_05 = $detail_item_title_05 ? "<dt>{$detail_item_title_05}</dt>" : "";
	$detail_item_text_01 = createMetaItem("input_detail_item_text_01");
	$detail_item_text_02 = createMetaItem("input_detail_item_text_02");
	$detail_item_text_03 = createMetaItem("input_detail_item_text_03");
	$detail_item_text_04 = createMetaItem("input_detail_item_text_04");
	$detail_item_text_05 = createMetaItem("input_detail_item_text_05");
	$detail_item_text_01 = $detail_item_text_01 ? "<dd>{$detail_item_text_01}</dd>" : "";
	$detail_item_text_02 = $detail_item_text_02 ? "<dd>{$detail_item_text_02}</dd>" : "";
	$detail_item_text_03 = $detail_item_text_03 ? "<dd>{$detail_item_text_03}</dd>" : "";
	$detail_item_text_04 = $detail_item_text_04 ? "<dd>{$detail_item_text_04}</dd>" : "";
	$detail_item_text_05 = $detail_item_text_05 ? "<dd>{$detail_item_text_05}</dd>" : "";
	$list_title = createMetaItem("input_list_title");
	$list_01 = createMetaItem("input_list_01");
	$list_02 = createMetaItem("input_list_02");
	$list_03 = createMetaItem("input_list_03");
	$list_04 = createMetaItem("input_list_04");
	$list_05 = createMetaItem("input_list_05");
	$list_01 = $list_01 ? "<li>{$list_01}</li>" : "";
	$list_02 = $list_02 ? "<li>{$list_02}</li>" : "";
	$list_03 = $list_03 ? "<li>{$list_03}</li>" : "";
	$list_04 = $list_04 ? "<li>{$list_04}</li>" : "";
	$list_05 = $list_05 ? "<li>{$list_05}</li>" : "";
	$message = createMetaItem("input_message");
	$seminar_text = createMetaItem("input_seminar_text");
	$seminar_url = createMetaItem("input_seminar_url");
	$seminar_qr = createMetaItem("seminar_qr_media");
	$profile_img = createMetaItem("profile_media");
	$profile_title = createMetaItem("input_profile_title");
	$profile_name = createMetaItem("input_profile_name");
	$profile_text = createMetaItem("input_profile");
	$contact_company = createMetaItem("input_contact_company");
	$contact_tel = createMetaItem("input_contact_tel");
	$contact_mail = createMetaItem("input_contact_mail");

	$el = "" ;
	if ($select_radio == 1) {
		// TODO : button文言fix時に対応
		$el = <<<EOM
			<header class="topSubTitle">$sub_catch</header>
			<div class="contentTop">
				<div class="titleWrap">
					<p class=""></p>
					<h2>$main_catch</h2>
				</div>
				<p class="limitCount">$notice_text</p>
				<p>$bg</p>
			</div>
			<div class="detailWrap">
				<dl>
					<dt>開催日時</dt>
					<dd>$datetime</dd>
				</dl>
				<dl>
					$detail_item_title_01
					$detail_item_text_01
					$detail_item_title_02
					$detail_item_text_02
					$detail_item_title_03
					$detail_item_text_03
					$detail_item_title_04
					$detail_item_text_04
					$detail_item_title_05
					$detail_item_text_05
				</dl>
			</div>
			<div class="listWrap">
				<p class="listTitle">$list_title</p>
				<ul>
					$list_01
					$list_02
					$list_03
					$list_04
					$list_05
				</ul>
			</div>
			<p class="message">$message</p>
			<div class="application">
				<div class="applicationTextWrap">
					<p class="applicationText">$seminar_text</p>
					<p class="applicationUrl">$seminar_url</p>
				</div>
				<div class="applicationImgWrap"><img src="$seminar_qr" alt=""></div>
			</div>
			<div class="profileWrap">
				<div class="profileImg"><img src="$profile_img" alt=""></div>
				<div class="profileDetail">
					<p class="profileTitle">$profile_title</p>
					<p class="profileName">$profile_name</p>
					<p class="profileText">$profile_text</p>
				</div>
			</div>
			<footer class="footer">
				<dl>
					<dt>お問い合わせ</dt>
					<dd>$contact_company</dd>
					<dt>TEL</dt>
					<dd>$contact_tel</dd>
					<dt>メールアドレス</dt>
					<dd>$contact_mail</dd>
				</dl>
			</footer>
			<div class="opap__wrap">
				<form action="" method="post"><button class="opap__button">PDF化</button></form>
			</div>
		EOM;
	}
	return "{$content}{$el}";
}

/*
	カスタムフィールドの値を取得
*/
function createMetaItem($field = false) {
	$post_id = get_the_ID();
	return get_post_meta($post_id, $field, true);
}

add_filter("the_content", "init_post_action");
?>
