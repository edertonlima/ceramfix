<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="" />
<meta name="language" content="pt-br" />
<meta name="title" content="" />
<!--<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />-->

<title></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){
		jQuery(".seta").click(function(){
			var scroll = jQuery(this).attr('rel');
		    jQuery("html, body").animate({ scrollTop: jQuery(scroll).offset().top }, 1000);
		});
	});
</script>

</head>