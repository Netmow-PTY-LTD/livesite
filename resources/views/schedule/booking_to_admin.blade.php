<?php 

$color_bg   =   $allbusinessinfo['livestyle'][0]->action_background_color;

//dd($allbusinessinfo);

$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

//$ticker = file_get_contents('https://api.miyn.app/api/schedule/'.$uid);   
//$obj = json_decode($ticker,true); // Split the JSON into arrays.
// $jsondata =  json_encode($obj);
//echo '<pre>';
//    dd($b_services);
//echo '</pre>';

//dd($b_services[0]->service);
//$services = $b_services[0]->service;
//$b_id = $allbusinessinfo->business_id;
//echo '<pre>';
//dd($allbusinessinfo->business_id);
//echo '</pre>';

$imagelink = "{{config('app.live_url')}}/newdesign/";

//dd($b_services);

?>
<!DOCTYPE html>
<html>
<head>
    
	<title>MIYN Widget</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link href="{{config('app.live_url')}}/newdesign/css/all.min.css" rel="stylesheet"> 
	<link href="{{config('app.live_url')}}/newdesign/css/style.css" rel="stylesheet"> 

	
	<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
        background-color: hsl(0deg 0% 87% / 40%);
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
    .miyn-custom-booking::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        border-bottom: 5px solid <?php echo $color_bg; ?>;
    }
    .miyn-iframe-popup-box:not(.miyn-popup-appointment-area) {
        display: block;
    }
    .miyn-iframe-popup-box:not(:first-child) {
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
        background-color: #4491EB;
        border-radius: 2px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
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
        width: 100%;
        position: relative;
        display: flex;
        flex-flow: wrap row;
        line-height: 1;
        margin-top: 10px;
    }
    .payment-duration span {
        font-size: 10px;
        font-weight: 500;
        color: #515261;
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
        width: 35%;
        box-sizing: border-box;
        padding-right: 30px;
        min-height: 370px;
    }
    .miyn-iframe-popup-box .selected-appointment-information {
        margin-top: 25px;
    }
    .miyn-iframe-popup-box .selected-appointment-information ul {
        list-style: none;
    }
    .miyn-iframe-popup-box .selected-appointment-information ul li {
        padding: 10px 0;
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
        font-size: 12px;
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
        border-radius: 5px;
        box-sizing: border-box;
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
    }
    .miyn-iframe-popup-box .appointment-schedule-content-area {
        display: flex;
        flex-flow: wrap row;
    }
    .miyn-iframe-popup-box .schedule-calendar-area {
        width: calc(100% - 150px);
        box-sizing: border-box;
        position: relative;
        padding-top: 40px;
    }
    .miyn-iframe-popup-box .schedule-calendar-area::after {
        font-family: 'Poppins', sans-serif;
        content: "Your Preferred Times (Suggest Up To 3)";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        font-size: 10px;
        color: #0E1130;
        font-weight: 500;
    }
    .miyn-iframe-popup-box .schedule-navigation-area {
        align-items: center;
        width: 100%;
        box-sizing: border-box;
        margin: 15px 0 0 auto;
        padding: 0;
        display: flex;
        flex-flow: wrap row;
    }
    .miyn-iframe-popup-box .schedule-available-time-area {
        width: 150px;
        padding: 0 15px;
        box-sizing: border-box;
        max-height: 240px;
        overflow-y: auto;
        margin-top: 40px;
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
    .miyn-iframe-popup-box .schedule-time a {
        background-color: #ffffff;
        padding: 10px;
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
        width: calc(100% - 120px);
        box-sizing: border-box;
        padding-left: 30px;
    }
    .miyn-iframe-popup-box .scheule-popup-bottom-info p {
        font-size: 10px;
        color: #696969;
        margin: 0;
        line-height: 15px;
    }
    .miyn-iframe-popup-box .scheule-popup-bottom-info a {
        color: <?php echo $color_bg; ?>;
    }
    
    
    /*CALENDAR STYLE START*/
    .schedule-calendar-area .ui-datepicker table {
        margin: 15px 0 0;
    }
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
        background-color: #ffffff;
        padding: 20px;
    }
    .miyn-iframe-popup-box .schedule-calendar-area .ui-datepicker .ui-datepicker-header {
        position: relative;
        padding: 0 0 8px;
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
        border-color: #F3F3F3;
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
    .miyn-iframe-popup-box .form-field input, .miyn-iframe-popup-box .form-field textarea {
        width: 100%;
        box-sizing: border-box;
        background-color: #F6F6FA;
        border: 1px solid #E3E3E3;
        padding: 0 10px;
        line-height: 35px;
        color: #8A8A8A;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
    }
    .miyn-iframe-popup-box .form-field select {
        background-color: #F6F6FA;
        border: 1px solid #E3E3E3;
        padding: 8px 6px 7px 6px;
        width: 100%;
        box-sizing: border-box;
        color: #8A8A8A;
        font-family: 'Poppins', sans-serif;
    }
    .miyn-iframe-popup-box .form-field input:focus, .miyn-iframe-popup-box .form-field textarea:focus {
        outline: none;
    }
    .miyn-iframe-popup-box .submit-button {
        margin-top: 3px;
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
        margin-top: 0;
        cursor: pointer;
    }
    
    
    
    label.miynPopUpFormError {
        color:red !important;
        display:block;
    }
    .miynPopUpFormError {
        color: #f00f00;
        font-size: 12px;
    }
    
    
    /*SUCCESS POPUP STYLE*/
    .miyn-iframe-popup-box .miyn-appointment-success-area {
        display: none;
    }
    .miyn-iframe-popup-box .appointment-success-content {
        background-color: #ffffff;
        border-radius: 10px 10px 0 0;
        padding: 30px 20px 10px;
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
        max-width: 200px;
    }
    
    .alternate1 {
        font-size: 12px;
        color: <?php echo $color_bg; ?>;
        font-weight: 600;
        margin-top: 3px;
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
        
    .miyn-custom-booking {
        width: 900px;
        margin: 0 auto;
        background: #F6F6FA;
        padding: 30px;
        position: absolute;
        top: 54px;
        left: calc(50% - 477px);
    }
    .services-all {
        position: relative;
        height: 65px;
    }
    .services-all svg {
        width: 20px;
        color: <?php echo $color_bg; ?>;
        position: absolute;
        top: 22px;
        right: 20px;
        z-index: 3;
    }
    .services-all ul {
        display: flex;
        align-items: center;
        flex-flow: wrap row;
        min-height: 50px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background-color: #ffffff;
        /*padding: 20px;*/
        z-index: 2;
    }
    .services-all ul li {
        display: none;
        flex-flow: wrap row;
        justify-content: space-between;
        width: 100%;
        /* align-items: center; */
        cursor: pointer;
        padding: 20px;
    }
    .select-service.selected {
        display: flex;
    }
    .services-all .serviceopen li {
        display: flex;
    }
    .services-all .serviceopen li.selected {
        background-color: #E9E9E9;
    }
    .services-all ul li:hover {
        background-color:#E9E9E9;
    }
    .services-all ul li:not(:first-child) {
        /* margin-top: 10px; */
        /* padding-top: 10px; */
        border-top: 1px solid #F3F3F3;
        /*display: none;*/
    }
    .services-all ul.serviceopen li:not(:first-child){
        display: flex;
    }
    .appointment-titles {
        width: calc(100% - 50px);
        justify-content: space-between;
        align-self: center;
    }
    .appointment-titles h3 {
        margin: 0 0 6px;
        line-height: 1;
        font-size: 12px;
        font-weight: 500;
        color: #0E1130;
    }
    .appointment-titles p {
        font-size: 10px;
        color: #979797;
    }
    .payment-duration span:not(:first-child) {
        margin-left: 15px;
    }
    .selected .appointment-titles h3 {
        margin: 0;
    }
    .services-all ul li.selected .appointment-titles p {
        display: none;
    }
    .miyn-iframe-popup-box .services-all ul .selected .payment-duration {
        display: none;
    }
    .services-all ul.serviceopen {
        height: auto;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }
    .services-all ul.serviceopen li.selected .appointment-titles p {
        display: block;
    }
    .miyn-iframe-popup-box .services-all ul.serviceopen .selected .payment-duration {
        display: block;
    }
    
    span.warningmsg {
        font-size: 10px;
        writing-mode: vertical-lr;
        display: flex;
        align-items: center;
        line-height: 50px;
        padding-top: 51px;
    }
    
    svg.dropdwn{
      cursor:pointer;  
    }
    


.user-profile-data-area {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}
.user-profile-data-left, .user-profile-data-right {
    width: 50%;
}
.user-profile-data-left {
    display: flex;
    align-items: center;
}
.user-profile-data-left .image {
    width: 119px;
    height: 119px;
    background-color: #E9E9E9;
    border-radius: 4px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: auto;
}
.user-profile-data-left .image {
    width: 119px;
    height: 119px;
    background-color: #E9E9E9;
    border-radius: 4px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
    margin-right: 21px;
}
.user-profile-data-left .content h2 {
    font-size: 20px;
    line-height: 28px;
    font-weight: 600;
    color: #0E1130;
}
.user-profile-data-left .content p {
    font-size: 14px;
    line-height: 21px;
    font-weight: 500;
    color: #515261;
}
.user-profile-data-right {
    padding-left: 41px;
    border-left: 1px solid #ECECEC;
}
.user-profile-data-right h4 {
    font-size: 12px;
    color: #0E1130;
    font-weight: 600;
    margin-bottom: 1px;
}
.user-profile-data-right p {
    color: #515261;
    font-size: 12px;
    line-height: 18px;
}
@media  only screen and (max-width: 767px) {
    .user-profile-data-area {
        flex-wrap: wrap;
        padding-left: 15px;
        padding-right: 15px;
    }
    .user-profile-data-left, .user-profile-data-right {
        width: 100%;
    }
    .user-profile-data-left {
        margin-bottom: 15px;
    }
}

.miyn-iframe-popup-box .form-field textarea {
    line-height: 20px;
}
    
    </style>
    

</head>
<body class="loader">
    

    
 
   <div class="miyn-custom-booking">
    <div id="appointment-schedule" class="miyn-appointment-schedule-area miyn-iframe-popup-box">


        <div class="user-profile-data-area">
            <div class="user-profile-data-left">
                <div class="image" style="background-image: url(https://{{$staff_details->domain}}/images/business_logo/{{$allbusinessinfo->logo_image??'user.png'}});"></div>
                <div class="content">
                    <h2>{{$allbusinessinfo->business_name}}</h2>
                    <p>{{$allbusinessinfo->bussiness_short_description}}</p>
                </div>
            </div>
            
        </div>


        <div class="services-all">
    	    <ul>
        	    <?php 
        	    $countservice = 1;
        	    

        	    foreach( $b_services->service as $key=>$val ) { 
        	    ?> 
                    <li class="select-service <?php echo ($countservice == 1) ? 'selected' : ''; ?>" id="slect-service<?php echo $key; ?>" service_id="<?php echo $val->id; ?>" 
        				service_name="<?php echo $val->service_name; ?>" 
        				service_amt="<?php echo $val->service_price; ?>" 
        				service_currency="<?php echo $val->service_currency; ?>" 
        				preparation_time="<?php echo $val->preparationtime_m; ?>" 
        				appointmenttime="<?php echo $val->sevice_time_h ?> <?php echo $val->sevice_time_h_title ?> <?php echo $val->sevice_time_m ?> <?php echo $val->sevice_time_m_title ?>" 
        				total_service_minutes="<?php echo $val->total_service_minutes; ?>">
    					<div class="appointment-icon">
    						<img src="<?php echo $appurl ?>/images/service/<?php if($val->isimage == 'true') { echo $val->imagepath;  } else { echo 'initial-advice-white.png'; } ?>" alt="Service Image"/>
    					</div>
    					<div class="appointment-titles">
                            <h3><?php echo $val->service_name; ?></h3>
    						<p><?php echo $val->service_description; ?></p>
                            <div class="payment-duration">
                                <span><?php if($val->fee_type == 'no_fee'){  echo 'Free'; } else { echo $val->service_price.' '.$val->service_currency; } ?></span>
                                <span>
                                    <?php echo $val->sevice_time_h ?> 
                                    <?php echo $val->sevice_time_h_title ?> 
                                    <?php echo $val->sevice_time_m ?> 
                                    <?php echo $val->sevice_time_m_title ?>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php 
        	        $countservice++;
        	    } 
                ?> 
            </ul>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-down fa-w-14 dropdwn"><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path></svg>
        </div>
        
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
        			<div class="schedule-available-time">
                       
        			</div>
        		</div>
        		<div class="schedule-navigation-area">
        			<div class="next-popup-navgitation">
        				<a href="#appointment-client-details">Confirm</a>
        			</div>
        			<div class="scheule-popup-bottom-info">
        				<p>Your current time zone <span class="v-timezonename"></span>  Want to change? <!--<a href="#">click this</a>-->
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
    <div id="appointment-client-details" class="miyn-appointment-client-details-area miyn-iframe-popup-box">
    	<div class="appointment-submit-details-content">
    		<div class="miyn-widgets-selected-appointment-info">
    			<a class="miyn-previous-popup" href="#appointment-schedule" data-item="Called"  >
    				<i class="fas fa-long-arrow-alt-left"></i>
    			</a>
    			<div class="selected-appointment-information">
    				<ul>
    					<li>
    						<h3 class="servicename"></h3>
    						<p><i class="far fa-clock"></i> <span class="apointmenttime"></span></p>
    					</li>
    					<li class="selected-staff-timezone">
    					    <ul>
            					<li>
            						<h3 class="staffname"></h3>
            						<p class="staffproffesion"></p>
            					</li>
            					<li>
            						<h3 class="timezonearea"></h3>
            						<p><i class="fa fa-globe" aria-hidden="true"></i> Timezone / offset</p>
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
        				<div class="two-col-field">
        					<div class="form-field">
        						<input type="text"  name="c_first_name" id="c_first_name" placeholder="First name*" value="<?php echo $client_live_info->firstname ?? ''; ?>"  />
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
	                                <option value="{{$value->id}}" tz="{{$value->timezone_name}}" <?php echo $selected; ?>  >{{$value->country_name}} ({{$value->country_code}})</option>
	                                
	                                @endforeach
	                            </select>
        					</div>
        					<div class="form-field">
        						<input type="text" name="c_phone" id="c_phone"  placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
        					</div>
        				</div>
        				<div class="form-field">
        					<textarea name="c_note" id="c_note" class="field-long field-textarea" placeholder="Message"></textarea>
        				</div>
        				<div class="submit-button">
        				    <button type="submit" id="changeSubmit">Submit</button>
        					<!--<a href="#appointment-success">Submit</a>-->
        				</div>
        			</div>
        		</form>
        		<!--form end-->
        		
    		</div>
    	</div>
    </div>
    <div id="appointment-success" class="miyn-appointment-success-area miyn-iframe-popup-box">
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
						<p><i class="far fa-clock"></i> <span class="apointmenttime"></span></p>
					</li>
					<li class="selected-staff-timezone">
					    <ul>
        					<li>
        						<h3 class="staffname"></h3>
        						<p class="staffproffesion"></p>
        					</li>
        					<li>
        						<h3 class="timezonearea"></h3>
        						<p><i class="fa fa-globe" aria-hidden="true"></i> Timezone / offset</p>
        					</li>
					    </ul>
					</li>
					<li>
						<ul class="selected-slots">
						</ul>
					</li>
				</ul>
    		</div>
    		<div class="appointment-success-actions">
    			<a href="#appointment-lists">Book another</a>
    			<a href="#">Manage Booking</a>
    		</div>
    	</div>
    </div>
    
  </div>   
    
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    
    <script src="{{asset('miyn-widget-4/js/jquery.min.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery-ui.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery.validate.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>

    <script type="text/javascript">

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
                
                business_id         : '<?php echo $b_services->id ?>' ,
                service_index       : 0 ,
                service_id          : '<?php echo $b_services->service[0]->id; ?>' ,
                service_name        : '<?php echo $b_services->service[0]->service_name; ?>' ,
                service_amt         : '<?php echo $b_services->service[0]->service_price; ?>' ,
                service_currency    : '<?php echo $b_services->service[0]->service_currency; ?>' ,
                preparation_time        : '<?php echo $b_services->service[0]->preparationtime_m; ?>' ,
                total_service_minutes   : '<?php echo $b_services->service[0]->total_service_minutes; ?>' ,
                appointmenttime     : "<?php echo $b_services->service[0]->sevice_time_h ?> <?php echo $b_services->service[0]->sevice_time_h_title ?> <?php echo $b_services->service[0]->sevice_time_m ?> <?php echo $b_services->service[0]->sevice_time_m_title ?>",
                
                service_offset      : '' ,
               
                
                staff_id                : '<?php echo $admin_staff->id; ?>' ,
                staff_name              : '<?php echo $admin_staff->staffname; ?>' ,
                staffproffesion         : '<?php echo $admin_staff->staffproffesion; ?>' ,
                staff_country_offset    : '<?php echo $admin_staff->offset; ?>' ,
                staff_timezone_name     : '<?php echo $b_services->staff_country_details->timezone_name; ?>' ,
                
                server_time             : new Date(parseDate('<?php echo date("Y-m-d h:i A"); ?>')),
                slot_min_start_date_time: new Date(parseDate('<?php echo date("Y-m-d h:i A", strtotime("+24 hours")); ?>')),

                numberofweekday     : '',
                
                current_offset      : (-(new Date().getTimezoneOffset())/60),
                
                current_timezone    : Intl.DateTimeFormat().resolvedOptions().timeZone,
                
                today_date          :'',
                today_date_time     :'',
                selected_date       :'',
                
                // Selected 
                work_details            : '<?php echo $b_services->staff_weekworkday; ?>',
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
                
                convert_date_time : function(datetimeparam, offsetparam, timezonename){  // amy datetime ,  offset , timezone (return new date)
        
                    var d = new Date(datetimeparam); 
        
                    const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                    var datetime =  d.toLocaleTimeString(undefined, options);
                    var aestTime = new Date(datetime+" "+offsetparam).toLocaleString("en-US", {timeZone: timezonename});
                    return (new Date(aestTime).toLocaleTimeString(undefined, options));
                    
                },

                format_two_digits : function(n) {
                    return n < 10 ? '0' + n : n;
                },
                
                runSerial: function(tdate){
                     
                     console.log('runSerial');
     
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
                                    var infos = JSON.stringify(this.responseText);
                                    console.log(JSON.parse(infos));
                                    
                                    //console.log('sss -');
                                
                                    if(this.responseText !="") {
                                        var res = this.responseText.split(",");
                                        
                                        var conv = [];
                                        /* convert with formate and timezone */
                                        for (var i = 0; i < res.length; i++) {
                                            
                                            var day=new Date(res[i]+_this.staff_country_offset);
                                            
                                            console.log('day' + day);
                                            /*
                                            * Moment Code start
                                            */
                                            console.log('Moment');
                                            console.log(res[i]+_this.staff_country_offset);
                                            var jun = moment(res[i]+_this.staff_country_offset);
                                            







                                            console.log("Newyork time " +jun.format()); 
                                            /*
                                            * Moment Code end
                                            */
                                            
                                            const options = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric', hour: 'numeric', minute: 'numeric', timeZone: _this.current_timezone };
                                            const today=day.toLocaleDateString("en-IN", options);
                                            //console.log(today);
                                            //const options   = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric',  hour: 'numeric', minute: 'numeric' };
                                            //var d_start   = new Date(res[i]); // 9:00 AM new Date(conv_start_date_time); 
                                            //var n_d_start   = d_start.toLocaleTimeString(undefined, options);
                                            //var n_t_start   = new Date(n_d_start+" "+_this.staff_country_offset).toLocaleString("en-US", {timeZone: _this.current_timezone}); //_this.current_timezone
                                            var at_start    = new Date(today).toLocaleTimeString(undefined, options);
                                            conv_old[i] = at_start;
                                            console.log('at_start-'+at_start);

                                            conv[i] = res[i];
                                        }
                                        
                                        console.log(conv_old);
                                        console.log(res);
                                        console.log(conv);

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
                                    
                                    console.log('Selected : '+_this.selected_date);
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);
                                    
                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;
                                    
                                    
                                    //console.log(_this.getAllDisableDates());
                                    
                                    console.log('slot_design-1');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();
                                    
                                    $(".schedule-available-time").html('<span class="warningmsg">No slot available on selected date!</span>');
                                    
                                    
                                } else {
                                    var cc_ = parseDate(_this.selected_date);
                                    console.log('Today 1:'+_this.selected_date);
                                    var dd      = (new Date(cc_) + '').split(' ');
                                        dd[2]   = dd[2] + ',';
                        
                                    var dc      = [dd[0], dd[1], dd[2], dd[3]].join(' ');
                                    $('#alternate1').html(dc);
                                
                                    var CKDate = new Date(_today.convert_date_time());
                                    
                                    console.log('Today : '+_today.convert_date_time());
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    
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
                                    
                                    console.log('slot_design-2');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();
                            
                                }
                                
                                 
                            
                                
                            } else {
                                
                                //console.log('Else');
                                    var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);
                                    
                                    console.log('Selected : '+_this.selected_date);
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);
                                    
                                    console.log('startHour-'+startHour);
                                    console.log('startMin-'+startMin);
                                    console.log('endHour-'+endHour);
                                    console.log('endMin-'+endMin);
                                    console.log('total_service_minutes-'+total_service_minutes);
                                    console.log('preparation_time-'+preparation_time);
                                    
                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;
                                    console.log('startTimeStr-'+startTimeStr);
                                    console.log('endTimeStr-'+endTimeStr);
                                    //console.log(_this.getAllDisableDates());
                                    console.log('slot_design-3');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();
                                    
                                    
                                    }
                                }
                            };
                            

                            var ctimezone = Intl.DateTimeFormat().resolvedOptions().timeZone;

                            var url= "{{config('app.api_url')}}/api/google-disable-time-slot/"+_this.staff_id+"/"+tdate+"/"+_this.business_id+"?currentTimezone="+ctimezone;
                            
                            console.log(url);
                            
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


                    console.log('kickOff');
                     
                  let start = new Promise((resolve, reject) => {
                      
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                //document.getElementById("demo").innerHTML = this.responseText;
                               //console.log(this.responseText);
                               // var infos = JSON.stringify(this.responseText);
                                //console.log(JSON.parse(infos));
                                console.log('Response -'+this.responseText);
                                
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
                        console.log(url);
                        
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
                                    
                                    console.log('Selected : '+_this.selected_date);
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);
                                    
                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;
                                    
                                    
                                    //console.log(_this.getAllDisableDates());
                                    
                                    console.log('slot_design-4');
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
                                    
                                    console.log('Today : '+_today.convert_date_time());
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    
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
                                    
                                    console.log('slot_design-5');
                                    _slot.slot_design(startTimeStr, endTimeStr);
                                    _slot.selected_slot_deign();
                            
                                }
                                
                                 
                            
                                
                            } else {
                                
                                //console.log('Else');
                                    var cc_ = parseDate(_this.selected_date);
                                    var CKDate = new Date(cc_);
                                    
                                    console.log('Selected : '+_this.selected_date);
                                    
                                    var startDateCKDate         = CKDate.getDate();
                                    var startMonthCKDate        = CKDate.getMonth()+1;
                                    var startYearCKDate         = CKDate.getFullYear();
                                    
                                    var startHourTRCKDate       = CKDate.getHours();
                                    var RRstartHourTRCKDate     = CKDate.getHours();
                                    var startMinTRCKDate        = CKDate.getMinutes();
                                    var numberofweekdayCKDate   = CKDate.getDay();
                                    
                                    var startHour               = Number(_this.conv_work_start_hour);
                                    var startMin                = Number(_this.conv_work_start_min);
                                    var endHour                 = Number(_this.conv_work_end_hour);
                                    var endMin                  = Number(_this.conv_work_end_min);
                                    var total_service_minutes   = Number(_this.total_service_minutes);
                                    var preparation_time        = Number(_this.preparation_time);
                                    
                                    var startTimeStr    =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+startHour+":"+startMin;
                                    var endTimeStr      =  CKDate.getFullYear()+"-"+(CKDate.getMonth()+1)+"-"+CKDate.getDate()+" "+endHour+":"+endMin;
                                    
                                    //console.log(_this.getAllDisableDates());
                                    console.log('slot_design-6');
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

                    console.log('getAllDisableDates');
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
                    console.log(url);
                    
                    xhttp.open("GET", url, true);
                    xhttp.send();
   
                },
                
                curr_working_days : function() {
            
                    var data = _this.work_details;
                    data = $.parseJSON(data);
                    var arr = [];
                    $.each(data, function (i,v)
                    {
                            //console.log(i,v);
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
                    
                    //console.log(_this.weekened);
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
                    
                    this.current_offset = _today.c_offset();
                    
                    $("span.v-timezonename").text(_this.convert_date_time()+', GMT '+_today.c_offset_formate());
                    $("h3.timezonearea").text(_this.current_timezone+', GMT '+_today.c_offset_formate());
                   
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
                },
                
                    
                first_time_setup : function(){    // _l.a()
        
                  
        
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
                
                    //console.log('DisableWeekDaysfunction');
                    //console.log('date-'+date);
        
                      var day = date.getDay();
                      //return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6)];
                      
                      var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                      //console.log(y + "-" + _calendar.MonthConvert(date) + "-" + _calendar.day_of_the_month(date));
                      
                      var ccdate = y + "-" + _calendar.MonthConvert(date) + "-" + _calendar.day_of_the_month(date);
                      
                      //console.log('ccdate-'+ccdate);
                      //console.log('inArray-Called');
                      //console.log(($.inArray(ccdate, _this.disabledDays)));
                      
                      
                      //console.log([($.inArray(day, _this.weekened) != -1) && ($.inArray(ccdate, _this.disabledDays) == -1)]);
                      
                      return [($.inArray(day, _this.weekened) != -1) && ($.inArray(ccdate, _this.disabledDays) == -1)];
                      //console.log(weekened);
                      //return [(day != 0 && day != 1 )];
                      
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
                 //console.log('calledaftepageload');
                   //console.log(_calendar.DisableWeekDaysfunction);
                   
                   var mindate = 0;
                   
                   //console.log("_this.never_view_in_same_day-"+_this.never_view_in_same_day);
                   
                    if(_this.never_view_in_same_day == 'true') {
                        mindate = 1;
                    }
                    
                    //console.log("mindate-"+mindate);
                    
                    //console.log("_this.today_date-"+_this.today_date);

                
                 	$( ".schedule-calendar-area .calendar" ).datepicker({
                		dateFormat: 'DD, M dd,  yy',
                		minDate: mindate,
                        multidate: true,
                        multidateSeparator: ',',
                        altField:   "#alternate1",
                        selectMultiple:true,
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


                myFunction: function(item, index, arr) {
                   _slot.dateDiff(arr[index], item);
                },

                 dateDiff : function( str1, str2 ) {
                    var diff = Date.parse( str2 ) - Date.parse( str1 ); 
                    return isNaN( diff ) ? NaN : {
                        diff : diff,
                        ms : Math.floor( diff            % 1000 ),
                        s  : Math.floor( diff /     1000 %   60 ),
                        m  : Math.floor( diff /    60000 %   60 ),
                        h  : Math.floor( diff /  3600000 %   24 ),
                        d  : Math.floor( diff / 86400000        )
                    };
                },
                
                slot_design : function(strStartDate, strEndDate) {
                    
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

                 	//console.log(_this.disabletimeslots);
                    var periodstart = "";
                    var periodend = "";

                    var z = '';

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
                        
                        
                            //console.log(_this.disabletimeslots);
                            //console.log('_this.disabletimeslots.length-'+_this.disabletimeslots.length);
                            
                            
                            if(_this.disabletimeslots.length > 0) {
                                
 
                                z = "has_not_between_period";
                                
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

                                        console.log("=========");
                                        console.log(periodstart_);
                                        console.log(periodend_);
                                        console.log("=========");
                                        
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
                                    htmlcolde += '<li class="schedule-time disable "><span> ' + point +  '</span></li>';
                                }
                            
                            } else {
                                
                               htmlcolde += '<li class="schedule-time"><a href="javascript:void(0)"  data-start-time="' + selectedDateT + ' ' + point + '"  ><span> ' + point +  '</span></a></li>';
                            }       
                       // console.log('Slot '+i+"= "+selectedDateT + ' ' + point);
    
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
                    
                    //console.log(_this.selected_slots);
                  
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
                    
                   
                   
                   // promise call
                    //_this.kickOff(_this.selected_date);
                    _this.runSerial(_this.selected_date);
                    
                    
                    
                },
    
            };
            
         
            $(document).ready(function(){

                _today.firstTimeData();
                // Calendar Setup
			   // _this.work_details       = $(this).attr('work_details');
			    //console.log(_this.work_details);
			   
			    // First slot
			    _this.curr_working_days();
			    _this.curr_weekened();
			    
			    _calendar.calledaftepageload();
			   
			    _slot.console_today_selected_date();
			    
  
			   $(document).on('click', '.select-service', function(){
			       
			       _this.selected_slots = [];
			       
    			   // Setup basic data
    			   _this.service_index          = $(this).attr('service_index');
    			   _this.service_id             = $(this).attr('service_id');
    			   _this.service_name           = $(this).attr('service_name');
    			   _this.service_amt            = $(this).attr('service_amt');
    			   _this.service_currency       = $(this).attr('service_currency');
    			   
    			   
    			   _this.appointmenttime        = $(this).attr('appointmenttime');
    			   _this.total_service_minutes  = $(this).attr('total_service_minutes');
    			   _this.preparation_time       = $(this).attr('preparation_time');

    			   // Box's Data
    			   _today.firstTimeData();
    			   
    			   
    			   // First slot
    			   _this.curr_working_days();
    			   _this.curr_weekened();
    			   _calendar.calledaftepageload();
    			   
    			   _slot.console_today_selected_date();

            	});
			   
                
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
                			   // Box's Data
                			   _today.firstTimeData();
                			   
                			   // Calendar Setup
                			   _this.work_details       = $(this).attr('work_details');
                			   //console.log(_this.work_details);
                			   
                			   // First slot
                			   _this.curr_working_days();
                			   _this.curr_weekened();
                			   _calendar.calledaftepageload();
                			   
                			   _slot.console_today_selected_date();
            			   
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
            		
            		
            		$(document).on('click', '#timeslot li a', function () {
                        		
                        	var countlenght = _this.selected_slots.length;
                        	
                            //console.log(dateWiseTimes);
                        	
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
                        			alert('You cannot select more than 3 time slots. !');
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
                    			  
                    			 	var dateObject = $(".calendar").datepicker('getDate');
                    		 		$('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
                    			  
                    			/*	//jsDate instanceof Date; // -> true
                    				startDate   = mydate.getDate();
                    				startMonth  = mydate.getMonth();
                    				startYear   = mydate.getFullYear();
                    				
                    				var staf = JSON.stringify(selectedstaff);
                    					
                    				// var jsDate = $(this).datepicker('getDate');
                                    if (mydate !== null) { // if any date selected in datepicker
                    				
                                        mydate instanceof Date; // -> true
                                        startDate 	= mydate.getDate();
                                        startMonth 	= mydate.getMonth()+1;
                                        startYear 	= mydate.getFullYear();
                    					
                    					
                    						numberofweekday = mydate.getDay();
                    						
                    						
                    						arrr = selectedstaff;
                    						//console.log("Slote Selection ");
                    						//console.log(arrr);
                    						
                    						for(var i=0;i < selectedstaff.weekworkday.length;i++){
                    							//arr.push(serviceList.weekworkday[i].day);
                    							if(selectedstaff.weekworkday[i].day == numberofweekday) {
                    							
                    								startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
                    								startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
                    								endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
                    								endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);
                    
                    								// Time binding after change staff and date
                    								var scope = angular.element($("#ng-time")).scope();
                    								scope.$apply(function(){
                    									scope.starttime_hD 	= startHour;
                    									scope.starttime_mD 	= startMin;
                    									scope.endtime_hD 	= endHour;
                    									scope.endtime_mD 	= endMin;
                    									//alert('called');
                    								});
                    								
                    							}
                    						}
                    						
                    					// Redraw select slot
                                        generate_series(step, offset, newoffset);
                    						
                                    }*/
                    
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
                	
                	
                	
                	$('form[id="submitBookingformData"]').validate({
                        errorClass: "miynPopUpFormError",
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
                            }
                        },
                        messages: {
                            c_first_name: 'required',
                            c_last_name: 'required',
                            c_phone: 'required',
                            c_note: 'required',
                            c_email: {
                              required: "required",
                              email: "name@email.com"
                            },
                            client_country_id: 'required',
                        
                        },
                        submitHandler: function(form) {
                            //alert('new schedule called');
                
                            var formdata = $(form).serialize();
                            //console.log(formdata);
                            
                            
                            var b_id            = _this.business_id;
                            var dateWiseTimes   = _this.selected_slots;
                            var widghtid        = _this.service_id;
                            var staffid         = _this.staff_id;
                            var timezone        = _this.current_offset;
                            var timezonename    = _this.current_timezone;
                            var totalduration   = _this.total_service_minutes;
                            
                           
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
                                url:'{{config('app.live_url')}}/add-booking-form-data',
                                //url:'{{url("/sendformdata")}}',
                                data:fd,
                                processData: false,
                                contentType: false,
                                success: function (data) {
                                    //console.log(data);
                                    
                                    //console.log(data.client_schedule.service_name);
                                    //console.log(data.client_schedule.schedule_dates);
                                    //console.log(data.client_schedule.service_price);
                                    //console.log(data.client_schedule.service_currency);
                                    //console.log(data.client_schedule.timezone_name);
                                    
                                    //console.log(data.staff.staffname);
                                    //console.log(data.staff.staffproffesion);
                                    //return false;
                                    //alert('data inserted successfully.');
                                    
                                    $("#appointment-client-details").hide();
                                    $("#appointment-success").show();
                                    
                                    
                                    var html = "";
                                        html += '<div class="appointment-success-content">';
                    					    html += '<div class="appointments-icon">';
                    					        html += '<img src="{{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
                    					    html += '</div>';
                    					    
                    					    html += '<div class="appointments-messages">';
                    					        html += '<h3>Your booking request was sent</h3>';
                    					        html += '<p>You will receive an email once admin, contact you</p>';
                    					        html += '<p><strong>Thanks for your booking, Looking forward to meeting you!</strong></p>';
                    					    html += '</div>';
                    					    
                    					    html += '<div class="appointments-information">';
                    					        html += '<ul>';
                    					            html +='<li>';
                    					                html += '<h3 class="servicename"></h3>';
                    					                html += '<p><i class="far fa-clock"></i> <span class="apointmenttime"></span></p>';
                    					            html +='</li>';
                    					            
                    					            html +='<li class="selected-staff-timezone">';
                        					            html +='<ul>';
                        					            
                            					            html +='<li>';
                            					                html += '<h3 class="staffname"></h3>';
                            					                html += '<p class="staffproffesion"></p>';
                            					            html +='</li>';
                            					            
                            					            html +='<li>';
                            					                html += '<h3 class="timezonearea"></h3>';
                            					                html += '<p><i class="fa fa-globe" aria-hidden="true"></i> Timezone / offset</p>';
                            					            html +='</li>';
                            					            
                        					            html +='</ul>';
                    					            html +='</li>';
                    					            
                    					            html +='<li>';
                    					                html +='<ul class="selected-slots">';
                    					                html +='</ul>';
                    					            html +='</li>';
                    					            
                    					           
                    					        html += '</ul>';
                    					    html += '</div>';
                    					    
                    					    
                    					    html += '<div class="appointment-success-actions">';
                    					        html +='<a href="location.reload()">Book another</a>';
                    					       /* html +='<a href="#">Manage Booking</a>';*/
                    					    html += '</div>';
                    						
                    				    html += '</div>';
                                    
                                 //   $("#appointment-client-details").html(html);
                                    
                                    
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
    <script type="text/javascript">
    $( document ).ready(function() {
        
        
         $(document).on('click', 'svg.dropdwn', function() {
            if($(".services-all ul").hasClass('serviceopen')) {
                $(".services-all ul").removeClass('serviceopen');
            } else {
                $(".services-all ul").addClass('serviceopen');
            }
        });
        
        
        $(document).on('click', '.services-all ul', function() {
            if($(this).hasClass('serviceopen')) {
                $(this).removeClass('serviceopen');
            } else {
                $(this).addClass('serviceopen');
            }
        });
        
        var allOptions = $('.services-all ul').children('li');


        $('.services-all ul').on('click', 'li', function() {
            allOptions.removeClass('selected');
          //  $(this).addClass('selected');
           // $('.services-all ul').children('li:first-child').html($(this).html());
            // allOptions.toggle();
            $(this).addClass('selected');

        });

    });
    </script>
    
</body>
</html>