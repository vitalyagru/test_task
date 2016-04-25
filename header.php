<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8" />
			<title>Test Task</title>
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel="stylesheet" href="<?php  echo  get_template_directory_uri(); ?>/libs/bootstrap/bootstrap-grid.min.css" />
			<link rel="stylesheet" href="<?php  echo  get_template_directory_uri(); ?>/css/<?php
										 $options = get_option('sample_theme_options'); 
										 echo $options['selectinput'];
										 ?>.css">
			<link rel="stylesheet" href="<?php  echo  get_template_directory_uri(); ?>/css/media.css">
			<?php echo wp_head(); ?>
		</head>
		<body>
			<!--		Loader		-->
			<div class="loader">
				<div class="loader_inner"></div>
			</div>
			<!--		HEADER		-->
			<header class="main_head">
				<div class="header_topline container-fluid">
					<div class="row">
						<div class="col-md-6 col-xs-6  col-sm-3 logo">
     						<a href="index.html"><img src="<?php  echo  get_template_directory_uri(); ?>/img/logo.png" alt="Logo"></a>
    					</div>
   						<div class="nav_button col-xs-6 hidden-md hidden-lg hidden-sm">
   							<button class="button_menu">
							<img src="<?php  echo  get_template_directory_uri(); ?>/img/menuIcon.png" alt="menu_icon">    										
							</button>
   						</div>				
						<div class="col-md-6 col-xs-12  col-sm-9 menu">
						<!--	Menu	-->
						<?php 	wp_nav_menu(array('theme_location' => 'top_mnu')); ?>
						</div>
					</div>
				</div>
			<!--	Slider  -->
				<div class="slider container-fluid">
					<div class="row">
						<div class="bg_slide col-md-6 col-sm-6  hidden-xs">
    						<img src="<?php echo $options['img_header']; ?>" alt="mobi" >
    					</div>
						<div class="description_slider col-md-6 col-sm-6 col-xs-12 ">
							<h2><?php echo  get_bloginfo('name'); ?></h2>
							<p><?php echo  get_bloginfo('description'); ?></p>
							<a href="<?php echo $options['button_href']; ?>" class="main_button"><?php echo $options['button_text']; ?></a>
							<div class="rounds">
								<div class="round active"></div>
								<div class="round"></div>
								<div class="round"></div>
							</div>
						</div>
					</div>
				</div>
			</header>