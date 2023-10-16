<p class="field_title">PDF出力</p>
<label for="output_pdf_true">する</label>
<input id="select_output_pdf" type="radio" name="select_radio" class="js-selectOutput" value="1" <?php if ($admin_field->select_radio == 1) echo "checked"; ?>>
<label for="output_pdf_false">しない</label>
<input id="output_pdf_false" type="radio" name="select_radio" class="js-selectOutput" value="2" <?php if ($admin_field->select_radio == 2 || empty($admin_field->select_radio)) echo "checked"; ?>>
<div class="field_wrap js-field" <?php if ($admin_field->select_radio == 2 || empty($admin_field->select_radio)) echo "style='display: none'" ?>>
	<p class=field_title>タイトル</p>
	<input type="text" class="input_title" name="input_title" cols="50" value="<?= $admin_field->input_title; ?>">
	<p class="field_title">メッセージ</p>
	<textarea id="message" class="input_message" name="input_message"><?= $admin_field->input_message; ?></textarea>
	<p class="field_title">セミナー内容</p>
	<textarea id="detail" class="has_tinymce input_detail" name="input_detail"><?= $admin_field->input_detail; ?></textarea>
	<p class="field_title">セミナー内容QRコード</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->seminar_qr_media; ?>" alt="" class="js-settingImage">
		<input type="hidden" name="seminar_qr_media" class="js-hiddenImageUrl" value="<?= $admin_field->seminar_qr_media; ?>">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
	<p class="field_title">講習PHOTO</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->training_media; ?>" alt="" class="js-settingImage">
		<input type="hidden" name="training_media" class="js-hiddenImageUrl" value="<?= $admin_field->training_media; ?>">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
	<p class="field_title">値段情報</p>
	<textarea id="price" class="has_tinymce input_price" name="input_price"><?= $admin_field->input_price; ?></textarea>
	<p class="field_title">プロフィール</p>
	<textarea id="profile" class="has_tinymce input_profile" name="input_profile"><?= $admin_field->input_profile; ?></textarea>
	<p class="field_title">プロフィール画像</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->profile_media; ?>" alt="" class="js-settingImage">
		<input type="hidden" name="profile_media" class="js-hiddenImageUrl" value="<?= $admin_field->profile_media; ?>">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
	<p class="field_title">連絡先</p>
	<textarea id="address" class="input_address" name="input_address"><?= $admin_field->input_address; ?></textarea>
	<p class="field_title">SNS QRコード</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->sns_qr_media; ?>" alt="" class="js-settingImage">
		<input type="hidden" name="sns_qr_media" class="js-hiddenImageUrl" value="<?= $admin_field->sns_qr_media; ?>">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
	<p class="field_title">HP QRコード</p>
	<div class="field_image_wrap js-imageWrap">
	    <img src="<?= $admin_field->hp_qr_media; ?>" alt="" class="js-settingImage">
		<input type="hidden" name="hp_qr_media" class="js-hiddenImageUrl" value="<?= $admin_field->hp_qr_media; ?>">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
</div>
