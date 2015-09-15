<?php echo doctype('html5');?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title ?></title>

		<?php 
			echo link_tag('public/images/ameriCheck.ico', 'icon', 'image/x-icon'); 
		    echo link_tag('http://yui.yahooapis.com/pure/0.6.0/pure-min.css');
			echo link_tag('//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
			echo link_tag('public/css/font-awesome.min.css'); 
			echo link_tag('public/css/styles.css'); 
			echo js_tag('https://code.jquery.com/jquery-2.1.4.min.js'); 
			echo js_tag('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js');			
		?>
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
		<![endif]-->
		<!--[if gt IE 8]><!-->
	    	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<!--<![endif]-->
	</head>
	<body>
