<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Live site  </title>
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Raleway&display=swap" rel="stylesheet">


<style type="text/css">

button, html, input, select, textarea {
    font-family: Roboto,'Helvetica Neue',sans-serif;
}

body {
	padding:0px!important;
	margin:0px!important;
}

body {
    /*font-family: "Raleway", "arial"; */
}

.flex-grid {
  display: flex;
  flex-flow: row wrap;
  padding:10px;
  background-color: rgba(0,0,0,0.5);
}
.col {
	/*  flex: 1;*/
	margin-right:20px;
	display: flex;
}

.col img{
	/*  flex: 1;
	margin-top:10px;*/
}

.flex-grid img.head {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* position: absolute; */
    position: relative;
}

.page-brand-bg {
	width:100%;
	min-height:900px;
	padding:0px!important;
	margin:0px!important;
}

.page-brand-cover {
   /* background: linear-gradient(rgba(0, 0, 0, -1.7) 36%, rgba(0, 0, 0, 0.1)), url(https://live0.vcdnita.com/site/assets/livesite_backgrounds/15-05395fad7f38e493636cd48750c185d5c2e03f3b6cf5eeab8a8779da0facfe92.jpg) no-repeat 50% 0 / cover; */
    background: radial-gradient(circle at top right,<?php echo $allbusinessinfo['livestyle'][0]->action_background_color; ?>,rgba(0,0,0,.3)), url(<?php echo $appurl; ?>/images/business_bg/<?php echo $allbusinessinfo->background_image; ?>) no-repeat 50% 0 / cover;
}



.miyn-live-small-wrap { 
	max-width:870px;
	height:auto;
	margin-left:auto;
	margin-right:auto;
	padding-top:40px;
	padding-bottom:50px;
}

.clearfix {
	clear:both;
	width:100%;
}

.business-img {
    width: 130px;
    height: 130px;
    margin-left: 0;
    border-radius: 4px;
}

.full-header {
	color:#ffffff;
	font-family: 'Lato', sans-serif;
}

.full-header h2{
    text-transform: uppercase;
    margin-bottom:10px;
}

.full-header h3{
    margin-top: 0px;
}

.full-header h1 {
    margin-bottom: 5px;
    font-size: 3.3rem;
    font-weight: 400;
}




.flex-body {
  display: flex;
  justify-content: flex-start;
  margin-top: 30px;
}

.col-body {
	width:65%;
	margin-right:10px;
}

.col-body-big {
	width:35%
}

ul.miyn-widget-list {
	list-style:none;
	padding:0px;
	margin:0px;
}

ul.miyn-widget-list li {
	 background-color:#394471;
	 margin-bottom:10px;
/*	 padding:20px;*/
	 color: #fff;
	 padding:0px !important;
}

ul.miyn-widget-list li img.iconimg{ 
    width:100%;
    max-width: 17px;
    
}

ul.miyn-widget-list li a:link, ul.miyn-widget-list li a:visited, ul.miyn-widget-list li a:hover{
	 color: #fff;
	 text-decoration:none;
	 cursor:pointer;;
}

ul.miyn-widget-list .action-title {
    padding: 3px 0 0 0;
	font-size: 1rem;
	margin-bottom: 9px;
	
}

ul.miyn-widget-list .action-content {
	padding-bottom:10px;
}

ul.miyn-widget-list .desc {
    margin-bottom: 9px;
    padding-right: 0;
    opacity: .74;
	font-size: .9rem;
	padding-left: 40px;
}

.miyn-widgets {
/*	padding:25px;*/
position:relative;
}

.info-box {
    padding: 14px 20px 20px;
}

.info-box {
    margin-bottom: 10px;
    background-color: rgba(0,0,0,0.5);
    border-radius: 3px;
    color: rgba(255,255,255,0.77);
    text-align: left;
    font-size: 1.3rem;
    font-weight: 400;
}

a.md-button {
    border-radius: 3px;
    box-sizing: border-box;
    color: currentColor;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    position: relative;
    outline: 0;
    border: 0;
    display: inline-block;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 0 6px;
    margin: 6px 8px;
    line-height: 36px;
    min-height: 36px;
    background: 0 0;
    white-space: nowrap;
    min-width: 88px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 500;
    font-size: 14px;
    font-style: inherit;
    font-variant: inherit;
    font-family: inherit;
    text-decoration: none;
    cursor: pointer;
    overflow: hidden;
/*    transition: box-shadow 0.4s cubic-bezier(0.25, 0.8, 0.25, 1),background-color 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);*/
	letter-spacing: .01em;
	display:block;
	text-align:center;
}

.md-whiteframe-7dp, .md-whiteframe-z3 {
    box-shadow: 0 4px 5px -2px rgba(0,0,0,0.2), 0 7px 10px 1px rgba(0,0,0,0.14), 0 2px 16px 1px rgba(0,0,0,0.12);
}

.action-brand:hover, .md-button.action-brand:hover {
   /* background-color: #394471!important; */
}

.action-brand {
    color: #fff;
    background-color: #394471;
}

.info-box h6 {
    color: white;
}

ul.miyn-widget-list .icon-holder {
	width:40px;
	float:left;
}


.action-card {
    padding: 24px 60px 24px 29px;
}


.md-icon {
	width: 24px;
	height:24px;
	position:absolute;
	right: 17px;
	top:33%;
	font-size:28px;
}

.info-box h6 {
	padding:0px;
	margin:0px;
	margin-bottom:10px;
}

.info-box  .about-txt {
    white-space: pre-wrap;
	 font-size: .9rem;
}

.about-img {
  padding-top:30px;
}


.recommend-icons .md-button {
    margin-left: 0;
    margin-right: 15px;
    padding: 0;
    min-width: 0;
    line-height: 0;
    border-radius: 0;
    transition: color .2s;
}

a.md-button {
    background-color: rgba(158,158,158,0.2);
}

a.action-brand:hover {
    
}


.recommend-icons   {
	padding-top:20px;
}



/*   */
ul.business-info {
	list-style:none;
	padding:0px;
	margin:0px;
	color: rgba(250,250,250, .8);
	text-shadow: 0px 1px 2px rgba(0,0,0,0.2), 0px 0px 40px rgba(0,0,0,0.2);
}

</style>

<style type="text/css">
	
.recommend-icons a {
    display: inline-block;
	color: rgba(0,0,0,0.54);
    background: linear-gradient(#fdfdfd, #eee);
    text-decoration: none;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    line-height: inherit;
    font-weight: bold;
    border: 1px solid #bbb;
    border-radius: 3px;
   	width :27px;
  	height: 27px;
	text-align:center;
	margin-right:10px;
}

.recommend-icons a:hover {
    opacity: 0.8;
}

#icon-bg {
    display: inline-block;
	color: rgba(0,0,0,0.54);
    padding: 0px 5px 3px;
    border-radius: 3px;
    font-size: 16px;
}

#icon-label-bg {
    display: inline-block;
    padding: 3px 5px 3px 5px;
}

.recommend-icons a i{
	  	line-height : 27px;
}
</style>
<style type="text/css">
.business-page {
	padding: 14px 20px 0;
}

.business-page li {
	line-height:25px;
}


/* Image box */ 
.avatar-bg {
    width: 106px;
    height: 106px;
    box-shadow: 0 2px 1px -1px rgba(0,0,0,0.1), 0 2px 1px 0 rgba(0,0,0,0.1), 0 1px 3px 0 rgba(0,0,0,0.26);
    background-color: #ffffff;
    overflow: hidden;
    margin-right: 5px;
    float: left;
}
.avatar-bg-inner {
    height: 100px;
    width: 100px;
    max-height: 100px;
    max-width: 100px;
    background-color: #4675d9;
    line-height: 2.5;
    font-size: 1.9rem;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 3px;
    color: #FFFFFF;
    line-height: 100px;
}

.desc {
    opacity:.5;
    font-size: 15px;
}


@media only screen and (max-width: 767px) {
    
    .flex-grid {
        display: flex;
        flex-flow: row wrap;
        padding: 10px;
        background-color: rgba(0,0,0,0.5);
        margin-left: 15px;
        margin-right: 15px;
    }

    .miyn-live-small-wrap {
        width: 100%;
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .flex-body {
        display: flex;
        justify-content: flex-start;
        margin-top: 0px;
        flex-flow: wrap row;
        padding: 0 15px;
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .col-body {
        width: 100%;
        margin-right: 0px;
    }
     .col-body-big {
        width: 100%;
    }
    
    .full-header {
        font-size:70%;
    }

}



</style>

</head>

<body>

<div ng-app="app"  ng-controller="liveSiteCtr" ng-cloak>


<section class="page-brand-bg page-brand-cover "   >
	<div class="ui-view" ></div>	
	
	
	<div class="miyn-live-small-wrap">
		
		<div class="flex-grid">
		  <div class="col"> 
		        <?php if($allbusinessinfo->logo_image !="") { ?>
		        <img class="head" src="<?php echo $appurl; ?>/images/business_logo/<?php echo $allbusinessinfo->logo_image; ?>"  />
		         <?php } else { ?>
		  	            <div class="avatar-bg"> 
                            <div class="avatar-bg-inner" style="background-color:<?php echo $allbusinessinfo['livestyle'][0]->action_background_color; ?>">
                                <?php
                                   $string =   $allbusinessinfo->business_name;
                                 echo  $char = $string[0]; //first char of firstname
                          
                                ?>
                            </div>
                        </div>
		         <?php } ?>
		  </div>
		  <div class="col">
		  		<div class="full-header ">
						<div style="padding-left:10px;">
							<h2   > @{{appNames}}</h2>
							<h3>
							  <div ng-model="ngaddress" class="desc ng-bindingg">@{{address}}</div>
							  <div class="address ng-bindingg">@{{citystate}}</div>
							</h3>
						  </div>
					  </div>
		 		 </div>
		</div>	
		
		
		<div class="flex-body">
				<div class="col-body">
					<ul class="miyn-widget-list">
					    
					    <!--- Actions Repeat -->
					<li ng-repeat="selectedactions in actions"  ng-init="myVar = '#ae485e'; "    style="background-color: @{{selectedactions.calltoaction == 'call' ? myVar : background_color }};">
						    
						    
						<a class="miyn@{{selectedactions.calltoaction}}" ng-model="myImg; myGoogle"  ng-init="@{{selectedactions.calltoaction == 'greeting' ? myImg = true : myImg = false }} @{{selectedactions.calltoaction == 'googlemap' ? myGoogle = true : myGoogle = false }}"   >
						    
						    
						    <div class="action-extra-content wysiwyg-content ng-bindingg layout-column" ng-if="myImg"  >
										<img src="<?php echo $appurl; ?>/images/assets/we_would_like_to_hear_from_you.jpg" width:"100%" />
							</div>
							
							<div class="action-extra-content wysiwyg-content ng-bindingg layout-column" ng-if="myGoogle"  >
                                <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBhDZ-X-FmlL7R9vg4VA7843bel7S4GOac&q=Bakshi Bazar Road, Dhaka, Bangladesh"  width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>							    <!--<h2>this is google map view section</h2>-->
							</div>
						
							
						    
							<div class="miyn-widgets">
								<div class="action-card flexx">
									  <div class="layout-row">
										<div class="icon-holder layout-column">
										    <img class="iconimg" src="{{asset('images/rounded')}}/@{{selectedactions.rounded_button_image}}" alt="logo"/>
										  <!--<i class="fa @{{selectedactions.icon}} " aria-hidden="true"></i>-->
										</div>
										<div class="action-content layout-align-center layout-column flex">
										  <strong class="action-title " >@{{selectedactions.name}}</strong>
										</div>
									  </div>
									  <div class="desc font-sm ">@{{selectedactions.description}}</div>  
								</div>
								
								<div class="md-icon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
								
							</div>
						</a>
						
						
						</li>
						
						
						
					</ul>
				</div>
				<div class="col-body-big" >
				
				
					<div class=" info-box">
					
						<h6 class="font-smd " ><div  class="ng-bindingg"><p>Already a client?<br> <strong>Login to your account</strong></p></div></h6>
						
						<a class="miynacc action-brand md-whiteframe-z3 md-button md-ink-ripple"  >
							<span class=" ">
                			My account
              				</span>
						</a>
			  
					</div>
					
					<div class=" info-box">
							 <h6 class="font-smd">
								<span class="ng-bindingg" >About us </span>
							  </h6>
		
							  <span class="about-txt "> @{{businesshortinfo}} </span>
							 
							  <div class="about-img">
							        <img  src="<?php echo $appurl; ?>/images/business_banner/<?php echo $allbusinessinfo->photo_url; ?>" width = "100%">
							  </div>
					</div>
					
					<div class="info-box recommend hide-mobile ng-scope" >
						  <h6 class="font-smd ng-binding">Recommend</h6>
						  
						   <span class="about-txt ng-binding">Recommend miyn book   via social networks or email.</span>
	
						  
						  	<div class="recommend-icons layout-row">
						  
							  <div id="wLinkedIn">
							      
							    <?php if($allbusinessinfo->isfacebook) { ?>
    								<a href="<?php echo $allbusinessinfo->facebook; ?>" target="_blank">
    								<span id="icon-bg"><i class="fa fa-facebook"></i></span>
    								</a>
								<?php } ?>
								
								<?php if($allbusinessinfo->istwitter) { ?>
    								<a href="<?php echo $allbusinessinfo->twitter; ?>" target="_blank">
    								<span id="icon-bg"><i class="fa fa-twitter"></i></span>
    								</a>
								<?php } ?>
								
								<?php if($allbusinessinfo->islinkdin) { ?>
    								<a href="<?php echo $allbusinessinfo->linkdin; ?>" target="_blank">
    								<span id="icon-bg"><i class="fa fa-linkedin"></i></span>
    								</a>
								<?php } ?>
								
								<?php if($allbusinessinfo->isgmail) { ?>
    								<a href="<?php echo $allbusinessinfo->gmail; ?>" target="_blank">
    								<span id="icon-bg"><i class="fa fa-google-plus"></i></span>
    								</a>
								<?php } ?>
								</div>
	  
							</div>
		
        </div>
		

					<div class="business-page">
						
						<ul class="business-info">
							<li><a><i class="fa fa-phone" aria-hidden="true"></i></a> @{{b_phone}}</li>
							<li><a><i class="fa fa-map-marker" aria-hidden="true"></i></a> @{{b_address}}</li>
							<li><a><i class="fa fa-globe" aria-hidden="true"></i></a> @{{b_website}}</li>
							<li><a><i class="fa fa-at" aria-hidden="true"></i></a> @{{b_email}}</li>
						</ul>
					
					</div>
		
					
				</div>
		</div>			
	
	</div>
	
	
</section>
   
   
</div>

</body>
<?php

//dd($allbusinessinfo);
$json = json_encode($allbusinessinfo);


?>
  
<script type='text/javascript' charset='utf-8'>
window.onload = function() {
    MIYNLive.init({
		uid: '{{$uid}}',
		ui: false,
		buttonprefix: false
	});
};
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0],
        p = 'https://',
        r = Math.floor(new Date().getTime() / 1000000);
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = p + "{{config('app.live_url')}}/site/js/liveschedule.js?" + r;
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'miynsite-jssdk'));
</script> 


<script type='text/javascript' charset='utf-8'>

angular.module('app', [])
    .constant('IntialBusinessinfo', <?php echo $json; ?> )
    .service('IntialBusinessinfo',function(IntialBusinessinfo) {
        this.business_name = IntialBusinessinfo.business_name ;
        //this.addresss = IntialBusinessinfo.city + ', ' + IntialBusinessinfo.state ;
    })
    .controller('liveSiteCtr',function($scope, IntialBusinessinfo) {
        $scope.businesshortinfo = IntialBusinessinfo.bussiness_short_description; 
        $scope.appNames         = IntialBusinessinfo.business_name;
        $scope.address          = IntialBusinessinfo.b_address;
       // $scope.citystate        = IntialBusinessinfo.city + ', ' + IntialBusinessinfo.state;
        $scope.actions          = IntialBusinessinfo.actions;
        $scope.businessaboutphoto = IntialBusinessinfo.photo_url;
        $scope.background_color = IntialBusinessinfo.livestyle[0].action_background_color;
        $scope.b_phone = IntialBusinessinfo.b_phone;
        $scope.b_address = IntialBusinessinfo.b_address;
        $scope.b_website = IntialBusinessinfo.b_website;
        $scope.b_email = IntialBusinessinfo.b_email;
        
        
        
       //  $("a.action-brand:hover").css({"background-color": IntialBusinessinfo.livestyle[0].action_background_color, "color": IntialBusinessinfo.livestyle[0].action_text_color });
        
    });
    
    
    function convertHex(hex,opacity){
        hex = hex.replace('#','');
        r = parseInt(hex.substring(0,2), 16);
        g = parseInt(hex.substring(2,4), 16);
        b = parseInt(hex.substring(4,6), 16);
    
        result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
        return result;
    }


$('h1').html(convertHex('#A7D136',50));

</script>



</html>
