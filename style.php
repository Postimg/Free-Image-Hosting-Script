<?php 
header("Content-type: text/css");
require_once 'bootstrap.php';
?>
/****** BODY *****/
body {
	font-family: <?=get_option('site_font') ?>;
	font-size:14px;
	color:<?=get_option('site_font_color') ?>;
}
body a {
	color:<?=get_option('site_links_color') ?>; 
}
body a:hover {
	color:<?=get_option('site_links_hover_color') ?>;
}
.container {
	width:940px;
}

/****** TOP NAV *****/
.top-menu {
	position: relative;
	margin:0 auto;
	width: 100%;
	border-bottom: <?=get_option('header_border_size') ?> solid <?=get_option('header_border_color') ?>;
}
.top-menu ul {
	list-style-type:none;
	margin:0;
	padding:0;
	float:right;
	width:540px;
}
.top-menu li {
	float:left;
	width:100px;
	height:30px;
	padding:10px 0 0 0;
	text-align:center;
}
.top-menu li:hover {
	background:<?=get_option('nav_link_hover_color') ?>;
}
.top-menu li:hover a {
	color:<?=get_option('nav_link_color') ?>;
	text-decoration:none;
}
.top-menu .active {
	background:<?=get_option('nav_link_hover_color') ?>;
}
.top-menu .active a{
	color:<?=get_option('nav_link_color') ?>;
}
/****** SITE NAME TOP NAV *****/
.site-name {
	padding-top:10px;
	font-family: 'Oswald', sans-serif;
	font-size:24px;
	float:left;
	width:400px;
	font-weight:700;
}
.site-name a {
	color: <?=get_option('site_title_link_color') ?>;
	text-decoration:none;
}
.site-name a:hover {
	color: <?=get_option('site_title_hover_color') ?>;
}
/****** HEADINGS *****/
h1,h2,h3,h4,h5,h6 {
	font-family: 'Oswald', sans-serif;
	text-shadow: 0 1px 0 #ffffff;
	color:<?=get_option('site_headings_color'); ?>;
}
/**** TOP COLUMNS ****/
.top-columns {
	position: relative;
	margin:0 auto;
	height:200px;
	width:100%;
	padding:10px 0 10px 0;
	color:<?=get_option('header_font_color') ?>;
	background: <?=get_option('header_gradient_1') ?>; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQxOTI0YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM4N2UyOTMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%, <?=get_option('header_gradient_2') ?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?=get_option('header_gradient_1') ?>), color-stop(100%,<?=get_option('header_gradient_2') ?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* IE10+ */
	background: linear-gradient(to bottom,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=get_option('header_gradient_1') ?>', endColorstr='<?=get_option('header_gradient_2') ?>',GradientType=0 ); /* IE6-8 */
}
.top-columns h2 {
	color:<?=get_option('header_headings_color') ?>;
}
/******FOOTER*****/
.footer {
	margin:10px auto;
	width:100%;
	border-top: <?=get_option('header_border_size') ?> solid <?=get_option('header_border_color') ?>;
	padding-top:10px;
	bottom:0px;
	color:<?=get_option('header_font_color') ?>;
	height:40px;
	background: <?=get_option('header_gradient_1') ?>; /* Old browsers */
	/* IE9 SVG, needs conditional override of 'filter' to 'none' */
	background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQxOTI0YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM4N2UyOTMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
	background: -moz-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%, <?=get_option('header_gradient_2') ?> 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?=get_option('header_gradient_1') ?>), color-stop(100%,<?=get_option('header_gradient_2') ?>)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* IE10+ */
	background: linear-gradient(to bottom,  <?=get_option('header_gradient_1') ?> 0%,<?=get_option('header_gradient_2') ?> 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?=get_option('header_gradient_1') ?>', endColorstr='<?=get_option('header_gradient_2') ?>',GradientType=0 ); /* IE6-8 */
}
.footer a {
	color:white;
	text-decoration:none;
}
/*****FILE INPUT****/
.SI-FILES-STYLIZED label.cabinet
{
	width: 107px;
	height: 36px;
	background: url(img/select-btn.png) 0 0 no-repeat;
	display: block;
	overflow: hidden;
	cursor: pointer;
}

.SI-FILES-STYLIZED label.cabinet input.file
{
	position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
}
.local-form {
	margin-left:150px;
}
.input-hidden {
	display:none;
}
.bg-container {
	width:994px;
	min-height: 350px;
	background:url('img/bg.png') no-repeat;
}
.image-thumbnail {
	border:1px solid #efefef;
	padding:3px;
	margin-right:10px;
	float:left;
	width:124px;
	height:89px;
}
.image-thumbnail img{
	border:1px solid #efefef; 
}
.image-thumbnail-gallery {
	text-align:center;
	border:5px solid white;
	margin-right:10px;
	margin-bottom:10px;
	float:left;
	width:124px;
	height:89px;
}
.image-thumbnail-gallery img {
	max-width:124px;
	max-height:89px;
}
.load_more {
	width:260px;
	margin-left:330px;
}
