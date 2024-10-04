<?php
class Admin_field {
	public function __construct($post) {
		$this->post = $post;
	}

	public function get_admin_field() {
		// $this->select_radio = get_post_meta($this->post->ID, "select_radio", true);
		// $this->pdf_type = get_post_meta($this->post->ID, "pdf_type", true);
		// $this->input_file_name = get_post_meta($this->post->ID, "input_file_name", true);
		// $this->input_title = get_post_meta($this->post->ID, "input_title", true);
		// $this->input_sub_catch = get_post_meta($this->post->ID, "input_sub_catch", true);
		// $this->input_main_catch = get_post_meta($this->post->ID, "input_main_catch", true);
		// $this->input_notice_text = get_post_meta($this->post->ID, "input_notice_text", true);
		// $this->main_media01 = get_post_meta($this->post->ID, "main_media01", true);
		// $this->main_media02 = get_post_meta($this->post->ID, "main_media02", true);
		// $this->main_media03 = get_post_meta($this->post->ID, "main_media03", true);
		// $this->main_media04 = get_post_meta($this->post->ID, "main_media04", true);
		// $this->main_media05 = get_post_meta($this->post->ID, "main_media05", true);
		$this->main_media01 = get_option("main_media01");
		$this->main_media02 = get_option("main_media02");
		$this->main_media03 = get_option("main_media03");
		$this->main_media04 = get_option("main_media04");
		$this->main_media05 = get_option("main_media05");
	// $this->input_list_title = get_post_meta($this->post->ID, "input_list_title", true);
		// $this->input_message = get_post_meta($this->post->ID, "input_message", true);
		// $this->input_seminar_text = get_post_meta($this->post->ID, "input_seminar_text", true);
		// $this->input_seminar_url = get_post_meta($this->post->ID, "input_seminar_url", true);
		// $this->seminar_qr_media = get_post_meta($this->post->ID, "seminar_qr_media", true);
		// $this->profile_media = get_post_meta($this->post->ID, "profile_media", true);
		// $this->input_profile_title = get_post_meta($this->post->ID, "input_profile_title", true);
		// $this->input_profile_name = get_post_meta($this->post->ID, "input_profile_name", true);
		// $this->input_profile = get_post_meta($this->post->ID, "input_profile", true);

		// $this->input_contact_company = get_post_meta($this->post->ID, "input_contact_company", true);
		// $this->input_contact_tel = get_post_meta($this->post->ID, "input_contact_tel", true);
		// $this->input_contact_mail = get_post_meta($this->post->ID, "input_contact_mail", true);

		// $this->input_detail_item_date = get_post_meta($this->post->ID, "input_detail_item_date", true);
		// $this->input_detail_item_start_time = get_post_meta($this->post->ID, "input_detail_item_start_time", true);
		// $this->input_detail_item_end_time = get_post_meta($this->post->ID, "input_detail_item_end_time", true);
		// $this->input_detail_item_capacity = get_post_meta($this->post->ID, "input_detail_item_capacity", true);
		// $this->input_detail_item_place = get_post_meta($this->post->ID, "input_detail_item_place", true);
		// $this->input_detail_item_price = get_post_meta($this->post->ID, "input_detail_item_price", true);

		// $this->input_list_01 = get_post_meta($this->post->ID, "input_list_01", true);
		// $this->input_list_02 = get_post_meta($this->post->ID, "input_list_02", true);
		// $this->input_list_03 = get_post_meta($this->post->ID, "input_list_03", true);
		// $this->input_list_04 = get_post_meta($this->post->ID, "input_list_04", true);
		// $this->input_list_05 = get_post_meta($this->post->ID, "input_list_05", true);
		// $this->input_list_06 = get_post_meta($this->post->ID, "input_list_06", true);
		// $this->input_list_07 = get_post_meta($this->post->ID, "input_list_07", true);
		// $this->input_list_08 = get_post_meta($this->post->ID, "input_list_08", true);
		// $this->input_list_09 = get_post_meta($this->post->ID, "input_list_09", true);
		// $this->input_list_10 = get_post_meta($this->post->ID, "input_list_10", true);
	}
}
?>
