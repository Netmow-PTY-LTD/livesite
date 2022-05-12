<?php
    $color_bg = $allbusinessinfo['livestyle'][0]->action_background_color;
?>
<!DOCTYPE html>
<html class="miyn-popup-load">
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Get Code</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
   </head>
   
<style type="text/css">


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
        .miyn-appointment-my-account-area {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: wrap row;
            padding: 30px 20px;
            background-color: #FFFFFF;
            min-height: 350px;
            margin: 30px 20px;
            height: 100%;
            box-sizing: border-box;
        }
        .miyn-my-account-contents {
            text-align: center;
            max-width: 400px;
            margin: 0 auto;
            width: 100%;
        }
        .miyn-my-account-contents h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            color: #0E1130;
            line-height: 1;
        }
        .miyn-my-account-contents p {
            margin: 0;
            color: #0E1130;
            font-size: 12px;
            line-height: 18px;
        }
        .my-account-form {
            margin-top: 20px;
            width: 100%;
        }
    .my-account-form .form-field input {
        width: 100%;
        box-sizing: border-box;
        background-color: #F9F9F9;
        border: 1px solid #F9F9F9;
        font-size: 12px;
        padding: 10px 15px;
        color: #0E1130;
        border: 1px solid #ffffff;
        background-color: #ffffff;
        border-radius: 2px;
        font-family: 'Poppins', sans-serif;
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
        .my-account-form .form-field input:focus {
            outline: none;
        }
        .my-account-form .form-field input::placeholder {
            color: #0E1130;
        }
        .my-account-form .form-field input::-webkit-input-placeholder { /* Edge */
            color: #0E1130;
        }
        .my-account-form .form-field input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #0E1130;
        }
        .my-account-form .form-field input::placeholder {
            color: #0E1130;
        }
        .my-account-form .submit-button {
        	margin-top: 10px;
        }
        .my-account-form .submit-button a {
            display: inline-block;
            background-color: <?php echo $color_bg;  ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
            cursor: pointer;
        }
        .my-account-form .submit-button button, .my-account-form .submit-button input[type="submit"] {
            display: inline-block;
            background-color: <?php echo $color_bg;  ?>;
            border: 1px solid <?php echo $color_bg;  ?>;
            border-radius: 2px;
            color: #ffffff;
            font-size: 12px;
            line-height: 35px;
            min-width: 100px;
            text-align: center;
            font-weight: 500;
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
        .miyn-appointment-my-account-area .miyn-popup-confirmation-content p {
            margin: 0;
            font-size: 12px;
        }
        .miyn-appointment-my-account-area .miyn-popup-confirmation-content h3 {
            margin: 0;
            font-size: 14px;
        }
        
        label.miynPopUpFormError {
            color:red !important;
            display:block;
            width:100%;
            text-align:left;
        }
        .miynPopUpFormError {
            color: #f00f00;
            font-weight: 400;
            font-size: 12px;
        }
        

</style>

<body class="loader">
    <div id="miyn-my-account" class="miyn-appointment-my-account-area miyn-iframe-popup-box2">
        <div class="miyn-my-account-contents">
            <form id="sendGreetingFormData">
                {!! csrf_field() !!}
                <h3>Welcome Back !</h3>
                <p>Log In To Access Your Account</p>
                <div class="my-account-form">
    				<div class="form-field">
    					<input type="email" id="client_email" name="client_email" required="" placeholder="Email" />
            			<input type="hidden" id="business_uid" name="business_uid" value="{{ $allbusinessinfo->uid }}" />
    				</div>
    				<div class="submit-button">
    				    <input type="submit" id="changeSubmit" value="Submit">
    				</div>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{ asset('miyn-widget-4/js/jquery.validate.min.js') }}"></script>
    
 
<script type="text/javascript">
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
    </script>

<script>

    /*$("#sendGreetingFormData").submit(function(e){
        e.preventDefault(); 

       var formdata = $(this).serialize();
       console.log(formdata);
       
       var email = $('#client_email').val();
       var b_uid = $('#business_uid').val();
       
       var csrf_token      = $('meta[name="csrf-token"]').attr('content');
       
       console.log('aaa');
       console.log(csrf_token);
       console.log('dddd');
       $('#changeSubmit').text('Sending..');
       $("#changeSubmit").attr("disabled", true);
       //return false;
       
        $.ajax({
            type: 'post',
            url:'{{config('app.live_url')}}/send-live-site-url-for-client-login',
            data:{_token:csrf_token, email:email, b_uid:b_uid},
            dataType:'json',
            success: function (data) {
                console.log(data);
                
                var html = "";
                html += '<div class="miyn-popup-confirmation-content">';
					html += '<h3>EMAIL SENT</h3>';
					html += '<div class="miynpopup-confirmation-booking-info">';
						html += '<p>Please check your inbox/ junk mail for access</p>';
					html += '</div>';
				html += '</div>';
    				
                $("#miyn-my-account").html(html);
                        
            },
            error: function (xhr) {
                //alert('error found');
                console.log(xhr);
            },
        });
    });*/

    
   
</script>

<script>
    $('form[id="sendGreetingFormData"]').validate({
        errorClass: "miynPopUpFormError",
        rules: {
            client_email: {
              required: true,
              email: true,
            }
        },
        messages: {
            client_email: {
              required: "required",
              email: "name@email.com"
            }
        },
        
        submitHandler: function(form) {
            var formdata = $(form).serialize();
            //console.log(formdata);
            //return false;
            
            var email = $('#client_email').val();
            var b_uid = $('#business_uid').val();
       
            var csrf_token      = $('meta[name="csrf-token"]').attr('content');
            
            console.log(csrf_token);
            
            $.ajax({
                type: 'post',
                url:'{{config('app.live_url')}}/send-live-site-url-for-client-login',
                data:{_token:csrf_token, email:email, b_uid:b_uid},
                dataType: "json",
                success: function (data) {
                    //console.log(data);
                    
                    
                    var html = "";
                            html += '<div class="appointment-success-content">';
        					    html += '<div class="appointments-icon">';
        					        html += '<img src="{{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
        					    html += '</div>';
        					    
        					    html += '<div class="appointments-messages">';
        					        html += '<h3>YOUR MESSAGE SENT SUCCESSFULLY.</h3>';
        					        html += '<p>Please check your inbox/ junk mail for access</p>';
        					    html += '</div>';
        					    
        					    
        					    /*html += '<div class="appointment-success-actions">';
        					        html +='<a href="#appointment-lists">Book another</a>';
        					        html +='<a href="#">Manage Booking</a>';
        					    html += '</div>';*/
        						
        				    html += '</div>';
                  /*  
                    var html = "";
                        html += '<div class="miyn-popup-confirmation-content">';
        					html += '<h3>EMAIL SENT</h3>';
        					html += '<div class="miynpopup-confirmation-booking-info">';
        						html += '<p>Please check your inbox/ junk mail for access</p>';
        					html += '</div>';
        				html += '</div>';*/
        				
                    $("#miyn-my-account").html(html);
                    
                },
            });
      }
    });
</script>

<script type="text/javascript">
$( document ).ready(function() {
    
 // $(window).load(function() {
        //console.log('Called');
        $("body").removeClass("loader");
 //   });  
    
});
</script>
    
</body>
</html>
    
