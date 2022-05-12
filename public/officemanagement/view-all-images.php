<style type="text/css">
.imagelist {
	display: flex;
	flex-wrap: wrap;
}
.imagelist a {
	margin: 5px;
	border: 5px solid #dbd8d8;
}
.imagelist a img {
    max-width: 350px;
    height: 170px;
}

</style>

<?php
$url = "https://live.miyn.app/officemanagement/image/full/";
$foldername = dirname(__DIR__).'/officemanagement/image/full/';
$d = $foldername;
//$imag = array();
echo '<div class="imagelist">';
foreach(glob($d.'*.{jpg,JPG,jpeg,JPEG,png,PNG}',GLOB_BRACE) as $file){
    $image =  basename($file);
    echo '<a href=""><img src="'.$url.$image.'" /></a>';
}
echo '</div>';


?>