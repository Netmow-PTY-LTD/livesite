<?php 
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;


$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

$embed = "";
$embed = request()->query('embed');

?>

<!DOCTYPE html>
<html>
   <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Send form data</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style type="text/css">
        /*SCROLLBAR STYLE START*/
        /* width */
        body::-webkit-scrollbar {
          	width: 10px;
        }
        
        /* Track */
        body::-webkit-scrollbar-track {
          	background: #FFFFFF; 
          	border-radius: 30px;
        }
         
        /* Handle */
        body::-webkit-scrollbar-thumb {
          	background: #D5D5E1; 
          	border-radius: 30px;
          	border-width: 5px 2px 5px 2px;
          	border-style: solid;
          	border-color: #ffffff;
        }
        
        /* Handle on hover */
        body::-webkit-scrollbar-thumb:hover {
          	background: #EAEAF2; 
        }
        /*SCROLLBAR STYLE END*/
        
        /*FORM STYLE*/
        .ng-bindings {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #333333;
            margin: 15px 0;
        }
        .miyn-popup-field-form {
            display: flex;
            flex-flow: wrap row;
            justify-content: space-between;
        }
        .miyn-popup-field-form:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-popup-forms input, .miyn-popup-forms textarea, .miyn-popup-forms select {
            border: 1px solid #E3E3E3;
            padding: 12px;
            font-size: 15px;
            color: #8A8A8A;
            width: 100%;
            margin: 0;
            box-sizing: border-box;
            font-family: initial;
        }
        .miyn-popup-forms textarea {
            height: 120px;
        }
        
        .miyn-popup-forms input[readonly="true"], .miyn-popup-forms input[readonly=""] {
            background-color: 
            #e1e1e1;
        }.miyn-popup-forms input[readonly="true"], .miyn-popup-forms input[readonly=""] {
            background-color: 
            #e1e1e1;
        }
        
        .miyn-popup-field-form input[type="file"] {
            text-indent: 1000px;
            border: 2px dashed #E3E3E3;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            background-color: #FBFEFF;
            height: 48px;
        }
        .miyn-popup-field-form input[type="file"]:focus{
            border: 2px dashed #E3E3E3;
        }
        .miyn-popup-field-form input[type="file"]::before {
            content: 'Click To Select File';
            width: 110px;
            text-align: right;
            position: absolute;
            top: 6px;
            left: 50%;
            transform: translate(-50%, 0);
            text-transform: uppercase;
            font-weight: 500;
            font-size: 11px;
            line-height: 1;
            padding: 0;
            background-image: url("{{config('app.live_url')}}/images/attachment-icon.png");
            background-position: left top 7px;
            background-size: 15px auto;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }
        .miyn-popup-field-form input[type="file"]::-webkit-file-upload-button {
            display: none;
        }
        .miyn-popup-forms input:focus, .miyn-popup-forms textarea:focus{
        	outline: none;
        	border: 1px solid #E3E3E3;
        }
        
        .miyn-popup-forms .miyn-popup-field-form.name-field .miyn-popup-subfield-form {
            width: <?php if($embed) { echo '50%'; } else { echo 'calc(50% - 5px)'; } ?>;
        }
        
        .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
            width: calc(40% - 10px);
        }
        .miyn-popup-field-form.country-field.country-field input {
            width: 100%;
        }
        .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child{
            width: calc(60% - 5px);
        }
        .miyn-popup-field-form.message-field textarea {
            height: 70px;
        }
        .form-submit-button {
            margin-top: 10px;
        }
        .form-submit-button button {
            background-color: <?php echo $color_bg; ?>;
            border: none;
            line-height: 35px;
            height: auto;
            color: #ffffff;
            font-size: 12px;
            padding: 0 20px;
            min-width: 95px;
            text-align: center;
            cursor: pointer;
        }
        .miyn-yourdetails-popup .miyn-popup-back-button {
            display: inline-block;
            vertical-align: middle;
            margin-left: 20px;
            margin-top: 0px;
        }
        .miyn-yourdetails-popup .miyn-popup-actions{
        	justify-content: center;
        }
        .form-submit-button button[disabled="disabled"], .form-submit-button button[disabled="true"] {
            background-color: #e1e1e1;
            color: #999999;
            opacity: 0.9;
        }
        .miynPopUpFormError {
            color: #f00f00;
            font-weight: 100;
            font-size: 10px;
        }
        .category  h4 {
            margin-bottom: 0;
            background-color: rgba(142,142,142,0.23);
            padding:10px;
            margin-bottom:5px;
            margin-top:25px;
            cursor:pointer;
        }
        .country-fields {
            margin-left: 150px;
            width: 100%;
        }
        .country-fields input{
            width:100%;  
        }
        .form-submit-button button[disabled="disabled"], .form-submit-button button[disabled="true"] {
            background-color: #e1e1e1;
            color: #999999;
            opacity: 0.9;
        }
        
        
        /*CONFIRMATION BOX STYLE*/
        .miyn-popup-confirmation-content {
            background-color: <?php echo $color_bg; ?>;
            padding: 25px;
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
        .miynpopup-confirmation-buttons {
            margin-top: 15px;
            display: flex;
            flex-flow: wrap row;
        }
        .miynpopup-confirmation-buttons a {
            display: inline-block;
            vertical-align: top;
            line-height: 45px;
            background-color: #ffffff;
            min-width: 120px;
            text-align: center;
            color: <?php echo $color_bg; ?>;
            font-size: 11px;
            margin-right: 15px;
            text-decoration: none;
        }
        .miynpopup-confirmation-buttons a:nth-child(2) {
            background-color: transparent;
            color: #ffffff;
            border: 1px solid #ffffff;
            box-sizing: border-box;
        }
        
        @media screen and (max-width: 767px) {
        	/*YOUR DETAILS STYLE*/
        	
        	.miyn-popup-field-form.name-field input {
        	    width: <?php if($embed) { echo '100%'; } else { echo 'calc(100% - 30px)'; } ?>;
        	}
        	.miyn-popup-field-form.name-field input[name="last_child"]{
        		margin-top: 10px;
        	}
        	.miyn-popup-field-form.country-field input[name="country"] {
        	    width: 100%;
        	}
        	.miyn-popup-field-form.country-field input[name="phone_number"] {
        	    width: 100%;
        	    margin-top: 10px;
        	}
            .mob-hide{
                display:none !important;
            }
        }
        @media screen and (max-height: 600px){
        	.miyn-popup-field-form.name-field input {
        	    width: 100%;
        	}
        	.miyn-popup-field-form.name-field input[name="last_child"]{
        		margin-top: 10px;
        	}
        	.miyn-popup-field-form.country-field input[name="country"] {
        	    width: 100%;
        	}
        	.miyn-popup-field-form.country-field input[name="phone_number"] {
        	    width: 100%;
        	    margin-top: 10px;
        	}
        }
        @media screen and (max-width: 575px) {
        	.miyn-popup-forms input, .miyn-popup-forms textarea {
        	    padding: 10px;
        	    width: 100%;
        	}
        	.miyn-popup-forms select {
                padding: 10px;
            }
            .miyn-popup-forms .miyn-popup-field-form.name-field .miyn-popup-subfield-form {
                width: <?php if($embed) { echo '45%'; } else { echo '100%'; } ?>;
            }
            .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
                width: 100%;
            }
            .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child {
                width: 100%;
                margin-top: 10px;
            }
            .miyn-popup-field-form.name-field input[name="c_last_name"] {
                
                margin-top: <?php if($embed) { echo '0px'; } else { echo '10px'; } ?>; 10px;
                
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
        </style>
   </head>
    <body>
        
        <div class="loader"></div>
        
        <div id="schedule-step-4" class="widget-content ng-hide">
    		<div class="step-box">
                <h3 class="ng-bindings">Send Message</h3>
				<form id="sendGreetingFormData">
        		    <div class="miyn-popup-forms">
        				<div class="miyn-popup-field-form">
							<input type="text" id="c_subject" name="c_subject" class="field-divided" placeholder="Subject*" />
							<input type="hidden" name="business_uid" id="business_uid" value="{{ $uid }}" class="field-divided" placeholder="" >
				        </div>
        				<div class="miyn-popup-field-form">
							<textarea name="c_message" id="c_message" class="field-divided field-textarea" placeholder="Message*"></textarea>
				        </div>
				        <h3 class="ng-bindings">Contact Information</h3>
        				<div class="miyn-popup-field-form name-field">
        					<div class="miyn-popup-subfield-form">
							    <input type="text" name="c_first_name" id="c_first_name" class="field-divided" placeholder="First Name*" value="<?php echo $client_live_info->firstname ?? ''; ?>" /> 
        					</div>
        					<div class="miyn-popup-subfield-form">
							    <input type="text" name="c_last_name" id="c_last_name" class="field-divided" placeholder="Last Name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" /> 
        					</div>
        				</div>
        				<div class="miyn-popup-field-form email-field">
        				    <?php
						    $disbale = "";
						    if( ($client_live_info->email ?? '') !="") {
						       $disbale = "readonly"; 
						    } else {
						      $disbale = "";  
						    }
						    ?>
        					<input type="email" name="c_email" id="c_email" class="field-divided" placeholder="Email Address*" value="<?php echo $client_live_info->email ?? ''; ?>" <?php echo $disbale; ?>  />
        					<span class="c_email_error"></span>
        				</div>
        				<div class="miyn-popup-field-form country-field">
        					<div class="miyn-popup-subfield-form">
                                <select id="client_country_id" name="client_country_id" class="   fstdropdown-select  field-divided"  >
                                     <?php
            						    $countryid = "";
            						    $selected = "";
            						    if( ($client_live_info->country_id ?? '') !="") {
            						       $countryid = $client_live_info->country_id; 
            						    } else {
            						      $countryid = "";
            						      $disbale  =   "";  
            						    }
        						    ?>
                                    <option value="">Select Country...</option>
                                    @foreach ($country as $key => $value)
                                    <?php 
    	                                   if($value->id == ($client_live_info->country_id ?? '')) {
    	                                       $selected    = "selected=selected"; 
    	                                   } else {
    	                                       $selected ="";  
    	                                   }
	                                    ?>
                                    <option value="{{$value->id}}" data-selectedzoneid="{{$value->id}}" data-selectedzonename="{{$value->timezone_name}}"  <?php echo $selected; ?>  >{{$value->country_name}} ({{$value->country_code}})</option>
                                    @endforeach
                                </select>
                        	</div>
        					<div class="miyn-popup-subfield-form">
                                <input type="text" name="c_phone" id="c_phone"  class="field-divided" placeholder="Phone Number*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
        					</div>
        				</div>
        				<div class="form-submit-button">
        					<button type="submit" id="changeSubmit">Submit</button>
        				</div>
			        </div>
				</form>
            </div>	
        </div>
    
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        
        
        <script>
        
            function printResponseMessage(data) {
                if (data.status == 'success') {
                    $('#response_message').html('<p  style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;position: relative;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;">' + data.message + '</p>');
                }
            }
        
        </script>
        
        <script>
        
        $('form[id="sendGreetingFormData"]').validate({
            errorClass: "miynPopUpFormError",
            rules: {
                c_subject: 'required',
                c_message: 'required',
                c_first_name: 'required',
                c_last_name: 'required',
                c_phone: 'required',
                //c_note: 'required',
                c_email: {
                  required: true,
                  email: true,
                },
                client_country_id: {
                    required: {
                        depends: function(element) {
                            return $("#client_country_id").val() == '';
                        }
                    }
                }
            },
            messages: {
                c_subject: 'required',
                c_message: 'required',
                c_first_name: 'required',
                c_last_name: 'required',
                c_phone: 'required',
                //c_note: 'required',
                c_email: {
                  required: "required",
                  email: "Ex.name@domain.com"
                },
                client_country_id: 'required'
            
            },
            submitHandler: function(form) {
                var formdata = $(form).serialize(); // here $(this) refere to the form its submitting
                //console.log(formdata);
               
                $('#changeSubmit').text('Sending..');
                $("#changeSubmit").attr("disabled", true);
                
                var timezonename = $('#client_country_id option:selected').attr('data-selectedzonename');
                //console.log(timezonename);
                formdata = formdata + '&timezonename=' + timezonename;
               
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
               
                $.ajax({
                    type: 'post',
                    url:'{{config('app.live_url')}}/add-greeting-form-data',
                    data:formdata,
                    dataType: "json",
                    success: function (data) {
                        //console.log(data);
                        //alert('Data inserted successfully.');
                        $('#sendGreetingFormData')[0].reset();
                       // $('#changeSubmit').val('submit')
                        printResponseMessage(data);
                        //window.location.reload();
                        
                        var html = "";
                        html += '<div class="miyn-popup-confirmation-content">';
        					html += '<h3>Your message sent successfully.</h3>';
        					html += '<p>You will receive an email once admin, contact you</p>';
        					html += '<div class="miynpopup-confirmation-booking-info">';
        						html += '<p>Thanks for your message, Looking forward to meeting you!</p>';
        					html += '</div>';
        				html += '</div>';
            				
                        $("#schedule-step-4").html(html);
                        
                    },
                });
          }
        });
        
            /*$("#sendGreetingFormData").submit(function(e){
               
                e.preventDefault(); 
                //alert('called');
                
                var c_message       = $("#c_message").val();
                var c_subject       = $("#c_subject").val();
                var c_first_name    = $("#c_first_name").val();
                var c_last_name     = $("#c_last_name").val();
                var c_email         = $("#c_email").val();
                var c_phone         = $("#c_phone").val();
                var c_note          = $("#c_note").val();
                
                if(c_message === ''){
                     $('.c_message_error').html('<span style="color:red;">Message is required.</p>');
                }
                else{
                    $('.c_message_error').html('<span style="display:none;">');
                }
                if(c_subject === ''){
                     $('.c_subject_error').html('<span style="color:red;">Subject is required.</p>');
                }
                else{
                    $('.c_subject_error').html('<span style="display:none;">');
                }
                if(c_first_name === ''){
                     $('.c_first_name_error').html('<span style="color:red;">First name is required.</p>');
                }
                else{
                    $('.c_first_name_error').html('<span style="display:none;">');
                }
                if(c_last_name === ''){
                     $('.c_last_name_error').html('<span style="color:red;">Last name is required.</p>');
                }
                else{
                    $('.c_last_name_error').html('<span style="display:none;">');
                }
                if(c_email === ''){
                     $('.c_email_error').html('<span style="color:red;">Email is required.</p>');
                }
                else{
                    $('.c_email_error').html('<span style="display:none;">');
                }
                if(c_phone === ''){
                     $('.c_phone_error').html('<span style="color:red;">Phone is required.</p>');
                }
                else{
                    $('.c_phone_error').html('<span style="display:none;">');
                }
                if(c_note === ''){
                     $('.c_note_error').html('<span style="color:red;">Note is required.</p>');
                }
                else{
                    $('.c_note_error').html('<span style="display:none;">');
                }
                
                if(c_first_name === '' || c_last_name === '' || c_email === ''  || c_phone === ''  || c_note === ''  || c_message === ''  || c_message === '' ){
                    return false;
                }
        
               var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
               console.log(formdata);
               
               $('#changeSubmit').val('Sending..');
               
              
               //return false;
               
               $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
               
                $.ajax({
                    //alert('ajax call');
                    type: 'post',
                    url:'{{config('app.live_url')}}/add-greeting-form-data',
                    data:formdata,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        alert('Data inserted successfully.');
                        window.location.reload();
                        
                    },
                });
            });*/
        
            
           
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