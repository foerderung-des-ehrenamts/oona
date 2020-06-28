<?php

/* 

oona

1. Preview Image removed
2. Appendix File added
3. Post Meta Date changed
4. Post Meta Taxonomy changed

*/

?>

<article <?php post_class( 'preview preview-' . get_post_type() ); ?> id="post-<?php the_ID(); ?>">

	<?php

	$fallback_image_url = chaplin_get_fallback_image_url();

	if ( ( has_post_thumbnail() && ! post_password_required() ) || $fallback_image_url ) : ?>

		<figure class="preview-media">

		<?php // OONA Preview Media removed ?>
			
		</figure><!-- .preview-media -->

	<?php endif; ?>

	<header class="preview-header">

		<?php 

		// OONA Replace Post-URL with File-URL

		the_title( '<h2 class="preview-title heading-size-3"><a target="_blank" href="'.get_field('talu_newspaper_article_file').'">', '</a></h2>' );
					
		if ( get_theme_mod( 'chaplin_display_excerpts', false ) ) :

			$excerpt = get_the_excerpt();

			if ( $excerpt ) : 
				?>

				<div class="preview-excerpt">
					<?php echo apply_filters( 'the_excerpt', $excerpt ); ?>
				</div><!-- .preview-excerpt -->

				<?php 
			endif;
		endif;

		?>

		<!-- ONNA Post Meta Date -->

		<div class="post-meta-wrapper post-meta-archive">
        <ul class="post-meta color-accent">
		<li class="post-date">
				<a class="meta-wrapper" target="_blank" href="<?php echo get_field('talu_newspaper_article_file'); ?>">
				<span class="meta-icon">
					<span class="screen-reader-text"><?php esc_html_e( 'Post date', 'chaplin' ); ?></span>
					<?php chaplin_the_theme_svg( 'calendar' ); ?>
				</span>
				<span class="meta-text">
					<?php

					// Load field value and convert to numeric timestamp.
					$unixtimestamp = strtotime( get_field('talu_newspaper_article_date') );

					// Display date in the format "d. F Y".
					echo date_i18n( "d. F Y", $unixtimestamp );

			 ?>
				</span>
			</a>
		</li></ul></div>

		<!-- ONNA Post Meta Custom Taxonomy -->

		<div class="post-meta-wrapper post-meta-archive">
        <ul class="post-meta color-accent">
		<li class="post-categories meta-wrapper">
		<a class="meta-wrapper" target="_blank" href="<?php echo get_field('talu_newspaper_article_file'); ?>">
			<span class="meta-icon">
				<span class="screen-reader-text"><?php esc_html_e( 'Post categories', 'chaplin' ); ?></span>
				<?php chaplin_the_theme_svg( 'folder' ); ?>
			</span>
			<span class="meta-text">
				<?php 
				
				the_field('talu_newspaper_article_gazette')
				
				?>
			</span></a>
		</li></ul></div>

	</header><!-- .preview-header -->

</article><!-- .preview -->