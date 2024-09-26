<?php
include_once("action.php");

function init_post_action($content) {
	global $post;
	$select_radio = createMetaItem("select_radio");
	$pdf_type = createMetaItem("pdf_type");
	$file_name = createMetaItem("input_file_name");
	$title = createMetaItem("input_title");
	$main_catch = createMetaItem("input_main_catch");
	$sub_catch = createMetaItem("input_sub_catch");
	$notice_text = createMetaItem("input_notice_text");
	$main_media = createMetaItem("main_media");
	$datetime = createMetaItem("input_datetime");
	$detail_item_date = createMetaItem("input_detail_item_date");
	$detail_item_start_time = createMetaItem("input_detail_item_start_time");
	$detail_item_end_time = createMetaItem("input_detail_item_end_time");
	$detail_item_capacity = createMetaItem("input_detail_item_capacity");
	$detail_item_place = createMetaItem("input_detail_item_place");
	$detail_item_price = createMetaItem("input_detail_item_price");
	$detail_item_date = $detail_item_date ? $detail_item_date : "";
	$detail_item_start_time = $detail_item_start_time ? $detail_item_start_time : "";
	$detail_item_end_time = $detail_item_end_time ? $detail_item_end_time : "";
	$detail_item_capacity = $detail_item_capacity ? $detail_item_capacity : "";
	$detail_item_place = $detail_item_place ? $detail_item_place : "";
	$detail_item_price = $detail_item_price ? number_format($detail_item_price) : "";
	$str_time = date("n月j日", strtotime($detail_item_date));
	$date = date('w', strtotime($detail_item_date));
	$week = ["日", "月", "火", "水", "木", "金", "土"];
	$list_title = createMetaItem("input_list_title");
	$list_01 = createMetaItem("input_list_01");
	$list_02 = createMetaItem("input_list_02");
	$list_03 = createMetaItem("input_list_03");
	$list_04 = createMetaItem("input_list_04");
	$list_05 = createMetaItem("input_list_05");
	$list_06 = createMetaItem("input_list_06");
	$list_07 = createMetaItem("input_list_07");
	$list_08 = createMetaItem("input_list_08");
	$list_09 = createMetaItem("input_list_09");
	$list_10 = createMetaItem("input_list_10");
	$list_01 = $list_01 ? $list_01 : "";
	$list_02 = $list_02 ? $list_02 : "";
	$list_03 = $list_03 ? $list_03 : "";
	$list_04 = $list_04 ? $list_04 : "";
	$list_05 = $list_05 ? $list_05 : "";
	$list_06 = $list_06 ? $list_06 : "";
	$list_07 = $list_07 ? $list_07 : "";
	$list_08 = $list_08 ? $list_08 : "";
	$list_09 = $list_09 ? $list_09 : "";
	$list_10 = $list_10 ? $list_10 : "";
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
	$post_id = $post->ID;

	$el = "" ;
	if ($select_radio == 1) {
		$el = <<<EOM
		<div class="opap__wrap">
			<p>タイプを選択</p>
			<input class="types" type="radio" name="type" id="type1" value="a" checked><label for="type1">タイプ1</label>
			<input class="types" type="radio" name="type" id="type2" value="b"><label for="type2">タイプ2</label>
			<p>タイトル</p>
			<input type="text" class="title" name="title" placeholder="タイトルを入力">
			<p>メインキャッチ</p>
			<input class="main_catch" type="text" name="main_catch" placeholder="キャッチコピーを入力">
			<p>サブキャッチ</p>
			<input class="sub_catch" type="text" name="sub_catch" placeholder="キャッチコピー上部に表示するテキストを入力">
			<p>注目テキスト</p>
			<textarea id="" class="notice_text" name="notice_text" cols="30" rows="10" placeholder="先着&#13;&#10;お申し込み&#13;&#10;x名限定"></textarea>
			<p>開催日</p>
			<input class="detail_item_date" type="date" name="detail_item_date">
			<p>開催開始時間</p>
			<input class="detail_item_start_time" type="time" name="detail_item_start_time">
			<p>開催終了時間</p>
			<input class="detail_item_end_time" type="time" name="detail_item_end_time">
			<p>定員</p>
			<input class="detail_item_capacity" type="number" name="detail_item_capacity">
			<p>場所</p>
			<input class="detail_item_place" type="text" name="detail_item_place" placeholder="開催場所を入力">
			<p>料金</p>
			<input class="detail_item_price" type="text" name="detail_item_price" placeholder="カンマと単位不要で数値のみ入力">
			<p>リスト見出し</p>
			<input class="list_title" type="text" name="list_title" value="">
			<p>リスト1</p>
			<input class="list list_01" type="text" name="list_01">
			<p>リスト2</p>
			<input class="list list_02" type="text" name="list_02">
			<p>リスト3</p>
			<input class="list list_03" type="text" name="list_03">
			<p>リスト4</p>
			<input class="list list_04" type="text" name="list_04">
			<p>リスト5</p>
			<input class="list list_05" type="text" name="list_05">
			<p>リスト6</p>
			<input class="list list_06" type="text" name="list_06">
			<p class="list_status">リスト7</p>
			<input class="list list_07" type="text" name="list_07">
			<p class="list_status">リスト8</p>
			<input class="list list_08" type="text" name="list_08">
			<p class="list_status">リスト9</p>
			<input class="list list_09" type="text" name="list_09">
			<p class="list_status">リスト10</p>
			<input class="list list_10" type="text" name="list_10">
			<p>メッセージ</p>
			<textarea class="message" id="" name="message" cols="30" rows="10"></textarea>
			<p>セミナー案内</p>
			<input class="seminar_text" type="text" name="seminar_text" value="">
			<p>セミナーurl</p>
			<input class="seminar_url" type="text" name="seminar_url" value="">
			<p>QRコード</p>
			<input type="file" accept="image/*" class="qr_image" name="seminar_qr" style="display: none"><button class="qr_image_select" type="button">画像を選択</button><button class="qr_image_delete" type="button">削除</button>
			<div class="qr_preview"></div>
			<p>プロフィール画像<span class="label_notice">横幅150px 高さ200px推奨</span></p>
			<input type="file" accept="image/*" class="profile_image" name="profile_img" style="display: none;"><button class="profile_image_select" type="button">画像を選択</button><button class="profile_image_delete" type="button">削除</button>
			<div class="profile_preview"></div>
			<p>肩書き</p>
			<input class="profile_title" type="text" name="profile_title" value="">
			<p>名前</p>
			<input class="profile_name" type="text" name="profile_name" value="">
			<p>プロフィール</p>
			<textarea class="profile_text" id="" name="profile_text" cols="30" rows="10"></textarea>
			<p>問い合わせ先名称</p>
			<input class="contact_company" type="text" name="contact_company" value="">
			<p>問い合わせ先電話番号</p>
			<input class="contact_tel" type="tel" name="contact_tel" value="">
			<p>問い合わせ先メールアドレス</p>
			<input class="contact_mail" type="email" name="contact_mail" value="">
			<form action="" target="_blonk" method="post" class="opap_form">
				<input type="hidden" name="dw" value="true">
				<input type="hidden" class="opap_pdf_type" name="pdf_type" value="$pdf_type">
				<input type="hidden" name="file_name" value="$file_name">
				<input type="hidden" class="opap_title" name="title" value="">
				<input type="hidden" class="opap_sub_catch" name="sub_catch" value="">
				<input type="hidden" class="opap_main_catch" name="main_catch" value="">
				<input type="hidden" class="opap_notice_text" name="notice_text" value="">
				<input type="hidden" class="opap_main_media" name="main_media" value="">
				<input type="hidden" class="opap_detail_item_date" name="detail_item_date" value="">
				<input type="hidden" class="opap_detail_item_start_time" name="detail_item_start_time" value="">
				<input type="hidden" class="opap_detail_item_end_time" name="detail_item_end_time" value="">
				<input type="hidden" class="opap_detail_item_capacity" name="detail_item_capacity" value="">
				<input type="hidden" class="opap_detail_item_place" name="detail_item_place" value="">
				<input type="hidden" class="opap_detail_item_price" name="detail_item_price" value="">
				<input type="hidden" class="opap_list_title" name="list_title" value="">
				<input type="hidden" class="opap_list_01" name="list_01" value="">
				<input type="hidden" class="opap_list_02" name="list_02" value="">
				<input type="hidden" class="opap_list_03" name="list_03" value="">
				<input type="hidden" class="opap_list_04" name="list_04" value="">
				<input type="hidden" class="opap_list_05" name="list_05" value="">
				<input type="hidden" class="opap_list_06" name="list_06" value="">
				<input type="hidden" class="opap_list_07" name="list_07" value="">
				<input type="hidden" class="opap_list_08" name="list_08" value="">
				<input type="hidden" class="opap_list_09" name="list_09" value="">
				<input type="hidden" class="opap_list_10" name="list_10" value="">
				<input type="hidden" class="opap_message" name="message" value="">
				<input type="hidden" class="opap_seminar_text" name="seminar_text" value="">
				<input type="hidden" class="opap_seminar_url" name="seminar_url" value="">
				<input type="hidden" class="opap_qr_img" name="seminar_qr" value="">
				<input type="hidden" class="opap_profile_img" name="profile_img" value="">
				<input type="hidden" class="opap_profile_title" name="profile_title" value="">
				<input type="hidden" class="opap_profile_name" name="profile_name" value="">
				<input type="hidden" class="opap_profile_text" name="profile_text" value="">
				<input type="hidden" class="opap_contact_company" name="contact_company" value="">
				<input type="hidden" class="opap_contact_tel" name="contact_tel" value="">
				<input type="hidden" class="opap_contact_mail" name="contact_mail" value="">
				<input type="hidden" name="post_id" value="$post_id">
				<div class="opap_button_wrap">
					<button class="form_preview" name="dl_type" value="preview">プレビュー</button>
					<span class="form_reset js-reset-form-bt">全ての入力をリセット</span>
					<button class="form_dl" name="dl_type" value="dl">PDF化</button>
				</div>
			</form>
		</div>
		EOM;
	}
	return $el;
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
