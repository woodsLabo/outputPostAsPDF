<?php // ボタンアクション ?>
<?php
include_once("insert_dl_log.php");
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if (!is_admin() && !is_login_page()) {
	function render($in_fn, $params){
		extract($params);
		ob_start();
		include $in_fn;
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	if ($_POST && $_POST["dw"] === "true") {
		$dompdf = new Dompdf();
		$param = [];
		include_once("layout-template.php");
		$post_id = $_POST["post_id"];
		$file_name = $_POST["file_name"];
		$dompdf->loadHtml($html);
		$options = $dompdf->getOptions();
		$options->set(array('isRemoteEnabled' => false));
		$dompdf->setOptions($options);
		$dompdf->setPaper('A4');
		$dompdf->render();
		$dompdf->stream("{$file_name}.pdf", array("Attachment" => 0));
		$insert_dl_log->save_log($post_id);
		// $dompdf->stream("{$file_name}.pdf");
	}
}
?>
