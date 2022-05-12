<!DOCTYPE html>
<html class="miyn-popup-load">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Get Code</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="CaAhsVOM3xjqdwZxqGvlA7ZpoK6Hevvmbxth29D3" />
   </head>
   
<style type="text/css">

.payment-form-box {
    color: #262626;
    margin-left:auto; 
    margin-right:auto;
}

@media only screen and (max-width: 767px) {
   width: 100%; 
}



.form-style-1 {
    width:100%;
	padding: 0px 12px 10px 0px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	margin-left:auto;
	margin-right:auto;
	max-width: 300px;
}

.form-style-1 ul{
    margin:0px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	margin-left:auto;
	margin-right:auto;
	max-width: 300px;
}

.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
	text-align: center;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
	display:block;
	font-weight: bold;
	float:left;
	width:150px;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
.form-style-1 textarea, 
.form-style-1 select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 7px;
	margin:0px;
	-webkit-transition: all 0.30s ease-in-out;
	-moz-transition: all 0.30s ease-in-out;
	-ms-transition: all 0.30s ease-in-out;
	-o-transition: all 0.30s ease-in-out;
	outline: none;	
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 100%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
	background: <?php echo $allbusinessinfo['livestyle'][0]->action_background_color; ?>;
	padding: 8px 15px 8px 15px;
	border: none;
	color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
	background: rgba(0,0,0,.3); 
	box-shadow:none;
	-moz-box-shadow:none;
	-webkit-box-shadow:none;
}
.form-style-1 .required{
	color:red;
}

table.contact-s {
    width:100%;
}

h3.ng-bindings {
    margin-bottom: 0;
    background-color: rgba(142,142,142,0.23);
    padding:10px;
    margin-bottom:5px;
    margin-top:25px;
    cursor:pointer;
    display:block;
    text-align:center !important;
}

h4.ng-bindings {
    margin-bottom: 0;
    padding:10px;
    margin-bottom:0px;
    margin-top:25px;
    cursor:pointer;
    display:block;
    text-align:center !important;
}

 .payment-form-box {
     max-width:400px;
 }

@media only screen and (max-width: 767px) {
    .payment-form-box{
        width: 100%; 
        max-width:400px;
    }
    
    .form-style-1 .field-divided {
        width: 100%;
    }
    
    .mob-hide{
        display:none !important;
    }
}

/*CONFIRMATION BOX STYLE*/
        .miyn-popup-confirmation-content {
            background-color: <?php echo $allbusinessinfo['livestyle'][0]->action_background_color; ?>;
            padding: 25px;
            color:#ffffff;
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
</style>




<div class="payment-form-box ">			
	<div class="contact-information-area2 ">
	    <div id="validation-errors"></div>
        <div id="schedule-step-4" class="">
    	<table class="contact-s">
    		<tbody>
    			<tr>
    				<td>	
    					<form id="sendGreetingFormData">
    					    <h3  class="ng-bindings">Welcome back !</h3>
                            <h4  class="ng-bindings">Log in to access your account</h4>
    					    <div class="document-upload">
    					        <ul class="form-style-1">
        							<li>
        								<input type="text" id="client_email" name="client_email" class="field-divided" required="" placeholder="Email" />
        								<input type="hidden" id="business_uid" name="business_uid" value="{{ $allbusinessinfo->uid }}" class="field-divided" />
        							</li>
        							<li>
        									<input type="submit" id="changeSubmit" value="Submit">
        							</li>
        						</ul>
    					    </div>
    					    
    					    
    					</form>
    				</td>
    			</tr>
    		</tbody>
    	</table>
    </div>
    </div>
</div>

</html>
    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>

    $("#sendGreetingFormData").submit(function(e){
        e.preventDefault(); 

       var formdata = $(this).serialize();
       //console.log(formdata);
       
       var email = $('#client_email').val();
       var b_uid = $('#business_uid').val();
       
       var csrf_token      = $('meta[name="csrf-token"]').attr('content');
       
       //console.log(csrf_token);
       $('#changeSubmit').text('Sending..');
       $("#changeSubmit").attr("disabled", true);
       //return false;
       
        $.ajax({
            type: 'post',
            url:'{{config('app.live_url')}}/send-live-site-url-for-client-login',
            data:{_token:csrf_token, email:email, b_uid:b_uid},
            dataType:'json',
            success: function (data) {
                //console.log(data);
                
                var html = "";
                html += '<div class="miyn-popup-confirmation-content">';
					html += '<h3>EMAIL SENT</h3>';
					/*html += '<p>You will receive an email once admin, contact you</p>';*/
					html += '<div class="miynpopup-confirmation-booking-info">';
						html += '<p>Please check your inbox/ junk mail for access</p>';
					html += '</div>';
				html += '</div>';
    				
                $("#schedule-step-4").html(html);
                        
            },
            error: function (xhr) {
                //alert('error found');
                //console.log(xhr);
            },
        });
    });

    
   
</script>