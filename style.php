<?php
// 全体サイズ 1102.5px
$style = <<<EOM
	<style>
html, body, div, span, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
abbr, address, cite, code,
del, dfn, em, img, ins, kbd, q, samp,
small, strong, sub, sup, var,
b, i,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, summary,
time, mark, audio, video {
  background: transparent;
  border: 0;
  margin: 0;
  outline: 0;
  padding: 0;
  vertical-align: baseline;
}

table {
  border-collapse: collapse;
}

html {
  font-family: serif;
  font-size: 67.5%;
}

img {
  width: 100%;
}

.header {
  height: 30.5px;
  line-height: 25px;
  padding: 10px 0;
  background: #003c78;
  color: #fff;
  font-size: 17px;
  text-align: center;
}

.contentTop {
  height: 340px;
  position: relative;
}

.titleWrap {
  color: #fff;
  left: 0;
  padding: 50px 0;
  position: absolute;
  top: 0;
  z-index: 2;
}

.title_sub {
  background: #003c78;
  display: inline-block;
  font-size: 18px;
  padding: 8px;
}

.title_main {
  font-size: 40px;
  line-height: 1.4;
  padding: 0 10px 10px;
  text-shadow: 2px 3px 8px rgba(0, 0, 0, 0.8);
}

.title_notice {
  background: #f00;
  border-radius: 50%;
  color: #fff;
  display: table-cell;
  font-size: 15px;
  line-height: 30px;
  text-align: center;
  vertical-align: middle;
}

.title_notice p {
  position: relative;
  top: -5px;
}

.title_noticeWrap {
  bottom: 100px;
  display: table;
  height: 50px;
  position: absolute;
  right: 10px;
  width: 100px;
  z-index: 2;
}

.detailWrap {
  height: 78px;
  background: #fff;
  padding: 10px 0 0;
}

.detailTable {
  font-size: 20px;
  margin: 0 auto;
  width: 87%;
}

.detailTable tr {
  padding-bottom: 12px;
}

.detailTable th {
  color: #fff;
  font-size: 18px;
  padding: 0 10px 15px 0;
  text-align: center;
  width: 15%;
}

.detailTable th span {
  background: #003c78;
  border-radius: 30px;
  font-weight: normal;
  display: block;
}

.detailTable td {
  border: 0;
  color: #000;
  display: inline-block;
  font-size: 24px;
  vertical-align: top;
  position: relative;
  top: -4px;
}

.detailTable td.long {
  width: 95%;
}

.detailWeek {
  background: #000;
  color: #fff;
  font-size: 20px;
  margin: 0 10px 0 5px;
  padding: 2px;
}

.detailTime {
  font-size: 25px;
}

.detailUnit {
  font-size: 18px;
  margin-left: 5px;
}

.listWrap {
  margin: 0 auto;
  height: 280px;
  width: 98%;
}

.listTitle {
  background: #003c78;
  color: #fff;
  font-size: 20px;
  padding: 5px 0;
  text-align: center;
  margin-bottom: 15px;
}

.listTable {
  border: 0;
  width: 100%;
}

.listTable div {
  font-size: 0;
  margin-bottom: 6px;
}

.listTable div:last-of-type {
  margin-bottom: 0;
}

.listTable p {
  background: #016fb9;
  border: 0;
  box-sizing: border-box;
  color: #fff;
  display: inline-block;
  font-size: 16px;
  padding: 10px 5px;
  width: 48.2%;
}

.listTable p::before {
  background: #000;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 5px;
  vertical-align: middle;
  width: 15px;
  margin-top: 5px;
}

.listTable p:first-of-type {
  margin-right: 1%;
}

.message {
  font-size: 15px;
  height: 40px;
  padding-bottom: 10px;
  width: 98%;
  margin: 0 auto;
}

.application {
  background: #00f;
  font-size: 0;
  height: 55px;
  padding: 15px 20px 0;
}

.applicationText {
  font-size: 22px;
}

.applicationTextWrap {
  color: #fff;
  display: inline-block;
  font-size: 14px;
  text-align: center;
  vertical-align: middle;
  width: 90%;
}

.applicationUrl {
  font-size: 20px;
}

.applicationArrow {
  color: #fff;
  display: inline-block;
  font-size: 14px;
  height: 20px;
  vertical-align: middle;
  width: 3%;
}

.applicationImgWrap {
  display: inline-block;
  vertical-align: middle;
  width: 7%;
}

.profileWrap {
  padding: 10px;
  height: 180px;
  width: 100%;
}

.profileWrap table {
  width: 100%;
}

.profileWrap tr {
  width: 100%;
}

.profileImg {
  width: 150px;
  fheight: 200px;
}

.profileImg img {
  width: 100%;
}

.profileDetail {
  padding: 10px;
  vertical-align: top;
  width: 80%
}

.profileDetailHead {
  border-bottom: 1px solid #003c78;
  color: #003c78;
  font-size: 25px;
  line-height: 1;
}

.profileTitle {
  font-size: 18px;
  display: inline-block;
  vertical-align: middle;
}

.profileName {
  display: inline-block;
  font-size: 40px;
  vertical-align: middle;
}

.profileText {
  font-size: 15px;
  line-height: 1.3;
  padding: 5px 0;
  width: 100%;
  word-wrap: break-word;
}

.contact {
  background: #000;
  color: #fff;
  height: 20px;
  padding: 12px 10px;
}

.contactWrap {
  font-size: 20px;
  width: 100%;
}

.contactTitle {
  background: #003c78;
  border-radius: 30px;
  font-size: 15px;
  vertical-align: middle;
  width: 13%;
  font-weight: normal;
}

.contactCompany {
  padding-left: 10px;
  width: 27%;
  font-size: 15px;
}

.contactTel {
  width: 27%;
  font-size: 15px;
}

.contactEmail {
  width: 33%;
  font-size: 15px;
}
</style>
EOM;
