<?php 

$sender_type = request()->query('sender_type');

$business_info          = $response['business_info'];
$livesitestyleinfo      = $response['livesitestyleinfo'];
$staff_info             = $response['staff_info'];
$inbox_info             = $response['inbox_info'];
$staff_week_work_days   = $response['staff_week_work_days'];
$timezone               = $response['timezone'];
$staff_country          = $response['staff_country'];
$country                = $response['country'];
$client_schedule        = $response['client_schedule'];
$client_schedule_offset = $response['client_schedule_offset'];

if($sender_type == "client") {
  //dd($client_schedule_offset);
}

$service_info           = $response['service_info'];

$b_id                   = $business_info->id;

$service_id             = $service_info->id;
$service_name           = $service_info->service_name;
//dd($service_name);
$service_amt            = $service_info->service_price ?? '0';
$service_currency       = $service_info->service_currency;
$preparation_time       = $service_info->preparationtime_m;
//$appointmenttime      = $service_info->id;
$total_service_minutes  = $service_info->total_service_minutes;

$staff_id               = $staff_info->id;
$staff_name             = $staff_info->staffname;
$staffproffesion        = $staff_info->staffproffesion;
$staff_country_offset   = $staff_info->offset;
$staff_timezone_name    = $staff_country->timezone_name;
$work_details           = $staff_week_work_days;

$timez = "";

/*if($sender_type == 'admin'){
    $timez = $staff_timezone_name;
} else {
    $timez = $client_schedule->timezone_name;
}*/

$timez = $staff_timezone_name;


$color_bg   =   $livesitestyleinfo->action_background_color;

$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

$imagelink = "{{config('app.live_url')}}/newdesign/";
  
?>

    
<!DOCTYPE html>
<html>
<head>
    
	<title>MIYN Widget</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet"> 
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
        .miyn-iframe-popup-box:not(.miyn-appointment-schedule-area) {
            display: none;
        }

        /*POPUP APPOINTMENT LISTS STYLE*/
        .miyn-iframe-popup-box {
            padding-right: 8px;
        }
        .miyn-iframe-popup-box .appointment-list-area {
            padding-top: 20px;
            /*border-top: 1px solid #ffffff;*/
        }
        .miyn-iframe-popup-box .appointment-list-area ul {
            list-style: none;
            display: flex;
            flex-flow: wrap row;
            justify-content: space-between;
        }
        .miyn-iframe-popup-box .appointment-list-area ul li {
            width: calc(50% - 5px);
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        .miyn-iframe-popup-box .appointment-list-area ul li.full-width {
            width: 100%;
        }
        .miyn-iframe-popup-box .appointment-list-area ul li a {
        	display: flex;
            flex-flow: wrap row;
            background-color: #ffffff;
            padding: 15px 15px 5px;
            border-radius: 5px;
            text-decoration: none;
            height: 100%;
        	box-sizing: border-box;
        }
        .miyn-iframe-popup-box .appointment-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 5px;
        }
        .miyn-iframe-popup-box .appointment-icon img {
            height: 18px;
            width: auto;
        }	
        .miyn-iframe-popup-box .appointment-content {
            width: calc(100% - 40px);
            padding-left: 10px;
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box .appointment-content h3 {
            font-size: 12px;
            font-weight: 600;
            color: <?php echo $color_bg; ?>;
            margin: 0 0 5px;
            width: 100%;
        }
        .miyn-iframe-popup-box .appointment-content p {
        	color: #979797;
            font-size: 10px;
            margin: 0;
            line-height: 16px;
            width: 100%;
        }
        .miyn-iframe-popup-box .payment-duration {
            padding: 15px 0;
            border-top: 1px solid #F5F5F5;
            align-self: flex-end;
            width: 100%;
            margin-top: 15px;
            position: relative;
            display: flex;
            flex-flow: wrap row;
            justify-content: space-between;
        }
        .miyn-iframe-popup-box .payment-duration .selection-arrow {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 100%;
            border: 1px solid #F5F5F5;
            color: <?php echo $color_bg; ?>;
            font-size: 16px;
        }
        .miyn-iframe-popup-box .appointment-list-area ul li a:hover .selection-arrow {
        	background-color: <?php echo $color_bg; ?>;
            border: 1px solid <?php echo $color_bg; ?>;
        	color: #ffffff;
        }
        .miyn-iframe-popup-box .payment-duration ul {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .miyn-iframe-popup-box .payment-duration ul li {
            font-size: 10px;
            color: #7D7D7D;
            position: relative;
            margin: 0;
            width: auto;
        }
        .miyn-iframe-popup-box .payment-duration ul li i {
            margin-right: 5px;
        }
        .miyn-iframe-popup-box .appointment-list-area .payment-duration ul li:not(:first-child) {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
            padding-left: 10px;
            margin-left: 10px;
        }
        .miyn-iframe-popup-box .payment-duration ul li:not(:first-child)::after {
        	content: "";
        	position: absolute;
        	top: 50%;
        	left: 0;
        	border-left: 1px solid #E9E9E9;
        	height: 10px;
        	transform: translate(0, -50%);
        }
        .miyn-iframe-popup-box .payment-duration ul li span {
            font-weight: 600;
            font-size: 12px;
            color: #7D7D7D;
        }
        #miyn_iframe_box.miyn-widget-popup-content-area .miyn-widgets-popup-footer {
            background-color: #F6F6FA;
        }

        /*APPOINTMENT LIST CATEGORY STYLE STYLE*/
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
        
        /*USER SELECT POPUP STYLE*/
        .miyn-iframe-popup-box .selection-user-list-area {
            border-top: 1px solid #FFFFFF;
            padding-top: 20px;
            padding-bottom: 20px;
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box .miyn-previous-popup {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border: 1px solid <?php echo $color_bg; ?>;
            color: <?php echo $color_bg; ?>;
            border-radius: 100%;
        }
        .miyn-iframe-popup-box .miyn-previous-popup:hover {
        	background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
        }
        .miyn-iframe-popup-box .miyn-previous-popup img {
            width: 10px;
        }
        .miyn-iframe-popup-box .miyn-previous-popup:hover img {
        	filter: brightness(0) invert(1);
        }
        .miyn-iframe-popup-box .miyn-widgets-selected-appointment-info {
            width: calc(35% - 30px);
            box-sizing: border-box;
            padding-right: 30px;
            min-height: 370px;
        }
        .miyn-iframe-popup-box .selected-appointment-information {
            margin-top: 10px;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul {
            list-style: none;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul li {
            padding: 10px 0;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul li:nth-child(2) {
            border-top: 1px solid #ECECEC;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul li:not(:first-child) {
        	border-bottom: 1px solid #ECECEC;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul li h3 {
            font-size: 12px;
            color: #0E1130;
            font-weight: 600;
            margin: 0;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul li p {
            color: #515261;
            font-size: 11px;
            margin: 0;
        }
        .miyn-iframe-popup-box .selection-user-list-area > ul {
        	width: 65%;
            list-style: none;
            padding: 25px 0 0;
            margin: 0;
            position: relative;
        }
        .miyn-iframe-popup-box .selection-user-list-area > ul::after {
            content: "Select Available Stuff";
            position: absolute;
            top: 0;
            left: 0;
            line-height: 1;
            font-size: 12px;
            color: #0E1130;
            font-weight: 600;
        }
        .miyn-iframe-popup-box .selection-user-list-area ul li:not(:first-child) {
        	margin-top: 10px;
        }
        .miyn-iframe-popup-box .selection-user-list-area ul li a {
            display: flex;
            align-items: center;
            background-color: #ffffff;
            padding: 15px;
            /*border-radius: 5px;*/
            box-sizing: border-box;
            border: 1px solid #E9E9E9;
        }
        .miyn-iframe-popup-box .selection-user-list-area .user-thumb {
            width: 55px;
            height: 55px;
            overflow: hidden;
        }
        .miyn-iframe-popup-box .selection-user-list-area .user-thumb img {
        	max-width: 100%;
        }
        .miyn-iframe-popup-box .selection-user-list-area .user-name {
            width: calc(100% - 55px);
            box-sizing: border-box;
            padding-left: 15px;
        }
        .miyn-iframe-popup-box .selection-user-list-area .user-name h3 {
            font-size: 14px;
            font-weight: 600;
            color: <?php echo $color_bg; ?>;
            margin: 0 0 10px;
            line-height: 1;
        }
        .miyn-iframe-popup-box .selection-user-list-area .user-name p {
        	font-size: 12px;
        	color: #696969;
        	line-height: 16px;
        	margin: 0;
        }


        /*SCHEDULE POPUP STYLE*/
        .miyn-iframe-popup-box .appointment-schedule-content-area {
            padding-top: 20px;
            border-top: 1px solid #ffffff;
        }
        .miyn-iframe-popup-box .appointment-schedule-content-area {
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box .schedule-calendar-area {
            width: calc(100% - 150px);
            box-sizing: border-box;
            position: relative;
            padding-top: 35px;
        }
        .miyn-iframe-popup-box .schedule-calendar-area::after {
            content: "Your Preferred Times (Suggest Up To 3)";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            font-size: 12px;
            color: #0E1130;
        }
        .miyn-iframe-popup-box .schedule-navigation-area {
            /* align-items: flex-start; */
            width: 100%;
            box-sizing: border-box;
            margin: 15px 0 0 auto;
            padding: 0;
            /* display: flex; */
            /* flex-flow: wrap row; */
        }
        .miyn-iframe-popup-box .schedule-available-time-area {
            width: 150px;
            padding: 0 15px;
            box-sizing: border-box;
            max-height: 255px;
            overflow-y: auto;
            background-color: #F9F9F9;
            padding: 15px;
        }
        .miyn-iframe-popup-box .schedule-available-time-area::-webkit-scrollbar {
        	border-radius: 10px;
            width: 10px;
        }
        .miyn-iframe-popup-box .schedule-available-time-area::-webkit-scrollbar-track {
        	border-radius: 10px;
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box .schedule-available-time-area::-webkit-scrollbar {
        	border-radius: 10px;
        	width: 8px;
        	background-color: #ffffff;
        }
        .miyn-iframe-popup-box .schedule-available-time-area::-webkit-scrollbar-thumb {
        	border-radius: 10px;
        	background-color: #D5D5E1;
        }
        .miyn-iframe-popup-box .schedule-time-row:first-child .schedule-time:first-child {
            margin-top: 0;
        }
        .miyn-iframe-popup-box .schedule-time-row .schedule-time {
            margin-top: 10px;
        }
        .schedule-available-time-area p {
            font-size: 12px;
            line-height: 27px;
            color: #000000;
        }
        .miyn-iframe-popup-box .schedule-time a {
        	background-color: #ffffff;
            padding: 4px;
            border-radius: 5px;
            font-size: 11px;
            color: #696969;
            width: 100%;
            text-align: center;
            cursor: pointer;
            box-sizing: border-box;
            display: inline-block;
        }
        
        .miyn-iframe-popup-box .schedule-time:not(:first-child) {
            margin-top: 6px;
        }
        
        .miyn-iframe-popup-box .schedule-time a.active {
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
        }

        .miyn-iframe-popup-box .next-popup-navgitation {
        	width: 120px;
        }
        .miyn-iframe-popup-box .next-popup-navgitation a {
            display: flex;
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
            font-size: 12px;
            min-height: 35px;
            align-items: center;
            width: 100%;
            justify-content: center;
            border-radius: 2px;
        }
        .miyn-iframe-popup-box .scheule-popup-bottom-info {
            width: 100%;
            box-sizing: border-box;
            align-self: flex-end;
        }
        .reschedule-details-area {
            width: 100%;
            align-self: flex-start;
            margin-top: 15px;
        }
        .reschedule-details-area textarea, .reschedule-details-area textarea:focus {
            font-family: 'Poppins', sans-serif;
            width: 100%;
            border: 1px solid #ECECEC;
            resize: none;
            min-height: 100px;
            box-shadow: none;
            outline: none;
            padding: 10px;
            color: #696969;
        }
        .reschedule-details-area textarea::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            font-family: 'Poppins', sans-serif;
            color: #999999;
        }
        .reschedule-details-area textarea::-moz-placeholder { /* Firefox 19+ */
            font-family: 'Poppins', sans-serif;
            color: #999999;
        }
        .reschedule-details-area textarea:-ms-input-placeholder { /* IE 10+ */
            font-family: 'Poppins', sans-serif;
            color: #999999;
        }
        .reschedule-details-area textarea:-moz-placeholder { /* Firefox 18- */
            font-family: 'Poppins', sans-serif;
            color: #999999;
        }
        .reschedule-details-area p {
            font-size: 12px;
            color: #696969;
        }
        .miyn-iframe-popup-box .scheule-popup-bottom-info p {
            font-size: 12px;
            color: #696969;
            margin: 0;
            line-height: 16px;
        }
        .miyn-iframe-popup-box .scheule-popup-bottom-info a {
        	color: <?php echo $color_bg; ?>;
        }
        
        
        /*CALENDAR STYLE START*/
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-prev {
        	left: initial;
            right: 30px;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-prev.ui-state-hover.ui-datepicker-next-hover {
            right: 30px;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-prev {
            background-image: url(<?php echo $imagelink; ?>/images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            transform: rotate(180deg);
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-prev span {
            display: none;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-next {
            background-image: url(<?php echo $imagelink; ?>/images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-next span {
            display: none;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-prev, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-next {
            cursor: pointer;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .calendar .ui-datepicker-inline {
            border: 0;
            margin: 0;
            width: 100%;
            box-sizing: border-box;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-header {
            position: relative;
            padding: 8px 0;
            background-color: transparent;
            border: 0;
            border-radius: 0;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-title {
            margin: 0;
            line-height: initial;
            text-align: left;
            font-size: 14px;
            color: #0E1130;
            font-weight: 600;
            padding: 0 15px;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker thead {
            border-width: thin 0 thin;
            border-style: solid;
            border-color: #D5D5D5;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker thead th {
        	font-size: 12px;
        	font-weight: 600;
        	color: #696969;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-state-default, .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-content .ui-state-default, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-header .ui-state-default, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-button {
            background-color: transparent;
            font-weight: normal;
            color: #696969;
            text-align: center;
            border: 0;
        } 
        html .miyn-iframe-popup-box .schedule-calendar-area .ui-button.ui-state-disabled:hover, 
        html .miyn-iframe-popup-box .schedule-calendar-area .ui-button.ui-state-disabled:active {
            border: 0;
            background-image: url(<?php echo $imagelink; ?>/images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            background-color: transparent;
            font-weight: normal;
            color: #696969;
            text-align: center;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-state-hover, .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-content .ui-state-hover, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-header .ui-state-hover, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-state-focus, .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-content .ui-state-focus, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-widget-header .ui-state-focus, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-button:hover, .schedule-calendar-area .ui-button:focus {
            border: 0;
            background-image: url(<?php echo $imagelink; ?>/images/right-arrow.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 8px auto;
            background-color: transparent;
            font-weight: normal;
            color: #696969;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-state-hover:hover, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-hover:hover {
            color: #ffffff;
            position: relative;
            z-index: 1;
            line-height: 13px;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-state-hover:hover::after, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-hover:hover::after {
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
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-state-active, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-active {
            color: #ffffff;
            position: relative;
            z-index: 1;
            line-height: 13px;
            margin: 5px 0;
        }
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-state-active::after, 
        .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker-calendar .ui-widget-content .ui-state-active::after {
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
        
        
        .selected-slots {
            display: flex;
            align-items: center;
            flex-flow: wrap row;
            justify-content: space-between;
        }
        
        ul.selected-slots li a {
            font-size: 13px;
            font-weight: 600;
            color: <?php echo $color_bg; ?>;
        }
        
        
        
        /*SUBMIT DETAILS POPUP STYLE*/
        .miyn-iframe-popup-box .appointment-submit-details-content {
            padding-top: 20px;
            border-top: 1px solid #ffffff;
        }
        .miyn-iframe-popup-box .appointment-submit-details-content {
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box .miyn-appointment-submit-details-contents {
            width: 65%;
            margin-bottom: 20px;
        }
        .miyn-iframe-popup-box .appintment-submit-detail-form {
            background-color: #FFFFFF;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
            padding: 20px;
            margin-top: 20px;
        }
        .miyn-iframe-popup-box .appointment-submit-details-content > h3 {
            font-size: 14px;
            font-weight: 600;
            color: #0E1130;
            margin: 0 0 15px;
        }
        .miyn-iframe-popup-box .appintment-submit-detail-form {
        	width: 100%;
        }
        .miyn-iframe-popup-box .two-col-field {
            display: flex;
            justify-content: space-between;
            flex-flow: wrap row;
            margin-top: 10px;
        }
        .miyn-iframe-popup-box .form-field:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-iframe-popup-box .two-col-field .form-field {
            max-width: calc(50% - 5px);
            width: 100%;
            margin-top: 0;
        }
        
        .three-col-field {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
        }
        
        .three-col-field .form-field {
            width: 32%;
        }
                
        .miyn-iframe-popup-box .form-field input, .miyn-iframe-popup-box .form-field textarea {
            width: 100%;
            box-sizing: border-box;
            background-color: #F6F6FA;
            border: 1px solid #E9E9E9;
            padding: 0 10px;
            line-height: 35px;
            color: #8A8A8A;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
        }
        .miyn-iframe-popup-box .form-field select {
        	background-color: #F6F6FA;
        	border: 1px solid #E9E9E9;
        	padding: 8px 10px 7px;
        	width: 100%;
        	box-sizing: border-box;
        	color: #8A8A8A;
        	font-family: 'Poppins', sans-serif;
        	padding-left: 5px;
        	font-size: 12px;
        }
        .miyn-iframe-popup-box .form-field input:focus, .miyn-iframe-popup-box .form-field textarea:focus {
            outline: none;
        }
        .miyn-iframe-popup-box .submit-button {
            margin-top: 5px;
        }
        .miyn-iframe-popup-box .submit-button a, .miyn-iframe-popup-box .submit-button button {
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
        
        
        
        label.miynPopUpFormError {
            color:red !important;
            display:block;
        }
        .miynPopUpFormError {
            color: #f00f00;
            font-size: 10px;
            padding-top:4px;
        }
        
        
        /*SUCCESS POPUP STYLE*/
        .miyn-iframe-popup-box .miyn-appointment-success-area {
        	display: none;
        }
        .miyn-iframe-popup-box .appointment-success-content {
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 10px 20px 10px;
            max-width: 500px;
            margin: 30px auto;
        }
        .miyn-iframe-popup-box .appointments-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F9F9F9;
            border-radius: 100%;
            margin: 0 auto 15px;
        }
        .miyn-iframe-popup-box .appointments-messages {
            text-align: center;
        }
        .miyn-iframe-popup-box .appointments-messages h3 {
            font-size: 14px;
            color: #0E1130;
            font-weight: 700;
        }
        .miyn-iframe-popup-box .appointments-messages p {
            color: #696969;
            font-size: 12px;
            font-style: italic;
            margin: 0 0 15px;
        }
        .miyn-iframe-popup-box .appointments-messages p:last-child {
            font-weight: 500;
            color: #0E1130;
            margin: 25px 0 0;
        }
        .miyn-iframe-popup-box .appointment-success-content ul li:not(:first-child) {
            margin-top: 0;
            padding-top: 0;
            border-top: 0;
        }
        .miyn-iframe-popup-box .appointment-success-content .appointments-information > ul li {
            display: flex;
            flex-flow: wrap row;
        	background-color: #F9F9F9;
        	padding: 8px 10px;
        }
        .miyn-iframe-popup-box.miyn-appointment-success-area .appointment-success-content .appointments-information .selected-slots li {
            margin: 0;
            padding: 0;
        }
        .miyn-iframe-popup-box.miyn-appointment-success-area .appointment-success-content .appointments-information > ul li p {
            width: 100%;
        }
        .miyn-iframe-popup-box .appointments-information > ul li:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-iframe-popup-box .appointments-information {
            font-size: 12px;
        	margin-top: 20px;
        }
        .miyn-iframe-popup-box .appointment-success-actions {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        .miyn-iframe-popup-box .appointment-success-actions a {
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
        .miyn-iframe-popup-box .info-title {
            font-weight: 600;
        	width: 40%;
        }
        .miyn-iframe-popup-box .info-contents {
            width: 60%;
            position: relative;
            padding-left: 8px;
            box-sizing: border-box;
            color: #696969;
            font-size: 10px;
            line-height: 14px;
        }
        .miyn-iframe-popup-box .info-contents::after {
            content: ":";
            position: absolute;
            top: 0;
            left: 0;
        }
        .miyn-iframe-popup-box .info-contents ul {
            display: flex;
            flex-flow: wrap row;
        }
        .miyn-iframe-popup-box .appointment-success-content .appointments-information > ul li .info-contents ul li {
        	padding: 0;
        	position: relative;
        }
        .miyn-iframe-popup-box .appointment-success-content .appointments-information .info-contents ul li:not(:last-child) {
        	padding-right: 10px;
        }
        .miyn-iframe-popup-box .info-contents ul li:not(:last-child)::after {
        	content: ",";
        	position: absolute;
        	right: 6px;
        	bottom: 0;
        }
        .miyn-iframe-popup-box .appointment-success-content .appointments-information > ul li .info-contents ul li:not(:first-child) {
            margin-top: 0;
        }
        .miyn-iframe-popup-box .miyn-appointment-success-area .miyn-widgets-popup-footer {
        	background-color: #ffffff;
        }


        /*GET A QUOTE STYLE*/
        .miyn-appointment-get-quote-area .miyn-appointment-submit-details-contents h3 {
            color: #0E1130;
            font-size: 14px;
        }
        .miyn-appointment-get-quote-area .appointment-submit-details-content {
            background-color: transparent;
        }
        .miyn-appointment-get-quote-area.form-field input, .miyn-appointment-get-quote-area.miyn-iframe-popup-box2 .form-field textarea {
            border: 1px solid #ffffff;
            background-color: #ffffff;
            border-radius: 2px;
        }
        
        
        .schedule-main-area {
            max-width: calc(100% - 35%);
            display: flex;
            flex-flow: wrap row;
            align-items: flex-start;
        }
        
        .time-zone-picker {
            padding: 3px;
            border: 1px solid #e1e1e1;
            box-sizing: border-box;
            box-shadow: none;
        }
        
        .miyn-iframe-popup-box .selected-appointment-information ul li:last-child {
            border-bottom: 0;
        }
        
        .miyn-iframe-popup-box .selected-appointment-information ul li .selected-slots li {
            padding: 0;
            border-bottom: 0;
            position: relative;
            border-top: 0;
            width: calc(50% - 5px);
        }
        
        .miyn-iframe-popup-box .selected-appointment-information ul li .selected-slots li:nth-child(odd)::after {
            content: "";
            position: absolute;
            top: 0;
            right: -3px;
            height: calc(100% - 10px);
            border-right: 1px solid #ECECEC;
        }
        
        .miyn-iframe-popup-box .selected-appointment-information ul .selected-staff-timezone li:not(:first-child) {
            padding-left: 5px;
        }
        .miyn-iframe-popup-box .selected-appointment-information ul .selected-staff-timezone li {
            border-top: 0;
            padding: 0;
        }
        .selected-staff-timezone ul {
            display: flex;
            justify-content: space-between;
        }
        .miyn-iframe-popup-box .appointment-success-content .appointments-information .selected-staff-timezone ul li {
            padding: 0;
            margin: 0;
        }
        .miyn-iframe-popup-box .appintment-submit-detail-form > div:first-child {
            margin-top: 0;
        }
        

            
        .miyn-iframe-popup-box .scheule-popup-bottom-info .time-zone-picker {
            color: #696969;
            max-width: 165px;
        }
        
        .alternate1 {
            font-size: 12px;
            color: <?php echo $color_bg; ?>;
            font-weight: 600;
            margin-top: 13px;
        }
        
       /* LOADER */
         .loader {
            z-index: 9999;
            margin: 0;
            position: relative;
        }
        
        .loader::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{config('app.cdn_url')}}/images/loader.gif") 50% 50% no-repeat rgb(249,249,249);
            background-position: center;
            opacity: 0.8;
        }
        
        span.warningmsg {
            font-size: 10px;
            writing-mode: vertical-lr;
            display: flex;
            align-items: center;
            line-height: 50px;
            padding-top: 51px;
        }
        
        
        /* Sticky */
        .stickyimportant {
            position: relative;
        }
        .stickyposition {
            position: fixed;
        }
        
        .stickyoff {
            margin-left: 35%;
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
        .reschedule-details-area #reschedule_details {
            max-width: 400px;
        }
    
        
	</style>
	
	
</head>
<body class="loader">
    
    <div class="loader"></div>
    
    <div id="appointment-schedule" class="miyn-appointment-schedule-area miyn-iframe-popup-box">
        <form id="submitRescheduleformData">
            {{ csrf_field() }}
    	    <div class="appointment-schedule-content-area">
    		<div class="miyn-widgets-selected-appointment-info">
    			<div class="selected-appointment-information">
    				<ul>
    					<li>
    						<h3 class="servicename"></h3>
    						<p><i class="far fa-clock"></i> <span class="apointmenttime"></span> </p>
    					</li>
    					<li>
    						<h3 class="staffname"></h3>
    						<p class="staffproffesion"></p>
    					</li>
    					<li>
    						<h3 class="timezonearea"></h3>
    						<p><i class="fa fa-globe" aria-hidden="true"></i> Timezone / offset</p>
    					</li>
    					<li>
    						<ul class="selected-slots">
    						    
    						</ul>
    						<!--<p><i class="far fa-clock"></i> Time</p>-->
    					</li>
    				</ul>
    			</div>
    		</div>
    		
    		<div class="schedule-main-area">
        		<div class="schedule-calendar-area">
        			<div class="calendar"></div>
        			<div class="alternate1">Availability for <span id="alternate1"></span></div>
        		</div>
        		<div class="schedule-available-time-area">
                    <p>Select your time slot</p>
        			<div class="schedule-available-time"></div>
        		</div>
    			<div class="scheule-popup-bottom-info">
    				
    			</div>
        		<div class="reschedule-details-area">
        		    <textarea id="reschedule_details" name="reschedule_details" placeholder="Re-schedule details..."></textarea>
        		    <input type="hidden" name="inb_uid" id="inb_uid" value="{{ $inbox_info->inb_uid }}">
        		</div>
        		<div class="schedule-navigation-areas">
        			<div class="next-popup-navgitation submit-button">
        				<button class="ui-buttons">Confirm</button>
        			</div>
        		</div>
    		</div>
    		
    	</div>
    	</form>
    </div>
    

    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    
    <script src="{{asset('miyn-widget-4/js/jquery.min.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery-ui.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery.validate.min.js')}}"></script>
    
    <script type="text/javascript">

        ! function() {
            "use strict";
            
            var _this ={
                
                req_type             : '<?php echo $sender_type; ?>',
                business_id         : 0,
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
                
                server_time         : '<?php echo date('Y-m-d h:i A'); ?>',
                numberofweekday     : '',
                
                current_offset      : '<?php echo $client_schedule_offset; ?>',
                
               // current_timezone    : Intl.DateTimeFormat().resolvedOptions().timeZone,
                current_timezone    : '<?php echo $timez; ?>',
                
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
                
                convert_date_time : function(datetimeparam, offsetparam, timezonename){  // any datetime ,  offset , timezone (return new date)
                
                    //console.log(datetimeparam);
        
                    var d = new Date(datetimeparam); 
        
                    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime =  d.toLocaleTimeString(undefined, options);
                    var aestTime = new Date(datetime+" "+offsetparam).toLocaleString("en-US", {timeZone: timezonename});
                    return (new Date(aestTime).toLocaleTimeString(undefined, options));
                    
                },
                
                curr_working_days : function() {
            
                    var data = _this.work_details;
                    //data = $.parseJSON(data);
                    //console.log(data);
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
                			    //console.log('v.day == _this.numberofweekday');
                			    //console.log(v.starttime_h + "-" + v.starttime_m + "-" + v.endtime_h + "-" + v.endtime_m);
                            }
                    });
                    
                    _this.convert_work_times_deafult_timezone();
                    //console.log(arr);
                    _this.weekened = arr;
                    
                },
                
                convert_work_times_deafult_timezone : function() {
                    
                    //console.log('convert_work_times_deafult_timezone');
        
                    var conv_start_date_time    = _this.selected_date+" "+_this.work_start_hour+":"+ _this.work_start_min;
                    var conv_end_date_time      = _this.selected_date+" "+_this.work_end_hour+":"+ _this.work_end_min;
                    
                    //console.log('conv_start_date_time-'+conv_start_date_time);
                    //console.log('conv_end_date_time-'+conv_end_date_time);
                    
                    if(_this.req_type == 'client') {
                        
                        var str_offset = "";
                        if (_this.staff_country_offset > 0) {
                            if(Number.isInteger(_this.staff_country_offset)) {
                               str_offset = "+"+_this.staff_country_offset
                            } else {
                                str_offset = "+"+_this.staff_country_offset;
                            }
                        } else {
                            
                               str_offset = _this.staff_country_offset;
                        }
                        
                        
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
                        var d_start     = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time); 
                        var n_d_start   = d_start.toLocaleTimeString(undefined, options); // ReS -- final

                        var n_t_start   = new Date(n_d_start+ " " +str_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                        var at_start    = new Date(n_t_start).toLocaleTimeString(undefined, options);
                        //console.log('at_start-'+at_start);
                        
                        var d_end       = new Date(endYear, endMonth, endDate,  endHour, endMin); // 9:00 AM new Date(conv_start_date_time); 
                        var n_d_end     = d_end.toLocaleTimeString(undefined, options);  // ReS -- final
                        var n_t_end     = new Date(n_d_end+ " " +str_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                        var at_end      = new Date(n_t_end).toLocaleTimeString(undefined, options);
                        
                        //console.log('at_end-'+at_end);
                        
                        _this.conv_work_start_date_time = at_start;
                        _this.conv_work_start_hour      = (new Date(at_start)).getHours();
                        _this.conv_work_start_min       = (new Date(at_start)).getMinutes();

                        
                        //var d_end       = new Date(endYear, endMonth, endDate,  endHour, endMin); // 9:00 AM new Date(conv_start_date_time); 
                        //var n_d_end     = d_end.toLocaleTimeString(undefined, options);  // ReS -- final
                        
                        ///var n_t_end     = new Date(n_d_end+ " " +str_offset).toLocaleString("en-US", {timeZone: _this.staff_timezone_name}); //_this.current_timezone
                        //var at_end      = new Date(n_d_end).toLocaleTimeString(undefined, options);
                        
                        _this.conv_work_start_date_time = at_end;
                        _this.conv_work_end_hour        = (new Date(at_end)).getHours();
                        _this.conv_work_end_min         = (new Date(at_end)).getMinutes();
                        
                    }
                    
                    if(_this.req_type == 'admin') {
                        
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
                        var d_start   = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time); 
                        var n_d_start   = d_start.toLocaleTimeString(undefined, options); // ReS -- final
                        //console.log('_this.staff_country_offset-'+_this.staff_country_offset);
                        //console.log('_this.current_timezone-'+_this.current_timezone);
                        
                        //var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                        var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.staff_timezone_name}); //_this.current_timezone
                        var at_start    = new Date(n_t_start).toLocaleTimeString(undefined, options);
                        //console.log('at_start-'+at_start);
                        
                        _this.conv_work_start_date_time = at_start;
                        _this.conv_work_start_hour      = (new Date(n_d_start)).getHours();
                        _this.conv_work_start_min       = (new Date(n_d_start)).getMinutes();
                        //console.log(_this.conv_work_start_min);
                        //console.log(n_d_start);
                        
                        var d_end       = new Date(endYear, endMonth, endDate,  endHour, endMin); // 9:00 AM new Date(conv_start_date_time); 
                        var n_d_end     = d_end.toLocaleTimeString(undefined, options);  // ReS -- final
                        
                        var n_t_end     = new Date(n_d_end+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.staff_timezone_name}); //_this.current_timezone
                        var at_end      = new Date(n_t_end).toLocaleTimeString(undefined, options);
                        
                        _this.conv_work_start_date_time = at_end;
                        _this.conv_work_end_hour        = (new Date(n_d_end)).getHours();
                        _this.conv_work_end_min         = (new Date(n_d_end)).getMinutes();
                        
                    }
        
                },
                
                convert_real_cllient_timezone : function() {
                    
                    //console.log('convert_work_times_deafult_timezone');
        
                    var conv_start_date_time    = _this.selected_date+" "+_this.work_start_hour+":"+ _this.work_start_min;
                    var conv_end_date_time      = _this.selected_date+" "+_this.work_end_hour+":"+ _this.work_end_min;
                    
                    console.log('conv_start_date_time-'+conv_start_date_time);
                    console.log('conv_end_date_time-'+conv_end_date_time);
        
                },
                
                convert_work_times_deafult_clint_timezone : function() {
                    
                    //console.log('convert_work_times_deafult_timezone');
        
                    var conv_start_date_time    = _this.selected_date+" "+_this.work_start_hour+":"+ _this.work_start_min;
                    var conv_end_date_time      = _this.selected_date+" "+_this.work_end_hour+":"+ _this.work_end_min;
                    
                    //console.log('conv_start_date_time-'+conv_start_date_time);
                    
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
                    var d_start   = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM new Date(conv_start_date_time); 
                    var n_d_start   = d_start.toLocaleTimeString(undefined, options); // ReS -- final
                    console.log('_this.staff_country_offset-'+_this.staff_country_offset);
                    console.log('_this.current_timezone-'+_this.current_timezone);
                    
                    //var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                    var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.staff_timezone_name}); //_this.current_timezone
                    var at_start    = new Date(n_t_start).toLocaleTimeString(undefined, options);
                    console.log('at_start-'+at_start);
                    
                    _this.conv_work_start_date_time = at_start;
                    _this.conv_work_start_hour      = (new Date(n_d_start)).getHours();
                    _this.conv_work_start_min       = (new Date(n_d_start)).getMinutes();
                    //console.log(_this.conv_work_start_min);
                    //console.log(n_d_start);
                    
                    var d_end       = new Date(endYear, endMonth, endDate,  endHour, endMin); // 9:00 AM new Date(conv_start_date_time); 
                    var n_d_end     = d_end.toLocaleTimeString(undefined, options);  // ReS -- final
                    
                    var n_t_end     = new Date(n_d_end+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.staff_timezone_name}); //_this.current_timezone
                    var at_end      = new Date(n_t_end).toLocaleTimeString(undefined, options);
                    
                    _this.conv_work_start_date_time = at_end;
                    _this.conv_work_end_hour        = (new Date(n_d_end)).getHours();
                    _this.conv_work_end_min         = (new Date(n_d_end)).getMinutes();
                    //console.log(_this.conv_work_end_hour);
                    //console.log(_this.conv_work_end_min);
                    
                    //console.log(n_d_end);
                    
                /*    
                    if(Number(_this.work_end_hour) > 12) {
                        
                    }
                */
        
        
                },
                
                curr_weekened : function() {
            
                    var data = _this.work_details;
                    //data = $.parseJSON(data);
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
                
                convert_date_time : function(){
                  
                    // server time this.server_time
                    //Y-m-d 4:35 AM
                    
                    //console.log('_this.server_time-'+_this.server_time);
        
                    var d           = new Date(_this.server_time); 
                    const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime    =  d.toLocaleTimeString(undefined, options);
                    var aestTime    = new Date(datetime+ " +00:00").toLocaleString("en-US", {timeZone: _this.current_timezone});
                    var conv_date   = (new Date(aestTime).toLocaleTimeString(undefined, options));
                    
                    //console.log('conv_date-'+conv_date);
                    
                    //
                    var today               = new Date(conv_date);
                    
                    
                    var date                = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                    
                    _this.today_date        = date;
                    _this.today_date_time   = date+" "+today.getHours()+":"+today.getMinutes();
                    _this.selected_date     = date;
                    _this.numberofweekday   = today.getDay();
                    
                    //console.log('conv_date-'+conv_date);
                    
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
                
                    //console.log('firstTimeData');
                    
                    $("h3.servicename").text(_this.service_name);
                    $("span.apointmenttime").text(_this.appointmenttime);
                    
                    $("h3.staffname").text(_this.staff_name);
                    $("p.staffproffesion").text(_this.staffproffesion);
                    
                    //_this.current_offset = _today.c_offset();
                    
                    //console.log('AAA-'+_today.convert_date_time());
                    var convdattime = _today.convert_date_time();
                    
                    //$("span.v-timezonename").text(_today.convert_date_time()+', GMT '+_today.c_offset_formate());
                    //$("h3.timezonearea").text(convdattime + ', GMT ' +_today.c_offset_formate());
                    //_this.current_timezone      = _this.staff_timezone_name;
                    //_this.staff_country_offset  = _this.staff_country_offset;
                    
                    $("span.v-timezonename").text(_this.staff_timezone_name+', GMT '+_this.staff_country_offset);
                    $("h3.timezonearea").text(_this.staff_timezone_name+', GMT '+_this.staff_country_offset);
                     
                    //console.log('change_with_client_timezone'); 
                    
                },
                
                first_time_setup : function(){    // _l.a()
        
                  
        
                },
                
                change_with_client_timezone : function(clienttimezone, clientoffset){    // _l.a()
        
                     //console.log('------ Change ------');
        
                     _this.selected_slots = [];

        	         _this.current_offset = clientoffset;
            	     _this.current_timezone = clienttimezone;
            	     
            	     //console.log('------------ fdfgfdg-------------------');
        	         //console.log(clienttimezone);
        	         //console.log(_this.current_offset);
            	     
                 	 $("span.v-timezonename").text(_this.current_timezone+', GMT '+_this.current_offset);
                     $("h3.timezonearea").text(_this.current_timezone+', GMT '+_this.current_offset);
            	      
             		 _changeTimeZone.after_change_timezone_box();
            		 
             	     _this.curr_working_days();
    			     _this.curr_weekened();
    			    
    			     _calendar.calledaftepageload();
    			     _slot.console_today_selected_date();
    			     _slot.selected_slot_deign();
        
                },
        
                
            };
            
            
            var _thisSelected ={
            
                
                change_date_time : function(){
                  
                    // server time this.server_time
                    //Y-m-d 4:35 AM
                       
                    //Current Date
                    var CKDate                  = new Date(_this.selected_date);
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
                   //console.log('_this.selected_date-'+_this.selected_date);
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
                   
                   //console.log('after_change_timezone_box');
        
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
                 	  return [($.inArray(day, _this.weekened) != -1)];
                      //console.log(weekened);
                 	  //return [(day != 0 && day != 1 )];
                }, 
                
                calledaftepageload : function() {
            
                   //console.log(_this.weekened);
                 
                 	$( ".schedule-calendar-area .calendar" ).datepicker({
                		dateFormat: 'DD, M dd,  yy',
                		minDate: 0,
                        multidate: true,
                        multidateSeparator: ',',
                        altField:   "#alternate1",
                        selectMultiple:true,
                		beforeShowDay: _calendar.DisableWeekDaysfunction,
                        onSelect: function(date, inst) { 
                
                                $('#alternate1').html( date);
                                
                               
                               //console.log('Changed date');
                
                                var jsDate = $(this).datepicker('getDate');
                                //console.log('jsDate-'+jsDate);
                               
                                
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
                                
                                //this.current_offset = _today.c_offset();
                                //console.log(_this.current_offset);
                    
                                //console.log('AAA-'+_today.convert_date_time());
                                //var convdattime = _today.convert_date_time();
                                
                               // $("span.v-timezonename").text(_today.convert_date_time()+', GMT '+_today.c_offset_formate());
                               // $("h3.timezonearea").text(convdattime + ', GMT ' +_today.c_offset_formate());
                                
                				
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
                    
                    //console.log('strStartDate-'+strStartDate);
                    
                    var total_service_minutes   = Number(_this.total_service_minutes);
                    var preparation_time        = Number(_this.preparation_time);
        
                    var startTimeStr    =  strStartDate;
                    var endTimeStr      =  strEndDate;
                    //console.log('endTimeStr-'+endTimeStr);
                    var date1   = new Date(startTimeStr); // 9:00 AM
                   // var date1   = new Date("2020-6-10 9:00"); // 5:00 PM
                    var date2   = new Date(endTimeStr); // 5:00 PM
                    
                    //console.log('date1:'+date1);
                    //console.log('date2:'+date2);
                    
                    if (date2 < date1) {
                        date2.setDate(date2.getDate() + 1);
                    }
                    
                    var diff = date2 - date1;
                    
                    //console.log(diff);
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
                 	for (i = 0; i <= (hh-1); i++) {
                
                		k++;
                		var options = { hour: '2-digit', minute: '2-digit'/*, timeZone: "Asia/Dhaka"*/ };
                		var point = date1.toLocaleString('en-US',  options);
                		date1.setMinutes(date1.getMinutes() + total_service_minutes + preparation_time);
                		
                		var selectedDateT = date1.getFullYear() + '-' + (date1.getMonth()+1) + '-' + date1.getDate();
                	
                		htmlcolde += '<li class="schedule-time"><a href="javascript:void(0)"  data-start-time="' + selectedDateT + ' ' + point + '"  ><span> ' + point +  '</span></a></li>';
                					
                        //console.log('Slot '+i+"= "+selectedDateT + ' ' + point);
                    	
                 	}
                 	
                 	
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
                         	
                        
                   
                },
                
                selected_slot_deign : function(){
                    
                    //console.log('selected_slot_deign-'+_this.selected_slots);
                  
          	        $(".selected-slots").html('');
                	_this.selected_slots.forEach(function(item){
                				 
                		var selectdatetime = item.split(' ');
                		var parts =selectdatetime[0].split('-');
                		var mydate = new Date(parts[0], (parts[1]-1), parts[2]);
                		
                		 //const date = new Date(2009, 10, 10);  // 2009-11-10
                		const month = mydate.toLocaleString('default', { month: 'short' });
                		
                	    //console.log('each'+mydate);
                		$(".selected-slots").append('<li data-before-on="Date" data-before-or="or"  data-of-start-time="'+item+'"><a href="javascript:void(0)" class="goto">'+month+' '+parts[2]+', '+selectdatetime[1]+' '+selectdatetime[2]+'</a><p><i class="far fa-clock"></i> Time</p></li>');
                	    //console.log('selectdatetime :'+selectdatetime);
                								 
                	});  
                },
                
                console_today_selected_date : function() {
                    
                    //console.log('-------------------');
                    //console.log('Today -'+_this.today_date);
                    //console.log('Selected date -'+_this.selected_date);
                    //console.log('Today Date Time -'+_this.today_date_time);
                    //console.log('Number of week day -'+_this.numberofweekday);
                    
                    //console.log('_this.today_date:'+_this.today_date);
                    //console.log('_this.selected_date:'+_this.selected_date);
                    
                    
                    $(".schedule-available-time").html('<span class="warningmsg">No slot available on selected date!</span>');
                    
                    if(_this.today_date == _this.selected_date) {
                        
                            //console.log('Today 1:'+_this.selected_date);
                            /*var dd      = (new Date(_this.selected_date) + '').split(' ');
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
                            

                            _slot.slot_design(startTimeStr, endTimeStr);
                            _slot.selected_slot_deign();*/
                         	
                        
                    } else {
                        
                        //console.log('Else');
                        
                            var CKDate = new Date(_this.selected_date);
                            
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
                            
                            _slot.slot_design(startTimeStr, endTimeStr);
                            _slot.selected_slot_deign();
                         	
                         	
                    }
                },
    
            };
            
         
            $(document).ready(function(){
                
                
                                _this.business_id               = <?php echo $b_id; ?>;
                                _this.service_id                = <?php echo $service_id; ?>;
                                _this.service_name              = '<?php echo $service_name; ?>';
                                _this.service_amt               = <?php echo $service_amt; ?>;
                                _this.service_currency          = '<?php echo $service_currency; ?>';
                                _this.preparation_time          = <?php echo $preparation_time; ?>;
                                _this.appointmenttime           = "<?php echo $service_info->sevice_time_h ?> <?php echo $service_info->sevice_time_h_title ?> <?php echo $service_info->sevice_time_m ?> <?php echo $service_info->sevice_time_m_title ?>";
                                _this.total_service_minutes     = <?php echo $total_service_minutes; ?>;
                                _this.staff_id                  = <?php echo $staff_id; ?>;
                                _this.staff_name                = '<?php echo $staff_name; ?>';
                                _this.staffproffesion           = '<?php echo $staffproffesion; ?>';
                                _this.staff_country_offset      = <?php echo $staff_country_offset; ?>;
                                _this.staff_timezone_name       = '<?php echo $staff_timezone_name; ?>';

                			   // Box's Data
                			   _today.firstTimeData();
                			   
                			   // Calendar Setup
                			   _this.work_details       = <?php echo $work_details; ?>;
                			   
                			   //console.log(_this.work_details);
                			   
                			   // First slot
                			   _this.curr_working_days();
                			  _this.curr_weekened();
                			  _calendar.calledaftepageload();
                			  _slot.console_today_selected_date();
                			  
                			  if(_this.req_type == 'client') {
                                    _today.change_with_client_timezone('<?php echo $client_schedule->timezone_name; ?>', <?php echo $client_schedule_offset; ?>);
                              }
                			   
                			   
                			   

                 $('#time_zone option').filter(function() { 
                        return ($(this).val() == _this.current_timezone); //To select Blue
                    }).prop('selected', true);
                    
                    $('#client_country_id option').filter(function() { 
                        return ($(this).attr('tz') == _this.current_timezone); //To select Blue
                    }).prop('selected', true);
                
            		$(document).on('click', '.miyn-iframe-popup-box a', function(){
            			$('.miyn-widget-popup-button').hide();
            			var popupLink = $(this).attr('href');
            			var popID = popupLink.replace( '#', '' );
            			
            			//console.log(popID);
            			$('#client_country_id option').filter(function() { 
                            return ($(this).attr('tz') == _this.current_timezone); //To select Blue
                        }).prop('selected', true);
        
            			if(popID == "appointment-client-details") {
            			    var countlenght = _this.selected_slots.length;
            			    if(countlenght > 0) {
            			        //console.log('true');
            			        //return true;
            			    } else {
            			        alert("Please select atleast 1 time slot!");
            			        //console.log('false');
            			        return false;
            			    }    
            			}
            			
            			if(popID =="select-user0") {
            			    _this.selected_slots = [];
            			}
            			
            			if(popID =="appointment-schedule") {
            			   // $(this).attr('href');
            			   //console.log($(this).attr('service_name'));
            			   
            			  //console.log('data-item:'+$(this).attr('data-item'));
            			  
            			  if($(this).attr('data-item') !="Called") {
            			   
                			   // Setup basic data
                			   /*_this.service_index          = $(this).attr('service_index');
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
                			   */
                			   




                			  /* // Box's Data
                			   _today.firstTimeData();
                			   
                			   // Calendar Setup
                			   
                			   _this.work_details       = <?php echo $work_details; ?>;
                			   
                			   //.log(_this.work_details);
                			   
                			   // First slot
                			   _this.curr_working_days();
                			   _this.curr_weekened();
                			   _calendar.calledaftepageload();
                			   
                			   _slot.console_today_selected_date();*/
            			   
            			  } else {
            			      
            			  }
            			   
            			} 
        
            			
            			if(popupLink.startsWith('#') && (popID != '')) {
            				if(popID != 'close') {
            					$('.miyn-iframe-popup-box').hide();
            					if($('#'+popID).css('display') == 'none'){
            						$('#'+popID).fadeIn();
            						$('.miyn-widget-popup-close-button').show();
            					}
            				} else {
            					$('.miyn-iframe-popup-box').fadeOut();
            					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
            					$('.miyn-widget-popup-close-button').fadeOut();
            				}
            			    return false;
            			} else {
            	  		    window.location.href = popupLink;
            			    return true;
            			}
            			
            		});
            		
            		$(document).on('click', '.second-party-checked input[type="checkbox"]', function(){
                		if ($(this).prop('checked')) {
                		    $('.second-party-details-area').slideDown();
                        } else {
                            $('.second-party-details-area').slideUp();
                        }
            		});
            		
            		
            		$(document).on('click', '#timeslot li a', function () {
                        		
                        	var countlenght = _this.selected_slots.length;
                        	
                            //console.log(dateWiseTimes);
                        	
                        	//var dataId = $(this).attr('class');
                        	if($(this).hasClass('active')) {
                        		$(this).removeClass('active');
                        		_this.removeA(_this.selected_slots, $(this).attr("data-start-time"));
                        		
                        	//	 $(".selected-slots").prepend('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');
                        		 
                        	} else {
                        		if(countlenght < 1) {
                        			_this.selected_slots.push($(this).attr("data-start-time"));
                        			$(this).addClass('active');
                        			
                        	//	 $(".selected-slots").append('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');
                        
                        		} else {
                        			alert('Please click the selected time slot again to unselect. And choose new time slot. Thanks. !');
                        		}
                        	 }
                        		
                        		
                        	_slot.selected_slot_deign();		 
                        				 
                        /*	$(".selected-slots").html('');
                        	_this.selected_slots.forEach(function(item){
                        				 
                        		var selectdatetime = item.split(' ');
                        		var parts =selectdatetime[0].split('-');
                        		var mydate = new Date(parts[0], (parts[1]-1), parts[2]);
                        		
                        		 //const date = new Date(2009, 10, 10);  // 2009-11-10
                        		const month = mydate.toLocaleString('default', { month: 'short' });
                        		
                        	    //console.log('each'+mydate);
                        		$(".selected-slots").append('<li data-before-on="Date" data-before-or="or"  data-of-start-time="'+item+'"><a href="javascript:void(0)" class="goto">'+month+' '+parts[2]+', '+selectdatetime[1]+' '+selectdatetime[2]+'</a><p><i class="far fa-clock"></i> Time</p></li>');
                        	    //console.log('selectdatetime :'+selectdatetime);
                        								 
                        	});*/
                        				 
                    });
            
        
            		$(document).on('click', '.schedule-available-time .schedule-time', function(){
            		    
        		
            		});
            		
            		$(document).on('click', '.selected-slots li', function () {
            		    
                    			 var selectdatetimestr     =   $(this).attr('data-of-start-time').split(' ');
                    			 
                    			 //console.log('Called selected'+selectdatetimestr);
                    			 
                    			 
                    			 
                    		    //console.log('This is selected date : '+selectdatetime);
                    			 
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
                    			  
                    			 	var dateObject = $(".calendar").datepicker('getDate');
                    			 	
                    			 	
                    			 	
                    			 	
                    		 		$('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
                    			  
                   
                    
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
                	
                	
                	
                	$('form[id="submitRescheduleformData"]').validate({
                        errorClass: "miynPopUpFormError",
                        rules: {
                            reschedule_details: 'required',
                        },
                        messages: {
                            reschedule_details: 'required',
                        },
                        submitHandler: function(form) {

                            var formdata = $(form).serialize();
                            
                            var b_id            = _this.business_id;
                            var dateWiseTimes   = _this.selected_slots;
                            var widghtid        = _this.service_id;
                            var staffid         = _this.staff_id;
                            var timezone        = _this.current_offset;
                            var timezonename    = _this.current_timezone;
                            var totalduration   = _this.total_service_minutes;
                            
                           
                            //return false;
                            
                            //$('#changeSubmit').text('Sending..');
                
                            
                            var forms = $(form)[0]; // You need to use standard javascript object here
                            var fd = new FormData(forms);
                            fd.append("widghtid", widghtid);
                            fd.append("staffid", staffid);
                            fd.append("dateWiseTimes", dateWiseTimes);
                            fd.append("b_id", b_id);
                            fd.append("timezone", timezone);
                            fd.append("timezonename", timezonename);
                            
                            fd.append("totalduration", totalduration);
                            
                            
                             //console.log(b_id);
                             //console.log(dateWiseTimes);
                             //console.log(widghtid);
                             //console.log(staffid);
                             //console.log(timezone);
                             //console.log(timezonename);
                            
                            //console.log('callll');
                            //return false;
                            
                            var dataList = '';
                            for (var i = 0; i < dateWiseTimes.length; i++) {
                                dataList += '<span>'+dateWiseTimes[i]+'</span>';
                            }
                           
                           
                            $.ajax({
                                type: 'post',
                                url:'{{url("/reschedule")}}?sender_type={{$sender_type}}',
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
                    					        html += '<h3>Appointment Reschedule</h3>';
                    					        html += '<p>Client will receive an email with rescheduled date and time.</p>';
                    					        html += '<p><strong>Thank you to be with us.</strong></p>';
                    					    html += '</div>';
                    						
                    				    html += '</div>';
                                    
                                    $("#appointment-schedule").html(html);
                                    
                                    //window.setTimeout(function(){location.reload()},3000)
    
                                }
                            });
                        }
                    });
                	
            
            });
            
            
        }();   
    
    	
    </script>
    
<script type="text/javascript">
$( document ).ready(function() {
    
 // $(window).load(function() {
        //console.log('Called');
        $("body").removeClass("loader");
 //   });  
    
});
</script>
    
</body>
</html>