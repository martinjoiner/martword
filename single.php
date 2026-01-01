<?php get_header(); ?>


<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div <?php post_class( ['type-single'] ) ?> id="post-<?php the_ID(); ?>">
	
		<div class="postContent">

			<?php mw_simple_date(); ?>

			<h1 class="postTitle"><?php the_title(); ?></h1>

			<?php the_content(''); ?>
			<?php if(function_exists('wp_print')) { print_link(); } ?>

			<?php wp_link_pages('before=<div class="nav_link">'.__('PAGES','martword').': &after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>

			<?php if ($mw_enjoy_post == "true" && is_attachment() != TRUE) : ?>
				<div class="promote clear">
					<h3><?php _e('Enjoy this article?','martword'); ?></h3>
					<p><a href="<?php bloginfo('rss2_url'); ?>"><?php  _e('Consider subscribing to our rss feed!','martword'); ?></a></p>
				</div>
			<?php endif; ?>

		</div><!-- /.postContent -->

		<?php if ($mw_post_author == "Single page" || $mw_post_author == "Both" && is_attachment() != TRUE) : ?>
			<div class="about_author clear">
				<span class="alignleft"><?php echo get_avatar( get_the_author_id(), '28' );   ?></span>
				<div class="alignleft" style="width:470px;">
					<h4><?php _e('About','martword'); ?> <a href="<?php the_author_url(); ?> "><?php the_author(); ?></a></h4>
					<?php the_author_description(); if(!get_the_author_description()) _e('No description. Please complete your profile.','martword'); ?></div>
					<div class="clear"></div>
			</div>
		<?php endif; ?>

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

        <div class="cat_tags_close"></div>

        <?php
        $category_ids = array_map(fn($category) => $category->term_id, get_the_category());

        $next_post_in_cat = get_next_post_link('&laquo; %link', '%title', true);
        $next_post_outside_cat = get_next_post_link('&laquo; %link', '%title', false, $category_ids);

        $previous_post_in_cat = get_previous_post_link('%link &raquo;', '%title', true);
        $previous_post_outside_cat = get_previous_post_link('%link &raquo;', '%title', false, $category_ids);
        ?>

        <?php if ($next_post_in_cat || $previous_post_in_cat): ?>
            <div class="next_previous_links">
                <h2>More from the same category</h2>
            <?php if ($next_post_in_cat): ?>
                <span class="alignleft"><?=$next_post_in_cat?></span>
            <?php endif; ?>

            <?php if ($previous_post_in_cat): ?>
                <span class="alignright"><?=$previous_post_in_cat?></span>
            <?php endif; ?>

                <div class="clear"></div>
            </div>
        <?php endif; ?>

        <?php if ($next_post_outside_cat || $previous_post_outside_cat): ?>
            <div class="cat_tags_close"></div>
            <div class="next_previous_links">
                <h2>From a different category</h2>
            <?php if ($next_post_outside_cat !== $next_post_in_cat): ?>
                <span class="alignleft"><?=$next_post_outside_cat?></span>
            <?php endif; ?>

            <?php if ($previous_post_outside_cat !== $previous_post_in_cat): ?>
                <span class="alignright"><?=$previous_post_outside_cat?></span>
            <?php endif; ?>

                <div class="clear"></div>
            </div>
        <?php endif; ?>

		<?php comments_template(); ?>

	</div><!-- /#post-xxx -->

<?php endwhile; else: ?>

	<h2><?php _e('Not Found','martword'); ?></h2>
	<p><?php  _e("Sorry, but you are looking for something that isn't here.","martword"); ?></p>

<?php endif; ?>

<?php get_footer(); ?>
