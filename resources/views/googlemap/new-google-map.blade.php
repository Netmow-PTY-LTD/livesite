
@if($google_map_key == '')

    <h2>You have to upgrade your account for seeing google map business address</h2>
    <h1> <a href="https://miyn.app/pricing/">Upgrade</a> </h1>


    \
    

@else
    <div style="text-align:center;">
        <iframe src="https://www.google.com/maps/embed/v1/place?key=<?php echo $google_map_key; ?>&q=<?php echo $business_address; ?>"  width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
@endif
