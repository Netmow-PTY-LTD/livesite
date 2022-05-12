
<!DOCTYPE html>
<html>
<head>
	<title>MIYN Greeting Widget</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />


	
	<style>


        
	</style>
	
</head>
<body class="loader">
    
<div id="appointment-leave-details" class="miyn-appointment-leave-details-area miyn-iframe-popup-box2">
	<div class="appointment-submit-details-content">
	    
	    
		
	</div>
</div>
<div id="appointment-success" class="miyn-appointment-success-area miyn-iframe-popup-box2">
	<div class="appointment-success-content">
		<div class="appointments-icon">
			<img src="{{ asset('miyn-widget-4/images/success-icon.png') }}" alt="success-icon.png"/>
		</div>
		<div class="appointments-messages">
			<h3>Your booking request was sent</h3>
			<p>You will receive an email once admin, confirm your booking</p>
			<p><strong>Thanks for your booking, Looking forward to meeting you!</strong></p>
		</div>
		<div class="appointments-information">
			<ul>
				<li>
					<div class="info-title">Service Name</div>
					<div class="info-contents">In-office appointment </div>
				</li>
				<li>
					<div class="info-title">Your Meeting with</div>
					<div class="info-contents">Jesse Pigdon</div>
				</li>
				<li>
					<div class="info-title">Date</div>
					<div class="info-contents">
						<ul>
							<li>Jan 16, 12:15 PM</li>
							<li>Jan 16, 3.45 PM</li>
							<li>Jan 16, 7.00 PM</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
		<div class="appointment-success-actions">
			<a href="#appointment-lists">Book another</a>
			<a href="#">Manage Booking</a>
		</div>
	</div>
</div>

    
<script src="{{ asset('miyn-widget-4/js/jquery.min.js') }}"></script>
<script src="{{ asset('miyn-widget-4/js/jquery-ui.js') }}"></script>
<script src="{{ asset('miyn-widget-4/js/jquery-1.12.4.js') }}"></script>
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
    		
    		
    		//
    		
    		$('#client_country_id option').filter(function() { 
                    return ($(this).attr('data-selectedzonename') == Intl.DateTimeFormat().resolvedOptions().timeZone); //To select Blue
            }).prop('selected', true);
    		
    		
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
                      email: "name@email.com"
                    },
                    client_country_id: 'required'
                
                },
                submitHandler: function(form) {
                    var formdata = $(form).serialize();
                    //console.log(formdata);
                   
                    //$('#changeSubmit').text('Sending..');
                    $("#changeSubmit").attr("disabled", true);
                    
                    var timezonename = $('#client_country_id option:selected').attr('data-selectedzonename');
                    //console.log(timezonename);
                    formdata = formdata + '&timezonename=' + timezonename;
                
                    //console.log('call');
                    //return false;
                    
                    
                    $.ajax({
                        type: 'post',
                        url:'{{config('app.live_url')}}/add-new-greeting-form-data',
                        data:formdata,
                        dataType: "json",
                        success: function (data) {
                            //console.log(data);
                            $('#sendGreetingFormData')[0].reset();
                            //$('.appointment-show').trigger('click');
                            //console.log('success');
                            
                           // $('#changeSubmit').val('submit')
                            //printResponseMessage(data);
                            //window.location.reload();
                            
                            var html = "";
                            html += '<div class="appointment-success-content">';
        					    html += '<div class="appointments-icon">';
        					        html += '<img src="{{config('app.live_url')}}/miyn-widget-4/images/success-icon.png" alt="success-icon.png"/> ';
        					    html += '</div>';
        					    
        					    html += '<div class="appointments-messages">';
        					        html += '<h3>YOUR MESSAGE SENT SUCCESSFULLY.</h3>';
        					        html += '<p>You will receive an email once admin, contact you</p>';
        					        html += '<p><strong>Thanks for your message, Looking forward to meeting you!</strong></p>';
        					    html += '</div>';
        					    
        					    
        					    /*html += '<div class="appointment-success-actions">';
        					        html +='<a href="#appointment-lists">Book another</a>';
        					        html +='<a href="#">Manage Booking</a>';
        					    html += '</div>';*/
        						
        				    html += '</div>';
                        
                            $("#appointment-leave-details").html(html);
                            
                        },
                    });
              }
            });
    		
    
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