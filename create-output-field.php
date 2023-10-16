<?php
include_once("src/controllers/admin_field.php");
/**
 * 入力フィールド生成
 */
function custom_fields_form($post) {
	$admin_field = new Admin_field($post);
	$admin_field->get_admin_field();

	include_once("src/components/admin_field.php");
}

/**
 * 入力情報保存
 */
function save_custom_fields($post) {
	if (isset($_POST["select_radio"])) {
		$post_field_obj = array(
			"select_radio" => sanitize_text_field($_POST["select_radio"]),
			"input_title" => sanitize_text_field($_POST["input_title"]),
			"input_message"  => sanitize_text_field($_POST["input_message"]),
			"input_detail"  => sanitize_text_field($_POST["input_detail"]),
			"seminar_qr_media" => sanitize_text_field($_POST["seminar_qr_media"]),
			"training_media" => sanitize_text_field($_POST["training_media"]),
			"input_price" => sanitize_text_field($_POST["input_price"]),
			"input_profile" => sanitize_text_field($_POST["input_profile"]),
			"profile_media" => sanitize_text_field($_POST["profile_media"]),
			"input_address" => sanitize_text_field($_POST["input_address"]),
			"sns_qr_media" => sanitize_text_field($_POST["sns_qr_media"]),
			"hp_qr_media" => sanitize_text_field($_POST["hp_qr_media"]),
		);

		foreach ($post_field_obj as $key =>  $value) {
			update_post_meta($post, $key, $value);
		}
	}
}

add_action("save_post", "save_custom_fields");
?>
