<?php 
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;

$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MIYN Shedule Test</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('online_schedule/css')}}/indexst.css">
    <link rel="stylesheet" href="{{asset('online_schedule/css')}}/indexst2.css">
    <style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		img{
			max-width: 100%;
			height: auto;
		}
		html {
		    overflow-x: hidden;
		}
		body {
		    font-family: 'Poppins', sans-serif;
		    font-size: 14px;
		    font-weight: normal;
		    overflow-x: hidden;
	        padding-right: 5px;
        	border-radius: 0;
		}
		a, a:hover, a:focus{
			text-decoration: none;
			color: <?php echo $color_bg; ?>;
		}
        .category  h4 {
            margin-bottom: 0;
            background-color: rgba(142,142,142,0.23);
            padding:10px;
            margin-bottom:5px;
            margin-top:25px;
            cursor:pointer;
        }
        .fragment-wrapper {
            margin-bottom: 15px;
        }
        .widget-content .step-box{
            padding: 0;
            margin: 0;
        }
        .step-box ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .step-box ul.service-item li.service-type {
            background: <?php echo $color_bg; ?>;
            background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $color_bg; ?>), color-stop(100%, <?php echo $color_bg; ?>));
            background: -webkit-linear-gradient(top,<?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
            background: -moz-linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
            background: -o-linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
            background: linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $color_bg; ?>', endColorstr='<?php echo $color_bg; ?>');
        }
        
        .slots-picker .slots ul a.optional-time.checked, .slots-picker .slots ul a.event-optional-time.checked {
            border: 1px solid <?php echo $color_bg; ?>;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            background: <?php echo $color_bg; ?>;
            background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $color_bg; ?>), color-stop(100%, <?php echo $color_bg; ?>));
            background: -webkit-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
            background: -moz-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
            background: -o-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
            background: linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $color_bg; ?>', endColorstr='<?php echo $color_bg; ?>');
            text-shadow: none;
            color:#ffffff !important;
        }
        .slots-picker a.ui-state-active {
            background: none;
            border: 1px solid <?php echo $color_bg; ?>;
            font-weight: bold;
            background-color: <?php echo $color_bg; ?> !important;
            color: #FFFFFF;
        }
        
        .poweredby {
            clear:both;
            text-align:center;
            color: #999ba1;
            font-size: 9px !important;
            text-decoration: none;
            margin-top: 20px;
        }
        
        .poweredby a:link, .poweredby a:visited{
            clear:both;
            text-align:center;
            color: #999ba1;
            font-size: 9px !important;
            text-decoration: none;
        }
        
        .required{
            color:red;
        }
        
        
        
        /* Confirm message */
        .margintop60 {
            margin-top:60px;
        }
         
        
        @media only screen and (max-width: 767px) {
            .step-box ul.services-list > li img {
                max-width:37px;
                max-height:37px;
                padding:5px;
            }
        }
        
		
        
		.step-box a.standard-button {
            background-color: <?php echo $color_bg; ?>;
            border: 0;
            background-image: none;
            border-radius: 0;
            color: #ffffff !important;
            min-width: 95px;
            text-align: center;
            line-height: 30px;
        }
		.miyn-popup-wrapper ul{
			list-style-position: inside;
			list-style: none;
		}
		.miyn-popup-wrapper {
		    position: fixed;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(0,0,0,0.5);
		}
		.miyn-popup-concent-area {
	        max-width: 890px;
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
		    width: calc(100% - 30px);
		    height: 600px;
		    background-color: #F6F6FA;
		    border-top: 5px solid <?php echo $color_bg; ?>;
		    box-sizing: border-box;
		}
		.miynpopup-content-body {
		    height: 100%;
		}
		.miynpopup-content-wrapper{
		    height: 100%;
		}
		.miyn-popup-close-button{
			text-align: right;
			margin-bottom: 15px;
		}
		.close-miyn {
		    background-color: #BEBEBE;
		    font-size: 16px;
		    display: inline-block;
		    vertical-align: top;
		    text-decoration: none;
		    color: #ffffff;
		    width: 25px;
		    height: 25px;
		    text-align: center;
		    border: 1px solid #ffffff;
		    border-radius: 100%;
		    line-height: 25px;
		    position: absolute;
		    top: -10px;
		    right: -10px;
		    z-index: 1;
		}
		.close-miyn:hover, .close-miyn:focus{
		    color: #ffffff;
		}
		.miyn-popup-contents{
	        position: relative;
		    padding: 10px 0 0;
		    height: calc(100% - 60px);
		}
		/*NAVIGATION STYLE*/
		.miyn-popup-navigation {
		    border-bottom: 1px solid #ffffff;
		    padding: 5px 0;
		    margin-bottom: 10px;
		}
		.miyn-popup-navigation ul {
	        display: flex;
            margin: 0;
            padding: 0;
            list-style: none;
		}
		.miyn-popup-navigation ul li {
		    position: relative;
		    width: 25%;
		    padding-bottom: 5px;
		    font-size: 12px;
		    color: #73747E;
		    font-weight: 500;
		}
		.miyn-popup-navigation ul li a{
		    font-size: 12px;
		    color: #73747E;
		    font-weight: 500;
		    text-decoration: none;
		}
		.miyn-popup-navigation ul li a:hover, .miyn-popup-navigation ul li a:focus{
		    text-decoration: none;
		}
		.miyn-popup-navigation ul li:not(:first-child)::after {
			content: "";
		    position: absolute;
		    left: -3px;
		    top: 5px;
		    font-size: 25px;
		    line-height: 1;
		    color: #73747E;
		    width: 10px;
		    height: 10px;
		    background-image: url("{{config('app.live_url')}}/images/arrow.png");
		    background-repeat: no-repeat;
		    background-position: left center;
		}
		.miyn-popup-navigation ul li:not(:first-child){
			text-align: center;
		}
		.miyn-popup-navigation ul li:last-child{
			text-align: right;
		}
		.miyn-popup-navigation ul li.active::before {
		    content: "";
		    position: absolute;
		    bottom: -6px;
		    left: 0;
		    width: 70%;
		    border-bottom: 2px solid <?php echo $color_bg; ?>;
		}
		.miyn-popup-navigation ul li.active:not(:first-child)::before {
		    left: 50%;
		    width: 50%;
		    transform: translate(-50%, 0);
		}
		.miyn-popup-navigation ul li.active:last-child::before {
		    left: initial;
		    right: 0;
		    width: 50%;
		    transform: initial;
		}

		/*SELECTED SERVICE STYLE*/
		.step-box .miyn-popup-service-list {
            margin-top: 10px;
        }
		.miyn-selected-service {
			padding: 0 0 10px;
		}
		.step-box .miyn-selected-service-name{
		    padding: 10px 25px;
		    text-align: left;
		    line-height: 1.3;
		    margin: 0;
		    background-color: #EAEAF2;
		    font-size: 11px;
		    font-weight: 600;
		    color: <?php echo $color_bg; ?>;
		}
		.miyn-appointment-popup .miyn-selected-service-name {
		    font-size: 11px;
		    font-weight: normal;
		    text-transform: initial;
		}
		.miyn-selected-service-name span {
	        display: inline-block;
            color: #73747E;
            padding: 0 15px;
		}
		.miyn-selected-service-name .selected-slots li {
            display: inline-block;
            vertical-align: top;
            position: relative;
        }
        .miyn-selected-service-name .selected-slots li:not(:first-child) {
            margin-left: 5px;
            padding-left: 15px;
        }
        .miyn-selected-service-name .selected-slots li:not(:first-child)::after {
            content: "or";
            position: absolute;
            top: 0;
            left: 0;
            font-size: 11px;
        }
        .miyn-selected-service-name .selected-slots li a {
            text-decoration: none;
            color: <?php echo $color_bg; ?>;
        }

		/*SERVICE BOX STYLE*/
		.step-box .miyn-popup-service-category-name{
		    padding: 10px 50px;
		    text-align: center;
		    line-height: 1;
		    margin-bottom: 10px;
		    background-color: #EAEAF2;
		    font-size: 12px;
		    font-weight: 600;
		    color: <?php echo $color_bg; ?>;
		    text-transform: uppercase;
		    margin: 0;
            border-radius: 0;
		}
		.step-box .miyn-popup-category-item:not(:first-child) .miyn-popup-service-category-name {
            margin-top: 10px;
        }
		.miyn-popup-service-list .miyn-popup-service-item {
		    background-color: #ffffff;
		    padding: 14px 0;
		    display: flex;
		    align-items: center;
		    cursor: pointer;
		}
		.miyn-popup-service-list .miyn-popup-service-item:hover{
			background-color: <?php echo $color_bg; ?>;
		}
		.miyn-popup-service-list .miyn-popup-service-item:not(:first-child) {
		    margin-top: 10px;
		}
		.miyn-popup-service-list .miyn-popup-service-item > div {
		    padding: 0 10px;
		}
		.miyn-popup-service-icon {
		    width: 100px;
		    text-align: center;
		}
        .miyn-popup-service-icon span {
            display: inline-block;
            vertical-align: middle;
            width: 45px;
            height: 45px;
            background-color: <?php echo $color_bg; ?>;
            line-height: 45px;
        }
        .miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-icon span{
            background-color: transparent;
        }
        .miyn-popup-service-icon img {
            width: 30px;
            height: auto;
            display: inline-block;
            vertical-align: middle;
          	/*-webkit-filter: brightness(0) invert(1);
          	filter: brightness(0) invert(1);
          	*/
        }
		.miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-icon img {
		  	/*-webkit-filter: brightness(0) invert(1);
		  	filter: brightness(0) invert(1);
		  	*/
		}
		.miyn-popup-service-description {
	        width: calc(100% - 320px);
		}
		.miyn-popup-service-description h4 {
		    font-size: 13px;
		    color: <?php echo $color_bg; ?>;
		    font-weight: 500;
		    line-height: 15px;
		    margin: 0 0 5px;
		    letter-spacing: 0.5px;
		}
		.miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-description h4 {
			color: #ffffff;
		}
		.miyn-popup-service-description p {
		    font-size: 10px;
		    color: #696969;
		}
		.miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-description p {
			color: #ffffff;
		}
		.miyn-popup-service-amount {
		    width: 100px;
	     	border-width: 0 1px 0 1px; 
	     	border-style: solid; 
		    border-color: #E4E4E4;
		    min-height: 40px;
		    text-align: center;
		}
		.miyn-popup-service-amount span {
		    display: inline-block;
		    vertical-align: middle;
		    padding: 10px 0;
		    color: #0E1130;
		    font-size: 13px;
		    font-weight: 500;
		}
		.miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-amount span {
			color: #ffffff;
		}
		.miyn-popup-service-time {
		    width: 120px;
		    text-align: center;
		}
		.miyn-popup-service-time span {
		    font-size: 13px;
		    color: #0E1130;
		    font-weight: 500;
		}
		.miyn-popup-service-list .miyn-popup-service-item:hover .miyn-popup-service-time span {
			color: #ffffff;
		}

		/*STAF STYLE*/
		.miyn-popup-staff-list .miyn-popup-staff-item {
		    background-color: #ffffff;
		    padding: 10px 0;
		    display: flex;
		    align-items: center;
		    cursor: pointer;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item:hover{
			background-color: <?php echo $color_bg; ?>;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item:not(:first-child) {
		    margin-top: 10px;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item > div {
		    padding: 0 10px;
		}
		.miyn-popup-user-image {
		    width: 75px;
		    text-align: center;
		}
		.miyn-popup-user-image img {
		    max-width: 50px;
		    height: auto;
		}
		.miyn-popup-staff-name {
	        width: calc(100% - 150px);
		}
		.miyn-popup-staff-name h4 {
		    font-size: 14px;
		    color: <?php echo $color_bg; ?>;
		    font-weight: 500;
		    line-height: 15px;
		    margin: 0 0 5px;
		    letter-spacing: 0.5px;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item:hover .miyn-popup-staff-name h4 {
			color: #ffffff;
		}
		.miyn-popup-staff-name p {
		    font-size: 10px;
		    color: #696969;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item:hover .miyn-popup-staff-name p {
			color: #ffffff;
		}
		.miyn-popup-staff-info-button {
		    width: 75px;
		    text-align: center;
		}
		.miyn-popup-staff-info-button span {
	        color: #ffffff;
		    font-weight: 500;
		    display: inline-block;
		    vertical-align: middle;
		    line-height: 25px;
		    font-size: 25px;
		    display: none;
		}
		.miyn-popup-staff-list .miyn-popup-staff-item:hover .miyn-popup-staff-info-button span {
		    display: block;
		}

		/*FORM STYLE*/
		.miyn-popup-field-form {
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		}
		.miyn-popup-forms {
            max-width: 90%;
            margin: 20px auto 0;
        }
		.miyn-popup-field-form:not(:first-child) {
		    margin-top: 20px;
		}
		.miyn-popup-forms input, .miyn-popup-forms textarea, .miyn-popup-forms select {
		    font-family: initial;
		    border: 1px solid #E3E3E3;
		    padding: 10px;
		    font-size: 15px;
		    color: #8A8A8A;
		    width: 100%;
		    margin: 0;
		    box-sizing: border-box;
		    font-family: inherit;
		}
		.miyn-popup-forms textarea{
            height: 120px;
		}
		.miyn-popup-forms input:focus, .miyn-popup-forms textarea:focus{
			outline: none;
			border: 1px solid #E3E3E3;
		}
		.miyn-popup-forms input[readonly="true"], .miyn-popup-forms input[readonly=""] {
            background-color: #e1e1e1;
        }
		.miyn-popup-forms .miyn-popup-field-form.name-field .miyn-popup-subfield-form {
	        width: calc(50% - 10px);
		}
		.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
		    width: calc(40% - 10px);
		}
		.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child{
		    width: calc(60% - 10px);
		}
		.miyn-popup-field-form.country-field.country-field input {
		    width: 100%;
		}
		.miyn-popup-field-form.message-field textarea {
		    height: 70px;
		}
		.form-submit-button {
		    margin-top: 20px;
		}
		.form-submit-button button {
		    background-color: <?php echo $color_bg; ?>;
		    border: none;
		    line-height: 35px;
		    height: auto;
		    color: #ffffff;
		    font-size: 12px;
		    padding: 0 20px;
		    min-width: 95px;
		    text-align: center;
		    cursor: pointer;
		}
		.miyn-yourdetails-popup .miyn-popup-back-button {
		    display: inline-block;
		    vertical-align: middle;
		    margin-left: 20px;
	        margin-top: 0px;
		}
		.miyn-yourdetails-popup .miyn-popup-actions{
			justify-content: center;
		}
		.form-submit-button button[disabled="disabled"], .form-submit-button button[disabled="true"] {
            background-color: #e1e1e1;
            color: #999999;
            opacity: 0.9;
        }
        .miynPopUpFormError {
            color: #f00f00;
            font-weight: 100;
            font-size: 10px;
        }
		
		/*APPOINTMENT BOX STYLE*/
		.timezone-nextbutton {
            display: flex;
            margin-top: 15px;
        }
        .timezone-left {
            width: calc(100% - 200px);
        }
        .timezone-left p {
            font-size: 10px;
        }
        .timezone-right {
            text-align: right;
            padding-left: 10px;
            width: 200px;
        }
        .timezone-nextbutton .timezone-right .miyn-popup-backbutton {
            margin-right: 10px;
        }
        .timezone-nextbutton p, .select-timezone {
            line-height: 1.5;
            margin: 0;
            color: #696969;
            font-size: 10px;
        }
        .select-timezone select {
            padding: 3px;
            color: #69696A;
            font-size: 10px;
        }
        .timezone-left p a {
            color: #304b89;
            text-decoration: none;
        }

		/*CONFIRMATION BOX STYLE*/
		.miyn-popup-confirmation-content {
		    background-color: <?php echo $color_bg; ?>;
		    padding: 25px;
		}
		.miyn-popup-confirmation-content h3 {
		    text-transform: uppercase;
		    color: #ffffff;
		    font-size: 20px;
		    text-align: center;
		    font-weight: 700;
		    line-height: 1.1;
		    margin: 0 0 5px;
		}
		.miyn-popup-confirmation-content > p {
		    font-size: 14px;
		    color: #ffffff;
		    text-align: center;
		    font-style: italic;
		}
		.miynpopup-confirmation-booking-info {
		    background-color: #ffffff;
		    margin-top: 30px;
		    padding: 25px 40px;
		}
		.miynpopup-confirmation-booking-info p {
		    color: #0E1130;
		    font-size: 15px;
		}
		.miynpopup-confirmation-booking-info table {
		    margin-top: 15px;
		    width: 100%;
		}
		.miynpopup-confirmation-booking-info table {
		    text-align: center;
		}
		.miynpopup-confirmation-booking-info table tr:nth-child(odd) {
		    background-color: #F9F9F9;
		}
		.miynpopup-confirmation-booking-info table td, .miynpopup-confirmation-booking-info table th {
		    padding: 10px 15px;
		}
		.miynpopup-confirmation-booking-info table tr:nth-child(even) td{
			padding: 5px 0;
		}
		.miynpopup-confirmation-booking-info table th {
		    text-align: left;
		    width: 120px;
		    font-size: 11px;
		    color: #0E1130;
		}
		.miynpopup-confirmation-booking-info table td{
		    text-align: left;
		    font-size: 11px;
		    color: #696969;
		}
		.date-list span {
            position: relative;
            display: inline-block;
        }
        .date-list span:not(:first-child) {
            padding-left: 10px;
        }
        .date-list span:not(:first-child)::before {
            content: ",";
            position: absolute;
            bottom: 0;
            left: 0;
        }
		.miynpopup-confirmation-buttons {
		    margin-top: 15px;
		    display: flex;
		    flex-flow: wrap row;
		}
		.miynpopup-confirmation-buttons a {
		    display: inline-block;
		    vertical-align: top;
		    line-height: 45px;
		    background-color: #ffffff;
		    min-width: 120px;
		    text-align: center;
		    color: <?php echo $color_bg; ?>;
		    font-size: 11px;
		    margin-right: 15px;
		    text-decoration: none;
		}
		.miynpopup-confirmation-buttons a:nth-child(2) {
		    background-color: transparent;
		    color: #ffffff;
		    border: 1px solid #ffffff;
		    box-sizing: border-box;
		}

		/*FOOTER STYLE*/
		.miyn-popup-actions {
		    padding: 17px 50px;
		    display: flex;
		    justify-content: space-between;
	        position: relative;
    		z-index: 1;
		}
		.miyn-popup-back-button {
		    font-size: 17px;
		    color: <?php echo $color_bg; ?>;
		    line-height: 1;
		    cursor: pointer;
		    display: none;
		    margin-top: 20px;
            text-align: center;
		}
		body .miyn-popup-back-button a, .miyn-popup-backbutton{
		    font-size: 17px;
		    color: <?php echo $color_bg; ?>;
		    line-height: 1;
		    text-decoration: none;
		}
		.miyn-popup-back-button a:hover, .miyn-popup-back-button a:focus, .miyn-popup-backbutton:hover, .miyn-popup-backbutton:focus{
		    text-decoration: none;
		}
		.miyn-popup-back-button span {
		    font-size: 24px;
		    line-height: 14px;
		    display: inline-block;
		    vertical-align: top;
		    margin-right: 10px;
		}
		.miyn-popup-footer p{
			font-size: 10px;
			color: #696969;
			margin: 0;
			letter-spacing: 0.25px;
		}
		.miyn-popup-footer a{
			color: <?php echo $color_bg; ?>;
		}
		
        
		/*RESPONSIVE STYLE*/
		@media screen and (max-width: 767px){
			.miyn-popup-navigation {
				display: none;
			}
			.miyn-popup-back-button{
			    display: block;
			    text-align: left;
			}
			.miyn-popup-contents {
			    height: calc(100% - 50px);
			}
			.miyn-selected-service-name{
				font-size: 10px;
			}
			.miynpopup-content-body {
			    height: calc(100% - 100px);
			}

			/*SERVICE BOX STYLE*/
			.miyn-popup-service-list .miyn-popup-service-item {
			    flex-flow: wrap row;
			}
			.miyn-popup-service-list .miyn-popup-service-item > div {
			    width: 100%;
			    margin-bottom: 10px;
			}
			.miyn-popup-service-list .miyn-popup-service-item .miyn-popup-service-name {
			    text-align: center;
			    padding: 5px 30px;
			}
			.miyn-popup-service-list .miyn-popup-service-item .miyn-popup-service-description {
			    text-align: center;
			    padding: 0 30px;
			}
			.miyn-popup-service-list .miyn-popup-service-item .miyn-popup-service-amount {
			    border-width: 1px 0 1px 0;
			    margin: 10px 0;
			    padding: 0px;
			}
			.miyn-popup-service-list .miyn-popup-service-item .miyn-popup-service-time {
			    margin: 0;
			}

			/*STAFF STYLE*/
			.miyn-popup-user-image {
			    width: 50px;
			}
			.miyn-popup-staff-info-button {
			    width: 50px;
			}
			
			/*APPOINTMENT BOX STYLE*/
			.timezone-nextbutton {
                flex-flow: wrap row;
            }
            .timezone-nextbutton > div {
                width: 100%;
            }
            .timezone-right {
                text-align: left;
                padding-left: 0;
            }

			/*YOUR DETAILS STYLE*/
			.miyn-popup-field-form.name-field input {
			    width: 100%;
			}
			.miyn-popup-field-form.name-field input[name="last_child"]{
				margin-top: 10px;
			}
			.miyn-popup-field-form.country-field input[name="country"] {
			    width: 100%;
			}
			.miyn-popup-field-form.country-field input[name="phone_number"] {
			    width: 100%;
			    margin-top: 10px;
			}
		}
		@media screen and (max-height: 600px){
			.miyn-popup-field-form.name-field input {
			    width: 100%;
			}
			.miyn-popup-field-form.name-field input[name="last_child"]{
				margin-top: 10px;
			}
			.miyn-popup-field-form.country-field input[name="country"] {
			    width: 100%;
			}
			.miyn-popup-field-form.country-field input[name="phone_number"] {
			    width: 100%;
			    margin-top: 10px;
			}
		}
		@media screen and (max-width: 575px) {
		    .miyn-popup-forms .miyn-popup-field-form.name-field .miyn-popup-subfield-form {
                width: 100%;
            }
            .miyn-popup-forms .miyn-popup-field-form.name-field .miyn-popup-subfield-form:first-child {
                margin-bottom: 20px;
            }
		    .miyn-popup-staff-name {
                width: calc(100% - 50px);
            }
		    .miyn-popup-staff-info-button{
		        display: none;
		    }
			.miyn-popup-forms input, .miyn-popup-forms textarea {
			    width: 100%;
			}
			.miyn-popup-back-button{
			    display: block;
			    text-align: left;
			}
    		.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
    		    width: 100%;
    		}
    		.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child {
                width: 100%;
                margin-top: 20px;
            }
		}
		@media screen and (max-width: 400px){
            .miynpopup-confirmation-buttons a {
                width: 100%;
                margin-right: 0;
            }
		}


		/*SCROLLBAR STYLE START*/
		/* width */
		
		body::-webkit-scrollbar {
		  	width: 10px;
		}

		/* Track */
		body::-webkit-scrollbar-track {
		  	background: #FFFFFF; 
		  	border-radius: 30px;
		}
		 
		/* Handle */
		body::-webkit-scrollbar-thumb {
		  	background: #D5D5E1; 
		  	border-radius: 30px;
		  	border-width: 5px 2px 5px 2px;
		  	border-style: solid;
		  	border-color: #ffffff;
		}

		/* Handle on hover */
		body::-webkit-scrollbar-thumb:hover {
		  	background: #EAEAF2; 
		}
		/*SCROLLBAR STYLE END*/

        /* LOADER */
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url("{{config('app.cdn_url')}}/images/loader.gif") 50% 50% no-repeat rgb(249,249,249);
            opacity: 0.8;
        }
                
    </style>
    
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
    <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <!--  <link rel="stylesheet" href="https://cdn0.vcdnita.com/assets/application-948fe1eee5ad0e0d2466f36402ea0451.css">-->
    
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    
    <!--<script src=" http://html.miyn.app/jsondata.js"></script>-->
     
    <?php
    
    
    $ticker = file_get_contents("{{config('app.api_url')}}/api/schedule/".$uid);   
    $obj = json_decode($ticker,true); // Split the JSON into arrays.
    $jsondata =  json_encode($obj);
    
    
    //echo '<pre>';
    //echo $jsondata;
    //echo '</pre>';
    
    ?>
    
    <script>
    
    
! function() {
  
 var _cap = {
    
         ts : 0 ,
         need_name_emailbox : 1 ,
         Fake : [] ,
         j : 0 ,
         ns : 0 ,
         idletime:20000,
         reconnectafter:100000,
         maxlenght:200,
         onlinestatus:'Offline',
    show_response : function(){

        
    },
            //validation fuction for empty user name or message


    
    connect : function()
    {

      
    }

}; 
    
}();
    
    
    //var servicelist = JSON.parse(text);
    
    
    var servicename = '';
    var staff_name = '';
    var arrr = [];
    
    var calledtime = 0;
    
    var serviceList   = <?php echo $jsondata; ?>;
    
    var objfstr = JSON.stringify(serviceList)
    
    
    /*  
    ===================================
    End First Variable Declaration
    ===================================
    */
    var b_id = '<?php echo $allbusinessinfo->id; ?>';
    
    var modulestep	= '', 
    	widghtid	=0, 
    	staffid		=0, 
    	stepform	=0;
    	
    var availability = '',
        minDate = '',
        maxDate = '';
    	
    //var serviceList 	= ['My Sevice', 'phone Call', 'Meeting'];	
    
    
    		
    var service 			= '';
    var staffname 			= '';
    var timezonename        = '';
    
    var serviceamt 			= '';
    var servicecurrencty 	= '';
    var total_service_minutes 	= 0;
    
    var weekened 	= []; // [0, 1];
    
    var step = 0;
    var preperationTime = 0; 
    
    
    var offset = '+00'; // '+6'
    var newoffset = "";
    var mainoffset = "";
    
    var startHour = 0;
    var startMin = 0;
    var endHour = 0;
    var endMin = 0;  
    
    var count = 0;
    
    var maxslot = 3;
    var selectedDates = [];
    var dateWiseTimes = [];
    var selectedstaff = [];
    
      
    
    
    /*  
    ===================================
    First Time date Selection
    ===================================
    */
    

    
    /*  Step -4   */
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    
    ////console.log("Curent time frist time :"+date);
    
    var startDate 			= today.getDate();
    var startMonth 			= today.getMonth()+1;
    var startYear 			= today.getFullYear();
    
    var startHourTR 		= today.getHours();
    var startMinTR 			= today.getMinutes();
    var numberofweekday 	= today.getDay();
    
    
    var d = new Date()
    var gmtHours = -d.getTimezoneOffset()/60;
    //document.write("The local time zone is: GMT " + gmtHours);
    var currenttimewithzone = 'Current Time Zone Offset : '+gmtHours+ ' , ' + /\((.*)\)/.exec(d.toString())[1]+' , Maxslot : '+maxslot;
    //console.log(/\((.*)\)/.exec(d.toString())[1]);
    	
    </script>
</head>

<body>
    
    <div class="loader"></div>

<div class="main-widget-plug" id="myCtrl" ng-app="myApp" ng-controller="myCtrl"  style="margin-left: auto; margin-right: auto;" ng-cloak>
    <div id="schedule-step-1" class="widget-content">
        <div class="miyn-popup-navigation">
    		<ul>
    			<li class="active">1. Select Service</li>
    			<li>2. Staff</li>
    			<li>3. Appointment</li>
    			<li>4. Your Details</li>
    		</ul>
    	</div>
    	<div class="step-box">
    		<ul>
    			<li class="miyn-popup-category-item ng-scope" ng-repeat="cateogoryseleted in categorylistang">
    				<h3 class="miyn-popup-service-category-name ng-scope" ng-if="categorylistang.length > 1">@{{cateogoryseleted.service_category_name}}</h3>
    				<ul class="miyn-popup-service-list">
    					<li class="miyn-popup-service-item ng-scope" ng-click="myFunc(serviceselecteds)"  class="ng-scope" ng-repeat="serviceselecteds in cateogoryseleted.service">
    						<div class="miyn-popup-service-icon">
    							<span>
    							    <img src="<?php echo $appurl ?>/images/service/@{{ serviceselecteds.isimage == 'true' ? serviceselecteds.imagepath = serviceselecteds.imagepath  : serviceselecteds.imagepath= 'initial-advice-white.png' }}" alt="Service Image"/>
    							</span>
    						</div>
    						<div class="miyn-popup-service-description">
    							<h4  class=" ng-binding">@{{serviceselecteds.service_name}}</h4>
    							<p class=" ng-binding">@{{serviceselecteds.service_description}}</p>
    						</div>
    						<div class="miyn-popup-service-amount" ng-if="serviceselecteds.service_price > 0">
    							<span  class="ng-binding" >@{{serviceselecteds.service_price}}  @{{serviceselecteds.service_currency}}</span>
    						</div>
    						<div class="miyn-popup-service-time">
    							<span class="ng-binding"><i class="fa fa-clock-o"></i> @{{  serviceselecteds.sevice_time_h > 0 ? serviceselecteds.sevice_time_h  :  '' }} @{{  serviceselecteds.sevice_time_h > 0 ? serviceselecteds.sevice_time_h_title  :  '' }}  @{{  serviceselecteds.sevice_time_m > 0 ? serviceselecteds.sevice_time_m  :  '' }} @{{  serviceselecteds.sevice_time_m > 0 ? serviceselecteds.sevice_time_m_title  :  '' }} </span>
    						</div>
    					</li>
    				</ul>
    			</li>
    		</ul>
    	</div>
    </div>
    <div id="schedule-step-2" class="widget-content ng-hide">
    	<div class="step-box">
    		<div class="ng-view fragment-wrapper ng-scope" id="scheduler">
    			<div class="fragment  active">
    				<div class="miyn-popup-navigation">
    					<ul>
    						<li><a href="#" onClick="serviceSelect()">1. Select Service</a></li>
    						<li class="active">2. Staff</li>
    						<li>3. Appointment</li>
    						<li>4. Your Details</li>
    					</ul>
    				</div>
    				<div class="miyn-selected-service"><h3 class="miyn-selected-service-name">@{{service}}  @{{sevice_time_h_title}} @{{servicetime_m}} @{{sevice_time_m_title}})</h3></div>
    				<ul>
    					<li class="miyn-popup-category-item ng-scope" ng-click="setStaff(staff)" ng-repeat="staff in staffrecords" >
    						<ul class="miyn-popup-staff-list">
    							<li class="miyn-popup-staff-item" ng-click="setStaff(staff)">
    								<div class="miyn-popup-user-image">
    									<img src="<?php echo $appurl ?>/images/staff/@{{ staff.staff_image == '' ? staff.staff_image = 'avatar.jpg' : staff.staff_image=staff.staff_image }}" alt="Staff Image"/>
    								</div>
    								<div class="miyn-popup-staff-name">
    									<h4 class="detail ng-binding" ng-bind="staff.staffname">Jesse Pigdon</h4>
    									<p class="detail ng-binding" ng-bind="staff.staffproffesion">Accredited Specialist Family Lawyer</p>
    								</div>
    								<div class="miyn-popup-staff-info-button">
    									<span><img src="{{config('app.live_url')}}/images/md-arrow-round.png" alt="arrow"/></span>
    								</div>
    							</li>
    						</ul>
    					</li>
    				</ul>
    			</div>
    		</div>
			<a class="miyn-popup-backbutton" href="#" onClick="serviceSelect()">Back</a>
    	</div>
    </div>
    <div id="schedule-step-3" class="widget-content ng-hide">
    	<div class="step-box miyn-appointment-popup">
    		<div class="mobile-overlay ng-hide" ng-show="$root.loading"></div>
    		<div class="ng-view fragment-wrapper ng-scope" id="scheduler">
        		<div class="fragment  active">
    				<div class="miyn-popup-navigation">
    					<ul>
    						<li><a onClick="serviceSelect()" href="#">1. Select Service</a></li>
    						<li><a onClick="staffSelect()()" href="#">2. Staff</a></li>
    						<li class="active">3. Appointment</li>
    						<li>4. Your Details</li>
    					</ul>
    				</div>
					<div class="miyn-selected-service">
					    <h3 class="miyn-selected-service-name">
					        @{{service}} (@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}}  @{{sevice_time_m_title}}) 
					        <span><img src="{{config('app.live_url')}}/images/arrow.png" alt="arrow"/></span>
					        @{{staffname}} 
        				    <span><img src="{{config('app.live_url')}}/images/arrow.png" alt="arrow"/></span>
            				<ul class="selected-slots" style="display: inline-block;"></ul>
					    </h3>
					</div>
        			<div class="title ng-hide">
            			<h4 class="clearfix">
            				<span class="title-span">
        						<strong class="ng-binding">
        							 @{{currenttimewithzone}}  
        						</strong>	
            				</span>
            			</h4>
        			</div>
        			<!--<div class="title">-->
           <!-- 			<h4 class="clearfix">-->
           <!-- 				<span class="title-span">-->
           <!-- 						<strong class="ng-binding">-->
           <!-- 							@{{service}}-->
           <!-- 							<small class="ng-binding">(@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}}  @{{sevice_time_m_title}})</small>-->
           <!-- 						</strong>-->
           <!-- 						<span class="space-before ng-binding" >with</span>-->
           <!-- 							<div class="avatar-image avatar-sm ng-hide" >-->
           <!-- 							<img  src="{{config('app.live_url')}}/images/img-avatar-staff.jpg">-->
           <!-- 							</div>-->
           <!-- 						<strong ng-bind="staffname" class="ng-binding">@{{staffname}}</strong>-->
           <!-- 				</span>-->
           <!-- 				<ul class="selected-slots" style="display: inline-block;"></ul>-->
           <!-- 			</h4>-->
        			<!--</div>-->
        			<h3 title="New Service">
        				<span  class="ng-binding">
        					<small >@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}} @{{sevice_time_m_title}}</small>
        					Your preferred times (suggest up to 3):
        				</span>
        			</h3>
        			<div class="slots-picker-container">
        				<div class="slots-picker web">
        					<div class="picker clearfix">
        						<div class="calendar " id="date_picker" style="position: static; zoom: 1;"></div>
        						<div class="availability">
        							<div class="header">
        								<div class="loading-header ng-binding" style="display: none;">Availability</div>
        									<div class="selected-day-header" style="display: block;">
        										<span class="available-text ng-binding">Availability for</span>
        										<span id="alternate1" class="date">&nbsp;</span>
        								</div>
        							</div>
        							<div id="slots" class="slots" style="display: block;">
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="timezone-nextbutton">
        				    <div class="timezone-left">
            			        <p>Your current timezone <span id="ckarea"></span> , want to change? <a href="javascript:void(0)" id="ClickToHide" onclick="ClickToHide()" >  click this <i class="fa fa-question-circle" aria-hidden="true"></i> </a></p>
            			        <div class="select-timezone show-hide-timezone" style="display: none;">
            						Select your timezone : 
            						<select class="time-zone-picker ng-binding" id="time_zone" name="time_zone"  >
            						    <option value="" data-selectedzoneid="" data-selectedzonename="" >Select..</option>
                                        <?php 
                				        $array = $country;
                                        foreach($array as $key=>$val){ 
                                        ?>  
                                            <option value="{{$val->default_offset}}" data-selectedzoneid="{{$val->id}}" data-selectedzonename="{{$val->timezone_name}}" >{{$val->country_name}} ({{$val->default_offset}})</option>
                                        <?php 
                                        }				
                                        ?> 
                                    </select>
                        
            					</div>
        				    </div>
        				    <div class="timezone-right">
        				        <a class="miyn-popup-backbutton" href="#" onClick="staffSelect()()">Back</a>
        						<a class="standard-button continue-button i18n-odir ng-binding" href="" onClick="sheduleForm()" >Continue</a>
        				    </div>
        				</div>
        			</div>
                    <div class="title ng-hide" >
            			<h4 class="clearfix">
            				<span class="title-span">
        						<strong id="ng-time" class="ng-binding">
        							Start Time <small> @{{starttime_hD}} : @{{starttime_mD}} AM </small>
        							 End Time <small>  @{{endtime_hD}} : @{{endtime_mD}} PM </small>
        							 Preparation <small> @{{preparation}} @{{sevice_time_m_title}} </small>
        						</strong>
            				</span>
            			</h4>
        			</div>
        		</div>
    		</div>
    	</div>
    </div>
    
    <div id="schedule-step-4" class="widget-content ng-hide">
    	<div class="step-box miyn-yourdetails-popup">
			<div class="miyn-popup-navigation">
				<ul>
					<li><a onClick="serviceSelect()" href="#">1. Select Service</a></li>
					<li><a onClick="staffSelect()()" href="#">2. Staff</a></li>
					<li><a onClick="formToShedule()" href="#">3. Appointment</a></li>
					<li class="active">4. Your Details</li>
				</ul>
			</div>
			<div class="miyn-selected-service">
				<h3 class="miyn-selected-service-name">
				    @{{service}} 
				    <span><img src="{{config('app.live_url')}}/images/arrow.png" alt="arrow"/></span>
				    (@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}}  @{{sevice_time_m_title}})
				    <span><img src="{{config('app.live_url')}}/images/arrow.png" alt="arrow"/></span>
				    @{{staffname}}
				    <span><img src="{{config('app.live_url')}}/images/arrow.png" alt="arrow"/></span>
    				<ul class="selected-slots" style="display: inline-block;"></ul>
			    </h3>
			</div>
			<div class="miynpopup-content-wrapper">
				<form id="submitBookingformData" method="POST">
				    <div id="response_message"></div>
                    {!! csrf_field() !!}
					<div class="miyn-popup-forms">
						<div class="miyn-popup-field-form name-field">
		
							<div class="miyn-popup-subfield-form">
								<input type="text"  name="c_first_name" id="c_first_name" placeholder="First name*" value="<?php echo $client_live_info->firstname ?? ''; ?>"  />
							</div>
							<div class="miyn-popup-subfield-form">
								<input type="text"  name="c_last_name" id="c_last_name" placeholder="Last name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" />
							</div>
						</div>
						<div class="miyn-popup-field-form email-field">
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
						<div class="miyn-popup-field-form country-field">
							<div class="miyn-popup-subfield-form">
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
	                                <option value="{{$value->id}}" <?php echo $selected; ?>  >{{$value->country_name}} ({{$value->country_code}})</option>
	                                
	                                @endforeach
	                            </select>
                        	</div>
							<div class="miyn-popup-subfield-form">
								<input type="text" name="c_phone" id="c_phone"  placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
							</div>
						</div>
						<div class="miyn-popup-field-form message-field">
							<textarea name="c_note" id="c_note" class="field-long field-textarea" placeholder="Message"></textarea>
						</div>
						<div class="form-submit-button">
							<button type="submit" id="changeSubmit">Submit</button>
							<a id="cancelback" class="miyn-popup-backbutton" href="#" onClick="formToShedule()">Back</a>
						</div>
					</div>
				</form>
			</div>
    	</div>
    </div>
</div>




<script>


/*
================================
If Shedule Selection
================================
*/

var checkstep = function() {
     if(widghtid > 0) {	modulestep = 'staffselection';	} else { modulestep = ''; }
	stepFormcall(modulestep);
	return  modulestep;
}

var checkstepstaff = function() {
	if(staffid > 0) {  modulestep = 'SheduleTimesSelection'; } 
	else {	modulestep = 'staffselection';	}
	stepFormcall(modulestep);
	return  modulestep;
}
		
var stepFormcall = function(modulestep) {
	//alert(modulestep);

	switch (modulestep) {
	  case 'staffselection':
		staffSelect();
		break;
	  case 'SheduleTimesSelection':
		staffShedule();
		break;
	  case 'FormSelection':
		 sheduleForm();
		break;
	  default:
		serviceSelect();
	}	
}



var serviceSelect = function() {
	//alert('Service Selected');
	$('#schedule-step-1').removeClass('ng-hide');
	$('#schedule-step-2').addClass('ng-hide');
	$('#schedule-step-3').addClass('ng-hide');
	$('#schedule-step-4').addClass('ng-hide');
}

var staffSelect = function() {
	//alert('Staff Select');
	 $("#slots").html('');
	$('#schedule-step-1').addClass('ng-hide');
	$('#schedule-step-3').addClass('ng-hide');
	$('#schedule-step-2').removeClass('ng-hide');
	$('#schedule-step-4').addClass('ng-hide');
}

var staffShedule = function() {
	//alert('Staff Shedule');
	$('#schedule-step-2').addClass('ng-hide');
	$('#schedule-step-3').removeClass('ng-hide');
	
}

var sheduleForm = function() {
	//alert('Shedule Form');
	if(dateWiseTimes.length > 0) {
		$('#schedule-step-3').addClass('ng-hide');
		$('#schedule-step-4').removeClass('ng-hide');
	} else {
		alert('Select atleast 1 slot !');	
	}
}

var formToShedule = function() {
	//alert('Shedule Form');
	$('#schedule-step-4').addClass('ng-hide');
	$('#schedule-step-3').removeClass('ng-hide');

}




/*  
===================================
End First Time Date Time Picker
===================================
*/

 
function DisableWeekDaysfunction(date) {
      var day = date.getDay();
	  //return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6)];
 	  return [($.inArray(day, weekened) != -1)];
 //	  //console.log(weekened);
 	  //return [(day != 0 && day != 1 )];
}


function calledaftepageload(weekened) {
    
   
    

 	$( "#date_picker" ).datepicker({
		dateFormat: 'DD, M dd,  yy',
		minDate: 0,
        multidate: true,
        multidateSeparator: ',',
        altField:   "#alternate1",
        selectMultiple:true,
		beforeShowDay: DisableWeekDaysfunction,
        onSelect: function(date, inst) { 
           // //console.log("Selected date: " + dateText + "; input's current value: " + this.value);

              // alert(date);
                $('#alternate1').html( date);
               //
               // alert('called');

                var jsDate = $(this).datepicker('getDate');
               
                
                if (jsDate !== null) { // if any date selected in datepicker
                
               // var startDate   = $(this).datepicker('getDate').getDate();                 
               // var startMonth      = $(this).datepicker('getDate').getMonth() + 1;             
               // var startYear       =$(this).datepicker('getDate').getFullYear();
               // var fullDate    = year1 + "-" + month1 + "-" + day1;
				
                    jsDate instanceof Date; // -> true
                    startDate 	= jsDate.getDate();
                    startMonth 	= jsDate.getMonth()+1;
                    startYear 	= jsDate.getFullYear();
                    
                     //console.log("This is jsDate :"+startMonth);
					
						numberofweekday = jsDate.getDay();
						arrr = selectedstaff.weekworkday;
						//console.log("Date Selection ");
						//console.log(arrr);
						for(var i=0;i < selectedstaff.weekworkday.length;i++){
							//arr.push(serviceList.weekworkday[i].day);
							if(selectedstaff.weekworkday[i].day == numberofweekday) {
							
								startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
								startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
								endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
								endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);
								
								//alert(startHour);
								

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
						
					//	alert(startHour);
					
					
				//	//console.log("date change" + " offset:"+offset+" newoffset:"+newoffset+" mainoffset:"+mainoffset);

                    generate_series(step, offset, newoffset);
						
                }
				
        },
		onChangeMonthYear: function(year, month, widget) {
			//reloadCalendar(month, year);
			//alert('Change event');
			//$('#slots').html('');
			//$('#alternate1').html('');
		}
	});
	

	
	   // $("#date_picker").trigger('onSelect');
	//	$(".ui-datepicker-current-day").trigger("click");
	//	$(".ui-datepicker-current-day").addClass(" available ");
		
		$('#date_picker').change(function () {
            //console.log('Current Date '+$('#date_picker').val());
         });
         



		
}






/*  
===================================
Generate appointment time
===================================
*/

function generate_series(step, offset, newoffset) {
    
    
    //$('.selected-slots').html('');
    
    calledtime++;
   // //console.log("calledtime"+calledtime);

   var htmlcolde  = "";
   
   

   
   
    //Current Date
    var CKDate = new Date();
    var startDateCKDate 		= CKDate.getDate();
    var startMonthCKDate 		= CKDate.getMonth()+1;
    var startYearCKDate 		= CKDate.getFullYear();
    
    var startHourTRCKDate 		= CKDate.getHours();
    var RRstartHourTRCKDate 		= CKDate.getHours();
    var startMinTRCKDate		= CKDate.getMinutes();
    var numberofweekdayCKDate 	= CKDate.getDay();
    //console.log(arrr);
    for(var i=0;i < arrr.length;i++){
		//arr.push(serviceList.weekworkday[i].day);
		if(arrr[i].day == numberofweekdayCKDate) {
		    
			startHour 	= parseInt(arrr[i].starttime_h);
			startMin 	= parseInt(arrr[i].starttime_m);
			endHour 	= parseInt(arrr[i].endtime_h);
			endMin 		= parseInt(arrr[i].endtime_m);
			
		}
	}	
	
	
	//console.log('B Today Hour '+startHourTRCKDate);
    //console.log('B start hour '+startHour);
    //console.log('B end hour '+endHour);
    

    var ass = 0;
    startHour = (startHour - mainoffset) +  Number(offset);
    endHour = (endHour - mainoffset) +  Number(offset);
    startHourTRCKDate = (startHourTRCKDate - mainoffset) +  Number(offset);
    
    //console.log(startHourTRCKDate);
   
    if(startDateCKDate == startDate) {
        
        //console.log('Today');
        

        if(startHour != "") {
            
            if(startHour <= RRstartHourTRCKDate) {
                
                startHour = RRstartHourTRCKDate;
                
                if(endHour <= RRstartHourTRCKDate) {
                    $('#slots').html('');
                    //console.log('False 1');
                   return false; 
                }
                
                if(startMin <= startMinTRCKDate) {
                    startHour = RRstartHourTRCKDate+1;   
                } else {
                    startMin = startMin + step + preperationTime;
                }
                
            }
        } else {
            $('#slots').html('');
            //console.log('False 2');
            return false;
        }
        
    }
    
   // //console.log("select change" + " offset:"+offset+" newoffset:"+newoffset+" mainoffset:"+mainoffset);
    
    //console.log('Offset '+offset);
    //console.log('NewOffset '+newoffset);
    //console.log('Mainoffset '+mainoffset);
    //console.log('ass '+ass);
    
    //console.log('Today Hour '+startHourTRCKDate);
    //console.log(' start hour '+startHour);
    //console.log(' end hour '+endHour);
        
    var cstart= new Date(startYear, startMonth-1, startDate, startHour, startMin, 0), 
		  cend = new Date(startYear, startMonth-1, startDate, endHour, endMin, 0),
		el = document.getElementById("slots"); 
		el.innerHTML = htmlcolde;
		
	var selectedDateT = startYear + '-' + startMonth + '-' + startDate;
	
	//console.log("This is selectedDateT :"+selectedDateT);
	
    var start , 
        end ;
        
       // alert(startHour);
	// 
	
	 //   //console.log('mainoffset'+newoffset);
	
	//  if(newoffset !="") {
	      
	      
	  //     //console.log('cstart s ::'+cstart.getTimezoneOffset());
	       
	       var zoneint = 0;
	           zoneint = -(offset*60);
	

            var sutc = cstart.getTime() + (zoneint * 60000);
       //     //console.log('sutc : '+sutc);
            var ssnd = new Date(sutc + (3600000*newoffset));
           
            var eutc = cend.getTime() + (zoneint * 60000);
     //       //console.log('eutc : '+eutc);
            var esnd = new Date(eutc + (3600000*newoffset));
            
           	start = ssnd,   end = esnd;
           	
       //    	//console.log('start e ::'+start);
           	

//	 } else {   start = cstart,   end = cend; }


    // Remove previous data
  while (el.firstChild)
    el.removeChild(el.firstChild);


  
    //console.log(end.getHours());
	
	var date1 = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM
    var date2 = new Date(startYear, startMonth, startDate, endHour, endMin); // 5:00 PM
    if (date2 < date1) {
        date2.setDate(date2.getDate() + 1);
    }
    var diff = date2 - date1;

    var intv = step + preperationTime;

    var msec = diff;
    var hh = Math.floor(msec / 1000 / 60 / intv);
	
/*    msec -= hh * 1000 * 60 * 60;
    var mm = Math.floor(msec / 1000 / 60);
    msec -= mm * 1000 * 60;
    var ss = Math.floor(msec / 1000);
    msec -= ss * 1000;*/

	var colsslot = Math.round(hh/7);

 	var i, j, k=0, s= 0;
 	var styleinc = 107, curr = 0;
 	htmlcolde += '<ul id="timeslot" class="column-'+s+'" style="left: '+curr+'px;">';
 	for (i = 0; i <= (hh-1); i++) {

		k++;
		var options = { hour: '2-digit', minute: '2-digit'/*, timeZone: "Asia/Dhaka"*/ };
		var point = start.toLocaleString('en-US',  options);
		start.setMinutes(start.getMinutes() + step + preperationTime);
	
		htmlcolde += '<li><a href="javascript:void(0)" class="optional-time gray-button-style"  data-start-time="' + selectedDateT + ' ' + point + '"  > <div class="icon">&nbsp;</div><span> ' + point +  '</span></a></li>';
					
		// Every 7 items after new UL right			
		if(k % 7 == 0) {
			curr +=  styleinc; s++; k = 0; htmlcolde += '</ul>';
			if(i < (hh-1)) {
				htmlcolde += '<ul id="timeslot" class="column-'+s+'" style="left: '+curr+'px;">';
			}
		} 
	
		// End all list item
		if(i == (hh-1)) {
			htmlcolde += '</ul>';
		} 
  	}
 
 	 el.innerHTML = htmlcolde;
	 
	//   if time selected and match
	$('#timeslot a').each(function(){
		var newT = $(this).attr("data-start-time");
		if($.inArray(newT, dateWiseTimes) != -1) {
			$("a[data-start-time ='"+newT+"']").addClass('checked');
		} else {
			//console.log("is NOT in array");
		}
	});
	
}


// Remove selcted time
var removeA = function(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

$(document).on('click', '#timeslot li a', function () {
		
	var countlenght = dateWiseTimes.length;
	
//	//console.log(dateWiseTimes);
	
	//var dataId = $(this).attr('class');
	if($(this).hasClass('checked')) {
		$(this).removeClass('checked');
		removeA(dateWiseTimes, $(this).attr("data-start-time"));
		
	//	 $(".selected-slots").prepend('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');
		 
	} else {
		if(countlenght < 3) {
			dateWiseTimes.push($(this).attr("data-start-time"));
			$(this).addClass('checked');
			
	//	 $(".selected-slots").append('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');

		} else {
			alert('Please select a maximum of 3 time slots for your booking to continue. !');
		}
	 }
				 
				 
	$(".selected-slots").html('');
	dateWiseTimes.forEach(function(item){
				 
		var selectdatetime = item.split(' ');
		var parts =selectdatetime[0].split('-');
		var mydate = new Date(parts[0], (parts[1]-1), parts[2]);
		
		
		 //const date = new Date(2009, 10, 10);  // 2009-11-10
		const month = mydate.toLocaleString('default', { month: 'short' });
		
	//	//console.log('each'+mydate);
		 
		$(".selected-slots").append('<li data-before-on="Date" data-before-or="or"  data-of-start-time="'+item+'"><a href="javascript:void(0)" class="goto">'+month+' '+parts[2]+', '+selectdatetime[1]+' '+selectdatetime[2]+'</a></li>');
			
	//	//console.log('selectdatetime :'+selectdatetime);
								 
	});
				 
});
		
$(document).on('click', '.selected-slots li', function () {

			 var selectdatetime     =   $(this).attr('data-of-start-time').split(' ');
			 
		//	 //console.log('This is selected date : '+selectdatetime);
			 
			 var parts              =   selectdatetime[0].split('-');
			 var mydate             =   new Date(parts[0], (parts[1]-1), parts[2]);
			 
		//	 //console.log('tab select - '+mydate);

			 var datewise           = JSON.stringify( dateWiseTimes);
					
			  $('#date_picker').datepicker("setDate", mydate);
			  
			 	var dateObject = $("#date_picker").datepicker('getDate');
		 		$('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
			  
				//jsDate instanceof Date; // -> true
				startDate = mydate.getDate();
				startMonth = mydate.getMonth();
				startYear = mydate.getFullYear();
				
				var staf = JSON.stringify( selectedstaff);
					
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
						
                }

});




// All funtions Init
  
 $(function() { 
	 
	 // Change while time zone
	 $('#time_zone').on('change', function() {
	     
	     if(this.value!="") {
    	      offset = Number(this.value);

    	      newoffset = offset;
    	      // mainoffset = offset;
    		dateWiseTimes = [];
    		$(".selected-slots").html('');
    		// Redraw Times slot
    		
    		//console.log("select change" + " offset:"+offset+" newoffset:"+newoffset+" mainoffset:"+mainoffset);

            var myzoneName = $('#time_zone option:selected').attr('data-selectedzonename');
           // var myzoneId = $('#time_zone option:selected').attr('data-selectedzonei');
    		timezonename = myzoneName;
    		//console.log(timezonename);
    		
    		generate_series(step, offset, newoffset);
    		
	     }
		 
	});
	
	$('#time_zone').children('[value="'+getTimeZone()+'"]').attr('selected', true);

});
 





// ----------------------
	
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    
	$scope.step = step;  
	$scope.preparation = preperationTime;
	$scope.currenttimewithzone = currenttimewithzone; 
	$scope.records = serviceList;
	$scope.categorylistang = serviceList;

	$scope.myFunc = function(thisselected) {

		// Widget wise step
		dateWiseTimes = [];
		$('.selected-slots').html('');
		widghtid = thisselected.serviceid;
		
	//	//console.log('Widget Id:'+widghtid);
		checkstep();
		
		// Scope wise data bind
		$scope.service 				= thisselected.service_name;
		servicename = thisselected.service_name;
		
		
		
		$scope.servicetime_m 		= thisselected.sevice_time_m;
		$scope.sevice_time_m_title 	= thisselected.sevice_time_m_title;
		$scope.servicetime_h 		= thisselected.sevice_time_h;
		$scope.sevice_time_h_title 	= thisselected.sevice_time_h_title;
		$scope.staffrecords 		= thisselected.staffs;
		
		//step			 	= parseInt(thisselected.sevice_time_m);
		//console.log("total_service_minutes: "+thisselected.total_service_minutes);
		step			 	= parseInt(thisselected.total_service_minutes);
		preperationTime 	= parseInt(thisselected.preparationtime_m);
		$scope.preparation 	= preperationTime;
		
		// Reset shedule
		startHour 	= 0; startMin 	= 0; endHour 	= 0; endMin 		= 0;  
		
		// $("#slots").html('');
		
		generate_series(step, offset, newoffset);
		
		
    };
	
	$scope.setStaff = function(thisselected) {
		
		// Staff wise step change
		dateWiseTimes = [];
		$('.selected-slots').html('');
		$('#slots').html('');
		
			startHour 	= parseInt(0);
			startMin 	= parseInt(0);
			endHour 	= parseInt(0);
			endMin 		= parseInt(0);
		    offset      = thisselected.offset;
		    //mainoffset  = thisselected.offset;
		    mainoffset = offset; 
		    availability = "all";
		    minDate = "";
		    maxDate = "";
		    
		    newoffset = offset;
		    //newoffset =   getTimeZone();
		
		selectedstaff 	= thisselected;
		staffid 		= thisselected.staffid;
		
		availability 	= thisselected.availability;
		
		//console.log("after select availability:"+availability);
		//if(availability == "yes") {
		//    //console.log("after - select minDate:"+minDate);
		//    //console.log("after - select maxDate:"+maxDate);
            minDate 		= thisselected.start_date;
	    	maxDate 		= thisselected.end_date;
        //} else {
        //    minDate 		= 0;
        //    maxDate 		= -1;
       // }
	
		
	//	//console.log('Staff Id:'+staffid);
		checkstepstaff();

		$scope.staffname = thisselected.staffname;
		staff_name = thisselected.staffname;
		
						arrr = selectedstaff.weekworkday;
						//console.log("Slote Selection ");
						//console.log(arrr);
		
		// Set week and redraw calender after select staff
		var arr = [];
		for(var i=0;i < selectedstaff.weekworkday.length;i++){
		    
		  	arr.push(parseInt(selectedstaff.weekworkday[i].day));
		  	
			if(selectedstaff.weekworkday[i].day == numberofweekday) {
			
				startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
				startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
				endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
				endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);
				
				
				
				$scope.starttime_hD = startHour;
				$scope.starttime_mD = startMin;
				$scope.endtime_hD = endHour;
				$scope.endtime_mD = endMin;
				
			}
		}
		
		weekened = arr;
		
	
		calledaftepageload(weekened);
		
	
		var dateObject = $("#date_picker").datepicker('getDate');
		 $('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
		 $("#date_picker").datepicker("refresh");
		 
		// $("#slots").html('');
		
		//$('#date_picker').datepicker().val(new Date()).trigger('change')


		 //triggercurrentdate();
		 generate_series(step, offset, newoffset);
		 
		 
		  mainoffset = offset;
	      offset = Number(getTimeZone());
	      newoffset = offset;
		 
		  generate_series(step, offset, newoffset);
		 
		// $("#timezone").trigger("change")
		
		//console.log("availability:"+availability);

		if(availability == "yes") {
		    
	//	    //console.log("minDate:"+minDate);
	//	    //console.log("maxDate:"+maxDate);
		    
		    if(checkDate(minDate) > 0) {
                $('#date_picker').datepicker('option', 'minDate', minDate);
		    } else {
		         $('#date_picker').datepicker('option', 'minDate', 0);
		    }
             
             $('#date_picker').datepicker('option', 'maxDate', maxDate);
             
        } else {
            
           $('#date_picker').datepicker('option', 'minDate', 0);
           $('#date_picker').datepicker('option', 'maxDate', "+1Y");

        }
        
         $("#date_picker").datepicker("refresh");

		  
		
    };
	
});


function checkDate(selectdate) {
    
       var selectedDate = selectdate;
       
       var now = new Date();
       var dt1 = Date.parse(now),
       dt2 = Date.parse(selectedDate);
       if (dt2 < dt1) {
            return 0;
       } else {
           return 1;
       }
 }


function arrayColumn(arr, n) {
  return arr.map(x=> x[n]);
}


function getTimezoneReal() { 
    
    let date = new Date();  
    let options = {  
        weekday: "long", year: "numeric", month: "short",  
        day: "numeric", hour: "2-digit", minute: "2-digit"
    }; 
    
    var datestr = date.toLocaleTimeString("en-us", options);
    
    
            //var d = new Date();
    //        //console.log('CT :'+d);
    
    
            offset = d.getTimezoneOffset(); 
            formatted = -(offset / 60); // +6
            var fullstring = d.toString();
            var actualstr = '';
            if( formatted < 10 ) {
                
                if(formatted >= 0) {
                    actualstr = '+0'+parseFloat(formatted).toFixed(2);
                } else {
                    actualstr = '-0'+parseFloat(formatted).toFixed(2);
                }
                
            } else {
                
                if(formatted >= 0) {
                    actualstr = '+'+parseFloat(formatted).toFixed(2);
                } else {
                    actualstr = '-'+parseFloat(formatted).toFixed(2);
                }
                
            }
            
            
           return datestr + ' GMT ' + actualstr;  //Thu Dec 12 2019 14:56:28 GMT+0600 (Bangladesh Standard Time)
           // return formatted;  // +6
} 

/*

Convert 12/24 hours to 12 hours

*/
const converTime = (time) => {
  let hour = (time.split(':'))[0]
  let min = (time.split(':'))[1]
  let part = hour > 12 ? 'pm' : 'am';
  
  min = (min+'').length == 1 ? `0${min}` : min;
  hour = hour > 12 ? hour - 12 : hour;
  hour = (hour+'').length == 1 ? `0${hour}` : hour;

  return (`${hour}:${min} ${part}`)
}

//console.log(converTime('18:00:00'))
//console.log(converTime('6:5:00'))


function timezone() {
  var now = new Date();
  var jano = new Date(now.getFullYear(), 0, 1).getTimezoneOffset()/-60;
  var julo = new Date(now.getFullYear(), 6, 1).getTimezoneOffset()/-60;
  var tz = Math.min(jano, julo);
  if (jano != julo) tz += ((jano < julo) ? 'S' : 'W') + Math.abs(jano - julo);
  return tz;
}

function getTimeZone() {
  //var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
  //return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
  
    var d = new Date();
    var n = d.getTimezoneOffset();
    var timezone = n / -60;
    
    timezonename = Intl.DateTimeFormat().resolvedOptions().timeZone;
    //console.log('c-'+timezonename);
    
  //  //console.log('CCC : '+timezone);
    return parseInt(timezone);
}


/*
==========================
Start New Shedule Plugins
version - 1.1.0
==========================
*/

/*var businessid = '123456';
var today  = '';*/


// Hide & select Time Zone
function ClickToHide() {
    $(".show-hide-timezone").show();
}



 
 (function ($) {
  
	"use strict";

       $("#ckarea").html(getTimezoneReal());



}(jQuery));
 
</script>

<script>

    function printResponseMessage(data) {
        if (data.status == 'success') {
            $('#response_message').html('<p  style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;position: relative;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;">' + data.message + '</p>');
        }
    }

</script>

<script>
    
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
          email: "Ex.name@domain.com"
        },
        client_country_id: 'required',
    
    },
    submitHandler: function(form) {
        //var formdata = $(form).serialize(); // here $(this) refere to the form its submitting
        //console.log(formdata);
       
        $('#changeSubmit').text('Sending..');
       
        //$('#changeSubmit').prop();
        $("#changeSubmit").attr("disabled", true);
        $("#cancelback").hide();
        
        //console.log('dateWiseTimes : '+dateWiseTimes)
        //console.log('staffid : '+staffid)
        //console.log('widghtid : '+widghtid)
        //return false;
        
        var forms = $(form)[0]; // You need to use standard javascript object here
        var fd = new FormData(forms);
        fd.append("widghtid", widghtid);
        fd.append("staffid", staffid);
        fd.append("dateWiseTimes", dateWiseTimes);
        fd.append("b_id", b_id);
        fd.append("timezone", newoffset);
        fd.append("timezonename", timezonename);
        
        
        
        // //console.log(dateWiseTimes);
        // //console.log(servicename);
        // //console.log(staff_name);
        
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
                //return false;
                //$('#changeSubmit').val('Submit');
                //alert('data inserted successfully.');
                //$('#submitBookingformData')[0].reset();
                printResponseMessage(data);
                //window.location.reload();
                //$(this).reset();
                
                var html = "";
                html += '<div class="miyn-popup-confirmation-content">';
					html += '<h3>YOUR BOOKING REQUEST HAS BEEN SENT</h3>';
					html += '<p>You will receive an email shortly and once we confirm the booking you will receive a calendar invite.</p>';
					html += '<div class="miynpopup-confirmation-booking-info">';
						html += '<p>Thanks for your booking request and we look forward to meeting you soon.</p>';
						html += '<table border="0" cellpadding="0" cellspacing="0">';
							html += '<tbody>';
								html += '<tr>';
									html += '<th>Service Name</th>';
									html += '<td>'+servicename+'</td>';
								html += '</tr>';
								html += '<tr>';
									html += '<td colspan="2"></td>';
								html += '</tr>';
								html += '<tr>';
									html += '<th>Your Meeting with</th>';
									html += '<td>'+staff_name+'</td>';
								html += '</tr>';
								html += '<tr>';
									html += '<td colspan="2"></td>';
								html += '</tr>';
								html += '<tr>';
									html += '<th>Suggested Date(s)</th>';
									html += '<td class="date-list">';
										html += dataList;
									html += '</td>';
								html += '</tr>';
							html += '</tbody>';
						html += '</table>';
					html += '</div>';
					html += '<div class="miynpopup-confirmation-buttons">';
				// 		html += '<a href="#">Book another</a>';
						//html += '<a href="#">Manage Booking</a>';
					html += '</div>';
				html += '</div>';
				
                // html += '<h2 class="margintop60">Your booking request was sent</h2>';
                // html += '<h3>You will receive an email once admin, confirm the booking</h2>';
                // html += '<div style="padding:15px; border:1px solid #000000;background-color: wheat;">You will receive an email once admin, confirm the booking</div>';
                
                // var contentofhtm = $('#schedule-step-4 .title').html();
                // html += '<div style="padding:15px;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;">'+contentofhtm+'</div>';
                
                $("#schedule-step-4").html(html);
                
            }
        });
  }
});

    /*$("#submitBookingformData").submit(function(e){
        
        e.preventDefault(); 
        //alert('called');
        
        var c_first_name    = $("#c_first_name").val();
        var c_last_name     = $("#c_last_name").val();
        var c_email         = $("#c_email").val();
        var c_phone         = $("#c_phone").val();
        var c_note          = $("#c_note").val();
        
        if(c_first_name === ''){
             $('.first_name_error').html('<span style="color:red;">First name is required.</p>');
        }else{
            $('.first_name_error').html('<span style="display:none;">');
        }
        if(c_last_name === ''){
             $('.last_name_error').html('<span style="color:red;">Last name is required.</p>');
        }
        else{
            $('.last_name_error').html('<span style="display:none;">');
        }
        if(c_email === ''){
             $('.email_error').html('<span style="color:red;">Email is required.</p>');
        }
        else{
            $('.email_error').html('<span style="display:none;">');
        }
        if(c_phone === ''){
             $('.phone_error').html('<span style="color:red;">Phone number is required.</p>');
            //return false;
        }
        else{
            $('.phone_error').html('<span style="display:none;">');
        }
        if(c_note === ''){
             $('.note_error').html('<span style="color:red;">Note is required.</p>');
        }
        else{
            $('.note_error').html('<span style="display:none;">');
        }
        
        if(c_first_name === '' || c_last_name === '' || c_email === ''  || c_phone === ''  || c_note === '' ){
            return false;
        }

       var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
       //console.log(formdata);
       
       $('#changeSubmit').val('Sending..');
       
       //return false;
       
       //alert('{{url("{{config('app.live_url')}}/add-booking-form-data")}}');
       
        $.ajax({
            //alert('ajax call');
            type: 'post',
            url:'{{url(" {{config('app.live_url')}}/add-booking-form-data")}}',
            data:formdata,
            success: function (data) {
                //console.log(data);
                $('#changeSubmit').val('Submit');
                alert('data inserted successfully.');
                window.location.reload();
            }
        });
    });*/

    
   
</script>

<script>
// Disable click event untill load all content   
var event = $(document).click(function(e) {
    e.stopPropagation();
    e.preventDefault();
    e.stopImmediatePropagation();
    return false;
});

$(document).ready({
    $(document).unbind('click');
});   
</script>

<script type="text/javascript">
		$(document).ready(function(){
			poupHeight();
		});
		$(window).load(function(){
			poupHeight();
		});
		$(window).resize(function(){
			poupHeight();
		});
		function poupHeight(){
			var winHeight = $(window).height();
			var popupHeight = $('.miyn-popup-concent-area').outerHeight();
			var contentHeight = $('.miynpopup-content-wrapper').height();
			var adjustHeight = popupHeight - contentHeight;
			var reqHeight = contentHeight + adjustHeight;
			//console.log(reqHeight);
			if(reqHeight > winHeight){

			}
		}
	</script>
	
<script type="text/javascript">
$(".loader").fadeIn("slow");
$( document ).ready(function() {
    
 // $(window).load(function() {
   //     //console.log('Called');
        $(".loader").fadeOut("slow");
 //   });  
    
});
</script>

</body>
</html>
