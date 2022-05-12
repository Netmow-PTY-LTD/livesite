<?php

//dd($allbusinessinfo);


$color_bg   =   $allbusinessinfo['livestyle'][0]->action_background_color;
$widget_image   =   $allbusinessinfo['livestyle'][0]->label_partial_image;


$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

$ticker = file_get_contents(config('app.api_url')."/api/schedule/".$uid);

$obj = json_decode($ticker,true); // Split the JSON into arrays.
// $jsondata =  json_encode($obj);
//echo '<pre>';
//    dd($b_services);
//echo '</pre>';

//dd($b_services[0]->service);


$services = $b_services[0]->service;
$b_id = $allbusinessinfo->business_id;
//echo '<pre>';
//dd($service_info->toArray());
//echo '</pre>';

$imagelink = config('app.live_url')."/newdesign/";

?>
<!DOCTYPE html>
<html class="miyn-popup-load">
<head>

	<title>MIYN Widget</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- <link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet"> -->
	<link href="{{config('app.live_url')}}/newdesign/css/style.css" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	    body {
	        font-family: 'Poppins', sans-serif;
	    }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
        	border-radius: 10px;
            width: 10px;
        }
        html::-webkit-scrollbar-track, body::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #f1f1f1;
        }
        html::-webkit-scrollbar, body::-webkit-scrollbar {
        	border-radius: 10px;
        	width: 8px;
        	background-color: #ffffff;
        }
        html::-webkit-scrollbar-thumb, body::-webkit-scrollbar-thumb {
        	border-radius: 10px;
        	background-color: #D5D5E1;
        }
        a {
            text-decoration: none;
        }
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /*IFRAME LOADED BOX GLOBAL STYLE*/
        .miyn-iframe-popup-box:not(.miyn-popup-appointment-area) {
            display: none;
        }

        /*APPOINTMENT LIST POPUP STYLE 2*/
        .miyn-iframe-popup-box2 {
            display: none;
        }

        .miyn-iframe-popup-box2:nth-child(2) {
            display: block;
        }

        .miyn-popup-appointment-area.miyn-iframe-popup-box2 .appointment-list-area {
            background-color: transparent;
        }
        .miyn-iframe-popup-box2 .appointment-list-area {
            background-color: #F9F9F9;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px 10px;
        }
        .miyn-iframe-popup-box2 .appointment-list-area ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .miyn-iframe-popup-box2 .appointment-list-area ul li:not(:first-child) {
            margin-top: 10px;
            padding-top: 0;
            border-top: 0;
        }
        .miyn-iframe-popup-box2 .appointment-list-area ul li a {
        	display: flex;
            flex-flow: wrap row;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 3px;
            text-decoration: none;
            border: 1px solid #ffffff;
        }
        .miyn-iframe-popup-box2 .appointment-list-area ul li a:hover {
        	border-color: <?php echo $color_bg; ?>;
        }
        .miyn-iframe-popup-box2 .appointment-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 5px;
        }
        .miyn-iframe-popup-box2 .appointment-icon img {
            height: 18px;
            width: auto;
        }
        .miyn-iframe-popup-box2 .appointment-content {
            width: calc(100% - 40px);
            padding-left: 10px;
        }
        .miyn-iframe-popup-box2 .appointment-content h3 {
            font-size: 12px;
            font-weight: 600;
            color: <?php echo $color_bg; ?>;
            margin: 0 0 5px;
        }
        .miyn-iframe-popup-box2 .appointment-content p {
            color: #696969;
            font-size: 10px;
            margin: 0;
        }
        .miyn-iframe-popup-box2 .payment-duration {
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #F5F5F5;
        }
        .miyn-iframe-popup-box2 .payment-duration ul {
            display: flex;
            align-items: center;
        }
        .miyn-iframe-popup-box2 .payment-duration ul li {
            font-size: 10px;
            color: #7D7D7D;
            position: relative;
        }
        .miyn-iframe-popup-box2 .appointment-list-area .payment-duration ul li:not(:first-child) {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
            padding-left: 10px;
            margin-left: 10px;
        }
        .miyn-iframe-popup-box2 .payment-duration ul li:not(:first-child)::after {
        	content: "";
        	position: absolute;
        	top: 50%;
        	left: 0;
        	border-left: 1px solid #E9E9E9;
        	height: 10px;
        	transform: translate(0, -50%);
        }
        .miyn-iframe-popup-box2 .payment-duration ul li i {
            margin-right: 5px;
        }
        .miyn-iframe-popup-box2 .payment-duration ul li span {
            font-weight: 600;
            font-size: 12px;
            color: #7D7D7D;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-popup-footer {
            padding: 8px 20px;
            text-align: center;
            background-color: #F9F9F9;
        }
        .miyn-iframe-popup-box2 .selection-user-list-area {
        	background-color: #F9F9F9;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px 10px;
        }
        .select-user-title {
            font-size: 11px;
            color: #0E1130;
            font-weight: 600;
            margin: 0 0 10px;
        }
        .miyn-iframe-popup-box2 .selection-user-list-area ul li a {
            display: flex;
            align-items: center;
            padding: 12px;
            background-color: #ffffff;
            border-radius: 3px;
            border: 1px solid #ffffff;
        }
        .miyn-iframe-popup-box2 .selection-user-list-area ul li a:hover {
        	border-color: <?php echo $color_bg; ?>;
        }
        .selection-user-list-area .user-thumb {
            width: 55px;
            display: flex;
            align-items: center;
        }
        .selection-user-list-area .user-thumb img {
            max-width: 100%;
            height: auto;
        }
        .service-cat {
            margin: 0 0 15px;
            overflow: hidden;
        }
        .service-cat:not(:first-child) {
            margin-top: 15px;
        }
        .service-cat{
            margin: 0 0 15px;
            overflow: hidden;
            text-align: center;
        }
        .service-cat span {
            font-size: 12px;
            margin: 0;
            line-height: 16px;
            text-align: center;
            color: #BCBCBC;
            font-weight: 500;
            position: relative;
            display: inline-block;
        }
        .service-cat span::before {
            content: "";
            position: absolute;
            top: 50%;
            width: 500px;
            border-bottom: 1px solid #E4E4E4;
            margin-left: 15px;
            left: 100%;
        }
        .service-cat span::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 500px;
            border-bottom: 1px solid #E4E4E4;
            right: 100%;
            margin-right: 10px;
        }

        /*IFRAME BOX 2 USER LIST*/
        .miyn-iframe-popup-box2 ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .miyn-iframe-popup-box2 .selection-user-list-area ul li:not(:first-child) {
            padding-top: 0;
        	border-top: 0;
        	margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info {
            padding: 8px 15px;
            background-color: #ffffff;
            display: flex;
            /*align-items: center;*/
            margin-bottom: 10px;
            border-radius: 3px;
        }
        .miyn-iframe-popup-box2.miyn-appointment-schedule-area .miyn-widgets-selected-appointment-info {
            background-color: #F9F9F9;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .miyn-previous-popup {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid <?php echo $color_bg; ?>;
            border-radius: 100%;
            color: <?php echo $color_bg; ?>;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .miyn-previous-popup:hover {
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information {
            width: calc(100% - 30px);
            padding-left: 10px;
            box-sizing: border-box;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information h3 {
            font-size: 11px;
            color: #0E1130;
            font-weight: 600;
            line-height: 13px;
            margin-bottom: 2px;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information p {
            font-size: 10px;
            color: #515261;
        }
        .selected-staff-timezone {
            margin: 10px 0;
        }
        .selected-staff-timezone ul {
            display: flex;
            justify-content: space-between;
        }
        .selected-staff-timezone ul li {
            width: calc(50% - 10px);
            position: relative;
        }
        .selected-staff-timezone ul li:not(:first-child)::after {
            content: "";
            position: absolute;
            left: -15px;
            top: 50%;
            height: 100%;
            border-left: 1px solid #ECECEC;
            transform: translate(0, -50%);
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information .selected-slots {
            display: flex;
            align-items: center;
            flex-flow: wrap row;
            justify-content: space-between;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information ul li .selected-slots li {
            padding: 0;
            border-bottom: 0;
            position: relative;
            border-top: 0;
            width: calc(50% - 5px);
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information ul li .selected-slots li:nth-child(odd)::after {
            content: "";
            position: absolute;
            top: 0;
            right: -2px;
            height: calc(100% - 10px);
            border-right: 1px solid #ECECEC;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information .selected-slots li a {
            font-size: 13px;
            font-weight: 600;
            color: <?php echo $color_bg; ?>;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-selected-appointment-info .selected-appointment-information ul li p {
            color: #515261;
            font-size: 11px;
            margin: 0;
        }
        .miyn-iframe-popup-box2 .user-name {
            padding-left: 15px;
            width: calc(100% - 55px);
            box-sizing: border-box;
        }
        .miyn-iframe-popup-box2 .user-name h3 {
            font-size: 14px;
            color: <?php echo $color_bg; ?>;
            font-weight: 500;
            margin: 0 0 5px;
            line-height: 15px;
        }
        .miyn-iframe-popup-box2 .user-name p {
        	font-size: 10px;
        	line-height: 16px;
        	color: #696969;
        	margin: 0;
        }

        /*APPOINTMENT SCHEDULE POPUP STYLE*/
        .miyn-iframe-popup-box2 .scheule-popup-bottom-info {
            width: 100%;
            margin-top: 15px;
        }
        .scheule-popup-bottom-info p {
            font-size: 10px;
            line-height: 13px;
        }
        .miyn-iframe-popup-box2 .appointment-schedule-content-area {
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 15px 20px 10px;
            max-height: auto; /*max-height: 405px;*/
        	overflow-y: auto;
        }
        .miyn-iframe-popup-box2 .schedule-available-time-area {
            background-color: #F9F9F9;
            padding: 10px;
            overflow: hidden;
            position: relative;
            margin-top: 15px;
            padding-right: 4px;
        }
        .miyn-iframe-popup-box2 .schedule-available-time {
            display: flex;
            flex-flow: wrap row;
            width: 100%;
        }
        .schedule-available-time ul {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }
        li.schedule-time {
            /* flex-grow: 1; */
            width: calc(33.333% - 6px);
            /* height: 100px; */
            margin-bottom: 5px;
            margin-right: 6px;
        }
        
        .miyn-iframe-popup-box2 .schedule-time a {
            background-color: #ffffff;
            padding: 4px 0;
            border-radius: 5px;
            font-size: 12px;
            color: #696969;
            margin: 0;
            width: 100%;
            text-align: center;
            cursor: pointer;
            display: inline-block;
        }
        .miyn-iframe-popup-box2 .schedule-navigation-area {
            display: flex;
            flex-flow: wrap row;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
        }
        .miyn-iframe-popup-box2 .schedule-times-nav {
            text-align: left;
            width: 100px;
            display: flex;
        }
        .miyn-iframe-popup-box2 .schedule-times-nav a {
            display: flex;
            text-align: center;
            margin: 0 10px;
            width: 25px;
            height: 25px;
            align-items: center;
            justify-content: center;
            background-color: #F9F9F9;
            border-radius: 100%;
            color: <?php echo $color_bg; ?>;
        }
        .miyn-iframe-popup-box2 .schedule-times-nav img {
            height: 10px;
            width: auto;
        }
        .miyn-iframe-popup-box2 .next-popup-navgitation a {
            display: inline-block;
            border-radius: 2px;
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
            font-size: 10px;
            text-transform: uppercase;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 400;
        }
        .miyn-iframe-popup-box2 .miyn-widgets-popup-footer {
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box2 .schedule-time a.active {
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
        }

        /*CALENDAR STYLE START*/
        .miyn-iframe-popup-box2 .appointment-schedule-content-area::-webkit-scrollbar {
        	border-radius: 10px;
            width: 10px;
        }
        .miyn-iframe-popup-box2 .appointment-schedule-content-area::-webkit-scrollbar-track {
        	border-radius: 10px;
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box2 .appointment-schedule-content-area::-webkit-scrollbar {
        	border-radius: 10px;
        	width: 8px;
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box2 .appointment-schedule-content-area::-webkit-scrollbar-thumb {
        	border-radius: 10px;
        	background-color: #D5D5E1;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-prev {
            background-image: url(../images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            transform: rotate(180deg);
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-prev span {
            /*display: none;*/
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-icon-circle-triangle-w {
            background-position: -47px -192px;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-next {
            background-image: url(../images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-next span {
            /*display: none;*/
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-prev,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-next {
            cursor: pointer;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .calendar .ui-datepicker-inline {
            border: 0;
            margin: 0;
            width: 100%;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-header {
            position: relative;
            padding: 8px 0;
            background-color: transparent;
            border: 0;
            border-radius: 0;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker .ui-datepicker-title {
            margin: 0;
            line-height: initial;
            text-align: center;
            font-size: 14px;
            color: #696969;
            font-weight: 600;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker thead {
            border-width: thin 0 thin;
            border-style: solid;
            border-color: #D5D5D5;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker thead th {
        	font-size: 12px;
        	font-weight: 600;
        	color: #696969;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker td {
            padding: 5px 0;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-state-default, .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-content .ui-state-default,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-header .ui-state-default,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-button,
        html .miyn-iframe-popup-box2 .schedule-calendar-area .ui-button.ui-state-disabled:hover,
        html .miyn-iframe-popup-box2 .schedule-calendar-area .ui-button.ui-state-disabled:active {
            border: 0;
            background: transparent;
            font-weight: normal;
            color: #696969;
            text-align: center;
            background-image: url(../images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            background-color: transparent;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-state-hover, .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-content .ui-state-hover,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-header .ui-state-hover,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-state-focus, .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-content .ui-state-focus,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-widget-header .ui-state-focus,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-button:hover, .miyn-iframe-popup-box2 .schedule-calendar-area .ui-button:focus {
            border: 0;
            background: transparent;
            font-weight: normal;
            color: #696969;
            background-image: url(../images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            background-color: transparent;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-state-hover:hover,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-hover:hover {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-state-hover:hover::after,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-hover:hover::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            width: 23px;
            height: 23px;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 100%;
            margin-top: -1px;
            margin-left: 0px;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-state-active,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-active {
            color: #ffffff;
            position: relative;
            z-index: 1;
        }
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-state-active::after,
        .miyn-iframe-popup-box2 .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-active::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
            width: 23px;
            height: 23px;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 100%;
            margin-top: -1px;
            margin-left: 0px;
        }
        /*CALENDAR STYLE END*/

        /*SUBMIT DETAILS POPUP STYLE*/
        .miyn-iframe-popup-box2 .appointment-submit-details-content {
            background-color: #FFFFFF;
            border-radius: 10px 10px 0 0;
            padding: 30px 20px 10px;
        }
        .miyn-iframe-popup-box2 .appointment-submit-details-content > h3 {
            font-size: 14px;
            font-weight: 600;
            color: #0E1130;
            margin: 0 0 15px;
        }
        .miyn-iframe-popup-box2 .two-col-field {
            display: flex;
            justify-content: space-between;
            flex-flow: wrap row;
            margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .two-col-field .form-field:not(:first-child) {
        	margin-top: 0;
        }
        .miyn-iframe-popup-box2 .form-field:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .two-col-field .form-field {
            max-width: calc(50% - 5px);
            width: 100%;
        }
        .miyn-iframe-popup-box2 .form-field input, .miyn-iframe-popup-box2 .form-field textarea {
            border: 1px solid #E9E9E9;
            background-color: #F9F9F9;
            color: #8A8A8A;
            font-size: 12px;
            padding: 10px;
            max-width: 100%;
            width: 100%;
            display: block;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .miyn-iframe-popup-box2 .form-field select {
            width: 100%;
            padding: 9px 10px 10px;
            border: 1px solid #E9E9E9;
            background-color: #F9F9F9;
            color: #8A8A8A;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            padding-left: 6px;
            cursor: pointer;
        }
        .miyn-iframe-popup-box2 .form-field input:focus, .miyn-iframe-popup-box2 .form-field textarea:focus {
        	outline: none;
        }
        .miyn-iframe-popup-box2.miyn-appointment-client-details-area .miyn-widgets-popup-footer {
            background-color: #ffffff;
        }
        .miyn-iframe-popup-box2 .submit-button {
        	margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .submit-button a, .miyn-iframe-popup-box2 .submit-button button {
            display: inline-block;
            background-color: <?php echo $color_bg; ?>;
            border: 1px solid <?php echo $color_bg; ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }



        /*SUCCESS POPUP STYLE*/
        .miyn-iframe-popup-box2 .appointment-success-content {
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 30px 20px 10px;
        }
        .miyn-iframe-popup-box2 .appointments-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F9F9F9;
            border-radius: 100%;
            margin: 0 auto 15px;
        }
        .miyn-iframe-popup-box2 .appointments-messages {
            text-align: center;
        }
        .miyn-iframe-popup-box2 .appointments-messages h3 {
            font-size: 14px;
            color: #0E1130;
            font-weight: 700;
        }
        .miyn-iframe-popup-box2 .appointments-messages p {
            color: #696969;
            font-size: 12px;
            font-style: italic;
            margin: 0 0 15px;
        }
        .miyn-iframe-popup-box2 .appointments-messages p:last-child {
            font-weight: 500;
            color: #0E1130;
            margin: 25px 0 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content ul li:not(:first-child) {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information > ul li {
            display: flex;
            flex-flow: wrap row;
        	background-color: #F9F9F9;
        	padding: 8px 10px;
        }
        .miyn-iframe-popup-box2 .appointments-information > ul li:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .appointments-information {
            font-size: 12px;
        	margin-top: 20px;
        }
        .miyn-iframe-popup-box2 .appointment-success-actions {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .miyn-iframe-popup-box2 .appointment-success-actions a {
            display: inline-block;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
            padding: 8px 15px;
            margin: 0 5px;
        }
        .miyn-iframe-popup-box2 .info-title {
            font-weight: 600;
        	width: 40%;
        }
        .miyn-iframe-popup-box2 .info-contents {
            width: 60%;
            position: relative;
            padding-left: 8px;
            box-sizing: border-box;
            color: #696969;
            font-size: 10px;
            line-height: 14px;
        }
        .miyn-iframe-popup-box2 .info-contents::after {
            content: ":";
            position: absolute;
            top: 0;
            left: 0;
        }
        .miyn-iframe-popup-box2 .info-contents ul {
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information > ul li .info-contents ul li {
        	padding: 0;
        	position: relative;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information .info-contents ul li:not(:last-child) {
        	padding-right: 10px;
        }
        .miyn-iframe-popup-box2 .info-contents ul li:not(:last-child)::after {
        	content: ",";
        	position: absolute;
        	right: 6px;
        	bottom: 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information > ul li .info-contents ul li:not(:first-child) {
            margin-top: 0;
        }
        .miyn-iframe-popup-box2.miyn-appointment-success-area .miyn-widgets-popup-footer {
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box2.miyn-appointment-success-area .appointments-information h3 {
            width: 100%;
            font-size: 12px;
        }
        .miyn-appointment-success-area.miyn-iframe-popup-box2 .selected-slots {
            width: 100%;
            display: flex;
            margin-top: 10px;
        }
        .miyn-appointment-success-area.miyn-iframe-popup-box2 .appointments-information .selected-slots li {
            margin: 0;
            padding: 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information .selected-staff-timezone li {
            padding: 0;
            margin: 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information .selected-slots {
            margin: 0;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information .selected-slots li a {
            color: <?php echo $color_bg; ?>;
        }
        .miyn-iframe-popup-box2 .appointment-success-content .appointments-information .selected-slots li p {
            width: 100%;
        }

        .time-zone-picker {
            color: #696969;
            border: 1px solid #e1e1e1;
            display: inline-block;
            width: auto;
            max-width: 200px;
            padding: 5px;
            font-size: 10px;
            margin-top: 4px;
        }
        
        .miynPopUpFormError {
            border: 1px solid red !important;
        }

        label.miynPopUpFormError {
/*            color:red !important;*/
            display:none !important;
        }

         /* LOADER */
         .loader {
            z-index: 9999;
            margin: 0;
            position: relative;
            overflow: hidden;
        }

        .loader::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{config('app.cdn_url')}}/images/loader.gif") 50% 50% no-repeat rgb(249,249,249);
            /*background-position: center;*/
            background-position: top 100px center;
            opacity: 0.8;
        }

        .schedule-available-time-area p {
            font-size: 12px;
            line-height: 20px;
            color: <?php echo $color_bg; ?>;
            margin-bottom: 7px;
            text-align: center;
        }

        span.warningmsg {
            font-size:10px;
            display:block;
            text-align:center;
        }

        .fieldtitle {
            font-size: 14px;
            line-height: 38px;
        }


        /*CHECKBOX STYLE*/
        .checkbox-field input[type="checkbox"] {
            width: auto;
            display: none;
        }
        .checkbox-field label {
            display: inline-block;
            width: auto;
            position: relative;
            padding-left: 30px;
            cursor: pointer;
        }
        .checkbox-field input[type="checkbox"]:checked+label::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 5px;
            width: 3px;
            height: 8px;
            transform: rotate(45deg) translate(0, -50%);
            border-bottom: 2px solid #ffffff;
            border-right: 2px solid #ffffff;
            z-index: 1;
            margin-top: -3px;
        }
        .checkbox-field label::after {
            content: "";
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            width: 20px;
            height: 20px;
            background-color: #e1e1e1;
            left: 0;
        }
        .checkbox-field input[type="checkbox"]:checked+label::after {
            background-color: <?php echo $color_bg; ?>;
        }
        .second-party-details-area {
            display: none;
        }

        .miyn-iframe-popup-box .selected-appointment-information ul {
            display: flex;
            flex-direction:column;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul .selected-staff-timezone li:not(:first-child) {
            padding-left: 0px;
        }

        .fieldtitle {
            font-size: 14px;
            line-height: 40px;
        }

        .miyn-appointment-submit-details-contents {
            padding:10px;
        }

        li.schedule-time.disable span {
            background-color: #F2F2F2;
            padding: 4px;
            border-radius: 5px;
            font-size: 12px;
            color: #CAC6C8;
            margin: 5px;
            width: 70px;
            text-align: center;
            cursor: pointer;
            display: inline-block;
        }

        .service-cal-title-area.miyn-widgets-selected-appointment-info .selected-appointment-information {
            width: 100%;
            padding-left: 0;
        }
        .sct-upper-title {
            display: flex;
        }
    .sct-name {
        width: calc(100% - 30px);
        padding-left: 10px;
    }
    .miyn-iframe-popup-box2.miyn-appointment-schedule-area .miyn-widgets-selected-appointment-info.service-cal-title-area {
        background-color: transparent;
    }
    .miyn-iframe-popup-box2.miyn-appointment-schedule-area .miyn-widgets-selected-appointment-info.service-cal-title-area {
        background-color: transparent;
        padding: 0;
    }
    .sct-upper-title {
        display: flex;
        /* background-color: #F9F9F9; */
        /* padding: 10px 15px; */
        margin-bottom: 15px;
    }
    .sct-seperate .selected-staff-timezone ul li {
        width: 100%;
    }
    .sct-seperate .selected-staff-timezone ul li:not(:first-child)::after {
        display: none;
    }
    .sct-seperate .selected-staff-timezone ul {
        display: block;
    }
    .sct-seperate .selected-staff-timezone ul li {
        width: 100%;
        padding-bottom: 7px;
        border-bottom: 1px solid #ECECEC;
        margin-bottom: 7px;
    }

    .miyn-iframe-popup-box .form-field textarea {
        line-height: 20px;
    }

    .miyn-previous-popup svg {
        width: 15px;
    }

    .selection-arrow svg {
        width: 15px;
    }


	</style>

</head>
<body class="loader">

<div class="responsive-device-top-panel" style="background-color: <?php echo ($color_bg) ? $color_bg : '#F5F5F5'; ?>">
    <div class="responsive-device-top-panel-logo">
        <img src="{{config('app.apps_url')}}/images/widget_image/<?php echo $widget_image; ?>" alt="businesss name"/>
    </div>
    <div class="responsive-device-business-name">
        <label><?php echo $allbusinessinfo->business_name; ?></label>
    </div>
</div>


    <div id="appointment-lists" class="miyn-popup-appointment-area miyn-iframe-popup-box2">
    	<div class="appointment-list-area">

    	    <?php
                foreach($service_info as $keys=>$vals){
            ?>
    	    <div class="service-cat">
    	        <span><?php echo $vals->service_category_name; ?></span>
    	    </div>

    		<ul>
    		        <?php
                    foreach($vals->service as $key=>$val){
                    ?>
            			<li>
            				<a href="#select-user<?php echo $val->id; ?>"  onclick="user_slot(<?php echo $val->id; ?>)">
            					<div class="appointment-icon">
            						<img src="https://app.miyn.app/images/service/<?php if($val->isimage == 'true') { echo $val->imagepath;  } else { echo 'initial-advice-white.png'; } ?>" alt="Service Image"/>
            					</div>
            					<div class="appointment-content">
            						<h3><?php echo $val->service_name; ?></h3>
            						<p><?php echo $val->service_description; ?></p>
            						<div class="payment-duration">
            							<ul>
            								<li><span><?php if($val->fee_type == 'no_fee'){  echo 'Free'; } else { echo $val->service_price.' '.$val->service_currency; } ?></span></li>
            								<li>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg>

                                                <span>  <?php echo $val->sevice_time_h ?> <?php echo $val->sevice_time_h_title ?> <?php echo $val->sevice_time_m ?> <?php echo $val->sevice_time_m_title ?></span></li>
            							</ul>
            						</div>
            					</div>
            				</a>
            			</li>
        			<?php
                    }
        		    ?>
    		</ul>
    	<?php
            }
        ?>

    	</div>
    </div>


<?php
    foreach($service_info as $keys=>$vals){
        foreach($vals->service as $key=>$val){
    ?>
    <div id="select-user<?php echo $val->id; ?>_" class="miyn-popup-user-selection-area miyn-iframe-popup-box2">
    	<div class="selection-user-list-area">
    		<div class="miyn-widgets-selected-appointment-info">
    			<a class="miyn-previous-popup" href="#appointment-lists">
    				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.35em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1728 1280"><path fill="currentColor" d="M1728 544v192q0 14-9 23t-23 9H448v224q0 21-19 29t-35-5L10 666Q0 656 0 643q0-14 10-24l384-354q16-14 35-6q19 9 19 29v224h1248q14 0 23 9t9 23z"/></svg>
    			</a>
    			<div class="selected-appointment-information">
    				<ul>
    					<li>
    						<h3><?php echo $val->service_name ?></h3>
    						<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg></i> <?php echo $val->sevice_time_h ?> <?php echo $val->sevice_time_h_title ?> <?php echo $val->sevice_time_m ?> <?php echo $val->sevice_time_m_title ?></p>
    					</li>
    				</ul>
    			</div>
    		</div>
    		<h3 class="select-user-title">Please select</h3>
    		<ul>
        		<?php
        		$staff = $val->staffs;
        		//print_r($staff);
                   foreach($staff as $keys=>$vals){
                ?>
        		    <li>
        				<a id="staff<?php echo $keys; ?>" href="#appointment-schedule"
        				b_id="<?php echo $b_id; ?>"
        				service_id="<?php echo $val->id; ?>"
        				service_name="<?php echo $val->service_name; ?>"
        				service_amt="<?php echo $val->service_price; ?>"
        				service_currency="<?php echo $val->service_currency; ?>"
        				preparation_time="<?php echo $val->preparationtime_m; ?>"
        				staff_id="<?php echo $vals->id; ?>"
        				staff_name="<?php echo $vals->staffname; ?>"
        				staffproffesion="<?php echo $vals->staffproffesion; ?>"
        				never_view_in_same_day="<?php echo $val->never_view_in_same_day; ?>"

        				appointmenttime="<?php echo $val->sevice_time_h ?> <?php echo $val->sevice_time_h_title ?> <?php echo $val->sevice_time_m ?> <?php echo $val->sevice_time_m_title ?>"
        				total_service_minutes="<?php echo $val->total_service_minutes; ?>"
        				staff_country_offset="<?php echo $vals->country_details->default_offset; ?>"
        				staff_timezone_name="<?php echo $vals->country_details->timezone_name; ?>"
        				work_details='<?php echo $vals->weekworkday; ?>' onClick=""  >
        					<div class="user-thumb">
        						<img src="https://<?php echo $vals->domain; ?>/images/staff/<?php if($vals->staff_image !="") { echo $vals->staff_image; } else { echo 'avatar.jpg'; } ?>" alt="<?php echo $vals->staff_image; ?>"/>
        					</div>
        					<div class="user-name">
        						<h3><?php echo $vals->staffname; ?></h3>
        						<p><?php echo $vals->staffproffesion; ?></p>
        					</div>
        				</a>
        			</li>
        		<?php
                   }
                ?>
    		</ul>
    	</div>
    </div>
    <?php
        }
    }
?>


    <div id="appointment-schedule" class="miyn-appointment-schedule-area miyn-iframe-popup-box2">
    	<div class="appointment-schedule-content-area">
    		<div class="miyn-widgets-selected-appointment-info service-cal-title-area">
    			<div class="selected-appointment-information">
    				<ul>
    					<li class="sct-upper-title">
                            <a id="backpanel" class="miyn-previous-popup" href="#select-user0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.35em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1728 1280"><path fill="currentColor" d="M1728 544v192q0 14-9 23t-23 9H448v224q0 21-19 29t-35-5L10 666Q0 656 0 643q0-14 10-24l384-354q16-14 35-6q19 9 19 29v224h1248q14 0 23 9t9 23z"/></svg>
                            </a>
                            <div class="sct-name">
                                <h3 class="servicename"></h3>
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg>
                                    <span class="apointmenttime"></span> </p>
                            </div>
    					</li>
    					
    				</ul>
					
					<ul class="sct-seperate">
						<li class="selected-staff-timezone">
    					    <ul>
            					<li>
            						<h3 class="staffname"></h3>
            						<p class="staffproffesion"></p>
            					</li>
            					<li>
            						<h3 class="timezonearea"></h3>
            						<p>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539a6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539a6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855c.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/></svg> 
                                    Timezone / offset</p>
            					</li>
    					    </ul>
    					</li>
    					<li>

    						<ul class="selected-slots">

    						</ul>
    						<!--<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg> Time</p>-->
    					</li>
					</ul>
    			</div>
    		</div>

    		<div class="schedule-main-area">
        		<div class="schedule-calendar-area">
        			<div class="calendar"></div>
        		</div>
        		<div class="schedule-available-time-area">
        		    <p>Select/unslect your time slot</p>
        			<div class="schedule-available-time"></div>
        		</div>
        		<div class="schedule-navigation-area">
        		    <!--<div class="schedule-times-nav">
    					<a class="previous" href="#"><i class="fas fa-chevron-left"></i></a>
    					<a class="next" href="#"><i class="fas fa-chevron-right"></i></a>
    				</div>-->
        			<div class="next-popup-navgitation">
        				<a href="#appointment-client-details">Confirm</a>
        			</div>
        			<div class="scheule-popup-bottom-info">
        				<p>Your current time zone <span id="alternate1" class="v-timezonename"></span>  Want to change?
            				<select class="time-zone-picker ng-binding" id="time_zone" name="time_zone"  >
        					    <!--<option value="" data-selectedzoneid="" data-selectedzonename="" >Select..</option>-->
                                <?php
        				        $array = $country;
                                foreach($array as $key=>$val){
                                ?>
                                    <option value="{{$val->timezone_name}}" data-selectedzoneid="{{$val->id}}" data-selectedoffset="{{$val->default_offset}}" >{{$val->timezone_name}} (GMT {{$val->default_offset}})</option>
                                <?php
                                }
                                ?>
                            </select>
        				 </p>
        			</div>
        		</div>
    		</div>

    	</div>
    </div>
    <div id="appointment-client-details" class="miyn-appointment-client-details-area miyn-iframe-popup-box2">
    	<div class="appointment-submit-details-content">
    		<div class="miyn-widgets-selected-appointment-info service-cal-title-area">
    			<div class="selected-appointment-information">
    				<ul>
    					<li class="sct-upper-title">
                            <a class="miyn-previous-popup" href="#appointment-schedule" data-item="Called"  >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.35em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1728 1280"><path fill="currentColor" d="M1728 544v192q0 14-9 23t-23 9H448v224q0 21-19 29t-35-5L10 666Q0 656 0 643q0-14 10-24l384-354q16-14 35-6q19 9 19 29v224h1248q14 0 23 9t9 23z"/></svg>
                            </a>
                            <div class="sct-name">
                                <h3 class="servicename"></h3>
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg>
                                     <span class="apointmenttime"></span></p>
                            </div>
    					</li>
    				</ul>
					
					<ul class="sct-seperate">
						<li class="selected-staff-timezone">
    					    <ul>
            					<li>
            						<h3 class="staffname"></h3>
            						<p class="staffproffesion"></p>
            					</li>
            					<li>
            						<h3 class="timezonearea"></h3>
            						<p>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539a6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539a6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855c.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/></svg>
                                     Timezone / offset</p>
            					</li>
        				    </ul>
    					</li>
    					<li>

    						<ul class="selected-slots">

    						</ul>

    					</li>
					
					</ul>
					
    			</div>
    		</div>
    		<div class="miyn-appointment-submit-details-contents">
    			<h3>Submit details</h3>
    			<!--<div class="appintment-submit-detail-form">
    				<div class="two-col-field">
    					<div class="form-field">
    						<input type="text" name="fname" placeholder="First Nname">
    					</div>
    					<div class="form-field">
    						<input type="text" name="lname" placeholder="Last Name">
    					</div>
    				</div>
    				<div class="form-field">
    					<input type="email" name="email" placeholder="E-mail">
    				</div>
    				<div class="two-col-field country-field">
    					<div class="form-field">
    						<input type="text" name="country" placeholder="Country">
    					</div>
    					<div class="form-field">
    						<input type="text" name="phone-number" placeholder="Phone Number">
    					</div>
    				</div>
    				<div class="form-field">
    					<textarea name="message" placeholder="Messege"></textarea>
    				</div>
    				<div class="submit-button">
    					<a href="#appointment-success">Submit</a>
    				</div>
    			</div>-->

    			<!--form start-->
    			<form id="submitBookingformData" method="POST">
                    {!! csrf_field() !!}
        			<div class="appintment-submit-detail-form">


        			        <div class="form-field fieldtitle">
        						<?php echo $allbusinessinfo['livestyle'][0]->formOneTitle; ?>
        					</div>


        				<div class="three-col-field">
        					<div class="form-field">
        						<input type="text"  name="c_first_name" id="c_first_name" placeholder="First name*" value="<?php echo $client_live_info->firstname ?? ''; ?>"  />
        					</div>
        					<div class="form-field">
        						<input type="text"  name="c_middle_name" id="c_middle_name" placeholder="Middle name" value="<?php echo $client_live_info->middlename ?? ''; ?>"  />
        					</div>
        					<div class="form-field">
        						<input type="text"  name="c_last_name" id="c_last_name" placeholder="Last name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" />
        					</div>
        				</div>


        				<div class="form-field">
        					<?php
						    $disbale = "";
						    if( ($client_live_info->email ?? '') !="") {
						       $disbale = "readonly";
						    } else {
						      $disbale = "";
						    }
						    ?>
							<input type="email" name="c_email" id="c_email" placeholder="Email Address*" value="<?php echo $client_live_info->email ?? ''; ?>" <?php echo $disbale; ?> />
        				</div>
        				<div class="two-col-field country-field">
        					<div class="form-field">
        						<select id="client_country_id" name="client_country_id" class="fstdropdown-select" >
	                                <option value="">Select Country...</option>
	                                <?php
            						    $countryid = "";
            						    $selected = "";
            						    if( ($client_live_info->country_id ?? '') !="") {
            						       $countryid = $client_live_info->country_id;
            						    } else {
            						      $countryid = "";
            						      $disbale  =   "";
            						    }
        						    ?>
	                                @foreach ($country as $key => $value)
	                                   <?php
    	                                   if($value->id == ($client_live_info->country_id ?? '')) {
    	                                       $selected    = "selected=selected";
    	                                   } else {
    	                                       $selected ="";
    	                                   }
	                                    ?>
	                                <option value="{{$value->id}}" tz="{{$value->timezone_name}}"  <?php echo $selected; ?>  >{{$value->country_name}} ({{$value->country_code}})</option>

	                                @endforeach
	                            </select>
        					</div>
        					<div class="form-field">
        						<input type="text" name="c_phone" id="c_phone"  placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
        					</div>
        				</div>




        				 <?php if($allbusinessinfo['livestyle'][0]->isFormTwo == 'true') { ?>


            			     <div class="form-field fieldtitle checkbox-field second-party-checked">
            			         <input type="checkbox" name="check_need_second_party" id="check_need_second_party" value=""/>
            			         <label for="check_need_second_party"><?php echo $allbusinessinfo['livestyle'][0]->formTwoTitle; ?></label>
            			     </div>

            			    <div class="second-party-details-area">
                				<div class="three-col-field">
                					<div class="form-field">
                						<input type="text"  name="c_first_name_two" id="c_first_name_two" placeholder="First name*" value=""  />
                					</div>
                					<div class="form-field">
                						<input type="text"  name="c_middle_name_two" id="c_middle_name_two" placeholder="Middle name" value="" />
                					</div>
                					<div class="form-field">
                						<input type="text"  name="c_last_name_two" id="c_last_name_two" placeholder="Last name*" value="" />
                					</div>
                </div>
                				<div class="form-field">
        							<input type="email" name="c_email_two" id="c_email_two" placeholder="Email Address*" value="" />
                                </div>
                				<div class="two-col-field country-field">
                					<div class="form-field">
                						<select id="client_country_id_two" name="client_country_id_two" class="fstdropdown-select" >
        	                                <option value="">Select Country...</option>

        	                                @foreach ($country as $key => $value)

        	                                <option value="{{$value->id}}" tz="{{$value->timezone_name}}"   >{{$value->country_name}} ({{$value->country_code}})</option>

        	                                @endforeach
        	                            </select>
                					</div>
                					<div class="form-field">
                						<input type="text" name="c_phone_two" id="c_phone_two"  placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="" />
                					</div>
                </div>
                                <div class="form-field fieldtitle">
        						    Remarks
        					    </div>
            				</div>

        				<?php } ?>


        				<div class="form-field">
        					<textarea name="c_note" id="c_note" class="field-long field-textarea" placeholder="Message"></textarea>
        				</div>


        				<div class="submit-button">
        				    <button type="submit" id="changeSubmit">Submit</button>
        				</div>
        			</div>
        		</form>
        		<!--form end-->

    		</div>
    	</div>
    </div>
    <div id="appointment-success" class="miyn-appointment-success-area miyn-iframe-popup-box2">
    	<div class="appointment-success-content">
    		<div class="appointments-icon">
    			<img src="{{config('app.live_url')}}/newdesign/images/success-icon.png" alt="success-icon.png"/>
    		</div>
    		<div class="appointments-messages">
    			<h3>Your booking request was sent</h3>
    			<p>You will receive an email once admin, confirm your booking</p>
    			<p><strong>Thanks for your booking, Looking forward to meeting you!</strong></p>
    		</div>
    		<div class="appointments-information">
				<ul>
					<li>
						<h3 class="servicename"></h3>
						<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg> <span class="apointmenttime"></span></p>
					</li>
				</ul>
				
				<ul class="seperate">
					<li class="selected-staff-timezone">
					    <ul>
        					<li>
        						<h3 class="staffname"></h3>
        						<p class="staffproffesion"></p>
        					</li>
        					<li>
        						<h3 class="timezonearea"></h3>
        						<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539a6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539a6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855c.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/></svg> Timezone / offset</p>
        					</li>
					    </ul>
					</li>
					<li>
						<ul class="selected-slots">
						</ul>
					</li>
				</ul>
    		</div>
    		<!--<div class="appointment-success-actions">
    			<a href="#appointment-lists">Book another</a>
    			<a href="#">Manage Booking</a>
    		</div>-->
    	</div>
    </div>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

    <script src="{{asset('miyn-widget-4/js/jquery.min.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery-ui.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery.validate.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

    <script type="text/javascript">

    var userSlotNo = 0;

function parseDate(date) {
  const parsed = Date.parse(date);
  if (!isNaN(parsed)) {
    return parsed;
  }

  return Date.parse(date.replace(/-/g, '/').replace(/[a-z]+/gi, ' '));
}

        ! function() {
            "use strict";

            var _this ={
                step         : 'appointment',
                business_id         :0,
                service_index       : 0,
                service_id          : 0,
                service_name        : '',
                service_amt         : 0,
                service_currency    : '',
                service_offset      : '',

                preparation_time        : 0,
                total_service_minutes   : 0,

                staff_id                : 0 ,
                staff_name              : '',
                staffproffesion         : '',
                staff_country_offset    : '',
                staff_timezone_name     : '',

                never_view_in_same_day    : false,

                holidays : [],

                disabledDays : [<?php echo $same_date; ?>],
                disabletimeslots : [],

                server_time             : new Date(parseDate('<?php echo date("Y-m-d h:i A"); ?>')),
                slot_min_start_date_time: new Date(parseDate('<?php echo date("Y-m-d h:i A", strtotime("+24 hours")); ?>')),

                numberofweekday     : '',

                current_offset      : '',

                current_timezone    : Intl.DateTimeFormat().resolvedOptions().timeZone,

                today_date          :'',
                today_date_time     :'',
                selected_date       :'',

                // Selected
                work_details            : [],
                weekened                : [],
                selected_slots          : [],

                work_curr_full_year             : '',
                work_curr_full_date             : '',
                work_curr_date_number           : '',
                work_curr_date_name             : '',
                work_curr_date_month_number     : '',
                work_curr_date_month_name       : '',

                work_start_hour : '',
                work_start_min   : '',
                work_end_hour   : '',
                work_end_min    : '',

                conv_work_start_hour : '',
                conv_work_start_min   : '',
                conv_work_end_hour   : '',
                conv_work_end_min    : '',

                conv_work_start_date_time  : '',
                conv_work_end_date_time    : '',

                format_two_digits : function(n) {
                    return n < 10 ? '0' + n : n;
                },

                runSerial: function(tdate){


                    var that = this;
                    // task1 is a function that returns a promise (and immediately starts executing)
                    // task2 is a function that returns a promise (and immediately starts executing)
                    return Promise.resolve()
                        .then(function() {

                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    //document.getElementById("demo").innerHTML = this.responseText;
                                   //console.log(this.responseText);
                                   // var infos = JSON.stringify(this.responseText);
                                    //console.log(JSON.parse(infos));

                                    //console.log('sss -');

                                    if(this.responseText !="") {
                                        var res = this.responseText.split(",");

                                        var conv = [];
                                        /* convert with formate and timezone */
                                        for (var i = 0; i < res.length; i++) {

                                            var day=new Date(res[i]+_this.staff_country_offset);
                                            const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', timeZone: _this.current_timezone };
                                            const today=day.toLocaleDateString("en-IN", options);
                                            //console.log(today);
                                            //const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                                            //var d_start   = new Date(res[i]); // 9:00 AM new Date(conv_start_date_time);
                                            //var n_d_start   = d_start.toLocaleTimeString(undefined, options);
                                            //var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                                            var at_start    = new Date(today).toLocaleTimeString(undefined, options);
                                            conv_old[i] = at_start;
                                            //console.log('at_start-'+at_start);

                                            conv[i] = res[i];
                                        }

                                        //console.log(conv_old);
                                        //console.log(res);
                                        //console.log(conv);

                                        _this.disabletimeslots = conv;

                                    } else {
                                        _this.disabletimeslots = [];
                                    }

                                    console.log('-- Done 1--');

                                if(_this.today_date == _this.selected_date) {

                        //console.log(typeof('never_view_in_same_day-'+_this.never_view_in_same_day));
                        //console.log('Today Event');



                            if(_this.never_view_in_same_day == 'true') {

									var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);

                                    //console.log('Selected : '+_this.selected_date);

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();

                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;


                                    //console.log(_this.getAllDisableDates());

                                    //console.log('slot_design-1');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();

                                    $(".schedule-available-time").html('<span class="warningmsg">No slot available on selected date!</span>');


                                } else {

									var cc_ = parseDate(_this.selected_date);
                                    //console.log('Today 1:'+_this.selected_date);
                                    var dd      = (new Date(cc_) + '').split(' ');
                                        dd[2]   = dd[2] + ',';

                                    var dc      = [dd[0], dd[1], dd[2], dd[3]].join(' ');
                                    $('#alternate1').html(dc);

                                    var CKDate = new Date(_today.convert_date_time());

                                    //console.log('Today : '+_today.convert_date_time());

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();


                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

                                    //console.log(startHour);
                                    //return false;

                                    if(startHour != "") {

                                        if(startHour <= RRstartHourTRCKDate) {

                                            startHour = RRstartHourTRCKDate;

                                            if(endHour <= RRstartHourTRCKDate) {
                                               // $('#slots').html('');
                                                //console.log('False 1');
                                               return false;
                                            }

                                            if(startMin <= startMinTRCKDate) {
                                                startHour = RRstartHourTRCKDate+1;
                                            } else {
                                                startMin = startMin + _this.total_service_minutes + _this.preparation_time;
                                            }

                                        }
                                    } else {
                                        //$('#slots').html('');
                                        //console.log('False 2');
                                        return false;
                                    }

                                    var startTimeStr =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;

                                    //console.log(_this.getAllDisableDates());

                                    //console.log('slot_design-2');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();

                                }




                            } else {

                                //console.log('Else');
                                	var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);

                                    //console.log('Selected : '+_this.selected_date);

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();

                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

									//console.log('startHour-'+startHour);
									//console.log('startMin-'+startMin);
									//console.log('endHour-'+endHour);
									//console.log('endMin-'+endMin);
									//console.log('total_service_minutes-'+total_service_minutes);
									//console.log('preparation_time-'+preparation_time);

                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;

                                    //console.log('startTimeStr-'+startTimeStr);
									//console.log('endTimeStr-'+endTimeStr);
                                    //console.log(_this.getAllDisableDates());
                                    //console.log('slot_design-3');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();


                                    }
                                }
                            };

                            var ctimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                            var url= "{{config('app.api_url')}}/api/google-disable-time-slot/"+_this.staff_id+"/"+tdate+"/"+_this.business_id+"?currentTimezone="+ctimezone;
                            //console.log(url);

                            xhttp.open("GET", url, true);
                            xhttp.send();

                        })
                        .then(function() {
                            console.log('-- Done 2--');
                        })
                        .then(function() {
                            console.log('-- Done--');
                        });
                },


                 kickOff :function(tdate){

                  let start = new Promise((resolve, reject) => {

                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                //document.getElementById("demo").innerHTML = this.responseText;
                               //console.log(this.responseText);
                               // var infos = JSON.stringify(this.responseText);
                                //console.log(JSON.parse(infos));
                                //console.log('Response -'+this.responseText);

                                if(this.responseText !="") {
                                    var res = this.responseText.split(",");
                                    _this.disabletimeslots = res;
                                } else {
                                    _this.disabletimeslots = [];
                                }
                            }
                        };

                        var ctimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                            var url= "{{config('app.api_url')}}/api/google-disable-time-slot/"+_this.staff_id+"/"+tdate+"/"+_this.business_id+"?currentTimezone="+ctimezone;
                        //console.log(url);

                        xhttp.open("GET", url, true);
                        xhttp.send();


                  })

                  let middle = new Promise((resolve, reject) => {

                        if(_this.today_date == _this.selected_date) {

                        //console.log(typeof('never_view_in_same_day-'+_this.never_view_in_same_day));
                        //console.log('Today Event');



                            if(_this.never_view_in_same_day == 'true') {
                            		var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);

                                    //console.log('Selected : '+_this.selected_date);

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();

                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;


                                    //console.log(_this.getAllDisableDates());

                                    //console.log('slot_design-4');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();

                                    $(".schedule-available-time").html('<span class="warningmsg">No slot available on selected date!</span>');


                                } else {
        							var cc_ = parseDate(_this.selected_date);
                                    //console.log('Today 1:'+_this.selected_date);
                                    var dd      = (new Date(cc_) + '').split(' ');
                                        dd[2]   = dd[2] + ',';

                                    var dc      = [dd[0], dd[1], dd[2], dd[3]].join(' ');
                                    $('#alternate1').html(dc);

                                    var CKDate = new Date(_today.convert_date_time());

                                    //console.log('Today : '+_today.convert_date_time());

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();


                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

                                    //console.log(startHour);
                                    //return false;

                                    if(startHour != "") {

                                        if(startHour <= RRstartHourTRCKDate) {

                                            startHour = RRstartHourTRCKDate;

                                            if(endHour <= RRstartHourTRCKDate) {
                                               // $('#slots').html('');
                                                //console.log('False 1');
                                               return false;
                                            }

                                            if(startMin <= startMinTRCKDate) {
                                                startHour = RRstartHourTRCKDate+1;
                                            } else {
                                                startMin = startMin + _this.total_service_minutes + _this.preparation_time;
                                            }

                                        }
                                    } else {
                                        //$('#slots').html('');
                                        //console.log('False 2');
                                        return false;
                                    }

                                    var startTimeStr =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;

                                    //console.log(_this.getAllDisableDates());

                                    //console.log('slot_design-5');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();

                                }




                            } else {

                                //console.log('Else');
                                	var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);

                                    //console.log('Selected : '+_this.selected_date);

                                    var startDateCKDate 		= CKDate.getDate();
                                    var startMonthCKDate 		= CKDate.getMonth()+1;
                                    var startYearCKDate 		= CKDate.getFullYear();

                                    var startHourTRCKDate 		= CKDate.getHours();
                                    var RRstartHourTRCKDate 	= CKDate.getHours();
                                    var startMinTRCKDate		= CKDate.getMinutes();
                                    var numberofweekdayCKDate 	= CKDate.getDay();

                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);

                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;

                                    //console.log(_this.getAllDisableDates());
                                    //console.log('slot_design-6');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();


                            }

                  })

                  let end = new Promise((resolve, reject) => {

                  })

                  Promise.all([start, middle, end]).then(results => {

                    results.forEach()

                  })

                },

                getAllDisableDates : function(tdate) {


                    //console.log('..'+tdate+'..');

                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            //document.getElementById("demo").innerHTML = this.responseText;
                           //console.log(this.responseText);
                           // var infos = JSON.stringify(this.responseText);
                            //console.log(JSON.parse(infos));

                            var res = this.responseText.split(",");
                            _this.disabletimeslots = res;
                        }
                    };

                    var ctimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                            var url= "{{config('app.api_url')}}/api/google-disable-time-slot/"+_this.staff_id+"/"+tdate+"/"+_this.business_id+"?currentTimezone="+ctimezone;
                    //console.log(url);

                    xhttp.open("GET", url, true);
                    xhttp.send();

                },

                convert_date_time : function(datetimeparam, offsetparam, timezonename){  // amy datetime ,  offset , timezone (return new date)

                    var d = new Date(datetimeparam);

                    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime =  d.toLocaleTimeString(undefined, options);
                    var aestTime = new Date(datetime+" "+offsetparam).toLocaleString("en-US", {timeZone: timezonename});
                    return (new Date(aestTime).toLocaleTimeString(undefined, options));

                },

                curr_working_days : function() {

                    var data = _this.work_details;
                    data = $.parseJSON(data);
                    var arr = [];
                    $.each(data, function (i,v)
                    {
                            ////console.log(i,v);
                            //console.log('v day-'+v.day);
                            arr.push(parseInt(v.day));
                            if(v.day == _this.numberofweekday) {
                                _this.work_start_hour 	= parseInt(v.starttime_h);
                			    _this.work_start_min 	= parseInt(v.starttime_m);
                			    _this.work_end_hour 	= parseInt(v.endtime_h);
                			    _this.work_end_min 		= parseInt(v.endtime_m);
                            }
                    });

                    _this.convert_work_times_deafult_timezone();

                    _this.weekened = arr;
                },

                convert_work_times_deafult_timezone : function() {

                    var conv_start_date_time    = _this.selected_date+" "+_this.work_start_hour+":"+ _this.work_start_min;
                    var conv_end_date_time      = _this.selected_date+" "+_this.work_end_hour+":"+ _this.work_end_min;

                    var startdatearr = [];
                        startdatearr = _this.selected_date.split("-");

                    var startYear   = startdatearr[0];
                    var startMonth  = startdatearr[1];
                    var startDate   = startdatearr[2];
                    var startHour   = _this.work_start_hour;
                    var startMin    = _this.work_end_min;

                    var enddatearr = [];
                        enddatearr = _this.selected_date.split("-");

                    var endYear     = enddatearr[0];
                    var endMonth    = enddatearr[1];
                    var endDate     = enddatearr[2];
                    var endHour     = _this.work_end_hour;
                    var endMin      = _this.work_end_min;

                    const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    //var d_start   = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time);
                    var d_start   = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time);
                    var n_d_start   = d_start.toLocaleTimeString(undefined, options);
                    var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                    //return (new Date(aestTime).toLocaleTimeString(undefined, options));
                    var at_start    = new Date(n_t_start).toLocaleTimeString(undefined, options);

                    _this.conv_work_start_date_time = at_start;
                    _this.conv_work_start_hour      = (new Date(n_t_start)).getHours();
                    //console.log(_this.conv_work_start_hour);
                    _this.conv_work_start_min       = (new Date(n_t_start)).getMinutes();
                    //console.log(_this.conv_work_start_min);

                    //console.log(at_start);


                   // const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    //var d_start   = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time);
                    var d_end       = new Date(endYear, endMonth, endDate,  endHour, endMin); // 9:00 AM new Date(conv_start_date_time);
                    var n_d_end     = d_end.toLocaleTimeString(undefined, options);
                    var n_t_end     = new Date(n_d_end+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                    //return (new Date(aestTime).toLocaleTimeString(undefined, options));
                    var at_end      = new Date(n_t_end).toLocaleTimeString(undefined, options);

                    _this.conv_work_start_date_time = at_end;
                    _this.conv_work_end_hour        = (new Date(n_t_end)).getHours();
                    //console.log(_this.conv_work_end_hour);
                    _this.conv_work_end_min         = (new Date(n_t_end)).getMinutes();
                    //console.log(_this.conv_work_end_min);

                    //console.log(at_end);

                /*
                    if(Number(_this.work_end_hour) > 12) {

                    }
                */


                },

                curr_weekened : function() {

                    var data = _this.work_details;
                    data = $.parseJSON(data);
                    var arr = [];
                    $.each(data, function (i,v)
                    {
                      //console.log(i,v);
                      //console.log(v);
                        arr.push(parseInt(v.day));
                    });

             	    _this.weekened = arr;
                },

                removeA : function(arr) {
                    var what, a = arguments, L = a.length, ax;
                    while (L > 1 && arr.length) {
                        what = a[--L];
                        while ((ax= arr.indexOf(what)) !== -1) {
                            arr.splice(ax, 1);
                        }
                    }
                    return arr;
                }


            };


            var _today ={

                validity_check : function(){

                    // server time this.server_time
                    // Y-m-d 4:35 AM
                    var d           = new Date(_this.server_time);
                    const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime    = d.toLocaleTimeString(undefined, options);
                    var aestTime    = new Date(datetime+ " +00:00").toLocaleString("en-US", {timeZone: _this.current_timezone});
                    var conv_date   = (new Date(aestTime).toLocaleTimeString(undefined, options));
                    //console.log(conv_date);
                    return conv_date;

                },


                convert_date_time : function(){

                    // server time this.server_time
                    //Y-m-d 4:35 AM

                    var d           = new Date(_this.server_time);
                    const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime    =  d.toLocaleTimeString(undefined, options);
                    var aestTime    = new Date(datetime+ " +00:00").toLocaleString("en-US", {timeZone: _this.current_timezone});
                    var conv_date   = (new Date(aestTime).toLocaleTimeString(undefined, options));
                    //console.log(conv_date);

                    //
                    var today               = new Date(conv_date);
                    var date                = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    _this.today_date        = date;
                    _this.today_date_time   = date+" "+today.getHours()+":"+today.getMinutes();
                    _this.selected_date     = date;
                    _this.numberofweekday   = today.getDay();

                    return conv_date;

                },

                curr_date : function(){

                    var today = new Date(this.convert_date_time());
                    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

                    //console.log(date);

                    _this.work_curr_date_number 		= today.getDate();
                    _this.work_curr_date_month_number   = today.getMonth()+1;
                    _this.work_curr_full_year           = today.getFullYear();

                   // var startHourTR 		            = today.getHours();
                   // var startMinTR 			        = today.getMinutes();
                    _this.numberofweekday 	            = today.getDay();


                },

                c_offset : function(){

                    //console.log(this.convert_date_time());

                    var d = new Date(this.convert_date_time());
                    var n = d.getTimezoneOffset();
                    var timezone = n / -60;
                    return timezone;

                },

                c_offset_formate : function(){

                    var d = new Date(this.convert_date_time());
                    var n = d.getTimezoneOffset();
                    var timezone = n / -60;
                    //timezone = 10.5;
                    var str_offset = '';

                    if (timezone > 0) {
                        if(Number.isInteger(timezone)) {
                           str_offset = "+"+timezone
                        } else {
                            str_offset = "+"+timezone;
                        }
                    } else {

                           str_offset = timezone;
                    }

                    return str_offset;
                },

                firstTimeData : function(){    // _l.a()

                    $("h3.servicename").text(_this.service_name);
                    $("span.apointmenttime").text(_this.appointmenttime);

                    $("h3.staffname").text(_this.staff_name);
                    $("p.staffproffesion").text(_this.staffproffesion);

                    _this.current_offset = _today.c_offset();


                    $("span.v-timezonename").text(_this.convert_date_time()+', GMT '+_today.c_offset_formate());
                    $("h3.timezonearea").text(_this.current_timezone+', GMT '+_today.c_offset_formate());

                },


                first_time_setup : function(){    // _l.a()



                },


            };


            var _thisSelected ={


                change_date_time : function(){

                    // server time this.server_time
                    //Y-m-d 4:35 AM
                    var cc_ = parseDate(_this.selected_date);

                    //Current Date
                    var CKDate                  = new Date(cc_);
                    var startDateCKDate 		= CKDate.getDate();
                    var startMonthCKDate 		= CKDate.getMonth()+1;
                    var startYearCKDate 		= CKDate.getFullYear();

                    var startHourTRCKDate 		= CKDate.getHours();
                    var RRstartHourTRCKDate 	= CKDate.getHours();
                    var startMinTRCKDate		= CKDate.getMinutes();
                    var numberofweekdayCKDate 	= CKDate.getDay();

                   //console.log(CKDate);

                },

                checkDate : function() {

                   var selectedDate = _this.selected_date;

                   var now = _this.convert_date_time();
                   var dt1 = Date.parse(now),
                   dt2 = Date.parse(selectedDate);
                   if (dt2 < dt1) {
                        return 0;
                   } else {
                       return 1;
                   }
                }



            };

            var _changeTimeZone ={

                after_change_timezone_box : function(){    // _l.a()

                    $("h3.servicename").text(_this.service_name);
                    $("span.apointmenttime").text(_this.appointmenttime);

                    $("h3.staffname").text(_this.staff_name);
                    $("p.staffproffesion").text(_this.staffproffesion);



                    _changeTimeZone.after_change_timezone_offset_formate();


                    $("span.v-timezonename").text(_this.current_timezone+' GMT '+_changeTimeZone.after_change_timezone_offset_formate());
                    $("h3.timezonearea").text(_this.current_timezone+' GMT '+_changeTimeZone.after_change_timezone_offset_formate());

                    //_this.selected_date = _this.convert_date_time();

                   //console.log('--------------------');
                   //console.log(this.current_timezone);
                   //console.log(this.current_offset);

                },

                after_change_timezone_offset_formate : function() {
                    //console.log(this.current_offset);
                    var timezone = Number(_this.current_offset);
                    var str_offset = '';

                    if (timezone > 0) {
                        if(Number.isInteger(this.current_offset)) {
                           str_offset = "+"+timezone
                        } else {
                            str_offset = "+"+timezone;
                        }
                    } else {

                           str_offset = timezone;
                    }

                    return str_offset;

                }

            };




            var _calendar ={


                DisableWeekDaysfunction : function(date){

                      var day = date.getDay();
                	  //return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6)];
                 	  //return [($.inArray(day, _this.weekened) != -1)];
                      //console.log(weekened);
                 	  //return [(day != 0 && day != 1 )];

                 	   var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                      //console.log(y + "-" + _calendar.MonthConvert(date) + "-" + _calendar.day_of_the_month(date));

                      var ccdate = y + "-" + _calendar.MonthConvert(date) + "-" + _calendar.day_of_the_month(date);
                 	  return [($.inArray(day, _this.weekened) != -1) && ($.inArray(ccdate, _this.disabledDays) == -1)];


                },

                day_of_the_month : function(date)
                {
                  return (date.getDate() < 10 ? '0' : '') + date.getDate();
                },

                MonthConvert : function(date){
                    return (date.getMonth() < 9 ? '0': '') + (date.getMonth()+1);
                },

                noHolidays : function(date) {
                  return [!disableSpecificWeekDays(date) && !nationalDays(date)];
                },



                nationalDays : function(date) {
                    //console.log(date);
                  var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                  for (var i = 0; i < _this.disabledDays.length; i++) {
                      if ($.inArray((m + 1) + '-' + d + '-' + y, _this.disabledDays) != -1 || new Date() > date) {
                          return true;
                      }
                  }
                  return false;
                },

                disableSpecificWeekDays : function(date) {
                    var daysToDisable = _this.disabledDays;
                    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                    var day = y +"-"+ m +"-"+ d;
                      for (var i = 0; i < daysToDisable.length; i++) {
                          if ($.inArray(day, daysToDisable) != -1) {
                              return [true];
                          }
                      }
                      return [false];
                  },


                calledaftepageload : function() {

                   //console.log(_this.weekened);

                    var mindate = 0;

                    if(_this.never_view_in_same_day == 'true') {
                        mindate = 1;
                    }

                    //var mindate = new Date(_this.today_date);
                    //mindate.setDate(mindate.getDate() + 1);


                 	$( ".schedule-calendar-area .calendar" ).datepicker({
                		dateFormat: 'DD, M dd,  yy',
                		minDate: mindate,
                        multidate: true,
                        multidateSeparator: ',',
                        altField: "#alternate1",
                        selectMultiple:true,
                        //changeMonth: true,
                        //changeYear: true,
                		beforeShowDay: _calendar.DisableWeekDaysfunction,
                        onSelect: function(date, inst) {

                                $('#alternate1').html( date);


                                var jsDate = $(this).datepicker('getDate');
                               //console.log(jsDate);


                                if (jsDate !== null) {

                                    jsDate instanceof Date; // -> true
                                    _this.work_curr_date_number 	    = jsDate.getDate();
                                    _this.work_curr_date_month_number 	= jsDate.getMonth()+1;
                                    _this.work_curr_full_year 	        = jsDate.getFullYear();
                                    _this.numberofweekday               = jsDate.getDay();

                                    _this.selected_date = jsDate.getFullYear()+"-"+(jsDate.getMonth()+1)+"-"+jsDate.getDate();
                                   //console.log(_this.selected_date);

                                    //console.log(_this.work_curr_date_number);
                                    //console.log(_this.work_curr_date_month_number);
                                    //console.log(_this.work_curr_full_year);

                                    _this.curr_working_days();
        		                    _slot.console_today_selected_date();
                                }



                        },
                		onChangeMonthYear: function(year, month, widget) {
                			//reloadCalendar(month, year);
                			//alert('Change event');
                			//$('#slots').html('');
                			//$('#alternate1').html('');
                		}
                	});


                	$(".schedule-calendar-area .calendar").datepicker().datepicker("setDate", new Date(_this.selected_date));
                    $(".schedule-calendar-area .calendar").datepicker("refresh");

                	$('.schedule-calendar-area .calendar').change(function () {
                        //console.log('Calendar change');
                    });



                }

            };


            var _slot ={

                slot_design : function(strStartDate, strEndDate) {



                    var total_service_minutes   = Number(_this.total_service_minutes);
                    var preparation_time        = Number(_this.preparation_time);

                    var startTimeStr    =  strStartDate;
                    var endTimeStr      =  strEndDate;
                    //console.log('startTimeStr-'+startTimeStr);
                    //console.log('endTimeStr-'+endTimeStr);

                    var date1   = new Date(parseDate(startTimeStr)); // 9:00 AM
                        // New Changes
                        /* Important */

                    //var date1   = new Date("2020-6-10 9:00"); // 5:00 PM
                    var date2   = new Date(parseDate(endTimeStr)); // 5:00 PM

                    //console.log('date1:'+date1);
                    //console.log('date2:'+date2);




                    if (date2 < date1) {
                        date2.setDate(date2.getDate() + 1);
                    }



                    var diff = date2 - date1;

                    //console.log('diff-'+diff);
                    //console.log('total_service_minutes-'+_this.total_service_minutes);
                    //console.log('preparation_time-'+_this.preparation_time);

                    var intv = Number(_this.total_service_minutes) + Number(_this.preparation_time);
                    var msec = diff;
                    var hh = Math.floor(msec / 1000 / 60 / intv);


                    var htmlcolde = '';
                	var colsslot = Math.round(hh/7);

                 	var i, j, k=0, s= 0;
                 	var styleinc = 107, curr = 0;
                 	htmlcolde += '<ul id="timeslot" class="column-'+s+'" style="left: '+curr+'px;">';
                 	var slotcount = 0;

                 	//console.log(_this.disabletimeslots);
                 	var periodstart = "";
                 	var periodend = "";

                 	for (i = 0; i <= (hh-1); i++) {

                		k++;
                		var options = { hour: '2-digit', minute: '2-digit'/*, timeZone: "Asia/Dhaka"*/ };
                		var point = date1.toLocaleString('en-US',  options);
                		date1.setMinutes(date1.getMinutes() + total_service_minutes + preparation_time);

                		var selectedDateT = date1.getFullYear() + '-' + (date1.getMonth()+1) + '-' + date1.getDate();
                		var nslot = selectedDateT + ' ' + point;

                	    if(i== 0) {
                            periodstart = nslot;
                            periodend   = nslot;
                        } else {
                            periodstart = periodend;
                            periodend   = nslot;
                        }

                		//htmlcolde += '<li class="schedule-time"><a href="javascript:void(0)"  data-start-time="' + selectedDateT + ' ' + point + '"  ><span> ' + point +  '</span></a></li>';

                        //console.log(_this.disabletimeslots);
                            //console.log('_this.disabletimeslots.length-'+_this.disabletimeslots.length);


                            if(_this.disabletimeslots.length > 0) {


                                var z = "has_not_between_period";

                    	        for (var j = 0; j < _this.disabletimeslots.length; j++) {
                                    //console.log(j);
                                   // var d = new Date(_this.disabletimeslots[j]);
                                   if(z== "has_not_between_period") {
                                        /* Calculation start */


                                        var bookeddate      = Date.parse(_this.disabletimeslots[j] +" GMT") / 1000;

                                            /* Convert staff time to country time start */
                                            const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                                            //console.log(_this.disabletimeslots[j]+" "+_this.staff_country_offset);
                                            //var d_start   = new Date(_this.disabletimeslots[j]+" "+_this.staff_country_offset); // 9:00 AM new Date(conv_start_date_time);
                                            //d.toLocaleString('en-US', { timeZone: 'America/New_York' })
                                            //var n_d_start   = d_start.toLocaleTimeString(undefined, options);
                                            //var n_d_start   = d_start.toLocaleString('en-US', { timeZone: _this.staff_timezone_name });
                                            //console.log(n_d_start);
                                            //var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                                            //console.log(_this.disabletimeslots[j]+'-date time -'+n_t_start);
                                            //var at_start    = new Date(n_t_start).toLocaleTimeString(undefined, options);


                                            /* Convert staff time to country time end */



                                        var periodstart_    = Date.parse(periodstart + " GMT") / 1000;
                                        var periodend_      = Date.parse(periodend + " GMT") / 1000;

                                        if(i==0) {
                                            if ((bookeddate >= periodstart_) && (bookeddate < periodend_)){
                                                z = "has_between_period";
                                            } else {
                                                z =  "has_not_between_period";
                                            }
                                        } else {
                                            if ((bookeddate > periodstart_) && (bookeddate <= periodend_)){
                                                z = "has_between_period";
                                            } else {
                                                z =  "has_not_between_period";
                                            }
                                        }

                                        //console.log(z+"- bookeddate-"+bookeddate+" periodstart-"+periodstart_+" periodend-"+periodend_+" nslot-"+nslot);
                                        /* Calculation end */
                                   }

                                    //console.log(z+" periodstart-"+periodstart+" periodend-"+periodend);

                                }

                                if(z== "has_not_between_period") {
                    	            htmlcolde += '<li class="schedule-time"><a href="javascript:void(0)"  data-start-time="' + selectedDateT + ' ' + point + '"  ><span> ' + point +  '</span></a></li>';
                                } else {
                                    htmlcolde += '<li class="schedule-time disable"><span> ' + point +  '</span></li>';
                                }

                            } else {

                               htmlcolde += '<li class="schedule-time"><a href="javascript:void(0)"  data-start-time="' + selectedDateT + ' ' + point + '"  ><span> ' + point +  '</span></a></li>';
                            }


                        //console.log('Slot '+i+"= "+selectedDateT + ' ' + point);
                    	slotcount++;
                 	}

                 	htmlcolde += '</ul>';


                 	$(".schedule-available-time").html(htmlcolde);


                 	//   if time selected and match
                	$('#timeslot a').each(function(){
                		var newT = $(this).attr("data-start-time");
                		if($.inArray(newT, _this.selected_slots) != -1) {
                			$("a[data-start-time ='"+newT+"']").addClass('active');
                		} else {
                			//console.log("is NOT in array");
                		}
                	});


                    if(_this.step == "slots") {
                        $('#appointment-schedule').show();
                    }

                },

                selected_slot_deign : function(){

                    //console.log(_this.selected_slots);

          	        $(".selected-slots").html('');
                	_this.selected_slots.forEach(function(item){

                		var selectdatetime = item.split(' ');
                		var parts =selectdatetime[0].split('-');
                		var mydate = new Date(parts[0], (parts[1]-1), parts[2]);

                		 //const date = new Date(2009, 10, 10);  // 2009-11-10
                		const month = mydate.toLocaleString('default', { month: 'short' });

                	    //console.log('each'+mydate);
                		$(".selected-slots").append('<li data-before-on="Date" data-before-or="or"  data-of-start-time="'+item+'"><a href="javascript:void(0)" class="goto">'+month+' '+parts[2]+', '+selectdatetime[1]+' '+selectdatetime[2]+'</a><p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg> Time</p></li>');
                	    //console.log('selectdatetime :'+selectdatetime);

                	});
                },

                console_today_selected_date : function() {



                    $(".schedule-available-time").html('<span class="warningmsg">No slot available on selected date!</span>');

                    // promise call
                    //_this.kickOff(_this.selected_date);
                    _this.runSerial(_this.selected_date);



                },



            };


            $(document).ready(function(){

                    //console.log('validity-'+_today.validity_check());

                    //console.log('Document Ready:'+_this.current_timezone);
                    //$('#time_zone option:selected').val();
                    $('#time_zone option').filter(function() {
                        return ($(this).val() == _this.current_timezone); //To select Blue
                    }).prop('selected', true);

                    $('#client_country_id option').filter(function() {
                        return ($(this).attr('tz') == _this.current_timezone); //To select Blue
                    }).prop('selected', true);

            		$(document).on('click', '.miyn-iframe-popup-box2 a', function(){
            			$('.miyn-widget-popup-button').hide();
            			var popupLink = $(this).attr('href');
            			var popID = popupLink.replace( '#', '' );

            			console.log(popID);

            			$('#client_country_id option').filter(function() {
                            return ($(this).attr('tz') == _this.current_timezone); //To select Blue
                        }).prop('selected', true);

            			if(popID == "appointment-client-details") {

                            console.log('appointment-client-details');

            			    var countlenght = _this.selected_slots.length;
            			    if(countlenght > 0) {
            			        //console.log('true');
            			        //return true;
            			    } else {
            			        //console.log('false');
                                alert("Please select atleast one booking slot !!");
            			        return false;
            			    }
            			}

            			if(popID =="select-user0") {
            			    _this.selected_slots = [];
            			}

            			if(popID =="appointment-schedule") {

                            console.log('appointment-schedule');

                            _this.step = 'slots';
                            console.log('================================');
                            console.log('step-'+_this.step);

            			  if($(this).attr('data-item') !="Called") {

                                _this.selected_slots = [];
                                console.log('Called');

                			   // Setup basic data
                			   _this.service_index          = $(this).attr('service_index');
                			   _this.service_id             = $(this).attr('service_id');
                			   _this.service_name           = $(this).attr('service_name');
                			   _this.service_amt            = $(this).attr('service_amt');
                			   _this.service_currency       = $(this).attr('service_currency');
                			   _this.staff_id               = $(this).attr('staff_id');
                			   _this.staff_name             = $(this).attr('staff_name');
                			   _this.staffproffesion        = $(this).attr('staffproffesion');
                			   _this.appointmenttime        = $(this).attr('appointmenttime');
                			   _this.total_service_minutes  = $(this).attr('total_service_minutes');
                			   _this.preparation_time       = $(this).attr('preparation_time');
                			   _this.staff_country_offset   = $(this).attr('staff_country_offset');
                			   _this.staff_timezone_name    = $(this).attr('staff_timezone_name');
                			   _this.business_id            = $(this).attr('b_id');
                			   _this.never_view_in_same_day = $(this).attr('never_view_in_same_day');
                			   //console.log('_this.never_view_in_same_day-'+_this.never_view_in_same_day);

                			   // Box's Data
                			   _today.firstTimeData();

                			   // Calendar Setup
                			   _this.work_details       = $(this).attr('work_details');
                			   //console.log(_this.work_details);

                			   // First slot
                			   _this.curr_working_days();
                			   _this.curr_weekened();
                			   _calendar.calledaftepageload();

                			   $('a.ui-state-active').trigger('click');

                			   _slot.console_today_selected_date();




            			  } else {

            			  }

            			}


            			if(popupLink.startsWith('#') && (popID != '')) {
            				if(popID != 'close') {


            					$('.miyn-iframe-popup-box2').hide();

                                //alert(popID);

                                 if(popID != "appointment-schedule") {


                                    //alert(popID + ' = ' +_this.step);

                    					if($('#'+popID+"_").css('display') == 'none'){

                                            _this.step = "staff";
                    						$('#'+popID+"_").fadeIn();
                    						$('.miyn-widget-popup-close-button').show();
                    					}


                                        if(popID == 'appointment-lists') {
                                            _this.step = "appointment";
                                        }


                                        if(_this.step == "appointment") {
                                            $('#appointment-lists').show();
                                        }

                                        if(popID == 'appointment-client-details') {
                                            _this.step = "last";
                                        }

                                        if(_this.step == "last") {
                                            $('#appointment-client-details').fadeIn();
                                        }



                                    } else {
                                        $('#appointment-schedule').show();
                                    }



            				} else {
            					$('.miyn-iframe-popup-box2').fadeOut();
            					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
            					$('.miyn-widget-popup-close-button').fadeOut();
            				}
            			    return false;
            			} else {
            	  		    window.location.href = popupLink;
            			    return true;
            			}

            		});

            		$(document).on('click', '#timeslot li a', function () {

                        	var countlenght = _this.selected_slots.length;

                        //	//console.log(dateWiseTimes);

                        	//var dataId = $(this).attr('class');
                        	if($(this).hasClass('active')) {
                        		$(this).removeClass('active');
                        		_this.removeA(_this.selected_slots, $(this).attr("data-start-time"));

                        	//	 $(".selected-slots").prepend('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');

                        	} else {
                        		if(countlenght < 3) {
                        			_this.selected_slots.push($(this).attr("data-start-time"));
                        			$(this).addClass('active');

                        	//	 $(".selected-slots").append('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');

                        		} else {
                        			alert('Please select a maximum of 3 time slots for your booking to continue. !');
                        		}
                        	 }


                        	_slot.selected_slot_deign();


                    });


                    $(document).on('click', '.second-party-checked input[type="checkbox"]', function(){
                		if ($(this).prop('checked')) {
                		    $('.second-party-details-area').slideDown();
                        } else {
                            $('.second-party-details-area').slideUp();
                        }
            		});


            		$(document).on('click', '.schedule-available-time .schedule-time', function(){


            		});

            		$(document).on('click', '.selected-slots li', function () {

                    			 var selectdatetimestr     =   $(this).attr('data-of-start-time').split(' ');

                    			 //console.log('Called selected'+selectdatetimestr);



                    		//	 //console.log('This is selected date : '+selectdatetime);

                    			 var parts              =   selectdatetimestr[0].split('-');
                    			 var mydate             =   new Date(parts[0], (parts[1]-1), parts[2]);

                    			 //console.log('tab select - '+parts);

                    			 var selecmydate = mydate.getFullYear()+"-"+(mydate.getMonth()+1)+"-"+mydate.getDate();
                    			 _this.selected_date = selecmydate;

                                 // Select in tab
                    			 var datewise           = JSON.stringify(_this.selected_slots);
                    			  $('.schedule-calendar-area .calendar').datepicker("setDate", mydate);


                    			  _this.curr_working_days();
            			          _this.curr_weekened();

            			          _calendar.calledaftepageload();
            			          _slot.console_today_selected_date();
            			          _slot.selected_slot_deign();


                    });

            		 // Change while time zone
                	 $('#time_zone').on('change', function() {

                	     if(this.value !="") {

                	         _this.selected_slots = [];

                	         //console.log('-------------------------------');
                	         //console.log(this.value);

                	         _this.current_offset = $(this).children(":selected").attr("data-selectedoffset");
                    	     _this.current_timezone = this.value;

                    		 _changeTimeZone.after_change_timezone_box();

                    	    _this.curr_working_days();
            			    _this.curr_weekened();

            			    _calendar.calledaftepageload();
            			    _slot.console_today_selected_date();
            			    _slot.selected_slot_deign();


                	     }

                	});

            		$(document).on('click', '.schedule-times-nav .previous', function(){
            		    var $last = $('.schedule-time:last');
            		    $last.remove().css({ 'margin-left': '-105px' });
            		    $('.schedule-time:first').before($last);
            		    $last.animate({ 'margin-left': '0px' }, 1000);
            		});

            		$(document).on('click', '.schedule-times-nav .next', function(){
            		    var $first = $('.schedule-time:first');
            		    $first.animate({ 'margin-left': '-105px' }, 1000, function() {
            		        $first.remove().css({ 'margin-left': '0px' });
            		        $('.schedule-time:last').after($first);
            		    });
            		});



            		$('form[id="submitBookingformData"]').validate({
                        errorClass: "miynPopUpFormError",
                        validClass: "valid",
                          highlight: function( element, errorClass, validClass ) {
                            $(element).addClass(errorClass).removeClass(validClass);
                          },
                          unhighlight: function( element, errorClass, validClass ) {
                            $(element).removeClass(errorClass).addClass(validClass);
                          },
                        rules: {
                            c_first_name: 'required',
                            c_last_name: 'required',
                            c_phone: 'required',
                            c_note: 'required',
                            c_email: {
                              required: true,
                              email: true,
                            },
                            client_country_id: {
                                required: {
                                    depends: function(element) {
                                        return $("#client_country_id").val() == '';
                                    }
                                }
                            },
                            c_first_name_two: 'required',
                            c_last_name_two: 'required'

                        },
                        messages: {
                            /*c_first_name: 'required',
                            c_last_name: 'required',
                            c_phone: 'required',
                            c_note: 'required',
                            c_email: {
                              required: "required",
                              email: "name@email.com"
                            },
                            client_country_id: 'required',
                            client_country_id: 'required',
                            c_first_name_two: 'required',
                            c_last_name_two: 'required'*/


                        },
                        submitHandler: function(form) {
                            //alert('new schedule called');

                            var formdata = $(form).serialize();
                            //console.log(formdata);

                            var b_id            = _this.business_id
                            var dateWiseTimes   = _this.selected_slots;
                            var widghtid        = _this.service_id;
                            var staffid         = _this.staff_id;
                            var timezone        = _this.current_offset;
                            var timezonename    = _this.current_timezone;
                            var totalduration   = _this.total_service_minutes;

                            //$('#changeSubmit').text('Sending..');
                            $("#changeSubmit").attr("disabled", true);


                            var forms = $(form)[0]; // You need to use standard javascript object here
                            var fd = new FormData(forms);
                            fd.append("widghtid", widghtid);
                            fd.append("staffid", staffid);
                            fd.append("dateWiseTimes", dateWiseTimes);
                            fd.append("b_id", b_id);
                            fd.append("timezone", timezone);
                            fd.append("timezonename", timezonename);
                            fd.append("totalduration", totalduration);


                            var dataList = '';
                            for (var i = 0; i < dateWiseTimes.length; i++) {
                                dataList += '<span>'+dateWiseTimes[i]+'</span>';
                            }


                            $.ajax({
                                type: 'post',
                                url:'{{config('app.live_url')}}/add-booking-form-data',
                                //url:'{{url("/sendformdata")}}',
                                data:fd,
                                processData: false,
                                contentType: false,
                                success: function (data) {
                                    //console.log(data);


                                    $("#appointment-client-details").hide();
                                    $("#appointment-success").show();

                                    var html = "";
                                        html += '<div class="appointment-success-content">';
                    					    html += '<div class="appointments-icon">';
                    					        html += '<img src="{{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
                    					    html += '</div>';

                    					    html += '<div class="appointments-messages">';
                    					        html += '<h2>IMPORTANT NOTE:</h2><h3>Your booking is not confirmed yet!</h3>';
                    					        html += '<h3> You will receive an email once it is confirmed.</h3>';
                    					        html += '<h3><strong>Thank you for contacting us, and we look forward to meeting you soon!</strong></h3>';
                    					    html += '</div>';

                    					    html += '<div class="appointments-information">';
                    					        html += '<ul>';
                    					            html +='<li>';
                    					                html += '<h3 class="servicename">'+data.client_schedule.service_name+'</h3>';
                    					                html += '<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg> <span class="apointmenttime">'+data.client_schedule.service_price+' '+data.client_schedule.service_currency+'</span></p>';
                    					            html +='</li>';

                    					            html +='<li>';
                    					                html += '<h3 class="staffname">'+data.staff.staffname+'</h3>';
                    					                html += '<p class="staffproffesion">'+data.staff.staffproffesion+'</p>';
                    					            html +='</li>';

                    					            html +='<li>';
                    					                html += '<h3 class="timezonearea">'+data.client_schedule.timezone_name+'</h3>';
                    					                html += '<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539a6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539a6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855c.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/></svg> Timezone / offset</p>';
                    					            html +='</li>';

                    					            html +='<li>';
                    					                html += '<h3>1:00 PM <span>GMT +06.00</span></h3>';
                    					                html += '<p><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m15 16l-2.414-2.414A2 2 0 0 1 12 12.172V6"/></g></svg> '+data.client_schedule.schedule_dates+'</p>';
                    					                html += '<ul class="selected-slots">';
                    					                html += '</ul>';
                    					            html +='</li>';

                    					        html += '</ul>';
                    					    html += '</div>';


                    					    html += '<div class="appointment-success-actions">';
                    					        html +='<a href="#appointment-lists">Book another</a>';
                    					       /* html +='<a href="#">Manage Booking</a>';*/
                    					    html += '</div>';

                    				    html += '</div>';

                                   // $("#appointment-client-details").html(html);


                                }
                            });
                        }
                    });


            });


        }();


    </script>

<script type="text/javascript">
$( document ).ready(function() {

    setInterval(function(){
        var ww = screen.width;
        if(ww > 767) {
            $('.miyn-popup-load').removeClass('responsive-active');
        } else {
            $('.miyn-popup-load').addClass('responsive-active');
        }
    }, 100);

 // $(window).load(function() {
        //console.log('Called');
        $("body").removeClass("loader");
 //   });





});

function user_slot(key){
    userSlotNo = key;
    //alert(userSlotNo);
    $("#backpanel").attr("href","#"+"select-user"+userSlotNo);
}

</script>

<script type="text/javascript">

function receiveMessageFromIndex ( event ) {
    //console.log( { height: parseInt($("body").height()) } , event )
    parent.postMessage({ height: parseInt($("body").height()) },"*");
}

//Listen for message events
window.addEventListener("message", receiveMessageFromIndex, false);

</script>

</body>
</html>

