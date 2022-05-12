
<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Thanks for your booking. Looking forward to meeting you!</title>
		<link rel="shortcut icon" href="img/favicon.png" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- Font Awesome compiled and minified CSS -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<!-- Font Awesome compiled and minified CSS -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

		<style>
			body{
			    font-family: poppins;
			}

			a:hover {
			    text-decoration: none;
			}

			.notification-wrapper {
			    width: 600px;
			    margin: auto;
			    text-align: center;
			}
			.notify-logo img {
			    margin: 30px 0 0px;
			    width: 107px;
			}
			.notify-logo {
			    border-bottom: 5px solid #2DB9EB;
			    margin-bottom: 25px;
			}
			.notify-content-menus ul {
				list-style: none;
				padding-left: 0;
			}
			.notify-content-menus ul li {
			    display: inline-block;
			    color: #B5C0CA;
			    font-size: 16px;
			    margin: 0 10px;
			    text-transform: uppercase;
			}
			.notify-content-top h2 {
			    font-family: poppins;
			    font-size: 27px;
			    margin-bottom: 34px;
			}
			.notify-content-top h4 {
			    /*text-transform: uppercase;*/
			    font-family: poppins;
			    font-size: 18px;
			    color: #333333;
			    margin-top: 37px;
			    margin-bottom:5px;
			}
			.notify-content-top p {
			    font-family: poppins;
			    color: #818181;
			    font-size: 15px;
			    font-weight: 400;
			    margin: 15px 0 10px 0;
			}
			.notify-content-top a {
			    font-family: poppins;
			    color: #fff;
			    padding: 8px 0px;
			    margin: 38px 0 68px;
			    background: #2DB9EB;
			    display: inline-block;
			    font-weight: 500;
			    font-size: 14px;
			}
			.notify-content-bottom p {
				font-weight: 300;
				color: #818181;
				line-height: 21px;
				font-size: 15px;
			}
			.notify-content-bottom p.notify-content-bottom-sign {
				color: #818181;
				margin-top: 26px;
				font-weight: 400;
				margin-bottom: 19px;
			}
			p.notify-content-bottom-sign span {
			    display: block;
			}
			.notify-content-social-icon a {
			    color: #D6DCE1;
			   /* padding: 4px 7px;*/
			    border-radius: 71%;
			    margin: 21px 3px 0px;
			    display: inline-block;
			}
			.notify-content-social-icon a img {
			    width: 35px;
			}
			.notify-content-social-icon a i.fa.fa-facebook {
			    padding: 0 2px;
			}
			.notify-content-social-icon {
			    margin: 28px 0px;
			}
			.notify-content-bottom a {
			    color: #2DB9EB;
			    text-decoration: underline;
			}
			.notify-content-copywrite p {
			    color: #B5C0CA;
			    font-size: 16px;
			    font-family: poppins;
			    margin: 18px 0 17px;
			}

			/*---Thanks Template CSS---*/
			.thansksTemplate .notify-content-top h2 {
			    background: #2DB9EB;
			    color: #fff;
			    padding: 9px 0;
			    margin-top: -9px;
			    font-size: 18px;
			}
			.thansksTemplate .notify-content-top a {
			    font-family: poppins;
			    color: #fff;
			    padding: 8px 0px;
			    margin: 38px auto 7px;
			    background: #2DB9EB;
			    width: 36%;
			    display: block;
			    font-weight: 500;
			    font-size: 16px;
			}
			.thansksTemplate .notify-logo {
			    border-bottom: 0px solid #2DB9EB;
			    margin-bottom: 0;
			}
			.thansksTemplate .notify-content-top h4 {
			    font-size: 16px;
			    margin-top: 0px;
			    margin-bottom:5px;
			}
			.thansksTemplate .notify-content-top p {
			    line-height: 21px;
			    margin-top:5px;
			}
			.thansksTemplate .notify-content-top h5 {
			    margin-top: 48px;
			    font-size: 16px;
			}

			.thansksTemplate .notify-content-top h6 {
			    text-align: center;
			    font-size: 12px;
			    color: #818181;
			    font-weight: 400;
			}
			.thansksTemplate .notify-content-top h6 span {
			    display: block;
			    line-height: 24px;
			}
			.thansksTemplate .notify-content-top a.makebtn {
			    background: transparent;
			    color: #ddd;
			    margin: 0 auto;
			    padding-top: 1px;
			    font-weight: 400;
			}
			.thansksTemplate .notify-content-bottom.thankscontentbts p {
			    line-height: 30px;
			    color: #717171;
			}
			.thansksTemplate .notify-content-bottom.thankscontentbts {
			    text-align: left;
			    margin-top: 50px;
			}
		</style>
	</head>
	<body style="background: #FCFCFC;">
		<div class="notification-wrapper thansksTemplate">
			<div class="row">
				<div class="col-md-12">
					<div class="notify-logo">
						<?php if($business->logo_image == ''){ ?>
    				        <h2 style="font-family: Arial;font-size: 18px;font-weight: 500;color: {{ $LiveSiteStyle->action_background_color }};">{{ $business->business_name }}</h2>
							<?php } else{ ?>
    				        <a href="{{config('app.main_url')}}/"><img style="width: auto;height:60px;" src="{{config('app.apps_url')}}/images/business_logo/{{ $business->logo_image }}" alt="{{ $business->business_name }}"/></a>
    				    <?php } ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="notify-content">
						<div style="background: #fff; padding-bottom: 35px;" class="notify-content-top">
							<h2 style="font-family:arial;background-color: {{ $LiveSiteStyle->action_background_color }};">Thank you for your request</h2>
							<h4 style="text-align:left;padding-left:16px;">Dear {{ ucfirst($inbox->inbox_firstname)}} {{ucfirst($inbox->inbox_lastname) }},</h4>
							<p style="font-family:arial;text-align:left;padding-left:16px;">Thanks for your booking. Looking forward to meeting you! <br>
                                Once <b>{{ ucfirst($business->business_name) }}</b> accepts the appointment you will get an email notification.</p>
							<h5 style="color: #333333;margin-bottom:-10px;">{{ $client_schedule->service_name }}.</h5>
							<h6 style="font-family:arial;">Proposed Timezone
 							<span>{{ $client_schedule->timezone_name }}</span></h6>
 							
 							<?php 
												
                                $str_arr = explode (",", $client_schedule->schedule_dates);  
                                $lastKey = array_keys($str_arr);
                            ?>
                            
                            @foreach ($str_arr as $key => $value)
                    		    <?php 
                    		        $time = strtotime($value);
                                ?>
                                
                                <div class="dates">
     								<p style="background: #FBFBFB;font-size: 14px;width: 50%;padding: 5px 0;margin: 11px auto;"><b><?php echo  $new_date = date("D, M d, Y h:i A",$time); ?></b></p>
     							</div> 
 							
                            @endforeach                        
				                                
 							                              
							<a href="{{config('app.client_url')}}/{{ $client->cl_uid }}/validate?client_token={{ $live_site_token->token }}" style="text-decoration: none;font-family:arial;background-color: {{ $LiveSiteStyle->action_background_color }};">Reply / View online</a>
							<a href="{{config('app.client_url')}}/{{ $client->cl_uid }}/validate?client_token={{ $live_site_token->token }}" style="text-decoration: none;font-family:arial;" class="makebtn">Make changes</a>
 							                              
							<!--<a href="{{config('app.live_url')}}/site/{{ $business->nickname }}?action=miyn-acc" style="text-decoration: none;font-family:arial;background-color: {{ $LiveSiteStyle->action_background_color }};">Reply / View online</a>
							<a href="{{config('app.live_url')}}/site/{{ $business->nickname }}?action=miyn-acc" style="text-decoration: none;font-family:arial;" class="makebtn">Make changes</a>-->
						
						</div>
						<div class="notify-content-bottom thankscontentbts" style="background: #fff;padding: 16px 0 4px 26px;margin-top: 9px;font-family:arial;">
							<h4 style="color:#333333;font-family:arial;">More details</h4>
							<p style="font-family:arial; color:#818181;">Phone Number: {{ $inbox->inbox_phone }}
								<br>Duration: {{ $service->total_service_minutes }} Minutes
								<br>Notes: {{ $client_schedule->schedule_note }}
							</p>
						</div>
						<div class="notify-content-footer">
							<div class="notify-content-footer">
							<div class="notify-content-social-icon">
								<a href="{{ $business->facebook ?? '#' }}"><img src="{{config('app.live_url')}}/images/miyn_social_icon/fb_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="f"></a>	
        						<a href="{{ $business->linkdin ?? '#' }}"><img src="{{config('app.live_url')}}/images/miyn_social_icon/linkedin_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="l"></a>		
        						<a href="{{ $business->twitter ?? '#' }}"><img src="{{config('app.live_url')}}/images/miyn_social_icon/twitter_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="t"></a>
        						<a href="{{ $business->gmail ?? '#' }}"><img src="{{config('app.live_url')}}/images/miyn_social_icon/insta_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="i"></a>	
								<ul style="list-style: none; padding-left:0px;margin-left:0px;">
									<li style="display: inline-block;"><a style="text-decoration: none;font-size: 12px;margin: 0px 3px 0px;text-transform: uppercase;" href="{{config('app.main_url')}}">Get Started</a></li>
									<li style="display: inline-block;"><a style="text-decoration: none;font-size: 12px;margin: 0px 3px 0px;text-transform: uppercase;" href="{{config('app.main_url')}}/software/online-appointment">services</a></li>
									<li style="display: inline-block;"><a style="text-decoration: none;font-size: 12px;margin: 0px 3px 0px;text-transform: uppercase;" href="{{config('app.main_url')}}/about">About</a></li>
									<li style="display: inline-block;"><a style="text-decoration: none;font-size: 12px;margin: 0px 3px 0px;text-transform: uppercase;" href="{{config('app.blog_url')}}/">Blog</a></li>
								</ul>
								<p style="color: #D6DCE1;padding-bottom: 20px;">&copy; <?php echo date('Y') ?> MIYN. All Rights Reserved.</p>
							</div>
						</div> 
						</div>
					</div>
				</div> 
			</div>
		</div>
	</body>
</html>