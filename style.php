<?php
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

html {
  font-family: "Noto Sans JP", sans-serif;
  font-size: 67.5%;
}

img {
  width: 100%;
}

.header {
  background: #003c78;
  color: #fff;
  font-size: 30px;
  padding: 1rem 0;
  text-align: center;
}

.contentTop {
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
  font-size: 30px;
  padding: 0.8rem;
}
.title_main {
  font-size: 70px;
  padding: 10px;
}
.title_notice {
  background: #f00;
  border-radius: 50%;
  color: #fff;
  font-size: 3rem;
  height: 15rem;
  line-height: 50px;
  position: absolute;
  right: 10px;
  text-align: center;
  top: 300px;
  width: 15rem;
  z-index: 2;
  display: table-cell;
}

.title_noticeWrap {
display: table;
}

.detailWrap {
  background: #fff;
  padding: 10px 0;
}
.detailTable {
  font-size: 20px;
  margin: 0 auto;
  width: 80%;
}
.detailTable tr {
  padding-bottom: 10px;
}
.detailTable th {
  color: #fff;
  padding: 0 10px 10px 0;
  text-align: center;
  width: 10%;
}
.detailTable th span {
  background: #003c78;
  border-radius: 30px;
}
.detailTable td.long {
  width: 60%;
}
.detailTable td.short {
  width: 20%;
}

.listWrap {
  margin: 0 auto;
  width: 95%;
}
.listTitle {
  background: #003c78;
  color: #fff;
  font-size: 20px;
  padding: 5px 0;
  text-align: center;
}
.listTable {
  width: 100%;
}
.listTable td {
  background: #016fb9;
  color: #fff;
  width: 49%;
  border-bottom: 3px solid #fff;
}
	</style>
EOM;
