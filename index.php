<?php get_header(); ?>

<?php if (function_exists('wp_snap')) { echo wp_snap(); } ?>

<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

<?php if( is_category('', false) ) : ?>
	<h1>Category: <?php single_cat_title(); ?></h1>
<?php elseif ( is_tag('', false) ) : ?>
	<h1>Tagged: <?php single_tag_title(); ?></h1>
<?php elseif ( is_search()  ) : ?>
	<h1>Search: &quot;<?php echo esc_html( get_search_query( false ) ); ?>&quot;</h1>
<?php endif; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class( ['type-index'] ); ?> id="post-<?php the_ID(); ?>">
		
		<?php if (isset($mw_post_author) && ($mw_post_author == "Main page" || $mw_post_author == "Both")) : ?>
		<div class="about_author clear">
			<span class="alignleft"><?php echo get_avatar( get_the_author_id(), '20' ); ?></span>
			<div class="alignleft" style="width:470px;"><h4><?php _e('Posted by','martword'); ?> <a href="<?php the_author_url(); ?> "><?php the_author(); ?></a></h4><?php // the_author_description(); if(!get_the_author_description()) _e('No description. Please complete your profile.','martword'); ?></div>
			<div class="clear"></div>
		</div>
		<?php endif; ?>

		<div class="postContent">

			<?php mw_simple_date(); ?>
	
			<?php 
			if ( has_post_thumbnail() ) { 
				?><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php
				the_post_thumbnail();
				?></a><?php
			} 
			?>

			<h2 class="postTitle"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		
			<div class="excerpt">
				<?php print trim( get_the_excerpt() ); ?>&hellip; <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">Read more &raquo;</a>
			</div>

		</div><!-- /.postContent -->

		<?php if(function_exists('wp_print')) { print_link(); } ?>
		<?php wp_link_pages('before=<div class="nav_link">'.__('PAGES','martword').': &after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>

		<div class="cat_tags clear">
			<span class="category">
				<?php _e('Category:','martword');
				echo " ";
				the_category(', ');
				?>
			</span>
			
			<?php
			if( get_the_tags() ){ 
				echo '<span class="tags">';
				_e('Tagged as:','martword'); 
				echo " "; 
				the_tags('','',''); 
				echo '</span>';
			} 
			?>

			<div class="clear"></div>
		</div>

		<?php comments_template(); ?>

	</div>

<?php endwhile; else: ?>

	<div class="type-page">

		<h1><?php _e('Not Found','martword'); ?></h1>
		<p><?php  _e("Sorry, but you are looking for something that isn't here.","martword"); ?></p>

	</div>

<?php endif; ?>

<div class="newer_older">
	<span class="newer">&nbsp;<?php previous_posts_link(__('&laquo; Newer Entries','martword')) ?></span>
	<span class="older">&nbsp;<?php next_posts_link(__('Older Entries &raquo;','martword')) ?></span>
</div><!-- /.newer_older -->

<?php get_footer(); ?>
