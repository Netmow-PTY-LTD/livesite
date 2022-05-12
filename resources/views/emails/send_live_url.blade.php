<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Thank You E-Mail</title>
		<link rel="shortcut icon" href="img/favicon.png" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- Font Awesome compiled and minified CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
			a:hover {
			    text-decoration: none;
			}
			.notification-wrapper {
			    width: 635px;
			    margin: 28px auto;
			    text-align: center;
			}
			.notify-logo img {
			    margin: 24px 0 18px;
			    width: 107px;
			}
			.notify-logo {
			    border-bottom: 5px solid #2DB9EB;
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
			.notify-content-menus ul li a {
			    color: #B5C0CA;
			}
			.notify-content-top h2 {
			    font-size: 27px;
			    margin-bottom: 34px;
			}
			.notify-content-top h4 {
			    /*text-transform: uppercase;*/
			    font-size: 18px;
			    color: #333333;
			    margin-top: 37px;
			}
			.notify-content-top p {
			    color: #818181;
			    font-size: 15px;
			    font-weight: 400;
			    margin: 0px 0 10px 0;
			}
			.notify-content-top a {
			    font-family: poppins;
			    color: #000;
			    /*padding: 6px 35px;*/
			    /*margin: 30px 0 44px;*/
			    /*background: #2DB9EB;*/
			    text-decoration:none;
			    display: inline-block;
			    font-weight: 500;
			    font-size: 16px;
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
			    padding: 4px 7px;
			    border-radius: 71%;
			    margin: 21px 3px 0px;
			    display: inline-block;
			}
			.notify-content-social-icon a i.fa.fa-facebook {
			    padding: 0 2px;
			}
			/*.notify-content-social-icon a img {*/
			/*    width: 35px;*/
			/*}*/
			.notify-content-social-icon {
			    margin: 10px 0px;
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
			@media screen and (max-width: 500px) {
			  .notification-wrapper {
				    width: 90% !important;
				    margin: 28px auto;
				    text-align: center;
				}
				.notify-content-social-icon ul {
                    margin-left: -44px;
                }
				.notify-content-social-icon ul li a {
                    font-size:10px;
                }
			}
		</style>
	</head>
	<body style="background: #FCFCFC;padding-bottom:10px;">
		<div class="notification-wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="notify-logo">
						<a href="{{config('app.main_url')}}"><img src="{{config('app.main_url')}}/miyn/assets/img/notification-logo.png" alt=""></a>
					</div>
				</div>
			</div>
			<div class="row">
					<div class="notify-content">
						<div class="notify-content-top" style="background: #fff; padding-top: 26px;">
							<img src="{{config('app.main_url')}}/miyn/assets/img/thanku-icon.png" alt="">
							<h2 style="color: #0E1130">Thank you</h2>
							<p style="text-decoration:none;padding:6px 0px;">Hi, {{ $client->email }},</p>
							<p>Please click this link Bellow.</p>
							<a style="text-decoration: none;font-family: arial;background-color:#2DB9EB;margin-bottom:30px;padding:6px 30px;" href="{{config('app.client_url')}}/{{ $client->cl_uid }}/validate?client_token={{ $live_site_token->token }}" </a> Your Profile </a>
						</div>
						<div class="notify-content-bottom" style="background-color: #fff;margin-top: 11px;padding: 21px 0 1px;">
							<p>Problems confirming your email? <br>
							<a href="{{config('app.main_url')}}/signin">Tell us</a> straight away so we can fix this for you.</p>
							<p class="notify-content-bottom-sign">
								Thanks
								<span>MIYN Team</span>
							</p>
						</div>
						<div class="notify-content-footer">
							<div class="notify-content-social-icon">
								<div style="line-height: 1;">
            						<a href="{{ $business->facebook ?? '#' }}"><img src="{{config('app.main_url')}}/images/miyn_social_icon/fb_white.png" style="width:30px;height:30px;border-radius:50%;background-color: #2db9eb;" alt="f"></a>	
            						<a href="#"><img src="{{ asset('images/miyn_social_icon/linkedin_white.png') }}" style="width:30px;height:30px;border-radius:50%;background-color: #2db9eb;" alt="l"></a>		
            						<a href="{{ $business->twitter ?? '#' }}"><img src="{{ asset('miyn-widget-4/images/success-icon.png') }}" style="width:30px;height:30px;border-radius:50%;background-color: #2db9eb;" alt="t"></a>
            						<a href="{{ $business->gmail ?? '#' }}"><img src="{{config('app.live_url')}}/images/miyn_social_icon/insta_white.png" style="width:30px;height:30px;border-radius:50%;background-color: #2db9eb;" alt="i"></a>		
            					</div>
            					<div style="padding: 10px 0 20px;">
            						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}">GET STARTED</a>
            						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}/software/online-appointment">SERVICES</a>
            						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}/about">ABOUT</a>
            						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.blog_url')}}">BLOG</a>
            						<p style="color: #B5C0CA;font-family: Arial;font-size: 12px;padding-top: 10px;margin: 0;">&copy; <?php echo date('Y') ?> MIYN. All Rights Reserved.</p>
            					</div>
							</div>
						</div>     
					</div>
				</div> 
			</div>
		</div>
	</body>
</html>