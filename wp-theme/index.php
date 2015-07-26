<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tolerance-break
**/
get_header(); ?>

<!-- settings for home/category page -->
	<?php if ( have_posts() ) { ?>
		<?php while ( have_posts() ) { the_post(); ?>
		<div class="banner">
			<?php if ( has_post_thumbnail() && is_single() ) {
				the_post_thumbnail('full');
			} elseif ( has_post_thumbnail() ) { 
				echo ' <a href=" ';
				the_permalink();
				echo ' " rel="nofollow"> ';
				the_post_thumbnail('full');
				echo ' </a> ';
			} else { ?>	
				<a href="<?php the_permalink() ?>">
					<img src="<?php bloginfo('template_url') ?>/images/example.jpg" alt="example image">
				</a>
			<?php } 
			if ( is_single() ) { ?>
				<h1>
					<?php the_title() ?>
				</h1>
			<?php } else { ?>
				<h1>
					<a href="<?php the_permalink() ?>">
						<?php the_title() ?>
					</a>
				</h1>
			<?php }
			?>
		</div>
	<?php }}?>


<!-- settings for single post/page -->
	<?php if(is_single()){ ?>

	<div class="container">
		<p class="posted-date-cat">
			<?php echo '<span class="posted-date">'. the_time('d F Y').'</span>'; echo "&nbsp&nbsp&nbsp"; echo the_category(','); ?>
		</p>

		<div class="post-content">
			<?= the_content() ?>				
		</div>

		<div class="subscribe-form-section">
			<h2>Subscribe to Tolerance Break</h2>
			<p>Get best of Tolerance Break delivered directly to your inbox.</p>
			<form action="http://tolerancebreak.us11.list-manage.com/subscribe/post" method="POST" class="subscribe-form">
				<input type="hidden" name="u" value="86e80e07014ac73b4c4ac190b">
				<input type="hidden" name="id" value="e5ecc9d643"> 
				<input type="email" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="">
				<input type="submit" value=" " onclick="ga('send', 'event', 'Email Capture', 'Form Submit', 'Article');">
			</form>
		</div>

		<div class="related-posts">
			
			<h2>Related Stories</h2>
			<div class="row">
			<?php
				global $wp_query;
				$cat_ID = get_the_category($post->ID);
				$cat_ID = $cat_ID[0]->cat_ID;
				$this_post = $post->ID;
				query_posts(array('cat' => $cat_ID, 'post__not_in' => array($this_post), 'posts_per_page' => 3, 'orderby' => 'rand'));


				// The Loop
				if(have_posts()){
				while ( have_posts() ) : the_post();?>

					<div class="col-sm-4">
						<a href="<?php the_permalink() ?>"><?php if( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else{ /* if user didn't select feature image*/?>
							<img src="<?php bloginfo('template_url') ?>/images/post-thumb.jpg" alt="">
						<?php }?></a>

						<h1><a href="<?php the_permalink() ?>"><?php the_title();/* for title with link*/?></a> </h1>
						<p class="posted-date-cat">
							<span class="posted-cat"><?= the_category(','); /* for category */?></span>
							<span class="posted-date"><?= the_time('d F Y') /* for date */?></span>
						</p>
					</div>
				<?php endwhile; } else{?>

				<!-- if don't have any related posted -->
					<div class="col-sm-4">
						<?php if( has_post_thumbnail() ) {
							the_post_thumbnail();
						} else{ /* if user didn't select feature image*/?>
							<img src="<?php bloginfo('template_url') ?>/images/post-thumb.jpg" alt="">
						<?php }?>

						<h1><a href="<?php the_permalink() ?>"><?php the_title();/* for title with link*/?></a> </h1>
						<p class="posted-date-cat">
							<span class="posted-cat"><?= the_category(','); /* for category */?></span>
							<span class="posted-date"><?= the_time('d F Y') /* for date */?></span>
						</p>
					</div>
				<?php }
				// Reset Query
				wp_reset_query();
				?>
				
			</div>
		</div>
	</div>
	<?php }?>
<?php get_footer(); ?>
