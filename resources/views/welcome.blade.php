
<!DOCTYPE html>
<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Business Live Site</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700&display=swap" rel="stylesheet">
   </head>
   
<style type="text/css">


	    @import  url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	    html {
        	height: calc(100% - 50px);
        }
        body {
        	font-family: 'Poppins', sans-serif;
        	background-repeat: no-repeat;
        	background-position: center;
        	background-size: cover;
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	height: 100%;
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
        .miyn-appointment-my-account-area2 {
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	flex-flow: wrap row;
        	box-sizing: border-box;
        	width: 400px;
        	background: #fff;
            padding: 30px 20px;
        }
        .appointment-success-content2{
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .miyn-my-account-contents {
        	text-align: center;
        	max-width: 100%;
        	width: 100%;
        	background: #FFFFFF;
        	padding: 0;
        }
        .cp-logo {
        	padding-top: 20px;
        	padding-bottom: 10px;
        	border-bottom: 1px solid #F2F2F2;
        	margin: 0 40px;
        }
        .cp-logo img {
            max-width: 108px;
        }
        .miyn-my-account-contents h3 {
        	margin-top: 15px;
        	font-size: 26px;
        	font-weight: 600;
        	color: #0E1130;
        	line-height: 29px;
        	margin-bottom: 5px;
        }
        .miyn-my-account-contents p {
        	margin: 0;
        	color: #2F3A5F;
        	font-size: 14px;
        	line-height: 16px;
        	margin-bottom: 27px;
        }
        .my-account-form {
            margin-top: 20px;
            width: 100%;
            padding-bottom: 40px;
            border-bottom: 1px solid #F2F2F2;
        }
        .my-account-form .form-field {
            padding: 0 40px;
        }
        
        .my-account-form .form-field input {
        	width: 100%;
        	box-sizing: border-box;
        	/* background-color: #F9F9F9; */
        	/* border: 1px solid #F9F9F9; */
        	/* font-size: 14px; */
        	/* padding: 10px 15px; */
        	/* color: #0E1130; */
        	/* border: 1px solid #ffffff; */
        	/* background-color: #ffffff; */
        	font-family: 'Poppins', sans-serif;
        	border: 0;
        	background-color: #F2F2F2;
        	color: #0E1130;
        	font-size: 14px;
        	padding: 14px;
        	max-width: 100%;
        	/* width: 100%; */
        	display: block;
        	/* box-sizing: border-box; */
}
        .my-account-form .form-field input:focus {
            outline: none;
        }
        .my-account-form .form-field input::placeholder {
            color: #8A8A8A;
        }
        .my-account-form .form-field input::-webkit-input-placeholder { /* Edge */
            color: #8A8A8A;
        }
        .my-account-form .form-field input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #8A8A8A;
        }
        .my-account-form .form-field input::placeholder {
            color: #8A8A8A;
        }
        .my-account-form .submit-button {
        	margin-top: 25px;
        }
        .my-account-form .submit-button a {
            display: inline-block;
            background-color: #FF4FBF;
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
        	background-color: rgb(45, 185, 235);
        	border: 1px solid rgb(45, 185, 235);
        	color: #ffffff;
        	font-size: 16px;
        	line-height: 43px;
        	min-width: 100px;
        	text-align: center;
        	font-weight: 500;
        	font-family: 'Poppins', sans-serif;
        	cursor: pointer;
        	padding: 0 53px;
        }
        
        /* LOADER */
         .loader {
            z-index: 9999;
            margin: 0;
            position: relative;
        }
        .cp-log-forget a {
        	font-size: 14px;
        	color: #31B7E8;
        	font-weight: 400;
        }
        .cp-log-forget {
        	padding: 15px;
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
        .cp-log-copyright {
        	margin-top: 60px;
        	margin-bottom: -60px;
        	font-size: 13px;
        	color: #fff;
        }
        
        .my-account-form .form-field {
            padding: 0 40px;
            margin-bottom: 10px;
        }

</style>

<body class="loader" style="background-image: url('{{config('app.live_url')}}/images/MIYN_landing_page_login_bg.jpg')">
    <div id="miyn-my-account" class="miyn-appointment-my-account-area miyn-iframe-popup-box2">
        <div class="miyn-my-account-contents">
            <form id="livesitelogin">
                @csrf
                <div class="cp-logo">
                    <img src="{{config('app.client_url')}}/images/miyn-Logo.png" alt="miyn logo">
                </div>
                <h3>Welcome Back Live Site !</h3>
                <p>Log In To Access Your Account</p>
                <span class="error_message"></span>
                <div class="my-account-form">
    				<div class="form-field">
    					<input type="email" id="email" name="email" required="" placeholder="Enter your email address" />
    				</div>
    				<div class="form-field">
    					<input type="password" id="password" name="password" required="" placeholder="Enter your password" />
    				</div>
    				<div class="submit-button">
    				    <input type="submit" id="changeSubmit" value="Submit">
    				</div>
                </div>
            </form>
        </div>
        <div class="cp-log-copyright">
            <p>Copyright All Rights Reserved © <?php echo date('Y'); ?> | MIYN Lead Generation.</p>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="{{config('app.live_url')}}/miyn-widget-4/js/jquery.validate.min.js"></script>
    
 
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
    $('form[id="livesitelogin"]').validate({
        errorClass: "miynPopUpFormError",
        rules: {
            password: 'required',
            email: {
              required: true,
              email: true,
            }
        },
        messages: {
            password: 'required',
            email: {
              required: "required",
              email: "Ex. name@mail.com"
            }
        },
        
        submitHandler: function(form) {
            var formdata = $(form).serialize();
            console.log(formdata);
            
            var email       = $('#email').val();
            var password    = $('#password').val();
            var csrf_token  = $('meta[name="csrf-token"]').attr('content');
            
            console.log(csrf_token);
            
            $.ajax({
                type: 'post',
                url:"{{config('app.live_url')}}/live-site-login",
                data:{_token:csrf_token, email:email, password:password},
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if(data.status == 'success'){
                        checkCookie("user_acc_uid", data.user_acc_uid);
                        checkCookie("business_uid", data.business_uid);
                        window.location.href = "{{config('app.live_url')}}/site/"+data.nickname;
                        //window.location.href = "{{config('app.apps_url')}}/authenticating";
                    }
                    if(data.status == 'error'){
                        console.log('data');
                        $('.error_message').html(data.message).css('color','red');
                    }
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

function setCookie(name, value, days) {
    const assign = name + "=" + escape(value) + ";";
    const d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    const expires = "expires="+ d.toUTCString() + ";";
    const path = "path=/;";
    const domain = "domain=" + (document.domain.match(/[^\.]*\.[^.]*$/)[0]) + ";";
    document.cookie = assign + expires + path + domain;
    console.log('assign');
    console.log(assign);
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(name, value) {
   setCookie(name, value, 30);
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    jQuery("#username").val(profile.getEmail());
}

</script>
    
</body>
</html>
    
