
<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Thank You E-Mail</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
		<style>
			@import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,300,300i,400,400i,500,500i,600,600i,700&display=swap');
			body{
			    font-family: Arial;
			}

			a:hover {
			    text-decoration: none;
			}
			
			img {
              filter: hue-rotate(230deg) brightness(60%);
            }
			
		</style>
	</head>
	<body style="background: #FCFCFC;">
		<div style="background-color: #FCFCFC;width: 800px;margin: 0 auto;">
			<div style="width: 640px; margin: 0 auto;">
				<div style="width: 400px; margin: 0 auto;text-align: center;padding: 40px 0 15px;">
						<?php if($business->logo_image == ''){ ?>
    				        <h2 style="font-family: Arial;font-size: 18px;font-weight: 500;color: {{ $LiveSiteStyle->action_background_color }};">{{ $business->business_name }}</h2>
							<?php } else{ ?>
    				        <a href="{{config('app.main_url')}}/"><img style="width: auto;height:60px;" src="{{config('app.apps_url')}}/images/business_logo/{{ $business->logo_image }}" alt="{{ $business->business_name }}"/></a>
    				    <?php } ?>
				</div>
				<div style="width: 100%; margin: 0 auto;text-align: center;padding: 10px 0;background-color: {{ $LiveSiteStyle->action_background_color }};">
					<h2 style="font-family: Arial;font-size: 22px;font-weight: 600;color: #ffffff;margin: 0;line-height: 1;">New Appointment Request</h2>
				</div>
				<div style="width: 100%; margin: 0 auto;text-align: center;background-color: #ffffff;">
					<div style="margin: 0 auto;text-align: center;padding: 20px 0 15px;">
						<p style="font-family: Arial;font-size: 14px;color: #333333;text-align:left;padding-left:16px;font-weight: 600;margin: 0;padding-bottom: 5px;">Dear {{ ucfirst($business->business_name) }}</p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align:left;padding-left:16px;;margin: 0;">A new appointment request has been submitted by <a href="{{config('app.apps_url')}}/app/{{ $business->uid }}/validate?business_token={{ $live_site_token->token }}" class="jhonlink" style="color: {{ $LiveSiteStyle->action_background_color }};text-decoration: underline;">{{ucfirst($inbox->inbox_firstname)}} {{ ucfirst($inbox->inbox_lastname) }}.</a></p>
					</div>
					
					
					
					
					<div style="width: 400px; margin: 0 auto;text-align: center;padding: 20px;">
						<p style="font-family: Arial;font-size: 14px;color: #333333;text-align: center;font-weight: 600;margin: 0;padding-bottom: 10px;">{{ $client_schedule->service_name }}.</p>
						
						<p style="font-family: Arial;font-size: 12px;line-height: 17px;color: #818181;text-align: center;margin: 0;"> Booking Timezone <br>{{ $client_schedule->timezone_name }}</p>
						
						<?php 
                            $str_arr = explode (",", $client_schedule->schedule_dates);  
                            $lastKey = array_keys($str_arr);

                            $i = 1;
                            
                        ?>

                        @foreach ($str_arr as $key => $value)
                		    <?php
                		    	
                		        $time = strtotime($value);
                		        
                		        //$time = strtotime("2020-2-14 11:10 PM");
                                $db_date = date("Y-m-d H:i:s",$time);
                                $oldTZ = new DateTimeZone($client_schedule->timezone_name);
                                $newTZ = new DateTimeZone($b_country->timezone_name);
                                $date = new DateTime( $db_date, $oldTZ );
                                $date->setTimezone( $newTZ );
                                $new_date = $date->format('D, M d, Y h:i A');
                            ?>
                            <p style="font-family: Arial;background: #FBFBFB;font-size: 14px;font-weight: 700;padding: 5px 0;margin: 11px 0;color: #818181;">Option {{ $i++ }} : <?php echo  $new_date; ?></p>
                        @endforeach
                            
						
					</div>
					
					<div style="margin: 0 auto;text-align: center;padding: 15px 0;">
						<p style="font-family: Arial;font-size: 14px;color: #333333;text-align: left;padding-left:16px;font-weight: 600;margin: 0;padding-bottom: 5px;">Staff details</p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align: left;padding-left:16px;margin: 0;">Name: {{ $staff->staffname ?? '' }}</p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align: left;padding-left:16px;margin: 0;">Email: {{ $staff->staff_email ?? '' }} </p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align: left;padding-left:16px;margin: 0;">Profession: {{ $staff->staffproffesion ?? '' }}</p>
					</div>
					
					<div style="margin: 0 auto;text-align: center;padding: 15px 0;">
						<p style="font-family: Arial;font-size: 14px;color: #333333;text-align: left;padding-left:16px;font-weight: 600;margin: 0;padding-bottom: 5px;">More details</p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align: left;padding-left:16px;margin: 0;">Notes: {{ $client_schedule->schedule_note }}</p>
						<p style="font-family: Arial;font-size: 14px;color: #333333;text-align: left;padding-left:16px;font-weight: 600;margin: 0;">Duration</p>
						<p style="font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;text-align: left;padding-left:16px;margin: 0;">{{ $service->total_service_minutes }} Minutes</p>
					</div>
					<div style="width: 440px; margin: 0 auto;text-align: center;padding: 0 0 40px;">
						<p style="margin: 0;"><a href="{{config('app.apps_url')}}/app/{{ $business->uid }}/validate?business_token={{ $live_site_token->token }}" style="text-decoration: none;font-family: Arial;background: {{ $LiveSiteStyle->action_background_color }}; color: #fff; padding: 4px 30px; margin: 26px 3px 8px 3px; border: 1px solid {{ $LiveSiteStyle->action_background_color }}; display: inline-block; font-size: 17px;">Accept</a><a href="{{config('app.apps_url')}}/app/{{ $business->uid }}/validate?business_token={{ $live_site_token->token }}" style="font-family: Arial;text-decoration: none;color: #333333;background: transparent;border: 1px solid #333333;padding: 4px 30px;margin: 26px 3px 8px 3px;display: inline-block; font-size: 17px;">Decline</a></p>
						<p style="margin: 0;"><a href="{{config('app.apps_url')}}/app/{{ $business->uid }}/validate?business_token={{ $live_site_token->token }}" style="font-family: Arial;text-decoration: none;color: #9e9e9e; margin-top: 2px;display: inline-block;">Reply / View online</a></p>
					</div>
				</div>
				<div style="width: 100%; margin: 15px auto 0;text-align: left;background-color: #ffffff;">
					<div style="width: 600px; margin: 0 auto;text-align: left;padding: 30px;">
						<h3 style="font-size: 15px;color: #3d3e44;margin: 0 0 20px;">Full details on <a href="#" style="text-decoration:underline;color:{{ $LiveSiteStyle->action_background_color }};">{{ucfirst($inbox->inbox_firstname)}} {{ ucfirst($inbox->inbox_lastname) }}</a></h3>
						<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
							<tbody>
								<tr>
									<th width="80" style="vertical-align: top;"><span style="font-family: Arial;font-size: 12px;line-height: 17px;color: #0E1130;">Email</span></th>
									<td width="250" style="vertical-align: top;">: <a style="padding-left: 5px;font-family: Arial;font-size: 14px;line-height: 17px;text-decoration: none;color: #818181; display: inline-block;" href="mailto:{{ $client->email }}">{{ $client->email }}</a></td>
								</tr>
								<tr>
									<td colspan="4" height="10"></td>
								</tr>
								<tr>
									<th width="80" style="vertical-align: top;"><span style="font-family: Arial;font-size: 12px;line-height: 17px;color: #0E1130;">Phone</span></th>
									<td width="250" style="vertical-align: top;">: <a style="padding-left: 5px;font-family: Arial;font-size: 14px;line-height: 17px;text-decoration: none;color: #818181; display: inline-block;" href="tel:{{ $inbox->inbox_phone }}">{{ $inbox->inbox_phone }}</a></td>
								</tr>
								<tr>
									<td colspan="4" height="10"></td>
								</tr>
								<tr>
									<th width="80" style="vertical-align: top;"><span style="font-family: Arial;font-size: 12px;line-height: 17px;color: #0E1130;">Time zone</span></th>
									<td style="vertical-align: top;">: <span style="padding-left: 5px;font-family: Arial;font-size: 12px;font-weight: 400;line-height: 17px;color: #818181;">{{ $client_schedule->timezone_name }}</span></td>
									<th width="80" style="vertical-align: top;">
									<th style="vertical-align: top;">
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="width: 440px;margin: 0 auto;padding: 20px 0 0;text-align: center;">
					<div style="line-height: 1;">
						<a href="https://www.facebook.com/MIYNapp"><img src="{{config('app.apps_url')}}/images/miyn_social_icon/fb_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="f"></a>	
						<a href="https://www.linkedin.com/company/miynapp/"><img src="{{config('app.apps_url')}}/images/miyn_social_icon/linkedin_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="l"></a>		
						<a href="https://twitter.com/MIYNapp"><img src="{{config('app.apps_url')}}/images/miyn_social_icon/twitter_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="t"></a>
						<a href="https://www.instagram.com/miynapps/"><img src="{{config('app.apps_url')}}/images/miyn_social_icon/insta_white.png" style="width:30px;height:30px;border-radius:50%;background-color: {{ $LiveSiteStyle->action_background_color }};" alt="i"></a>		
					</div>
					<div style="padding: 10px 0 20px;">
						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}">GET STARTED</a>
						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}/software/online-appointment">SERVICES</a>
						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}/about/">ABOUT</a>
						<a style="text-decoration: none;font-size: 12px;color: #B5C0CA;padding: 0 8px;" href="{{config('app.main_url')}}/">BLOG</a>
						<p style="color: #B5C0CA;font-family: Arial;font-size: 12px;padding-top: 10px;margin: 0;">&copy; <?php echo date('Y') ?> MIYN. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>