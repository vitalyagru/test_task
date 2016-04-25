
			<!--		HEADER		-->
			<?php get_header(); ?>
			
			<!--		OUT SERVICES        -->
			<a name="services"></a>
			<section class="services" >
				<div class="container">
					<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="line col-md-3  col-sm-3 hidden-xs"></div>
							<div class="col-md-6 col-sm-6">
								<h2><?php
									$idObj = get_category_by_slug('services');
									echo get_cat_name($idObj->term_id);?></h2>
							</div>
							<div class="line col-md-3 col-sm-3 hidden-xs"></div>
						</div>
					</div>
						<!--  Container1  -->
						<div class="col-md-4">
							<?php dynamic_sidebar('content1');?>
						</div>
						<!--  Container2  -->
						<div class="col-md-4">
							<?php dynamic_sidebar('content2');?>
						</div>
						<!--  Container3  -->
						<div class="col-md-4">
							<?php dynamic_sidebar('content3');?>
						</div>
					</div>
				</div>
			</section>
			<!--			ABOUT         -->
			<a name="about"></a>
			<section class="about">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="line col-md-3  col-sm-3 hidden-xs"></div>
								<div class="col-md-6 col-sm-6">
									<h2><?php $idObj = get_category_by_slug('about');
									$id_about = $idObj->term_id;
									echo get_cat_name($id_about);?></h2>
								</div>
								<div class="line col-md-3 col-sm-3 hidden-xs"></div>
							</div>
						</div>	
						<div class="col-md-6">
						<?php if ( have_posts() ) : query_posts('cat='.$id_about);
							while (have_posts()) : the_post('p=39'); ?>

							<h3 class="test_header" ><?php the_title(); ?></h3>
							<div class="text_test"><?php the_content(); ?></div>
							
							<? endwhile; endif; wp_reset_query(); ?>
							<!--  SKILLS  -->
							<h3 class="skills">SKILLS</h3>
							<?php dynamic_sidebar('skills');?>
						</div>
						<div class="col-md-6">
							<!--  Map  -->
							<img src="<?php $options = get_option('sample_theme_options');  
									         echo $options['map_src']; ?>" alt="" class="map img-responsive">
							<!--  Contact form  -->
							<?php dynamic_sidebar('form');?>
							
						</div>
					</div>
				</div>
			</section>
		<!--			FOOTER        -->
		<?php get_footer(); ?>
	
		</body>
</html>