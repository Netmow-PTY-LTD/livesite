<?php 
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;

$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

?>
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
    font-size: 16px;
}
.miyn-popup-field-form {
    display: flex;
    flex-flow: wrap row;
    justify-content: space-between;
}
.miyn-popup-forms {
    max-width: 90%;
    margin: 0 auto;
}
.miyn-popup-field-form:not(:first-child) {
    margin-top: 20px;
}
.miyn-popup-forms input, .miyn-popup-forms textarea, .miyn-popup-forms select {
    font-family: initial;
    border: 1px solid #E3E3E3;
    padding: 12px;
    font-size: 15px;
    color: #8A8A8A;
    width: 100%;
    margin: 0;
    box-sizing: border-box;
    font-family: inherit;
}
.miyn-popup-forms textarea{
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
    line-height: 30px;
    /*text-align: center;*/
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
    width: calc(50% - 10px);
}
.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:first-child {
    width: calc(40% - 10px);
}
.miyn-popup-field-form.country-field.country-field input {
    width: 100%;
}
.miyn-popup-field-form.country-field.country-field .miyn-popup-subfield-form:last-child{
    width: calc(60% - 10px);
}
.miyn-popup-field-form.message-field textarea {
    height: 70px;
}
.form-submit-button {
    margin-top: 20px;
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
	    width: calc(100% - 30px);
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

</style>


<div class="loader"></div>

<div id="schedule-step-4" class="widget-content ng-hide">
	<div class="step-box">
		<form id="sendShareDocumentData" method="post" enctype="multipart/form-data">
		    {!! csrf_field() !!}
		    <div class="miyn-popup-forms">
                <h3 class="ng-bindings">Share Document <span style="font-size:12px">(Max. File Size 2Mb)</span></h3>
				<div class="miyn-popup-field-form">
					<input type="file" name="client_file" id="client_file" class="field-divided" placeholder="File" />
					<input type="hidden" name="business_uid" id="business_uid" value="{{ $uid }}" class="field-divided" placeholder="" >
					<label for="client_file" class="custom-file-name">
				</div>
				<div class="miyn-popup-field-form">
					<input type="text" name="client_document" id="client_document"  class="field-divided" placeholder="Document Title*" />
					<span class="client_document_error"></span>
				</div>
				<div class="miyn-popup-field-form">
					<textarea name="client_message" id="client_message" class="field-divided field-textarea" placeholder="Message*"></textarea>
					<span class="client_message_error"></span>
				</div>
    	        <h3 class="ng-bindings">Contact Informations</h3>
				<div class="miyn-popup-field-form name-field">
					<div class="miyn-popup-subfield-form">
					    <input type="text" name="c_first_name" class="field-divided" id="c_first_name" placeholder="First Name*" value="<?php echo $client_live_info->firstname ?? ''; ?>" /> 
					    <span class="c_first_name_error"></span>
					</div>
					<div class="miyn-popup-subfield-form">
					    <input type="text" name="c_last_name" id="c_last_name" class="field-divided"  placeholder="Last Name*" value="<?php echo $client_live_info->lastname ?? ''; ?>" /> 
					    <span class="c_last_name_error"></span>
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
					<input type="email" name="c_email" id="c_email" class="field-divided" placeholder="Email Address*" value="<?php echo $client_live_info->email ?? ''; ?>" <?php echo $disbale; ?> />
					<span class="c_email_error"></span>
				</div>
				<div class="miyn-popup-field-form country-field">
					<div class="miyn-popup-subfield-form">
                        <select id="client_country_id" name="client_country_id" class="fstdropdown-select  field-divided"  >
                            <option value="">Select Country...</option>
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
                            @foreach ($country as $key => $value)
                             <?php 
                               if($value->id == ($client_live_info->country_id ?? '')) {
                                   $selected    = "selected=selected"; 
                               } else {
                                   $selected ="";  
                               }
                            ?>
                            <option value="{{$value->id}}" <?php echo $selected; ?> >{{$value->country_name}} ({{$value->country_code}})</option>
                            @endforeach
                        </select>
                	</div>
					<div class="miyn-popup-subfield-form">
                        <input type="text" name="c_phone" id="c_phone" class="field-divided" placeholder="Phone*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $client_live_info->phone ?? ''; ?>" />
                        <span class="phone_error"></span>
					</div>
				</div>
				<div class="form-submit-button">
					<button type="submit" id="changeSubmit">Submit</button>
				</div>
	        </div>
		</form>
	</div>
</div>

<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!--<script src="https://cdn.jsdelivr.app/jquery.validation/1.16.0/jquery.validate.min.js"></script>-->

 <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
 <script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<script>

    function printResponseMessage(data) {
        if (data.status == 'success') {
            $('#response_message').html('<p  style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;position: relative;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;">' + data.message + '</p>');
        }
    }

</script>

<script>

$('form[id="sendShareDocumentData"]').validate({
    errorClass: "miynPopUpFormError",
    rules: {
        client_document: 'required',
        client_message: 'required',
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
        client_document: 'required',
        client_message: 'required',
        c_first_name: 'required',
        c_last_name: 'required',
        c_phone: 'required',
        //c_note: 'required',
        c_email: {
          required: "required",
          email: "name@domain.com"
        },
        client_country_id: 'required',
    
    },
    submitHandler: function(form) {
       				
		
        var form = $(form)[0]; // You need to use standard javascript object here
		var fd = new FormData(form);
		
		var file_data = $('#client_file')[0].files[0];
		if(file_data !="") {
		    //console.log(file_data);
			fd.append("client_file", file_data);
		}
		
		//console.log(fd);

        $('#changeSubmit').text('Sending..');
        $("#changeSubmit").attr("disabled", true);
        
        console.log('{{config('app.live_url')}}/add-new-share-document-form-data');
        //alert('check send file');
        
        $.ajax({
            type: 'post',
            url:'{{config('app.live_url')}}/add-new-share-document-form-data',
            data:fd,
            processData: false,
            contentType: false,
            success: function (data) {
                //console.log(data);
                //$('#changeSubmit').val('Submit');
                //alert('data inserted successfully.');
                $("#sendShareDocumentData")[0].reset();
                printResponseMessage(data);
                //window.location.reload();
                
                var html = "";
                html += '<div class="miyn-popup-confirmation-content">';
					html += '<h3>Your document sent successfully.</h3>';
					html += '<p>You will receive an email once admin, contact you</p>';
					html += '<div class="miynpopup-confirmation-booking-info">';
						html += '<p>Thanks for your message, Looking forward to meeting you!</p>';
					html += '</div>';
				html += '</div>';
                
                $("#schedule-step-4").html(html);
                
            }
        });
  }
});

    /*$("#sendShareDocumentData").submit(function(e){
        e.preventDefault(); 
        //alert('called');
        var c_first_name    = $("#c_first_name").val();
        var c_last_name     = $("#c_last_name").val();
        var c_email         = $("#c_email").val();
        var c_phone         = $("#c_phone").val();
        var c_note          = $("#c_note").val();
        var client_document = $("#client_document").val();
        var client_message  = $("#client_message").val();
        
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
             $('.c_phone_error').html('<span style="color:red;">Phone number is required.</p>');
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
        if(client_document === ''){
             $('.client_document_error').html('<span style="color:red;">Document title is required.</p>');
        }
        else{
            $('.client_document_error').html('<span style="display:none;">');
        }
        if(client_message === ''){
             $('.client_message_error').html('<span style="color:red;">Document message is required.</p>');
        }
        else{
            $('.client_message_error').html('<span style="display:none;">');
        }
        
        if(c_first_name === '' || c_last_name === '' || c_email === ''  || c_phone === ''  || c_note === ''  || client_document === ''  || client_message === '' ){
            return false;
        }
        
        var form = $('#sendShareDocumentData')[0]; // You need to use standard javascript object here
		var fd = new FormData(form);
			//var fd = new FormData();
										
									
		var formdata = $('#sendShareDocumentData').serialize(); 
		// page_id=&category_id=15&method=upload&required%5Bcategory_id%5D=Category+ID
		console.log(formdata);
		
		//return false;
		
		
		var file_data = $('#client_file')[0].files[0];
		if(file_data !="") {
		    console.log(file_data);
			fd.append("client_file", file_data);
		}
		
		//var formdata = $('#sendStaffData').serialize(); 
		console.log(fd);

       
       
       $('#changeSubmit').val('Sending..');
        
       //console.log(formdata);
       //return false;
       

        $.ajax({
            type: 'post',
            url:'{{url("/add-share-document-form-data")}}',
            data:fd,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                $('#changeSubmit').val('Submit');
                alert('data inserted successfully.');
                $("#sendShareDocumentData")[0].reset();
                window.location.reload();
            }
        });
    });*/
    
    $('#sendShareDocumentData #client_file').change(function() {
        var file = $(this)[0].files[0].name;
        
        if (file) {
            var extension = $(this)[0].files[0].name.substr($(this)[0].files[0].name.lastIndexOf('.') + 1).toLowerCase();
            var allowedExtensions = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'png', 'jpeg', 'jpg', 'rar', 'zip'];
            //console.log($(this)[0].files[0].name);
              
             if (allowedExtensions.indexOf(extension) === -1) 
             {      
                alert('Please upload valid file. Thanks!!')
                return false;
             }
             if($(this)[0].files[0].size > 2000000) {
               alert("Please upload file less than 2MB. Thanks!!");
               return false;
            }
        }
         
        $('.custom-file-name').text(file);
    });

    
   
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