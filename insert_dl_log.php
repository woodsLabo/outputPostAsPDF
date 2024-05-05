<?php
// ダウンロード履歴作成
class InsertDlLog {
	public function __construct() {
		global $wpdb;
		$this->table_name = "{$wpdb->prefix}postmeta";
		$this->meta_key = "dl_detail";
	}

	function create_meta_value() {
		$dl_time = date("Y/m/d H:i:s");
		$dl_user = $_SERVER['HTTP_USER_AGENT'];

		return array(
			"dl_time" => $dl_time,
			"dl_usr" => $dl_user
		);
	}

	//レコードがなかったら新規追加あったら更新
	function save_log($post_id) {
		global $wpdb;
		$value_obj = serialize($this->create_meta_value());

		$set_arr = array(
			'post_id' => $post_id,
			'meta_key' => $this->meta_key,
			'meta_value' => $value_obj,
		);

		$wpdb->insert($this->table_name, $set_arr);
	}
}

$insert_dl_log = new InsertDlLog();
?>
