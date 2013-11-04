<!DOCTYPE html>
<!--Website by Marc Anderson, Personal Portfolio Site-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php
            echo '<title>Portfolio - ' . $page_title . '</title>';
        ?>
        <!--CSS link for project -->
        <link rel="stylesheet" type="text/css" href="css/stylo.css" media="screen">
        <!--Theme Roller link for CSS -->
        <link src="//ajax.googleopis.com/ajax/libs/jqueryui/1.10.3/themes/vader/jquery-ui.min.css" rel="stylesheet" type="text/css">
        
        <!--JavaScript + JQuery sources-->
        <script src="//ajax.googleopis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/easySlider1.7.js"></script>
	<!--Easy Silder JS-->
        <script type="text/javascript">
		$(document).ready(function(){	
			$("#slider").easySlider({ 
				continuous: true,
				numeric: true,
                                auto: true
			});
		});	
	</script>
    </head>
<body>
    <header>
        <!-- logo -->
        <img id="logo" src="http://webdesign4.georgianc.on.ca/~200235076/AdvWebPro/portfolio/image/logo.png" alt="Marc Anderson's Logo" />
        <h1>Marc Anderson's Portfolio Site</h1>   
<?php
require_once('navmenu.php');
?>
    </header>