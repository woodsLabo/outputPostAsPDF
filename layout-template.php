<?php
	if (isset($_POST)) :
	include_once("style.php");
	$title = $_POST["title"] ?? null;
	$sub_catch = $_POST["sub_catch"] ?? null;
	$main_catch = $_POST["main_catch"] ?? null;
	$notice_text = $_POST["notice_text"] ?? null;
	// $main_media = base64_encode(file_get_contents($_POST["main_media"])) ?? null;
	// $main_media = $_POST["main_media"] ?? null;
	// $main_media = base64_encode(file_get_contents("icon.png")) ?? null;
	$main_media = base64_encode(file_get_contents("main_image.png")) ?? null;
	// $datetime = $_POST["detail_item_date"];
	$detail_item_date = $_POST["detail_item_date"] ?? null;
	$detail_item_start_time =  $_POST["detail_item_start_time"] ?? null;
	$detail_item_end_time = $_POST["detail_item_end_time"] ?? null;
	$detail_item_capacity = $_POST["detail_item_capacity"] ?? null;
	$detail_item_place = $_POST["detail_item_place"] ?? null;
	$detail_item_price = $_POST["detail_item_price"] ?? null;
	$str_time = date("n月j日", strtotime($detail_item_date));
	$date = date('w', strtotime($detail_item_date));
	$week = ["日", "月", "火", "水", "木", "金", "土"];
	$list_title = $_POST["list_title"] ?? null;

	$list_01 = "<p><span></span>{$_POST['list_01']}</p>" ?? null;
	$list_02 = "<p><span></span>{$_POST['list_02']}</p>" ?? null;
	$list_03 = "<p><span></span>{$_POST['list_03']}</p>" ?? null;
	$list_04 = "<p><span></span>{$_POST['list_04']}</p>" ?? null;
	$list_05 = "<p><span></span>{$_POST['list_05']}</p>" ?? null;
	$list_06 = "<p><span></span>{$_POST['list_06']}</p>" ?? null;
	$list_07 = "<p><span></span>{$_POST['list_07']}</p>" ?? null;
	$list_08 = "<p><span></span>{$_POST['list_08']}</p>" ?? null;
	$list_09 = "<p><span></span>{$_POST['list_09']}</p>" ?? null;
	$list_10 = "<p><span></span>{$_POST['list_10']}</p>" ?? null;

	$message = $_POST["message"] ?? null;
	$seminar_text = $_POST["seminar_text"] ?? null;
	$seminar_url = $_POST["seminar_url"] ?? null;
	$seminar_qr = $_POST["seminar_qr"] ?? null;
	$profile_img = $_POST["profile_img"] ?? null;
	$profile_title = $_POST["profile_title"] ?? null;
	$profile_name = $_POST["profile_name"] ?? null;
	$profile_text = $_POST["profile_text"] ?? null;
	$contact_company = $_POST["contact_company"] ?? null;
	$contact_tel = $_POST["contact_tel"] ?? null;
	$contact_mail = $_POST["contact_mail"] ?? null;
	endif;
		// <img src="data:image/png;base64,$main_media">
		// <img src="$main_media">

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
	<div class="title_noticeWrap">
		<div class="title_notice">$notice_text</div>
	</div>
</div>
<div class="detailWrap">
	<table class="detailTable">
		<tr>
			<th><span>開催日時</span></th>
			<td class="long">$str_time({$week[$date]}){$detail_item_start_time}~{$detail_item_end_time}</td>
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
<div class="listWrap">
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
			<p><span></span>$list_09</p>
			<p><span></span>$list_10</p>
		</div>
	</div>
</div>
<div class="message">$message</div>
<div class="application">
	<div class="applicationTextWrap">
		<p class="applicationText">$seminar_text</p>
		<p class="applicationUrl">$seminar_url</p>
	</div>
	<div class="applicationImgWrap"><img src="$seminar_qr" alt=""></div>
</div>
<div class="profileWrap">
	<table style="table-layout: fixed">
		<tr>
			<th class="profileImg"><img src="data:image/png;base64,$main_media"></th>
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
