<?php //dd($chat_user_info); ?>
<html>
    
<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style type="text/css">
            *{
            	margin:0px;
            	padding:0px;
            }
            body, html {
                background-color: gray;
                height: 100%;
            }
            
            #videos {
                position: relative;
                width: 100%;
                height: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            
            #subscriber {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 10;
                overflow: hidden;
            }
            
            #publisher {
                position: absolute;
                width: 180px;
                height: 120px;
                bottom: 10px;
                left: 10px;
                z-index: 100;
                border: 3px solid white;
                border-radius: 3px;
                z-index: 9999;
            }
            
            /* Calling */
            .call-status {
                position: absolute;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.8);
                font-size: 22px;
                text-transform: uppercase;
                color: #0e1130;
                top: 0;
                z-index: 999999999;
            }
            
            
            /* Buttons */
            .miyn-vid-call-buttons {
                position: fixed;
                top: 50%;
                right: 20px;
                z-index: 99999999;
                transform: translate(0, -50%);
            }
            .miyn-vid-call-buttons ul li {
                list-style: none;
            }
            .miyn-vid-call-buttons ul li a {
            	margin: 8px;
            	background: #FFF;
            	color: #2DB9EB;
            	width: 40px;
            	height: 40px;
            	padding: 0;
            	font-size: 22px;
            	display: flex;
            	align-items: center;
            	justify-content: center;
            	border-radius: 100%;
            	text-decoration: none;
            	box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            }
            .miyn-vid-call-buttons ul li a i {
                font-size: 18px;
            }
            .miyn-vid-call-buttons ul li a.chat-btn-active, .miyn-vid-call-buttons ul li a:hover {
            	background: #2DB9EB;
            	border-color: #2DB9EB;
            	color: #FFF;
            }
            
            a#peer-close {
                background-color: red;
                color: white;
            }
            
            a#peer-close:hover {
                background-color: white;
                color: red;
            }
            
        </style>
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>
    <div class="call-status">
        Calling .. 
    </div>
    <div class="miyn-vid-call-buttons">
        <ul>
            <!--<li><a href="#" id="peer-vedio" class="chat-btn-active peer-vedio" ><i class="fa fa-video-camera"></i></a></li>
            <li><a href="#" id="peer-audio"><i class="fa fa-microphone"></i></a></li>
            <li><a href="#" id="peer-capture"><i class="fa fa-file-image-o"></i></a></li>
            <li><a href="#" id="peer-fullscreen"><i class="fa fa-th-large"></i></a></li>
            <li><a href="#" id="peer-cancel"><i class="fa fa-sign-out"></i> </a></li>-->
            <li><a href="#" id="peer-close" onclick="callDisconnect()"><i class="fa fa-times"></i></a></li>
        </ul>
    </div>
    
    
<?php 

$sessionId  =  $chat_user_info->open_session_id;  
$token      =  $chat_user_info->open_token_id; 
$call_type  =  $chat_user_info->call_type; 
$peer_id    = request()->query('peer_id');
//dd($sessionId);


?>
                
    
<script charset="utf-8">

var apiKey      = "{{ env('OPETOK_APP_KEY') }}";
var sessionId   = '<?php echo $sessionId; ?>';
var token       = '<?php echo $token; ?>';
var peer_id     = '<?php echo $peer_id; ?>';

var call_type   = '<?php echo $call_type; ?>';
var vedio_type   = '<?php if($call_type == 'video') { echo 'true'; } else { echo 'false'; } ?>';
var bool_value = vedio_type == "true" ? true : false;


console.log('apiKey');
console.log(apiKey);

// Handling all of our errors here by alerting them
function handleError(error) {
  if (error) {
    console.log(error.message);
  }
}


function initializeSession() {
  
  // Subscribe to a newly created stream
  session.on('streamCreated', function(event) {
      
        session.subscribe(event.stream, 'subscriber', {
          insertMode: 'append',
          width: '100%',
          height: '100%'
        }, handleError);
    
        if (event.stream &&  session.connection.id !="") {
            // Signal received from another client
            console.log(session);
            console.log('Signal Received from another client');
  
            $('.call-status').hide();
            
            window.opener.ringerAudio.pause();
            
            // call-staus = accepted
            
            var csrf_token      = $('meta[name="csrf-token"]').attr('content');
            console.log('accepted');
            console.log('peer_id');
            console.log(peer_id);
            console.log(csrf_token);
            console.log('csrf_token');
            //return false;
            
            $.ajax({
                type: 'post',
                url:'{{config('app.live_url')}}/call-status-accepted',
                data:{_token:csrf_token, peer_id:peer_id },
                dataType:'json',
                success: function (data) {
                    console.log(data);
                }
            });
            
            
    
        } else {
            console.log('Signal Note Received');
        }
        
        console.log('streamCreated');
    
  });
  


  // Create a publisher
  var publisher = OT.initPublisher('publisher', {
    insertMode: 'append',
    width: '180',
    height: '120',
    publishAudio:true,
    publishVideo: bool_value
  }, handleError);

  // Connect to the session
  session.connect(token, function(error) {

   console.log(session);
   
    if (error) {
      handleError(error);
    } else {
      session.publish(publisher, handleError);
    }
    
    console.log('session.connect');
    
  });
  

    session.on('connectionCreated', function () {
      //ringerAudio.pause();
      console.log("connectionCreated");
      //connectionid = session.connection.id;
      //addOpentokData();
    });
    
    /**
     * A client, other than your own, has disconnected from the session.
     */
     
    session.on('connectionDestroyed', function(){
        console.log("connectionDestroyed");
        
        
    });
   
  
    session.on('streamDestroyed', function(event){
        console.log("streamDestroyed");
        window.opener.once_time = 0;
        window.close();
    });
    
    session.on('sessionConnected', function(event){
        console.log("sessionConnected");
    });
  
  
}

var session = OT.initSession(apiKey, sessionId);
// (optional) add server code here
initializeSession();


function callDisconnect() {
    window.opener.once_time = 0;
    window.close();
}

</script>


</body>
</html>