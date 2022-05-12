        
    var _t       = MIYNLive,
        config      = {},
        bmobile		= '',
        info        = [],
        protocl     = 'https://',
        mainsite    = 'miyn.app',

        /* staging mood */
        livesite    = 'test3.miyn.app',
        cdnsite     = 'cdn.miyn.app',
        clientsite  = 'test4.miyn.app',
        apisite     = 'test2.miyn.app',
        appsite     = 'test1.miyn.app';



         /* live mood */
        // livesite    = 'live.miyn.app',
        // cdnsite     = 'cdn.miyn.app',
        // clientsite  = 'client.miyn.app',
        // apisite     = 'api.miyn.app',
        // appsite     = 'app.miyn.app';


   
    function MIYNLive(options) {}
   
   	_t.init = function(_) {
       //var curr = window.location.protocol + "//" +  window.location.hostname;
        _t.JqueryLoad();
        //_t.cssAll();
        _t.cssStyle();
        
        //_t.cssJUi();
        //_t.jsJUi();
        
        var curr_url = document.location.href;
        var pathArray = curr_url.split('/');
        //console.log(pathArray);
        
        if(pathArray[2] == appsite) {
           curr_url = ""; 
        }
        
        /*fetch(protocl+apisite+'/api/business_info/'+_.uid+'?curr_url='+curr_url)
          .then(function (data) {
              console.log(data)
              })
          .then(function (data) {console.log(data)});*/
        
		  var that = this;
                    // task1 is a function that returns a promise (and immediately starts executing)
                    // task2 is a function that returns a promise (and immediately starts executing)
                    return Promise.resolve(_)
                        .then(function() {
                            
                            var rr = protocl+apisite+'/api/business_info/'+_.uid+'?curr_url='+curr_url;
                            
                            
                            /*fetch('http://some-site.com/cors-enabled/some.json', {mode: 'cors'})
                              .then(function(response) {
                                return response.text();
                              })
                              .then(function(text) {
                                console.log('Request successful', text);
                              })
                              .catch(function(error) {
                                log('Request failed', error)
                              });*/
                              
                              
                            return fetch(rr, {mode: 'cors', credentials: 'omit' })
                                .then(response => response.text())
                                .then(text => {
                                  //console.log(text);
                                  
                                  var infos = JSON.stringify(text); 
                                    info = JSON.parse(infos);
                                    config = _;
                                    config.businessinfo = info;

                                    //console.log(info);

                                    
                                    if(config.cluid !="") {
                                        _f.cluidparam = 'cluid='+config.cluid;
                                        
                                        if(config.dashboard == true) {
                                            _f.dashboard_uid ='&dashboard_uid='+config.dashboard_uid;
                                        }
                                    } else {
                                        if(config.dashboard == true) {
                                            _f.dashboard_uid ='dashboard_uid='+config.dashboard_uid;
                                        }
                                    }
                                    
                                    var b_info          = JSON.parse(config.businessinfo);

                                    var b_livestyle     = config.businessinfo.livestyle;
                                    var b_liveaction    = config.businessinfo.liveaction;
                                    bmobile 			= b_info.country.country_code + b_info.b_phone;

                                    //console.log(b_info.country.country_code);
                                    
                        
                                    var parsebinfo = JSON.parse(config.businessinfo);
                                    
                                    var roundedview  = parsebinfo.livestyle.rounded_button;
                            	    var bottomdview  = parsebinfo.livestyle.button_bottom;
                            	    var chatview     = parsebinfo.livestyle.chat_box;
                            	    
                            	    //console.log(roundedview);
                            	   
                            	    var roundehide   = "";
                            	    var bottomdhide  = "";
                            	    var chathide     = "";
                            	    
                            	    if(roundedview == 'true') { _l.a(b_info);  }
                            	    if(bottomdview == 'true') { _l.b(b_info);  }
                            	    if(chathide == 'false') {   }
                                	   
                                    _l.d(b_info);
                                    
                                    _l.e(b_info);
                                    _t.initEvent();
                                    
                                    if(b_info.livestyle.chat_box == 'true') {
                                        _l.nc();
                                        $("#widget_popup_option_2.miyn-widgets-footer-button-area").css({"right": "100px" });
                                    }
                                    
                                    $("#widget_popup_option_2 a").css({"color": b_info.livestyle.action_text_color+"!important" });
                                    
                                    $("#miyn_iframe_box.miyn-widget-popup-content-area .miyn-widgets-popup-inner-contents").css({"border-top": "5px solid "+b_info.livestyle.action_background_color });
                                    $("#miyn_iframe_box.miyn-widget-popup-content-area .miyn-widgets-popup-inner-contents .miyn-popup-close-button").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    $("#widget_popup_option_2 .miyn-widget-popup-button").css({"background-color": b_info.livestyle.action_background_color });
                                    $("#widget_popup_option_2 .miyn-widget-popup-button span").css({"color": b_info.livestyle.action_text_color });
                                    
                                    $("#widget_popup_option_2 .miyn-widget-popup-content-area").css({"background-color": b_info.livestyle.action_background_color });
                                    $("#widget_popup_option_2 .miyn-widget-popup-services ul li a span").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    $("#widget_button_option_1.miyn-widget-buttons-area ul li a span").css({"background-color": b_info.livestyle.action_background_color });
                                    //$("#widget_button_option_1.miyn-widget-buttons-area").css({"border": "1px solid "+b_info.livestyle.action_background_color });
                                    $("#widget_button_option_1.miyn-widget-buttons-area ul li a").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    $("#miyn_iframe_box2 .miyn-widgets-popup-inner-contents").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    $("#miyn_iframe_box2 .miyn-widget-popup-close-button").css({"background-color": b_info.livestyle.action_background_color });
                                    $("#widget_popup_option_2 .miyn-widget-popup-close-button").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    
                                    $("#widget_popup_option_2 .miyn-grid-layout .miyn-widget-popup-header-content h3").css({"color": b_info.livestyle.action_text_color });
                                    $("#widget_popup_option_2 .miyn-grid-layout .miyn-widget-popup-header-content p").css({"color": b_info.livestyle.action_text_color });
                                    
                                    $("#widget_popup_option_2 .miyn-widget-popup-header").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    //$("#widget_popup_option_2.miyn-widgets-footer-button-area .miyn-grid-layout .miyn-widget-popup-services ul li a").hover().css({"background-color": b_info.livestyle.action_background_color }); 
                                    
                                    $(".miyn-chat-link").css({"background-color": b_info.livestyle.action_background_color });
                                    
                                    //console.log(b_info.livestyle.action_background_color);
                                    
                                    _t.initTrigger();
                                  
                                }).catch(err => {
                                  console.error('fetch failed', err);
                                });
                            
                            
                            
                           /* var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    var data = this.responseText;
                                    //console.log('--- Promise ---');
                                } 
                            };
                            var url= protocl+apisite+'/api/business_info/'+_.uid+'?curr_url='+curr_url;
                            //console.log(url);
                            xhttp.open("GET", url, true);
                            xhttp.send();*/
                            
                        })
                        .then(function() {
                            //console.log('-- Done 2--');
                        })
                        .then(function() {
                            //console.log('-- Done--');
                        });
          
        
      
    }, window.MIYNLive = MIYNLive

    _t.cssAll= function () {

    	Console.log("function cssAll");

        jQuery($).ready(function($) { 
            
            var css_link = $("<link>", {
                rel: "stylesheet",
                type: "text/css",
                href: protocl + livesite + "/newdesign/css/all.min.css" 
            });
            
            css_link.appendTo('head');
                
        });
    };
    
    _t.JqueryLoad = function () {
      
        
  
    };
    
    _t.cssStyle= function () {


        jQuery($).ready(function($) { 

        	
            
            //var livesite2 = 'live2.miyn.app';
            
            var css_link = $("<link>", {
                rel: "stylesheet",
                type: "text/css",
                href: protocl + livesite + "/newdesign/css/style.css" 
            });
            
            css_link.appendTo('head');
                
        });
    };
    
    _t.cssJUi= function () {

    
        jQuery($).ready(function($) { 

        	console.log("function cssJUi");
            
            var css_link = $("<link>", {
                rel: "stylesheet",
                type: "text/css",
                href: "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" 
            });
            
            css_link.appendTo('head');
                
        });
    };
    
    _t.jsJUi= function () {

    	console.log("function jsJUi");
        jQuery($).ready(function($) { 
            
            var css_link = $("<link>", {
                rel: "stylesheet",
                type: "text/css",
                href: "https://code.jquery.com/ui/1.12.1/jquery-ui.js" 
            });
            
            css_link.appendTo('head');
                
        });
    };

    
    _t.generateUUID = function () {
        var d = new Date().getTime();
        var uuid = 'xxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
          var r = (d + Math.random() * 16) % 16 | 0;
          d = Math.floor(d / 16);
          return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
        });
        return uuid;
    };
    
    
    _t.setCookiee = function(cname,cvalue,exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    };
    
 
    _t.getCookiee = function(cname) {
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
    };
    
    _t.checkCookie = function (name) {
      //setCookie('username',"", 30);
      var ck=_t.getCookie(name);
      return ck;
    };
	
	_t.returniIframe = function () {

		console.log("function returniIframe");

		var rs = false;
		var ww = screen.width;
		
		if(ww > 767) {
			rs = true;
		} else {
			rs = false;
		}	
		
      
	  return rs;
    };
	
	_t.opennewlink = function (url) {
      window.open(url, '_blank').focus();
    };
    
    _t.newMessageBox= function () {

    	console.log("function newMessageBox");

        //console.log(newmessageboxurl);
        $.ajax({
             url: newmessageboxurl,
             type: 'GET',
             success: function(data){
                 
             },
             error : function(errors)
             {
                 console.log(errors.status);
                 if(errors.status == '500') {
                    console.log('No need to recall !');
                 }
             }
         });
    };
    
    
    _t.liveTask = function () {

    	console.log("function liveTask");
        
        //var sts = parseInt(isonline);
        switch(is_online) {
            case 0:
                //_t.adminOffline();
                break;
            case 1:
                //_t.adminOnline();
                break;
            default:
                //_t.reConnect();
                break;
        }
	    //console.log(is_online);
    };

   
    
    _t.onTestChange = function (e) {

    	console.log("function onTestChange");

        var code = (e.keyCode ? e.keyCode : e.which);
        if (e.keyCode === 13) {
            //console.log("Enter key was pressed");
           // $("#fab_send").trigger('click');
           //$("#chatSend").val('');
            
               
            return false;
        }
    };
    
    _t.initEvent = function () {
        
        console.log("eventall initEvent");




        /* Start All Button */
        $(document).on('click', '.miynschedule_  ', function(){

            console.log("click .miynschedule");
			
			if(_t.returniIframe()) {
			
				_l.problem_div();
				
				var popID = "miyn_iframe_box";
				console.log(popID);
			//	if(popupLink.startsWith('#') && (popID != '')) {
					if(popID != 'close') {
						$('.miyn-widget-popup-content-area').hide();
						if($('#'+popID).css('display') == 'none'){
							$('#'+popID).fadeIn();
							$('.miyn-widget-popup-close-button').show();
	
								$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
								 _f.schedule(); 
						}
					} else {
						$('.miyn-widget-popup-content-area').fadeOut();
						$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
						$('.miyn-widget-popup-close-button').fadeOut();
						$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
					}
					
			} else {
				 _f.schedule(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miynreschedule  ', function(){

			console.log("click .miynreschedule");
		    
			
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.reschedule($(this).data('href')); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.reschedule(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miynfile  ', function(){

			console.log("click .miynfile");
		    
			if(_t.returniIframe()) {
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.send_file(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.send_file(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miynquote   ', function(){

			console.log("click .miynquote");
		    
			if(_t.returniIframe()) {
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.get_a_quote(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.get_a_quote(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miyngreeting    ', function(){

			console.log("click .miyngreeting");
		    
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.greeting(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.greeting(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miyngooglemap    ', function(){

			console.log("click .miyngooglemap");
		    
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.google_map(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.google_map(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miynacc    ', function(){

			console.log("click .miynacc");
		    
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.my_account(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.my_account(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miyncustomform    ', function(){

			console.log("click .miyncustomform");
		    
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			//console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.custom_form(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.custom_form(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miynchat   ', function(){

			console.log("click .miynchat");
		    
			if(_t.returniIframe()) {
				
		    _l.problem_div();
		    
			var popID = "miyn_iframe_box";
			//console.log(popID);
		//	if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						$('.miyn-widget-popup-close-button').show();

						    $('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
						     _f.chatnow(); 
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
				
			} else {
				 _f.chatnow(); 
			}
				
			    return false;
		}),
		
		$(document).on('click', '.miyncall ', function(){
			_f.calls(); 
			return false;
		}),
		
		
		/* Start All in One Button */
		$(document).on('click', '.rbutton-s ', function(){
														
			
			console.log("click .rbutton-s");
		    
		    var databutton    = $(this).attr('dtbutton');
			
			if(_t.returniIframe()) {
					_l.problem_div();
					
					$('.miyn-widget-popup-button').hide();
					var popupLink = $(this).attr('href');
					//var popID = popupLink.replace( '#', '' );
					var popID = "miyn_iframe_box";
					
					console.log(popID);
		
					if(popupLink.startsWith('#') && (popID != '')) {
						if(popID != 'close') {
							$('.miyn-widget-popup-content-area').hide();
							if($('#'+popID).css('display') == 'none'){
								$('#'+popID).fadeIn();
								$('.miyn-widget-popup-close-button').show();
								
									//console.log(databutton);
									// Load iframe
									$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html('');
									
									if(databutton == 'schedule') {  _f.schedule();   }
									if(databutton == 'quote') {  _f.get_a_quote();   }
									if(databutton == 'file') {   _f.send_file();   }
									if(databutton == 'greeting') {  _f.greeting();   }
									if(databutton == 'googlemap') {  _f.google_map();   }
									if(databutton == 'acc') {  _f.my_account();   }
									if(databutton == 'chat') {  _f.chatnow();   }
									
							}
						} else {
							$('.miyn-widget-popup-content-area').fadeOut();
							$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
							$('.miyn-widget-popup-close-button').fadeOut();
							$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
						}
						return false;
					} else {
						window.location.href = popupLink;
						return true;
					}
					
			} else {
				if(databutton == 'schedule') {  _f.schedule();   }
				if(databutton == 'quote') {  _f.get_a_quote();   }
				if(databutton == 'file') {   _f.send_file();   }
				if(databutton == 'greeting') {  _f.greeting();   }
				if(databutton == 'googlemap') {  _f.google_map();   }
				if(databutton == 'acc') {  _f.my_account();   }
				if(databutton == 'chat') {  _f.chatnow();   }
			}	
					
		}),
		
		$(document).on('click', '.openmiynchatbox', function(e) {
		    e.preventDefault();
			
			console.log("click .openmiynchatbox");

			if(_t.returniIframe()) {
					_l.problem_div();
					var linkopen = $(this).attr('chat-link-data');
					var popupLink = $(this).attr('href');
					var popID = '';
					
					if(linkopen == 'link-open') {
						popID = "miyn_iframe_box2";
					}
					
					if((popID != '')) {
						if(popID != 'close') {
							$('.miyn-widget-popup-content-area').hide();
							if($('#'+popID).css('display') == 'none'){
								//console.log('none-'+popID);
								$('#'+popID).fadeIn();
								$('.miyn-widget-popup-close-button').show();
								$('#'+popID+' .miyn-widget-iframe-contents-load').html('');
								
								if(linkopen == 'link-open') {  
									_f.chatnow();
									
									$('.miyn-widget-popup-close-button').attr('chat-link-data','link-open');
								}
								
								$('#chatlink').fadeOut();
									
							}
						}
						return false;
					} else {
						window.location.href = popupLink;
						return true;
					}
					
			} else {
				_f.chatnow();
			}
					
		}),
		
		$(document).on('click', '.bbutton ', function(){
													  
													  
			console.log("click .bbutton");

			var popupboxtype  = $(this).attr('dtpopuptype');
		    var databutton    = $(this).attr('dtbutton');
			
		    if(_t.returniIframe()) {
					_l.problem_div();		      
				  //  console.log(databutton);
					
					$('.miyn-widget-popup-button').hide();
					var popupLink = $(this).attr('href');
					//var popID = popupLink.replace( '#', '' );
					var popID = "miyn_iframe_box";
					
					if(popupboxtype == 'box') {
						popID = "miyn_iframe_box2";
					}
					
					 if(databutton == 'call') {  _f.calls(); $('.miyn-widget-popup-button').show(); return false;  }
					
					
					
					//console.log(popID);
		
					if((popID != '')) {
						if(popID != 'close') {
							
							console.log('if-'+popID);
							$('.miyn-widget-popup-content-area').hide();
							if($('#'+popID).css('display') == 'none'){
								//console.log('none-'+popID);
								$('#'+popID).fadeIn();
								$('.miyn-widget-popup-close-button').show();
		
									$('#'+popID+' .miyn-widget-iframe-contents-load').html('');
									
									if(databutton == 'schedule') {
										if(popupboxtype=='box') { _f.schedule_box(); } else { _f.schedule(); }
									}
									
									if(databutton == 'quote') {
										if(popupboxtype=='box') { _f.get_a_quote_box(); } else { _f.get_a_quote(); }
									}
									
									if(databutton == 'file') { _f.send_file();  }
									if(databutton == 'greeting') { _f.greeting();   }
									if(databutton == 'googlemap') {  _f.google_map();   }
									if(databutton == 'acc') {  _f.my_account();   }
									if(databutton == 'chat') {  
										_f.chatnow();
										
										$('.miyn-widget-popup-close-button').attr('chat-link-data','link-open');
									}
									
									$('#chatlink').fadeOut();
									
							}
						} else {
							$('.miyn-widget-popup-content-area').fadeOut();
							$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
							$('.miyn-widget-popup-close-button').fadeOut();
							$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
							
							
						}
						return false;
					} else {
						window.location.href = popupLink;
						return true;
					}
					
			} else {
				
					//alert('Called');
				
					if(databutton == 'call') {  _f.calls(); return false;  }
					
					if(databutton == 'schedule') {
						if(popupboxtype=='box') { _f.schedule_box(); } else { _f.schedule(); }
					}
					
					if(databutton == 'quote') {
						if(popupboxtype=='box') { _f.get_a_quote_box(); } else { _f.get_a_quote(); }
					}
					
					if(databutton == 'file') { _f.send_file();  }
					if(databutton == 'greeting') { _f.greeting();   }
					if(databutton == 'googlemap') {  _f.google_map();   }
					if(databutton == 'acc') {  _f.my_account();   }
					if(databutton == 'chat') {  
						_f.chatnow();
						
						//$('.miyn-widget-popup-close-button').attr('chat-link-data','link-open');
					}
			}
		}),
		
		
		$("body").on('click', '.openbox ', function(event){

			console.log("click .openbox");
																					
													
		    var $targ = $(event.target);
		    $('.miyn-widget-popup-button').hide();
		    $('.miyn-widget-popup-content-area').hide();
			$('.miyn-widget-popup-close-button').show();
			$('#chatlink').fadeOut();
			
			_l.problem_div();



            if ($targ.hasClass('miynboxschedule')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.schedule_box();
            }
            
            if ($targ.hasClass('miynboxfile')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.send_file();
            }
            
            if ($targ.hasClass('miynboxquote')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.get_a_quote_box();
            }
            
            if ($targ.hasClass('miynboxgreeting')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.greeting();
            }
            
            if ($targ.hasClass('miynboxgooglemap')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.google_map();
            }
            
            if ($targ.hasClass('miynboxchat')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.chatnow();
            }
            
            if ($targ.hasClass('miynboxacc')){
                var popID = "miyn_iframe_box2";
		        $('#'+popID).fadeIn();
                $('#'+popID+' .miyn-widget-iframe-contents-load').html('');
                _f.my_account();
            }
		}),
		
		$(document).on('click', '.miyn-widgets-footer-button-area .miyn-widget-popup-button', function(){
																									   
																									   
			console.log("click .miyn-widgets-footer-button-area .miyn-widget-popup-button");
			// Box
		    
		    _l.problem_div();
			$('.miyn-widget-popup-button').hide();
			var popupLink = $(".miyn-widgets-footer-button-area a").attr('href');
			var popID = popupLink.replace( '#', '' );
			
			$('.miyn-widget-popup-close-button').hide();

			if(popupLink.startsWith('#') && (popID != '')) {
				if(popID != 'close') {
					$('.miyn-widget-popup-content-area').hide();
					if($('#'+popID).css('display') == 'none'){
						$('#'+popID).fadeIn();
						
						$('#'+popID+' .miyn-widget-popup-close-button').show();
						
					}
				} else {
					$('.miyn-widget-popup-content-area').fadeOut();
					$('.miyn-widgets-footer-button-area .miyn-widget-popup-button').fadeIn();
					$('.miyn-widget-popup-close-button').fadeOut();
					$('#'+popID+' .miyn-widget-popup-close-button').fadeIn();
				}
			    return false;
			} else {
	  		    window.location.href = popupLink;
			    return true;
			}
		}),
		
		$(document).on('click', '.miyn-popup-close-button', function(e) {
		    e.preventDefault();

		    console.log("click .miyn-popup-close-button");

			$('#miyn_iframe_box').fadeOut();
		    //$('.miyn-widget-popup-button').fadeIn();

			//$('.miyn-widget-popup-close-button').fadeOut();
			//$('.miyn-widgets-iframe-box-area').fadeOut();

			$('#chatlink').fadeIn();
		}),
		
		$(document).on('click', '.miyn-widget-popup-close-button', function(e) {
		    e.preventDefault();

		    console.log("click .miyn-widget-popup-close-button");
		    
		    var linkopen = $('.miyn-widget-popup-close-button').attr('chat-link-data');
			if(linkopen == 'link-open') {  
				$('#chatlink').fadeIn();
			}
		    
			$('#miyn_iframe_box, #miyn_iframe_box2').fadeOut();
		    $('.miyn-widget-popup-button').fadeIn();
			$('.miyn-widget-popup-close-button').fadeOut();
			$('.miyn-widget-popup-content-area').fadeOut();
			
			$('#chatlink').fadeIn();
			
		});
		
         
        $("body").on("click", "#fab_camera", function(e) {

             
            return false;
        }),
         
        $("body").on("click", "#fab_send", function(e) {
            e.preventDefault();
               
            return false;
        });
	 		
		
    };

    _t.initTrigger = function () {
       if($.urlParam(config.paramName) == "miyn-schedule") {
           $('.miynschedule')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-acc") {
           $('.miynacc')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-quote") {
           $('.miynquote')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-file") {
           $('.miynfile')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-greeting") {
           $('.miyngreeting')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-googlemap") {
           $('.miyngooglemap')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-customform") {
           $('.miyncustomform')[0].click();
       }
       
       if($.urlParam(config.paramName) == "miyn-chat") {
           $('.miynchat')[0].click();
       }
    };
    
    
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
           return null;
        }
        return decodeURI(results[1]) || 0;
    }
 
    var Chat = {
    
        State: {
          chatInterval: 10000,
          shortPoll:2000,
          longPolling:10000,
          isPoolNeed:true
        },
        Timers: {
    
        }
        
    };  
    
    
// iframe 
// .miyn-widgets-footer-button-area a, .miyn-widget-buttons-area a, .miyn-iframe-popup-box a
var _f ={
    
    ts : 0 ,
    cluidparam : '' ,
    dashboard_uid : '',
    
    calls : function (b_info) {
        $( document ).ready(function() {

        	console.log("function calls");

            window.location.href = 'tel:'+bmobile;
        });
    },
    
    custom_form : function (b_info) {
         $( document ).ready(function() {

         	console.log("function custom_form");

			var url = protocl + livesite + "/customform/"+config.uid+"?"+_f.cluidparam;
			if(_t.returniIframe()) {
				
				
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = url;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
			} else {
				_t.opennewlink(url);
			}
    		
    	 });
    },

    schedule : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function schedule");

            var url = protocl + livesite + "/online_newschedule/"+config.uid+"?"+_f.cluidparam;
            if(_t.returniIframe()) {

				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/online_newschedule/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
			} else {
				_t.opennewlink(url);
			}
    		
    	 });
    },
    
    reschedule : function(href){    // _l.a()
    
        $( document ).ready(function() {


        	console.log("function reschedule");
			
			if(_t.returniIframe()) {
					
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = href;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
			} else {
				_t.opennewlink(href);
			}
    		
    	 });
    },
    
    schedule_box : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function schedule_box");

			var url = protocl + livesite + "/online_newschedule_box/"+config.uid+"?"+_f.cluidparam;
			if(_t.returniIframe()) {

				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/online_newschedule_box/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f);
				
			} else {
				_t.opennewlink(url);
			}
			
    	 });
    },
    
    get_a_quote : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function get_a_quote");

			var url =  protocl + livesite + "/new-quote/"+config.uid+"?"+_f.cluidparam;
			
			if(_t.returniIframe()) {
			
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = url;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
    		} else {
				_t.opennewlink(url);
			}
			
    	 });
    },
    
    get_a_quote_box : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function get_a_quote_box");

			var url =  protocl + livesite + "/new-quote/"+config.uid+"?"+_f.cluidparam;
			if(_t.returniIframe()) {
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/new-quote/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f);
    		} else {
				_t.opennewlink(url);
			}
    	 });
    },
    
    send_file : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function send_file");
            
			var url = protocl + livesite + "/new_send_file/"+config.uid+"?"+_f.cluidparam;
            //console.log('send_file');
			if(_t.returniIframe()) {
				
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = url;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
				var f2 = document.createElement('iframe');
				f2.style.display = "block";
				f2.id="miyn-widgets-boxs-iframe";
				f2.src = url;
				f2.frameBorder="0";
				
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f2);
    		} else {
				_t.opennewlink(url);
			}
    	 });
    },
    
    greeting : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function greeting");
            
			var url = protocl + livesite + "/new-greeting/"+config.uid+"?"+_f.cluidparam;
            //console.log('greeting');
			if(_t.returniIframe()) {

				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/new-greeting/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
				var f2 = document.createElement('iframe');
				f2.style.display = "block";
				f2.id="miyn-widgets-boxs-iframe";
				f2.src = protocl + livesite + "/new-greeting/"+config.uid+"?"+_f.cluidparam;
				f2.frameBorder="0";
				
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f2);
    		} else {
				_t.opennewlink(url);
			}
			
    	 });
    },
    
    google_map : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function google_map");
            
			var url = protocl + livesite + "/new-google-map/"+config.uid+"?"+_f.cluidparam;
			if(_t.returniIframe()) {
            //console.log('google_map');

				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/new-google-map/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
				var f2 = document.createElement('iframe');
				f2.style.display = "block";
				f2.id="miyn-widgets-boxs-iframe";
				f2.src = protocl + livesite + "/new-google-map/"+config.uid+"?"+_f.cluidparam;
				f2.frameBorder="0";
				
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f2);
				
    		} else {
				_t.opennewlink(url);
			}
			
    	 });
    },
    
    chatnow : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function chatnow");
   		
    		var url = protocl + livesite + "/chatnow/"+config.uid+"?"+_f.cluidparam+_f.dashboard_uid;
			if(_t.returniIframe()) {
				//console.log('chat now');
	
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/chatnow/"+config.uid+"?"+_f.cluidparam+_f.dashboard_uid;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
				var f2 = document.createElement('iframe');
				f2.style.display = "block";
				f2.id="miyn-widgets-boxs-iframe";
				f2.src = protocl + livesite + "/chatnow/"+config.uid+"?"+_f.cluidparam+_f.dashboard_uid;
				f2.frameBorder="0";
				
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f2);
				//console.log(f2);
			} else {
				_t.opennewlink(url);
			}
    		
    	 });
    },
    
    my_account : function(b_info){    // _l.a()
    
        $( document ).ready(function() {

        	console.log("function my_account");
            
            //console.log('my_account');
			var url = protocl + livesite + "/client_get_newcode/"+config.uid+"?"+_f.cluidparam;
			if(_t.returniIframe()) {
				
				var f = document.createElement('iframe');
				f.style.display = "block";
				f.id="miyn-widgets-boxs-iframe";
				f.src = protocl + livesite + "/client_get_newcode/"+config.uid+"?"+_f.cluidparam;
				f.frameBorder="0";
				$('#miyn_iframe_box .miyn-widget-iframe-contents-load').html(f);
				
				var f2 = document.createElement('iframe');
				f2.style.display = "block";
				f2.id="miyn-widgets-boxs-iframe";
				f2.src = protocl + livesite + "/client_get_newcode/"+config.uid+"?"+_f.cluidparam;
				f2.frameBorder="0";
				
				$('#miyn_iframe_box2 .miyn-widget-iframe-contents-load').html(f2);
    		} else {
				_t.opennewlink(url);
			}
			
    	 });
    }
    

 
};
    
   
// layout 
var _l ={
    
    ts : 0 ,

    SVGIcons : function(typeoficon) {
        var svg = '';

        console.log("function SVGIcons-"+typeoficon);

		switch (typeoficon) {
		  case 'schedule':
		    console.log('schedule.');

  svg = `<svg class="roundedicon-schedule" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="91.95px"
	 height="100px" viewBox="0 0 91.95 100" style="enable-background:new 0 0 91.95 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-schedule {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-schedule path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<path d="M63.22,10.62V3.45c0-1.89-1.56-3.45-3.45-3.45c-1.89,0-3.45,1.56-3.45,3.45v6.9H26.44v-6.9c0-1.89-1.56-3.45-3.45-3.45
		c-1.89,0-3.45,1.56-3.45,3.45v7.17C7.13,11.77,1.1,19.17,0.18,30.16c-0.09,1.33,1.01,2.44,2.3,2.44h77.79
		c1.33,0,2.44-1.15,2.3-2.44C81.66,19.17,75.63,11.77,63.22,10.62z"/>
	<path d="M73.56,63.22c-10.16,0-18.39,8.23-18.39,18.39c0,3.45,0.97,6.71,2.67,9.47c3.17,5.33,9.01,8.92,15.72,8.92
		s12.55-3.59,15.72-8.92c1.7-2.76,2.67-6.02,2.67-9.47C91.95,71.45,83.72,63.22,73.56,63.22z M83.08,79.63l-9.79,9.06
		c-0.64,0.6-1.52,0.92-2.34,0.92c-0.87,0-1.75-0.32-2.44-1.01l-4.55-4.55c-1.33-1.33-1.33-3.54,0-4.87c1.33-1.33,3.54-1.33,4.87,0
		l2.21,2.21l7.36-6.8c1.38-1.29,3.59-1.2,4.87,0.18C84.55,76.14,84.46,78.3,83.08,79.63z"/>
	<path d="M78.16,39.49H4.6c-2.53,0-4.6,2.07-4.6,4.6v28.32C0,86.21,6.9,95.4,22.99,95.4h22.67c3.17,0,5.38-3.08,4.37-6.07
		c-0.92-2.67-1.7-5.61-1.7-7.72c0-13.93,11.36-25.29,25.29-25.29c1.33,0,2.67,0.09,3.95,0.32c2.76,0.41,5.24-1.75,5.24-4.51v-8
		C82.76,41.56,80.69,39.49,78.16,39.49z M28.55,77.98c-0.87,0.83-2.07,1.33-3.26,1.33c-1.2,0-2.39-0.51-3.26-1.33
		c-0.83-0.87-1.33-2.07-1.33-3.26s0.51-2.39,1.33-3.26c0.46-0.41,0.92-0.74,1.52-0.97c1.7-0.74,3.72-0.32,5.01,0.97
		c0.83,0.87,1.33,2.07,1.33,3.26S29.38,77.1,28.55,77.98z M28.55,61.88c-0.23,0.18-0.46,0.37-0.69,0.55
		c-0.28,0.18-0.55,0.32-0.83,0.41c-0.28,0.14-0.55,0.23-0.83,0.28c-0.32,0.05-0.64,0.09-0.92,0.09c-1.2,0-2.39-0.51-3.26-1.33
		c-0.83-0.87-1.33-2.07-1.33-3.26c0-1.2,0.51-2.39,1.33-3.26c1.06-1.06,2.67-1.56,4.18-1.24c0.28,0.05,0.55,0.14,0.83,0.28
		c0.28,0.09,0.55,0.23,0.83,0.41c0.23,0.18,0.46,0.37,0.69,0.55c0.83,0.87,1.33,2.07,1.33,3.26C29.89,59.82,29.38,61.01,28.55,61.88
		z M44.64,61.88c-0.87,0.83-2.07,1.33-3.26,1.33s-2.39-0.51-3.26-1.33c-0.83-0.87-1.33-2.07-1.33-3.26c0-1.2,0.51-2.39,1.33-3.26
		c1.75-1.7,4.83-1.7,6.53,0c0.83,0.87,1.33,2.07,1.33,3.26C45.98,59.82,45.47,61.01,44.64,61.88z"/>
</g>
</svg>
`;	

		    break;
		  case 'call':
		    console.log('call.');

 svg = `<svg class="roundedicon-call" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px"
	 height="100px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-call {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-call path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M93.73,100C40.41,100.08-0.06,59.12,0,6.27C0,2.81,2.8,0,6.25,0h16.5c3.1,0,5.73,2.28,6.18,5.34
	c1.09,7.34,3.23,14.49,6.35,21.23l0.64,1.39c0.89,1.93,0.29,4.22-1.44,5.45c-5.11,3.65-7.06,10.99-3.08,16.72
	c4.99,7.19,11.29,13.48,18.48,18.48c5.73,3.98,13.07,2.03,16.72-3.08c1.24-1.73,3.53-2.34,5.46-1.44l1.38,0.64
	c6.74,3.12,13.89,5.26,21.23,6.35c3.06,0.45,5.34,3.09,5.34,6.18v16.5C100,97.2,97.19,100,93.73,100L93.73,100z"/>
</svg>

`;	




		    break;
		  case 'file':
		    console.log('file.');

svg = `<svg class="roundedicon-file" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="105.29px" height="99.54px" viewBox="0 0 105.29 99.54" style="enable-background:new 0 0 105.29 99.54;"
	 xml:space="preserve">
<style type="text/css">
 svg.roundedicon-file {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-file path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<path d="M95.6,24.39c-3.81-3.81-9.62-4.31-20.31-4.38L60.58,34.72L60.29,35c-1.14,1.16-2.38,2.41-4.02,3.08
		c-1.63,0.68-3.39,0.67-5.02,0.67H0V60c0,14.14,0,21.21,4.39,25.6C8.78,90,15.85,90,30,90l26.93,0c1.78,0,3.13-1.56,2.9-3.32
		c-0.5-3.83-0.23-7.9,0.89-12.04c2.37-8.78,8.99-15.92,17.61-18.81c6.33-2.12,12.5-2.15,17.99-0.58c1.85,0.53,3.68-0.92,3.68-2.84
		c0-1.3,0-2.4,0-2.4C100,35.86,100,28.79,95.6,24.39z M61.18,20c-3.01,0-4.51,0-5.72-0.75c-1.21-0.75-1.88-2.09-3.23-4.78
		l-1.71-3.42c-2.69-5.38-4.03-8.06-6.45-9.56C41.66,0,38.65,0,32.63,0H20C10.57,0,5.85,0,2.92,2.93C0,5.86,0,10.57,0,20v11.25h50.85
		c1.08,0,1.68,0,2.13-0.04c0.2-0.01,0.31-0.03,0.37-0.04c0.03-0.01,0.04-0.01,0.05-0.01v-0.01h0.01l0.01-0.01l0.03-0.01
		c0.05-0.04,0.14-0.1,0.29-0.23c0.34-0.3,0.77-0.72,1.53-1.48L64.69,20H61.18z"/>
	<path d="M86.21,61.37c-10.54,0-19.08,8.54-19.08,19.08c0,3.58,1,6.96,2.77,9.83c3.29,5.53,9.35,9.25,16.31,9.25
		s13.02-3.72,16.31-9.25c1.76-2.86,2.77-6.25,2.77-9.83C105.29,69.91,96.75,61.37,86.21,61.37z M99.81,78.9l-8.82,9.16
		c-0.29,0.3-0.73,0.39-1.11,0.24c-0.39-0.15-0.64-0.53-0.64-0.94v-4.41h-1.61c-4.27,0-8.11,2.37-10.02,6.19
		c-0.18,0.35-0.55,0.58-0.93,0.58c-0.07,0-0.15-0.01-0.22-0.03c-0.46-0.11-0.79-0.5-0.79-0.97v-2.04c0-7.3,5.94-13.24,13.24-13.24
		h0.34v-4.41c0-0.42,0.25-0.79,0.64-0.94c0.38-0.15,0.83-0.06,1.11,0.24l8.82,9.16C100.19,77.88,100.19,78.5,99.81,78.9z"/>
</g>
</svg>
`;	


		    break;
		  case 'quote':
		    console.log('quote.');

svg = `<svg class="roundedicon-quote" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="115.65px" height="115.63px" viewBox="0 0 115.65 115.63" style="enable-background:new 0 0 115.65 115.63;"
	 xml:space="preserve">
<style type="text/css">
 svg.roundedicon-quote {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-quote path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<path d="M88.33,43.83c-8.14-1.76-14.77-8.4-16.54-16.54c-0.67-3.16-0.73-6.22-0.16-9.12c0.67-3.21-1.71-6.22-5.03-6.22H25.92
		C11.61,11.95,0,23.57,0,37.87V73.9c0,14.31,11.61,25.92,25.92,25.92h7.78c1.45,0,3.32,0.93,4.15,2.07l7.78,10.32
		c3.42,4.56,9.02,4.56,12.44,0l7.78-10.32c0.98-1.3,2.49-2.07,4.15-2.07h7.83c14.31,0,25.87-11.56,25.87-25.87V49.02
		c0-3.27-3.01-5.65-6.22-5.03C94.55,44.51,91.49,44.51,88.33,43.83z M31.1,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
		c2.85,0,5.18,2.33,5.18,5.18S34.01,63.79,31.1,63.79z M51.84,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
		c2.85,0,5.18,2.33,5.18,5.18S54.74,63.79,51.84,63.79z M72.57,63.79c-2.9,0-5.18-2.33-5.18-5.18s2.28-5.18,5.18-5.18
		c2.85,0,5.18,2.33,5.18,5.18S75.48,63.79,72.57,63.79z"/>
	<path d="M95.59,0C84.51,0,75.53,8.98,75.53,20.06c0,11.08,8.98,20.06,20.06,20.06c11.08,0,20.06-8.98,20.06-20.06
		C115.65,8.98,106.67,0,95.59,0z M93.31,25.33c-0.76,0.68-1.73,1.02-2.9,1.02c-1.37,0-2.51-0.45-3.4-1.36
		c-0.89-0.91-1.33-2.24-1.33-4.01c0-1.66,0.24-3.09,0.73-4.27c0.48-1.18,1.07-2.19,1.76-3.03c0.69-0.83,1.4-1.5,2.14-2
		c0.74-0.5,1.39-0.86,1.95-1.06l1.89,2.65c-1.12,0.56-2.02,1.3-2.71,2.23c-0.69,0.93-1.03,2.11-1.03,3.52
		c0.2-0.05,0.48-0.08,0.84-0.08c1.02,0,1.8,0.35,2.36,1.06c0.56,0.71,0.84,1.56,0.84,2.57C94.46,23.73,94.08,24.65,93.31,25.33z
		 M104.35,25.33c-0.76,0.68-1.73,1.02-2.9,1.02c-1.37,0-2.51-0.45-3.4-1.36c-0.89-0.91-1.33-2.24-1.33-4.01
		c0-1.66,0.24-3.09,0.73-4.27c0.48-1.18,1.07-2.19,1.76-3.03c0.69-0.83,1.4-1.5,2.14-2c0.74-0.5,1.39-0.86,1.95-1.06l1.89,2.65
		c-1.12,0.56-2.02,1.3-2.71,2.23c-0.69,0.93-1.03,2.11-1.03,3.52c0.2-0.05,0.48-0.08,0.84-0.08c1.02,0,1.8,0.35,2.36,1.06
		c0.56,0.71,0.84,1.56,0.84,2.57C105.5,23.73,105.12,24.65,104.35,25.33z"/>
</g>
</svg>

`;	


		    break;
		  case 'greeting':
		    console.log('greeting.');


svg = `<svg class="roundedicon-greeting" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px"
	 height="100px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-greeting {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-greeting path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M70,0H30C10,0,0,10,0,30v65c0,2.75,2.25,5,5,5h65c20,0,30-10,30-30V30C100,10,90,0,70,0z M60,66.25H25
	c-2.05,0-3.75-1.7-3.75-3.75c0-2.05,1.7-3.75,3.75-3.75h35c2.05,0,3.75,1.7,3.75,3.75C63.75,64.55,62.05,66.25,60,66.25z M75,41.25
	H25c-2.05,0-3.75-1.7-3.75-3.75s1.7-3.75,3.75-3.75h50c2.05,0,3.75,1.7,3.75,3.75S77.05,41.25,75,41.25z"/>
</svg>
`;	


		    break;
		  case 'googlemap':
		    console.log('googlemap.');


svg = `<svg class="roundedicon-googlemap" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="77.76px"
	 height="100px" viewBox="0 0 77.76 100" style="enable-background:new 0 0 77.76 100;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-googlemap {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-googlemap path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<path d="M38.88,100c-7.02-5.98-13.52-12.54-19.44-19.61C10.55,69.77,0,53.97,0,38.9C-0.01,23.17,9.47,8.98,24,2.96
	c14.53-6.02,31.27-2.69,42.39,8.44c7.31,7.28,11.41,17.18,11.38,27.5c0,15.06-10.55,30.87-19.44,41.49
	C52.4,87.46,45.9,94.02,38.88,100z M38.88,22.24c-5.95,0-11.45,3.18-14.43,8.33c-2.98,5.16-2.98,11.51,0,16.66
	c2.98,5.16,8.48,8.33,14.43,8.33c9.2,0,16.66-7.46,16.66-16.66C55.54,29.7,48.08,22.24,38.88,22.24z"/>
</svg>
`;	




		    break;
		   case 'chat':
		    console.log('chat.');

  svg = `<svg class="roundedicon-chat" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 87.65" style="enable-background:new 0 0 100 87.65;" xml:space="preserve">
<style type="text/css">
 svg.roundedicon-chat {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-chat path {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<path d="M69.15,0H11.31C5.07,0,0,5.07,0,11.31v50.68c0,2.4,2.71,3.75,4.63,2.38l16.11-11.49c1.35-0.96,2.94-1.47,4.6-1.47h35.43
		c6.24,0,11.31-5.07,11.31-11.31V2.93C72.08,1.31,70.76,0,69.15,0z M54.92,35.49H21.07c-1.62,0-2.93-1.31-2.93-2.93
		c0-1.62,1.31-2.93,2.93-2.93h33.85c1.62,0,2.93,1.31,2.93,2.93C57.85,34.18,56.53,35.49,54.92,35.49z M54.92,21.82H21.07
		c-1.62,0-2.93-1.31-2.93-2.93c0-1.62,1.31-2.93,2.93-2.93h33.85c1.62,0,2.93,1.31,2.93,2.93C57.85,20.51,56.53,21.82,54.92,21.82z"
		/>
	<path d="M100,34.03v50.68c0,2.38-2.7,3.76-4.63,2.38L79.26,75.61c-1.35-0.96-2.94-1.47-4.6-1.47H39.23
		c-6.24,0-11.31-5.07-11.31-11.31v-5.55h32.84c9.47,0,17.17-7.7,17.17-17.17V22.72h10.76C94.93,22.72,100,27.8,100,34.03L100,34.03z
		"/>
</g>
</svg>`;



		    break;
		  default:
		    console.log(`Sorry, we are out of ${expr}.`);
		}

        return svg
    },
    
    problem_div : function() {

    	console.log("function problem_div");

        $(".miyn-widgets-popup-inner-contents").css({"display": "block" });
    },
    
    nc : function(b_info) {
        var cl = '';
        cl += '<div id="chatlink" class="">';
            cl += '<a id="prime" class="fab bbutton  miyn-chat-link miynboxchat " dtbutton="chat" dtpopuptype="box"><span class="chatbox"></span></a>'; // miynchat
        cl += '</div>';
        $("body").append(cl);

        console.log("function nc");

    },

    a : function(b_info){    // _l.a()
    
       var prefix = "miyn";
	   
	   if(config.buttonprefix == false) {
	       prefix = "";
	   } 
	   
	   //console.log('prefix:'+prefix);

	   
	   if(b_info.liveaction.length > 0) {   // Right Box
    
            var img = protocl + livesite +'/newdesign/';
            var wb1 = '<div id="widget_button_option_1" class="miyn-widget-buttons-area">';
    		    wb1 += '<ul>';
    		    
    		    for (var i = 0; i < b_info.liveaction.length; i++) {
    		        if(b_info.liveaction[i].view_status == 'true') {
    		        	var ss= this.SVGIcons(b_info.liveaction[i].calltoaction);
    		        	//console.log(ss);
        			    wb1 += '<li><a id="'+prefix+b_info.liveaction[i].calltoaction+'" class=" rbutton '+prefix+b_info.liveaction[i].calltoaction+' " dtbutton="'+b_info.liveaction[i].calltoaction+'" href="#">';
        			    wb1 += ss;
        			    wb1 += '<span>'+b_info.liveaction[i].calltoaction_text+'</span></a></li>';


    		        	
    		        }
    		    }
    		    
    		   // if(config.uid == "13022022iao0k4ly7hp3rsu")  {
    		   //     wb1 += '<li><a class=" rbutton '+prefix+'chatnow" dtbutton="chatnow" href="#"><img src="https://'+livesite+'/images/asset/chat-now.png" alt="schedule-icon.png"/><span>Chat Now</span></a></li>';
    		   // }
    		    
    		    wb1 += '<li><a id="'+prefix+'acc" class=" rbutton '+prefix+'acc" dtbutton="acc" href="#miyn_iframe_box">';
    		      wb1 += `<svg class="roundedicon-acc" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="106.92px" height="102.35px" viewBox="0 0 106.92 102.35" style="enable-background:new 0 0 106.92 102.35;"
	 xml:space="preserve">
<style type="text/css">
 svg.roundedicon-acc {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-acc path {
    color:white;;
    fill: currentcolor;
}
svg.roundedicon-acc ellipse {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<ellipse cx="40.4" cy="27.08" rx="26.73" ry="27.08"/>
	<path class="st0" d="M40.4,67.42C18.61,67.42,0,70.9,0,84.83c0,13.92,18.49,17.53,40.4,17.53c21.79,0,40.4-3.48,40.4-17.41
		C80.8,71.02,62.31,67.42,40.4,67.42z"/>
	<path d="M104.22,50.32l1.35-1.35l1.35,1.35l-1.35,1.35L104.22,50.32z M75.59,52.23c-1.05,0-1.91-0.85-1.91-1.91
		c0-1.05,0.85-1.91,1.91-1.91V52.23z M94.12,37.52l11.46,11.46l-2.7,2.7L91.42,40.22L94.12,37.52z M105.57,51.67L94.12,63.13
		l-2.7-2.7l11.46-11.46L105.57,51.67z M104.22,52.23H75.59v-3.82h28.64V52.23z"/>
</g>
</svg>`;


				wb1 += '<span>My Account</span></a></li>';

        		wb1 += '</ul>';
        	    wb1 += '</div>';
        	    
            $("body").append(wb1);
            
            $("#miyn_iframe_box.miyn-widget-popup-content-area .miyn-widgets-popup-inner-contents").css({"border-top": "5px solid "+b_info.livestyle.action_background_color });	
            //console.log(b_info.livestyle.action_background_color);


            console.log("function a");

	   }
    },

  
    b : function(b_info) {    // _l.b()
        var img = protocl + livesite +'/newdesign/';
        var wb2 = '<div id="widget_popup_option_2" class="miyn-widgets-footer-button-area">';
    		    wb2 += '<a class="miyn-widget-popup-button" href="#popup-services"><img src="'+protocl+appsite+'/images/widget_image/'+b_info.livestyle.label_partial_image+'" alt="logo.png"/><span>Speak with Us</span></a>';
            wb2 += '</div>';
        
        $("body").append(wb2);
        
        var widget_popup_option_2 = $('#widget_popup_option_2');
        widget_popup_option_2.append(_l.c(b_info));
        //widget_popup_option_2.append(_l.d(b_info));


        console.log("function b");
    },
    
    c : function(b_info) {  // Bottom Box
    
        
	    
	    var grbox = "";
	    if(b_info.livestyle.button_bottom_design_type == "gridbox") {
	        grbox = "miyn-grid-layout";
	    } else {
	        grbox = "";
	    }
	    
	    var prefix = "miyn";
	   
	    if(config.buttonprefix == false) {
	       prefix = "";
	    }  else {
	        if(b_info.livestyle.button_bottom_open_box == "box") {
	            prefix  = "miynbox";
	        }
	    }
	    
	    //console.log('grbox:'+grbox);
	    
       
          var img = protocl + livesite +'/newdesign/';
          
              var wbin1 = '<div id="popup-services" class="miyn-widget-popup-content-area miyn-popup-services-area">';
                    wbin1 += '<a class="miyn-widget-popup-close-button" href="#close"><img src="'+img+'images/popup-cose.png" alt="close"/></a>';
        			wbin1 += '<div class="miyn-widgets-popup-inner-contents '+grbox+'" style="display:none;">'; //miyn-grid-layout
        				wbin1 += '<div class="miyn-popup-close-button"></div>';
        				wbin1 += '<div class="miyn-widget-popup-header">';
        					wbin1 += '<div class="miyn-widget-popup-logo">';
        						wbin1 += '<img src="'+protocl+appsite+'/images/widget_image/'+b_info.livestyle.label_partial_image+'" alt="logo"/>';
        					wbin1 += '</div>';
        					wbin1 += '<div class="miyn-widget-popup-header-content">';
        						wbin1 += '<h3>'+b_info.livestyle.title_partial_label+'</h3>';
        						if(typeof(b_info.bussiness_short_description) =="string") {
        						    wbin1 += '<p>'+b_info.bussiness_short_description+'</p>';
        						}
        					wbin1 += '</div>';
        				wbin1 += '</div>';
        				wbin1 += '<div class="miyn-widget-popup-services">';
        				
        					wbin1 += '<ul>';
        					    
            					for (var i = 0; i < b_info.liveaction.length; i++) {
            					    if(b_info.liveaction[i].view_status == 'true') {

            					    	var ss= this.SVGIcons(b_info.liveaction[i].calltoaction);
                        		        //	wbin1 += '<li><a class=" '+prefix+b_info.liveaction[i].calltoaction+' " href="#miyn_iframe_box2"><img src="https://'+livesite+'/images/asset/'+b_info.liveaction[i].rounded_button_image+'" alt="schedule-icon.png"/><span>'+b_info.liveaction[i].calltoaction_text+'</span></a></li>';
            					        wbin1 += '<li><a class=" bbutton '+prefix+b_info.liveaction[i].calltoaction+' openbox  '+prefix+b_info.liveaction[i].calltoaction+'-box " dtbutton="'+b_info.liveaction[i].calltoaction+'" dtpopuptype="'+b_info.livestyle.button_bottom_open_box+'" href="#"><span>';
            					        wbin1 += ss;
            					        wbin1 += '</span>'+b_info.liveaction[i].calltoaction_text+'</a></li>';
            					    	

            					    }   
            					}
            					//if(config.uid == "13022022iao0k4ly7hp3rsu")  {
            					//    wbin1 += '<li><a class=" bbutton '+prefix+'chatnow" dtbutton="chatnow" dtpopuptype="'+b_info.livestyle.button_bottom_open_box+'" href="#"><span><img src="https://'+livesite+'/images/asset/chat-now.png" alt="schedule-icon.png"/></span>Chat Now</a></li>';
            					//}
            					wbin1 += '<li><a class=" bbutton '+prefix+'acc  miynacc-box openbox " dtbutton="acc" dtpopuptype="'+b_info.livestyle.button_bottom_open_box+'" href="#"><span>';

wbin1 += `<svg class="roundedicon-acc" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="106.92px" height="102.35px" viewBox="0 0 106.92 102.35" style="enable-background:new 0 0 106.92 102.35;"
	 xml:space="preserve">
<style type="text/css">
 svg.roundedicon-acc {
    width:17px;
    height:17px;
 
 }
svg.roundedicon-acc path {
    color:white;;
    fill: currentcolor;
}
svg.roundedicon-acc ellipse {
    color:white;;
    fill: currentcolor;
}
</style>
<defs>
</defs>
<g>
	<ellipse cx="40.4" cy="27.08" rx="26.73" ry="27.08"/>
	<path class="st0" d="M40.4,67.42C18.61,67.42,0,70.9,0,84.83c0,13.92,18.49,17.53,40.4,17.53c21.79,0,40.4-3.48,40.4-17.41
		C80.8,71.02,62.31,67.42,40.4,67.42z"/>
	<path d="M104.22,50.32l1.35-1.35l1.35,1.35l-1.35,1.35L104.22,50.32z M75.59,52.23c-1.05,0-1.91-0.85-1.91-1.91
		c0-1.05,0.85-1.91,1.91-1.91V52.23z M94.12,37.52l11.46,11.46l-2.7,2.7L91.42,40.22L94.12,37.52z M105.57,51.67L94.12,63.13
		l-2.7-2.7l11.46-11.46L105.57,51.67z M104.22,52.23H75.59v-3.82h28.64V52.23z"/>
</g>
</svg>
`;


            					wbin1 += '</span>My Account</a></li>';
        					
        					wbin1 += '</ul>';
        					
        				wbin1 += '</div>';
        				wbin1 += '<div class="miyn-widgets-popup-footer">';
        				if((b_info.remove_all_miyn_powered == 'true') && ((b_info.package_id == '3') || (b_info.package_id == '5'))) {
        				    
        				    if(b_info.powered_by_text == null) {
        				        wbin1 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'"/images/MIYN-popup-logo-120x30.png" /></a></p>';
        				    } else {
        				        wbin1 += '<p ><span style="color:'+b_info.livestyle.action_background_color+'">'+b_info.powered_by_text+'</span></p>';
        				    }
        		            
        		        } else {
        		            wbin1 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'/images/MIYN-popup-logo-120x30.png" /></a></p>';
        		        }  
        				//	wbin1 += '<p>Powered by MIYN. </p>';
        				wbin1 += '</div>';
        			wbin1 += '</div>';
        		wbin1 += '</div>';

        		console.log("function c");
        		
        		return wbin1;
      
    },
    
    d : function(b_info) {
        
       var img = protocl + livesite +'/newdesign/';
       
        var wbin2 = '<div id="miyn_iframe_box2" class=" miyn-widgets-iframe-box-area">';
            wbin2 += '<a class="miyn-widget-popup-close-button" href="#close"><img src="'+img+'images/popup-cose.png" alt="close"/></a>';
            wbin2 += '<div class="miyn-widgets-popup-inner-contents" style="display:none;">';
    			wbin2 += '<div class="miyn-widget-popup-header">';
    				wbin2 += '<div class="miyn-widget-popup-logo">';
    					wbin2 += '<img src="'+protocl+appsite+'/images/widget_image/'+b_info.livestyle.label_partial_image+'" alt="logo"/>';
    				wbin2 += '</div>';
    				wbin2 += '<div class="miyn-widget-popup-header-content">';
    				    if(typeof(b_info.bussiness_short_description) =="string") {
    					    wbin2 += '<p>'+b_info.bussiness_short_description+'</p>';
    				    }
    				wbin2 += '</div>';
    			wbin2 += '</div>';
    			wbin2 += '<div class="miyn-widget-iframe-contents-load">';
    			   // wbin2 += '<iframe id="miyn-widgets-boxs-iframe" src="https://live2.miyn.app/live_iframe/iframe-box2.php" style="border: 0px;"></iframe>';
    			wbin2 += '</div>';
    			wbin2 += '<div class="miyn-widgets-popup-footer">';
    				    if((b_info.remove_all_miyn_powered == 'true') && ((b_info.package_id == '3') || (b_info.package_id == '5'))) {
        		            
        		            if(b_info.powered_by_text == null) {
        				        wbin2 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'/images/MIYN-popup-logo-120x30.png" /></a></p>';
        				    } else {
        				        wbin2 += '<p ><span style="color:'+b_info.livestyle.action_background_color+'">'+b_info.powered_by_text+'</span></p>';
        				    }
        				    
        		        } else {
        		            wbin2 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'/images/MIYN-popup-logo-120x30.png" /></a></p>';
        		        }  
    			wbin2 += '</div>';
            wbin2 += '</div>';
        wbin2 += '</div>';

        console.log("function d");
        
        $("body").append(wbin2);
      
    },
    
    e : function(b_info) {  // _l.e()
        
       var img = protocl + livesite +'/newdesign/';
       
       var wb3 = '<div id="miyn_iframe_box" class="miyn-widget-popup-content-area miyn-widgets-iframe-box-area">';
            wb3 += '<div class="miyn-widgets-popup-inner-contents" style="display:none;">';
    			wb3 += '<div class="miyn-popup-close-button"></div>';
    			wb3 += '<div class="miyn-widget-popup-header">';
    				wb3 += '<div class="miyn-widget-popup-logo">';
    					wb3 += '<img src="'+protocl+appsite+'/images/widget_image/'+b_info.livestyle.label_partial_image+'" alt="logo" style="filter: initial;"/>';
    				wb3 += '</div>';
    				wb3 += '<div class="miyn-widget-popup-header-content">';
    					if(typeof(b_info.bussiness_short_description) =="string") {
    					    wb3 += '<p>'+b_info.bussiness_short_description+'</p>';
    					}
    				wb3 += '</div>';
    			wb3 += '</div>';
    			wb3 += '<div class="miyn-widget-iframe-contents-load">';
    			    //wb3 += '<iframe id="miyn-widgets-boxs-iframe" src="https://live2.miyn.app/live_iframe/iframe-box.php" style="border: 0px;"></iframe>';
    			wb3 += '</div>';
    			wb3 += '<div class="miyn-widgets-popup-footer">';
    				    if((b_info.remove_all_miyn_powered == 'true') && ((b_info.package_id == '3') || (b_info.package_id == '5'))) {

        		            if(b_info.powered_by_text == null) {
        				        wb3 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'/images/MIYN-popup-logo-120x30.png" /></a></p>';
        				    } else {
        				        wb3 += '<p ><span style="color:'+b_info.livestyle.action_background_color+'">'+b_info.powered_by_text+'</span></p>';
        				    }
        		            
        		        } else {
        		            wb3 += '<p>Driven by <a target="_blank" href="'+protocl+mainsite+'"><img alt="MIYN logo" class="miyn-popup-brand" src="'+protocl+cdnsite+'/images/MIYN-popup-logo-120x30.png" /></a></p>';
        		        }
    			wb3 += '</div>';
            wb3 += '</div>';
        wb3 += '</div>';
        

        console.log("function e");

        $("body").append(wb3);
      
    }
    
};


