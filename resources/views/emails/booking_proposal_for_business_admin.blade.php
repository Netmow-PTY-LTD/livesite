<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Subject</title>
		<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		<style type="text/css">	
			img{
				margin: 0;
				border: none;
			}
			a{
				font-family: Arial, Helvetica, sans-serif;
				font-weight: normal;
				color: #555555;
				font-size: 13px;
				text-decoration: none !important;
				line-height: 1.5;
			}
			body{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 13px;
				color: #555555;
				line-height: 1.5;
			}
			p{
				font-family: Arial, Helvetica, sans-serif;
				font-weight: normal;
				color:#555555;
				font-size: 13px;
				margin: 0 0 10px;
				line-height: 1.3;
			}
			.email-body{
				background-color: #ffffff;
				width: 100%;
				padding: 20px;
			}
			.email-container{
				width: 630px;
				margin: 0 auto;
				background-color: #f7f7f7;
			}
			.header{
				font-family: Arial, Helvetica, sans-serif;
				background-color: #f7f7f7;
			}
			.header h4{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
				font-weight: 600;
				margin: 0;
				color: #333333;
			}
			.client-image{
				font-family: Arial, Helvetica, sans-serif;
				font-size: 12px;
			}
			.client-image span {
				color: #333333;
				vertical-align: middle;
				display: inline-block;
			}
			.client-image img{
				display: inline-block;
				vertical-align: middle;
			}
			hr { 
				display: block; height: 1px;
			    border: 0; border-top: 1px solid #ccc;
			     padding: 0;
		    }


			@media only screen and (max-width: 480px){
				table[class=booking-area] p{
					margin: 0 0 15px !important;
				}
			}	
		</style>
	</head>
	<body style="margin:0 auto;" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<div class="email-body">
			<div class="email-container">
				<table align="center" class="header" width="630" bgcolor="#f7f7f7" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
					<tbody>
						<tr>
							<td colspan="3" height="20"></td>
						</tr>
						<tr>
							<!-- <td colspan="3" style="display: none;opacity: 0; visibility: hidden;">'.substr($content, 0, 20).'</td> -->
						</tr>
						<tr>
							<td width="20"></td>
							<td valign="middle" style="vertical-align: middle;">
								<table width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
									<tbody>
										<tr>
											<td colspan="3" class="client-image" align="center" valign="middle" style="vertical-align: middle;text-align: center;">
											<!-- if(!empty($avatar)){ -->
											<!-- <div style="width: 150px;font-size: 20px;color: #ffffff;margin:0 auto;"><img src="'.$avatar.'" alt="'.$firstname.' '.$lastname.'" style="width: 100%;"></div> -->
											<!-- } else { -->
												<!-- $fulName = substr($firstname, 0, 1).substr($lastname, 0, 1); -->
											<div style="width: 70px;height: 70px;font-size: 20px;color: #ffffff;line-height: 70px;margin:0 auto;border-radius: 50px;background-color: #4675d9;">{{ substr(ucfirst($client->firstname), 0, 1)."".substr(ucfirst($client->lastname), 0, 1) }}</div>        
											<!-- } -->
											</td>
										</tr>
									</tbody>
								</table>
							</td>
							<td width="20"></td>
						</tr>
						<tr>
							<td colspan="3" height="20"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="email-container">
				<table align="center" class="email-content" bgcolor="#f7f7f7" width="630" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;background-color: #f7f7f7;">
					<tbody>
						<tr>
							<td width="20"></td>
							<td align="left" valign="top" style="text-align: left;vertical-align: top;">
							<table align="left" bgcolor="#ffffff" width="100%" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;background-color: #ffffff;text-align: left;">
								<tbody>
									<tr>
									<td colspan="3" height="20"></td>
									</tr>
									<tr>
										<td width="20"></td>
										<td valign="top" style="vertical-align: top;">
	<div style="line-height: 2;">Dear {{ strtoupper($business->business_name) }}, </div>
	<div style="line-height: 2;">{{ ucfirst($client->firstname)." ".ucfirst($client->lastname) }} has requested an appointment with you. Please <a style="color: blue;" href="https://miyn.net/login">Login Here</a> to Accept or Deny this request.</div>
											
											<hr>
											<h3 style="text-align: center;">New Appointment Request</h3>
                                            <hr>
                                            
											<div style="text-align: center;">

												
												<h3>{{ $client_schedule->service_name }}</h3>
												<div style="padding-top:10px;padding-bottom:10px">Proposed Times</div>

												<!--<div>(GMT+10:00) Brisbane</div>-->
												
												<?php 
												
                                                     $str_arr = explode (",", $client_schedule->schedule_dates);  
				                                     $lastKey = array_keys($str_arr);
				                                     ?>
                                                    

                                                    @foreach ($str_arr as $key => $value)
                                            		    <?php 
                                            		        $time = strtotime($value);
                                                        ?>
                                            			    <span style="font-size: 16px;font-weight:bold;color:#404040"><?php echo  $new_date = date("D, M d, Y h:i A",$time); ?></span>
                                            			 
                                            			    <hr style="width:60%">
                                            			    
                                            		@endforeach

											</div>
											<br>

											<div>More details</div>
                            				<div>Phone Number: {{$client->phone}}</div>
                            				<div> Duration:  {{ $service->total_service_minutes }} Minutes 	</div>
                            				<div style="line-height: 2;"> Notes: {{ $client_schedule->schedule_note }}</div>
											
											<br>
											<div style="text-align: center;">
											  <h3 style="width: 270px;height: 33px; background-color: #00b604; padding-top: 12px;border-radius: 5px; margin-left: 140px;">
											  	<a style="color:#fff;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;" href="https://miyn.net/login"> Accept </a>
											  </h3>
											    <a style="color:#15c" href="https://miyn.net/login">Decline</a>
											    <br>
											    <a style="color:#15c" href="https://miyn.net/login">Reply / View Online</a>
											</div>
											<br>
											<div>
											    Full details on <a style="color:#15c" href="https://miyn.net/login">{{ ucfirst($client->firstname)." ".ucfirst($client->lastname) }}</a>
											</div>
											<br>
											<div>Email: <a href="">{{$client->email}}</a></div>
											<div>Phone: {{$client->phone}}</div>
											<div>Source: Website</div>
											<div>Source URL: <a href="https://miyn.net"></a></div>
											
										</td>
										<td width="20"></td>
									</tr>
									<tr>
										<td colspan="3" height="40"></td>
									</tr>
									<tr>
										<td colspan="3" height="20"></td>
									</tr>
								</tbody>
							</table>
							</td>
							<td width="20"></td>
						</tr>
					</tbody>
				</table>
				
				
			</div>
			<div class="email-container">
				<table align="center" class="footer" width="630" bgcolor="#f7f7f7" border="0" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;">
					<tbody>
						<tr>
							<td colspan="3" height="35"></td>
						</tr>
						<tr>
							<td width="20"></td>
							<td valign="top" align="center" style="vertical-align: top;text-align: center;">
							<div style="text-align: center;font-size: 10px;line-height: 2;">Please do not reply to this email. </div>
						</td>
							<td width="20"></td>
						</tr>
						<tr>
							<td colspan="3" height="35"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</body>
</html>