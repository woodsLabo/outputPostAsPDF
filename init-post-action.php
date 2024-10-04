<?php
include_once("action.php");

function init_post_action($content) {
	$bg_image01 = get_option("main_media01");
	$bg_image02 = get_option("main_media02");
	$bg_image03 = get_option("main_media03");
	$bg_image04 = get_option("main_media04");
	$bg_image05 = get_option("main_media05");

	$file_name = "pdf";
	$post_label = "pdf_post";

	$el = "" ;
	$el = <<<EOM
		<div class="opap__wrap">
			<p>PDFのタイプを選択</p>
			<input class="pdf_types" type="radio" name="pdf_type" id="type1" value="a" checked><label for="type1">タイプ1</label>
			<input class="pdf_types" type="radio" name="pdf_type" id="type2" value="b"><label for="type2">タイプ2</label>
			<p>背景を選択</p>
			<div class="bg_type_wrap">
				<input class="bg_types" type="radio" name="bg_type" id="bg_type1" value="$bg_image01" checked><label for="bg_type1">タイプ1</label>
				<input class="bg_types" type="radio" name="bg_type" id="bg_type2" value="$bg_image02"><label for="bg_type2">タイプ2</label>
				<input class="bg_types" type="radio" name="bg_type" id="bg_type3" value="$bg_image03"><label for="bg_type3">タイプ3</label>
				<input class="bg_types" type="radio" name="bg_type" id="bg_type4" value="$bg_image04"><label for="bg_type4">タイプ4</label>
				<input class="bg_types" type="radio" name="bg_type" id="bg_type5" value="$bg_image05"><label for="bg_type5">タイプ5</label>
			</div>
			<p>背景をアップロード</p>
			<input type="file" accept="image/*" class="bg_image" name="bg_image" style="display: none"><button class="bg_image_select" type="button">画像を選択</button><button class="bg_image_delete" type="button">削除</button>
			<div class="title_wrap">
				<input type="text" class="title" name="title" placeholder="タイトルを入力" style="text-align: center;" maxlength=44>
			</div>
			<div class="bg_img_wrap">
				<div class="bg_preview"><img src="" class="bg_setting_image"></div>
				<div class="sub_wrap">
					<input class="sub_catch" type="text" name="sub_catch" placeholder="キャッチコピー上部に表示するテキストを入力" maxlength="36">
				</div>
				<div class="main_wrap">
					<textarea class="main_catch" name="main_catch" placeholder="キャッチコピーを入力" rows="3"></textarea>
					<textarea id="" class="notice_text" name="notice_text" cols="5" rows="3" placeholder="先着&#13;&#10;お申し込み&#13;&#10;x名限定"></textarea>
				</div>
			</div>
			<div class="date_wrap">
				<p>開催日時</p>
				<input class="detail_item_date" type="date" name="detail_item_date">
				<input class="detail_item_start_time" type="time" name="detail_item_start_time">〜<input class="detail_item_end_time" type="time" name="detail_item_end_time">
				<p>定員</p>
				<input class="detail_item_capacity" type="number" name="detail_item_capacity">
				<p>場所</p>
				<input class="detail_item_place" type="text" name="detail_item_place" placeholder="開催場所を入力">
				<p>料金</p>
				<input class="detail_item_price" type="number" name="detail_item_price" placeholder="数値のみ">
			</div>
			<div class="list_wrap">
				<input class="list_title" type="text" name="list_title" value="" placeholder="リストの見出し">
				<div class="list_text_wrap">
					<input class="list list_01" type="text" name="list_01">
					<input class="list list_02" type="text" name="list_02">
					<input class="list list_03" type="text" name="list_03">
					<input class="list list_04" type="text" name="list_04">
					<input class="list list_05" type="text" name="list_05">
					<input class="list list_06" type="text" name="list_06">
					<input class="list list_07" type="text" name="list_07">
					<input class="list list_08" type="text" name="list_08">
					<input class="list list_09" type="text" name="list_09">
					<input class="list list_10" type="text" name="list_10">
				</div>
			</div>
			<textarea class="message" id="" name="message" cols="30" rows="4" placeholder="リストの下に表示するテキストを入力"></textarea>
			<div class="seminar_wrap">
				<input class="seminar_text" type="text" name="seminar_text" placeholder="セミナー案内のテキスト" value="">
				<input class="seminar_url" type="text" name="seminar_url" placeholder="セミナーのurl" value="">
				<div class="qr_wrap">
					<p class="qr_title">QRコード</p>
					<div class="qr_preview"></div>
					<div class="qr_btn_wrap">
						<input type="file" accept="image/*" class="qr_image" name="seminar_qr" style="display: none"><button class="qr_image_select" type="button">画像を選択</button><button class="qr_image_delete" type="button">削除</button>
					</div>

				</div>
			</div>
			<div class="profile_wrap">
				<div class="profile_image_wrap">
					<p>プロフィール画像<span class="label_notice">横幅150px<br>高さ200px推奨</span></p>
					<input type="file" accept="image/*" class="profile_image" name="profile_img" style="display: none;"><button class="profile_image_select" type="button">画像を選択</button><button class="profile_image_delete" type="button">削除</button>
					<div class="profile_preview"></div>
				</div>
				<div class="profile_detail_wrap">
					<input class="profile_title" type="text" name="profile_title" placeholder="社名や肩書きを記入" value="">
					<input class="profile_name" type="text" name="profile_name" placeholder="名前を入力" value="">
					<textarea class="profile_text" id="" name="profile_text" cols="30" rows="5" placeholder="プロフィールを記入"></textarea>
				</div>
			</div>
			<div class="contact_wrap">
				<input class="contact_company" type="text" name="contact_company" placeholder="問い合わせ先名称" value="">
				<input class="contact_tel" type="tel" name="contact_tel" placeholder="問い合わせTEL" value="">
				<input class="contact_mail" type="email" name="contact_mail" placeholder="問い合わせmail" value="">
			</div>
			<form action="" target="_blonk" method="post" class="opap_form">
				<input type="hidden" name="dw" value="true">
				<input type="hidden" class="opap_pdf_type" name="pdf_type" value="">
				<input type="hidden" class="opap_bg_type" name="bg_type" value="">
				<input type="hidden" class="opap_bg_img" name="bg_img" value="">
				<input type="hidden" class="opap_bg_setting_img" name="bg_setting_img" value="">
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
				<input type="hidden" name="post_label" value="$post_label">
				<div class="opap_button_wrap">
					<button class="form_preview" name="dl_type" value="preview">プレビュー</button>
					<span class="form_reset js-reset-form-bt">全ての入力をリセット</span>
					<button class="form_dl" name="dl_type" value="dl">PDF化</button>
				</div>
			</form>
		</div>
EOM;
	return $el;
}

add_shortcode("create_pdf", "init_post_action");
?>
