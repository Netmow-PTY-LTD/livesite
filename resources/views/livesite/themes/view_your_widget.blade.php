<?php
$color_bg       =  $allbusinessinfo['livestyle'][0]->action_background_color;
$action_button  = $allbusinessinfo['actions']; 
//dd($staffs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="{{asset('themes/clinic/img/favicon.png')}}" type="image/png" sizes="16x16"> 
<title>MIYN Clinic</title>
<link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('themes/clinic/css/owl.carousel.min.css')}}">

<style type="text/css">
        body {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 400;
    color: #2F3A5F;
    /*background: #F1FCFF;*/
    margin: 0;
    overflow-x: hidden;
}
a {
    text-decoration: none;
    color: #2F3A5F;
    transition: all .3s;
}
a:hover {
    text-decoration: none;
    color: #2F3A5F;
}
.section-container {
    max-width: 1170px;
    margin: 0 auto;
}


.header-area {
	background: #fff;
	padding: 17px 0;
}
.header-row {
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.header-logo {
	width: 210px;
}
.header-logo img {
	max-height: 56px;
}
.header-menu {
	width: calc(100% - 210px);
	display: flex;
	justify-content: flex-end;
}
.side-menu-close {
	background: transparent;
	height: 40px;
	width: 40px;
	border-radius: 50%;
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
	align-items: center;
	justify-content: center;
    display: none;
    
}
.side-menu-close span {
	height: 2px;
	width: 20px;
	background: #fff;
	position: relative;
	opacity: 1;
	transition: .4s;
	-webkit-transition: .4s;
	-moz-transition: .4s;
	-ms-transition: .4s;
	-o-transition: .4s;
    display: block;
}
header .side-menu-close span {
	background: #21395F;
	width: 28px;
}
.side-menu-close span:nth-child(1) {
	top: -5px;
}
.side-menu-close span:nth-child(3) {
	bottom: -5px;
}
.side-menu-close.closed span:nth-child(1) {
	transform: translateY(7px) rotate(45deg);
	-webkit-transform: translateY(7px) rotate(45deg);
	-moz-transform: translateY(7px) rotate(45deg);
	-ms-transform: translateY(7px) rotate(45deg);
	-o-transform: translateY(7px) rotate(45deg);
}
.side-menu-close.closed span:nth-child(2) {
	opacity: 0;
}
.side-menu-close.closed span:nth-child(3) {
	transform: translateY(-7px) rotate(-45deg);
	-webkit-transform: translateY(-7px) rotate(-45deg);
	-moz-transform: translateY(-7px) rotate(-45deg);
	-ms-transform: translateY(-7px) rotate(-45deg);
	-o-transform: translateY(-7px) rotate(-45deg);
}
.side-menu-wrap {
	width: 240px;
	position: fixed;
	left: -100%;
	top: 0;
	background: #fff;
	height: 100%;
	box-shadow: 0 1px 5px 0 rgba(83, 83, 83, 0.2);
	overflow-y: auto;
	z-index: 15000;
	transition: .4s;
	-webkit-transition: .4s;
	-moz-transition: .4s;
	-ms-transition: .4s;
	-o-transition: .4s;
}
.side-menu-nav .main-menu {
    padding: 0;
}
.side-menu-wrap.opened {
	left: 0;
	transition: .8s;
	-webkit-transition: .8s;
	-moz-transition: .8s;
	-ms-transition: .8s;
	-o-transition: .8s;
}
.side-menu-nav ul {
	display: flex;
	flex-direction: column;
}
.side-menu-nav ul li {
	list-style: none;
}
.side-menu-nav ul li a {
	font-size: 18px;
	margin: ;
	padding: 4px 0;
	display: block;
}
@media only screen and (max-width: 991px) {
    .side-menu-close {
        display: flex;
    }
    .nav-menu-area {
        display: none;
    }
} 



.main-menu {
	display: flex;
	align-items: center;
}
.main-menu li a {
	font-size: 15px;
	font-weight: 500;
	text-transform: uppercase;
	padding: 0 18px;
	line-height: 49px;
}
.main-menu li {
    list-style: none;
}
.main-menu li a:hover {
    color: <?php echo $color_bg; ?>;
}
.main-menu .login {
	width: 145px;
	background: <?php echo $color_bg; ?>;
	font-size: 16px;
	font-weight: 500;
	color: #fff;
	line-height: 49px;
	cursor: pointer;
	transition: all .3s;
	border: none;
	margin-left: 20px;
	text-transform: uppercase;
}
.main-menu .login:hover {
    background: #061829;
}


.header-top-area {
	padding: 20px 0;
	background: <?php echo $color_bg; ?>;
	color: #fff;
	font-weight: 500;
}
.header-top-row {
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.header-top-left, .header-top-right {
	width: 50%;
}
.header-top-right {
	display: flex;
	align-items: center;
	justify-content: flex-end;
}
.header-top-right-single {
	padding: 0 25px;
	color: #fff;
	border-right: 1px solid #B8ECFF;
	display: flex;
	align-items: center;
	font-size: 14px;
}
.header-top-right-single img {
	margin-right: 6px;
}
.header-top-right-single:last-child {
    border-right: none;
    padding-right: 0;
}


.banner-area {
	position: relative;
	height: 784px;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
}
.banner-area::before {
	content: '';
	width: 100%;
	height: 100%;
	/*background: rgba(0, 147, 200, .6);*/
	position: absolute;
    top: 0;
    left: 0;
}
.banner-area .section-container {
	width: 100%;
	height: 100%;
}
.banner-row {
	height: calc(100% - 85px);
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	max-width: 950px;
	margin: 0 auto;
	position: relative;
	z-index: 1;
}
.banner-row h2 {
	margin: 0;
	font-size: 65px;
	text-align: center;
	line-height: 60px;
	margin-bottom: 22px;
	color: #fff;
}
.banner-row p {
	margin: 0;
	text-align: center;
	font-size: 18px;
	color: #fff;
	line-height: 29px;
	margin-bottom: 30px;
}
.banner-buttons button {
	width: 220px;
	height: 50px;
	border: 3px solid #fff;
	background: #fff;
	font-size: 14px;
	text-transform: uppercase;
	line-height: ;
	color: <?php echo $color_bg; ?>;
	font-weight: 600;
	transition: all .3s;
    cursor: pointer;
}
.banner-buttons .btn-border {
	background: transparent;
	color: #fff;
	margin-left: 10px;
}
.banner-buttons button:hover {
    background: <?php echo $color_bg; ?>;
    border-color: <?php echo $color_bg; ?>;
    color: #fff;
}
.banner-appointment {
	width: calc(100% - 30px);
	height: 85px;
	background: <?php echo $color_bg; ?>;
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 0 15px;
	color: #fff;
	font-size: 17px;
	text-transform: uppercase;
	font-weight: 600;
    position: relative;
    z-index: 1;
}
.banner-appointment img {
	margin-right: 12px;
}
.appointment-row {
	margin-top: 20px;
	margin-bottom: 70px;
}
.appointment-row iframe {
	border: none;
}

.about-area {
	padding-bottom: 100px;
}
.about-row {
	display: flex;
	align-items: flex-start;
}
.about-left-image {
	width: 420px;
	padding-top: 100px;
	position: relative;
	z-index: 9;
}
.about-left-image-inner {
	width: 100%;
	height: 599px;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
}
.about-right-text {
	width: calc(100% - 420px);
	background: #fff;
	padding: 100px 0 100px 100px;
	position: relative;
	min-height: 599px;
}
.about-right-text::before {
	content: '';
	position: absolute;
	top: 0;
	right: 100%;
	height: 100%;
	width: 220px;
	background-color: #ffffff;
}
.about-right-text::after {
	content: '';
	position: absolute;
	top: 0;
	left: 100%;
	height: 100%;
	width: 99999999px;
	background-color: #ffffff;
}
.about-right-text-inner h2 {
	font-size: 35px;
	font-weight: 600;
	text-transform: uppercase;
	margin: 0;
	line-height: 35px;
	margin-bottom: 30px;
	padding-bottom: 36px;
	border-bottom: 1px solid rgba(200, 200, 200, .6);
}
.about-right-text-inner p {
	margin: 0;
	line-height: 30px;
	text-align: justify;
	margin-bottom: 20px;
}
.about-right-text-inner p:last-child {
    margin-bottom: 0;
}


.home-gallery-row {
	display: flex;
}
.home-gallery-row .home-gallery-single {
	width: 25%;
	height: 712px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    position: relative;
    z-index: 1;
}
.home-gallery-row .home-gallery-single::after {
	content: "";
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-color: rgba(0, 0, 0, 1);
	opacity: 0.5;
	z-index: -1;
	transition: all 0.3s ease 0s;
}
.home-gallery-row .home-gallery-single:hover::after {
	left: 100%;
	transition: all 0.3s ease 0s;
}
.home-gallery-single h4 {
	font-size: 24px;
	font-weight: 500;
	color: #fff;
	text-transform: uppercase;
	margin-bottom: 53px;
	position: relative;
	z-index: 9;
}

.law-find-us {
	background: transparent;
	padding-bottom: 100px;
	padding-top: 100px;
}
.law-find-us-upper {
	padding: 31px 15px;
	background: #fff;
	border-top: 2px solid <?php echo $color_bg; ?>;
}
.law-find-us-upper h4 {
	font-size: 24px;
	font-weight: 700;
	text-transform: uppercase;
	margin: 0;
	line-height: 20px;
	color: <?php echo $color_bg; ?>;
	text-align: center;
}
.law-find-us-bottom {
	display: flex;
	background: #fff;
	border-top: 1px solid #E5E5E5;
	padding-bottom: 60px;
	flex-wrap: wrap;
	justify-content: space-between;
}
.law-find-us-bottom .left, .law-find-us-bottom .right {
	width: calc(50% - 40px);
}
.single-fine-us-block {
	min-height: 165px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0px;
	border-bottom: 1px solid #E5E5E5;
	transition: all .3s;
	width: calc(50% - 20px);
}
.single-fine-us-block:hover {
	color: #2F3A5F;
	background: #DFF7FF;
}
.single-fine-us-block-left {
	width: calc(100% - 85px);
}
.single-fine-us-block-left-upper {
	display: flex;
	align-items: center;
	margin-bottom: 12px;
}
.single-fine-us-block-left-upper .icon {
	width: 32px;
	background: <?php echo $color_bg; ?>;
	height: 32px;
	display: flex;
	align-items: center;
	justify-content: center;
	background-repeat: no-repeat;
	background-size: auto;
	background-position: center;
}
.single-fine-us-block-left-upper .icon img {
	max-height: 19px;
}
.single-fine-us-block-left-bottom {
	font-size: 14px;
	line-height: 20px;
}
.single-fine-us-block-right {
	width: 45px;
}
.single-fine-us-block-left-upper h4 {
	margin: 0;
	width: calc(100% - 32px);
	padding-left: 10px;
	font-weight: 600;
	text-transform: uppercase;
}
.single-fine-us-block-right {
	width: 45px;
	height: 45px;
	border: 1px solid #E2E2E2;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 50%;
    transition: all .3s;
}
.find-us-head {
	padding: 30px 40px;
	background: #fff;
	font-size: 27px;
	font-weight: 600;
	text-transform: uppercase;
	line-height: 1;
}
.single-fine-us-block:hover .single-fine-us-block-right {
    border-color: <?php echo $color_bg; ?>;
    background: <?php echo $color_bg; ?>;
}
.single-fine-us-block:hover .single-fine-us-block-right img {
    filter: grayscale(0) brightness(100);
}
.law-find-us .section-container {
	position: relative;
	z-index: 9;
}
.single-fine-us-block-inner {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0 40px;
	width: 100%;
}

.team-area {
	padding: 90px 0;
	background: #ffff;
}
.team-title h2 {
	text-align: center;
	text-transform: uppercase;
	margin: 0;
	font-size: 31px;
	line-height: 1;
	margin-bottom: 40px;
}
.team-row {
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.team-single {
	width: calc(25% - 65px);
	background: #F9F9F9;
	border-radius: 5px;
	box-shadow: 0 4px 3px #DFDFDF;
	padding: 24px 25px 35px;
	display: flex;
	flex-direction: column;
	align-items: center;
}
.team-single .avater {
	width: 111px;
	height: 111px;
	border-radius: 50%;
}
.team-single h4 {
	font-size: 20px;
	font-weight: 700;
	margin-top: 10px;
	margin-bottom: 0;
}
.team-single .email-ids {
	font-size: 12px;
	font-weight: 600;
	line-height: 1;
}
.team-single p {
	font-size: 12px;
	text-align: center;
	font-weight: 500;
	margin-top: 15px;
	margin-bottom: 0;
}


.law-contact {
	padding: 70px 0;
}
.law-contact .law-row {
	background: #fff;
}
.law-contact-con-us {
	width: 560px;
	border-left: 1px solid #EBEBEB;
}
.law-contact-title {
	border-bottom: 1px solid #E5E5E5;
	height: 90px;
	padding-left: 80px;
	display: flex;
	align-items: center;
}
.law-contact-title .icon .img {
	width: 32px;
	height: 32px;
	background: #C29C6A;
	display: flex;
	align-items: center;
	justify-content: center;
}
.law-contact-title .icon {
	display: flex;
	align-items: center;
}
.law-contact-title .icon h3 {
	margin: 0;
	font-size: 16px;
	font-weight: 600;
	padding-left: 14px;
    text-transform: uppercase;
}
.law-contact-hour-list {
	margin: 40px 0;
	padding: 0 80px;
	border-right: 1px solid #E5E5E5;
}
.law-contact-hour-list-single {
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 8px 0;
	border-bottom: 1px solid #F3F3F3;
}
.law-contact-hour-list-single:last-child {
    border-bottom: none;
}
.law-contact-list, .law-contact-social {
	padding: 0 65px;
}
.law-contact-hour {
	width: calc(100% - 560px);
}
.law-contact-list-single {
    display: flex;
    align-items: center;
    padding: 10px 0;
}
.law-contact-list-single .icon {
	margin-right: 10px;
	width: 18px;
	height: 24px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.law-contact-list-single .icon i {
	font-size: 18px;
	color: #2DB9EB;
}
.law-contact-list-single a {
	line-height: 24px;
}
.law-contact-social h5 {
	font-size: 14px;
	font-weight: 400;
	margin: 13px 0;
}
.law-contact-social-button {
	display: flex;
	align-items: center;
	gap: 15px;
	flex-wrap: wrap;
}
.law-contact-social-button a {
	width: 35px;
	height: 35px;
	border: 1px solid #E8E8E8;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 50%;
	box-shadow: 0 3px 6px rgba(226, 226, 226, .5);
	transform: all .3s;
	color: #2DB9EB;
	font-size: 13px;
}
.law-contact-social-button a:hover {
    background: #2F3A5F;
    box-shadow: none;
    border-color: #2F3A5F;
}
.contact-wrapper {
	background: #fff;
	padding-bottom: 35px;
}
.contact-title {
	padding: 25px 15px 25px 80px;
	font-size: 22px;
	font-weight: 700;
	text-transform: uppercase;
	color: <?php echo $color_bg; ?>;
	line-height: 1;
	border-bottom: 1px solid #E5E5E5;
	margin-bottom: 30px;
}
.law-contact .section-row {
	display: flex;
}
.form-wrapper {
	padding: 0 80px;
}

.form-wrapper input, .form-wrapper select {
	background: transparent;
	border: none;
	border-bottom-color: currentcolor;
	border-bottom-style: none;
	border-bottom-width: medium;
	border-bottom: 1px solid #EBEBEB;
	height: 54px;
	font-size: 14px;
	font-weight: 500;
	color: #818181;
}
.form-wrapper input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #818181;
  opacity: 1; /* Firefox */
}

.form-wrapper input:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #818181;
}

.form-wrapper input::-ms-input-placeholder { /* Microsoft Edge */
  color: #818181;
}
.form-wrapper select {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
.form-wrapper textarea {
	background: transparent;
	border: none;
	border-bottom-color: currentcolor;
	border-bottom-style: none;
	border-bottom-width: medium;
	border-bottom: 1px solid #EBEBEB;
	width: 100%;
	height: 103px;
	padding-top: 20px;
	font-family: 'Poppins', sans-serif;
	font-size: 14px;
	font-weight: 400;
	color: #818181;
	resize: none;
}
.form-wrapper input[type="submit"] {
	width: 146px;
	height: 49px;
	border: none;
	background: <?php echo $color_bg; ?>;
	font-size: 15px;
	color: #fff;
	text-transform: uppercase;
	margin-top: 30px;
	cursor: pointer;
	transition: all .3s;
}
.form-wrapper input[type="submit"]:hover {
    background: #061829;
}
.form-row-two {
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.form-row-two input, .form-row-two select {
    width: calc(50% - 14px)
}
.form-row input {
    width: 100%;
}
.law-contact-head {
	margin-bottom: 25px;
	display: flex;
	align-items: center;
	padding-left: 65px;
}
.law-contact-head .icon {
	width: 32px;
	height: 32px;
	background: <?php echo $color_bg; ?>;
	display: flex;
	align-items: center;
	justify-content: center;
    margin-right: 8px;
}
.law-contact-head span {
	font-size: 16px;
	font-weight: 600;
	width: calc(100% - 40px);
}
.law-contact-list {
	margin-bottom: 25px;
}

.footer-area {
	background: #2F3A5F;
	padding-top: 60px;
	padding-bottom: 50px;
	color: #fff;
	font-size: 18px;
	margin-top: -7px;
}
.footer-logo-area {
	display: flex;
	flex-direction: column;
	align-items: center;
}
.footer-logo-area a img {
    max-height: 56px;
}
.footer-menu {
	display: flex;
	align-items: center;
	justify-content: center;
}
.footer-menu a {
	color: #fff;
	padding: 0 19px;
	position: relative;
    transition: all .3s;
}
.footer-menu a:hover, .footer-bottom-area a:hover {
    color: <?php echo $color_bg; ?>;
}
.footer-menu a::after {
	content: '';
	width: 1px;
	height: 14px;
	background: #FFF;
	display: inline-block;
	position: absolute;
	right: 0;
	top: 5px;
}
.footer-menu a:last-child::after {
	display: none;
}
.footer-bottom-area {
    background: #2F3A5F;
    border-top: 1px solid rgba(254, 254, 254, .4);
	color: #fff;
	text-align: center;
	padding: 23px 0;
	font-size: 16px;
}
.footer-bottom-area a {
    color: #fff;
}

@media only screen and (max-width: 1170px) {
    .header-top-row, .header-row, .banner-row, .appointment-row, .about-row, .team-wrapper, .footer-logo-area, .footer-menu,  .footer-bottom-area {
        padding-left: 15px;
        padding-right: 15px;
    }
    .home-gallery-row .home-gallery-single {
        height: 500px;
    }
}

@media only screen and (max-width: 991px) {
    .header-top-area {
        display: none;
    }
    .about-right-text {
        padding-left: 30px;
    }
    .about-row {
        flex-direction: column;
    }
    .about-left-image {
        width: 100%;
        padding: 0;
    }
    .about-right-text {
        width: 100%;
        padding-left: 0;
        padding-top: 31px;
        padding-bottom: 32px;
        min-height: auto;
    }
    .about-right-text-inner h2 {
        margin-bottom: 13px;
        padding-bottom: 18px;
    }
    .about-area {
        padding-bottom: 80px;
    }
    .home-gallery-row, .law-find-us-bottom, .team-row, .law-contact .section-row {
        flex-wrap: wrap;
    }
    .home-gallery-row .home-gallery-single {
        width: 100%;
        height: 300px;
    }
    .law-find-us, .team-area {
        padding-bottom: 80px;
        padding-top: 80px;
    }
    .single-fine-us-block {
        width: 100%;
        min-height: auto;
        padding: 40px 0;
    }
    .team-single {
        width: 100%;
        margin-bottom: 30px;
    }
    .team-single:last-child {
        margin-bottom: 0;
    }
    .contact-title {
        padding-left: 15px;
    }
    .law-contact-hour {
        width: 100%;
        margin-bottom: 66px;
    }
    .form-wrapper {
        padding: 0 15px;
    }
    .law-contact-con-us {
        width: 100%;
    }
    .law-contact-head, .law-contact-list, .law-contact-social {
        padding: 0 15px;
    }
    .about-left-image-inner {
        height: 400px;
    }
}
@media only screen and (max-width: 500px) {
    .banner-area {
        height: 650px;
    }
    .banner-row h2 {
        font-size: 36px;
        line-height: 1.2;
    }
    .banner-buttons {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .banner-buttons .btn-border {
        margin-left: 0;
        margin-top: 15px;
    }
    .about-area {
        padding-bottom: 60px;
    }
    .law-find-us, .team-area {
        padding-bottom: 50px;
        padding-top: 50px;
    }
    .find-us-head, .single-fine-us-block-inner, .team-single {
        padding-left: 15px;
        padding-right: 15px;
    }
    .law-contact {
        padding: 0;
    }
    .contact-title {
        padding-top: 50px;
    }
    .contact-wrapper {
        padding-bottom: 50px;
    }
    .form-wrapper input[type="submit"] {
        margin-top: 15px;
    }
}
@media only screen and (max-width: 350px) {
    .footer-menu {
        flex-wrap: wrap;
    }
    .footer-menu {
        flex-wrap: wrap;
        flex-direction: column;
    }
    .footer-menu a::after {
        display: none;
    }
    .footer-menu a {
        margin-bottom: 10px;
    }
    .footer-menu a:last-child {
        margin-bottom: 0;
    }
    .about-right-text-inner p {
        text-align: left;
    }
    .form-row-two {
        flex-wrap: wrap;
    }
    .form-row-two input, .form-row-two select {
        width: 100%;
    }
}
    </style>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

 <section class="header-top-area">
       <div class="section-container">
           <div class="header-top-row">
               <div class="header-top-left">
                   Quality private medical healthcare
               </div>
               <div class="header-top-right">
                   <a href="mailto:demo" class="header-top-right-single">
                       <img src="{{asset('themes/clinic/img/ht-mail.png')}}" alt="icon">
                       <span>Contact us</span>
                   </a>
                   <a href="#" class="header-top-right-single">
                       <img src="{{asset('themes/clinic/img/ht-location.png')}}" alt="icon">
                       <span>Our location</span>
                   </a>
                   <a href="tel:(1800) 217 217" class="header-top-right-single">
                       <img src="{{asset('themes/clinic/img/ht-phone.png')}}" alt="icon">
                       <span>(1800) 217 217</span>
                   </a>
               </div>
           </div>
       </div>
   </section>
    <header class="header-area">
         <div class="section-container">
            <div class="header-row">
                 <div class="header-logo">
                     <a><img src="<?php echo $appurl; ?>/images/business_logo/<?php echo ($allbusinessinfo->logo_image !="") ? $allbusinessinfo->logo_image : 'default_logo.png'; ?>"  alt="logo"></a>
                 </div>
                 <div class="header-menu">
                     <nav class="nav-menu-area">
                         <ul class="main-menu">
                             <li><a href="#">Private Medical</a></li>
                             <li><a href="#">Aesthetic</a></li>
                             <li><a href="#">IV Therapy</a></li>
                             <li><a href="#">Pharmacy</a></li>
                             <li><button class="login">Login</button></li>
                         </ul>
                     </nav>
                    <!-- side menu start -->
                    <div class="side-menu-close">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="side-menu-wrap">

                      <nav class="side-menu-nav">
                        <!-- auto generated side menu from top header menu -->
                      </nav>
                    </div>
                    <!-- side menu end -->
                 </div>
            </div>
         </div>
     </header>
    <section class="banner-area" style="background-image: url({{asset('themes/clinic/img/banner.png')}})">
         <div class="section-container">
             <div class="banner-row">
                 <h2>QUALITY PRIVATE MEDICAL <br /> HEALTHCARE</h2>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet commodo leo. Pellentesque pretium lacus eget dolor dictum, sed dapibus purus mollis.</p>
                 <div class="banner-buttons">
                     <button>Book a consultation</button>
                     <button class="btn-border">our Services</button>
                 </div>
             </div>
             <div class="banner-appointment">
                 <img src="{{asset('themes/clinic/img/appointment.png')}}" alt="Icon">
                 Select Appointment Type
             </div>
         </div>
     </section>
    <section class="appointment-area">
         <div class="section-container">
             <div id="appointment-row" class="appointment-row">
                 <!--<iframe id='iFrame' src="{{config('app.live_url')}}/online_newschedule/{{$uid}}" style='display: block;height: 470px;width: 100%'></iframe>-->
             </div>
         </div>
     </section>
    <section class="about-area">
         <div class="section-container">
             <div class="about-row">
                 <div class="about-left-image">
                     <div class="about-left-image-inner" style="background-image: url({{asset('themes/clinic/img/about-image.png')}})"></div>
                 </div>
                 <div class="about-right-text">
                     <div class="about-right-text-inner">
                         <h2>ABOUT US</h2>
                         <p>Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur. Ut ut dolor sed nisi malesuada faucibus eget pellentesque lacus. Suspendisse tincidunt lorem orci, id iaculis augue dignissim id. Curabitur in justo in purus ornare egestas eu sit amet turpis. Sed quis rutrum urna. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula tortor sit amet lorem fermentum commodo eu sed odio. Integer viverra, massa vitae eleifend luctus. </p>
                        

                            <p>Curabitur vehicula tortor sit amet lorem fermentum commodo eu sed odio. Integer viverra, massa vitae eleifend luctus, mi velit luctus nulla, eget interdum nulla purus eget libero. Morbi mollis dictum felis, eget pretium eros. Aliquam tellus augue, convallis nec malesuada at, tincidunt quis odio. Sed consectetur ligula ex, quis convallis justo fringilla sit amet. Curabitur in sapien nunc. Mauris bibendum at nulla eget semper. Maecenas sit amet volutpat elit. Curabitur in sapien nunc. Mauris bibendum at nulla eget semper. Maecenas sit amet volutpat elit.Curabitur in sapien nunc. Mauris bibendum at nulla eget semper. Maecenas sit amet volutpat elit.</p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
    <section class="home-gallery-area">
        <div class="home-gallery-row">
            <div class="home-gallery-single" style="background-image: url({{asset('themes/clinic/img/gallery1.png')}})">
                <h4>Private Medical</h4>
            </div>
            <div class="home-gallery-single" style="background-image: url({{asset('themes/clinic/img/gallery2.png')}})">
                <h4>Aesthetic</h4>
            </div>
            <div class="home-gallery-single" style="background-image: url({{asset('themes/clinic/img/gallery3.png')}})">
                <h4>IV Therapy</h4>
            </div>
            <div class="home-gallery-single" style="background-image: url({{asset('themes/clinic/img/gallery4.png')}})">
                <h4>Pharmacy</h4>
            </div>
        </div>
    </section>
    <section class="law-find-us">
        <div class="section-container">
           <div class="find-us-head">
               Find out us 
           </div>
            <div class="law-find-us-bottom">
                
                
                
                 <?php foreach ($action_button as $key => $value) {  ?>
                    
                    <a href="#" class="single-fine-us-block miyn<?php echo $value->calltoaction; ?>">
                        <div class="single-fine-us-block-inner">
                            <div class="single-fine-us-block-left">
                                <div class="single-fine-us-block-left-upper">
                                    <div class="icon">
                                        <img src="{{asset('images/asset')}}/<?php echo $value->icon; ?>" alt="Icon">
                                    </div>
                                    <h4><?php echo $value->name; ?></h4>
                                </div>
                                <div class="single-fine-us-block-left-bottom">
                                    Want to setup an appointment? Easy. Choose a time that suits you and we'll confirm fast.
                                </div>
                            </div>
                            <div class="single-fine-us-block-right">
                                <img class="" src="{{asset('themes/lawyer/img/arrow-left.png')}}" alt="Icon">
                            </div>
                        </div>
                    </a>
                
                <?php }  ?>
               
               
            </div>
        </div>
    </section>
    <section class="team-area">
        <div class="section-container">
            <div class="team-wrapper">
                <div class="team-title">
                    <h2>OUR experienced doctors</h2>
                </div>
                <div class="team-row">
                    <div class="team-single">
                        <div class="avater" style="background-image: url({{asset('themes/clinic/img/avatar.png')}})"></div>
                        <h4>Fredrick Lueilwitz</h4>
                        <span class="email-ids">MBBS Medicine<span class="cancel-email">x</span></span>
                        <p>Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur.bibendum at nulla eget</p>
                    </div>
                    <div class="team-single">
                        <div class="avater" style="background-image: url({{asset('themes/clinic/img/avatar.png')}})"></div>
                        <h4>Fredrick Lueilwitz</h4>
                        <span class="email-ids">MBBS Medicine<span class="cancel-email">x</span></span>
                        <p>Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur.bibendum at nulla eget</p>
                    </div>
                    <div class="team-single">
                        <div class="avater" style="background-image: url({{asset('themes/clinic/img/avatar.png')}})"></div>
                        <h4>Fredrick Lueilwitz</h4>
                        <span class="email-ids">MBBS Medicine<span class="cancel-email">x</span></span>
                        <p>Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur.bibendum at nulla eget</p>
                    </div>
                    <div class="team-single">
                        <div class="avater" style="background-image: url({{asset('themes/clinic/img/avatar.png')}})"></div>
                        <h4>Fredrick Lueilwitz</h4>
                        <span class="email-ids">MBBS Medicine<span class="cancel-email">x</span></span>
                        <p>Vestibulum sagittis augue purus, at finibus risus tincidunt et. Nullam quis tempor magna, a malesuada est. Suspendisse lobortis libero ut orci euismod, at consequat felis consectetur.bibendum at nulla eget</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="law-contact">
        <div class="section-container">
            <div class="contact-wrapper">
               <div class="contact-title">
                   Make an Enquiry
               </div>
                <div class="section-row">
                    <div class="law-contact-hour">
                        <div class="form-wrapper">
                            <form action="#">
                                <div class="form-row-two">
                                    <input type="text" placeholder="First Name">
                                    <input type="text" placeholder="Last Name">
                                </div>
                                <div class="form-row">
                                    <input type="email" placeholder="Enter Email Address">
                                </div>
                                <div class="form-row-two">
                                    <select name="country" id="country">
                                      <option value="country">Country</option>
                                      <option value="saab">India</option>
                                      <option value="mercedes">Australian</option>
                                      <option value="audi">Ghana</option>
                                    </select>
                                    <input type="text" placeholder="Phone">
                                </div>
                                <div class="form-row">
                                    <input type="text" placeholder="Subject">
                                </div>
                                <div class="form-row">
                                    <textarea name="" id="">Message</textarea>
                                </div>
                                <div class="form-row">
                                    <input type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="law-contact-con-us">
                       <div class="law-contact-head">
                           <div class="icon">
                               <img src="{{asset('themes/clinic/img/bxs-contact.png')}}" alt="icon">
                           </div>
                           <span>CONTACT US</span>
                       </div>
                        <div class="law-contact-list">
                            <div class="law-contact-list-single">
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <a href="tel:+477937937">+477937937</a>
                            </div>
                            <div class="law-contact-list-single">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <a href="#">Surfers Paradise, QLD, 4217 AUSTRALIA</a>
                            </div>
                            <div class="law-contact-list-single">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="mailto:{{config('app.support_email')}}">{{config('app.support_email')}}</a>
                            </div>
                            <div class="law-contact-list-single">
                                <div class="icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <a href="{{config('app.main_url')}}">miyn.app</a>
                            </div>
                        </div>
                        <div class="law-contact-social">
                            <h5>Find us on-</h5>
                            <div class="law-contact-social-button">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d934673.0971364595!2d90.41932600000001!3d23.780636!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sus!4v1610795843575!5m2!1sen!2sus" width="100%" height="260" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
    <footer class="footer-area">
        <div class="section-container">
            <div class="footer-logo-area">
                <!--<a href="#"><img src="{{asset('themes/clinic/img/logo-white.png')}}" alt="Logo"></a>-->
                <a><img src="<?php echo $appurl; ?>/images/business_logo/<?php echo ($allbusinessinfo->logo_image !="") ? $allbusinessinfo->logo_image : 'default_logo.png'; ?>"  alt="logo"></a>

                <p>Pellentesque pretium lacus eget dolor dictum, sed dapibus purus mollis.</p>
            </div>
            <div class="footer-menu">
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Services</a>
                <a href="#">Blog</a>
            </div>
        </div>
    </footer>
    <section class="footer-bottom-area">
        <div class="section-container">
            Copyright All Rights Reserved © 2020 | <a href="#">MIYN</a> Lead Generation.
        </div>
    </section>

 <script src="{{asset('themes/clinic/js/main.js')}}"></script>
    
<script type='text/javascript' charset='utf-8'>
window.onload = function() {
    MIYNLive.init({
		uid: '{{$uid}}',
		ui: false,
		buttonprefix: true,
    	paramName: 'action'
	});
};
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0],
        p = 'https://',
        r = new Date().getDate();// Math.floor((20000000 - 10) * Math.random());
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id; js.setAttribute('crossorigin','anonymous');  js.setAttribute('async','true'); 
    js.src = p + "{{config('app.live_url')}}/site/js/live-script.js?q=" + r;
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'miynsite-jssdk'));
</script>

<script>
  

    $( document ).ready(function() {
        iframload();
    });
    
    var iframload = function() {
        
        console.log('iframload');
        
            /*        var f = document.createElement('iframe');
            		f.style.display = "block";
            		f.style.width = "100%";
            		f.id="appointment-iframe-details";
            		f.src = "{{config('app.live_url')}}/online_newschedule/{{$uid}}";
            		f.frameBorder="0";
            		$('#appointment-row').html(f);*/
		            /*var xhttp = new XMLHttpRequest();
                	xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var data = this.responseText;
                            //console.log(data);
                                
                            //	$('#appointment-row').html(data);
                            //console.log('--- Promise ---');
                        } 
                    };
                    var url= "{{config('app.live_url')}}/online_newschedule/{{$uid}}";
                    //console.log(url);
                    xhttp.open("GET", url, true);
                    xhttp.send();*/
		        
		
    }
     
     
</script>

<script>
$(document).ready(function(){
    var op = hexToRgbA("<?php echo $color_bg; ?>", 0.1);
    console.log(op);
  $("body").css({ "background-color" : op });
  $(".banner-area::before").css({ "background" : op });
  
  var bef = hexToRgbA("<?php echo $color_bg; ?>", 0.5);
  addStyle(bef);
  
});


function addStyle(color) {
    $('<style type="text/css">.banner-area::before { background: ' + color + ';</style>').appendTo('head');
}


function hexToRgbA(hex, opc){
    console.log(opc);
    var c;
    if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
        c= hex.substring(1).split('');
        if(c.length== 3){
            c= [c[0], c[0], c[1], c[1], c[2], c[2]];
        }
        c= '0x'+c.join('');
        return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+', '+opc+')';
    }
    throw new Error('Bad Hex');
}


</script>

</body>

</html>



