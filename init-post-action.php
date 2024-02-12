<?php
// require_once("TCPDF-main/tcpdf.php");
require_once("dompdf/autoload.inc.php");
include_once("style.php");
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
		// $html = <<< EOM
		// <html>
		//   <head>
		//     <meta charset="utf-8">
		//   </head>
		//   <body>
		//     <div>this is dompdf sample!</div>
		//     <div>これはPDFのサンプルです！</div>
		//   </body>
		// </html>
		// EOM;
		$dompdf = new Dompdf();
		$param = [];
		// $html = render("layout-template.php", $param);
		include_once("layout-template.php");
		$dompdf->loadHtml($html);
		$options = $dompdf->getOptions();
		$options->set(array('isRemoteEnabled' => false));
		$dompdf->setOptions($options);
		$dompdf->setPaper('A4', 'landscape');
		$dompdf->render();
		$dompdf->stream("smaple.pdf", array("Attachment" => 0));
		// $pdf = new TCPDF("P", "mm", "A4",true, "UTF-8",false,false);
		// $pdf->SetMargins(0, 0, 0);
		// $pdf->setPrintHeader(false);
		// $pdf->setPrintFooter(false);
		// $pdf ->addPage();
		// $pdf ->setFont("kozgopromedium");
		// $param = [];
		// $html = render("layout-template.php", $param);
		// $pdf ->writeHTML($html);

		// $_POST = array();
		// // $pdf ->Output("hoge.pdf", "D");
		// $pdf ->Output("hoge.pdf", "I");
	}

}
function init_post_action($content) {
	$select_radio = createMetaItem("select_radio");
	$title = createMetaItem("input_title");
	$main_catch = createMetaItem("input_main_catch");
	$sub_catch = createMetaItem("input_sub_catch");
	$notice_text = createMetaItem("input_notice_text");
	$main_media = createMetaItem("main_media");
	$datetime = createMetaItem("input_datetime");
	$detail_item_title_01 = createMetaItem("input_detail_item_title_01");
	$detail_item_title_02 = createMetaItem("input_detail_item_title_02");
	$detail_item_title_03 = createMetaItem("input_detail_item_title_03");
	$detail_item_title_04 = createMetaItem("input_detail_item_title_04");
	$detail_item_title_01 = $detail_item_title_01 ? $detail_item_title_01 : "";
	$detail_item_title_02 = $detail_item_title_02 ? $detail_item_title_02 : "";
	$detail_item_title_03 = $detail_item_title_03 ? $detail_item_title_03 : "";
	$detail_item_title_04 = $detail_item_title_04 ? $detail_item_title_04 : "";
	$detail_item_text_01 = createMetaItem("input_detail_item_text_01");
	$detail_item_text_02 = createMetaItem("input_detail_item_text_02");
	$detail_item_text_03 = createMetaItem("input_detail_item_text_03");
	$detail_item_text_04 = createMetaItem("input_detail_item_text_04");
	$detail_item_text_01 = $detail_item_text_01 ? $detail_item_text_01 : "";
	$detail_item_text_02 = $detail_item_text_02 ? $detail_item_text_02 : "";
	$detail_item_text_03 = $detail_item_text_03 ? $detail_item_text_03 : "";
	$detail_item_text_04 = $detail_item_text_04 ? $detail_item_text_04 : "";
	$list_title = createMetaItem("input_list_title");
	$list_01 = createMetaItem("input_list_01");
	$list_02 = createMetaItem("input_list_02");
	$list_03 = createMetaItem("input_list_03");
	$list_04 = createMetaItem("input_list_04");
	$list_05 = createMetaItem("input_list_05");
	$list_06 = createMetaItem("input_list_06");
	$list_01 = $list_01 ? $list_01 : "";
	$list_02 = $list_02 ? $list_02 : "";
	$list_03 = $list_03 ? $list_03 : "";
	$list_04 = $list_04 ? $list_04 : "";
	$list_05 = $list_05 ? $list_05 : "";
	$list_06 = $list_06 ? $list_06 : "";
	$message = createMetaItem("input_message");
	$seminar_text = createMetaItem("input_seminar_text");
	$seminar_url = createMetaItem("input_seminar_url");
	$seminar_qr = createMetaItem("seminar_qr_media");
	$profile_img = createMetaItem("profile_media");
	$profile_title = createMetaItem("input_profile_title");
	$profile_name = createMetaItem("input_profile_name");
	$profile_text = createMetaItem("input_profile");
	$contact_company = createMetaItem("input_contact_company");
	$contact_tel = createMetaItem("input_contact_tel");
	$contact_mail = createMetaItem("input_contact_mail");

	$el = "" ;
	if ($select_radio == 1) {
		// TODO : button文言fix時に対応
			// <header class="topSubTitle">$sub_catch</header>
			// <div class="contentTop">
			//     <div class="titleWrap">
			//         <p class="title_sub">$sub_catch</p>
			//         <h2 class="title_main">$main_catch</h2>
			//     </div>
			//     <p class="limitCount">$notice_text</p>
			// </div>
			// <div class="detailWrap">
			//     <dl>
			//         <dt>開催日時</dt>
			//         <dd>$datetime</dd>
			//     </dl>
			//     <dl>
			//         $detail_item_title_01
			//         $detail_item_text_01
			//         $detail_item_title_02
			//         $detail_item_text_02
			//         $detail_item_title_03
			//         $detail_item_text_03
			//         $detail_item_title_04
			//         $detail_item_text_04
			//         $detail_item_title_05
			//         $detail_item_text_05
			//     </dl>
			// </div>
			// <div class="listWrap">
			//     <p class="listTitle">$list_title</p>
			//     <ul>
			//         $list_01
			//         $list_02
			//         $list_03
			//         $list_04
			//         $list_05
			//     </ul>
			// </div>
			// <div class="message">$message</div>
			// <div class="application">
			//     <div class="applicationTextWrap">
			//         <p class="applicationText">$seminar_text</p>
			//         <p class="applicationUrl">$seminar_url</p>
			//     </div>
			//     <div class="applicationImgWrap"><img src="$seminar_qr" alt=""></div>
			// </div>
			// <div class="profileWrap">
			//     <div class="profileImg"><img src="$profile_img" alt=""></div>
			//     <div class="profileDetail">
			//         <p class="profileTitle">$profile_title</p>
			//         <p class="profileName">$profile_name</p>
			//         <p class="profileText">$profile_text</p>
			//     </div>
			// </div>
			// <footer class="footer">
			//     <dl>
			//         <dt>お問い合わせ</dt>
			//         <dd>$contact_company</dd>
			//         <dt>TEL</dt>
			//         <dd>$contact_tel</dd>
			//         <dt>メールアドレス</dt>
			//         <dd>$contact_mail</dd>
			//     </dl>
			// </footer>

		$el = <<<EOM
		  <body>
		<div class="header">$title</div>
		<div class="contentTop">
			<div class="mainImage">
				<img src="$main_media">
			</div>
			<div class="titleWrap">
				<p class="title_sub">$sub_catch</p>
				<div class="title_main">$main_catch</div>
			</div>
			<div class="title_noticeWrap">
				<p class="title_notice">$notice_text</p>
			</div>
		</div>
		<div class="detailWrap">
			<table class="detailTable">
				<tr>
					<th><span>$detail_item_title_01</span></th>
					<td class="long">$detail_item_text_01</td>
					<th><span>$detail_item_title_02</span></th>
					<td class="short">$detail_item_text_02</td>
				</tr>
				<tr>
					<th><span>$detail_item_title_03</span></th>
					<td class="long">$detail_item_text_03</td>
					<th><span>$detail_item_title_04</span></th>
					<td class="short">$detail_item_text_04</td>
				</tr>
			</table>
		</div>
		<div class="listWrap">
			<p class="listTitle">$list_title</p>
			<div class="listTable">
				<div>
					<p>$list_01</p>
					<p>$list_02</p>
				</div>
				<div>
					<p>$list_03</p>
					<p>$list_04</p>
				</div>
				<div>
					<p>$list_05</p>
					<p>$list_06</p>
				</div>
			</div>
			<div class="message">$message</div>
		</div>
		<div class="application">
			<div class="applicationTextWrap">
				<p class="applicationText">$seminar_text</p>
				<p class="applicationUrl">$seminar_url</p>
			</div>
			<div class="applicationArrow">></div>
			<div class="applicationImgWrap"><img src="$seminar_qr" alt=""></div>
		</div>
		<div class="profileWrap">
			<table>
				<tr>
					<th class="profileImg"><img src="$profile_img" alt=""></th>
					<td class="profileDetail">
						<div class="profileDetailHead">
							<span class="profileTitle">$profile_title</span>
							<span class="profileName">$profile_name</span>
						</div>
						<div class="profileText">$profile_text</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="contact">
			<table class="contactWrap">
				<tr>
					<th class="contactTitle">お問い合わせ</th>
					<td class="contactCompany">$contact_company</td>
					<td class="contactTel">TEL:$contact_tel</td>
					<td class="contactEmail">メールアドレス:$contact_mail</td>
				</tr>
			</table>
		</div>
			<div class="opap__wrap">
				<form action="" method="post">
					<input type="hidden" name="dw" value="true">
					<input type="hidden" name="title" value="$title">
					<input type="hidden" name="sub_catch" value="$sub_catch">
					<input type="hidden" name="main_catch" value="$main_catch">
					<input type="hidden" name="notice_text" value="$notice_text">
					<input type="hidden" name="main_media" value="$main_media">
					<input type="hidden" name="detail_item_title_01" value="$detail_item_title_01">
					<input type="hidden" name="detail_item_title_02" value="$detail_item_title_02">
					<input type="hidden" name="detail_item_title_03" value="$detail_item_title_03">
					<input type="hidden" name="detail_item_title_04" value="$detail_item_title_04">
					<input type="hidden" name="detail_item_text_01" value="$detail_item_text_01">
					<input type="hidden" name="detail_item_text_02" value="$detail_item_text_02">
					<input type="hidden" name="detail_item_text_03" value="$detail_item_text_03">
					<input type="hidden" name="detail_item_text_04" value="$detail_item_text_04">
					<input type="hidden" name="list_title" value="$list_title">
					<input type="hidden" name="list_01" value="$list_01">
					<input type="hidden" name="list_02" value="$list_02">
					<input type="hidden" name="list_03" value="$list_03">
					<input type="hidden" name="list_04" value="$list_04">
					<input type="hidden" name="list_05" value="$list_05">
					<input type="hidden" name="list_06" value="$list_06">
					<input type="hidden" name="message" value="$message">
					<input type="hidden" name="seminar_text" value="$seminar_text">
					<input type="hidden" name="seminar_url" value="$seminar_url">
					<input type="hidden" name="seminar_qr" value="$seminar_qr">
					<input type="hidden" name="profile_img" value="$profile_img">
					<input type="hidden" name="profile_title" value="$profile_title">
					<input type="hidden" name="profile_name" value="$profile_name">
					<input type="hidden" name="profile_text" value="$profile_text">
					<input type="hidden" name="contact_company" value="$contact_company">
					<input type="hidden" name="contact_tel" value="$contact_tel">
					<input type="hidden" name="contact_mail" value="$contact_mail">
				<button class="opap__button">PDF化</button>
				</form>
			</div>
		EOM;
	}
	return "{$content}{$el}";
}

/*
	カスタムフィールドの値を取得
*/
function createMetaItem($field = false) {
	$post_id = get_the_ID();
	return get_post_meta($post_id, $field, true);
}

add_filter("the_content", "init_post_action");
?>
