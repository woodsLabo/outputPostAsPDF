<?php
class Admin_field {
	public function __construct($post) {
		$this->post = $post;
	}

	public function get_admin_field() {
		$this->main_media01 = get_option("main_media01");
		$this->main_media02 = get_option("main_media02");
		$this->main_media03 = get_option("main_media03");
		$this->main_media04 = get_option("main_media04");
		$this->main_media05 = get_option("main_media05");
	}
}
?>
