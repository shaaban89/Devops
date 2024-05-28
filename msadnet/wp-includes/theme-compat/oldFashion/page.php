<?php get_header(); ?>
<!-- Header End -->

<div id="content">

<div id="main-content">
	
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
	<div class="post-wrap">
		<h2 class="post-title">
        	<?php the_title(); ?>
        </h2>
        <p class="top-meta">
			<span class="date"><?php the_time('d M Y'); ?></span> | <span class="author">بواسطة: <?php the_author_link(); ?></span>
		</p>
        <div class="entry">
        	<!-- Topics Goes Here -->
            	<?php the_content('<span class="cont-read left">أكمل القراءة »</span>');?>
            <!-- Topics Goes Here -->
            <div class="clear"></div>
        </div>
	</div><!-- Post Wrrap End -->
    <?php endwhile; ?>
    	<?php else : ?>
    	<?php include TEMPLATEPATH . '/404.php';?>
	<?php endif; ?> 

</div><!-- Main-content End -->

<!-- Sidebar End -->
<?php get_sidebar(); ?>
<div class="clear"></div>

<!-- Footer -->
<?php get_footer(); ?>