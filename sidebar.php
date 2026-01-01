<?php mw_sidebar(); ?>
<div class="content-sidebar">
<?php

/* Widgetized sidebar, if you have the plugin installed. */

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>


<h3><?php _e('Pages','martword'); ?></h3>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<h3><?php _e('Categories','martword'); ?></h3>
<ul>	
<?php wp_list_categories('title_li='); ?>
</ul>

<h3><?php _e('Blogroll','martword'); ?></h3>
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>

<h3><?php _e('Archive','martword'); ?></h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

<h3><?php _e('Meta','martword'); ?></h3>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','martword'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>','martword'); ?></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS','martword'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>','martword'); ?></a></li>
<?php wp_meta(); ?>
</ul>

<?php endif; ?>
</div>