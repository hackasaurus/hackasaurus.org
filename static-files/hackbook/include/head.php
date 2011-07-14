<!DOCTYPE HTML>
<html>

<head>
	
	<!-- Meta Data -->
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Hackasaurus Snippet Library</title>
	
	<!-- Links -->
	<link href="style/reset.css" rel="stylesheet" type="text/css">
	<link href="style/snippets.css" rel="stylesheet" type="text/css">
	<!--<link rel="stylesheet" href="http://f.fontdeck.com/s/css/E7uOHrgs0nw2MqW6o/fP2Vg4IGg/maban.co.uk/6992.css" type="text/css" />-->
	
	<!-- Browser compatibility -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Syntax Highlighter JS files -->
	<link href="script/syntax-highlighter/src/prettify.css" type="text/css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="script/syntax-highlighter/src/prettify.js"></script>
	<!--<script type="text/javascript" src="script/cookie.js"></script>-->
	<script type="text/javascript" src="script/accordion.js"></script>
	<script src="http://popcornjs.org/code/dist/popcorn-complete.min.js"></script>
			
	<script type="text/javascript">		
		$(document).ready(function() {
			/* Sets the cookie */
			/*var color = $.cookie("color");
  			if (color != "") {
				$("body").attr('class', color);
  			}*/
  			
			/* Adds hasjs class to html tag if javascript is on */
			jQuery(function($) {
				$('html').addClass('hasjs');
			});
			/* Adds a class to the body for colour switcher */
			$(".colour li").click(function(){
				var color = $(this).attr('class');
				$.cookie('color', color);
				$("body").attr('class', color);
				return false;
			});
			/* Accoridon menus */			
			$('.examples').hide();
			$('.snippet:first .examples').show();
			$('.snippet h1').click(
			function() {
				var checkElement = $(this).next();
				if((checkElement.is('.examples')) && (checkElement.is(':visible'))) {
					return false;
				}
				if((checkElement.is('.examples')) && (!checkElement.is(':visible'))) {
					$('.snippet .examples:visible').slideUp('normal');
					checkElement.slideDown('normal');
					return false;
				}
			});
			/* Accoridon menus */			
			$('.colors ul').hide();
			$('.colors span').click(
			function() {
				var checkElement = $(this).next();
				window.location.hash = $(this).parent('id');
				if((checkElement.is('.colors ul')) && (checkElement.is(':visible'))) {
					return false;
				}
				if((checkElement.is('.colors ul')) && (!checkElement.is(':visible'))) {
					$('.colors ul:visible').slideUp('normal');
					checkElement.slideDown('normal');
					return false;
				}
			});
			
		});

</script>


</head>