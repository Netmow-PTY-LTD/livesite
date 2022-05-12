<?php
    $color_bg = $allbusinessinfo['livestyle'][0]->action_background_color;
    $widget_image   =   $allbusinessinfo['livestyle'][0]->label_partial_image;
?>


<!DOCTYPE html>
<html class="miyn-popup-load">
<head>
	<title>MIYN Widget</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<link href="{{asset('miyn-widget-4/css/jquery-ui.css')}}" rel="stylesheet">
	<link href="{{asset('miyn-widget-4/css/all.min.css')}}" rel="stylesheet">-->
	
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
        	background-color: #ffffff;
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
        
        /*APPOINTMENT LIST POPUP STYLE 2*/
        .miyn-iframe-popup-box2:not(.miyn-appointment-shared-document-area) {
            display: none;
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
        	border-color: #00BAEB;
        }
        .miyn-iframe-popup-box2 .appointment-icon {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #00BAEB;
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
            color: #2DB9EB;
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
        .miyn-iframe-popup-box2 .selection-user-list-area ul li a {
            display: flex;
            align-items: center;
            padding: 12px;
            background-color: #ffffff;
            border-radius: 3px;
            border: 1px solid #ffffff;
        }
        .miyn-iframe-popup-box2 .selection-user-list-area ul li a:hover {
        	border-color: #00BAEB;
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
            color: #8A8A8A;
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
        
        
        /*SUBMIT DETAILS POPUP STYLE*/
        .miyn-iframe-popup-box2 .appointment-submit-details-content {
            background-color: #FFFFFF;
            border-radius: 10px 10px 0 0;
            padding: 30px 20px 50px;
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
        .miyn-iframe-popup-box2 .form-field input:focus, .miyn-iframe-popup-box2 .form-field textarea:focus {
        	outline: none;
        }
        .miyn-iframe-popup-box2.miyn-appointment-client-details-area .miyn-widgets-popup-footer {
            background-color: #ffffff;
        }
        .miyn-iframe-popup-box2 .submit-button {
        	margin-top: 10px;
        }
        .miyn-iframe-popup-box2 .submit-button a {
            display: inline-block;
            background-color: #00BAEB;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
        }

        /*GET A QUOTE STYLE*/
        .miyn-appointment-shared-document-area .miyn-appointment-submit-details-contents h3 {
            color: #0E1130;
            font-size: 14px;
        }
        .miyn-appointment-shared-document-area .appointment-submit-details-content {
            background-color: transparent;
        }
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field input, .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field textarea {
            border: 1px solid #E9E9E9;
            background-color: #ffffff;
            border-radius: 2px;
        }
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field input::-webkit-input-placeholder { /* Edge */
            color: #8A8A8A;
        }
        
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #8A8A8A;
        }
        
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field input::placeholder {
            color: #8A8A8A;
        }
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field textarea::-webkit-input-placeholder { /* Edge */
            color: #8A8A8A;
        }
        
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field textarea:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #8A8A8A;
        }
        
        .miyn-iframe-popup-box2.miyn-appointment-shared-document-area .form-field textarea::placeholder {
            color: #8A8A8A;
        }
        
        
        /*SUCCESS POPUP STYLE*/
        .miyn-iframe-popup-box2 .appointment-success-content {
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 30px 20px 50px;
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
            background-color: #00BAEB;
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
        	text-align:center;
        }
        .miyn-iframe-popup-box2 .info-contents {
            width: 60%;
            position: relative;
            padding-left: 25px;
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
        
        /*SHARED DOCUMENT STYLE*/
        .select-file {
            display: flex;
            align-items: center;
            position: relative;
            justify-content: center;
        }
        .select-file input[type="file"] {
            display: none;
        }
        .select-file label {
            display: flex;
            width: 100%;
            justify-content: center;
            background-color: <?php echo $color_bg; ?>;
            border-radius: 2px;
            height: 100%;
            align-items: center;
            color: #ffffff;
            font-weight: 500;
            font-size: 12px;
        }
        .select-file label img {
            margin-right: 5px;
        }
        
        .miynPopUpFormError {
            color: #f00f00;
            /*font-weight: 100;*/
            font-size: 10px;
            padding-top: 4px;
        }
        .form-field select {
        	border: 1px solid #E9E9E9;
        	background-color: #ffffff;
        	border-radius: 2px;
        	color: #8A8A8A;
        	font-size: 12px;
            padding: 9px 10px 9px;
        	max-width: 100%;
        	width: 100%;
        	display: block;
        	box-sizing: border-box;
        	font-family: 'Poppins', sans-serif;
        	padding-left: 6px;
        }
        
        .submit-button button {
        	display: inline-block;
        	background-color: <?php echo $color_bg; ?>;
        	border-radius: 2px;
        	color: #ffffff;
        	font-size: 12px;
        	line-height: 35px;
        	min-width: 100px;
        	text-align: center;
        	font-weight: 500;
        	border: 0;
        	font-family: 'Poppins', sans-serif;
        	cursor: pointer;
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

        /*NEW POPUP STYLE 1 RESPONSIVE STYLE*/
        .responsive-device-top-panel {
            display: none;
        } 
        .responsive-device-top-panel-logo {
            width: 50px;
            height: auto;
        }
        .responsive-device-top-panel-logo img {
            width: 100%;
            height: auto;
        }
        .responsive-device-business-name label {
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            color: #ffffff;
        }

        .miynPopUpFormError {
            border: 1px solid red !important;
        }

        label.miynPopUpFormError {
            display: none !important;
            /* width: 100%; */
        }

        @media only screen and (max-width: 767px) {
            /*ASHAD RESPONSIVE CODE 23-04-21*/
            html.responsive-active, .responsive-active body {
                position: relative;
                width: 100%;
                height: 100%;
                margin: 0;
                overflow-y: hidden;
            }
            .responsive-active .responsive-device-top-panel {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                position: sticky;
                left: 0;
                top: 0;
                width: calc(100% - 30px);
                align-items: center;
                gap: 20px;
                padding: 15px;
            } 
            .responsive-active .miyn-iframe-popup-box2 {
                height: calc(100% - 80px);
                padding-bottom: 80px;
                overflow-y: auto;
                box-sizing: border-box;
            }
            /*ASHAD RESPONSIVE CODE FOR SUBMIT DETAILS 23-04-21*/
            .responsive-active .miyn-iframe-popup-box2 .submit-button {
                margin-top: 0;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                background-color: #ffffff;
            }
            .responsive-active .miyn-iframe-popup-box2 .submit-button button {
                width: 100%;
                padding: 10px 15px;
                box-sizing: border-box;
            }
            .responsive-active .miyn-appointment-success-area.miyn-iframe-popup-box2 {
                height: 100%;
                padding-bottom: 0;
            }
        }
        
	</style>
</head>
<body class="loader">
    <div class="responsive-device-top-panel" style="background-color: <?php echo ($color_bg) ? $color_bg : '#F5F5F5'; ?>">
        <div class="responsive-device-top-panel-logo">
            <img src="https://app.miyn.app/images/widget_image/<?php echo $widget_image; ?>" alt="businesss name"/>
        </div>
        <div class="responsive-device-business-name">
            <label><?php echo $allbusinessinfo->business_name; ?></label>
        </div>
    </div>
  
    <div id="appointment-shared-document" class="miyn-appointment-shared-document-area miyn-iframe-popup-box2">
    	<div class="appointment-submit-details-content">
    	    
    	    <form id="sendShareDocumentData" method="post" enctype="multipart/form-data">
		        {!! csrf_field() !!}
    		    <div class="miyn-appointment-submit-details-contents">
        			<h3>Share Document</h3>
        			<div class="document-details-form">
        				<div class="two-col-field file-field">
        					<div class="form-field select-file">
        					    <label for="client_file"><img src="{{asset('miyn-widget-4/images/attachment-icon.png')}}" alt="">Select File</label>
        						<input type="file" name="client_file" id="client_file"  placeholder="File" />
    					        <input type="hidden" name="business_uid" id="business_uid" value="{{ $uid }}" placeholder="" >
        					</div>
        					<div class="form-field">
        						<input type="text" name="client_document" id="client_document" placeholder="Document Title*" />
        						<span class="client_document_error"></span>
        					</div>
        				</div>
        				<div class=" file-field">
        				   <code id="selected_filename"> </code>
        				</div>
        				<div class="form-field">
        					<textarea name="client_message" id="client_message" placeholder="Message*"></textarea>
        				</div>
        			</div>
        			<h3>Contact informations</h3>
        			<div class="appintment-submit-detail-form">
        				<div class="two-col-field">
        					<div class="form-field">
        						<input type="text" name="c_first_name" id="c_first_name" placeholder="First Name*" value="<?php echo $client_live_info->firstname ?? ''; ?>" /> 
    					    <span class="c_first_name_error"></span>
        					</div>
        					<div class="form-field">
        						<input type="text" name="c_last_name" id="c_last_name"  placeholder="Last Name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" /> 
    					    <span class="c_last_name_error"></span>
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
    					<span class="c_email_error"></span>
        				</div>
        				<div class="two-col-field country-field">
        					<div class="form-field">
        						<select id="client_country_id" name="client_country_id" class="fstdropdown-select  field-divided"  >
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
                                <option value="{{$value->id}}" data-selectedzoneid="{{$value->id}}" data-selectedzonename="{{$value->timezone_name}}" <?php echo $selected; ?> >{{$value->country_name}} ({{$value->country_code}})</option>
                                @endforeach
                            </select>
        					</div>
        					<div class="form-field">
        						<input type="text" name="c_phone" id="c_phone" class="field-divided" placeholder="Phone*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
                            <span class="phone_error"></span>
        					</div>
        				</div>
        				<div class="submit-button">
        				    <button type="submit" id="changeSubmit">Submit</button>
        					<!--<a href="#appointment-success" class="appointment-show">Submit</a>-->
        				</div>
        			</div>
        		</div>
    		</form>
    		
    	</div>
    </div>
    <div id="appointment-success" class="miyn-appointment-success-area miyn-iframe-popup-box2">
    	<div class="appointment-success-content">
    		<div class="appointments-icon">
    			<img src="{{ asset('miyn-widget-4/images/success-icon.png') }}" alt="success-icon.png"/>
    		</div>
    		<div class="appointments-messages">
    			<h3>Your booking request was sent</h3>
    			<p>You will receive an email once admin, confirm your booking</p>
    			<p><strong>Thanks for your booking, Looking forward to meeting you!</strong></p>
    		</div>
    		<div class="appointments-information">
    			<ul>
    				<li>
    					<div class="info-title">Service Name</div>
    					<div class="info-contents">In-office appointment </div>
    				</li>
    				<li>
    					<div class="info-title">Your Meeting with</div>
    					<div class="info-contents">Jesse Pigdon</div>
    				</li>
    				<li>
    					<div class="info-title">Date</div>
    					<div class="info-contents">
    						<ul>
    							<li>Jan 16, 12:15 PM</li>
    							<li>Jan 16, 3.45 PM</li>
    							<li>Jan 16, 7.00 PM</li>
    						</ul>
    					</div>
    				</li>
    			</ul>
    		</div>
    		<div class="appointment-success-actions">
    			<a href="#appointment-lists">Book another</a>
    			<a href="#">Manage Booking</a>
    		</div>
    	</div>
    </div>
    
    
    
    <script src="{{asset('miyn-widget-4/js/jquery.min.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery-ui.js')}}"></script>
    <script src="{{asset('miyn-widget-4/js/jquery.validate.min.js')}}"></script>
    
    <script type="text/javascript">

        function validateError(fieldid) {
            var er = 0;

            var field = $('[id='+fieldid+']');
            var fieldval = field.val();

            if(fieldval === ''){
                field.addClass('error');
                er = 1;
            }else{
                er = 0;
                field.removeClass('error');
            }

            return er;
        }



    	$(document).ready(function(){
    		$(document).on('click', '.miyn-iframe-popup-box2 a', function(){
    			$('.miyn-widget-popup-button').hide();
    			var popupLink = $(this).attr('href');
    			var popID = popupLink.replace( '#', '' );
    
    			if(popupLink.startsWith('#') && (popID != '')) {
    				if(popID != 'close') {
    					$('.miyn-iframe-popup-box2').hide();
    					if($('#'+popID).css('display') == 'none'){
    						$('#'+popID).fadeIn();
    						$('.miyn-widget-popup-close-button').show();
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
    
    		$('.schedule-calendar-area .calendar').datepicker();
    
    		$(document).on('click', '.schedule-available-time .schedule-time', function(){
    			var countTime = $('.schedule-time.active').length + 1;
    			if($(this).hasClass('active')){
    				$(this).removeClass('active');
    			} else {
    				if(countTime > 3) {
    					alert('Can not select time more than 3.');
    				} else {
    					$(this).addClass('active');
    				}
    			}
    		});

    		$('.schedule-times-nav .previous').on('click', function(){
    		    var $last = $('.schedule-time-row:last');
    		    $last.remove().css({ 'margin-left': '-100px' });
    		    $('.schedule-time-row:first').before($last);
    		    $last.animate({ 'margin-left': '0px' }, 1000);
    		});
    
    		$('.schedule-times-nav .next').on('click', function(){
    		    var $first = $('.schedule-time-row:first');
    		    $first.animate({ 'margin-left': '-100px' }, 1000, function() {
    		        $first.remove().css({ 'margin-left': '0px' });
    		        $('.schedule-time-row:last').after($first);
    		    });
    		});
    
    		$(document).on('click', '.miyn-popup-close-button', function(e) {
    		    e.preventDefault();
    			$('#miyn_iframe_box').fadeOut();
    		    $('.miyn-widget-popup-button').fadeIn();
    			$('.miyn-widget-popup-close-button').fadeOut();
    		});
    		
    		
    $('#client_country_id option').filter(function() { 
        return ($(this).attr('data-selectedzonename') == Intl.DateTimeFormat().resolvedOptions().timeZone); //To select Blue
    }).prop('selected', true);		
    		
    // 		iframeHeight();
    
    $('form[id="sendShareDocumentData"]').validate({
        errorClass: "miynPopUpFormError",
          validClass: "valid",
          highlight: function( element, errorClass, validClass ) {
            $(element).addClass(errorClass).removeClass(validClass);
          },
          unhighlight: function( element, errorClass, validClass ) {
            $(element).removeClass(errorClass).addClass(validClass);
          },
        rules: {
            client_document: 'required',
            client_message: 'required',
            c_first_name: 'required',
            c_last_name: 'required',
            c_phone: 'required',
            //c_note: 'required',
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
            /*client_document: '',
            client_message: '',
            c_first_name: '',
            c_last_name: '',
            c_phone: '',
            //c_note: 'required',
            c_email: {
              required: "",
              email: ""
            },
            client_country_id: '',*/
        
        },
        submitHandler: function(form) {
           				
    		
            var form = $(form)[0]; // You need to use standard javascript object here
    		var fd = new FormData(form);
    		
    		var file_data = $('#client_file')[0].files[0];
    		if(file_data !="") {
    		    //console.log(file_data);
    			fd.append("client_file", file_data);
    			
    			
    		}
    		
    		var timezone_name = $('#client_country_id option:selected').attr('data-selectedzonename');
            fd.append("timezone_name", timezone_name);
    		//console.log(fd);
    
            //$('#changeSubmit').text('Sending..');
            $("#changeSubmit").attr("disabled", true);
            
            //return false;
            console.log('{{config('app.live_url')}}/add-new-share-document-form-data');
            
            $.ajax({
                type: 'post',
                url:'{{config('app.live_url')}}/add-new-share-document-form-data',
                data:fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    //console.log(data);
                    $('#changeSubmit').val('Submit');
                    $("#sendShareDocumentData")[0].reset();
                    //$('.appointment-show').trigger('click');
                    //console.log('success');
                    
                    var html = "";
                        html += '<div class="appointment-success-content">';
    					    html += '<div class="appointments-icon">';
    					        html += '<img src=" {{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
    					    html += '</div>';
    					    
    					    html += '<div class="appointments-messages">';
    					        html += '<h3>YOUR DOCUMENT SENT SUCCESSFULLY.</h3>';
    					        html += '<p>You will receive an email once admin, contact you</p>';
    					        html += '<p><strong>Thanks for your message, Looking forward to meeting you!</strong></p>';
    					    html += '</div>';
    					    
    					    /*html += '<div class="appointment-success-actions">';
    					        html +='<a href="#appointment-lists">Book another</a>';
    					        html +='<a href="#">Manage Booking</a>';
    					    html += '</div>';*/
    						
    				    html += '</div>';
                    
                    $("#appointment-shared-document").html(html);
                    
                }
            });
      }
    });
    
    	});
    	
    	
    	
    

    	
    // 	$(window).resize(function(){
    // 	    iframeHeight();
    // 	});
    // 	function iframeHeight(){
    // 	    var conHeight = $(window).height();
    // 	}
    </script>
    
    
    <script type="text/javascript">
    
    function lawyerLpcUpload(){

        $("input[id='client_file']").focus().click();
        
        $("#client_file").change(function() {
            showLPCFile(this);
            
            //var bodyFormData = new FormData()
            if($("#client_file")[0].files.length>0){

                //bodyFormData.append("upload_lawyer_profile_image",$("#upload_lawyer_profile_image")[0].files[0]);
                showLPCFile(this);

            }
     
         });
        
    }
    
    function showLPCFile(input) {
      if (input.files && input.files[0]) {
          
          var extension = input.files[0].name.substr(input.files[0].name.lastIndexOf('.') + 1).toLowerCase();
              var allowedExtensions = ['png', 'jpeg', 'jpg', '.PNG', '.JPG', '.txt', '.doc', '.pdf', 'xls', 'xls'];
              console.log(input.files[0].name);
              
             if (allowedExtensions.indexOf(extension) === -1) 
             {
                       tla_message_box("tla-error", "Please upload valid file !", 5000);
                       return false;
             } 
             
          if(input.files[0].size > 2000000) {
               //alert("Please upload file less than 2MB. Thanks!!");
              //tla_message_box("tla-error", "Please upload file less than 2MB. Thanks !", 5000);
               $(this).val('');
           } else {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $('#selected_filename').html(input.files[0].name);
                }
                reader.readAsDataURL(input.files[0]);
           }
        
      }
    }
    </script>
    
        
<script type="text/javascript">
//$(".loader").fadeIn("slow");
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


function receiveMessageFromIndex ( event ) {
    //console.log( { height: parseInt($("body").height()) } , event )
    parent.postMessage({ height: parseInt($("body").height()) },"*");
}

//Listen for message events
window.addEventListener("message", receiveMessageFromIndex, false);

</script>
    
</body>
</html>