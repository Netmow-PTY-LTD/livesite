<?php 

$color_bg       =  $allbusinessinfo['livestyle'][0]->action_background_color;
$action_color   =  $allbusinessinfo['livestyle'][0]->action_text_color;
$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');
?>
<!DOCTYPE html>
<html >
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>MIYN Lead Generation</title>
	
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
        *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0;
        }
        /*FORM STYLE*/
        .ng-bindings {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #ffffff;
            margin: 15px 0;
        }
        .miyn-popup-field-form {
            display: flex;
            flex-flow: wrap row;
            justify-content: space-between;
        }
		.miyn-popup-forms {
            max-width: 90%;
            margin: 20px auto 0;
            text-align: center;
        }
        .miyn-popup-field-form:not(:first-child) {
            margin-top: 10px;
        }
        .miyn-popup-subfield-form {
            width: calc(50% - 5px);
        }
        
        .miyn-popup-forms input, .miyn-popup-forms textarea, .miyn-popup-forms select {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            border: 1px solid #E3E3E3;
            padding: 10px;
            font-size: 14px;
            color: #8A8A8A;
            width: 100%;
            margin: 0;
            box-sizing: border-box;
        }
        
        .miyn-popup-forms input, .miyn-popup-forms textarea, .miyn-popup-forms select {
           /* border: 0;*/
            padding: 5px;
            font-size: 13px;
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
            width: calc(50% - 5px);
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
        .custom-head-content p {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #ffffff;
            margin: 0 0 15px;
        }
        .miyn-popup-field-form.checkbox-field {
            flex-flow: wrap row;
            margin-bottom: 20px;
            text-align: center;
            justify-content: center;
        }
        .checkbox-field h5 {
            font-size: 14px;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            width: 100%;
            margin: 5px 0 10px;
            }
        .miyn-popup-forms .name-field input[name="custom_first_name"] {
            margin-bottom: 10px;
        }
        .miyn-popup-field-form.checkbox-field .checkbox {
            min-width: 140px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: #ffffff;
        }
        .miyn-popup-field-form.checkbox-field .checkbox input {
            width: auto;
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
        
        
        /*CONFIRMATION BOX STYLE*/
        .miyn-popup-confirmation-content {
            background-color: <?php echo $color_bg; ?>;
            padding: 25px;
        }
        .miyn-popup-confirmation-content h3 {
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            color: #ffffff;
            font-size: 20px;
            text-align: center;
            font-weight: 700;
            line-height: 1.1;
            margin: 0 0 5px;
        }
        .miyn-popup-confirmation-content > p {
            font-family: 'Poppins', sans-serif;
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
            font-family: 'Poppins', sans-serif;
            color: #343A40;
            font-size: 15px;
        }
        .miynpopup-confirmation-buttons {
            margin-top: 15px;
            display: flex;
            flex-flow: wrap row;
        }
        .miynpopup-confirmation-buttons a {
            font-family: 'Poppins', sans-serif;
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
        
        
        .miyn-popup-field-form.name-field input {
            width: 100%;
        }
        
        @media screen and (max-width: 767px) {
        	/*YOUR DETAILS STYLE*/
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
                width: 100%;
            }
            .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
                width: 100%;
            }
            .miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child {
                width: 100%;
                margin-top: 10px;
            }
            .miyn-popup-field-form.name-field input[name="c_last_name"] {
                margin-top: 10px;
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
            
            .miyn-popup-header p {
                font-size: 13px!important;
                color: #343A40!important;
                margin: 0;
                line-height: 14px;
            }
            
            .checkbox-field {
                position: relative;
                padding-bottom: 15px;
            }
            
            .checkbox-field .checkbox:nth-child(2) label.miynPopUpFormError {
                position: absolute;
                bottom: -5px;
                font-weight: 300;
                width: 320px;
                text-align: center;
            }

    </style>
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
     <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
     <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <!--  <link rel="stylesheet" href="https://cdn0.vcdnita.com/assets/application-948fe1eee5ad0e0d2466f36402ea0451.css">-->
    
    <!--<script src="https://cdn.jsdelivr.app/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->
    
    
     <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
     <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    
    <!--<script src=" http://html.miyn.app/jsondata.js"></script>-->
    
    </head>

    <body>
        
        <div class="loader"></div>

    <div class="contact-information-area2">
        <form id="submitCustomformData">	   
            {!! csrf_field() !!}
    	    <div class="miyn-popup-forms">
                <div class="custom-head-content">
                    <h2 class="ng-bindings"> LET'S START PLANNING</h2>
                    <p>Let's start planning your dream event, wedding or function together. Simply fill in your details and one of our experienced event planners will be in touch within 24 hours.</p>
                </div>
				<div class="miyn-popup-field-form name-field">
					<div class="miyn-popup-subfield-form">
                        <input type="text"  name="custom_first_name" id="custom_first_name" class="field-long" placeholder="First Name*" />
                        <input type="hidden" name="business_uid" id="business_uid" value="{{ $uid }}" class="field-divided" >
					</div>
					<div class="miyn-popup-subfield-form">
                        <input type="text"  name="custom_last_name" id="custom_last_name" class="field-long"  placeholder="Last Name*" />
					</div>
				</div>
				<div class="miyn-popup-field-form email-field">
                    <input type="email" name="custom_email" id="custom_email" class="field-long" placeholder="Your Email*" />
				</div>
				<div class="miyn-popup-field-form">
					<div class="miyn-popup-subfield-form">
                        <input type="text" name="custom_phone" id="custom_phone" class="field-long" placeholder="Phone Number*" />
					</div>
					<div class="miyn-popup-subfield-form">
                        <input type="text" name="customform_date" id="customform_date" class="field-long" placeholder="Function Date* " readonly="true"  placeholder="Date" />
					</div>
				</div>
				<div class="miyn-popup-field-form">
                    <input type="text" name="custom_no_of_guests" id="custom_no_of_guests"  class="field-long" placeholder="No. of guests* " />
				</div>
				<!--<div class="miyn-popup-field-form">
                    <input type="text" name="created_at" id="created_at"  class="field-long" placeholder="created_at " />
				</div>-->
				<div class="miyn-popup-field-form checkbox-field">
				    <h5>Event Type</h5>
                    <div class="class33 checkbox"><input type="checkbox" id="custom_wedding" name="roles[]" value="false" /> Wedding </div>
                    <div class="class33 checkbox"><input type="checkbox"  id="custom_event" name="roles[]" value="false" /> Event </div>
                    <div class="class33 checkbox"><input type="checkbox" id="custom_other" name="roles[]" value="false"  /> Other </div>
				</div>
				<div class="miyn-popup-field-form">
                    <textarea name="custom_event_wedding_vanue" id="custom_event_wedding_vanue" class="field-long" rows="2" cols="50" placeholder="What is the venue of your event or wedding?" /></textarea>
				</div>
				<div class="miyn-popup-field-form">
                   <textarea name="custom_before_contact_details" id="custom_before_contact_details" class="field-long" rows="2" cols="50" placeholder="Any other details you want us to know before we contact you?" /></textarea>
			    </div>
				<div class="form-submit-button">
					<button type="submit" id="changeSubmit">Submit</button>
				</div>
            </div>
        </form>
    </div>

    <script>
        $("#customform_date").datepicker({
            dateFormat: 'DD, M dd, yy',
            changeYear: true,
            changeMonth: true,
            yearRange: '1900:+10'
        });
    </script>	
    	
    <script>
    // Disable click event untill load all content   
    var event = $(document).click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
    });
    
    $(document).ready({
        $(document).unbind('click');
    });   
    </script>
    
    <script>
    
    $('#custom_wedding').change(function(){
    
        if($("#custom_wedding").is(":checked")){
              $(this).val('true');
         }else{
              $(this).val('false');
         }
    
    });
    
    $('#custom_event').change(function(){
    
        if($("#custom_event").is(":checked")){
              $(this).val('true');
         }else{
              $(this).val('false');
         }
    
    });
    
    $('#custom_other').change(function(){
    
        if($("#custom_other").is(":checked")){
              $(this).val('true');
         }else{
              $(this).val('false');
         }
      
    });
    
    </script>
    
    
    <script>
    
    $('form[id="submitCustomformData"]').validate({
        errorClass: "miynPopUpFormError",
        rules: {
            custom_first_name: 'required',
            custom_last_name: 'required',
            custom_phone: 'required',
            customform_date: 'required',
            custom_no_of_guests: 'required',
            custom_event_wedding_vanue: 'required',
            custom_before_contact_details: 'required',
            //custom_check_capctha: 'required',
            custom_email: {
              required: true,
              email: true,
            },
            "roles[]": { required: true, minlength: 1 }
              
        },
        messages: {
            custom_first_name: 'required',
            custom_last_name: 'required',
            custom_phone: 'required',
            customform_date: 'required',
            custom_no_of_guests: 'required',
            custom_event_wedding_vanue: 'required',
            custom_before_contact_details: 'required',
            //custom_check_capctha: 'required',
            custom_email: {
              required: "required",
              email: "Ex.name@domain.com"
            }
    
        },
        submitHandler: function(form) {
            
            
            
            //var formdata = $(form).serialize(); 
            //console.log(formdata);
    
            var form = $(form)[0]; // You need to use standard javascript object here
            var fd = new FormData(form);
           
           
           
            if ($("#custom_wedding").is(":checked")) {
                 //append here;
                 var custom_wedding = $("#custom_wedding").val();
                 fd.append("custom_wedding", custom_wedding);
            }
           
            
            if ($("#custom_event").is(":checked")) {
                 //append here;
                 var custom_event = $("#custom_event").val();
                 fd.append("custom_event", custom_event);
            }
            
            if ($("#custom_other").is(":checked")) {
                 //append here;
                 var custom_other = $("#custom_other").val();
                 fd.append("custom_other", custom_other);
            }
           
            //$('#changeSubmit').text('Sending..');
            $("#changeSubmit").attr("disabled", true);
           
            //return false;
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
           
            $.ajax({
                type: 'post',
                url:'{{url("/add-custom-form-data")}}',
                data:fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    //alert('Data inserted successfully.');
                    //$('#submitCustomformData')[0].reset();
                    //$('#changeSubmit').val('Submit');
                    printResponseMessage(data);
                    //window.location.reload();
                    
                    var html = "";
                    html += '<div class="miyn-popup-confirmation-content">';
    					html += '<h3>YOUR MESSAGE HAS BEEN SENT SUCCESSFULLY.</h3>';
    					html += '<p> We will be in touch with you soon.</p>';
    					html += '<div class="miynpopup-confirmation-booking-info">';
    						html += '<p>Thanks for contacting First Class Functions! We are excited to get planning with you and will be back in touch asap.</p>';
    					html += '</div>';
    				html += '</div>';
        				
                   // html += '<br><br>';
                   // html += '<div style="padding:15px; border:1px solid #000000;background-color: wheat;">Thanks for contacting First Class Functions! We are excited to get planning with you and will be back in touch asap.</div>';
    
                    $(".contact-information-area2 ").html(html);
                    
                },
            });
      }
    });
    
        
    </script>
    
    <script>
    
        function printResponseMessage(data) {
            if (data.status == 'success') {
                $('#response_message').html('<p  style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;position: relative;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;">' + data.message + '</p>');
            }
        }
    
    </script>
    
<script>
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