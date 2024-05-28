<?php get_header(); ?>
<!-- Header End -->

<div id="content">

<div id="main-content">
	
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
	<div class="post-wrap">
		<h2 class="post-title">
        	<a href="<?php the_permalink(); ?>" title="قراءة التدوينة: <?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="top-meta">
			<span class="date"><?php the_time('d M Y'); ?></span> | <span class="author">بواسطة: <?php the_author_link(); ?></span>
		</p>
        <div class="entry">
        	<!-- Topics Goes Here -->
            	<?php the_excerpt(' ');?>
            <!-- Topics Goes Here -->
            <div class="clear"></div>
        </div>
        <p class="bot-meta">
        	<a class="comms left" href="<?php comments_link(); ?>"><?php comments_number('لا تعليقات', 'تعليق واحد', '% تعليقات'); ?> »</a> <span class="under right">مصنف في: <span class="labels"><?php the_category(', '); ?></span></span>
        </p>
	</div><!-- Post Wrrap End -->
    <?php endwhile; ?>
    	<?php else : ?>
    	<?php include TEMPLATEPATH . '/404.php';?>
	<?php endif; ?> 
    <?php previous_posts_link('<span class="last-entries right">« تدوينات أحدث</span>'); ?>
	<?php next_posts_link('<span class="next-entries left">تدوينات أقدم »</span>'); ?>
</div><!-- Main-content End -->

<!-- Sidebar End -->
<?php get_sidebar(); ?>
<div class="clear"></div>

<!-- Footer -->
<?php get_footer(); ?>