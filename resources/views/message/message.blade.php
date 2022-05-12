<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Box</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/Geometry.js')}}"></script>

    <style type="text/css">
        
        body {
            position: relative;
        }
        .miyn-chat-box {
            width: 320px;
            background: #efefef;
            border-radius: 4px;
            position: absolute;
            right: 20px;
            bottom: -651px;
        	border: 1px solid #ece7e7;
        }
        .chat-box-header {
            padding: 15px;
            background-image: linear-gradient(125deg, #009FDE -10%, #00618E 100%);
            position: relative;
        }
        .chat-box-header .cross-icon img{
            width: 13px;
            height: 13px;
            position: absolute;
            top: 14px;
            right: 16px;
        }
        .chat-box-header-text h4 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            margin-top: 0;
            color: #fff;
        }
        .chat-box-active-status {
            font-size: 13px;
            color: #efefef;
            margin-top: 0;
            margin-bottom: 8px;
        }
        .chat-box-header-avater {
            display: flex;
        }
        .chat-box-header-avater img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 5px;
        }
        .chat-box-body{
            
        }
        .chat-box-body-texts{
            background: #F9F9F9;
            padding: 20px 10px;
            height: 300px;
        }
        .chat-box-body-single-line{
            display: flex;
            align-items: end;
            margin-bottom: 25px;
        }
        .chat-box-body-single-line-avater img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin-right: 8px;
        }
        .chat-box-body-single-line-message {
            padding: 10px 12px;
            color: #fff;
            background: #009FDE;
            border-radius: 5px;
        }
        .chat-client-side {
            flex-direction: row-reverse;
        }
        .chat-client-side .chat-box-body-single-line-message {
            background: #fff;
            color: #626262;
        }
        .chat-client-side .chat-box-body-single-line-avater img {
            margin-right: 0;
            margin-left: 8px;
        }
        .chat-box-body-write {
            position: relative;
        }
        .chat-box-form {
        	background-color: #ffffff;
        }
        .chat-box-form textarea {
        	width: calc(100% - 20px);
            border-top: 1px solid #99EEFF;
            border-bottom: none !important;
            border-left: none;
            border-right: none;
            font-size: 13px;
            line-height: 18px;
            letter-spacing: .15px;
            border-bottom: 0;
            padding: 17px 10px 20px;
            overflow: hidden;
            resize: none;
            outline-style: none;
            
        }
        .chat-box-body-bunttons{
            position: absolute;
            right: 20px;
            top: 13px;
        }
        .chat-box-body-bunttons a {
            display: inline-block;
            line-height: 1;
        }
        .chat-box-body-bunttons-first{
            margin-right: 4px;     
        }
        .chat-box-body-bunttons img{
            widows: 30px;
            height: 30px;
                
        }
        
        @media only screen and (max-width: 767px) {
          .miyn-chat-box {
            width: 100%;
              right: 0;
              top: 0;
          }
        }        
    </style>

</head>
<body>
    <div class="miyn-chat-box">
        <div class="chat-box-header">
           <span class="cross-icon">
               <img src="{{ asset('img-chat/close.png') }}" alt="">
           </span>
            <div class="chat-box-header-text">
                <h4>Questions? Chat Wiht US!</h4>
                <p class="chat-box-active-status">
                    Was last active <span>30/03/2020</span>
                </p>
            </div>
            <div class="chat-box-header-avater">
                <a href="#"><img src="{{ asset('img-chat/avater1.png') }}" alt=""></a>
                <a href="#"><img src="{{ asset('img-chat/avater2.png') }}" alt=""></a>
            </div>
        </div>
        <div class="chat-box-body">
            <div class="chat-box-body-texts">
               <!--- Admin side start-->
                <div class="chat-box-body-single-line">
                    <div class="chat-box-body-single-line-avater">
                        <img src="{{ asset('img-chat/single-avater.png') }}" alt="">
                    </div>
                    <div class="chat-box-body-single-line-message">
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                    </div>
                </div>
                <!--- admin side end-->
                
                <!--- client side start-->
                <div class="chat-box-body-single-line chat-client-side">
                    <div class="chat-box-body-single-line-avater">
                        <img src="{{ asset('img-chat/single-avater.png') }}" alt="">
                    </div>
                    <div class="chat-box-body-single-line-message">
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                        Hello. How are you?
                        
                    </div>
                </div>
                <!--- client side end-->
            </div>
            <div class="chat-box-body-write">
                <form class="chat-box-form">
                    <textarea name="chatboxtarea" id="chatboxtarea" placeholder="Compose your message..." id="" cols="30" rows="1" class="chat-box-textarea"></textarea>
                </form>
                <div class="chat-box-body-bunttons">
                    <a href="#" class="chat-box-body-bunttons-first">
                        <img src="{{ asset('img-chat/smile.png') }}" alt="">
                    </a>
                    <a href="#">
                        <img src="{{ asset('img-chat/plus.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    
    
<!--Start of My Srcipt Script-->
			
	<script type="text/javascript">
		// Ajax code here
	/*	$('#chatboxtarea').keypress(function(event){
	
        	var keycode = (event.keyCode ? event.keyCode : event.which);
        	
        	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        	var chatboxtarea = $('#chatboxtarea').val();
        	
        	//console.log(chatboxtarea);
        	if(keycode == '13'){
        	//	alert('You pressed a "enter" key in textbox');
        		
        		$.ajax({
                    url:"{{config('app.live_url')}}/message-send",
                    type: 'POST',
                    data:{_token:CSRF_TOKEN, chatboxtarea:chatboxtarea},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                    }
                });
                
        	}
        
        });*/
	</script>
	
<!--Start of My Srcipt Script-->
			
			<script type="text/javascript">
				var MIYN_API, 
				MIYN_API=new Date();
				(function(){
    				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    				s1.async=true;
    				s1.src="{{config('app.live_url')}}/assets/js/chat.js";
    				s1.charset='UTF-8';
    				s1.setAttribute('crossorigin','*');
    				s0.parentNode.insertBefore(s1,s0);
				})();
			</script>
			
<!--End of My Srcipt Script-->
			
<!--End of My Srcipt Script-->
</body>
</html>