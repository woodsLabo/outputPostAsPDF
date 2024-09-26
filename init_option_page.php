<?php
function dl_log_page() {
	add_menu_page("ダウンロードログ", "ダウンロードログ", "manage_options", "dl_log__page", "add_dl_log_page", "dashicons-admin-generic", 60);
}

add_action("admin_menu", "dl_log_page");

function add_dl_log_page() {
?>
<div class="dl-log__wrap">
	<h2 class="dl-log__title">ダウンロードログ</h2>
	<?php
		global $wpdb;
		$dl_row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}postmeta WHERE meta_key = 'dl_detail' AND meta_value != ''");
	?>
	<p>ダウンロード数<?= count($dl_row); ?></p>
	<div class="dl-log__inner">
		<ul class="dl-log__list">
			<li class="dl-log__item"><div class="dl-log__id">記事id</div><div class="dl-log__time">ダウンロード時間</div><div class="dl-log__usr">ダウンロード端末</div></li>
			<?php
				$dl_reverse_row = array_reverse($dl_row);
				foreach($dl_reverse_row as $row) : ?>
					<li class="dl-log__item">
						<div class="dl-log__id"><?= $row->post_id; ?></div>
						<?php $meta_values = unserialize($row->meta_value); ?>
						<div class="dl-log__time"><?= $meta_values["dl_time"]; ?></div>
						<div class="dl-log__usr"><?= $meta_values["dl_usr"]; ?></div>
					</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>

<style>
	.dl-log__inner {
		height: 70vh;
		overflow: auto;
	}
	.dl-log__list {
		display: table;
		border-collapse: collapse;
		border: 1px solid #000;
	}

	.dl-log__item {
		border: 1px solid #000;
		display: table-row;
		margin-bottom: 0;
	 }

	.dl-log__id {
		border: 1px solid #000;
		display: table-cell;
		padding: 10px;;
		text-align: center;
		width: 5%;
	}

	.dl-log__time {
		border: 1px solid #000;
		display: table-cell;
		padding: 10px;
		width: 35%;
	}

	.dl-log__usr {
		border: 1px solid #000;
		display: table-cell;
		padding: 10px;;
		width: 60%;
	}
</style>
<?php
}
