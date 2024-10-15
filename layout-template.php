<?php
$html = "";
if (isset($_POST) && $_POST["post_label"] === "pdf_post") :
	include_once("style.php");
	$main_color = $_POST["main_color"] ?? null;
	$sub_color = $_POST["sub_color"] ?? null;
	$title = $_POST["title"] ?? null;
	$sub_catch = $_POST["sub_catch"] ?? null;
	$main_catch = $_POST["main_catch"] ? nl2br($_POST["main_catch"]) : null;
	$notice_text = !empty($_POST["notice_text"]) ? nl2br($_POST["notice_text"]) : null;
	$detail_item_date = $_POST["detail_item_date"] ?? null;
	$detail_item_start_time =  new DateTime($_POST["detail_item_start_time"]) ?? null;
	$detail_item_end_time = new DateTime($_POST["detail_item_end_time"]) ?? null;
	$detail_item_capacity = $_POST["detail_item_capacity"] ?? null;
	$detail_item_place = $_POST["detail_item_place"] ?? null;
	$detail_item_price = !empty($_POST["detail_item_price"]) ? number_format($_POST["detail_item_price"]) : null;
	$str_time = date("n月j日", strtotime($detail_item_date));
	$date = date('w', strtotime($detail_item_date));
	$week = ["日", "月", "火", "水", "木", "金", "土"];
	$list_title = $_POST["list_title"] ?? null;

	$pdf_type_A = $_POST["pdf_type"] === "a" ? " type--a" : "";
	$select_sub_color = $_POST["pdf_type"] === "b" ? $sub_color : "initial";
	$list_01 = !empty($_POST['list_01']) ? "<p style='background: $select_sub_color;'>{$_POST['list_01']}</p>" : null;
	$list_02 = !empty($_POST['list_02']) ? "<p style='background: $select_sub_color;'>{$_POST['list_02']}</p>" : null;
	$list_03 = !empty($_POST['list_03']) ? "<p style='background: $select_sub_color;'>{$_POST['list_03']}</p>" : null;
	$list_04 = !empty($_POST['list_04']) ? "<p style='background: $select_sub_color;'>{$_POST['list_04']}</p>" : null;
	$list_05 = !empty($_POST['list_05']) ? "<p style='background: $select_sub_color;'>{$_POST['list_05']}</p>" : null;
	$list_06 = !empty($_POST['list_06']) ? "<p style='background: $select_sub_color;'>{$_POST['list_06']}</p>" : null;
	$list_07 = !empty($_POST['list_07']) ? "<p style='background: $select_sub_color;'>{$_POST['list_07']}</p>" : null;
	$list_08 = !empty($_POST['list_08']) ? "<p style='background: $select_sub_color;'>{$_POST['list_08']}</p>" : null;
	$list_09 = !empty($_POST['list_09']) ? "<p style='background: $select_sub_color;'>{$_POST['list_09']}</p>" : null;
	$list_10 = !empty($_POST['list_10']) ? "<p style='background: $select_sub_color;'>{$_POST['list_10']}</p>" : null;

	$message = !empty($_POST["message"]) ? nl2br($_POST["message"]) : null;
	$seminar_text = $_POST["seminar_text"] ?? null;
	$seminar_url = $_POST["seminar_url"] ?? null;
	$seminar_qr = $_POST["seminar_qr"] ?? null;
	$profile_img = $_POST["profile_img"] ?? null;
	$profile_title = $_POST["profile_title"] ?? null;
	$profile_name = $_POST["profile_name"] ?? null;
	$profile_text = !empty($_POST["profile_text"]) ? nl2br($_POST["profile_text"]) : null;
	$contact_company = $_POST["contact_company"] ?? null;
	$contact_tel = $_POST["contact_tel"] ?? null;
	$contact_mail = $_POST["contact_mail"] ?? null;

	$notice_text_size = $_POST["notice_text_size"];
	$detail_item_place_text_size = $_POST["detail_item_place_text_size"];
	$contact_company_text_size = $_POST["contact_company_text_size"];
	$contact_mail_text_size = $_POST["contact_mail_text_size"];

	// ローカルではfile_get_contentesでこけるため、リリース時にはこの分岐は除却
	$main_media = wp_get_environment_type() == "development" ? "https://kstg.devwl.work/wp-content/themes/lightning/main_image.png" : $_POST["bg_type"]; // 選択デフォルト画像
	// $main_media = $_POST["bg_type"]; // 選択デフォルト画像
	$up_main_media = $_POST["bg_img"]; // upload画像
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

	$main_media = !empty($up_main_media) ? $up_main_media : "data:image/png;base64," . base64_encode(file_get_contents($main_media));

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
		<div class="header" style="background: $main_color;">$title</div>
		<div class="contentTop">
			<div class="mainImage">
				<img src="$main_media">
			</div>
			<div class="titleWrap">
				<p class="title_sub">$sub_catch</p>
				<div class="title_main" style="font-size: $notice_text_size;">$main_catch</div>
			</div>
			$notice_ele
		</div>
		<div class="detailWrap">
			<table class="detailTable">
				<tr>
					<th style="background: $main_color;">開催日時</th>
					<td class="long">$str_time({$week[$date]})<span class="detailTimeSpacer">{$detail_item_start_time->format("g:i")}〜{$detail_item_end_time->format("g:i")}</span></td>
					<td class="detailTableHead" style="background: $main_color;">定員</td>
					<td class="short">{$detail_item_capacity}名</td>
				</tr>
			</table>
			<table class="detailTable">
				<tr>
					<th style="background: $main_color;">場所</th>
					<td class="long detailPlace" style="font-size: $detail_item_place_text_size;">$detail_item_place</td>
					<td class="detailTableHead" style="background: $main_color;">料金</td>
					<td class="short">{$detail_item_price}円</td>
				</tr>
			</table>
		</div>
		<div class="listWrap{$pdf_type_A}">
			<p class="listTitle" style="background: $main_color;">$list_title</p>
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
					<th class="contactTitle" style="background: $main_color;">お問い合わせ</th>
					<td class="contactCompany" style="font-size: $contact_company_text_size;">$contact_company</td>
					<td class="contactTel">TEL:$contact_tel</td>
					<td class="contactEmailTitle">メールアドレス:</td>
					<td class="contactEmail" style="font-size: $contact_mail_text_size;">$contact_mail</td>
				</tr>
			</table>
		</div>
	</body>
	<style>
		.listTable p::before {
			background: $select_sub_color
		}

		.listWrap.type--a {
			border-color: $main_color;
		}
	</style>
 </html>
EOM;

endif;
?>
