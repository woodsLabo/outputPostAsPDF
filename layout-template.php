<?php
	if (isset($_POST)) :
	include_once("style.php");
	$title = $_POST["title"] ?? null;
	$sub_catch = $_POST["sub_catch"] ?? null;
	$main_catch = $_POST["main_catch"] ?? null;
	$notice_text = $_POST["notice_text"] ?? null;
	// $main_media = base64_encode(file_get_contents($_POST["main_media"])) ?? null;
	$main_media = $_POST["main_media"] ?? null;
	// $main_media = base64_encode(file_get_contents("icon.png")) ?? null;
	// $main_media = base64_encode(file_get_contents("main_image.png")) ?? null;
	$detail_item_title_01 = $_POST["detail_item_title_01"] ?? null;
	$detail_item_title_02 = $_POST["detail_item_title_02"] ?? null;
	$detail_item_title_03 = $_POST["detail_item_title_03"] ?? null;
	$detail_item_title_04 = $_POST["detail_item_title_04"] ?? null;
	$detail_item_text_01 = $_POST["detail_item_text_01"] ?? null;
	$detail_item_text_02 = $_POST["detail_item_text_02"] ?? null;
	$detail_item_text_03 = $_POST["detail_item_text_03"] ?? null;
	$detail_item_text_04 = $_POST["detail_item_text_04"] ?? null;
	$list_title = $_POST["list_title"] ?? null;
	$list_01 = $_POST["list_01"] ?? null;
	$list_02 = $_POST["list_02"] ?? null;
	$list_03 = $_POST["list_03"] ?? null;
	$list_04 = $_POST["list_04"] ?? null;
	$list_05 = $_POST["list_05"] ?? null;
	$list_06 = $_POST["list_06"] ?? null;
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
	<table>
		<tr>
			<th class="profileImg"><img src="$profile_img" alt=""></th>
			<td class="profileDetail">
				<div class="profileDetailHead">
					<span class="profileTitle">$profile_title</span>
					<span class="profileName">$profile_name</span>
				</div>
				<p class="profileText">$profile_text</p>
			</td>
		</tr>
	</table>
</div>
<div class="footer">
	<dl>
		<dt>お問い合わせ</dt>
		<dd>$contact_company</dd>
		<dt>TEL</dt>
		<dd>$contact_tel</dd>
		<dt>メールアドレス</dt>
		<dd>$contact_mail</dd>
	</dl>
</div>

		  </body>
		 </html>
EOM;
?>
