<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your site demo</title>
<style type="text/css">
body, html {
  height: 100%;
  overflow:none;
  padding:0;
  margin:0;
}

html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}

#right {
  height: 100%;
}

iframe {
    height: 100%;
    width: 100%;
    overflow: hidden;
    border: none;
}

.liveSiteMainBody #livesite_action_buttons {
    margin-right:15px;
}


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type='text/javascript' charset='utf-8'>
/*window.onload = function() {
    MIYNLive.init({
		uid: '{{$uid}}',
		ui: true,
		buttonprefix: true
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
*/
		


     window.onload = function() {
        MIYNLive.init({
            uid: '{{$uid}}',
            ui: true,
            buttonprefix: true,
            paramName: 'action'
        });
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0],
            p = 'https://',
            r = Math.floor((20000000 - 10) * Math.random());
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id; fjs.setAttribute('async','true');
        js.src = "{{config('app.live_url')}}/site/js/liveschedule.js?" + r;
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'miyn-widget-jssdk'));

</script> 


</head>

<body class="liveSiteMainBody">

<?php 
$home_content = strval($_GET['sitename']);
//$homepage = file_get_contents($home_content); 
//echo $homepage;
?>
<div id="right" class="">
    <iframe src="{{config('app.live_url')}}/mysite?sitenames=<?php echo $home_content; ?>" height="600" width="99%" style="border: 0 !important;"></iframe>
</div>

<style type="text/css">
#widget_button_option_1.miyn-widget-buttons-area {
    position: fixed;
    top: 90px;
    right: 15px;
    padding: 10px 14px;
    border-radius: 5px;
    z-index: 999999999;
}

</style>

</body>



</html>



