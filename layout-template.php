<?php
if (isset($_POST)) :
	include_once("style.php");
	$title = $_POST["title"] ?? null;
	$sub_catch = $_POST["sub_catch"] ?? null;
	$main_catch = $_POST["main_catch"] ?? null;
	$notice_text = nl2br($_POST["notice_text"]) ?? null;
	$detail_item_date = $_POST["detail_item_date"] ?? null;
	$detail_item_start_time =  $_POST["detail_item_start_time"] ?? null;
	$detail_item_end_time = $_POST["detail_item_end_time"] ?? null;
	$detail_item_capacity = $_POST["detail_item_capacity"] ?? null;
	$detail_item_place = $_POST["detail_item_place"] ?? null;
	$detail_item_price = number_format($_POST["detail_item_price"]) ?? null;
	$str_time = date("n月j日", strtotime($detail_item_date));
	$date = date('w', strtotime($detail_item_date));
	$week = ["日", "月", "火", "水", "木", "金", "土"];
	$list_title = $_POST["list_title"] ?? null;

	$pdf_type_A = $_POST["pdf_type"] === "a" ? " type--a" : "";
	$list_01 = !empty($_POST['list_01']) ? "<p>{$_POST['list_01']}</p>" : null;
	$list_02 = !empty($_POST['list_02']) ? "<p>{$_POST['list_02']}</p>" : null;
	$list_03 = !empty($_POST['list_03']) ? "<p>{$_POST['list_03']}</p>" : null;
	$list_04 = !empty($_POST['list_04']) ? "<p>{$_POST['list_04']}</p>" : null;
	$list_05 = !empty($_POST['list_05']) ? "<p>{$_POST['list_05']}</p>" : null;
	$list_06 = !empty($_POST['list_06']) ? "<p>{$_POST['list_06']}</p>" : null;
	$list_07 = !empty($_POST['list_07']) ? "<p>{$_POST['list_07']}</p>" : null;
	$list_08 = !empty($_POST['list_08']) ? "<p>{$_POST['list_08']}</p>" : null;
	$list_09 = !empty($_POST['list_09']) ? "<p>{$_POST['list_09']}</p>" : null;
	$list_10 = !empty($_POST['list_10']) ? "<p>{$_POST['list_10']}</p>" : null;

	$message = nl2br($_POST["message"]) ?? null;
	$seminar_text = $_POST["seminar_text"] ?? null;
	$seminar_url = $_POST["seminar_url"] ?? null;
	$seminar_qr = $_POST["seminar_qr"] ?? null;
	$profile_img = $_POST["profile_img"] ?? null;
	$profile_title = $_POST["profile_title"] ?? null;
	$profile_name = $_POST["profile_name"] ?? null;
	$profile_text = nl2br($_POST["profile_text"] ?? null);
	$contact_company = $_POST["contact_company"] ?? null;
	$contact_tel = $_POST["contact_tel"] ?? null;
	$contact_mail = $_POST["contact_mail"] ?? null;

	$main_media = "";
	$qr_media = $_POST["seminar_qr"];
	$profile_media = $_POST["profile_img"];

	if (!empty($notice_text)) {
		$notice_ele = <<< EOM
		<table class="title_noticeWrap">
			<td class="title_notice">$notice_text</td>
		</table>
		EOM;
	} else {
		$notice_ele = "";
	}

	if (wp_get_environment_type() == "development") {
		$main_media = "https://kstg.devwl.work/wp-content/themes/lightning/main_image.png";
		// $qr_media = "https://kstg.devwl.work/wp-content/themes/lightning/01.jpg";
		// $profile_media = "https://kstg.devwl.work/wp-content/themes/lightning/no_image.png";
	} else {
		$main_media = $_POST["main_media"];
		// $qr_media = $_POST["seminar_qr"];
		// $profile_media = $_POST["profile_img"];
	}

	$main_media = base64_encode(file_get_contents($main_media));
	// $qr_media = base64_encode(file_get_contents($qr_media));
	// $profile_media = base64_encode(file_get_contents($profile_media));
endif;

$html = <<< EOM

<html>
  <head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
	$style
  </head>
  <body>
<div class="header">$title</div>
<div class="contentTop">
	<div class="mainImage">
		<img src="data:image/png;base64,$main_media">
	</div>
	<div class="titleWrap">
		<p class="title_sub">$sub_catch</p>
		<div class="title_main">$main_catch</div>
	</div>
	$notice_ele
</div>
<div class="detailWrap">
	<table class="detailTable">
		<tr>
			<th><span>開催日時</span></th>
			<td class="long">$str_time({$week[$date]}){$detail_item_start_time}〜{$detail_item_end_time}</td>
			<th><span>定員</span></th>
			<td class="short">{$detail_item_capacity}名</td>
		</tr>
		<tr>
			<th><span>場所</span></th>
			<td class="long">$detail_item_place</td>
			<th><span>料金</span></th>
			<td class="short">{$detail_item_price}円</td>
		</tr>
	</table>
</div>
<div class="listWrap{$pdf_type_A}">
	<p class="listTitle">$list_title</p>
	<div class="listTable">
		<div>
			$list_01
			$list_02
		</div>
		<div>
			$list_03
			$list_04
		</div>
		<div>
			$list_05
			$list_06
		</div>
		<div>
			$list_07
			$list_08
		</div>
		<div>
			$list_09
			$list_10
		</div>
	</div>
</div>
<div class="message">$message</div>
<div class="application">
	<div class="applicationTextWrap">
		<p class="applicationText">$seminar_text</p>
		<p class="applicationUrl">$seminar_url</p>
	</div>
	<div class="applicationArrow"><span></span><span></span><span></span><span></span><span></span><span></span></div>
	<div class="applicationImgWrap"><img src="$qr_media"></div>
</div>
<div class="profileWrap">
	<table style="table-layout: fixed">
		<tr>
			<th class="profileImg"><img src="$profile_media"></th>
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

		  </body>
		 </html>
EOM;
?>
