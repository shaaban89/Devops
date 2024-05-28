<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ar" lang="ar">

<head>
       <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
       <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
       <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scrolltop.js"></script>
       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/j-scripts.js"></script>
       <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tipsy.js"></script>
	   <title><?php bloginfo('name'); ?> - <?php wp_title(); ?></title>
       <link rel="pingback" href="<?php bloginfo('pingback url'); ?>" /> 
	   <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
       <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
       <!--[if gte IE 7]>
      	 <link href="<?php bloginfo('template_directory'); ?>/ie8.css" rel="stylesheet" type="text/css" media="screen" />
       <![endif]-->
       <!--[if IE 7]>
      	 <link href="<?php bloginfo('template_directory'); ?>/ie7.css" rel="stylesheet" type="text/css" media="screen" />
       <![endif]-->
       <!--[if lt IE 7]>
      	 <link href="<?php bloginfo('template_directory'); ?>/ie6.css" rel="stylesheet" type="text/css" media="screen" />
     	 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngFix.js"></script>
         <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngs.js"></script>
	   <![endif]-->
       <?php wp_head(); ?>
</head>

<body>
<div id="page-wrraper"><!-- Page Wrrap Start -->
<div id="wrraper"><!-- Wrraper Start -->
<div id="top-section">

<div id="top-meta">
	<h2></h2>
	<ul>
		<?php wp_register(); ?>
       	<li><?php wp_loginout(); ?></li>
        <li><a href="<?php bloginfo ('rss2_url');?>">خلاصة المواضيع</a></li>
        <li><a href="http://msa3d.net/%D8%AA%D9%88%D8%A2%D8%B5%D9%84-%D9%85%D8%B9%D8%A2%D9%8A/">call for MusaaD</a></li>
	</ul>
</div>

<div id="about">
	<h2></h2>
    <p>
    ﻿<?php include TEMPLATEPATH . '/include/about.txt';?>
    <a class="more" href="#">المزيد ..</a>
    </p>
</div>

<div id="last-entry">
	<h2></h2>
    <ul>
    	<?php wp_get_archives('type=postbypost&limit=3');  ?>
    </ul>
</div>

</div><!-- Top Section End -->

<div id="header">

<ul id="navbar">
	<li><a href="<?php bloginfo ('url');?>" class="liactive">الرئيسية</a></li>
  	<?php wp_list_pages('depth=1&title_li='); ?>
</ul>

<?php include TEMPLATEPATH . '/searchform.php';?>

<a href="#" id="show-hide" title="إظهار / إخفاء القائمة العليا"></a>
<h2><a href="<?php bloginfo ('url');?>" id="logo" title="go home"></a></h2>
<a href="<?php bloginfo ('rss2_url');?>" id="rss" title="Rss اشترك في خلاصات الـ"></a>
<a href="<?php include TEMPLATEPATH . '/include/twitter.txt';?>" id="twitter" title="اتبعني في تويتر"></a>

</div><!-- Header End -->
