<?php
include_once("action.php");

function init_post_action($content) {
	global $post;
	$select_radio = createMetaItem("select_radio");
	$pdf_type = createMetaItem("pdf_type");
	$file_name = createMetaItem("input_file_name");
	$title = createMetaItem("input_title");
	$main_catch = createMetaItem("input_main_catch");
	$sub_catch = createMetaItem("input_sub_catch");
	$notice_text = createMetaItem("input_notice_text");
	$main_media = createMetaItem("main_media");
	$datetime = createMetaItem("input_datetime");
	$detail_item_date = createMetaItem("input_detail_item_date");
	$detail_item_start_time = createMetaItem("input_detail_item_start_time");
	$detail_item_end_time = createMetaItem("input_detail_item_end_time");
	$detail_item_capacity = createMetaItem("input_detail_item_capacity");
	$detail_item_place = createMetaItem("input_detail_item_place");
	$detail_item_price = createMetaItem("input_detail_item_price");
	$detail_item_date = $detail_item_date ? $detail_item_date : "";
	$detail_item_start_time = $detail_item_start_time ? $detail_item_start_time : "";
	$detail_item_end_time = $detail_item_end_time ? $detail_item_end_time : "";
	$detail_item_capacity = $detail_item_capacity ? $detail_item_capacity : "";
	$detail_item_place = $detail_item_place ? $detail_item_place : "";
	$detail_item_price = $detail_item_price ? number_format($detail_item_price) : "";
	$str_time = date("n月j日", strtotime($detail_item_date));
	$date = date('w', strtotime($detail_item_date));
	$week = ["日", "月", "火", "水", "木", "金", "土"];
	$list_title = createMetaItem("input_list_title");
	$list_01 = createMetaItem("input_list_01");
	$list_02 = createMetaItem("input_list_02");
	$list_03 = createMetaItem("input_list_03");
	$list_04 = createMetaItem("input_list_04");
	$list_05 = createMetaItem("input_list_05");
	$list_06 = createMetaItem("input_list_06");
	$list_07 = createMetaItem("input_list_07");
	$list_08 = createMetaItem("input_list_08");
	$list_09 = createMetaItem("input_list_09");
	$list_10 = createMetaItem("input_list_10");
	$list_01 = $list_01 ? $list_01 : "";
	$list_02 = $list_02 ? $list_02 : "";
	$list_03 = $list_03 ? $list_03 : "";
	$list_04 = $list_04 ? $list_04 : "";
	$list_05 = $list_05 ? $list_05 : "";
	$list_06 = $list_06 ? $list_06 : "";
	$list_07 = $list_07 ? $list_07 : "";
	$list_08 = $list_08 ? $list_08 : "";
	$list_09 = $list_09 ? $list_09 : "";
	$list_10 = $list_10 ? $list_10 : "";
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
	$post_id = $post->ID;

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
		//
		//
		//

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
					<p><span></span>$list_01</p>
					<p><span></span>$list_02</p>
				</div>
				<div>
					<p><span></span>$list_03</p>
					<p><span></span>$list_04</p>
				</div>
				<div>
					<p><span></span>$list_05</p>
					<p><span></span>$list_06</p>
				</div>
				<div>
					<p><span></span>$list_07</p>
					<p><span></span>$list_08</p>
				</div>
				<div>
					<p><span></span>$list_09</p>
					<p><span></span>$list_10</p>
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
			<div class="contactWrap">
				<span class="contactTitle">お問い合わせ</sapn>
				<span class="contactCompany">$contact_company</span>
				<span class="contactTel">TEL:$contact_tel</span>
				<span class="contactEmail">メールアドレス:$contact_mail</span>
			</div>
		</div>
			<div class="opap__wrap">
				<form action="" method="post">
					<input type="hidden" name="dw" value="true">
					<input type="hidden" name="pdf_type" value="$pdf_type">
					<input type="hidden" name="file_name" value="$file_name">
					<input type="hidden" name="title" value="$title">
					<input type="hidden" name="sub_catch" value="$sub_catch">
					<input type="hidden" name="main_catch" value="$main_catch">
					<input type="hidden" name="notice_text" value="$notice_text">
					<input type="hidden" name="main_media" value="$main_media">
					<input type="hidden" name="detail_item_date" value="$detail_item_date">
					<input type="hidden" name="detail_item_start_time" value="$detail_item_start_time">
					<input type="hidden" name="detail_item_end_time" value="$detail_item_end_time">
					<input type="hidden" name="detail_item_capacity" value="$detail_item_capacity">
					<input type="hidden" name="detail_item_place" value="$detail_item_place">
					<input type="hidden" name="detail_item_price" value="$detail_item_price">
					<input type="hidden" name="list_title" value="$list_title">
					<input type="hidden" name="list_01" value="$list_01">
					<input type="hidden" name="list_02" value="$list_02">
					<input type="hidden" name="list_03" value="$list_03">
					<input type="hidden" name="list_04" value="$list_04">
					<input type="hidden" name="list_05" value="$list_05">
					<input type="hidden" name="list_06" value="$list_06">
					<input type="hidden" name="list_07" value="$list_07">
					<input type="hidden" name="list_08" value="$list_08">
					<input type="hidden" name="list_09" value="$list_09">
					<input type="hidden" name="list_10" value="$list_10">
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
					<input type="hidden" name="post_id" value="$post_id">
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
