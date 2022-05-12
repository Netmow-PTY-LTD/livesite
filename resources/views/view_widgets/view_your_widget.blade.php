<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Your site demo</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type='text/javascript' charset='utf-8'>
		
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

<body>


<?php

    $_URL = $business_view->b_website;


    if (! @file_get_contents($_URL))
    {
        //echo "Service not responding.";
    } else {
?>
     

<?php

    }

?>


</body>


<script type='text/javascript' charset='utf-8'>
/*    window.onload = function() {
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
            r = Math.floor(new Date().getTime() / 1000000);
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = p + "{{config('app.live_url')}}/site/js/liveschedule.js?" + r;
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'miynsite-jssdk'));*/
</script>




</html>



