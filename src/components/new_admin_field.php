<?php $plugin_path = plugins_url("output-post-as-pdf") . "/assets/src/img/"; ?>

<div>
<p>pdf機能を使用するには使用する固定ページに以下のショートコードを入力してください</p>
<p>[create_pdf]</p>
</div>
<form method="post" action="options.php">
<?php settings_fields('my_custom_plugin_settings_group'); ?>
<p class="field_title">bgタイプ1</p>
<div class="field_image_wrap js-imageWrap">
	<img src="<?= get_option("main_media01"); ?>" alt="" class="js-settingImage field_image">
	<input type="hidden" name="main_media01" class="js-hiddenImageUrl" value="<?= get_option("main_media01"); ?>">
	<div class="field_button_wrap">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>
	<div class="field_default_wrap">
		<p>画像を設定しない場合は以下の画像が表示されます</p>
		<img src="<?= $plugin_path ?>/img01.png" alt="">
	</div>
</div>

<p class="field_title">bgタイプ2</p>
<div class="field_image_wrap js-imageWrap">
	<img src="<?= get_option("main_media02"); ?>" alt="" class="js-settingImage field_image">
	<input type="hidden" name="main_media02" class="js-hiddenImageUrl" value="<?= get_option("main_media02"); ?>">
	<div class="field_button_wrap">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>

	<div class="field_default_wrap">
		<p>画像を設定しない場合は以下の画像が表示されます</p>
		<img src="<?= $plugin_path ?>/img02.png" alt="">
	</div>
</div>
<p class="field_title">bgタイプ3</p>
<div class="field_image_wrap js-imageWrap">
	<img src="<?= get_option("main_media03"); ?>" alt="" class="js-settingImage field_image">
	<input type="hidden" name="main_media03" class="js-hiddenImageUrl" value="<?= get_option("main_media03"); ?>">
	<div class="field_button_wrap">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>

	<div class="field_default_wrap">
		<p>画像を設定しない場合は以下の画像が表示されます</p>
		<img src="<?= $plugin_path ?>/img03.png" alt="">
	</div>
</div>
<p class="field_title">bgタイプ4</p>
<div class="field_image_wrap js-imageWrap">
	<img src="<?= get_option("main_media04"); ?>" alt="" class="js-settingImage field_image">
	<input type="hidden" name="main_media04" class="js-hiddenImageUrl" value="<?= get_option("main_media04"); ?>">
	<div class="field_button_wrap">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>

	<div class="field_default_wrap">
		<p>画像を設定しない場合は以下の画像が表示されます</p>
		<img src="<?= $plugin_path ?>/img04.png" alt="">
	</div>
</div>
<p class="field_title">bgタイプ5</p>
<div class="field_image_wrap js-imageWrap">
	<img src="<?= get_option("main_media05"); ?>" alt="" class="js-settingImage field_image">
	<input type="hidden" name="main_media05" class="js-hiddenImageUrl" value="<?= get_option("main_media05"); ?>">
	<div class="field_button_wrap">
		<input type="button" name="media" class="js-mediaSelect" value="画像選択" >
		<input type="button" name="media-delete" class="js-mediaDelete" value="削除" />
	</div>

	<div class="field_default_wrap">
		<p>画像を設定しない場合は以下の画像が表示されます</p>
		<img src="<?= $plugin_path ?>/img05.png" alt="">
	</div>
</div>
<?php submit_button(); ?>
</form>

<script>
	const hoge = document.querySelector(".js-hiddenImageUrl");
console.log(hoge)
hoge.addEventListener("change", () => console.log("hogehoge"));
</script>
