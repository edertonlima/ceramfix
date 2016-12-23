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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<?php /*
<!-- CSS SELECT2-->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/select2.min.css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/select2.min.js"></script>

<!-- FILE STYLE -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap-filestyle.min.js"></script>
*/ ?>

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