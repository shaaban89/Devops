<div id="sidebar">
<div id="adverts">
    <h2></h2>
    <ul>
        <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads2.gif" alt="Adevertise here" /></a></li>
        <li><a href="http://www.hail4sa.com/"><img src="<?php bloginfo('template_directory'); ?>/images/ads1.gif" alt="Adevertise here" /></a></li>
        <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads4.gif" alt="Adevertise here" /></a></li>
        <li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads3.gif" alt="Adevertise here" /></a></li>
    </ul>
</div>

<div id="pages">
	<h2>صفحات</h2>
	<ul>
		<?php wp_list_pages('depth=1&title_li='); ?>
	</ul>
</div>

<ul id="globalul">
	<?php 			
		if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar()) :
	?>
	<li class="widget">
    	<h2>تصنيفات</h2>
        <ul>
        	<?php wp_list_categories('depth=1&heirarchial=0&title_li='); ?>
        </ul>
    </li>
    <li class="widget">
    	<h2>مدونات صديقة</h2>
        <ul>
        	<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
        </ul>
    </li>
    <li class="widget">
       	<h2>الأرشيف</h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
   	</li> 
    <?php endif; ?>
</ul><!-- Global ul End -->

<div id="sidebar-end"></div>
</div><!-- Sidebar End -->