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
  font-size: 67.5%;
  font-family: serif;
}

img {
  width: 100%;
}

.header {
  height: 40px;
  font-style: bold;
  background: #003c78;
  color: #fff;
  font-size: 18px;
  letter-spacing: -1px;
  line-height: 1.1;
  text-align: center;
}

.contentTop {
  font-style: bold;
  height: 310px;
  position: relative;
}

.mainImage {
  height: 310px;
  overflow: hidden;
}

.mainImage img {
  heght: 310px;
}

.titleWrap {
  color: #fff;
  left: 0;
  padding: 35px 0;
  position: absolute;
  top: 0;
  z-index: 2;
}

.title_sub {
  background: #003c78;
  display: inline-block;
  line-height: 0.8;
  font-size: 20px;
  padding: 5px 8px;
}

.title_main {
  font-size: 40px;
  line-height: 0.9;
  padding: 0 10px 10px;
  text-shadow: 2px 3px 8px rgba(0, 0, 0, 0.8);
}

.title_notice {
  color: #fff;
  padding-top: 30px;
  text-align: center;
  font-size: 27px;
}

.title_notice p {
  position: relative;
  line-height: 0.7;
}

.title_noticeWrap {
  background: #f00;
  border-radius: 50%;
  bottom: 10px;
  height: 150px;
  position: absolute;
  right: 10px;
  width: 150px;
  z-index: 2;
}

.detailWrap {
  height: 78px;
  background: #fff;
  padding: 10px 0 0;
}

.detailTable {
  font-size: 20px;
  font-style: italic-bold;
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
  line-height: 0.8;
  padding: 2px 0;
  font-weight: normal;
  display: block;
}

.detailTable td {
  border: 0;
  color: #000;
  display: inline-block;
  font-size: 24px;
  line-height: 0.7;
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
  height: 300px;
  width: 98%;
}

.listTitle {
  background: #003c78;
  color: #fff;
  font-size: 20px;
  line-height: 0.8;
  font-style: italic-bold;
  padding: 5px 0;
  text-align: center;
  margin-bottom: 15px;
}

.listTable {
  font-style: bold;
  border: 0;
  width: 100%;
}

.listTable div {
  font-size: 0;
  margin-bottom: 10px;
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
  line-height: 0.8;
  padding: 10px 5px;
  width: 48.2%;
  position: relative;
}

.listTable p::before {
  background: #016fb9;
  border: 1px solid #fff;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 5px;
  vertical-align: middle;
  width: 15px;
  margin-top: 5px;
}

.listTable p::after {
  content: "";
  border-left: 4px solid yellow;
  border-bottom: 2px solid yellow;
  width: 17px;
  height: 10px;
  transform: rotate(-45deg);
  display: block;
  position: absolute;
  left: 3px;
  top: 10px;
}

.listTable p:first-of-type {
  margin-right: 1%;
}

.listWrap.type--a {
  border: 4px solid #003c78;
  height: 240px;
}

.listWrap.type--a .listTitle {
  margin-bottom: 5px;
}

.listWrap.type--a .listTable {
  padding: 0 10px;
}

.listWrap.type--a .listTable p {
  background: none;
  color: #000;
  padding: 5px;
  width: 100%;
}

.listWrap.type--a .listTable p::before {
  background: initial;
  border: 1px solid #000;
}

.listTable p::after {
  border-color: red;
  top: 6px;
}

.listWrap.type--a .listTable div {
  margin-bottom: 0;
}
.listWrap.type--a .listTable div:nth-of-type(4),
.listWrap.type--a .listTable div:last-of-type {
  display: none;
}

.message {
  font-size: 15px;
  line-height: 0.8;
  font-style: italic;
  height: 40px;
  padding-bottom: 10px;
  width: 98%;
  margin: 0 auto;
}

.listWrap.type--a + .message {
  height: 77px;
  padding: 15px 0 10px;
}

.application {
  background: #00f;
  font-size: 0;
  height: 72px;
  padding: 13px 20px 0;
}

.applicationText {
  font-size: 22px;
  line-height: 1;
  font-style: bold;
}

.applicationTextWrap {
  color: #fff;
  display: inline-block;
  font-size: 14px;
  text-align: center;
  vertical-align: middle;
  width: 87%;
}

.applicationUrl {
  font-size: 20px;
  font-style: bold;
  line-height: 0.7;
}

.applicationArrow {
  display: inline-block;
  position: relative;
  height: 32px;
  vertical-align: middle;
  width: 4%;
}

.applicationArrow span {
  background: yellow;
  display: inline-block;
  width: 7px;
  height: 7px;
  transform: rotate(45deg);
  position: absolute;
}

.applicationArrow span:nth-of-type(2) {
	left: 7px;
	top: 6px;
}

.applicationArrow span:nth-of-type(3) {
	left: 14px;
	top: 13px;
}

.applicationArrow span:nth-of-type(4) {
	left: 0px;
	top: 13px;
}

.applicationArrow span:nth-of-type(5) {
	left: 7px;
	top: 20px;
}

.applicationArrow span:last-of-type {
	left: 0;
	top: 27px;
}

.applicationImgWrap {
  display: inline-block;
  vertical-align: middle;
  width: 9%;
}

.profileWrap {
  padding: 10px;
  height: 175px;
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
  padding: 0 10px;
  vertical-align: top;
  width: 80%
}

.profileDetailHead {
  border-bottom: 1px solid #003c78;
  color: #003c78;
  font-size: 25px;
  line-height: 0.8;
}

.profileTitle {
  letter-spacing: -1;
  font-size: 19px;
  font-style: bold;
  display: inline-block;
  line-height: 0.8;
}

.profileName {
  display: inline-block;
  font-style: bold;
  font-size: 35px;
  line-height: 0.8;
  vertical-align: middle;
}

.profileText {
  font-size: 15px;
  font-style: italic;
  line-height: 0.9;
  padding: 5px 0;
  width: 100%;
  word-wrap: break-word;
}

.contact {
  background: #000;
  color: #fff;
  font-style: italic-bold;
  height: 30.5px;
  padding: 19px 10px 5px;
}

.contactWrap {
  font-size: 15px;
  width: 100%;
}

.contactTitle {
  vertical-align: center;
  line-height: 1;
  display: inline-block;
  background: #003c78;
  border-radius: 30px;
  padding: 0 3px 2px;
  box-sizing: border-box;
  font-weight: normal;
}

.contactCompany {
  display: inline-block;
  vertical-align: center;
  padding-left: 10px;
  width: 26%;
}

.contactTel {
  display: inline-block;
  width: 25%;
}

.contactEmail {
  display: inline-block;
  width: 33%;
}
</style>
EOM;
