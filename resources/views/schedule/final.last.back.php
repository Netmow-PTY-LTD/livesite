<?php 
$color_bg =  $allbusinessinfo['livestyle'][0]->action_background_color;

$appurl         = config('app.apps_url');
$liveurl        = config('app.live_url');
$cdnurl         = config('app.cdn_url');
$mainurl        = config('app.main_url');

?>
<!DOCTYPE html>
<html >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>MIYN Shedule Test</title>




<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('online_schedule/css')}}/indexst.css">
<link rel="stylesheet" href="{{asset('online_schedule/css')}}/indexst2.css">


 
 
</head>

<style type="text/css">

label.miynPopUpFormError {
    color:red !important;
    display:block;
    width:100%;
}


.form-style-1 {
	margin:10px auto;
	max-width: 400px;
	padding: 0px 12px 10px 0px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
	clear:both !important;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
	display:block;
	font-weight: bold;
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
	max-width:100%;
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
	width: 49%;
	float:left;
	margin-bottom:10px;
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
	background: <?php echo $color_bg; ?>;
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
	/*color:red;*/
}

.category  h4 {
    margin-bottom: 0;
    background-color: rgba(142,142,142,0.23);
    padding:10px;
    margin-bottom:5px;
    margin-top:25px;
    cursor:pointer;
}

.step-box ul.service-item li.service-type {
    background: <?php echo $color_bg; ?>;
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $color_bg; ?>), color-stop(100%, <?php echo $color_bg; ?>));
    background: -webkit-linear-gradient(top,<?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
    background: -moz-linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
    background: -o-linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
    background: linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $color_bg; ?>', endColorstr='<?php echo $color_bg; ?>');
}

.slots-picker .slots ul a.optional-time.checked, .slots-picker .slots ul a.event-optional-time.checked {
    border: 1px solid <?php echo $color_bg; ?>;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    background: <?php echo $color_bg; ?>;
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $color_bg; ?>), color-stop(100%, <?php echo $color_bg; ?>));
    background: -webkit-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
    background: -moz-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
    background: -o-linear-gradient(top, <?php echo $color_bg; ?>, <?php echo $color_bg; ?>);
    background: linear-gradient(top, <?php echo $color_bg; ?>,<?php echo $color_bg; ?>);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $color_bg; ?>', endColorstr='<?php echo $color_bg; ?>');
    text-shadow: none;
    color:#ffffff !important;
}
.slots-picker a.ui-state-active {
    background: none;
    border: 1px solid <?php echo $color_bg; ?>;
    font-weight: bold;
    background-color: <?php echo $color_bg; ?> !important;
    color: #FFFFFF;
}


.show-hide-timezone {
    position: absolute;
    background-color: #f7f7f7;
    padding: 5px;
    margin-top: 3px;
    width: 500px;  
}

.poweredby {
    clear:both;
    text-align:center;
    color: #999ba1;
    font-size: 9px !important;
    text-decoration: none;
    margin-top: 20px;
}

.poweredby a:link, .poweredby a:visited{
    clear:both;
    text-align:center;
    color: #999ba1;
    font-size: 9px !important;
    text-decoration: none;
}

.required{
    color:red;
}



/* Confirm message */
.margintop60 {
    margin-top:60px;
}

.main-widget-plug{
    width:700px;  
}
 

@media only screen and (max-width: 767px) {
    .main-widget-plug{
        width: 100%; 
    }
    
    
    .show-hide-timezone {
        position: relative;
        background-color: #f7f7f7;
        padding: 5px;
        margin-top: 3px;
        max-width: 100%; 
        clear:both;
    }
    
    .step-box ul.services-list > li img {
        max-width:37px;
        max-height:37px;
        padding:5px;
    }
}

</style>


<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
 <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
 <script src="{{asset('js/jquery-ui.js')}}"></script>
<!--  <link rel="stylesheet" href="https://cdn0.vcdnita.com/assets/application-948fe1eee5ad0e0d2466f36402ea0451.css">-->

<script src="{{asset('js/jquery.validate.min.js')}}"></script>

<!--<script src=" http://html.miyn.net/jsondata.js"></script>-->
 
<?php


$ticker = file_get_contents('https://api.miyn.net/api/schedule/'.$uid);   
$obj = json_decode($ticker,true); // Split the JSON into arrays.
$jsondata =  json_encode($obj);


//echo '<pre>';
//echo $jsondata;
//echo '</pre>';

?>

<script>

//var servicelist = JSON.parse(text);

var calledtime = 0;

var serviceList   = <?php echo $jsondata; ?>;

var objfstr = JSON.stringify(serviceList)


/*  
===================================
End First Variable Declaration
===================================
*/
var b_id = '<?php echo $allbusinessinfo->id; ?>';

var modulestep	= '', 
	widghtid	=0, 
	staffid		=0, 
	stepform	=0;
	
var availability = '',
    minDate = '',
    maxDate = '';
	
//var serviceList 	= ['My Sevice', 'phone Call', 'Meeting'];	


		
var service 			= '';
var staffname 			= '';
var serviceamt 			= '';
var servicecurrencty 	= '';
var total_service_minutes 	= 0;

var weekened 	= []; // [0, 1];

var step = 0;
var preperationTime = 0; 


var offset = '+00'; // '+6'
var newoffset = "";

var startHour = 0;
var startMin = 0;
var endHour = 0;
var endMin = 0;  

var count = 0;

var maxslot = 3;
var selectedDates = [];
var dateWiseTimes = [];
var selectedstaff = [];



/*  
===================================
First Time date Selection
===================================
*/

/*  Step -4   */
var today = new Date();
var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

console.log("Curent time frist time :"+date);

var startDate 			= today.getDate();
var startMonth 			= today.getMonth()+1;
var startYear 			= today.getFullYear();

var startHourTR 		= today.getHours();
var startMinTR 			= today.getMinutes();
var numberofweekday 	= today.getDay();


var d = new Date()
var gmtHours = -d.getTimezoneOffset()/60;
//document.write("The local time zone is: GMT " + gmtHours);
var currenttimewithzone = 'Current Time Zone Offset : '+gmtHours+ ' , ' + /\((.*)\)/.exec(d.toString())[1]+' , Maxslot : '+maxslot;
console.log(/\((.*)\)/.exec(d.toString())[1]);
	
</script>




<body>


<div class="main-widget-plug" id="myCtrl" ng-app="myApp" ng-controller="myCtrl"  style="margin-left:auto; margin-right:auto; " ng-cloak>

    <div id="schedule-step-1" class="widget-content">
		<div class="step-box">
		    
			<ul class="categories-list single"  >
			<!-- ngRepeat: category in categories -->
			<!-- ngIf: category.services.length -->
			<li class="category ng-scope"  ng-repeat="cateogoryseleted in categorylistang"  >
					<h4 ng-if="categorylistang.length > 1" class="ng-scope">@{{cateogoryseleted.service_category_name}}</h4>
			<!-- ngIf: categories.length > 1 -->
			<!-- ngIf: categories.length > 1 -->
			
					<ul class="services-list" >
					    
				<!-- ngRepeat: service in category.services -->
				<li ng-click="myFunc(serviceselecteds)"  class="ng-scope" ng-repeat="serviceselecteds in cateogoryseleted.service">
							<ul class="service-item">
								<li class="service-type" >
								    
								<!-- ngIf: !serviceselecteds.imagepath -->
								<div class="icon ng-scope icon-phone2" >
								    
								    <img src="https://app.miyn.net/images/service/@{{serviceselecteds.imagepath}}" ng-if="serviceselecteds.isimage == 'true'"  />
								    <i class="fa fa-address-book" aria-hidden="true" ng-if="serviceselecteds.isimage == 'false'"></i>

								</div>
								<!-- end ngIf: !serviceselecteds.photo_path -->
								
								<!-- ngIf: service.imagepath -->
								</li>
								<li class="with-info service-name">
									<div class="service-info">
									<b  class="ng-binding">@{{serviceselecteds.service_name}}</b>
									<br>
									<div class="description ng-binding">@{{serviceselecteds.service_description}}</div>
									</div>
								</li>
								<!--<li class="with-info service-price-replacement" ></li>-->
								<li class="with-info service-price " >
									<div class="ico"></div>
									<span class="ng-binding">@{{serviceselecteds.service_price}} @{{serviceselecteds.service_currency}}</span>
								</li>
								
								<li class="spacer"></li>
								<li class="with-info service-duration">
									<div class="ico"></div>
									<span class="ng-binding">@{{serviceselecteds.sevice_time_h}} @{{serviceselecteds.sevice_time_h_title}} @{{serviceselecteds.sevice_time_m}} @{{serviceselecteds.sevice_time_m_title}}</span>
								</li>
							</ul>
						</li>
				<!-- end ngRepeat: service in category.services -->

				</ul>
				</li>
			<!-- end ngIf: category.services.length -->
			<!-- end ngRepeat: category in categories -->
			</ul>	
		</div>
</div>
    <div id="schedule-step-2" class="widget-content ng-hide">
				<div class="step-box">
					<div class="ng-view fragment-wrapper ng-scope" id="scheduler">
						<div class="fragment  active">
								
							<div class="title" >
							<h4 class="clearfix">
								<span class="title-span">
									<strong class="ng-binding">
										@{{service}}
										<small class="ng-binding">(@{{servicetime_h}} @{{sevice_time_h_title}} @{{servicetime_m}} @{{sevice_time_m_title}})</small>
									</strong>
								</span>
							</h4>
				</div>

				<h3  class="ng-binding">Please select:</h3>
				<ul class="staffs-list scrolled-list"   style="max-height: 100%; overflow-y:scroll">
						
				
				<!-- end ngRepeat: staff in staffs -->
						<li ng-click="setStaff(staff)" ng-repeat="staff in staffrecords" class="ng-scope">
							<ul class="staff">
							<li class="pic" ng-click="setStaff(staff)">
                          
							<img height="50" width="50" src="<?php echo $appurl ?>/images/staff/@{{ staff.staff_image == '' ? staff.staff_image = 'avatar.jpg' : staff.staff_image=staff.staff_image }}" />
							
							</li>
							<li class="details">
							<b class="detail ng-binding" ng-bind="staff.staffname"></b>
							<br>
							<div class="detail ng-binding" ng-bind="staff.staffproffesion" ></div>
							<div class="clear"></div>
							</li>
							</ul>
						</li>
				<!-- end ngRepeat: staff in staffs -->
				</ul>

		<div class="clearfix">
				<div class="" style="float:right">
					<a class=" continue-button i18n-odir ng-binding" href="" onClick="serviceSelect()" >Back</a>
					
				</div>	
		</div>


			</div>
		</div>
				</div>
				
		

</div>
    <div id="schedule-step-3" class="widget-content ng-hide">
		<div class="step-box">
			<div class="mobile-overlay ng-hide" ng-show="$root.loading"></div>
			<div class="ng-view fragment-wrapper ng-scope" id="scheduler">
			<div class="fragment  active">
			
				<div class="title ng-hide">
				<h4 class="clearfix">
					<span class="title-span">
							<strong class="ng-binding">
								 @{{currenttimewithzone}}  
							</strong>	
					</span>
					
				</h4>
				</div>
				
				
			
				<div class="title">
				<h4 class="clearfix">
					<span class="title-span">
							<strong class="ng-binding">
								@{{service}}
								<small class="ng-binding">(@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}}  @{{sevice_time_m_title}})</small>
							</strong>
							<span class="space-before ng-binding" >with</span>
								<div class="avatar-image avatar-sm ng-hide" >
								<img  src="https://www.live.miyn.net/images/img-avatar-staff.jpg">
								</div>
							<strong ng-bind="staffname" class="ng-binding">@{{staffname}}</strong>
					</span>
					<ul class="selected-slots" style="display: inline-block;"></ul>
				</h4>
				</div>
				
				<h3 title="New Service">
					<span  class="ng-binding">
						<small >@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}} @{{sevice_time_m_title}}</small>
						Your preferred times (suggest up to 3):
					</span>
				</h3>
				
				<div class="slots-picker-container">
						<div class="slots-picker web">
							<div class="picker clearfix">
								<div class="calendar " id="date_picker" style="position: static; zoom: 1;">
							
							</div>
							
								<div class="availability">
									<div class="header">
										<div class="loading-header ng-binding" style="display: none;">Availability</div>
											<div class="selected-day-header" style="display: block;">
												<span class="available-text ng-binding">Availability for</span>
												<span id="alternate1" class="date">&nbsp;</span>
										</div>
									</div>
									
									<div id="slots" class="slots" style="display: block;">
									<!--<ul id="timeslot" class="column-0" style="left: 0px;">
									
								
									
									</ul>-->
									</div>
									
								</div>
								
								
								
								
							</div>
						</div>
						
						<div class="clearfix">
						        <div class="show-hide-timezone">
						            Your current timezone <span id="ckarea"></span> , want to change? <a href="javascript:void(0)" id="ClickToHide" onclick="ClickToHide()" >  click this <i class="fa fa-question-circle" aria-hidden="true"></i> </a>

						        </div>
						        <div class="" style="float:left;">
								    
            						Select your timezone : 
            						<select class="time-zone-picker ng-binding" id="time_zone" name="time_zone"  style="display: inline-block;">
                                    <?php 
            				        $array = $timezone;
                                    foreach($array as $key=>$val){ 
                                    ?>  
                                        <option value="{{$val->timezone_offset}}">({{$val->timezone_gmt}}) {{$val->city_name}}</option>
                                    <?php 
                                    }				
                                    ?> 
                                    </select>
                        
								</div>
								<div class="" style="float:right">
									<a class=" continue-button i18n-odir ng-binding" href="" onClick="staffSelect()()" >Back</a>
									<a class="standard-button continue-button i18n-odir ng-binding" href="" onClick="sheduleForm()" >Continue</a>
								</div>
								
						</div>

				</div>
				


<div class="title ng-hide" >
				<h4 class="clearfix">
					<span class="title-span">
					    
							<strong id="ng-time" class="ng-binding">
								Start Time <small> @{{starttime_hD}} : @{{starttime_mD}} AM </small>
								 End Time <small>  @{{endtime_hD}} : @{{endtime_mD}} PM </small>
								 Preparation <small> @{{preparation}} @{{sevice_time_m_title}} </small>
							</strong>
							
								
							
					</span>
					
				</h4>
				</div>
				
			</div>
			</div>
		</div>
	</div>
	<div id="schedule-step-4" class="widget-content ng-hide">
		<div class="step-box">
			
			<div class="title">
				<h4 class="clearfix">
					<span class="title-span">
							<strong class="ng-binding">
								@{{service}}
								<small class="ng-binding">(@{{servicetime_h}} @{{sevice_time_h_title}}  @{{servicetime_m}}  @{{sevice_time_m_title}})</small>
							</strong>
							<span class="space-before ng-binding" >with</span>
							
							<strong ng-bind="staffname" class="ng-binding">@{{staffname}}</strong>
							
					</span>
					<ul class="selected-slots" style="display: inline-block;"></ul>
				</h4>
				</div>
	
			<div class="">
			
<div class="contact-information-area2 ">
<h3  class="ng-bindings">Contact Info</h3>

<table class="contact-">
    <tbody>
        <tr>
            <td>
                <form id="submitBookingformData">
                    
                    <div id="response_message">
    				</div>
    					   
                    {!! csrf_field() !!}
                    <ul class="form-style-1">
                        <li>
                            <label>Full Name <span class="required">*</span></label>
                            
                            <div class="field-divided" style="padding-right:1%">
                                <input type="text"  name="c_first_name" id="c_first_name" class="field-long" placeholder="First name" />
                            </div>
                            <div class="field-divided" style="padding-left:1%">
                            <input type="text"  name="c_last_name" id="c_last_name" class="field-long"  placeholder="Last name" />
                            </div>
                           
                            
                        </li>
                        <li>
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="c_email" id="c_email" class="field-long"  />
                            <span class="email_error"></span>
                        </li>
                         <li>
                             
                            <div class="field-divided" style="padding-right:1%">
                                <label>Country <span class="required">*</span></label>
                                
                                <select id="client_country_id" name="client_country_id" class="   fstdropdown-select " >
                                <option value="">Select Country...</option>
                                @foreach ($country as $key => $value)
                                <option value="{{$value->id}}"  >{{$value->country_name}} ({{$value->country_code}})</option>
                                @endforeach
                                </select>
                                
                                <span class="country_error"></span>
                            </div>
                            <div class="field-divided" style="padding-left:1%">
                                <label>Phone <span class="required">*</span></label>
                                <input type="text" name="c_phone" id="c_phone"  class="field-long" />
                                <span class="phone_error"></span>
                            </div>
                             
                            
                        </li>
                        <li>
                            <label>Note <span class="required">*</span></label>
                            <textarea name="c_note" id="c_note" class="field-long field-textarea" ></textarea>
                             <span class="note_error"></span>
                        </li>
                        <li>
                            <a class=" continue-button i18n-odir ng-binding" href="" onClick="formToShedule()" >Back</a> 
                            <input type="submit" id="changeSubmit" value="Submit" />
                        </li>
                    </ul>
                </form>
            </td>
        </tr>
    </tbody>
</table>
</div>
			</div>
			
		</div>
	</div>
	
	<div class="poweredby">
	   <a href="<?php echo $mainurl; ?>" target="_blank">Online Scheduling by  MIYN</a>
	</div>
	
</div>




<script>


/*
================================
If Shedule Selection
================================
*/





var checkstep = function() {
     if(widghtid > 0) {	modulestep = 'staffselection';	} else { modulestep = ''; }
	stepFormcall(modulestep);
	return  modulestep;
}

var checkstepstaff = function() {
	if(staffid > 0) {  modulestep = 'SheduleTimesSelection'; } 
	else {	modulestep = 'staffselection';	}
	stepFormcall(modulestep);
	return  modulestep;
}
		
var stepFormcall = function(modulestep) {
	//alert(modulestep);

	switch (modulestep) {
	  case 'staffselection':
		staffSelect();
		break;
	  case 'SheduleTimesSelection':
		staffShedule();
		break;
	  case 'FormSelection':
		 sheduleForm();
		break;
	  default:
		serviceSelect();
	}	
}



var serviceSelect = function() {
	//alert('Service Selected');
	$('#schedule-step-1').removeClass('ng-hide');
	$('#schedule-step-2').addClass('ng-hide');
	$('#schedule-step-3').addClass('ng-hide');
}

var staffSelect = function() {
	//alert('Staff Select');
	 $("#slots").html('');
	$('#schedule-step-1').addClass('ng-hide');
	$('#schedule-step-3').addClass('ng-hide');
	$('#schedule-step-2').removeClass('ng-hide');
	//$('#schedule-step-3').addClass('ng-hide');
}

var staffShedule = function() {
	//alert('Staff Shedule');
	$('#schedule-step-2').addClass('ng-hide');
	$('#schedule-step-3').removeClass('ng-hide');
}

var sheduleForm = function() {
	//alert('Shedule Form');
	if(dateWiseTimes.length > 0) {
		$('#schedule-step-3').addClass('ng-hide');
		$('#schedule-step-4').removeClass('ng-hide');
	} else {
		alert('Select atleast 1 slot !');	
	}
}

var formToShedule = function() {
	//alert('Shedule Form');
	$('#schedule-step-4').addClass('ng-hide');
	$('#schedule-step-3').removeClass('ng-hide');

}




/*  
===================================
End First Time Date Time Picker
===================================
*/

 
function DisableWeekDaysfunction(date) {
      var day = date.getDay();
	  //return [(day != 0 && day != 1 && day != 2 && day != 3 && day != 4 && day != 5 && day != 6)];
 	  return [($.inArray(day, weekened) != -1)];
 //	  console.log(weekened);
 	  //return [(day != 0 && day != 1 )];
}


function calledaftepageload(weekened) {
    
   
    

 	$( "#date_picker" ).datepicker({
		dateFormat: 'DD, M dd,  yy',
		minDate: 0,
        multidate: true,
        multidateSeparator: ',',
        altField:   "#alternate1",
        selectMultiple:true,
		beforeShowDay: DisableWeekDaysfunction,
        onSelect: function(date, inst) { 
           // console.log("Selected date: " + dateText + "; input's current value: " + this.value);

              // alert(date);
                $('#alternate1').html( date);
               //
              //  alert('called');

                var jsDate = $(this).datepicker('getDate');
               
                
                if (jsDate !== null) { // if any date selected in datepicker
                
               // var startDate   = $(this).datepicker('getDate').getDate();                 
               // var startMonth      = $(this).datepicker('getDate').getMonth() + 1;             
               // var startYear       =$(this).datepicker('getDate').getFullYear();
               // var fullDate    = year1 + "-" + month1 + "-" + day1;
				
                    jsDate instanceof Date; // -> true
                    startDate 	= jsDate.getDate();
                    startMonth 	= jsDate.getMonth()+1;
                    startYear 	= jsDate.getFullYear();
                    
                     console.log("This is jsDate :"+startMonth);
					
						numberofweekday = jsDate.getDay();
						
						
						for(var i=0;i < selectedstaff.weekworkday.length;i++){
							//arr.push(serviceList.weekworkday[i].day);
							if(selectedstaff.weekworkday[i].day == numberofweekday) {
							
								startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
								startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
								endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
								endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);
								
								//alert(startHour);
								

								var scope = angular.element($("#ng-time")).scope();
								scope.$apply(function(){
									scope.starttime_hD 	= startHour;
									scope.starttime_mD 	= startMin;
									scope.endtime_hD 	= endHour;
									scope.endtime_mD 	= endMin;
									//alert('called');
									
									console.log('scope.starthour:'+startHour);
									console.log('scope.startMin:'+startHour);
									console.log('scope.endHour:'+startHour);
									console.log('scope.endMin:'+startHour);
								});

								
							}
						}	
						
					//	alert(startHour);

                    generate_series(step, offset, newoffset);
						
                }
				
        },
		onChangeMonthYear: function(year, month, widget) {
			//reloadCalendar(month, year);
			//alert('Change event');
			//$('#slots').html('');
			//$('#alternate1').html('');
		}
	});
	

	
	   // $("#date_picker").trigger('onSelect');
	//	$(".ui-datepicker-current-day").trigger("click");
	//	$(".ui-datepicker-current-day").addClass(" available ");
		
		$('#date_picker').change(function () {
            console.log($('#date_picker').val());
         });
         



		
}






/*  
===================================
Generate appointment time
===================================
*/

function generate_series(step, offset, newoffset) {
    
    calledtime++;
    console.log("calledtime"+calledtime);

   var htmlcolde  = "";
   
   
    //Current Date
    var CKDate = new Date();
    var startDateCKDate 		= CKDate.getDate();
    var startMonthCKDate 		= CKDate.getMonth()+1;
    var startYearCKDate 		= CKDate.getFullYear();
    
    var startHourTRCKDate 		= CKDate.getHours();
    var startMinTRCKDate		= CKDate.getMinutes();
    var numberofweekdayCKDate 	= CKDate.getDay();
    
    if(startDateCKDate == startDate) {
        console.log('Actual Hour HH:'+startHour);
        if(startHour != 0) {
            if(startHour <= startHourTRCKDate) {
                startHour = startHourTRCKDate;
                
                if(startMin <= startMinTRCKDate) {
                    startHour = startHourTRCKDate+1;   
                } else {
                    startMin = startMin + step + preperationTime;
                }
                
            }
            
            
        }
    }
    
    
    console.log('CKDate:'+startDateCKDate);
   
   

	count++;
	var cstart = new Date(startYear, startMonth-1, startDate, startHour, startMin, 0), 
		  cend = new Date(startYear, startMonth-1, startDate, endHour, endMin, 0),
		el = document.getElementById("slots"); 
		el.innerHTML = htmlcolde;
		
	var selectedDateT = startYear + '-' + startMonth + '-' + startDate;
	
	console.log("This is selectedDateT :"+selectedDateT);
	
    var start , 
        end ;
        
       // alert(startHour);
	// 
	  if(newoffset !="") {
	
	       console.log('cstart s ::'+cstart.getTimezoneOffset());
	       var zoneint = 0;
	           zoneint = -(offset*60);
	

            var sutc = cstart.getTime() + (zoneint * 60000);
            console.log('sutc : '+sutc);
            var ssnd = new Date(sutc + (3600000*newoffset));
           
            var eutc = cend.getTime() + (zoneint * 60000);
            console.log('eutc : '+eutc);
            var esnd = new Date(eutc + (3600000*newoffset));
            
           	start = ssnd,   end = esnd;
           	
           	console.log('start e ::'+start);
           	
           	

	 } else {   start = cstart,   end = cend; }


    // Remove previous data
  while (el.firstChild)
    el.removeChild(el.firstChild);


  
    //console.log(end.getHours());
	
	var date1 = new Date(startYear, startMonth, startDate,  startHour, startMin); // 9:00 AM
    var date2 = new Date(startYear, startMonth, startDate, endHour, endMin); // 5:00 PM
    if (date2 < date1) {
        date2.setDate(date2.getDate() + 1);
    }
    var diff = date2 - date1;

    var intv = step + preperationTime;

    var msec = diff;
    var hh = Math.floor(msec / 1000 / 60 / intv);
	
/*    msec -= hh * 1000 * 60 * 60;
    var mm = Math.floor(msec / 1000 / 60);
    msec -= mm * 1000 * 60;
    var ss = Math.floor(msec / 1000);
    msec -= ss * 1000;*/

	var colsslot = Math.round(hh/7);

 	var i, j, k=0, s= 0;
 	var styleinc = 107, curr = 0;
 	htmlcolde += '<ul id="timeslot" class="column-'+s+'" style="left: '+curr+'px;">';
 	for (i = 0; i <= (hh-1); i++) {

		k++;
		var options = { hour: '2-digit', minute: '2-digit'/*, timeZone: "Asia/Dhaka"*/ };
		var point = start.toLocaleString('en-US',  options);
		start.setMinutes(start.getMinutes() + step + preperationTime);
	
		htmlcolde += '<li><a href="javascript:void(0)" class="optional-time gray-button-style"  data-start-time="' + selectedDateT + ' ' + point + '"  > <div class="icon">&nbsp;</div><span> ' + point +  '</span></a></li>';
					
		// Every 7 items after new UL right			
		if(k % 7 == 0) {
			curr +=  styleinc; s++; k = 0; htmlcolde += '</ul>';
			if(i < (hh-1)) {
				htmlcolde += '<ul id="timeslot" class="column-'+s+'" style="left: '+curr+'px;">';
			}
		} 
	
		// End all list item
		if(i == (hh-1)) {
			htmlcolde += '</ul>';
		} 
  	}
 
 	 el.innerHTML = htmlcolde;
	 
	//   if time selected and match
	$('#timeslot a').each(function(){
		var newT = $(this).attr("data-start-time");
		if($.inArray(newT, dateWiseTimes) != -1) {
			$("a[data-start-time ='"+newT+"']").addClass('checked');
		} else {
			//console.log("is NOT in array");
		}
	});
	
}


// Remove selcted time
var removeA = function(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

$(document).on('click', '#timeslot li a', function () {
		
	var countlenght = dateWiseTimes.length;
	
	console.log(dateWiseTimes);
	
	//var dataId = $(this).attr('class');
	if($(this).hasClass('checked')) {
		$(this).removeClass('checked');
		removeA(dateWiseTimes, $(this).attr("data-start-time"));
		
	//	 $(".selected-slots").prepend('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');
		 
	} else {
		if(countlenght < 3) {
			dateWiseTimes.push($(this).attr("data-start-time"));
			$(this).addClass('checked');
			
	//	 $(".selected-slots").append('<li data-before-on="Date" data-before-or="or" data-of-start-time="'+$(this).attr("data-start-time")+'"><a href="#" class="goto">'+$(this).attr("data-start-time")+'</a></li>');

		} else {
			alert('You cannot select more than 3 time slots. !');
		}
	 }
				 
				 
	$(".selected-slots").html('');
	dateWiseTimes.forEach(function(item){
				 
		var selectdatetime = item.split(' ');
		var parts =selectdatetime[0].split('-');
		var mydate = new Date(parts[0], (parts[1]-1), parts[2]);
		
		
		 //const date = new Date(2009, 10, 10);  // 2009-11-10
		const month = mydate.toLocaleString('default', { month: 'short' });
		
		console.log('each'+mydate);
		 
		$(".selected-slots").append('<li data-before-on="Date" data-before-or="or"  data-of-start-time="'+item+'"><a href="javascript:void(0)" class="goto">'+month+' '+parts[2]+', '+selectdatetime[1]+' '+selectdatetime[2]+'</a></li>');
			
		console.log('selectdatetime :'+selectdatetime);
								 
	});
				 
});
		
$(document).on('click', '.selected-slots li', function () {

			 var selectdatetime     =   $(this).attr('data-of-start-time').split(' ');
			 
			 console.log('This is selected date : '+selectdatetime);
			 var parts              =   selectdatetime[0].split('-');
			 var mydate             =   new Date(parts[0], (parts[1]-1), parts[2]);
			 
			 console.log('tab select - '+mydate);

			 var datewise           = JSON.stringify( dateWiseTimes);
					
			  $('#date_picker').datepicker("setDate", mydate);
			  
			 	var dateObject = $("#date_picker").datepicker('getDate');
		 		$('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
			  
				//jsDate instanceof Date; // -> true
				startDate = mydate.getDate();
				startMonth = mydate.getMonth();
				startYear = mydate.getFullYear();
				
				var staf = JSON.stringify( selectedstaff);
					
				// var jsDate = $(this).datepicker('getDate');
                if (mydate !== null) { // if any date selected in datepicker
				
                    mydate instanceof Date; // -> true
                    startDate 	= mydate.getDate();
                    startMonth 	= mydate.getMonth()+1;
                    startYear 	= mydate.getFullYear();
					
					
						numberofweekday = mydate.getDay();
						
						for(var i=0;i < selectedstaff.weekworkday.length;i++){
							//arr.push(serviceList.weekworkday[i].day);
							if(selectedstaff.weekworkday[i].day == numberofweekday) {
							
								startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
								startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
								endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
								endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);

								// Time binding after change staff and date
								var scope = angular.element($("#ng-time")).scope();
								scope.$apply(function(){
									scope.starttime_hD 	= startHour;
									scope.starttime_mD 	= startMin;
									scope.endtime_hD 	= endHour;
									scope.endtime_mD 	= endMin;
									//alert('called');
								});
								
							}
						}
						
					// Redraw select slot
                    generate_series(step, offset, newoffset);
						
                }

});




// All funtions Init
  
 $(function() { 
	 
	 // Change while time zone
	 $('#time_zone').on('change', function() {
	      newoffset = this.value;
		dateWiseTimes = [];
		$(".selected-slots").html('');
		// Redraw Times slot
		generate_series(step, offset, newoffset);
		 
	});
	
	$('#time_zone').children('[value="'+getTimeZone()+'"]').attr('selected', true);

});
 





// ----------------------
	
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    
	$scope.step = step;  
	$scope.preparation = preperationTime;
	$scope.currenttimewithzone = currenttimewithzone; 
	$scope.records = serviceList;
	$scope.categorylistang = serviceList;

	$scope.myFunc = function(thisselected) {

		// Widget wise step
		dateWiseTimes = [];
		$('.selected-slots').html('');
		widghtid = thisselected.serviceid;
		
		console.log('Widget Id:'+widghtid);
		checkstep();
		
		// Scope wise data bind
		$scope.service 				= thisselected.service_name;
		$scope.servicetime_m 		= thisselected.sevice_time_m;
		$scope.sevice_time_m_title 	= thisselected.sevice_time_m_title;
		$scope.servicetime_h 		= thisselected.sevice_time_h;
		$scope.sevice_time_h_title 	= thisselected.sevice_time_h_title;
		$scope.staffrecords 		= thisselected.staffs;
		
		//step			 	= parseInt(thisselected.sevice_time_m);
		//console.log("total_service_minutes: "+thisselected.total_service_minutes);
		step			 	= parseInt(thisselected.total_service_minutes);
		preperationTime 	= parseInt(thisselected.preparationtime_m);
		$scope.preparation 	= preperationTime;
		
		// Reset shedule
		startHour 	= 0; startMin 	= 0; endHour 	= 0; endMin 		= 0;  
		
		// $("#slots").html('');
		
		generate_series(step, offset, newoffset);
		
		
    };
	
	$scope.setStaff = function(thisselected) {
		
		// Staff wise step change
		dateWiseTimes = [];
		$('.selected-slots').html('');
		$('#slots').html('');
		
			startHour 	= parseInt(0);
			startMin 	= parseInt(0);
			endHour 	= parseInt(0);
			endMin 		= parseInt(0);
		    offset =    thisselected.offset;
		    availability = "all";
		    minDate = "";
		    maxDate = "";
		    
		    
		    newoffset =    getTimeZone();
		
		selectedstaff 	= thisselected;
		staffid 		= thisselected.staffid;
		
		availability 	= thisselected.availability;
		
		//console.log("after select availability:"+availability);
		//if(availability == "yes") {
		//    console.log("after - select minDate:"+minDate);
		//    console.log("after - select maxDate:"+maxDate);
            minDate 		= thisselected.start_date;
	    	maxDate 		= thisselected.end_date;
        //} else {
        //    minDate 		= 0;
        //    maxDate 		= -1;
       // }
	
		
		console.log('Staff Id:'+staffid);
		checkstepstaff();

		$scope.staffname = thisselected.staffname;
		
		
		// Set week and redraw calender after select staff
		var arr = [];
		for(var i=0;i < selectedstaff.weekworkday.length;i++){
		    
		  	arr.push(parseInt(selectedstaff.weekworkday[i].day));
		  	
			if(selectedstaff.weekworkday[i].day == numberofweekday) {
			
				startHour 	= parseInt(selectedstaff.weekworkday[i].starttime_h);
				startMin 	= parseInt(selectedstaff.weekworkday[i].starttime_m);
				endHour 	= parseInt(selectedstaff.weekworkday[i].endtime_h);
				endMin 		= parseInt(selectedstaff.weekworkday[i].endtime_m);
				
				
				
				$scope.starttime_hD = startHour;
				$scope.starttime_mD = startMin;
				$scope.endtime_hD = endHour;
				$scope.endtime_mD = endMin;
				
			}
		}
		
		weekened = arr;
		
	
		calledaftepageload(weekened);
		
	
		
		
		var dateObject = $("#date_picker").datepicker('getDate');
		 $('#alternate1').html($.datepicker.formatDate('DD, M dd,  yy', dateObject));
		 $("#date_picker").datepicker("refresh");
		 
		// $("#slots").html('');
		
		//$('#date_picker').datepicker().val(new Date()).trigger('change')


		 //triggercurrentdate();
		 generate_series(step, offset, newoffset);
		 
		// $("#timezone").trigger("change")
		
		//console.log("availability:"+availability);

		if(availability == "yes") {
		    console.log("minDate:"+minDate);
		    console.log("maxDate:"+maxDate);
             $('#date_picker').datepicker('option', 'minDate', minDate);
             $('#date_picker').datepicker('option', 'maxDate', maxDate);
        } else {
            
           $('#date_picker').datepicker('option', 'minDate', 0);
           $('#date_picker').datepicker('option', 'maxDate', "+1Y");

        }
        
         $("#date_picker").datepicker("refresh");

		  
		
    };
	
});



function arrayColumn(arr, n) {
  return arr.map(x=> x[n]);
}


function getTimezoneReal() { 
            var d = new Date();
            console.log('CT :'+d);
            offset = d.getTimezoneOffset(); 
            formatted = -(offset / 60); // +6
            
           return d.toString();  //Thu Dec 12 2019 14:56:28 GMT+0600 (Bangladesh Standard Time)
           // return formatted;  // +6
} 

/*

Convert 12/24 hours to 12 hours

*/
const converTime = (time) => {
  let hour = (time.split(':'))[0]
  let min = (time.split(':'))[1]
  let part = hour > 12 ? 'pm' : 'am';
  
  min = (min+'').length == 1 ? `0${min}` : min;
  hour = hour > 12 ? hour - 12 : hour;
  hour = (hour+'').length == 1 ? `0${hour}` : hour;

  return (`${hour}:${min} ${part}`)
}

console.log(converTime('18:00:00'))
console.log(converTime('6:5:00'))


function timezone() {
  var now = new Date();
  var jano = new Date(now.getFullYear(), 0, 1).getTimezoneOffset()/-60;
  var julo = new Date(now.getFullYear(), 6, 1).getTimezoneOffset()/-60;
  var tz = Math.min(jano, julo);
  if (jano != julo) tz += ((jano < julo) ? 'S' : 'W') + Math.abs(jano - julo);
  return tz;
}

function getTimeZone() {
  //var offset = new Date().getTimezoneOffset(), o = Math.abs(offset);
  //return (offset < 0 ? "+" : "-") + ("00" + Math.floor(o / 60)).slice(-2) + ":" + ("00" + (o % 60)).slice(-2);
  
    var d = new Date();
    var n = d.getTimezoneOffset();
    var timezone = n / -60;
    console.log('CCC : '+timezone);
    return parseInt(timezone);
}


/*
==========================
Start New Shedule Plugins
version - 1.1.0
==========================
*/

/*var businessid = '123456';
var today  = '';*/


// Hide & select Time Zone
function ClickToHide() {
    $(".show-hide-timezone").hide();
}



 
 (function ($) {
  
	"use strict";

       $("#ckarea").html(getTimezoneReal());



}(jQuery));
 
</script>

<script>

    function printResponseMessage(data) {
        if (data.status == 'success') {
            $('#response_message').html('<p  style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;position: relative;padding: .75rem 1.25rem;margin-bottom: 1rem;border: 1px solid transparent;">' + data.message + '</p>');
        }
    }

</script>

<script>
    
$('form[id="submitBookingformData"]').validate({
    errorClass: "miynPopUpFormError",
    rules: {
        c_first_name: 'required',
        c_last_name: 'required',
        c_phone: 'required',
        c_note: 'required',
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
        c_first_name: 'required',
        c_last_name: 'required',
        c_phone: 'required',
        c_note: 'required',
        c_email: {
          required: "required",
          email: "Ex.name@domain.com"
        },
        client_country_id: 'required',
    
    },
    submitHandler: function(form) {
        //var formdata = $(form).serialize(); // here $(this) refere to the form its submitting
        //console.log(formdata);
       
        //$('#changeSubmit').prop();
        $("#changeSubmit").attr("disabled", "disabled");
        
        //console.log('dateWiseTimes : '+dateWiseTimes)
        //console.log('staffid : '+staffid)
        //console.log('widghtid : '+widghtid)
        //return false;
        
        var forms = $(form)[0]; // You need to use standard javascript object here
        var fd = new FormData(forms);
        fd.append("widghtid", widghtid);
        fd.append("staffid", staffid);
        fd.append("dateWiseTimes", dateWiseTimes);
        fd.append("b_id", b_id);
        fd.append("timezone", newoffset);
       
       
        $.ajax({
            type: 'post',
            url:'{{config('app.live_url')}}/add-booking-form-data',
            //url:'{{url("/sendformdata")}}',
            data:fd,
            processData: false,
            contentType: false,
            success: function (data) {
                //console.log(data);
                $('#changeSubmit').val('Submit');
                //alert('data inserted successfully.');
                //$('#submitBookingformData')[0].reset();
                printResponseMessage(data);
                //window.location.reload();
                //$(this).reset();
                
                var html = "";
                html += '<h2 class="margintop60">Your booking request was sent</h2>';
                html += '<h3>You will receive an email once admin, confirm the booking</h2>';
                html += '<div style="padding:15px; border:1px solid #000000;background-color: wheat;">You will receive an email once admin, confirm the booking</div>';
                var contentofhtm = $('#schedule-step-4 .title').html();
                html += '<div style="padding:15px;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;">'+contentofhtm+'</div>';
                
                $("#schedule-step-4").html(html);
                
            }
        });
  }
});

    /*$("#submitBookingformData").submit(function(e){
        
        e.preventDefault(); 
        //alert('called');
        
        var c_first_name    = $("#c_first_name").val();
        var c_last_name     = $("#c_last_name").val();
        var c_email         = $("#c_email").val();
        var c_phone         = $("#c_phone").val();
        var c_note          = $("#c_note").val();
        
        if(c_first_name === ''){
             $('.first_name_error').html('<span style="color:red;">First name is required.</p>');
        }else{
            $('.first_name_error').html('<span style="display:none;">');
        }
        if(c_last_name === ''){
             $('.last_name_error').html('<span style="color:red;">Last name is required.</p>');
        }
        else{
            $('.last_name_error').html('<span style="display:none;">');
        }
        if(c_email === ''){
             $('.email_error').html('<span style="color:red;">Email is required.</p>');
        }
        else{
            $('.email_error').html('<span style="display:none;">');
        }
        if(c_phone === ''){
             $('.phone_error').html('<span style="color:red;">Phone number is required.</p>');
            //return false;
        }
        else{
            $('.phone_error').html('<span style="display:none;">');
        }
        if(c_note === ''){
             $('.note_error').html('<span style="color:red;">Note is required.</p>');
        }
        else{
            $('.note_error').html('<span style="display:none;">');
        }
        
        if(c_first_name === '' || c_last_name === '' || c_email === ''  || c_phone === ''  || c_note === '' ){
            return false;
        }

       var formdata = $(this).serialize(); // here $(this) refere to the form its submitting
       console.log(formdata);
       
       $('#changeSubmit').val('Sending..');
       
       //return false;
       
       //alert('{{url("https://live.miyn.net/add-booking-form-data")}}');
       
        $.ajax({
            //alert('ajax call');
            type: 'post',
            url:'{{url("https://live.miyn.net/add-booking-form-data")}}',
            data:formdata,
            success: function (data) {
                console.log(data);
                $('#changeSubmit').val('Submit');
                alert('data inserted successfully.');
                window.location.reload();
            }
        });
    });*/

    
   
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

</body>
</html>
