
<?php
    //dd('-----'); 
    $color_bg = $allbusinessinfo['livestyle'][0]->action_background_color;
    $widget_image   =   $allbusinessinfo['livestyle'][0]->label_partial_image;
    
    $ticker = file_get_contents(config('app.api_url')."/api/schedule/".$uid);
    //dd($ticker);  
    $obj = json_decode($ticker,true); // Split the JSON into arrays.
    
    //dd($obj);
    
    
    
    /*foreach($obj as $value){
        echo  $value['id'].'<br>';
        echo  $value['service_category_name'].'<br>';
        foreach($value['service'] as $val){
            echo $val['id'].'<br>';
            echo $val['service_name'].'<br>';
            echo $val['service_name'].'<br>';
        }
    }*/
    
   //dd('-----'); 

?>



<!DOCTYPE html>
<html class="miyn-popup-load">
<head>
	<title>MIYN Widget</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('miyn-widget-4/css/jquery-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('miyn-widget-4/css/all.min.css') }}" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
        .miyn-iframe-popup-box2:not(.miyn-popup-appointment-area) {
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
			display:none!important;
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
        	border-color: <?php echo $color_bg; ?>;
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
            background-color: <?php echo $color_bg; ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
        }
        .form-field select {
            border: 1px solid #E9E9E9;
            background-color: #ffffff;
            border-radius: 2px;
            color: rgba(138, 138, 138, 1);
            font-size: 12px;
            padding: 9px 10px 9px;
            max-width: 100%;
            width: 100%;
            display: block;
            font-family: 'Poppins', sans-serif;
            padding-left: 6px;
        }
        .submit-button button {
            background-color: <?php echo $color_bg; ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
            border: none;
            cursor: pointer;
            margin-right: 10px;
            font-family: 'Poppins', sans-serif;
        }
        /*GET A QUOTE STYLE*/
        .miyn-appointment-get-quote-area .miyn-appointment-submit-details-contents h3 {
            color: #0E1130;
            font-size: 14px;
        }
        .miyn-appointment-get-quote-area .appointment-submit-details-content {
            background-color: transparent;
        }
        .miyn-iframe-popup-box2.miyn-appointment-get-quote-area .form-field input, .miyn-iframe-popup-box2.miyn-appointment-get-quote-area .form-field textarea {
            border: 1px solid #E9E9E9;
            background-color: #ffffff;
            border-radius: 2px;
            font-family: 'Poppins', sans-serif;
        }
        
        
        
        /*SUCCESS POPUP STYLE*/
        .miyn-iframe-popup-box2 .appointment-success-content {
            background-color: #ffffff;
            border-radius: 10px 10px 0 0;
            padding: 30px 20px 50px;
            max-width: 500px;
            margin: 30px auto;
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
        	width: 50%;
        }
        .miyn-iframe-popup-box2 .info-contents {
            width: 50%;
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
        
        .miynPopUpFormError {
            border:1px solid red !important;
        }

        label.miynPopUpFormError {
        	display: none !important;
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
        .responsive-active .responsive-device-top-panel-logo {
            width: 50px;
            height: auto;
        }
        .responsive-active .responsive-device-top-panel-logo img {
            width: 100%;
            height: auto;
        }
        .responsive-active .responsive-device-business-name label {
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
            color: #ffffff;
        }
        @media only screen and (max-width: 767px) {
            /*ASHAD RESPONSIVE CODE 23-04-21*/
            html.miyn-popup-load.responsive-active, .miyn-popup-load.responsive-active body {
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
            .responsive-active .miyn-popup-appointment-area.miyn-iframe-popup-box2 {
                height: 100%;
                padding-bottom: 0;
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
                display: flex;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                align-items: center;
                justify-content: space-between;
                gap: 10px;
            }
           /* .miyn-iframe-popup-box2 .submit-button button {
                width: 100%;
                padding: 10px 15px;
                box-sizing: border-box;
            }*/
            .responsive-active .miyn-iframe-popup-box2 .submit-button button, 
            .responsive-active .miyn-iframe-popup-box2 .submit-button a {
                width: 50%;
                padding: 10px;
                margin: 0;
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
    
    <div id="appointment-lists" class="miyn-popup-appointment-area miyn-iframe-popup-box2">
        
    	<div class="appointment-list-area">
    	    @foreach($obj as $value)
    	        <?php //dd($value);  ?>
	            <div class="service-cat">
	                <span>{{ $value['service_category_name'] }}</span>
	            </div>
		        <ul>
		            @foreach($value['service'] as $val)
        			<li>
        				<a href="#appointment-get-quote" onClick="getServiceId({{ $val['id'] }})">
        					<div class="appointment-icon">
        						<img src="{{ asset('miyn-widget-4/images/call-us-icon.png') }}" alt="call-us-icon.png"/>
        					</div>
        					<div class="appointment-content">
        						<h3>{{ $val['service_name'] }}</h3>
        						<p>{{ $val['service_description'] }}</p>
        						<div class="payment-duration">
        							<ul>
        								<li><span>
        								    @if($val['service_price'] == '0')
    								            {{ 'Free'}}
    								            @else
    								                ${{ $val['service_price'] }} {{ $val['service_currency'] }}
        								    @endif
        								</span></li>
        								
        								<li><i class="far fa-clock"></i><span> {{ $val['sevice_time_h'] }} {{ $val['sevice_time_h_title'] }} {{ $val['sevice_time_m'] }} {{ $val['sevice_time_m_title'] }}</span></li>	
        							</ul>
        						</div>
        					</div>
        				</a>
        			</li>
        			@endforeach
        		</ul>
    		    
    		@endforeach
    	</div>
    	
    </div>
    
    
    <div id="appointment-get-quote" class="miyn-appointment-get-quote-area miyn-iframe-popup-box2">
    	<div class="appointment-submit-details-content">
    		<div class="miyn-appointment-submit-details-contents">
    			<h3>Get A Quote</h3>
    			
    			<form id="submitQuoteformData">
                    {!! csrf_field() !!}
                    
        			<div class="appintment-submit-detail-form">
        				<div class="two-col-field">
        					<div class="form-field">
        						<input type="text"  name="c_first_name" id="c_first_name" placeholder="First Name*" value="<?php echo $client_live_info->firstname ?? ''; ?>" />
        					    <input type="hidden" name="b_id" id="b_id" value="{{ $allbusinessinfo->id }}">
        					</div>
        					<div class="form-field">
        						<input type="text"  name="c_last_name" id="c_last_name" placeholder="Last Name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" />
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
        						<select id="client_country_id" name="client_country_id" class="fstdropdown-select">
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
                                    <option value="{{$value->id}}" <?php echo $selected; ?> data-selectedzoneid="{{$value->id}}" data-selectedzonename="{{$value->timezone_name}}"  >{{$value->country_name}} ({{$value->country_code}})</option>
                                    @endforeach
                                </select>
        					</div>
        					<div class="form-field">
        						<input type="text" name="c_phone" id="c_phone" placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
        					</div>
        				</div>
        				<div class="form-field">
        					<textarea name="c_note" id="c_note" placeholder="Message"></textarea>
        				</div>
        				<div class="submit-button">
        				    <button type="submit" id="changeSubmit">Submit</button>
        				    <a href="#appointment-lists">Back</a>
        				    <!-- <a href="#appointment-success" class="appointment-show"></a> -->
        				</div>
        			</div>
        		</form>
    		</div>
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
    
    <div class="loader"></div>
    
    <script src="{{ asset('miyn-widget-4/js/jquery.min.js') }}"></script>
    <script src="{{ asset('miyn-widget-4/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('miyn-widget-4/js/jquery.validate.min.js')}}"></script>
    
    <script type="text/javascript">
    
        var service_id = '';
        var widghtid = '';
        
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
    		
    		$(document).on('click', '.miyn-popup-close-button', function(e) {
    		    e.preventDefault();
    			$('#miyn_iframe_box').fadeOut();
    		    $('.miyn-widget-popup-button').fadeIn();
    			$('.miyn-widget-popup-close-button').fadeOut();
    		});
    		
    
    	});
    	
    	function getServiceId(val){
    	    //alert(val);
    	    widghtid = val;
    	    //console.log(widghtid);
    	    //console.log(Intl.DateTimeFormat().resolvedOptions().timeZone);
    	}
    	
    	$('#client_country_id option').filter(function() { 
            return ($(this).attr('data-selectedzonename') == Intl.DateTimeFormat().resolvedOptions().timeZone); //To select Blue
        }).prop('selected', true);
    	
    	$('form[id="submitQuoteformData"]').validate({
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
                }
            },
            messages: {
                /*c_first_name: 'required',
                c_last_name: 'required',
                c_phone: 'required',
                c_note: 'required',
                c_email: {
                  required: "required",
                  email: "Ex.name@email.com"
                },
                client_country_id: 'required',*/
            
            },
            submitHandler: function(form) {
               
                //console.log('dateWiseTimes : '+dateWiseTimes)
                //console.log('staffid : '+staffid)
                //console.log('widghtid : '+widghtid)
                $("#changeSubmit").attr("disabled", true);
                //$("#cancelback").hide();
                
                //var b_id = 19;
                //var widghtid = 42;
                //console.log('widget id');
                //console.log(widghtid);
                var staffid  = 0;
                
                var timezone_name = $('#client_country_id option:selected').attr('data-selectedzonename');
                //console.log(timezone_name);
                //return false;
    
                var forms = $(form)[0]; // You need to use standard javascript object here
                var fd = new FormData(forms);
                fd.append("widghtid", widghtid);
                fd.append("staffid", staffid);
                fd.append("timezone_name", timezone_name);
                //fd.append("b_id", b_id);
                //console.log(fd);
                //console.log('data inserting...');
                //return false;
                
                //console.log('aaaa');
                //console.log(fd);
               
                $.ajax({
                    type: 'post',
                    url:'{{config('app.live_url')}}/new-quote',
                    data:fd,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        //console.log(data);
                        $('#changeSubmit').val('Submit');
                        $('#submitQuoteformData')[0].reset();
                        //$('.appointment-show').trigger('click');
                        //console.log('success');
                        
                        //$(this).reset();
                        
                        var html = "";
                            html += '<div class="appointment-success-content">';
        					    html += '<div class="appointments-icon">';
        					        html += '<img src="{{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
        					    html += '</div>';
        					    
        					    html += '<div class="appointments-messages">';
        					        html += '<h3>'+data.quote_form_success+'</h3>';
        					        html += '<p style="text-align:left;">Please allow up to 24 hours for your Quote or further contact from us.</p>';
        					        html += '<p style="text-align:left;"><strong>We appreciate the opportunity and look forward to meeting you soon!</strong></p>';
        					    html += '</div>';
        					    
        					    html += '<div class="appointments-information">';
                                    html += '<div class="info-title">Very best,</div>';
                                    html += '<div class="info-title">Team '+data.business_name+'</div>';
        					        /*html += '<ul>';
        					            html +='<li>';
        					                html += '<div class="info-title">Very best,</div>';
        					                html += '<div class="info-title">Team '+data.business_name+'</div>';
                                            html += '<div class="info-contents">'+data.service_name+'</div>';
        					            html +='</li>';
        					        html += '</ul>';*/
        					    html += '</div>';
        					    
        					    
        					   /* html += '<div class="appointment-success-actions">';
        					        html +='<a href="#appointment-lists">Book another</a>';
        					        html +='<a href="#">Manage Booking</a>';
        					    html += '</div>';*/
        						
        				    html += '</div>';
                        
                        $("#appointment-get-quote").html(html);
                        
                    }
                });
            }
        });
    	
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

function receiveMessageFromIndex ( event ) {
    //console.log( { height: parseInt($("body").height()) } , event )
    parent.postMessage({ height: parseInt($("body").height()) },"*");
}

//Listen for message events
window.addEventListener("message", receiveMessageFromIndex, false);

</script>
    
</body>
</html>