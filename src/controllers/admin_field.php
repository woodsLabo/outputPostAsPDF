<?php
class Admin_field {
	public function __construct($post) {
		$this->post = $post;
	}

	public function get_admin_field() {
		$this->select_radio = get_post_meta($this->post->ID, "select_radio", true);
		$this->input_title = get_post_meta($this->post->ID, "input_title", true);
		$this->input_message = get_post_meta($this->post->ID, "input_message", true);
		$this->input_detail = get_post_meta($this->post->ID, "input_detail", true);
		$this->seminar_qr_media = get_post_meta($this->post->ID, "seminar_qr_media", true);
		$this->training_media = get_post_meta($this->post->ID, "training_media", true);
		$this->input_price = get_post_meta($this->post->ID, "input_price", true);
		$this->input_profile = get_post_meta($this->post->ID, "input_profile", true);
		$this->profile_media = get_post_meta($this->post->ID, "profile_media", true);
		$this->input_address = get_post_meta($this->post->ID, "input_address", true);
		$this->sns_qr_media = get_post_meta($this->post->ID, "sns_qr_media", true);
		$this->hp_qr_media = get_post_meta($this->post->ID, "hp_qr_media", true);
	}
}
?>
