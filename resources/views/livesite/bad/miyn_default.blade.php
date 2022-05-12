<?php
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;
?>
<!DOCTYPE html>
<html>
<head>
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    
    <link rel="shortcut icon" href="{{config('app.apps_url')}}/app/images/favicon.ico" type="image/x-icon"/>    
    <link rel="apple-touch-icon" href="{{config('app.apps_url')}}/app/images/favicon.ico">
    
	<title><?php echo $allbusinessinfo->business_name; ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
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
		    background-color: #FBFBFB;
		    overflow-x: hidden;
		}
		.container-wrapper {
		    max-width: 1170px;
		    margin: 0 auto;
		    padding: 0 15px;
		}
		.portal-banner {
		    position: relative;
		    background-image: url(<?php echo $appurl; ?>/images/business_bg/<?php echo ($allbusinessinfo->background_image) ? $allbusinessinfo->background_image : 'banner-bg742834115.png'; ?>);
		    background-repeat: no-repeat;
		    /*background-position: center center;*/
		    background-size: cover;
		    z-index: 1;
		    padding-top: 220px;
		}
		.portal-banner::after {
		    content: "";
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(253, 253, 253, 0.30);
		    z-index: -1;
		}
		.heading-area {
		    background-color: #ffffff;
		}
		.heading-content {
		    display: flex;
		    flex-flow: wrap row;
		}
		.logo-area {
		    width: 150px;
		}
        .logo {
        	width: 150px;
        	height: 150px;
        	margin: 0 auto;
        	margin-top: -55px;
        	border: 5px solid #ffffff;
        	border-radius: 100%;
        	position: relative;
        	top: 5px;
        	background-color: #F5F5F5;
        	overflow: hidden;
        	background-repeat: no-repeat;
        	background-size: cover;
        	background-position: center;
        }
		.logo img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /*width: 80px;*/
            height: auto;
        }
		.heading-title {
		    width: calc(100% - 185px);
		    align-self: center;
		    padding-left: 35px;
		}
		.heading-title h2 {
		    font-family: 'Poppins', sans-serif;
		    font-size: 25px;
		    color: #454545;
		    font-weight: 600;
		}
		.heading-title h3 {
            color: #777;
            line-height: 20px;
            font-size: 15px;
            font-weight: 500;
		}
		.main-content-area {
		    margin-top: 30px;
		    position: relative;
		}
		.content-area {
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		}
		.portal-sidebar {
		    width: 30%;
		}
		.sidebar-item {
		    background-color: #FFFFFF;
		    padding: 20px;
		    margin-bottom: 30px;
		}
		.sidebar-item h3 {
		    font-family: 'Poppins', sans-serif;
		    color: #555555;
		    font-size: 16px;
		    font-weight: 600;
		    padding-bottom: 25px;
		    border-bottom: 1px solid #EEEEEE;
		    margin: 0 0 25px;
		    text-transform: uppercase;
		}
		.my-account-block {
            display: flex;
        }
        .my-account-block > div {
            width: 50%;
        }
        .my-account-block .sidebar-item-content {
            width: 60%;
        }
		.sidebar-item.my-account-block p {
		    font-family: 'Poppins', sans-serif;
            text-align: left;
        }
        .my-account-block .my-account-button {
		    font-family: 'Poppins', sans-serif;
            text-align: center;
            align-self: center;
            padding: 0 0 0 10px;
            width: calc(50% - 10px);
        }
		.sidebar-item.my-account-block h3 {
		    font-family: 'Poppins', sans-serif;
		    color: #555555;
		    font-size: 16px;
		    font-weight: 600;
		    padding-bottom: 0;
		    border-bottom: 0;
		    margin: 0;
		    text-transform: uppercase;
		}
		.my-account-button a {
		    font-family: 'Poppins', sans-serif;
            display: block;
            line-height: 40px;
            background-color: <?php echo $color_bg; ?>;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
        }
        .my-account-button a:hover{
            background-color: #A0A6AB;
            color: #ffffff;
        }
		.sidebar-item-content p {
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    font-size: 14px;
		    color: #6E6E6E;
		    line-height: 1.5;
		    text-align: justify;
		}
		.sidebar-gallery {
		    margin-top: 25px;
		}
		.sidebar-gallery img {
		   width:100%;
		}
		.sidebar-item-content ul {
		    list-style: none;
		    position: relative;
		}
		.sidebar-item-content ul li {
		    padding-left: 50px;
		    position: relative;
		}
		.sidebar-item-content ul li:not(:first-child) {
            margin-top: 25px;
        }
		.sidebar-item-content ul li span {
            background-color: <?php echo $color_bg; ?>;
            position: absolute;
            display: inline-block;
            top: -8px;
            left: 0;
            width: 32px;
            text-align: center;
            height: 32px;
            line-height: 32px;
            vertical-align: middle;
        }
		.sidebar-item-content ul li:not(:first-child) {
		    margin-top: 20px;
		}
		.sidebar-item-content ul li img {
		    width: 17px;
            height: auto;
            display: inline-block;
            vertical-align: middle;
		}
		.social-links {
		    margin-top: 20px;
		}
		.social-links p {
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    color: #6E6E6E;
		    font-size: 10px;
		}
		.sidebar-item-content ul li, .sidebar-item ul li a {
		    font-family: 'Poppins', sans-serif;
		    font-size: 14px;
		    color: #6E6E6E;
		    text-decoration: none;
		}
		.sidebar-item-content ul li a {
		    display: inline-block;
		    vertical-align: middle;
		}
		.social-profile {
		    margin-top: 10px;
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		}
		.social-profile a {
		    width: calc(33% - 20px);
		    text-align: center;
		    display: inline-block;
		    vertical-align: top;
		    min-width: 75px;
		    font-size: 10px;
		    color: #9F9F9F;
		    text-decoration: none;
		    padding: 8px 5px;
		    background-color: #FBFBFB;
		    border: 1px solid #E8E8E8;
		    border-radius: 30px;
		    margin-bottom: 10px;
		}
		.social-profile a i {
		    color: <?php echo $color_bg; ?>;
		    margin-right: 5px;
		    font-size: 12px;
		}
		.social-profile a:hover {
		    background-color: <?php echo $color_bg; ?>;
		    color: #ffffff;
		    border-color: <?php echo $color_bg; ?>;
		}
		.social-profile a:hover i{
			color: #ffffff;
		}
		.sidebar-item.tags {
		    background-color: transparent;
		    text-align: center;
		}
		.sidebar-item.tags a {
		    min-width: 75px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            font-size: 10px;
            color: #9F9F9F;
            text-decoration: none;
            padding: 8px 5px;
            background-color: #ffffff;
            border: 1px solid #E8E8E8;
            border-radius: 30px;
            width: calc(24% - 10px);
            margin: 0 5px 10px;
		}
		.sidebar-item.tags a:hover {
		    background-color: <?php echo $color_bg; ?>;
		    color: #ffffff;
		    border-color: <?php echo $color_bg; ?>;
		}
		.portal-contents {
			position: relative;
			left: 0;
		    width: calc(70% - 30px);
		    display: flex;
		    flex-flow: wrap row;
		    justify-content: space-between;
		    transition: all 0.3s ease 0s;
		}
		.content-item {
		    width: calc(50% - 55px);
		    background-color: #ffffff;
		    padding: 20px;
		    text-align: center;
		    margin-bottom: 30px;
		    position: relative;
            transition: all 0.3s ease 0s;
            top: 0;
		}
		.content-item:hover {
            box-shadow: 0 0 15px 0px rgba(0,0,0,0.1);
            transition: all 0.3s ease 0s;
            top: -3px;
        }
        .content-item .icon {
            display: inline-block;
            position: absolute;
            left: 25px;
            top: 25px;
            width: 60px;
            height: 60px;
            line-height: 60px;
            background-color: #5a5a5a;
            text-align: center;
        }
        .content-item .icon img {
            display: inline-block;
            vertical-align: middle;
            width: 28px;
            height: auto;
        }
		.content-item.two-column .icon {
            position: relative;
            top: initial;
            left: initial;
            margin: 10px 0;
        }
		.content-item h3 {
		    font-family: 'Poppins', sans-serif;
		    text-transform: uppercase;
		    font-size: 16px;
		    font-weight: 600;
		    color: #555555;
		    margin: 7px 0 10px;
		}
		.content-item p { 
		    font-family: 'Poppins', sans-serif;
		    margin: 0;
		    font-size: 14px;
		    color: #6E6E6E;
		    line-height: 1.6;
		}
		
		.content-item .content-link a {
        	color: #fff;
        	background-color: <?php echo $color_bg; ?>;
        	line-height: 35px;
        	padding: 0 20px;
        	display: inline-block;
        }
        
        .content-item .content-link {
        	padding-top: 23px;
        }
		
		
		/*.content-link {
		    padding-top: 25px;
		    border-top: 1px solid #EFEFEF;
		}*/
		/*.content-link a{
		    font-family: 'Poppins', sans-serif;
		    font-size: 13px;
			display: inline-block;
			vertical-align: top;
			color: <?php echo $color_bg; ?>;
			font-weight: 600;
			text-decoration: none;
			text-transform: uppercase;
			display:block;
		}*/
		.content-link a:hover {
            background-color: #A0A6AB;
            color: #ffffff;
        }
		.content-item.one-column {
		    width: 100%;
		    position: relative;
		    padding-left: 110px;
		    text-align: left;
		    padding-bottom: 100px;
		}
		.content-item.one-column img.iconimg {
		    margin: 0;
		    position: absolute;
		    left: 30px;
		    top: 25px;
		}
		.content-item.one-column .content-link {
            padding-top: 25px;
            border-top: 0;
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }
        .content-item.one-column .content-link::after {
            content: "";
            position: absolute;
            top: 0;
            left: 90px;
            right: 0;
            border-top: 1px solid #EFEFEF;
        }
		.content-item.one-column.get-direction {
		    padding: 20px;
		    display: flex;
		    flex-flow: wrap row;
		}
		.content-item-icon {
		    width: 100px;
		    text-align: center;
		}
		.content-item.one-column.get-direction img {
		    position: relative;
		    top: 0;
		    left: 0;
		}
		.content-item-details {
		    width: calc(100% - 120px);
		    padding-left: 20px;
		}
		.map-image {
		    width: 100%;
		    margin-top: 35px;
		}
		
		.about-image {
		    width: 100%;
		    margin-top: 25px;
		}
		
		.map-image img{
			width: 100%;
		}
		.content-item.two-column {
            padding-bottom: 100px;
        }
        .content-item.two-column .content-link {
            position: absolute;
            bottom: 25px;
            left: 20px;
            right: 20px;
        }
        
        .miyngreeting, .miyngooglemap {
            margin-left: 90px;
        }
        
        		
        .account_left p {
            margin-top: 1px;
            font-family: poppins;
            font-size: 14px;
            color: #6E6E6E;
        }	
                
        		
        .account_left, .account_right {
            float: none !important;
            margin-bottom: -1px;
            padding: 6px 0 0;
        }
        
        .account_left {
            margin-right: 68px;
        }
        
        .sidebar-item {
            clear: both;
        }
        
        .sidebar-item .account_right a {
            width: 26%;
            position: absolute;
            right: 20px;
            float: right;
            margin-top: -62px;
            background: <?php echo $color_bg; ?>;
            color: #fff;
            padding: 11px 12px 10px 24px;
            top: 84px;
        }
        
        .account_right a {
            text-decoration: none;
        }
        
        .sidebar-item .account_right a {
            width: 48%;
            margin-left: 0;
            float: right;
            margin-top: -62px;
        }
        
        .account_left p {
            margin-top: 1px;
        }
        
        .sidebar-item .account_right a:hover {
            color: #fff;
        }
         	
        .portal-sidebar {
            position: relative;
        }
        
        .account_left, .account_right {
            float: none !important;
        }
        .sidebar-item .account_right a {
            width: 27%;
            position: absolute;
            right: 8px;
            float: right;
            margin-top: -62px;
            background: <?php echo $color_bg; ?>;
            color: #fff;
            padding: 13px 12px 13px 27px;
            margin-left: -52px;
            top: 84px;
        }
        .login-block.my-account-block {
            display: none;
        }

        .portal-footer {
        	background-color: <?php echo $color_bg; ?>;
        	padding: 20px 0;
        }
        .client-portal-footer-top .uper {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	gap: 30px;
        	margin-bottom: 10px;
        }
        .client-portal-footer-top .uper a {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: #fff;
            text-decoration: none;
            line-height: 23px; 
        }
        .client-portal-footer-top .bottom {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        }
        .client-portal-footer-top .bottom a {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 400;
            color: #fff;
            text-decoration: none;
            line-height: 23px;
            position: relative;
        }
        .client-portal-footer-top .bottom a::after {
        	content: 'l';
        	margin-left: 15px;
        	margin-right: 15px;
        	color: #fff;
        }
        .client-portal-footer-top .bottom a:last-child::after {
            display: none;
        }
        .client-portal-footer-bottom {
        	padding: 20px 0 0;
        }
        .client-portal-footer-bottom p {
        	margin: 0;
        	text-align: center;
        	font-size: 13px;
        	color: #fff;
        }
        @media screen and (max-width: 1199px){
            .my-account-block {
                flex-flow: wrap row;
            }
            .my-account-block .sidebar-item-content {
                width: 100%;
            }
            .my-account-block .my-account-button {
                padding: 0;
                width: 100%;
                margin-top: 10px;
            }
            .my-account-button a {
                max-width: 200px;
            }
        }
        
        @media screen and (max-width: 991px){
        	.portal-banner {
        	    padding-top: 150px;
        	}
        	.portal-sidebar {
        		width: 100%;
        		order: 2;
        	}
        	.sidebar-item.my-account-block{
        	    display: none;
        	}
        	.portal-contents {
        	    width: 100%;
        		order: 1;
        	}
        	.login-block.my-account-block > div {
                width: 50%;
                margin: 0;
            }
        	.login-block.my-account-block {
                display: flex;
                width: 100%;
                background-color: #ffffff;
                padding: 20px;
                margin-bottom: 20px;
            }
            .login-block.my-account-block .my-account-button {
                text-align: right;
            }
            .my-account-button a {
                max-width: 200px;
                text-align: center;
                display: inline-block;
                width: 100%;
            }
        }
        
        @media screen and (max-width: 575px){
        	.content-item.two-column {
        	    width: 100%;
        	}
        	.heading-title h2 {
        	    font-size: 20px;
        	}
        }
        @media screen and (max-width: 480px){
        	.logo-area {
        	    width: 80px;
        	}
        	.logo {
        	    width: 80px;
        	    height: 80px;
        	}
        	.heading-title {
        	    width: calc(100% - 120px);
                padding: 10px 0 10px 20px;
        	}
        	.heading-title h2 {
        	    font-size: 18px;
        	}
        	.heading-title h3 {
                font-size: 13px;
            }
            .login-block.my-account-block > div {
                width: 100%;
            }
        	.login-block.my-account-block {
                flex-flow: wrap row;
            }
            .my-account-block .sidebar-item-content {
                width: 100%;
            }
            .login-block.my-account-block .my-account-button {
                text-align: left;
                width: 100%;
                padding: 0;
                margin-top: 15px;
            }
        }
        
        
        /* LOADER */
          .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url("{{config('app.cdn_url')}}/images/loader.gif") 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
            
            
            .sidebar-item-content-work-time ul {
                list-style: none;
            }
            .sidebar-item-content-work-time ul li span {
                color: #6E6E6E;
                position: relative;
                display: inline-block;
                line-height: 32px;
            }
            .sidebar-item-content-work-time ul li span:first-child {
                width: 100px;
                color: #333333;
            }
            .sidebar-item-content-work-time ul li span:last-child::after {
                content: ":";
                position: absolute;
                top: 0;
                left: 0;
            }
            .sidebar-item-content-work-time ul li span:last-child {
                padding-left: 10px;
            }


    </style>
	<script type="text/javascript">
	/*	jQuery(document).ready(function(){
			jQuery(document).on('click', '.main-content-area .sidebar-toggler', function(){
				if(jQuery('.portal-sidebar').hasClass('active')){
					jQuery('.portal-sidebar').removeClass('active');
					jQuery('.portal-contents').removeClass('active');
					jQuery('.sidebar-toggler i').replaceWith('<i class="fa fa-angle-double-right"></i>');
				} else {
					jQuery('.portal-sidebar').addClass('active');
					jQuery('.portal-contents').addClass('active');
					jQuery('.sidebar-toggler i').replaceWith('<i class="fa fa-angle-double-left"></i>');
				}
			});
		});
		*/
	</script>
</head>
<body >
    
    <div class="loader"></div>
    
    <div  ng-app="app"  ng-controller="liveSiteCtr" ng-cloak>
    	<div class="portal-banner">
    		<div class="heading-area">
    			<div class="container-wrapper">
    				<div class="heading-content">
    					<div class="logo-area">
    						<div class="logo" style="background-image: url(<?php echo $appurl; ?>/images/business_logo/<?php echo ($allbusinessinfo->logo_image !="") ? $allbusinessinfo->logo_image : 'default_logo.png'; ?>)">
    						    

    						</div>
    					</div>
    					<div class="heading-title">
    						<h2> <?php echo $allbusinessinfo->business_name; ?></h2>
    						<h3> <?php echo $allbusinessinfo->b_address; ?></h3>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="main-content-area">
    		<div class="container-wrapper">
    			<div class="content-area">
    				<div class="portal-sidebar">
    				    <div class="sidebar-item my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Already a client?</h3>
    							<p>Login to your account</p>
    						</div>
							<div class="my-account-button">
								<a href="#" class=" miynacc">My Account</a>
							</div>
    					</div>
    					<?php
    					    if(isset($_COOKIE["user_acc_uid"]) && ($_COOKIE["user_acc_uid"] !="")) {
    					?>
    					<div class="sidebar-item my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Admin Dashboard</h3>
    						</div>
							<div class="my-account-button">
								<a target="_blank" href="{{config('app.apps_url')}}/authenticating" class="">Dashboard</a>
							</div>
    					</div>
    					<?php } ?>
    					<div class="sidebar-item">
    						<h3>ABOUT US</h3>
    						<div class="sidebar-item-content">
    							<p><?php echo $allbusinessinfo->bussiness_short_description; ?> </p>
    						</div>
    						<div class="sidebar-gallery">
    							<img src="<?php echo $appurl; ?>/images/business_banner/<?php if($allbusinessinfo->photo_url !="") { echo $allbusinessinfo->photo_url; } else { echo 'default-bg.png'; } ?>" alt="About us"/>
    						</div>
    					</div>
    					
    					<div class="sidebar-item">
    						<h3>Work hours</h3>
    						<div class="sidebar-item-content-work-time">
    							<ul>
    							   <?php 
    							   
    							   $days_string = array (
                                     0   => 'Sunday',
                                     1   => 'Monday',
                                     2   => 'Tuesday',
                                     3   => 'Wednesday',
                                     4   => 'Thursday',
                                     5   => 'Friday',
                                     6   => 'Saturday'
                                    );
                                    
                                    
    							   foreach($business_week_work_days as $key=>$val) {  ?>
    								<li><span><?php echo $days_string[$val->day]; ?></span>
    								<span>
    								<?php 
    								$sth    = "";
    								$sstr   = "";
    							
    								$off = false;
    								
    								if($val->starttime_h =="--" || $val->starttime_m =="--" || $val->endtime_h =="--" || $val->endtime_m =="--") {
    								    
        								$off = true;
        								
    								} else {
    								    if(intval($val->starttime_h) <=11) {
        								   $sth =  $val->starttime_h;
        								   $sstr = "AM";
        								} else {
        								   $sth =  (intval($val->starttime_h) - 12);
        								   $sstr = "PM"; 
        								}
        								
        								$off = false;
        								
    								}
    								
    								
    			
    								$esth   = "";
    								$esstr  = "";
    
    								if(intval($val->endtime_h) <=11) {
    								   $esth =  $val->endtime_h;
    								   $esstr = "AM";
    								} else {
    								   $esth =  (intval($val->endtime_h)- 12);
    								   $esstr = "PM"; 
    								}
    								
    								if($off) {
    								    echo 'offday';
    								} else {
    								    echo $sth.':'.$val->starttime_m.' '.$sstr.' to '.$esth.':'.$val->endtime_m.' '.$esstr; 
    								}
    								
    								?>
    								
    								</span>
    								</li>
    								<?php  }  ?>
    							</ul>
    						</div>
    						
    					
    						
    					</div>
    					
    					
    					<div class="sidebar-item">
    						<h3>CONTACT US</h3>
    						<div class="sidebar-item-content">
    							<ul>
    								<li><span><img src="{{asset('images/contact/phone.png')}}" alt="phone"/></span><a href="tel:@{{b_phone}}">+{{ $allbusinessinfo->country->country_code ?? '' }} <?php echo $allbusinessinfo->b_phone; ?></a></li>
    								<li><span><img src="{{asset('images/contact/location.png')}}" alt="location"/></span><a href="#">@{{b_address}}</a></li>
    								<li><span><img src="{{asset('images/contact/Mail.png')}}" alt="email"/></span><a href="mailto:@{{b_email}}">@{{b_email}}</a></li>
    								<li><span><img src="{{asset('images/contact/Web.png')}}" alt="email"/></span>
    								
    								 <?php
                                            $url = $allbusinessinfo->b_website; $newurl = ""; 
                                            if (filter_var($url, FILTER_VALIDATE_URL)) {  $newurl = $url; } else {  $newurl = 'http://'.$url; }
                                            ?>
    								        <a href="<?php echo $newurl;  ?>" target="_blank">@{{b_website}}</a>
    								    
        
    								    </a></li>
    								
    							</ul>
    						</div>
    						
    						<?php if(($allbusinessinfo->facebook !="") &&  ($allbusinessinfo->twitter !="") && ($allbusinessinfo->linkdin !="")) {  ?>
    						    <div class="social-links">
    							<p>Find us on-</p>
    							<div class="social-profile">
    							    
    							   
    							    
    							     <?php if($allbusinessinfo->facebook !="") { ?>
        								<a href="<?php echo $allbusinessinfo->facebook; ?>" target="_blank">
        								<i class="fa fa-facebook"></i>Facebook
        								</a>
    								<?php } ?>
    								
    								<?php if($allbusinessinfo->twitter !="") { ?>
        								<a href="<?php echo $allbusinessinfo->twitter; ?>" target="_blank">
        								<i class="fa fa-twitter"></i>Twitter
        								</a>
    								<?php } ?>
    								
    								<?php if($allbusinessinfo->linkdin !="") { ?>
        								<a href="<?php echo $allbusinessinfo->linkdin; ?>" target="_blank">
        								<i class="fa fa-linkedin"></i>Link
        								</a>
    								<?php } ?>
    								
    							</div>
    						</div>
    						<?php }  ?>
    						
    					</div>
    					
    				</div>
    				
    				<div class="portal-contents">
    				    <div class="login-block my-account-block">
    						<div class="sidebar-item-content">
						        <h3>Already a client?</h3>
    							<p>Login to your account</p>
    						</div>
							<div class="my-account-button">
								<a href="#">My Account</a>
							</div>
    					</div>
    				    
    				    
    					<div ng-repeat="selectedactions in actions" ng-model="myImg; myGoogle; oneColm='one-column'; twoColm='two-column'; " ng-init="@{{selectedactions.calltoaction == 'greeting' ? myImg = true : myImg = false }}  @{{selectedactions.calltoaction == 'googlemap' ? myGoogle = true : myGoogle = false }}  " class="content-item @{{ (selectedactions.calltoaction == 'greeting') || (selectedactions.calltoaction == 'googlemap') ? oneColm : twoColm }}    ">
    					    <span class="icon"><img src="{{asset('images/asset')}}/@{{selectedactions.icon}}" alt="logo"/></span>
    						<h3>@{{selectedactions.name}} </h3>
    						<p>@{{selectedactions.description}}</p>
    						
    						<div class="map-image" ng-if="myGoogle" >
    						    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBhDZ-X-FmlL7R9vg4VA7843bel7S4GOac&q=<?php echo $business_address; ?>"  width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    						</div>
    						<div class="about-image" ng-if="myImg" >
								<img src="<?php echo $appurl; ?>/images/assets/we_would_like_to_hear_from_you.jpg"  style="width:100%" />
    						</div>
    						<div class="content-link">
    							<a class="miyn@{{selectedactions.calltoaction}}" href="#">@{{selectedactions.name}}</a>
    						</div>
    					</div>
    					
    					
    					
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="portal-footer">
    	    <div class="container-wrapper">
                <div class="client-portal-footer">
    			    <div class="client-portal-footer-top">
    			        <div class="uper">
    			            <a href="#">home</a>
            			    <a href="#">Inbox</a>
            			    <a href="#">Payments</a>
            			    <a href="#">About us</a>
    			        </div>
    			        <div class="bottom">
    			            <a href="#">Schedule</a>
            			    <a href="#">Call now</a>
            			    <a href="#">Quote</a>
            			    <a href="#">Live chat</a>
            			    <a href="#">Details</a>
    			        </div>
    			    </div>
    			    <div class="client-portal-footer-bottom">
    			        <p>Copyright ll All right reserved</p>
    			    </div>
    			</div>
    	    </div>
    	</div>
	 </div>
	
	<?php

//dd($allbusinessinfo);
$json = json_encode($allbusinessinfo);

?>
  

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
        r = Math.floor((20000000 - 10) * Math.random());
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id; js.setAttribute('async','true');  js.setAttribute('crossorigin','anonymous');
    js.src = p + "{{config('app.live_url')}}/site/js/bad-request-issue.js?q=" + r;
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'miynsite-jssdk'));
</script> 


<script type='text/javascript' charset='utf-8'>

angular.module('app', [])
    .constant('IntialBusinessinfo', <?php echo $json; ?> )
    .service('IntialBusinessinfo',function(IntialBusinessinfo) {
        this.business_name = IntialBusinessinfo.business_name ;
        //this.addresss = IntialBusinessinfo.city + ', ' + IntialBusinessinfo.state ;
    })
    .controller('liveSiteCtr',function($scope, IntialBusinessinfo) {
        $scope.businesshortinfo = IntialBusinessinfo.bussiness_short_description; 
        $scope.appNames         = IntialBusinessinfo.business_name;
        $scope.address          = IntialBusinessinfo.b_address;
       // $scope.citystate        = IntialBusinessinfo.city + ', ' + IntialBusinessinfo.state;
        $scope.actions          = IntialBusinessinfo.actions;
        $scope.businessaboutphoto = IntialBusinessinfo.photo_url;
        $scope.background_color = IntialBusinessinfo.livestyle[0].action_background_color;
        $scope.b_phone = IntialBusinessinfo.b_phone;
        $scope.b_address = IntialBusinessinfo.b_address;
        $scope.b_website = IntialBusinessinfo.b_website;
        $scope.b_email = IntialBusinessinfo.b_email;
        
        
        
       //  $("a.action-brand:hover").css({"background-color": IntialBusinessinfo.livestyle[0].action_background_color, "color": IntialBusinessinfo.livestyle[0].action_text_color });
        
    });
    
    
    function convertHex(hex,opacity){
        hex = hex.replace('#','');
        r = parseInt(hex.substring(0,2), 16);
        g = parseInt(hex.substring(2,4), 16);
        b = parseInt(hex.substring(4,6), 16);
    
        result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
        return result;
    }


$('h1').html(convertHex('#A7D136',50));

</script>

<script type="text/javascript">
$(".loader").fadeIn("slow");
$( document ).ready(function() {
    
 // $(window).load(function() {
        //console.log('Called');
        $(".loader").fadeOut("slow");
 //   });  
    
});
</script>

</body>
</html>