<?php
	$list = [$admin_field->input_list_01, $admin_field->input_list_02, $admin_field->input_list_03, $admin_field->input_list_04, $admin_field->input_list_05, $admin_field->input_list_06, $admin_field->input_list_07, $admin_field->input_list_08, $admin_field->input_list_09, $admin_field->input_list_10];
?>
<p class="field_title">PDF出力</p>
<label for="output_pdf_true">する</label>
<input id="select_output_pdf" type="radio" name="select_radio" class="js-selectOutput" value="1" <?php if ($admin_field->select_radio == 1) echo "checked"; ?>>
<label for="output_pdf_false">しない</label>
<input id="output_pdf_false" type="radio" name="select_radio" class="js-selectOutput" value="2" <?php if ($admin_field->select_radio == 2 || empty($admin_field->select_radio)) echo "checked"; ?>>
<p class="field_title">PDFタイプ</p>
<label for="select_pdf_true_a">Aタイプ</label>
<input id="select_pdf_type_a" type="radio" name="pdf_type" value="a" <?php if ($admin_field->pdf_type == "a" || empty($admin_field->pdf_type)) echo "checked"; ?>>
<label for="select_pdf_type_b">Bタイプ</label>
<input id="select_pdf_type_b" type="radio" name="pdf_type" value="b" <?php if ($admin_field->pdf_type == "b") echo "checked"; ?>>

<div class="field_wrap js-field" <?php if ($admin_field->select_radio == 2 || empty($admin_field->select_radio)) echo "style='display: none'" ?>>
	<p class=field_title>ダウンロードファイル名</p>
	<input type="text" class="input_file_name" name="input_file_name" value="<?= $admin_field->input_file_name; ?>">
	<p class=field_title>タイトル</p>
	<input type="text" class="input_title" name="input_title" value="<?= $admin_field->input_title; ?>">
	<p class=field_title>サブキャッチコピー</p>
	<input type="text" class="input_sub_catch" name="input_sub_catch" value="<?= $admin_field->input_sub_catch; ?>">
	<p class=field_title>メインキャッチコピー</p>
	<textarea class="input_main_catch has_tinymce" name="input_main_catch"><?= $admin_field->input_main_catch; ?></textarea>
	<p class=field_title>注目テキスト</p>
	<textarea class="input_notice_text has_tinymce" name="input_notice_text"><?= $admin_field->input_notice_text; ?></textarea>
	<p class=field_title>メイン画像</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->main_media; ?>" alt="" class="js-settingImage field_image">
		<input type="hidden" name="main_media" class="js-hiddenImageUrl" value="<?= $admin_field->main_media; ?>">
		<div class="field_button_wrap">
			<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
			<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
		</div>
	</div>

	<p class="field_title">開催日</p>
	<input type="date" name="input_detail_item_date" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_date; ?>">
	<p class="field_title">開催開始時間</p>
	<input type="time" name="input_detail_item_start_time" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_start_time; ?>">
	<p class="field_title">開催終了時間</p>
	<input type="time" name="input_detail_item_end_time" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_end_time; ?>">
	<p class="field_title">定員</p>
	<input type="number" name="input_detail_item_capacity" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_capacity; ?>">
	<p class="field_title">場所</p>
	<input type="text" name="input_detail_item_place" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_place; ?>">
	<p class="field_title">料金</p>
	<input type="number" name="input_detail_item_price" class="output_pdf_field_mid" value="<?= $admin_field->input_detail_item_price; ?>">

	<p class="field_title">リスト見出し</p>
	<input type="text" name="input_list_title" value="<?= $admin_field->input_list_title; ?>">
	<?php for($j = 0; $j < count($list); $j++) : ?>
		<?php $sumListIndex = $j + 1; ?>
		<p class="field_title">リスト<?= $sumListIndex ?></p>
		<?php $name = $sumListIndex !== 10 ? "input_list_0{$sumListIndex}" : "input_list_{$sumListIndex}" ?>
		<input type="text" name='<?= $name ?>' value="<?= $list[$j]; ?>">
	<?php endfor; ?>

	<p class="field_title">メッセージ</p>
	<textarea id="message" class="has_tinymce input_message" name="input_message"><?= $admin_field->input_message; ?></textarea>

	<p class="fieldt_title">セミナー案内テキスト</p>
	<input type="text" name="input_seminar_text" value="<?= $admin_field->input_seminar_text; ?>">
	<p class="fieldt_title">セミナー詳細url</p>
	<input type="url" name="input_seminar_url" value="<?= $admin_field->input_seminar_url; ?>">
	<p class="field_title">セミナー詳細QRコード</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->seminar_qr_media; ?>" alt="" class="js-settingImage field_image">
		<input type="hidden" name="seminar_qr_media" class="js-hiddenImageUrl" value="<?= $admin_field->seminar_qr_media; ?>">
		<div class="field_button_wrap">
			<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
			<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
		</div>
	</div>

	<p class="field_title">プロフィール画像</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->profile_media; ?>" alt="" class="js-settingImage field_image">
		<input type="hidden" name="profile_media" class="js-hiddenImageUrl" value="<?= $admin_field->profile_media; ?>">
		<div class="field_button_wrap">
			<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
			<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
		</div>
	</div>
	<p class="field_title">肩書き</p>
	<input type="text" name="input_profile_title" value="<?= $admin_field->input_profile_title; ?>">
	<p class="field_title">名前</p>
	<input type="text" name="input_profile_name" value="<?= $admin_field->input_profile_name; ?>">
	<p class="field_title">プロフィール</p>
	<textarea id="profile" class="has_tinymce input_profile" name="input_profile"><?= $admin_field->input_profile; ?></textarea>

	<p class="field_title">問い合わせ先名称</p>
	<input type="text" name="input_contact_company" value="<?= $admin_field->input_contact_company; ?>">
	<p class="field_title">問い合わせ先電話番号</p>
	<input type="tel" name="input_contact_tel" value="<?= $admin_field->input_contact_tel; ?>">
	<p class="field_title">問い合わせ先メールアドレス</p>
	<input type="email" name="input_contact_mail" value="<?= $admin_field->input_contact_mail; ?>">
</div>
