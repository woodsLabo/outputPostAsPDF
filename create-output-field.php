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
			"input_main_catch" => $_POST["input_main_catch"],
			"input_sub_catch" => sanitize_text_field($_POST["input_sub_catch"]),
			"input_notice_text" => $_POST["input_notice_text"],
			"main_media" => sanitize_text_field($_POST["main_media"]),
			"input_datetime" => sanitize_text_field($_POST["input_datetime"]),
			"input_list_title" => sanitize_text_field($_POST["input_list_title"]),
			"input_message" => $_POST["input_message"],
			"input_seminar_text" => sanitize_text_field($_POST["input_seminar_text"]),
			"input_seminar_url" => sanitize_text_field($_POST["input_seminar_url"]),
			"seminar_qr_media" => sanitize_text_field($_POST["seminar_qr_media"]),
			"profile_media" => sanitize_text_field($_POST["profile_media"]),
			"input_profile_title" => sanitize_text_field($_POST["input_profile_title"]),
			"input_profile_name" => sanitize_text_field($_POST["input_profile_name"]),
			"input_profile" => $_POST["input_profile"],

			"input_contact_company" => sanitize_text_field($_POST["input_contact_company"]),
			"input_contact_tel" => sanitize_text_field($_POST["input_contact_tel"]),
			"input_contact_mail" => sanitize_text_field($_POST["input_contact_mail"]),

			"input_detail_item_date" => sanitize_text_field($_POST["input_detail_item_date"]),
			"input_detail_item_start_time" => sanitize_text_field($_POST["input_detail_item_start_time"]),
			"input_detail_item_end_time" => sanitize_text_field($_POST["input_detail_item_end_time"]),
			"input_detail_item_capacity" => sanitize_text_field($_POST["input_detail_item_capacity"]),
			"input_detail_item_place" => sanitize_text_field($_POST["input_detail_item_place"]),
			"input_detail_item_price" => sanitize_text_field($_POST["input_detail_item_price"]),
			"input_list_01" => sanitize_text_field($_POST["input_list_01"]),
			"input_list_02" => sanitize_text_field($_POST["input_list_02"]),
			"input_list_03" => sanitize_text_field($_POST["input_list_03"]),
			"input_list_04" => sanitize_text_field($_POST["input_list_04"]),
			"input_list_05" => sanitize_text_field($_POST["input_list_05"]),
			"input_list_06" => sanitize_text_field($_POST["input_list_06"]),
			"input_list_07" => sanitize_text_field($_POST["input_list_07"]),
			"input_list_08" => sanitize_text_field($_POST["input_list_08"]),
			"input_list_09" => sanitize_text_field($_POST["input_list_09"]),
			"input_list_10" => sanitize_text_field($_POST["input_list_10"]),
		);

		foreach ($post_field_obj as $key =>  $value) {
			update_post_meta($post, $key, $value);
		}
	}
}

add_action("save_post", "save_custom_fields");
?>
