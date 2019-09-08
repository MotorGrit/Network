<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package    WordPress/ClassicPress
 * @subpackage MG_Theme
 * @since      1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<?php MG_Theme\Tags\post_thumbnail(); ?>

	<div class="entry-content" itemprop="articleBody">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mg-theme' ),
			'after'  => '</div>',
		) );
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						__( 'Edit <span class="screen-reader-text">%s</span>', 'mg-theme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer>
	<?php endif; ?>
</article>
