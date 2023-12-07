<?php
class Admin_field {
	public function __construct($post) {
		$this->post = $post;
	}

	public function get_admin_field() {
		$this->select_radio = get_post_meta($this->post->ID, "select_radio", true);
		$this->input_main_catch = get_post_meta($this->post->ID, "input_main_catch", true);
		$this->input_sub_catch = get_post_meta($this->post->ID, "input_sub_catch", true);
		$this->input_datetime = get_post_meta($this->post->ID, "input_datetime", true);
		$this->input_list_title = get_post_meta($this->post->ID, "input_list_title", true);
		$this->input_message = get_post_meta($this->post->ID, "input_message", true);
		$this->input_seminar_text = get_post_meta($this->post->ID, "input_seminar_text", true);
		$this->input_seminar_url = get_post_meta($this->post->ID, "input_seminar_url", true);
		$this->seminar_qr_media = get_post_meta($this->post->ID, "seminar_qr_media", true);
		$this->profile_media = get_post_meta($this->post->ID, "profile_media", true);
		$this->input_profile_title = get_post_meta($this->post->ID, "input_profile_title", true);
		$this->input_profile_name = get_post_meta($this->post->ID, "input_profile_name", true);
		$this->input_profile = get_post_meta($this->post->ID, "input_profile", true);

		$this->input_address = get_post_meta($this->post->ID, "input_address", true);
		$this->sns_qr_media = get_post_meta($this->post->ID, "sns_qr_media", true);
		$this->hp_qr_media = get_post_meta($this->post->ID, "hp_qr_media", true);
		$this->training_media = get_post_meta($this->post->ID, "training_media", true);
		$this->input_price = get_post_meta($this->post->ID, "input_price", true);

		$this->input_contact_company = get_post_meta($this->post->ID, "input_contact_company", true);
		$this->input_contact_tel = get_post_meta($this->post->ID, "input_contact_tel", true);
		$this->input_contact_mail = get_post_meta($this->post->ID, "input_contact_mail", true);

		$this->input_detail_item_title_01 = get_post_meta($this->post->ID, "input_detail_item_title_01", true);
		$this->input_detail_item_title_02 = get_post_meta($this->post->ID, "input_detail_item_title_02", true);
		$this->input_detail_item_title_03 = get_post_meta($this->post->ID, "input_detail_item_title_03", true);
		$this->input_detail_item_title_04 = get_post_meta($this->post->ID, "input_detail_item_title_04", true);
		$this->input_detail_item_title_05 = get_post_meta($this->post->ID, "input_detail_item_title_05", true);
		$this->input_detail_item_text_01 = get_post_meta($this->post->ID, "input_detail_item_text_01", true);
		$this->input_detail_item_text_02 = get_post_meta($this->post->ID, "input_detail_item_text_02", true);
		$this->input_detail_item_text_03 = get_post_meta($this->post->ID, "input_detail_item_text_03", true);
		$this->input_detail_item_text_04 = get_post_meta($this->post->ID, "input_detail_item_text_04", true);
		$this->input_detail_item_text_05 = get_post_meta($this->post->ID, "input_detail_item_text_05", true);
		$this->input_list_01 = get_post_meta($this->post->ID, "input_list_01", true);
		$this->input_list_02 = get_post_meta($this->post->ID, "input_list_02", true);
		$this->input_list_03 = get_post_meta($this->post->ID, "input_list_03", true);
		$this->input_list_04 = get_post_meta($this->post->ID, "input_list_04", true);
		$this->input_list_05 = get_post_meta($this->post->ID, "input_list_05", true);
	}
}
?>
